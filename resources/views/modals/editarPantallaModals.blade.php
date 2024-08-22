<div id="editarPantallaModal{{$fila->id}}"   class="modal fade" tabindex="-1">

    <div class="modal-dialog modal-lg">

        <div class="modal-content">

            <div class="modal-header bg-valmar">

                <h5 class="modal-title"><span class="font-weight-bold text-white">Agregar Pantalla</span></h5>

                <button type="button" class="close text-white" data-dismiss="modal">&times;</button>

            </div>

            <div class="modal-body text-left" >

                <form action="{{route('pantalla.save')}}" method="POST" role="form" autocomplete="off">  
                    @csrf
                    <div class="form-row">      
                        <div class="form-group col-md-6">
                            <label for="">Nombre</label>
                            <input type="text" class="form-control" value="{{$fila->nombre_pantalla}}" id="" placeholder="Ejemplo: Crear Usuario" name="txtNombre" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="">URL</label>
                            <input type="text" class="form-control" value="{{$fila->url_pantalla}}" id="" placeholder="Ejemplo: usuario/create" name="txtUrl" required>
                        </div>
                        <div class="form-group col-md-12">
                            <label for="">Asignar a:</label>
                            <select class="form-control" name="txtPadre" id="">
                              <option value="0">Raiz</option>
                              @foreach ($pantallas_padre as $padre)
    
                                @if ($padre->id == $fila->padre)
                                    <option value="{{$padre->id}}" selected>{{$padre->nombre_pantalla}}</option>
                                @else
                                    <option value="{{$padre->id}}">{{$padre->nombre_pantalla}}</option>
                                @endif
                                
                              @endforeach                     
                              
                            </select>
                        </div>
                        @if ($fila->estado_pantalla ==1)
                            <div class="form-group col-md-4 text-center">
                                <label class="form-check-label">
                                <input type="checkbox" class="form-check-input" name="txtEstado" id="" value="1" checked>
                                Mostrar en el Menu?
                                </label>
                            </div>
                        @else
                            <div class="form-group col-md-4 text-center">
                                <label class="form-check-label">
                                <input type="checkbox" class="form-check-input" name="txtEstado" id="" value="1">
                                Mostrar en el Menu?
                                </label>
                            </div>
                            
                        @endif
                
                        
                    </div>
                    <br>
                    <br>
                    <input type="hidden" name="esModal" value='1'>
                    <input type="hidden" name="txtId" id="input" class="form-control" value="{{ $fila->id }}">
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
