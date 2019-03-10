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
                        Lista de trabajadores
                        <small></small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="/home"><i class="fa fa-home"></i>Inicio</a></li>
                        <li>Trabajadores</li>
                        <li class="active">Lista</li>
                    </ol>
                </section>
                <section class="content">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="box">
                                <div class="message"></div>
                                <!-- /.box-header -->
                                <div class="box-body table-responsive no-padding">
                                    <table class="table table-hover">
                                            <tr>
                                                <th>#</th>
                                                <th>Nombre</th>
                                                <th>Apellido</th>
                                                <th>Tipo</th>
                                                <th>Cargo</th>
                                                <th>Email</th>
                                                <th>Telefono</th>
                                                <th>Estado</th>
                                                <th>Acción</th>
                                            </tr>
                                        @foreach($users as $item)
                                            <tr>
                                                <td><a href="#">{{$item->id}}</a></td>
                                                <td>{{$item->name}}</td>
                                                <td>{{$item->lName}}</td>
                                                <td>{{$item->type}}</td>
                                                <td>{{$item->charge}}</td>
                                                <td>{{$item->email}}</td>
                                                <td>{{$item->phone}}</td>
                                                @if($item->status == "active")
                                                <td><span class="label label-success">Activo</span></td>
                                                @else
                                                <td><span class="label label-danger">Bloqueado</span></td>
                                                @endif
                                                <td>
                                                    <a href="#!" id="{{$item->id}}" class="model-open-edit fa fa-pencil-square-o text-blue" aria-hidden="true" data-toggle="modal" data-target="#modal-default"></a>
                                                    <a href="#" id="{{$item->id}}" name="{{$item->name}} {{$item->lName}}" class="delete fa fa-trash text-red" aria-hidden="true"></a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </table>
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
        <script>
            $(document).ready(function(){

            $(function () {
                $("#payments").DataTable();
            });

            $('#btn_update').on('click',function(e){


                e.preventDefault();

                var name = $('#name').val();
                var lName = $('#lName').val();
                var type = $('#type').val();
                var charge = $('#charge').val();
                var phone = $('#phone').val();
                var email = $('#email').val();
                var status = $('#status').val();

                $.ajax({
                    // En data puedes utilizar un objeto JSON, un array o un query string
                   data:{name:name, lName:lName, type:type, charge:charge, phone:phone, email:email, status:status, "_token": "{{ csrf_token() }}"},
                    //Cambiar a type: POST si necesario
                    type: 'PUT',
                    // Formato de datos que se espera en la respuesta
                    dataType: "json",
                    // URL a la que se enviará la solicitud Ajax
                    url: '/admin/update-worker' ,
                    success:function(json){
                        $('#modal-default').modal('hide');
                        window.location.assign('list');



               }
                }); 

            });

           $('table').on('click','.delete', function(e){

                var id = $(this).attr('id');
                var name = $(this).attr('name');
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
                    url: '/admin/destroy-worker' , 
                    success: function(json){
                        swal({
                            title:"Usuario eliminado!!",
                            text: name+ "ha sido removid@ de los registros EIMS",
                            type: "success",
                            html: true,
                        }, function () {
                                window.location.href = "list";
                        });
                            } 
                        });
                    });

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
                    url: '/admin/edit-worker' ,
                    success : function(json) {


                    $('#name').val(json.name);
                    $('#lName').val(json.lName);
                    $('#type').val(json.type);
                    $('#charge').val(json.charge);
                    $('#email').val(json.email);
                    $('#phone').val(json.phone);
                    $('#status').val(json.status);


                        }
                    }); 

                 });

            });

        </script>
    </body>
</html>