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
    /**
     * This function returns the view of the login page
     *
     * @return A|\Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function showView(){
        return view('Auth/login');
    }

    /**
     * This function is used to authenticate the user.
     * It checks if the user is authenticated and if not, it redirects the user to the login page.
     * If the user is authenticated, it redirects the user to the intended page.
     * If the user is not authenticated, it redirects the user to the login page
     *
     * @param Request request The request object.
     *
     * @return The|\Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
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

        return redirect("login")->with('message','Login details are not valid');

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

        return redirect("marcar-exames")->withSuccess('You have signed-in');
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


    /**
     * This function is used to display the dashboard
     *
     * @return The|\Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function dashboard()
    {
        if(Auth::check())
            return view('calendario_atual');

        return redirect("login")->with('message','You are not allowed to access');
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
