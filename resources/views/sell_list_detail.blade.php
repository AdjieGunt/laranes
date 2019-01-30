@extends('admin_template')

@section('content')
    <div class='row'>
        <div class='col-md-12'>
            <!-- Box -->
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">
                        <small class="label bg-green"> 
                            <i class="fa fa-calendar-check-o"></i> {{ $sell_in_data->sell_created_date }}
                        </small>
                        
                    </h3>
                </div>
                <div class="box-body">
                @if(\Session::has('success'))
                    <div class="alert alert-success alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <h4><i class="icon fa fa-info"></i> Success!</h4>
                        {{ \Session::get('success')}}
                    </div>
                @endif
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>ID</th>
                  <th>Sell In Create Date</th>
                  <th>Product Name</th>
                  <th>Product Packages</th>                  
                  <th>Product Qty</th>
                  <th>Color Base</th>
                  <!-- <th>Action</th> -->
                </tr>
                </thead>
                <tbody>
                    <!-- <tr>
                        <td>1</td>
                        <td>2018-02-08</td>
                        <td>Pentalite</td>
                        <td>20 L</td>
                        <td>10</td>
                        <td>A</td>
                        <td><button class="btn btn-danger btn-sm">Delete</button></td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>2018-02-08</td>
                        <td>Pentalite</td>
                        <td>20 L</td>
                        <td>10</td>
                        <td>A</td>
                        <td><button class="btn btn-danger btn-sm">Delete</button></td>
                    </tr> -->
                @foreach($sell_in as $data)
                    <tr>
                        <td>{{ $data['sell_products_detail_id'] }}</td>
                        <td>{{ $data['sell_products_detail_created_date'] }}</td>
                        <td>{{ $data['product_name'] }}</td>
                        <td>{{ $data['sell_products_detail_product_packages'] }}</td>
                        <td>{{ $data['sell_products_detail_product_qty'] }}</td>
                        <td>{{ $data['sell_products_detail_product_base'] }}</td>
                        <!-- <td><button class="btn btn-danger btn-sm">Delete</button></td> -->
                    </tr>
                @endforeach
                </tbody>
              </table>
            </div>
            </div><!-- /.box -->
        </div><!-- /.col -->
    
    </div><!-- /.row -->
@endsection