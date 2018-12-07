@include('layouts.header')

        <link rel="stylesheet" href="{{asset('js/iCheck/all.css')}}" /> 

        <!-- Icons -->
        <link href="{{asset('icons/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">
        <link href="{{asset('icons/themify-icons/themify-icons.css')}}" rel="stylesheet">
        <!--animate css-->
        <link rel="stylesheet" href="{{asset('animate.css')}}">
        <link rel="stylesheet" href="{{asset('js/select2/select2.min.css')}}">
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
                        Registro de trabajadores
                        <small></small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="/home"><i class="fa fa-home"></i>Inicio</a></li>
                        <li class="active">Registrar</li>
                    </ol>
                </section>

                <section class="content">

                    <div id="infoWorker" class="box box-form">

                            

                        <!-- /.box-header -->
                    <form class="form" method="POST" action="{{ route('createWorker') }}">
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
                                        <div class='form-group{{ $errors->has('lName') ? ' has-error' : '' }}'>
                                            <label>Apellido</label>
                                            <input class="form-control" id="lName" name="lName" type="text" value="{{ old('lName') }}">
                                            @if ($errors->has('lName'))
                                                <span class="help-block">
                                                <strong>{{ $errors->first('lName') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class='col-md-4'>
                                        <div class="form-group">
                                            <label>Tipo</label>
                                            <select id="type" class="form-control select2">
                                                <option value="admin">Administrador</option>
                                                <option value="worker">Trabajador</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class='row'>
                                    <div class='col-md-4'>
                                        <div class='form-group{{ $errors->has('charge') ? ' has-error' : '' }}'>
                                            <label>Cargo</label>
                                            <input class="form-control" id="charge" name="charge" type="text" value="{{ old('charge') }}">
                                            @if ($errors->has('charge'))
                                                <span class="help-block">
                                                <strong>{{ $errors->first('charge') }}</strong>
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

                </section>
                <!-- /. main content -->
                <span class="return-up"><i class="fa fa-chevron-up"></i></span>
            </div>
            <!-- /. content-wrapper -->
            <!-- Main Footer -->
            @include('layouts.footer')
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
        <!-- JS app -->
        <script src="{{asset('js/app2.js')}}"></script>
        <!-- Slimscroll is required when using the fixed layout. -->
    </body>
</html>

<script type="text/javascript">

$(document).ready(function(){

            $('#type').select2({
            minimumResultsForSearch: -1,
            });

            $("[data-mask]").inputmask();


            $('#registerWorker').on('click',function(e){


            e.preventDefault();

            var name = $('#name').val();
            var lName = $('#lName').val();
            var type = $('#type').val();
            var charge = $('#charge').val();
            var phone = $('#phone').val();
            var email = $('#email').val();

            $.ajax({
                // En data puedes utilizar un objeto JSON, un array o un query string
               data:{name:name, lName:lName, type:type, charge:charge, phone:phone, email:email, "_token": "{{ csrf_token() }}"},
                //Cambiar a type: POST si necesario
                type: 'POST',
                // Formato de datos que se espera en la respuesta
                dataType: "json",
                // URL a la que se enviará la solicitud Ajax
                url: '/admin/register-worker' ,
                success:function(data){
                    $('#s').text('    Disponible '+data.single+' de 4');
                    $('#c').text('    Disponible '+data.compartida+' de 2');
                    $('#m').text('    Disponible '+data.matrimonial+' de 2');

           }
            }); 

        });


});
</script>