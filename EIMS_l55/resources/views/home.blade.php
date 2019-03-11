@include('layouts.header')
    <!-- Icons -->
    <link href="{{asset('icons/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{asset('icons/themify-icons/themify-icons.css')}}" rel="stylesheet">
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
            Bienvenido al portal administrativo
            <small></small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-home"></i>Inicio </a></li>
          </ol>
        </section>
                <section class="content">
                    <div class="row">
                        <div class="col-md-12">
                        <div class="col-sm-6 col-lg-3">
                            <div class="info-box">
                                <div class="info-box-content">
                                    <i class="fa fa-truck text-navy"></i>
                                    <div class="text-center value">5</div>
                                    <div class="text-muted text-uppercase text-center">Proveedores</div>
                                </div>
                            </div>
                        </div>
                        <!--/.col-->
                        <div class="col-sm-6 col-lg-3">
                            <div class="info-box">
                                <div class="info-box-content">
                                    <i class="fa fa-user text-light-blue"></i>
                                    <div class="text-center value">{{$userc}}</div>
                                    <div class="text-muted text-uppercase text-center">Trabajadores</div>
                                </div>
                            </div>
                        </div>
                        <!--/.col-->
                        <div class="col-sm-6 col-lg-3">
                            <div class="info-box">
                                <div class="info-box-content">
                                    <i class="fa fa-handshake-o text-maroon"></i>
                                    <div class="text-center value">12</div>
                                    <div class="text-muted text-uppercase text-center">Prestamos activos</div>
                                </div>
                            </div>
                        </div>
                        <!--/.col-->
                        <div class="col-sm-6 col-lg-3">
                            <div class="info-box">
                                <div class="info-box-content">
                                    <i class="fa fa-undo text-green"></i>
                                    <div class="text-center value">6</div>
                                    <div class="text-muted text-uppercase text-center">Devoluciones hoy</div>
                                </div>
                            </div>
                        </div>              
                        </div>         
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                        <div class="col-sm-6 col-lg-3">
                            <div class="info-box2 bg-blue">
                                <div class="info-box-content">
                                    <span class="info-box-text">situación general</span>
                                    <span class="info-box-number">{{$itemc}}/2000</span>
                                    <div class="progress">
                                        <div class="progress-bar" style="width: {{$itemc*100/2000}}%"></div>
                                    </div>
                                    <span class="progress-description">
                                        {{$itemc*100/2000}}% de capacidad total
                                    </span>
                                    <hr>
                                    @if($status1 > 0 or $status2 > 0 or $status3 > 0)
                                   <span class="progress-description bg-red badge">
                                        Estado: {{$status1 + $status2 + $status3}} alerta(s) 
                                    @else
                                    <span class="progress-description bg-purple badge">
                                        Estado: OK
                                    @endif
                                    </span>                                    
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                            <!-- /.info-box -->
                        </div>
                        <div class="col-sm-6 col-lg-3">
                            <div class="info-box2 bg-navy">
                                <div class="info-box-content">
                                    <span class="info-box-text">EPP</span>
                                    <span class="info-box-number">{{$icepp}}</span>
                                    <div class="progress">
                                        <div class="progress-bar" style="width: {{$icepp*100/2000}}%"></div>
                                    </div>
                                    <span class="progress-description">
                                        {{$icepp*100/2000}}% de capacidad total
                                    </span>
                                    <hr>
                                    @if($status1 > 0)
                                   <span class="progress-description bg-red badge">
                                        Estado: {{$status1}} alerta(s) 
                                    @else
                                    <span class="progress-description bg-purple badge">
                                        Estado: OK
                                    @endif
                                    </span>                                   
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                            <!-- /.info-box -->
                        </div>
                        <div class="col-sm-6 col-lg-3">
                            <div class="info-box2 bg-teal">
                                <div class="info-box-content">
                                    <span class="info-box-text">Suministros</span>
                                    <span class="info-box-number">{{$icsup}}</span>
                                    <div class="progress">
                                        <div class="progress-bar" style="width: {{$icsup*100/2000}}%;"></div>
                                    </div>
                                    <span class="progress-description">
                                        {{$icsup*100/2000}}% de la capacidad total
                                    </span>
                                    <hr>
                                    @if($status2 > 0)
                                   <span class="progress-description bg-red badge">
                                        Estado: {{$status2}} alerta(s) 
                                    @else
                                    <span class="progress-description bg-purple badge">
                                        Estado: OK
                                    @endif
                                    </span>                                   
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                            <!-- /.info-box -->
                        </div>
                        <div class="col-sm-6 col-lg-3">
                            <div class="info-box2 bg-green">
                                <div class="info-box-content">
                                    <span class="info-box-text">Herramientas</span>
                                    <span class="info-box-number">{{$ictool}}</span>
                                    <div class="progress">
                                        <div class="progress-bar" style="width: {{$ictool*100/2000}}%"></div>
                                    </div>
                                    <span class="progress-description">
                                        {{$ictool*100/2000}}% de la capacidad total
                                    </span>
                                    <hr>
                                    @if($status3 > 0)
                                   <span class="progress-description bg-red badge">
                                        Estado: {{$status3}} alerta(s) 
                                    @else
                                    <span class="progress-description bg-purple badge">
                                        Estado: OK
                                    @endif
                                    </span>                                    
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                            <!-- /.info-box -->
                        </div>
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
    <script src="{{asset('js/fastclick/fastclick.min.js')}}"></script>
    <script src="{{asset('js/jquery-fullscreen/jquery.fullscreen-min.js')}}"></script>
    <script src="{{asset('bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('js/slimScroll/jquery.slimscroll.min.js')}}"></script>
    <script src="{{asset('raphael/raphael.min.js')}}"></script>
    <script src="{{asset('js/chartjs/Chart.min.js')}}"></script>
    <script src="{{asset('js/sparkline/jquery.sparkline.min.js')}}"></script>
    <script src="{{asset('js/app2.js')}}"></script>
    <!-- Slimscroll is required when using the fixed layout. -->
  </body>
</html>

<script type="text/javascript">

</script>