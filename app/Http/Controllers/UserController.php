<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRegisterPostRequets;
use App\Models\Person;
use App\Models\User;
use Google_Client;
use Google_Service_Oauth2;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class UserController extends Controller
{

    /**
     * @var Google_Client
     */
    private $google_client;


    public function __construct()
    {
        $this->google_client = new Google_Client();
        $this->google_client->setClientId(env('GOOGLE_CLIENT_ID'));
        $this->google_client->setClientSecret(env('GOOGLE_SECRET'));
        $this->google_client->setRedirectUri(env("GOOGLE_REDIRECT_URI"));
        $this->google_client->addScope('email');
        $this->google_client->addScope('profile');
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View|Response
     */
    public function create()
    {
        //retorno a la vista de register
        if (isset($_GET['code'])) {
            $token = $this->google_client->fetchAccessTokenWithAuthCode($_GET['code']);
            $this->google_client->setAccessToken($token);
            $googleAuth = new Google_Service_Oauth2($this->google_client);
            $googleAccountInfo = $googleAuth->userinfo->get();
            //verificar si ya existe.
            if (User::verifierCredentials(['EMAIL' => $googleAccountInfo->getEmail()])) {
                return view('auth.register')->with('error', 'este usuario ya existe');
            }
            $persona = $this->getPersonToAssociate([
                'NAME' => $googleAccountInfo->getGivenName(),
                'SURNAME' => $googleAccountInfo->getFamilyName(),
                'DOCUMENT_NUMBER' => null, //FIXME esta bien que tengan 1 los registrados por email? cualquier cosa que lo cambien desp
                'EMAIL' => $googleAccountInfo->getEmail()
            ]);

            $user = new User();
            $user->fill([
                "NAME" => $googleAccountInfo->getGivenName(),
                "SURNAME" => $googleAccountInfo->getFamilyName(),
                "EMAIL" => $googleAccountInfo->getEmail(),
                /*FIXME deberiamos ver como vamos a registrar bien a un usuario que entra por gmail.
                *tal vez otra tabla, o tal vez un campo que indique que es de gmail.*/
                "PASSWORD" => "",
                'ACTIVE' => true
            ]);
            $user->person()->associate($persona);
            $user->save();
            return view("web.home")->with("exito", "usuario creado con exito!");
        }
        $google_client = $this->google_client;
        return view('auth.register', compact('google_client'));
    }


    // FIXME popdria er una parte de utils
    public function createConfirmationCode()
    {
        $pool = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        return substr(str_shuffle(str_repeat($pool, 5)), 0, 25);
    }

    public function getPersonToAssociate($dates)
    {
        $persona = Person::getPerson([
            'NAME' => $dates['NAME'],
            'SURNAME' => $dates['SURNAME'],
            'EMAIL' => $dates['EMAIL']
        ]);
        if ($persona !== null) {
            return $persona;
        } else {
            $persona2 = new Person();
            $persona2->fill([
                'NAME' => $dates['NAME'],
                'SURNAME' => $dates['SURNAME'],
                'DOCUMENT_NUMBER' => $dates['DOCUMENT_NUMBER'],
                'EMAIL' => $dates['EMAIL']
            ]);
            $persona2->save();
            return $persona2;
        }
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param UserRegisterPostRequets $request
     * @return Application|Factory|View|Response
     */
    public function store(UserRegisterPostRequets $request)
    {
        //valido que los campos que necesito esten en el request
        $dates = $request->validated();
        $dates['confirmation_code'] = $this->createConfirmationCode();

        //verificar si ya existe el user.
        if (User::verifierCredentials(['EMAIL' => $dates['email']])) {
            return view('auth.register')->with('error', 'este usuario ya existe');
        }

        //creo persona, si no encuentra una persona que coincida con los datos pasados crea una nueva y la devuelve
        $persona = $this->getPersonToAssociate([
            'NAME' => $dates['name'],
            'SURNAME' => $dates['lastname'],
            'DOCUMENT_NUMBER' => $dates['dni'],
            'EMAIL' => $dates['email']
        ]);

        //creo user
        $user = new User();
        $dates['password'] = Hash::make($dates['password']);
        $user->fill([
            'PASSWORD' => $dates['password'],
            'EMAIL' => $dates['email'],
            'ACTIVE' => true
            //'confirmation_code'=>$dates['confirmation_code']
        ]);
        $user->person()->associate($persona);
        try {
            $user->save();
            //FIXME ahora tengo otro problema, creo que tiene que ver con la autenticacion
            /*Mail::send('auth.verification', $dates, function($message) use ($dates) {
                $message->to($dates['email'], $dates['name'])->subject('Por favor confirma tu correo');
            });*/
            return view('web.home')->with("exito", "usuario creado con exito!");
        } catch (QueryException $ex) {
            //FIXME: Usar logs en un futuro.
            return view('web.home')->with('error', "no se pudo crear el usuario");
        }
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }


    public function verify($code)
    {
        $user = User::getUserAuthCode($code);

        if (!$user)
            return redirect(route('index'));

        $user->confirmed = true;
        $user->confirmation_code = null;
        $user->save();

        return redirect(route('index'))->with('exito', 'Has confirmado correctamente tu correo!');
    }

}
