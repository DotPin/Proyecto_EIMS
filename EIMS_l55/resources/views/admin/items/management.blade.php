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
                        Administrar
                        <small></small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="/home"><i class="fa fa-home"></i>Inicio</a></li>
                        <li>Items</li>
                        <li class="active">Administrar</li>
                    </ol>
                </section>
                <section class="content">

                    <div class="row">
                        <div class="col-sm-6 col-lg-3">
                            <div id="create" class="info-box btn btn-default" type="button">
                                <div class="info-box-content">
                                    <i class="fa fa-barcode text-navy pull-left"></i>
                                    <div class="text-center value">Agregar</div>
                                </div>
                            </div>
                        </div>
                        <!--/.col-->
                    </div>


                    <div class="row">
                        <div class="col-xs-12">
                            <div class="box">
                                <div class="message"></div>
                                <!-- /.box-header -->
                            <div class="box">
                                <div class="box-header">
                                    <h3 class="box-title">Tabla de ítems</h3>
                                </div>
                                <!-- /.box-header -->
                                <div class="box-body">
                                    <table id="items" class="table table-bordered table-striped datatable">
                                        <thead>
                                            <tr>
                                                <th>Foto</th>
                                                <th>Nombre</th>
                                                <th>Descripción</th>
                                                <th>Categoría</th>
                                                <th>Subcategoría</th>
                                                <th>BarCode</th>
                                                <th>Acción</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($items as $i)
                                            <tr>
                                                <td><center><img src="{{$i->itemImg}}" height="100px" width="100px"></td>
                                                <td>{{$i->name}}</td>
                                                <td>{{$i->description}}</td>
                                                <td>{{$i->categoryR->name}}</td>
                                                <td>{{$i->subCatR->name}}</td>
                                                <td><img src="/img/{{$i->IBC}}"></td>
                                                <td>
                                                    <a href="#!" id="{{$i->id}}" class="model-open-edit fa fa-pencil-square-o fa-2x text-blue" aria-hidden="true" data-toggle="modal" data-target="#modal-default"></a>
                                                    <a href="#" id="{{$i->id}}" name="{{$i->name}}" class="delete fa fa-trash fa-2x text-red" aria-hidden="true"></a>
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
            @include('admin.items.edit_modal')
            @include('admin.items.create_modal')
           

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

            $('.datatable').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": true,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "scrollX": true
            });

            /*var createModal = $("#modal-create");
            $('#create').on('click',function(e){
                e.preventDefault();
                createModal.modal("show");
            });*/

            $('#btn_update').on('click',function(e){


                e.preventDefault();
                var id = $('#id').val();
                var name = $('#name').val();
                var category = $('#category').val();
                var subcat = $('#subcat').val();
                var description = $('#description').val();

                $.ajax({
                    // En data puedes utilizar un objeto JSON, un array o un query string
                   data:{id:id, name:name, category:category, subcat:subcat, description:description, "_token": "{{ csrf_token() }}"},
                    //Cambiar a type: POST si necesario
                    type: 'PUT',
                    // Formato de datos que se espera en la respuesta
                    dataType: "json",
                    // URL a la que se enviará la solicitud Ajax
                    url: '/admin/items/update-item' ,
                    success:function(json){
                        $('#modal-default').modal('hide');
                        swal({
                            title:"Item modificado!!",
                            text: "Se han guardado los cambios para "+name,
                            type: "success",
                            html: true,
                        }, function () {
                                window.location.href = "management";
                        });



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
                    url: '/admin/items/destroy' , 
                    success: function(json){
                        swal({
                            title:"Item borrado!!",
                            text: "El item "+name+" ha sido eliminado de los registros EIMS",
                            type: "success",
                            html: true,
                        }, function () {
                                window.location.href = "management";
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
                    url: '/admin/items/edit-item' ,
                    success : function(json) {


                    $('#id').val(json.id);
                    $('#name').val(json.name);
                    $('#category').val(json.cat_id);
                    $('#subcat').val(json.subCat_id);
                    $('#description').val(json.description);



                        }
                    }); 

                 });



            });

        </script>
    </body>
</html>