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
                        Lista de Proveedores
                        <small></small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="/home"><i class="fa fa-home"></i>Inicio</a></li>
                        <li>Proveedoress</li>
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
                                                <th>Compañia</th>
                                                <th>Direccion</th>
                                                <th>Email</th>
                                                <th>Telefono</th>
                                                <th>Acción</th>
                                            </tr>
                                        @foreach($sup as $item)
                                            <tr>
                                                <td><a href="#">{{$item->id}}</a></td>
                                                <td>{{$item->name}}</td>
                                                <td>{{$item->company}}</td>
                                                <td>{{$item->address}}</td>
                                                <td>{{$item->email}}</td>
                                                <td>{{$item->phone}}</td>
                                                
                                                <td>
                                                    <a href="#!" id="{{$item->id}}" class="model-open-edit fa fa-pencil-square-o text-blue" aria-hidden="true" data-toggle="modal" data-target="#modal-default"></a>
                                                    <a href="#" id="{{$item->id}}" name="{{$item->name}} {{$item->company}}" class="delete fa fa-trash text-red" aria-hidden="true"></a>
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
            @include('admin.edit_modal_supplier')

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
                var company = $('#company').val();
                var address = $('#address').val();
                var phone = $('#phone').val();
                var email = $('#email').val();
                
                $.ajax({
                    // En data puedes utilizar un objeto JSON, un array o un query string
                   data:{name:name, company:company, address:address, phone:phone, email:email, "_token": "{{ csrf_token() }}"},
                    //Cambiar a type: POST si necesario
                    type: 'PUT',
                    // Formato de datos que se espera en la respuesta
                    dataType: "json",
                    // URL a la que se enviará la solicitud Ajax
                    url: '/admin/update-supplier' ,
                    success:function(json){
                        $('#modal-default').modal('hide');
                        window.location.assign('supplier-list');



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
                    url: '/admin/destroy-supplier' , 
                    success: function(json){
                        swal("Borrado!", name+" ha sido borrado", "success");
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
                    url: '/admin/edit-supplier' ,
                    success : function(json) {


                    $('#name').val(json.name);
                    $('#company').val(json.company);
                    $('#address').val(json.address);
                    $('#email').val(json.email);
                    $('#phone').val(json.phone);
                       }
                    }); 

                 });

            });

        </script>
    </body>
</html>
