<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use App\Models\usuario;
use App\Models\rol_pantalla;
use Session;

class loginController extends Controller
{
    Public function index() {
        
        return view('auth.login');
    }

    Public function login(Request $request) {
        $nombre=$request->usuario;
        $contraseña=$request->password;   
        
        
        
        $existe=usuario::where('nombre_usuario',$nombre)->count();
       
        
        if ($existe==0) {

            return redirect()->back()->withErrors(['usuario' => "El usuario es incorrecto."]);

        }

        $usuario=usuario::where('nombre_usuario',$nombre)->first(); 
        if ($usuario['password_usuario']!=md5($contraseña)) {

            return redirect()->back()->withInput($request->only('usuario'))->withErrors(['password' => "Contraseña incorrecta."]);            

        }

        Session::put('usuario_log_id', $usuario->id);
        $usuario = usuario::find(Session::get('usuario_log_id')); 
        Session::put('usuario_rol_id', $usuario->rol->id);                                                           
        Session::put('nombre_usuario', $usuario->nombre_usuario);  
        return redirect(route('index'));
            
    }

    Public function validation () {
        return view('login.validar');
    }

    Public function emailvalidation (Request $request) {
        $email=$request->email;

        $existe=usuario::where('email_usuario',$email)->count();

        if ($existe==1) {
            /* Codigo de validacion email */
            return redirect(route('login.index'))->withErrors(['status' => "Se ha mandado la verificación al correo electrónico." ]);
        }
        else {
            return back()->withInput()->withErrors(['status' => "El correo electronico no existe." ]);
        }
    }
    public function cerrar(){
        Session::put('usuario_log_id', '');        
        Session::put('usuario_rol_id', '');                
        Session::put('nombre_usuario', ''); 
        return redirect(route('login.index'));
    }
}
