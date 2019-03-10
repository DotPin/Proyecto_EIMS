@include('layouts.header')

        <link rel="stylesheet" href="{{asset('datatables/dataTables.bootstrap.css')}}">
        <link rel="stylesheet" href="{{asset('responsive-tables/responsivetables.css')}}">
        <!-- Icons -->
        <link href="{{asset('icons/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">
        <link href="{{asset('icons/themify-icons/themify-icons.css')}}" rel="stylesheet">
        <link rel="stylesheet" href="{{asset('js/sweetalert/sweetalert.css')}}">
        <!--animate css-->
        <link rel="stylesheet" href="{{asset('animate.css')}}">
        <!-- Theme style -->
        <link rel="stylesheet" href="{{asset('css/main-style.min.css')}}">
        <link rel="stylesheet" href="{{asset('css/skins/all-skins.css')}}">
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <!--
      |---------------------------------------------------------|
      |LAYOUT OPTIONS | fixed                                   |
      |               | layout-boxed                            |
      |               | sidebar-collapse                        |
      |               | sidebar-mini                            |
      |---------------------------------------------------------|
    -->
    <body class="skin-yellow sidebar-mini fixed">
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
                        Vista general de ítems
                        <small></small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="/home"><i class="fa fa-home"></i>Inicio</a></li>
                        <li>items</li>
                        <li class="active">vista general</li>
                    </ol>
                </section>
                <section class="content">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="box collapsed-box bg-navy">
                                <div class="box-header">
                                	
                                    <h3 class="box-title" style="color:white">EPP 
                                    	@foreach($count1 as $c)
                                    	@if($c <56)
                                    		<i class="fa fa-exclamation-circle text-red"></i>
                                    	@endif
                                    	@endforeach
                                    	</h3>
                                    <div class="box-tools pull-right">
                                        <a href="#" class=" btn-box-tool" data-widget="collapse"><i style="color:white" class="fa fa-plus"></i></a>
                                    </div>
                                    <!-- /.box-tools -->
                                </div>
                                <!-- /.box-header -->
                                <div class="box-body">
                                	<div class="hidden">{{$aux = 0}}</div>
                                	@foreach($subcat as $s)
                                	@if($s->cat_id == 1)
                                	<div>
                                    	@if($count1[$aux] >= $s->alertLimit)
                                    	{{$s->name}} 
                                    	<div class="pull-right">{{$count1[$aux]}}/100</div>
                                    	<div class="progress xs">
                                        	<div class="progress-bar bg-green" style="width: {{$count1[$aux]}}%"></div>
                                    	</div>
                                    	@else
                                    	{{$s->name}} <i class="fa fa-exclamation-circle text-red"></i>
                                    	<div class="pull-right">{{$count1[$aux]}}/{{$count1[$aux]}}</div>
                                    	<div class="progress xs">
                                        	<div class="progress-bar bg-red" style="width: {{$count1[$aux]}}%"></div>
                                    	</div>	
                                    	@endif
                                    	<div class="hidden">{{$aux = $aux + 1}}</div>
                                    </div>
                                    @endif
                                    @endforeach
                                </div>
                            </div>
                            <!-- /.box -->
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="box collapsed-box bg-navy">
                                <div class="box-header">
                                    <h3 class="box-title" style="color:white">Suministros
                                        @foreach($count2 as $c)
                                        @if($c <56)
                                            <i class="fa fa-exclamation-circle text-red"></i>
                                        @endif
                                        @endforeach
                                        </h3>
                                    <div class="box-tools pull-right">
                                        <a href="#" class=" btn-box-tool" data-widget="collapse"><i style="color:white" class="fa fa-plus"></i></a>
                                    </div>
                                    <!-- /.box-tools -->
                                </div>
                                <!-- /.box-header -->
                                <div class="box-body">
                                	<div class="hidden">{{$aux =0}}</div>
                                	@foreach($subcat as $s)
                                	@if($s->cat_id == 1)
                                	<div>
                                    	@if($count2[$aux] >= $s->alertLimit)
                                    	{{$s->name}} 
                                    	<div class="pull-right">{{$count2[$aux]}}/100</div>
                                    	<div class="progress xs">
                                        	<div class="progress-bar bg-green" style="width: {{$count2[$aux]}}%"></div>
                                    	</div>
                                    	@else
                                    	{{$s->name}} <i class="fa fa-exclamation-circle text-red"></i>
                                    	<div class="pull-right">{{$count2[$aux]}}/{{$count2[$aux]}}</div>
                                    	<div class="progress xs">
                                        	<div class="progress-bar bg-red" style="width: {{$count2[$aux]}}%"></div>
                                    	</div>	
                                    	@endif
                                    	<div class="hidden">{{$aux = $aux + 1}}</div>
                                    </div>
                                    @endif
                                    @endforeach
                                </div>
                            </div>
                            <!-- /.box -->
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="box collapsed-box bg-navy">
                                <div class="box-header">
                                    <h3 class="box-title" style="color:white">Herramientas
                                        @foreach($count3 as $c)
                                        @if($c <56)
                                            <i class="fa fa-exclamation-circle text-red"></i>
                                        @endif
                                        @endforeach
                                        </h3>
                                    <div class="box-tools pull-right">
                                        <a href="#" class=" btn-box-tool" data-widget="collapse"><i style="color:white" class="fa fa-plus"></i></a>
                                    </div>
                                    <!-- /.box-tools -->
                                </div>
                                <!-- /.box-header -->
                                <div class="box-body">
                                	<div class="hidden">{{$aux = 0}}</div>
                                	@foreach($subcat as $s)
                                	@if($s->cat_id == 1)
                                	<div>
                                    	@if($count3[$aux] >= $s->alertLimit)
                                    	{{$s->name}} 
                                    	<div class="pull-right">{{$count3[$aux]}}/100</div>
                                    	<div class="progress xs">
                                        	<div class="progress-bar bg-green" style="width: {{$count3[$aux]}}%"></div>
                                    	</div>
                                    	@else
                                    	{{$s->name}} <i class="fa fa-exclamation-circle text-red"></i>
                                    	<div class="pull-right">{{$count3[$aux]}}/{{$count3[$aux]}}</div>
                                    	<div class="progress xs">
                                        	<div class="progress-bar bg-red" style="width: {{$count3[$aux]}}%"></div>
                                    	</div>	
                                    	@endif
                                    	<div class="hidden">{{$aux = $aux + 1}}</div>
                                    </div>
                                    @endif
                                    @endforeach
                                </div>
                            </div>
                            <!-- /.box -->
                        </div>
                    </div> 

                            <div class="box">
                                <div class="box-header">
                                    <h3 class="box-title">Tabla de subcategorias</h3>
                                </div>
                                <!-- /.box-header -->
                                <div class="box-body">
                                    <table id="items" class="table table-bordered table-striped datatable">
                                        <thead>
                                            <tr>
                                                <th>Nombre</th>
                                                <th>Descripcion</th>
                                                <th>Pertenece a</th>
                                                <th>En stock</th>
                                                <th>Límite para alertar</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <div class="hidden">{{$aux = 0}}</div>
                                        	@foreach($subcat as $sc)
                                            <tr>
                                                <td>{{$sc->name}}</td>
                                                <td>{{$sc->detail}}</td>
                                                <td>{{$sc->catR->name}}</td>
                                                @if($scount[$aux] < $sc->alertLimit)
                                                    <td style="color:red">{{$scount[$aux]}}</td>
                                                @else
                                                    <td>{{$scount[$aux]}}</td>
                                                @endif
                                                <td>{{$sc->alertLimit}}</td>
                                            </tr>
                                            <div class="hidden">{{$aux = $aux + 1}}</div>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <!-- /.box-body -->
                            </div>                   

                </section>

                <!-- /. main content -->
                <span class="return-up"><i class="fa fa-chevron-up"></i></span>
            </div>
            <!-- /. content-wrapper -->
            <!-- Main Footer -->
            @include('layouts.footer')
            @include('admin.edit_modal')

        </div>
        <!-- /. wrapper content-->
        <!-- JS scripts -->
        <script src="{{asset('jQuery/jquery-2.2.3.min.js')}}"></script>
        <script src="{{asset('js/jquery-fullscreen/jquery.fullscreen-min.js')}}"></script>
        <script src="{{asset('bootstrap/js/bootstrap.min.js')}}"></script>
        <script src="{{asset('js/slimScroll/jquery.slimscroll.min.js')}}"></script>
        <script src="{{asset('js/fastclick/fastclick.min.js')}}"></script>
        <!-- DataTables -->
        <script src="{{asset('datatables/jquery.dataTables.min.js')}}"></script>
        <script src="{{asset('datatables/dataTables.bootstrap.min.js')}}"></script>
        <script src="{{asset('js/sweetalert/sweetalert.min.js')}}"></script>
        <script src="{{asset('/responsive-tables/responsivetables.js')}}"></script>
        <script src="{{asset('js/app2.js')}}"></script>
        <!-- Slimscroll is required when using the fixed layout. -->

    </body>
</html>

<script type="text/javascript">

	$(function () {
    $('.datatable').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": true,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "scrollX": true
    });

});

</script>