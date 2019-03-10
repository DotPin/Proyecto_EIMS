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
                            <div class="box">
                                <div class="box-header with-border">
                                    <h3 class="box-title">Suministros</h3>
                                </div>
                                <div class="box-body">
                                    <canvas id="bar-chart" height="40"></canvas>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="box">
                                <div class="box-header with-border">
                                    <h3 class="box-title">Elementos de protección personal</h3>
                                </div>
                                <div class="box-body">
                                    <canvas id="bar-chart2" height="40"></canvas>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="box">
                                <div class="box-header with-border">
                                    <h3 class="box-title">Herramientas</h3>
                                </div>
                                <div class="box-body">
                                    <canvas id="bar-chart3" height="40"></canvas>
                                </div>
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
$(function () {
    new Chart(document.getElementById("bar-chart").getContext("2d"), getChartJs('bar'));
    new Chart(document.getElementById("bar-chart2").getContext("2d"), getChartJs('bar'));
    new Chart(document.getElementById("bar-chart3").getContext("2d"), getChartJs('bar'));

});

function getChartJs(type) {
    var config = null;
    if (type === 'doughnut') {
        config = {
            type: 'doughnut',
            data: {
                labels: ["Africa", "Asia", "Europe", "Latin America", "North America"],
                datasets: [
                    {
                        label: "Doughnut chart",
                        backgroundColor: ["#3e95cd", "#8e5ea2", "#3cba9f", "#e8c3b9", "#c45850"],
                        data: [2478, 5267, 734, 784, 433]
                    }
                ]
            },
            options: {
                title: {
                    display: true,
                }
            }
        }
    } else if (type === 'bar') {
        config = {
            type: 'bar',
            data: {
                labels: ["item1", "item2", "item3", "item4", "item5"],
                datasets: [
                    {
                        label: "Bar Chart",
                        backgroundColor: ["#3e95cd", "#8e5ea2", "#3cba9f", "#e8c3b9", "#c45850"],
                        data: [48, 37, 85, 100, 62]
                    }
                ]
            },
            options: {
                legend: {display: false},
                title: {
                    display: true,
                }
            }
        }
    } else if (type === 'radar') {
        config = {
            type: 'polarArea',
            data: {
                labels: ["Africa", "Asia", "Europe", "Latin America", "North America"],
                datasets: [
                    {
                        label: "Polar Area",
                        backgroundColor: ["#3e95cd", "#8e5ea2", "#3cba9f", "#e8c3b9", "#c45850"],
                        data: [2478, 3267, 1734, 1784, 1433]
                    }
                ]
            },
            options: {
                title: {
                    display: true,
                }
            }
        }
    } else if (type === 'polar') {
        config = {
            type: 'polarArea',
            data: {
                labels: ["Africa", "Asia", "Europe", "Latin America", "North America"],
                datasets: [
                    {
                        label: "Polar Area",
                        backgroundColor: ["#3e95cd", "#8e5ea2", "#3cba9f", "#e8c3b9", "#c45850"],
                        data: [2478, 3267, 1734, 1784, 1433]
                    }
                ]
            },
            options: {
                title: {
                    display: true,
                }
            }
        }
    }
    return config;
}



</script>