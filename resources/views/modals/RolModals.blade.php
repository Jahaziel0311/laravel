<div id="addNewRolModal"   class="modal fade" tabindex="-1">

    <div class="modal-dialog modal-lg">

        <div class="modal-content">

            <div class="modal-header bg-valmar">

                <h5 class="modal-title"><span class="font-weight-bold text-white">Agregar Rol</span></h5>

                <button type="button" class="close text-white" data-dismiss="modal">&times;</button>

            </div>

            <div class="modal-body text-left" >

                <form action="{{route('rol.insert')}}" method="POST" role="form" autocomplete="off">  
                    @csrf
                          
                    <div class="form-group">
                        <label for="">Nombre</label>
                        <input type="text" class="form-control" id="" placeholder="Ejemplo: Recepcionista" name="txtNombre" required>
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
