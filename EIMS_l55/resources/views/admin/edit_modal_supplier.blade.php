                    <div class="modal fade" id="modal-default">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span></button>
                                    <h4 class="modal-title">Editar</h4>
                                </div>
                                <div class="modal-body">
                    <form class="form" method="POST" action="{{ route('createSupplier') }}">
                            {{ csrf_field() }}
                        <div class="box-body">
                            
                            @if (Session::has('message'))    
                                <div class="alert alert-success alert-dismissable">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">X</button>
                                    <strong>{{ Session::get('message') }}</strong>
                                </div>
                            @endif

                            <div class="col-md-12">
                                <div class='row'>
                                    <div class='col-md-4'>
                                        <div class='form-group{{ $errors->has('name') ? ' has-error' : '' }}'>
                                            <label>Nombre</label>
                                            <input class="form-control" id="name" name="name" type="text" value="{{ old('name') }}">
                                            @if ($errors->has('name'))
                                                <span class="help-block">
                                                <strong>{{ $errors->first('name') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class='col-md-4'>
                                        <div class='form-group{{ $errors->has('company') ? ' has-error' : '' }}'>
                                            <label>Compañía</label>
                                            <input class="form-control" id="company" name="company" type="text" value="{{ old('company') }}">
                                            @if ($errors->has('company'))
                                                <span class="help-block">
                                                <strong>{{ $errors->first('company') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class='col-md-4'>
                                        <div class='form-group{{ $errors->has('address') ? ' has-error' : '' }}'>
                                            <label>Dirección</label>
                                            <input class="form-control" id="address" name="address" type="text" value="{{ old('address') }}">
                                            @if ($errors->has('address'))
                                                <span class="help-block">
                                                <strong>{{ $errors->first('address') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class='row'>
                                    <div class='col-md-4'>
                                        <div class='form-group{{ $errors->has('phone') ? ' has-error' : '' }}'>
                                            <label>Teléfono</label>
                                            <input class="form-control" id="phone" name="phone" type="text" data-inputmask='"mask": "(+569) 99999999"' value="{{ old('phone') }}" data-mask>
                                            @if ($errors->has('phone'))
                                                <span class="help-block">
                                                <strong>{{ $errors->first('phone') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class='col-md-4'>
                                        <div class='form-group{{ $errors->has('email') ? ' has-error' : '' }}'>
                                            <label>Email</label>
                                            <input class="form-control" id="email" name="email" type="email" value="{{ old('email') }}">
                                            @if ($errors->has('email'))
                                                <span class="help-block">
                                                <strong>{{ $errors->first('email') }}</strong>
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