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

    // Si la validación falla, redirigimos de vuelta con errores
    if ($validator->fails()) {
        return redirect()->back()->withErrors($validator)->withInput();
    }

    // Crear el nuevo usuario y cifrar la contraseña antes de guardarla
    $usuario = Usuario::create([
        'nombre' => $request->nombre,  // changed from 'name' to 'nombre'
        'email' => $request->email,
        'password' => bcrypt($request->password),
        'avatar' => $request->file('avatar') ? $request->file('avatar')->store('avatars', 'public') : null,  // updated variable name to match 'avatar'
    ]);

    // Handle the avatar file upload
    if ($request->hasFile('avatar')) {  // changed 'archivo' to 'avatar'
        $path = $request->file('avatar')->store('avatar', 'public');  // updated variable name to match 'avatar'
        $usuario->archivo_path = $path;  // assuming 'archivo_path' is the column for storing the file path
    }

    // Enviar el correo de bienvenida al usuario recién registrado
    // Mail::to($usuario->email)->send(new WelcomeEmail($usuario));
    // Mail::to('informatica@generalelevadores.com')->send(new NewUserNotification($usuario));

    // Redirigir al login después de que el usuario se haya registrado correctamente

        Mail::to($usuario->email)->send(new BienvenidaMailable($usuario));

    return redirect()->route('login')->with('success', 'Te has registrado correctamente. Ahora puedes iniciar sesión.');
}

    public function logout()
    {
        Auth::logout();  // Cerrar la sesión
        return redirect()->route('login');  // Redirigir al login
    }


    public function create()
{
    return view('auth.crear');
}

public function store(Request $request)
{
    $usuarioAutenticado = Auth::user(); // Usuario autenticado

    // Validar los datos del formulario
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



    // Guardar el nuevo usuario
    $user->save();

    // Enviar correo de bienvenida
   // Mail::to($user->email)->send(new WelcomeEmail($user));

    return redirect()->route('menuAdmin')->with('success', 'Usuario creado exitosamente');
}


public function detallesUsuario($id)
    {
        // Obtener el usuario y sus dispositivos
        $usuario = Usuario::with('dispositivos')->findOrFail($id);

        // Retornar la vista con los datos del usuario y dispositivos
        return view('auth.detallesUsuario', compact('usuario'));
    }

}


