@extends('admin_template')

@section('content')
    <div class='row'>
        <div class='col-md-12'>
            <!-- Box -->
            <div class="box {{ $sell_flag == 'In' ? 'box-primary' : 'box-danger'}}">
                <div class="box-header with-border">
                    <h3 class="box-title">Sell {{ $sell_flag }} </h3>
                </div>
                <div class="box-body">
                @if(\Session::has('success'))
                    <div class="alert alert-success alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <h4><i class="icon fa fa-info"></i> Success!</h4>
                        {{ \Session::get('success')}}
                    </div>
                @endif
                @if (\Request::is('sell_out_list'))
                <div class="col-md-8">
                    <div class="form-group">
                        <label>Cari Customer</label>
                        <div class="row">
                          <form role="form" action="{{url('/sell_out_list')}}" method="GET">
                        
                            <div class="col-md-8">
                                <div class="form-group">
                                    <input type="text" name="customer"  placeholder="Masukan Id atau nama" class="form-control" id="customer"/>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary" id="cari_customer">Cari Customer</button>
                                </div>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
                @endif
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>Sell {{ $sell_flag }} ID</th>
                  <th>Sell {{ $sell_flag }} Input Date</th>
                  @if (\Request::is('sell_out_list'))
                    <th>Customer Name (ID)</th>
                  @endif                  
                  <!-- <th>Total Product</th> -->
                  <th>Total Qty</th>
                  <th>Created By</th>                  
                  <!-- <th>A</th>
                  <th>Color Base</th> -->
                  <th>Action</th>
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
                        <td>{{ $data['sell_id'] }}</td>
                        <td>{{ $data['sell_created_date'] }}</td>
                        @if (\Request::is('sell_out_list'))
                            <td>{{ $data['customer_name'] }} ({{ $data['customer_id'] }})</td>
                        @endif                              
                        <!-- <td>{{ $data['total_product'] }}</td> -->
                        <td>{{ $data['total_qty'] }}</td>
                        <td>{{ $data['username'] }}</td>
                        <td>
                        @if (\Request::is('sell_in_list'))
                        <a class="btn btn-primary btn-sm"  
                                href="{{ url('sell_in_list/'. $data['sell_id'] .'/detail') }}">Detail</a></td>
                        @else
                        <a class="btn btn-danger btn-sm"  
                                href="{{ url('sell_out_list/'. $data['sell_id'] .'/detail') }}">Detail</a></td>
                        @endif
                    </tr>
                @endforeach
                </tbody>
              </table>
            </div>
            </div><!-- /.box -->
        </div><!-- /.col -->
    
    </div><!-- /.row -->
@endsection