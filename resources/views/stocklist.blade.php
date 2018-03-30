@extends('admin_template')

@section('content')

@include('checkstock')

    <div class='row'>
        <div class='col-md-12'>
            <!-- Box -->
            <div class="box box-success">
                <!-- <div class="box-header with-border">
                    <h3 class="box-title">Sell In </h3>
                </div> -->
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
                  <th>Stock ID</th>
                  <th>Product ID</th>
                  <th>Product Name</th>                  
                  <th>Product Color Base</th>                  
                  <th>Product Packages</th>
                  <th>Total Qty</th>
                </tr>
                </thead>
                <tbody>
                @foreach($sell_in as $data)
                    <tr>
                        <td>{{ $data->stock_id }}</td>
                        <td>{{ $data->stock_product_id }}</td> 
                        <td>{{ $data->product_name }}</td>                                                                                                                       
                        <td>{{ $data->stock_product_color_base }}</td>                        
                        <td>{{ $data->stock_product_package }}</td>
                        <td>{{ $data->stock_product_qty }}</td>
                    </tr>
                @endforeach
                </tbody>
              </table>
            </div>
            </div><!-- /.box -->
        </div><!-- /.col -->
    
    </div><!-- /.row -->
@endsection