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
                        Ingresar nuevo item
                        <small></small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="/user/index"><i class="fa fa-home"></i>Inicio</a></li>
                        <li>items</li>
                        <li class="active">Crear</li>
                    </ol>
                </section>

                <section class="content">

                    <div id="infoWorker" class="box box-form">

                            

                        <!-- /.box-header -->
                    <form class="form" method="POST" action="{{ route('addItem') }}">
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
                                        <div class='form-group'>
                                            <label>Categoria</label>
                                            <select id="category" name="category" class="form-control select2">
                                                <option selected="selected" value=>--</option>
                                                <option value=1>EPP</option>
                                                <option value=2>Suministros</option>
                                                <option value=3>Herramientas</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class='col-md-4'>
                                        <div class="form-group">
                                            <label>Subcategoria</label>
                                            <select id="subcat" name="subcat" class="form-control select2">
                                                <option selected="selected" value=>--</option>
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
                                        <div class='form-group{{ $errors->has('cescription') ? ' has-error' : '' }}'>
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


</script>