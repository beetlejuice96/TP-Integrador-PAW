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
        $this->google_client->setClientId(env('CLIENT_ID_REGISTER'));
        $this->google_client->setClientSecret(env('CLIENT_SECRET_REGISTER'));
        $this->google_client->setRedirectUri(env("REDIRECT_URI_REGISTER"));
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

            $user = new User();
            $user->fill([
                "name" => $googleAccountInfo->getGivenName(),
                "lastname" => $googleAccountInfo->getFamilyName(),
                "email" => $googleAccountInfo->getEmail(),
                /*FIXME deberiamos ver como vamos a registrar bien a un usuario que entra por gmail.
                *tal vez otra tabla, o tal vez un campo que indique que es de gmail.*/
                "password" => ""
            ]);
            //verificar si ya existe.
            if (User::verifierCredentials(['email'=>$googleAccountInfo->getEmail()])) {
                return view('auth.register')->with('error', 'este usuario ya existe');
            }
            $user->save();
            return view("web.home")->with("exito", "usuario creado con exito!");
        }
        $google_client = $this->google_client;
        return view('auth.register', compact('google_client'));
    }


    // FIXME popdria er una parte de utils
    public function createConfirmationCode(){
        $pool = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        return substr(str_shuffle(str_repeat($pool, 5)), 0, 25);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param UserRegisterPostRequets $request
     * @return Application|Factory|View|Response
     */
    public function store(UserRegisterPostRequets $request)
    {
        $dates = $request->validated();
        $dates['confirmation_code'] = $this->createConfirmationCode();

        //verificar si ya existe.
        if (User::verifierCredentials(['email' => $dates['email']])) {
            return view('auth.register')->with('error', 'este usuario ya existe');
        }

        //creo persona
        $persona = new Person();
        $persona->fill([
           'NAME'=>$dates['name'],
           'SURNAME'=>$dates['lastname'],
           //FIXME: todavia me falta poner el tipo de dni
           'DOCUMENT_NUMBER'=>$dates['dni']
        ]);
        $persona->save();

        $user = new User();
        $dates['password'] = Hash::make($dates['password']);
        $user->fill([
            'PASSWORD' => $dates['password'],
            'EMAIL' => $dates['email'],
            'ACTIVE'=>true
            //'confirmation_code'=>$dates['confirmation_code']
        ]);
        $user->person()->associate($persona);

        try {
            $user->save();

            //FIXME no me devuelve error pero tampoco manda el mail, talvez el problema este en el .env
            Mail::send('auth.verification', $dates, function($message) use ($dates) {
                $message->to($dates['email'], $dates['name'])->subject('Por favor confirma tu correo');
            });
            return view('web.home')->with("exito", "usuario creado con exito!");
        } catch (QueryException $ex) {
            dd($ex);
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

        if (! $user)
            return redirect(route('index'));

        $user->confirmed = true;
        $user->confirmation_code = null;
        $user->save();

        return redirect(route('index'))->with('exito', 'Has confirmado correctamente tu correo!');
    }

}
