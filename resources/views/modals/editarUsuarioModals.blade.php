<div id="editarUsuarioModal{{$fila->id}}"   class="modal fade" tabindex="-1">

    <div class="modal-dialog modal-lg">

        <div class="modal-content">

            <div class="modal-header bg-valmar">

                <h5 class="modal-title"><span class="font-weight-bold text-white">Editar Usuario</span></h5>

                <button type="button" class="close text-white" data-dismiss="modal">&times;</button>

            </div>

            <div class="modal-body text-left" >

                <form action="{{ route('usuario.save') }}" method="POST" role="form" autocomplete="off">
                    @csrf
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputEmail4">Usuario</label>
                            <input type="text" class="form-control" id="inputEmail4" placeholder="Ejemplo:Juan" name="txtUsuario"
                                required value="{{$fila->nombre_usuario}}">
                              
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputPassword4">Contraseña</label>
                            <input type="password" class="form-control" id="inputPassword4" placeholder="Ejemplo:Perez" name="txtContraseña"
                            required value="{{$fila->password_usuario}}">
                        </div>
                    </div>
                    

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            
                            <div class="form-group">
                                <label for="">Seleccione un Rol</label>
                                <select class="form-control" name="txtRol" id="" value="{{$fila->rol_id}}" required>
                                
                                    @foreach($roles as $rol)
                                        @if($rol->id == $fila->rol_id)
                                            <option value="{{$rol->id}}" selected>{{$rol->nombre_rol}}</option>
                                        @else
                                            <option value="{{$rol->id}}" >{{$rol->nombre_rol}}</option>
                                        @endif
                                        
                                    @endforeach
                            
                                </select>
                            </div>
                      
                        </div>

                        <div class="form-group col-md-6">
                            
                            <div class="form-group">
                                <label for="">Seleccione un Estado </label>
                                <select class="form-control" name="txtEstado" id="" required value="{{$fila->estado_usuario}}">

                                    @if($fila->estado_usuario == 0)
                                        <option value = "0" selected>Bloqueado</option>
                                        <option value = "1">Activo</option>
                                    @else
                                        <option value = "0" >Bloqueado</option>
                                        <option value = "1" selected>Activo</option>
                                    @endif
                                    
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
                            aria-describedby="addon-wrapping" name="txtEmail"  value="{{$fila->email_usuario}}" required>
                    </div>
                            

                    <input type="hidden" name="txtId" id="input" class="form-control" value="{{ $fila->id }}">
                    
                    <br>
                    <br>
                
                    <div class="row justify-content-around"> 
                        <div class="col-8">

                        </div>
                        <div class="col-4"> 
                            <input type="hidden" name="txtId" value="{{$fila->id}}">
                            <button type="submit" id="botoncrear" class="btn btn-info btn-lg"> Guardar</button>
                        </div>
                    </div>
                </form>
            </div>

        </div>

    </div>

</div>
