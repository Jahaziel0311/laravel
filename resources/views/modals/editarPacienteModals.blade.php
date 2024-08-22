<div id="editarPacienteModal{{$fila->id}}"  style="text-align: left" class="modal fade" tabindex="-1">

    <div class="modal-dialog modal-lg">

        <div class="modal-content">

            <div class="modal-header bg-valmar">

                <h5 class="modal-title"><span class="font-weight-bold text-white">Actualizar Paciente</span></h5>

                <button type="button" class="close text-white" data-dismiss="modal">&times;</button>

            </div>

            <div class="modal-body text-left" >

                <form action="{{route('paciente.save')}}" method="POST" role="form" autocomplete="off">
                    @csrf
                    
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputcedula">Cédula</label>
                            <input type="text" class="form-control  form-control-sm "  name="txtCedula"  placeholder="Ejemplo:8-888-8888"  
                                value="{{$fila->identificacion_paciente}}" required>
                                <small id="AlertaCedula4" class="form-text text-muted"></small>
                            <input type="hidden" id="txtCedulaOld" value="{{$fila->identificacion_paciente}}">
                        </div>
                        <div class="form-group col-md-6">
                          <label for="inputsexo">Sexo</label>
                          <div class="form-check col-md-6">
                              <input type="radio" class="form-check-input" name="txtsexo" id="radio1" value="m" <?php if($fila->sexo_paciente=="m"){echo 'checked="checked"';}?> checked>
                              <label class="form-check-label" for="radio1">Masculino</label>
                          </div>
                          <div class="form-check col-md-6">
                              <input type="radio" class="form-check-input" name="txtsexo" id="radio2" value="f" <?php if($fila->sexo_paciente=="f"){echo 'checked="checked"';}?>>
                              <label class="form-check-label" for="radio2">Femenino</label>
                            </div>
                        </div> 
                        
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputnombre">Nombre</label>
                            <input type="text" class="form-control form-control-sm" id="inputnombre" placeholder="Ejemplo:Juan" name="txtnombre"
                            value="{{$fila->nombre_paciente}}" required >
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputapellido">Apellido</label>
                            <input type="text" class="form-control form-control-sm" id="inputapellido" placeholder="Ejemplo:Perez" name="txtapellido"
                            value="{{$fila->apellido_paciente}}" required > 
                        </div>
    
                        
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            
                            <label for="inputfecnac">Fecha de Nacimiento</label>
                           
                            <input type="date" class="form-control form-control-sm" id="inputfecnac" name="txtfecnac"
                            value="{{$fila->fecha_nacimiento_paciente}}" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputtelefono">Telefono</label>
                            <input type="text" class="form-control form-control-sm" id="inputtelefono" placeholder="Ejemplo:66666666" name="txttelefono" date-format="dd-mm-yyyy"
                            value="{{$fila->telefono_paciente}}"  >
                        </div>
                    </div>
                   
                    <label for="">Correo</label>
                    <div class="input-group flex-nowrap">
    
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="addon-wrapping"><i class="fas fa-at"></i></span>
                        </div>
                        <input type="email" class="form-control form-control-sm" placeholder="Ejemplo:juan@gmail.com" aria-label="Username"
                            aria-describedby="addon-wrapping" name="txtemail" value="{{$fila->email_paciente}}">
                    </div>
                    <br>
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="exampleFormControlTextarea1">Comentario</label>
                            <textarea class="form-control form-control-sm" id="exampleFormControlTextarea1" name="txtComentario" rows="2">{{$fila->comentario_paciente}}</textarea>
                        </div>
                    </div>
                    
                        <input type="hidden" name="esModal" id="esModal" class="form-control form-control-sm" value="2">
                        <input type="hidden" name="txtid" id="txtid" class="form-control form-control-sm" value="{{$fila->id}}">
                    

                   
                    <div class="row justify-content-around"> 
                        <div class="col-8">

                        </div>
                        <div class="col-4"> 
                            <button type="submit"  class="btn btn-info btn-lg"> Guardar Cambios</button>
                        </div>    
                        
                    
                    </div>
                    <br>
                    
                  </form>

            </div>

        </div>

    </div>

</div>
