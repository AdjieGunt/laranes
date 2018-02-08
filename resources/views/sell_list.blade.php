@extends('admin_template')

@section('content')
    <div class='row'>
        <div class='col-md-12'>
            <!-- Box -->
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Sell In </h3>
                </div>
                <div class="box-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>ID</th>
                  <th>Sell In Date</th>
                  <th>Product Name</th>
                  <th>Product Packages</th>                  
                  <th>Product Qty</th>
                  <th>Color Base</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                    <tr>
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
                    </tr>
                </tbody>
              </table>
            </div>
            </div><!-- /.box -->
        </div><!-- /.col -->
    
    </div><!-- /.row -->
@endsection