@include('layouts.header')

        <link rel="stylesheet" href="{{asset('js/iCheck/all.css')}}" /> 

        <!-- Icons -->
        <link href="{{asset('icons/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">
        <link href="{{asset('icons/themify-icons/themify-icons.css')}}" rel="stylesheet">

                <link rel="stylesheet" href="{{asset('datatables/dataTables.bootstrap.css')}}">
        <link rel="stylesheet" href="{{asset('responsive-tables/responsivetables.css')}}">
        <!--animate css-->
        <link rel="stylesheet" href="{{asset('animate.css')}}">
        <link rel="stylesheet" href="{{asset('js/select2/select2.min.css')}}">
        <link rel="stylesheet" href="{{asset('js/sweetalert/sweetalert.css')}}">

        <link href="{{asset('js/pickadate.js-3.5.6/lib/themes/default.css')}}" rel="stylesheet">
    	<link href="{{asset('js/pickadate.js-3.5.6/lib/themes/default.date.css')}}" rel="stylesheet">
        <!-- Theme style -->
        <link rel="stylesheet" href="{{asset('css/main-style.min.css')}}">
        <link rel="stylesheet" href="{{asset('css/skins/all-skins.css')}}">

         </head>
    <!--
      |---------------------------------------------------------|
      |LAYOUT OPTIONS | fixed                                   |
      |               | layout-boxed                            |
      |               | sidebar-collapse                        |
      |               | sidebar-mini                            |
      |---------------------------------------------------------|
    -->
    <body class="skin-yellow sidebar-mini">
        <div class="page-loader-wrapper" >
            <div class="spinner"></div>
        </div>
        <div class="wrapper">
            <!-- Main Header -->
            @include('layouts.top_menu_header')
            <!-- Left side column. contains the logo and sidebar -->
            @include('layouts.sidebar_left')
            <!-- Content Wrapper -->
            <div class="content-wrapper">
                <section class="content-title">
                    <h1>
                        Crear nuevo proveedor
                        <small></small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="/user/index"><i class="fa fa-home"></i>Inicio</a></li>
                        <li class="active">proveedores</li>
                    </ol>
                </section>

                <section class="content">

                    <div id="infoWorker" class="box box-form">

                            

                        <!-- /.box-header -->
                    <form class="form" method="POST" action="{{ route('addSupplier') }}">
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
                                        <div class='form-group{{ $errors->has('rut') ? ' has-error' : '' }}'>
                                            <label>Rut</label>
                                            <input class="form-control" id="rut" name="rut" type="text" value="{{ old('rut') }}">
                                            @if ($errors->has('rut'))
                                                <span class="help-block">
                                                <strong>{{ $errors->first('rut') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class='col-md-4'>
                                        <div class='form-group{{ $errors->has('bn') ? ' has-error' : '' }}'>
                                            <label>Razón social</label>
                                            <input class="form-control" id="bn" name="bn" type="text" value="{{ old('bn') }}">
                                            @if ($errors->has('bn'))
                                                <span class="help-block">
                                                <strong>{{ $errors->first('bn') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class='col-md-4'>
                                        <div class='form-group{{ $errors->has('contactName') ? ' has-error' : '' }}'>
                                            <label>Nombre de contacto</label>
                                            <input class="form-control" id="contactName" name="contactName" type="text" value="{{ old('contactName') }}">
                                            @if ($errors->has('contactName'))
                                                <span class="help-block">
                                                <strong>{{ $errors->first('contactName') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>    
                                <div class='row'>
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
                                <div class='row'>
                                    <div class='col-md-12'>
                                        <div class='form-group'>
                                            <button type="submit" class="btn btn-primary">Registrar</button>
                                        </div>
                                    </div>
                                </div>
                        </div>
                    </form>
                        <!-- /.box-body -->
                    </div>




						</div>
                        <!-- /.box-body -->
                                        <div class="row">
                        <div class="col-xs-12">
                            <div class="box">
                                <div class="message"></div>
                                <!-- /.box-header -->
                            <div class="box">
                                <div class="box-header">
                                    <h3 class="box-title">Tabla de proveedores</h3>
                                </div>
                                <!-- /.box-header -->
                                <div class="box-body">
                                    <table id="items" class="table table-bordered table-striped datatable">
                                        <thead>
                                            <tr>
                                                <th>Rut</th>
                                                <th>Razón social</th>
                                                <th>Contacto</th>
                                                <th>Dirección</th>
                                                <th>Correo</th>
                                                <th>Teléfono</th>
                                                <th>Acción</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($suppliers as $s)
                                            <tr>
                                                <td>{{$s->rut}}</td>
												<td>{{$s->bn}}</td>
												<td>{{$s->contactName}}</td>
                                                <td>{{$s->address}}</td>
                                                <td>{{$s->email}}</td>
                                                <td>{{$s->phone}}</td>
                                                <td>
                                                    <a href="#!" id="{{$s->id}}" class="model-open-edit fa fa-pencil-square-o text-blue" aria-hidden="true" data-toggle="modal" data-target="#modal-default"></a>
                                                    <a href="#" id="{{$s->id}}"  class="delete fa fa-trash text-red" aria-hidden="true"></a>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <!-- /.box-body -->
                            </div>  
                                <!-- /.box-body -->
                            </div>
                            <!-- /.box -->
                        </div>
                    </div>


                </section>
                <!-- /. main content -->
                <span class="return-up"><i class="fa fa-chevron-up"></i></span>
            </div>
            <!-- /. content-wrapper -->
            <!-- Main Footer -->
            @include('layouts.footer')
            @include('admin.suppliers.edit_modal')
        </div>
        <!-- /. wrapper content-->
        <!-- JS scripts -->
        <script src="{{asset('jQuery/jquery-2.2.3.min.js')}}"></script>
        <script src="{{asset('js/jQueryUI/jquery-ui.min.js')}}"></script>
        <script src="{{asset('js/jquery-fullscreen/jquery.fullscreen-min.js')}}"></script>
        <script src="{{asset('bootstrap/js/bootstrap.min.js')}}"></script>
        <script src="{{asset('js/slimScroll/jquery.slimscroll.min.js')}}"></script>
        <script src="{{asset('js/fastclick/fastclick.min.js')}}"></script>
        <script src="{{asset('js/input-mask/jquery.inputmask.js')}}"></script>
        <script src="{{asset('js/input-mask/jquery.inputmask.extensions.js')}}"></script>
        <script src="{{asset('js/input-mask/jquery.inputmask.date.extensions.js')}}"></script>
        <script src="{{asset('js/select2/select2.min.js')}}"></script>

        <script src="{{asset('datatables/jquery.dataTables.min.js')}}"></script>
        <script src="{{asset('datatables/dataTables.bootstrap.min.js')}}"></script>
        <script src="{{asset('js/sweetalert/sweetalert.min.js')}}"></script>

        <script src="{{asset('js/pickadate.js-3.5.6/lib/picker.js')}}"></script>
    	<script src="{{asset('js/pickadate.js-3.5.6/lib/picker.date.js')}}"></script>
    	<script src="{{asset('js/pickadate.js-3.5.6/lib/picker.time.js')}}"></script>
    	<script src="{{asset('js/pickadate.js-3.5.6/lib/translations/es_ES.js')}}"></script>

        <!-- JS app -->
        <script src="{{asset('js/app2.js')}}"></script>
        <!-- Slimscroll is required when using the fixed layout. -->
    </body>
</html>

<script type="text/javascript">
$(document).ready(function(){

	$.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

	$('.datatable').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": true,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "scrollX": true
            });

           $('table').on('click','.model-open-edit', function(e){

                e.preventDefault();
                $.ajax({
                    // En data puedes utilizar un objeto JSON, un array o un query string
                   data:{
                        id:$(this).attr('id'),
                        "_token": "{{ csrf_token() }}",
                    },
                    //Cambiar type si necesario
                    type: 'POST',
                    // Formato de datos que se espera en la respuesta
                    dataType: "json",
                    // URL a la que se enviará la solicitud Ajax
                    url: '/admin/suppliers/edit' ,
                    success : function(json) {

                    console.log(json);

                    $('#rut2').val(json.rut);
                    $('#bn2').val(json.bn);
                    $('#contactName2').val(json.contactName);
                    $('#address2').val(json.address);
                    $('#phone2').val(json.phone);
                    $('#email2').val(json.email);


                        }
                    }); 

                 });

            $('#btn_update').on('click',function(e){


                e.preventDefault();

                var rut = $('#rut2').val();
                var bn = $('#bn2').val();
                var contactName = $('#contactName2').val();
                var address = $('#address2').val();
                var phone = $('#phone2').val();
                var email = $('#email2').val();

                $.ajax({
                    // En data puedes utilizar un objeto JSON, un array o un query string
                   data:{rut:rut, bn:bn, contactName:contactName, address:address, phone:phone, email:email, "_token": "{{ csrf_token() }}"},
                    //Cambiar a type: POST si necesario
                    type: 'PUT',
                    // Formato de datos que se espera en la respuesta
                    dataType: "json",
                    // URL a la que se enviará la solicitud Ajax
                    url: '/admin/suppliers/update' ,
                    success:function(json){
                        $('#modal-default').modal('hide');
                        window.location.assign('management');



               }
                }); 

            });

           $('table').on('click','.delete', function(e){

                var id = $(this).attr('id');
                var bn = $(this).attr('bn');
                e.preventDefault();

                    swal({
                    title: "Esta seguro(a)?",
                    text: name+" se borrará permanentemente del sistema!",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "Si, borrar!",
                    cancelButtonText: "Cancelar",
                    closeOnConfirm: false
                }, function () {
                    $.ajax({
                      data:{
                        id:id, "_token": "{{ csrf_token() }}",
                    },
                    //Cambiar type si necesario
                    type: 'POST',
                    // Formato de datos que se espera en la respuesta
                    dataType: "json",
                    // URL a la que se enviará la solicitud Ajax
                    url: '/admin/suppliers/destroy' , 
                    success: function(json){
                        swal({
                            title:"Eliminado!!",
                            text: "Proveedor ha sido removido de los registros EIMS",
                            type: "success",
                            html: true,
                        }, function () {
                                window.location.href = "management";
                        });
                            } 
                        });
                    });

                 });


});

</script>