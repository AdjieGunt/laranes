<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>{{ $title }}</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="{{ asset("bower_components/bootstrap/dist/css/bootstrap.min.css") }}">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset("bower_components/font-awesome/css/font-awesome.min.css") }}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="{{ asset("bower_components/Ionicons/css/ionicons.min.css") }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset("bower_components/admin-lte/dist/css/AdminLTE.min.css") }}">


  <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
        page. However, you can choose any other skin. Make sure you
        apply the skin class to the body tag so the changes take effect. -->
  <link rel="stylesheet" href="{{ asset("bower_components/admin-lte/dist/css/skins/skin-black.min.css") }}">

  <!-- DataTables -->
  <link rel="stylesheet" href="{{ asset("bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css") }}">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<!--
BODY TAG OPTIONS:
=================
Apply one or more of the following classes to get the
desired effect
|---------------------------------------------------------|
| SKINS         | skin-blue                               |
|               | skin-black                              |
|               | skin-purple                             |
|               | skin-yellow                             |
|               | skin-red                                |
|               | skin-green                              |
|---------------------------------------------------------|
|LAYOUT OPTIONS | fixed                                   |
|               | layout-boxed                            |
|               | layout-top-nav                          |
|               | sidebar-collapse                        |
|               | sidebar-mini                            |
|---------------------------------------------------------|
-->
<body class="hold-transition skin-black   sidebar-mini">
<div class="wrapper">

  <!-- Main Header -->
    @include('header')


  <!-- Left side column. contains the logo and sidebar -->
  @include('sidebar')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        {{ $title }}
        <!-- <small>Optional description</small> -->
      </h1>
      <!-- <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
        <li class="active">Here</li>
      </ol> -->
    </section>

    <!-- Main content -->
    <section class="content container-fluid">

    @yield('content')

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Main Footer -->
    @include('footer')

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Create the tabs -->
    <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
      <li class="active"><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
      <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
    </ul>
    <!-- Tab panes -->
    <div class="tab-content">
      <!-- Home tab content -->
      <div class="tab-pane active" id="control-sidebar-home-tab">
        <h3 class="control-sidebar-heading">Recent Activity</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript:;">
              <i class="menu-icon fa fa-birthday-cake bg-red"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>

                <p>Will be 23 on April 24th</p>
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

        <h3 class="control-sidebar-heading">Tasks Progress</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript:;">
              <h4 class="control-sidebar-subheading">
                Custom Template Design
                <span class="pull-right-container">
                    <span class="label label-danger pull-right">70%</span>
                  </span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

      </div>
      <!-- /.tab-pane -->
      <!-- Stats tab content -->
      <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
      <!-- /.tab-pane -->
      <!-- Settings tab content -->
      <div class="tab-pane" id="control-sidebar-settings-tab">
        <form method="post">
          <h3 class="control-sidebar-heading">General Settings</h3>

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Report panel usage
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Some information about this general settings option
            </p>
          </div>
          <!-- /.form-group -->
        </form>
      </div>
      <!-- /.tab-pane -->
    </div>
  </aside>
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
  immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->


<!-- REQUIRED JS SCRIPTS -->

<!-- jQuery 3 -->
<script src="{{ asset("bower_components/jquery/dist/jquery.min.js") }}"></script>
<!-- Bootstrap 3.3.7 -->
<script src="{{ asset("bower_components/bootstrap/dist/js/bootstrap.min.js") }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset("bower_components/admin-lte/dist/js/adminlte.min.js") }}"></script>
<!-- DataTables -->
<script src="{{ asset("bower_components/datatables.net/js/jquery.dataTables.min.js") }}"></script>
<script src="{{ asset("bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js") }}"></script>
<!-- page script -->
<script>
  $(function () {
    // $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : false,
      'info'        : true,
      'autoWidth'   : false
    })

    $('#add_product_field').on('click', function(){
        // console.log('klik tambah product');
        var product_field = $(this).closest('.row.product_field').clone(true);
        console.log($(this));
        $(this).closest('.row.product_field').after(product_field);
    })

  })
</script>

<script>

