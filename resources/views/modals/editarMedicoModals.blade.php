<div id="editarMedicoModal{{$fila->id}}"   class="modal fade" tabindex="-1">

    <div class="modal-dialog modal-lg">

        <div class="modal-content">

            <div class="modal-header bg-valmar">

                <h5 class="modal-title"><span class="font-weight-bold text-white">Editar Médico</span></h5>

                <button type="button" class="close text-white" data-dismiss="modal">&times;</button>

            </div>

            <div class="modal-body text-left" >
                <form action="{{route('medico.save')}}" method="POST" role="form" autocomplete="off">
                    @csrf
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputEmail4">Nombre del Doctor</label>
                            <input type="text" class="form-control" id="inputEmail4" placeholder="Ejemplo:Juan" name="txtNombre"
                                value="{{$fila->nombre_medico}}" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputPassword4">Numero de Registro</label>
                            <input type="text" class="form-control" id="txtRegistro4" placeholder="Ejemplo:1538540" 
                                 value="{{$fila->numero_registro}}" name="txtNumero" required>                            
                        </div>
                    </div>
                    <label for="">Correo</label>
                    <div class="input-group flex-nowrap">
    
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="addon-wrapping"><i class="fas fa-at"></i></span>
                        </div>
                        <input type="email" class="form-control" placeholder="Ejemplo:juan@gmail.com" aria-label="Username"
                            value="{{$fila->email_medico}}" aria-describedby="addon-wrapping" name="txtEmail">
                    </div>
                    <br>
                    <label for="">Telefono</label>
                    <div class="input-group flex-nowrap">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="addon-wrapping"><i class="fas fa-phone-alt"></i></span>
                        </div>
                        <input type="text" class="form-control" placeholder="Ejemplo:64987858" aria-describedby="addon-wrapping"
                            value="{{$fila->telefono_medico}}" name="txtTelefono">
                    </div>
                    <br>
                    <br>
                    
                    
                    <input type="hidden" name="esModal" id="esModal" class="form-control form-control-sm" value="2">

                   
                    <input type="hidden" name="txtId" id="txtId" class="form-control form-control-sm" value="{{$fila->id}}">
                    

                    <div class="row justify-content-around"> 
                        <div class="col-8">

                        </div>
                        <div class="col-4"> 
                            <button type="submit" id="btnEditMedicoModal" class="btn btn-info btn-lg"> Guardar</button>
                        </div>    
                        
                    
                    </div>
                    
    
                </form>

               

            </div>

        </div>

    </div>

</div>
