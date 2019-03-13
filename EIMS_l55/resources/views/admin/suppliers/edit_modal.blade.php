                    <div class="modal fade" id="modal-default">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span></button>
                                    <h4 class="modal-title">Editar proveedor</h4>
                                </div>
                                <div class="modal-body">
                    <form class="form" method="POST" action="{{ route('updateSupplier') }}">
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
                                        <div class='form-group{{ $errors->has('rut2') ? ' has-error' : '' }}'>
                                            <label>Rut</label>
                                            <input class="form-control" id="rut2" name="rut2" type="text" value="{{ old('rut2') }}">
                                            @if ($errors->has('rut2'))
                                                <span class="help-block">
                                                <strong>{{ $errors->first('rut2') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class='col-md-4'>
                                        <div class='form-group{{ $errors->has('bn2') ? ' has-error' : '' }}'>
                                            <label>Razón social</label>
                                            <input class="form-control" id="bn2" name="bn2" type="text" value="{{ old('bn2') }}">
                                            @if ($errors->has('bn2'))
                                                <span class="help-block">
                                                <strong>{{ $errors->first('bn2') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class='col-md-4'>
                                        <div class='form-group{{ $errors->has('contactName2') ? ' has-error' : '' }}'>
                                            <label>Nombre de contacto</label>
                                            <input class="form-control" id="contactName2" name="contactName2" type="text" value="{{ old('contactName2') }}">
                                            @if ($errors->has('contactName2'))
                                                <span class="help-block">
                                                <strong>{{ $errors->first('contactName2') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class='row'>
                                    <div class='col-md-4'>
                                        <div class='form-group{{ $errors->has('address2') ? ' has-error' : '' }}'>
                                            <label>Dirección</label>
                                            <input class="form-control" id="address2" name="address2" type="text" value="{{ old('address2') }}">
                                            @if ($errors->has('address2'))
                                                <span class="help-block">
                                                <strong>{{ $errors->first('address2') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class='col-md-4'>
                                        <div class='form-group{{ $errors->has('phone2') ? ' has-error' : '' }}'>
                                            <label>Teléfono</label>
                                            <input class="form-control" id="phone2" name="phone2" type="text" value="{{ old('phone2') }}">
                                            @if ($errors->has('phone2'))
                                                <span class="help-block">
                                                <strong>{{ $errors->first('phone2') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class='col-md-4'>
                                        <div class='form-group{{ $errors->has('email2') ? ' has-error' : '' }}'>
                                            <label>Email</label>
                                            <input class="form-control" id="email2" name="email2" type="text" value="{{ old('email2') }}">
                                            @if ($errors->has('email2'))
                                                <span class="help-block">
                                                <strong>{{ $errors->first('email2') }}</strong>
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