<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\paciente;
use App\Models\pantalla;
use Carbon\Carbon;
use Session;


class pacienteController extends Controller
{
    public function index(){

        if (!Auth::user()) {

            $current = url()->current();
            Session::put('url', $current);    
            return redirect(route('login'));
        }

        if(Auth::user()->accesoRuta('/paciente')){

                        
            if (Auth::user()->rol->tipo_rol == 1) {
                $resultado = paciente::get(); 
            } else {
                $resultado=paciente::where('estado_paciente',1)->get();
            }
            
        }
        return view ("paciente.index", ["resultado"=>$resultado]);

    } 

    public function busqueda(){
        if (Session::has('usuario_rol_id')) {
            $pantallas_menu = Controller::urlsPantallasXUsuario();
            
            if (in_array('/paciente',$pantallas_menu)){//solo modificar la ruta buscar las rutas en web.php o el la tabla pantallas
                //esto ya estaba
                

                $permisos = Controller::permisos('paciente');
                return view ("paciente.buscar", ['permisos'=>$permisos]);

            }
            
              
            return redirect(route('index'));
            
        }else{
            return redirect(route('login.index'));
        }
        
    }

    public function busque2(Request $request){
        if (Session::has('usuario_rol_id')) {
            $pantallas_menu = Controller::urlsPantallasXUsuario();
            
            if (in_array('/paciente',$pantallas_menu)){//solo modificar la ruta buscar las rutas en web.php o el la tabla pantallas
                //esto ya estaba
               
                
                return redirect(route('paciente.buscado', ['buscar' => $request->txtBuscar]));                
                

            }
            
              
            return redirect(route('index'));
            
        }else{
            return redirect(route('login.index'));
        }
        
    }

    public function buscado($buscar){
        if (Session::has('usuario_rol_id')) {
            $pantallas_menu = Controller::urlsPantallasXUsuario();
            
            if (in_array('/paciente',$pantallas_menu)){//solo modificar la ruta buscar las rutas en web.php o el la tabla pantallas
               
                $keyWord = '%'.$buscar .'%';
                

                
                return view("paciente.index", [
                    'resultado' => paciente::latest()
        
                                ->where(function ($query) use ($keyWord){
                                    $query->orWhere('identificacion_paciente', 'LIKE', $keyWord)
                                    ->orWhere('nombre_paciente', 'LIKE', $keyWord)
                                    ->orWhere('apellido_paciente', 'LIKE', $keyWord)
                                    ->orWhere(DB::raw("CONCAT(nombre_paciente,' ',apellido_paciente)"), 'LIKE', str_replace(" ", "%", $keyWord));
                                
                                })
                                
                                ->get(),
                    'permisos' => Controller::permisos('paciente')]); 

            }
            
              
            return redirect(route('index'));
            
        }else{
            return redirect(route('login.index'));
        }
        
    }

    public function ultimos(){
        if (!Auth::user()) {

            $current = url()->current();
            Session::put('url', $current);    
            return redirect(route('login'));
        }

        if(Auth::user()->accesoRuta('/paciente')){

                        
            if (Auth::user()->rol->tipo_rol == 1) {
                $resultado = paciente::where('created_at', '>=', Carbon::now()->subDays(30))->orderBy('id','Desc')->get(); 
            } else {
                $resultado=paciente::where('created_at', '>=', Carbon::now()->subDays(30))->orderBy('id','Desc')->where('estado_paciente',1)->get();
            }
            
        }
        return view ("paciente.index", ["resultado"=>$resultado]);
       
        
    }





    public function buscar($cedula){
        if (Session::has('usuario_rol_id')) {
            $pantallas_menu = Controller::urlsPantallasXUsuario();
            
            if (in_array('/paciente',$pantallas_menu)){//solo modificar la ruta buscar las rutas en web.php o el la tabla pantallas
                //esto ya estaba
                if(Session::get('usuario_rol_id')==1){
                    $resultado = paciente::where('identificacion_paciente',$cedula)->get(); 
                }else{
                    $resultado=paciente::where('identificacion_paciente',$cedula)->where('estado_paciente',1)->get();
                }

                
                // $paciente = paciente::where('identificacion_paciente',$cedula)->first();
                
                
                // $paciente->estado_paciente = 1;
                // $paciente->save();

                // $paciente = paciente::where('identificacion_paciente',$cedula)->get(); 
                // return $paciente;
                $permisos = Controller::permisos('paciente');
                return view ("paciente.index", ["resultado"=>$resultado,'permisos'=>$permisos]);

            }
            
              
            return redirect(route('index'));
            
        }else{
            return redirect(route('login.index'));
        }
        
    }

