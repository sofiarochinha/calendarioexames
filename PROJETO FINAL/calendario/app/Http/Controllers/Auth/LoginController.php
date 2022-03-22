<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use function redirect;
use function view;

class LoginController extends Controller
{
    public function index(){
        return view('Auth/login');
    }

    public function customLogin(Request $request){

        //validar os inputs do formulário
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        //obtém as credenciais
        $credentials = $request->only('email', 'password');

        //não sei o que faz o attempt
        if (Auth::attempt($credentials)) {
            return redirect()->intended('marcar-exames')
                ->withSuccess('Signed in');
        }

        return redirect("Auth/login")->withSuccess('Login details are not valid');

    }


    /**
     * Retorna a view de registo
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function registration()
    {
        return view('Auth/registration');
    }

    /**
     * Regista o utilizador na base de dados
     * @param Request $request
     * @return mixed
     */
    public function customRegistration(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);

        $data = $request->all();
        $check = $this->create($data);

        return redirect("calendario-atual")->withSuccess('You have signed-in');
    }

    /**
     * Cria o utilizador
     * A HASH permite encriptar a password do utilizador
     * @param array $data
     * @return mixed
     */
    public function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password'])
        ]);
    }


    public function dashboard()
    {
        if(Auth::check()){

            return view('calendario_atual');
        }

        return redirect("login")->withSuccess('You are not allowed to access');
    }

    /**
     * Logout da aplicação
     * Termina a sessão criada
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function signOut() {
        Session::flush();
        Auth::logout();

        return Redirect('login');
    }
}