// A $( document ).ready() block.
$( document ).ready(function() {
    console.log( "ready!" );
    
    var product_id = null;
    var product_pkg = null;
    var current_stock = 0;

    $('#sell_out_prod_id').change(function() {
      console.log($(this).val());

      product_id = $(this).val();
  
      $.ajax({
        url: "/check_stock?product_id="+product_id,
        type: "GET",
        success: function(data) {
          console.log(data);
          //sell_out_prod_pkg
          $('#sell_out_prod_pkg').removeAttr('disabled');
        
          var option_pkg = '<option val="">Choose Package ..</option>';
          var option_color_base = '<option val="">Choose Color ..</option>';
          var color_opt = "";
          for(var i=0; i < data.length; i++) {
            console.log(data[i]);
            option_pkg += '<option val="'+data[i].stock_product_package+'">' +data[i].stock_product_package+'</option>';
      
          }
          
          $('#sell_out_prod_pkg').html("");
          $('#sell_out_prod_pkg').append(option_pkg);

        }
      });
    });

    $('#sell_out_prod_pkg').change(function(){
      product_pkg = $(this).val();
      console.log(product_pkg);
      $.ajax({
        url: "/check_stock?product_id="+product_id+"&product_pkg="+product_pkg,
        type: "GET",
        success: function(data) {
          console.log(data);
          //sell_out_prod_pkg
    
          $('#sell_out_color_base').removeAttr('disabled');
          
          var option_color_base = '<option val="">Choose Color ..</option>';
          var color_opt = "";
          for(var i=0; i < data.length; i++) {
            console.log(data[i]);
      
            if(color_opt !== data[i].stock_product_color_base) {
              option_color_base += '<option val="'+data[i].stock_product_color_base+'">' + data[i].stock_product_color_base +'</option>';                
            }              
            color_opt = data[i].stock_product_color_base;
          }

          $('#sell_out_color_base').html("");
          $('#sell_out_color_base').append(option_color_base);
        }
      })
    })

    $('#sell_out_color_base').change(function(){
      product_color_base = $(this).val();
      console.log(product_color_base);
      $.ajax({
        url: "/check_stock?product_id="+product_id+"&product_pkg="+product_pkg+"&product_color_base="+product_color_base,
        type: "GET",
        success: function(data) {
          console.log(data);
          $('#sell_out_qty').removeAttr("disabled");
          $('#sell_out_color_name').removeAttr("disabled");
          $('.info_stock').html("Current Stock : "+ data[0].stock_product_qty);
          current_stock = data[0].stock_product_qty;
        }
      })
    })

    $('#sell_out_qty').change(function(){
      if($(this).val() > current_stock) {
        console.log("Gak boleh lebih dari " + current_stock);
        $(this).val(current_stock);
      }
    });

    var pilih = function(id){
      console.log(id);
    }

    $('#sell_out_cari_customer').click(function(){
      var customer_search = $('#sell_out_customer');
      // customer_search.attr('disabled', true);
      
      $.ajax({
        url: "/search_customers",
        type: "GET",
        data: { q : customer_search.val()},
        success: function(data) {
          console.log(data);
          if(data.length > 0){
            var td = '<td>:data</td>';
            var tr = '<tr>:td</tr>'; 
            var thead = '<thead><tr><th>ID</th><th>Nama</th><th>Alamat</th><th>Pilih</th></tr>';
            var custTable = '<table class="table">'+thead+'<tbody>:body</tbody></table>';
            var custTableData = '';
            for(i=0; i < data.length; i++){
              var _ = data[i];
              custTableData += '<tr>';
              custTableData += td.replace(':data', _.customer_id);
              custTableData += td.replace(':data', _.customer_name);
              custTableData += td.replace(':data', _.customer_address);
              custTableData += td.replace(':data', '<button onclick="pilih(`'+_.customer_name+'`,'+_.customer_id+')" class="btn-pilih btn btn-primary btn-sm">Pilih</button>');
              custTableData += '</tr>';
            }
            $('#customer_modal_body').html(custTable.replace(':body', custTableData));
          }
          $('#customers_search_modal').modal('show');
        }
      });

      console.log('cari customer', customer_search.val());
    });

    $('.btn-pilih').click(function(){
      console.log($(this).attr('data-id'));
    });

    $('#new_customer_modal').click(function(){
      $('#new_customer_modal').modal('show');
    })

    
});

var pilih = function(name, id){
  $('#sell_out_customer').val(name);
  $('#sell_out_customer_hide').val(id);
  $('#customers_search_modal').modal('hide');
}


</script>

<!-- Optionally, you can add Slimscroll and FastClick plugins.
     Both of these plugins are recommended to enhance the
     user experience. -->
</body>
</html>