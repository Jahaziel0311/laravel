<div id="addNewUsuarioModal"   class="modal fade" tabindex="-1">

    <div class="modal-dialog modal-lg">

        <div class="modal-content">

            <div class="modal-header bg-valmar">

                <h5 class="modal-title"><span class="font-weight-bold text-white">Agregar Usuario</span></h5>

                <button type="button" class="close text-white" data-dismiss="modal">&times;</button>

            </div>

            <div class="modal-body text-left" >

                <form action="{{route('usuario.insert')}}" method="POST" role="form" autocomplete="off">
                    @csrf
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputEmail4">Usuario</label>
                            <input type="text" class="form-control" id="txtUsuarioM" placeholder="Ejemplo:Juan" name="txtUsuario"
                                onfocusout="userName()"
                                value= "" required>
                                <span id="AlertaUsuario"></span>
                            
                        </div>
                        
                        
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputPassword4">Contraseña</label>
                            <input type="password" class="form-control" id="inputPassword4" placeholder="" name="txtContraseña"
                            value= ""  required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputEmail4">Confirmar Contraseña</label>
                            <input type="password" class="form-control" id="inputEmail4" placeholder="" name="txtContraseña_confirmation"
                            value= ""  required>
                        </div>
    
                    </div>
                  
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            
                            <div class="form-group">
                              <label for="">Seleccione un Rol</label>
                              <select class="form-control" name="txtRol" id="" value="" required>
                                
                                @foreach($roles as $rol)
                            
                                
                                    <option value="{{$rol->id}}" >{{$rol->nombre_rol}}</option>
                               
                                
                                @endforeach
                            
                              </select>
                            </div>
                            
                        </div>
                        
                        <div class="form-group col-md-6">
                           
                            <div class="form-group">
                              <label for="">Seleccione un Estado </label>
                              <select class="form-control" name="txtEstado" id="" required value="">
    
                                
                                <option value = "0">Bloqueado</option>
                                <option value = "1" selected >Activo</option>
                               
                                
                              </select>
                            </div>
                            
                        </div>
                    </div>
                    <label for="">Correo</label>
                    <div class="input-group flex-nowrap">
    
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="addon-wrapping"><i class="fas fa-at"></i></span>
                        </div>
                        <input type="email" class="form-control" placeholder="Ejemplo:juan@gmail.com" aria-label="Username"
                            aria-describedby="addon-wrapping"
                            name="txtEmail" value= "" required>
    
    
                    </div>
                   
                    <br>
                    <br>
                    <input type="hidden" name="esModal" value='1'>
                   
                    <div class="row justify-content-around"> 
                        <div class="col-8">

                        </div>
                        <div class="col-4"> 
                            <button type="submit" id="botoncrear" class="btn btn-info btn-lg"> Guardar</button>
                        </div>
                    </div>
                    
    
                </form>
            </div>

        </div>

    </div>

</div>
