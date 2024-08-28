<div class="modal fade addNewUsuarioModal" tabindex="-1" role="dialog"
                      aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title align-self-center"
                    id="exampleModalLabel">Agregar Usuario</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{route('usuario.insert')}}" method="POST" role="form" class="form-horizontal" autocomplete="off">
                    @csrf
                    <div class="mb-0">
                        <div class="row">

                            <div class="col-lg-6">                                
                                <div class="input-group mb-3">
                                    <span class="input-group-text">Usuario</span>
                                    <input type="text"  class="form-control" id="txtUsuario" placeholder="Ejemplo:Juan" name="txtUsuario"
                                        onfocusout="userName()"
                                        value= "{{ old('txtUsuario')}}" required>
                                    <div class="invalid-feedback" id="AlertaUsuario"></div>           
                                </div>
                            </div>
                            <div class="col-lg-6">
                                
                                <div class="input-group mb-3">                                    
                                    <div class="col-sm-12">
                                        <select class="form-select" name="txtRol" id="" value="" required>

                                            <option>Seleccione un Rol</option>
                                            @foreach ($roles as $rol)
                                                <option value="{{$rol->id}}" >{{$rol->nombre_rol}}</option>
                                            @endforeach
                                            
                                            
                                        </select>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-lg-6">                                
                                <div class="input-group mb-3">
                                    <span class="input-group-text">Contraseña</span>
                                    <input type="password"  class="form-control" id="inputPassword4" placeholder="" name="txtContraseña"
                                    value= "{{ old('txtContraseña')}}"  required> 
                                </div>
                            </div>      
                            <div class="col-lg-6">                                
                                <div class="input-group mb-3">
                                    <span class="input-group-text">Repetir Contraseña</span>
                                    <input type="password"  class="form-control" id="inputPassword4" placeholder="" name="txtContraseña_confirmation"
                                    value= ""  required>                                     
                                    @error('contraseña') <p class="text-danger text-xs pt-1"> {{$message}} </p>@enderror         
                                </div>
                            </div>
                            
                            <div class="col-lg-6">
                                
                                <div class="input-group mb-3">                                    
                                    <div class="col-sm-12">
                                        <select class="form-select" name="txtEstado" id="" required value="">

                                            <option>Seleccione un Estado</option>                                            
                                            <option value = "0">Bloqueado</option>
                                            <option value = "1" selected >Activo</option>
                                            
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="input-group mb-3">
                                    <span class="input-group-text">Correo</span>
                                    <input type="email"  class="form-control" placeholder="Ejemplo:juan@gmail.com" 
                                     name="txtEmail" value="{{old ('txtEmail')}}" >  
                                </div>
                            </div>
                            
                            <div class="col-lg-8">
                                
                            </div>
                            <div class="col-lg-4">
                                <input type="hidden" name="esModal" value='1'>
                                <button type="submit" id="botoncrear" class="btn btn-info w-lg">Agregar Usuario</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<div id="adsasdddNewUsuarioModal"   class="modal fade" tabindex="-1">

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
                                
                             
                            
                              </select>
                            </div>
                            
                        </div>
                        
                        <div class="form-group col-md-6">
                           
                            <div class="form-group">
                              <label for="">Seleccione un Estado </label>
                              <select class="form-control" name="txtEstado" id="" required value="">
    
                                
                                
                               
                                
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
 