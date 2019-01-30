@extends('admin_template')

@section('content')
    <div class='row'>
        <div class='col-md-5'>
          <!-- Box -->
          <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">
                    Product
                </h3>
            </div>
            <div class="box-body">
              <table id="example2" class="table table-bordered table-hover">
                @foreach($product as $row)
                  <tr>
                    <td>{{ $row['product_name'] }} <button class="btn btn-sm btn-danger pull-right">Hapus</button></td>
                  </tr>
                @endforeach
                <tr>
                  <td>
                    <form role="form" action="{{url('/product_add')}}" method="POST">
                      <input type="hidden" value="{{csrf_token()}}" name="_token" />
                      <div class="row">
                        <div class="col-md-8">
                          <input type="text" class="form-control" id="product_name" placeholder="Product Name" name="product_name">
                        </div>
                        <div class="col-md-4">
                          <button type="submit" class="btn btn-info">Add</button>
                        </div>
                      </div>
                    </form>
                  </td>
                </tr>
              </table>

            </div>
          </div>
        </div>
    </div>
@endsection