    public function create(){
        if (Session::has('usuario_rol_id')) {
            $pantallas_menu = Controller::urlsPantallasXUsuario();
            
            if (in_array('/paciente/create',$pantallas_menu)){//solo modificar la ruta buscar las rutas en web.php o el la tabla pantallas
                //esto ya estaba 
                return view("paciente.create");

            }
            
              
            return redirect(route('index'));
            
        }else{
            return redirect(route('login.index'));
        }
        
    }

    public function insert(Request $request){
        if (!Auth::user()) {

            $current = url()->current();
            Session::put('url', $current);    
            return redirect(route('login'));
        }


        if(Auth::user()->accesoRuta('/paciente/create')){//solo modificar la ruta buscar las rutas en web.php o el la tabla pantallas
                //esto ya estaba 
            $existe = paciente::where('identificacion_paciente', $request->txtcedula)->count();
            if($existe == 1){
                return back()->withInput()->withErrors(['status' => "La cédula que quiere ingresar ya se encuentra registrada en el sistema, ingrese una diferente!"]);
            }else{
                $obj_paciente = new paciente();
                $obj_paciente->identificacion_paciente = $request->txtCedula;
                $obj_paciente->nombre_paciente = strtoupper($request->txtnombre);
                $obj_paciente->apellido_paciente = strtoupper($request->txtapellido);
                $obj_paciente->sexo_paciente = $request->txtsexo;
                $obj_paciente->fecha_nacimiento_paciente = $request->txtfecnac;
                $obj_paciente->telefono_paciente = $request->txttelefono;
                $obj_paciente->email_paciente =  strtolower($request->txtemail);
                $obj_paciente->comentario_paciente = nl2br($request->txtComentario);
                $obj_paciente->save();

               /*  if ($obj_paciente->email_paciente!='') {

                    $password = Controller::generaPassword(10);                        
                    $obj_usuario =new usuario();
                    $obj_usuario->nombre_usuario = $obj_paciente->identificacion_paciente;
                    $obj_usuario->email_usuario = $obj_paciente->email_paciente;
                    $obj_usuario->password_usuario =  md5($password);
                    $rol = rol::where('nombre_rol','Paciente')->first();
                    $obj_usuario->rol_id = $rol->id;
                    $obj_usuario->save();

                    //Enviar notificacionea a usuarios
                    $notificacion['identificacion_paciente'] = $obj_paciente->identificacion_paciente;
                    $notificacion['mensaje'] = 'El paciente '.$obj_paciente->nombre_paciente." ".$obj_paciente->apellido_paciente.' se le creo una cuenta en webvalmar.com';
                    $notificacion['password'] = $password;
                    
                    $roles = rol::where('nombre_rol','like','Recep%')->get();
                    
                    $lista_roles = array();
                    foreach($roles as $rol){
                        array_push($lista_roles,$rol->id);
                    }
                    
                    usuario::whereIn('rol_id',$lista_roles)                            
                            ->each(function(usuario $usuario) use ($notificacion){
                                $usuario->notify(new nuevoUsuario($notificacion));
                            });

                    


                } */

                if($request->esModal){
                    if($request->esModal==2){
                        return redirect()->back()->with(['txtCedula'=>$request->txtCedula,'txtRegistro'=>$request->txtRegistro]);
                    }
                }
                return redirect(route('paciente.index'))->withErrors(['status' => "Se Agregó el Nuevo Paciente " .$obj_paciente->id ]); 
            }

        }
        
            
        return redirect(route('index'));          
       

        
    }

    public function update($id){
        if (Session::has('usuario_rol_id')) {
            $pantallas_menu = Controller::urlsPantallasXUsuario();
            
            if (in_array('/paciente/update',$pantallas_menu)){//solo modificar la ruta buscar las rutas en web.php o el la tabla pantallas
                //esto ya estaba 
                $resultado = paciente::get()->where('id',$id);
                return view ("paciente.update",  ["resultado"=>$resultado]);

            }
            
              
            return redirect(route('index'));
            
        }else{
            return redirect(route('login.index'));
        }
        
    }

