<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class usuarioController extends Controller
{
    public function index(){
        if (Session::has('usuario_rol_id')) {
            $pantallas_menu = Controller::urlsPantallasXUsuario();
           
            if (in_array('/usuario',$pantallas_menu)){
                $resultado = usuario::where('estado_usuario', 1)->get();
                $permisos = Controller::permisos('usuario'); 
                $roles = rol::get();
                return view ("usuario.index", ["resultado"=>$resultado,'permisos'=>$permisos,'roles'=>$roles]);

            }
           
              
            return redirect(route('index'));
            
        }else{
            return redirect(route('login.index'));
        }

        
    }

    public function create(){

        if (Session::has('usuario_rol_id')) {
            $pantallas_menu = Controller::urlsPantallasXUsuario();
           
            if (in_array('/usuario/create',$pantallas_menu)){
                $roles = rol::get();
                return view("usuario.create",["roles"=>$roles]);

            }
             
            return redirect(route('index'));
            
        }else{
            return redirect(route('login.index'));
        }


        
    }

    public function insert(Request $request){
        
        if (Session::has('usuario_rol_id')) {
            $pantallas_menu = Controller::urlsPantallasXUsuario();
            
            if (in_array('/usuario/create',$pantallas_menu)){
                
                if ($request->txtContraseña!=$request->txtContraseña_confirmation) {
                    return redirect()->back()->withErrors(['danger' => 'las contraseñas no coinciden' ]);
                }

                $obj_usuario = new usuario();
                $obj_usuario->nombre_usuario = $request->txtUsuario;
                $obj_usuario->email_usuario = $request->txtEmail;
                $obj_usuario->password_usuario = md5($request->txtContraseña);
                $obj_usuario->rol_id = $request->txtRol;
                $obj_usuario->estado_usuario = $request->txtEstado;

                try {
                    $obj_usuario->save();
                    return redirect(route('usuario.index'))->withErrors(['status' => "Se creó el usuario: "]);

                } catch (\Illuminate\Database\QueryException $qe) {
                    
                    return redirect()->back()->withErrors(['danger' => 'Usuario o Correo duplicados' ]);
                } catch (Exception $e) {
                    return redirect()->back()->withErrors(['danger' => $e->getMessage()]);
                } catch (\Throwable $th) {
                    return redirect()->back()->withErrors(['danger' => $th]);
                }   
            }

            return redirect(route('index'));
            
        }else{
            return redirect(route('login.index'));
        }


           
  
    }

    public function update($id){

        if (Session::has('usuario_rol_id')) {
            $pantallas_menu = Controller::urlsPantallasXUsuario();
            
            if (in_array('/usuario/update',$pantallas_menu)){
                $resultado = usuario::get()->where('id',$id);
                $roles = rol::get();
                return view ("usuario.update",  ["resultado"=>$resultado, "roles"=>$roles]);

            }
            
              
            return redirect(route('index'));
            
        }else{
            return redirect(route('login.index'));
        }
        

    }

    public function save(Request $request){

        if (Session::has('usuario_rol_id')) {
            $pantallas_menu = Controller::urlsPantallasXUsuario();
            
            if (in_array('/usuario/update',$pantallas_menu)){
               
                $obj_usuario = usuario::find($request->txtId);
                if($request->txtContraseña==($obj_usuario->password_usuario)){
                    $contraseña_verificada = $obj_usuario->password_usuario;
                    
                }else{
                    $contraseña_verificada = md5($request->txtContraseña); 
                    
                }

                // Busqueda Usuario
                $nombre_existe = usuario::where('nombre_usuario', $request->txtUsuario )->count();
                if($nombre_existe>=1){
                    $obj_usuario = usuario::where('nombre_usuario', $request->txtUsuario )->first();
                    if($obj_usuario->id == $request->txtId){
                        $email_existe = usuario::where('email_usuario', $request->txtEmail )->count();
                        if($email_existe>=1){
                            $obj_email = usuario::where('email_usuario', $request->txtEmail )->first();
                            if($obj_email->id == $request->txtId){         
                                $obj_usuario->nombre_usuario = $request->txtUsuario;
                                $obj_usuario->email_usuario = $request->txtEmail;
                                $obj_usuario->password_usuario = $contraseña_verificada;
                                $obj_usuario->rol_id = $request->txtRol;
                                $obj_usuario->estado_usuario = $request->txtEstado;
                                
                                try {
                                    $obj_usuario->save();
                                    return redirect(route('usuario.index'))->withErrors(['status' => "Se ha actualizado el usuario: ".$obj_usuario->nombre_usuario ]);
                
                                } catch (\Illuminate\Database\QueryException $qe) {
                                    
                                    return redirect()->back()->withErrors(['danger' => 'Usuario o Correo duplicados' ]);
                                } catch (Exception $e) {
                                    return redirect()->back()->withErrors(['danger' => $e->getMessage()]);
                                } catch (\Throwable $th) {
                                    return redirect()->back()->withErrors(['danger' => $th]);
                                }  
                               
                                
                            }else{
                                
                                return redirect()->back()->withErrors(['danger' => 'Ingreso un correo que ya esta en uso' ]);
                            }
                        
                        }else{
                            $obj_usuario->nombre_usuario = $request->txtUsuario;
                            $obj_usuario->email_usuario = $request->txtEmail;
                            $obj_usuario->password_usuario = $contraseña_verificada;
                            $obj_usuario->rol_id = $request->txtRol;
                            $obj_usuario->estado_usuario = $request->txtEstado;
                            try {
                                $obj_usuario->save();
                                return redirect(route('usuario.index'))->withErrors(['status' => "Se ha actualizado el usuario: ".$obj_usuario->nombre_usuario ]);
            
                            } catch (\Illuminate\Database\QueryException $qe) {
                                
                                return redirect()->back()->withErrors(['danger' => 'Usuario o Correo duplicados' ]);
                            } catch (Exception $e) {
                                return redirect()->back()->withErrors(['danger' => $e->getMessage()]);
                            } catch (\Throwable $th) {
                                return redirect()->back()->withErrors(['danger' => $th]);
                            } 
                        }
                    
                    }else{
                        return redirect()->back()->withErrors(['danger' => 'Ingreso un nombre que ya esta en uso' ]);
                    }
                }else{
                    
                    $email_existe = usuario::where('email_usuario', $request->txtEmail )->count();
                    if($email_existe>=1){
                        $obj_email = usuario::where('email_usuario', $request->txtEmail )->first();
                        if($obj_email->id == $request->txtId){         
                            $obj_usuario->nombre_usuario = $request->txtUsuario;
                            $obj_usuario->email_usuario = $request->txtEmail;
                            $obj_usuario->password_usuario = $contraseña_verificada;
                            $obj_usuario->rol_id = $request->txtRol;
                            $obj_usuario->estado_usuario = $request->txtEstado;
                            try {
                                $obj_usuario->save();
                                return redirect(route('usuario.index'))->withErrors(['status' => "Se ha actualizado el usuario: ".$obj_usuario->nombre_usuario ]);
            
                            } catch (\Illuminate\Database\QueryException $qe) {
                                
                                return redirect()->back()->withErrors(['danger' => 'Usuario o Correo duplicados' ]);
                            } catch (Exception $e) {
                                return redirect()->back()->withErrors(['danger' => $e->getMessage()]);
                            } catch (\Throwable $th) {
                                return redirect()->back()->withErrors(['danger' => $th]);
                            } 
                        }else{
                            return redirect()->back()->withErrors(['danger' => 'Ingreso un email que ya esta en uso' ]);
                        }
                    
                    }else{
                        return redirect()->back()->withErrors(['danger' => 'Ingreso un nombre que ya esta en uso' ]);
                    }
                }

            }
        
              
            return redirect(route('index'));
            
        }else{
            return redirect(route('login.index'));
        }



        

    }

    public function delete($id)
    {
        if (Session::has('usuario_rol_id')) {
            $pantallas_menu = Controller::urlsPantallasXUsuario();
            
            if (in_array('/usuario/delete',$pantallas_menu)){
                $obj = usuario::find($id);
                $obj->estado_usuario =0;
                $obj->save();
                return redirect (route("usuario.index"));

            }
            
            return redirect(route('index'));
            
        }else{
            return redirect(route('login.index'));
        }
       
    }

    public function desbloquear($id){

        if (Session::has('usuario_rol_id')) {
            $pantallas_menu = Controller::urlsPantallasXUsuario();
            
            if (in_array('/usuario/delete',$pantallas_menu)){
                $obj = usuario::find($id);
                $obj->estado_usuario =1;
                $obj->save();
                return redirect (route("usuario.index"));

            }
        
              
            return redirect(route('index'));
            
        }else{
            return redirect(route('login.index'));
        }

        
    }

    public function updatePassword($id){
        if (Session::has('usuario_rol_id')) {
            if ($id == Session::get('usuario_log_id') ) {
                $usuario = usuario::find($id);            
                return view('usuario.actualizarPassword', ["usuario"=>$usuario]);
            } else {
                return redirect(route('index'));
            }
            
        }else{
            return redirect(route('login.index'));
        }
    }
    
    public function updatePasswordSave(Request $request){
       

        if (Session::has('usuario_rol_id')) {
            if ($request->txtId == Session::get('usuario_log_id') ) {
                $usuario = usuario::find($request->txtId);
                if ($usuario->password_usuario == md5($request->txtPasswordActual)) {
                    if ($request->txtPasswordNuevo == $request->txtPasswordConfirmacion) {
                        $usuario->password_usuario = md5($request->txtPasswordNuevo);
                        $usuario->save();
                        return redirect(route('index'))->withErrors(['status' => "Su contraseña se ha actualizado"]);;
                    } else {
                        return redirect()->back()->withInput()->withErrors(['txtPasswordConfirmacion' => "No coincide la confirmacion con la nueva contraseña"]);
                    }
                    
                } else {
                    return redirect()->back()->withInput()->withErrors(['txtPasswordActual' => "No es su contraseña actual intente de nuevo"]);
                }
                

                //return redirect(route('index'))->withErrors(['status' => "Se actualizo su contraseña"]);
            } else {
                return redirect(route('index'));
            }
            
        }else{
            return redirect(route('login.index'));
        }

    }

    public function userName($usuario){
        $valor= array();
        $existe = usuario::where('nombre_usuario',$usuario)->count();
        if($existe ==1){
           
            $valor= array("nombre"=>$usuario); 
            
        }

        return $valor;
    }

    public function Correo($correo){
        $valor= array();
        $existe = usuario::where('email_usuario',$correo)->count();
        if($existe ==1){
           
            $valor= array("email"=>$correo); 
            
        }

        return $valor;
    }

}

