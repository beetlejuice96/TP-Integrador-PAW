<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginPostRequest;
use App\Models\User;
use Google_Client;
use Google_Service_Oauth2;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;


class LoginController extends Controller
{
    /**
     * @var Google_Client
     */
    private $google_client;

    public function __construct()
    {
        $this->google_client = new Google_Client();
        $this->google_client->setClientId(env('CLIENT_ID'));
        $this->google_client->setClientSecret(env('CLIENT_SECRET'));
        $this->google_client->setRedirectUri(env('REDIRECT_URI'));
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
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        //
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
     * @param Request $request
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

    /**
     * @param LoginPostRequest $request
     * @return Application|RedirectResponse|Redirector
     */
    public function authenticate(LoginPostRequest $request)
    {
        $credentials = $request->validated();
        $result = User::verifierCredentials($credentials); //mando a verificar estas credenciales al usuario.
        if ($result == false) {
            return back()->with('error', 'Usuario o password no corresponden a usuario activo.');
        }
        if (Auth::attempt($credentials)) {
            return redirect(route('index'))->with('user-logueado', "Bienvenido!!");
        }
        return back()->with('error', 'Usuario o password incorrectos');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     */
    public function authenticateWithGoogle(Request $request)
    {
        //codigo de login
        $token = $this->google_client->fetchAccessTokenWithAuthCode();
    }

    public function login()
    {
        if (isset($_GET['code'])) {
            $token = $this->google_client->fetchAccessTokenWithAuthCode($_GET['code']);
            $this->google_client->setAccessToken($token);
            $googleAuth = new Google_Service_Oauth2($this->google_client);
            $googleAccountInfo = $googleAuth->userinfo->get();
            $credentials = [
                'EMAIL' => $googleAccountInfo->getEmail()
            ];
            $userExiste = User::verifierCredentials($credentials);
            if (!$userExiste) {
                $google_client = $this->google_client;
                return back()->with(compact('google_client'))->with('error', 'Usuario o password no corresponden a usuario activo.');
            }
            //logueo el usuario solo por id pq con ATTEMP verifica la contraseña, la cual si se esta logueando por gmail no tiene.
            $user = User::getUserWithEmail($credentials['EMAIL']);
            //TODO se puede seguir redirigiendo a otra pag y cargando estos datos en algun lado.
            if (Auth::loginUsingId($user->getAttribute("ID_USER"))) {
                return redirect(route('index'))->with('user-logueado', "Bienvenido!!");
            }
        }
        $google_client = $this->google_client;
        return view('auth.login', compact('google_client'));
    }

    public function username() //Devuelve el campo por el cual se logueara el usuario
    {
        return 'username';
    }
}
