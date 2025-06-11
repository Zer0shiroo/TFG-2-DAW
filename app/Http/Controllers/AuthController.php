<?php
namespace App\Http\Controllers;
use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Mail\WelcomeEmail;
use App\Mail\NewUserNotification;
use App\Mail\BienvenidaMailable;
use App\Models\Dispositivo;
use Illuminate\Support\Facades\Mail;


class AuthController 
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $request->session()->regenerate();
    
            return redirect()->route('blog.index')->with('success', 'Bienvenido de nuevo!');
        }
    
        
        return back()->withErrors([
            'email' => 'Las credenciales no coinciden con nuestros registros.',
        ]);
    }

    
    
    public function showRegisterForm()
    {
        return view('auth.register');
    }

    
    public function register(Request $request)
    {
    $validator = Validator::make($request->all(), [
        'nombre' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:usuarios', 
        'password' => 'required|string|confirmed|min:8',
        'avatar' => 'nullable|file|mimes:pdf,doc,docx,jpg,jpeg,png|max:2048',
    ], [
        'titulo.unique' => 'Ya existe un reporte con este título. Por favor, elige otro.',
    ]);

    if ($validator->fails()) {
        return redirect()->back()->withErrors($validator)->withInput();
    }

    $usuario = Usuario::create([
        'nombre' => $request->nombre, 
        'email' => $request->email,
        'password' => bcrypt($request->password),
        'avatar' => $request->file('avatar') ? $request->file('avatar')->store('avatars', 'public') : null,  
    ]);

    if ($request->hasFile('avatar')) { 
        $path = $request->file('avatar')->store('avatar', 'public');  
        $usuario->archivo_path = $path; 
    }


        Mail::to($usuario->email)->send(new BienvenidaMailable($usuario));

    return redirect()->route('login')->with('success', 'Te has registrado correctamente. Ahora puedes iniciar sesión.');
}

    public function logout()
    {
        Auth::logout();  
        return redirect()->route('login'); 
    }


    public function create()
{
    return view('auth.crear');
}

public function store(Request $request)
{
    $usuarioAutenticado = Auth::user(); 

   
    $validatedData = $request->validate([
        'nombre' => 'required|max:255',
        'email' => 'required|email|unique:usuarios,email',
        'password' => 'required|min:6|confirmed',
        'avatar' => 'nullable|string',
    ]);




    $user = new Usuario();
    $user->nombre = $validatedData['name'];
    $user->email = $validatedData['email'];
    $user->password = bcrypt($validatedData['password']);



  
    $user->save();

   
 

    return redirect()->route('menuAdmin')->with('success', 'Usuario creado exitosamente');
}



}


