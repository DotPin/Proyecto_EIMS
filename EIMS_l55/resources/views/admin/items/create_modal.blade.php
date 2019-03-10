                    <div class="modal fade" id="modal-default2" tabindex="10">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span></button>
                                    <h4 class="modal-title">Editar item</h4>
                                </div>
                                <div class="modal-body">
                    <form class="form" method="POST" action="{{ route('updateItem') }}">
                            {{ csrf_field() }}
                        <div class="box-body">
                            
                            @if (Session::has('message'))    
                                <div class="alert alert-success alert-dismissable">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">X</button>
                                    <strong>{{ Session::get('message') }}</strong>
                                </div>
                            @endif

                            <div class="col-md-12">
                                <div id="id" class="hidden"></div>
                                <div class='row'>
                                    <div class='col-md-4'>
                                        <div class='form-group{{ $errors->has('name') ? ' has-error' : '' }}'>
                                            <label>Item</label>
                                            <input class="form-control" id="name" name="name" type="text" value="{{ old('name') }}">
                                            @if ($errors->has('name'))
                                                <span class="help-block">
                                                <strong>{{ $errors->first('name') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class='col-md-4'>
                                        <div class="form-group">
                                            <label>Categoria</label>
                                            <select id="category" class="form-control select2">
                                                <option value=1>EPP</option>
                                                <option value=2>Suministros</option>
                                                <option value=3>Herramientas</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class='col-md-4'>
                                        <div class="form-group">
                                            <label>Subcategoria</label>
                                            <select id="subcat" class="form-control select2">
                                                <option value=1>Pies</option>
                                                <option value=2>Cabeza</option>
                                                <option value=3>Vestimenta</option>
                                                <option value=4>Oficina</option>
                                                <option value=5>Baño</option>
                                                <option value=6>Obra</option>
                                                <option value=7>Eléctrico</option>
                                                <option value=8>Mecánico</option>
                                                <option value=9>Aireacondicionado</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class='row'>
                                    <div class='col-md-12'>
                                        <div class='form-group{{ $errors->has('description') ? ' has-error' : '' }}'>
                                            <label>Descripción</label>
                                            <input class="form-control" id="description" name="description" type="text" value="{{ old('description') }}">
                                            @if ($errors->has('description'))
                                                <span class="help-block">
                                                <strong>{{ $errors->first('description') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                        </div>
                    </form>
                            </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cerrar</button>
                                    <button type="button" class="btn btn-primary" id="btn_update">Editar</button>
                                </div>
                            </div>
                            <!-- /.modal-content -->
                        </div>
                        <!-- /.modal-dialog -->
                    </div>