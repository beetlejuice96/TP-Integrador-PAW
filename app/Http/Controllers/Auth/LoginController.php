<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
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
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
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
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }


    /**
     * @param Request $request
     * @throws ValidationException
     */
    public function authenticate(Request $request){
        if (!isset($_SESSION["id_user"])){
            /* $credentials = $this->validate(request(), [ //valido que lleguen los dos campos y que sean de tipo string.
                 'email' => 'required|string',
                 'password' => 'required|string'
             ]);
             $user = new User();
             $result = $user->verifierCredentials($credentials); //mando a verificar estas credenciales al usuario.
             if ($result==false){
                 return back()->with('error', 'Usuario o password no corresponden a usuario activo.');
             }
             if (Auth::attempt($credentials)){
                //TODO me quede aca, no esta entrando al auth, puede ser que se tenga que configurar mejor auth.php en config
                 return redirect(route('index'));
             }*/

            $newUser = DB::table('users')
                ->where('email',"prueba@example.com")
                ->where('password',"prueba")
                ->first();

            dd(\auth("web" )->login( $newUser ));

            return back()->with('error', 'Usuario o password incorrectos');
        }
    }

    public function login (){
        return view('auth.login');
    }

    public function username() //Devuelve el campo por el cual se logueara el usuario
    {
        return 'username';
    }


}
