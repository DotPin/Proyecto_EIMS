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
                        Crear nuevo prestamo
                        <small></small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="/user/index"><i class="fa fa-home"></i>Inicio</a></li>
                        <li>items</li>
                        <li class="active">prestamos</li>
                    </ol>
                </section>

                <section class="content">

                        <!-- /.box-body -->
                                        <div class="row">
                        <div class="col-xs-12">
                            <div class="box">
                                <div class="message"></div>
                                <!-- /.box-header -->
                            <div class="box">
                                <div class="box-header">
                                    <h3 class="box-title">Tabla de préstamos</h3>
                                </div>
                                <!-- /.box-header -->
                                <div class="box-body">
                                    <table id="items" class="table table-bordered table-striped datatable">
                                        <thead>
                                            <tr>
                                                <th>Item</th>
                                                <th>Asociado a</th>
                                                <th>Categoria</th>
                                                <th>Subcategoria</th>
                                                <th>Fecha inicio</th>
                                                <th>Fecha término</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($loans as $l)
                                            <tr>
                                                <td>{{$l->itemR->name}}</td>
												<td>{{$l->userR->name}} {{$l->userR->lName}}</td>
												<td>{{$l->itemR->categoryR->name}}</td>
                                                <td>{{$l->itemR->subcatR->name}}</td>
                                                <td>{{$l->startL}}</td>
                                                <td>{{$l->endL}}</td>
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


</script>