    public function save(Request $request){
        

        if (!Auth::user()) {

            $current = url()->current();
            Session::put('url', $current);    
            return redirect(route('login'));
        }


        if(Auth::user()->accesoRuta('/paciente/update')){//solo modificar la ruta buscar las rutas en web.php o el la tabla pantallas
            $obj_paciente = paciente::find($request->txtid);
                
            if($obj_paciente->identificacion_paciente == $request->txtCedula){
        
                $obj_paciente->identificacion_paciente = $request->txtCedula;
                $obj_paciente->nombre_paciente =  strtoupper($request->txtnombre);
                $obj_paciente->apellido_paciente = strtoupper($request->txtapellido);
                $obj_paciente->sexo_paciente = $request->txtsexo;
                $obj_paciente->fecha_nacimiento_paciente = $request->txtfecnac;
                $obj_paciente->telefono_paciente = $request->txttelefono;
                $obj_paciente->email_paciente = strtolower($request->txtemail);
                $obj_paciente->comentario_paciente = nl2br($request->txtComentario);
                $obj_paciente->save();

                if($request->esModal==2){
                    return redirect()->back()->withErrors(['status' => "Se Modificó el Paciente Correctamente!"]);
                }
            
                return redirect(route('paciente.index'))->withErrors(['status' => "Se Modificó el Paciente Correctamente!" ]);
            }else{
                $existe = paciente::where('identificacion_paciente', $request->txtCedula)->count();
                
                if($existe == 1){
                    if($request->esModal==2){
                        return redirect()->back()->withErrors(['danger'=> "Ingreso una cedula que ya existe",'tipo'=>'danger']);
                        
                    }
                
                    return back()->withInput()->withErrors(['status' => "La cédula que quiere ingresar ya se encuentra registrada en el sistema, ingrese una diferente!"]);
                }else{
                    $obj_paciente->identificacion_paciente = $request->txtCedula;
                    $obj_paciente->nombre_paciente = $request->txtnombre;
                    $obj_paciente->apellido_paciente = $request->txtapellido;
                    $obj_paciente->sexo_paciente = $request->txtsexo;
                    $obj_paciente->fecha_nacimiento_paciente = $request->txtfecnac;
                    $obj_paciente->telefono_paciente = $request->txttelefono;
                    $obj_paciente->email_paciente = $request->txtemail;
                    $obj_paciente->save();
                    if($request->esModal==2){
                        return redirect()->back()->withErrors(['status' => "Se Modificó el Paciente Correctamente!" ]);
                    }
                    return redirect(route('paciente.index'))->withErrors(['status' => "Se Modificó el Paciente Correctamente!" ]);
                }
            }
        }
            
              
        return redirect(route('index'));            
        
        
    }

    public function eliminar($id){
        if (!Auth::user()) {

            $current = url()->current();
            Session::put('url', $current);    
            return redirect(route('login'));
        }


        if(Auth::user()->accesoRuta('/paciente/delete')){//solo modificar la ruta buscar las rutas en web.php o el la tabla pantallas
            $resultado = paciente::find($id);
            $resultado->estado_paciente = 0;
            $resultado->save();
            return redirect (route('paciente.index'))->withErrors(['status' => "Se Eliminó el Paciente Correctamente!" ]);
        }
        
              
        return redirect(route('index'));
        
        
    }

    public function desbloquear($id){
        if (!Auth::user()) {

            $current = url()->current();
            Session::put('url', $current);    
            return redirect(route('login'));
        }


        if(Auth::user()->accesoRuta('/paciente/delete')){//solo modificar la ruta buscar las rutas en web.php o el la tabla pantallas
            $resultado = paciente::find($id);
            $resultado->estado_paciente = 1;
            $resultado->save();
            return redirect (route('paciente.index'))->withErrors(['status' => "Se Eliminó el Paciente Correctamente!" ]);
        }
        
            
        return redirect(route('index'));
            
        
    }
    
    public function verPassword($id){
        $notificaciones = notificacion::where('notifiable_type','App\Models\usuario')->where('notifiable_id',Session::get('usuario_log_id'))->get();
        
        foreach ($notificaciones as $notificacion) {
            $data = json_decode($notificacion->data, true);
            if ($data['identificacion_paciente']==$id) {
                
                $notificacion->delete();
                
                $paciente = paciente::where('identificacion_paciente',$id)->first();
                
                return view('paciente.verPassword',['paciente'=>$paciente,'password'=>$data['password']]);
            }
            
        }
        
     
       
    }


    

}
