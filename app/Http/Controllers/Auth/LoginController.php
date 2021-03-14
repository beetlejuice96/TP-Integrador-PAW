<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
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
             $credentials = $this->validate($request, [ //valido que lleguen los dos campos y que sean de tipo string.
                 'email' => 'required|string',
                 'password' => 'required|string'
             ]);

             $result = User::verifierCredentials($credentials); //mando a verificar estas credenciales al usuario.
             if ($result==false){
                 return back()->with('error', 'Usuario o password no corresponden a usuario activo.');
             }

             if (Auth::attempt($credentials)){
                 return redirect(route('index'));
             }
            //dd(Auth::attempt(['email'=>$request['email'],'password'=>$request['password']]));
            return back()->with('error', 'Usuario o password incorrectos');
    }

    public function login (){
        return view('auth.login');
    }

    public function username() //Devuelve el campo por el cual se logueara el usuario
    {
        return 'username';
    }


}
