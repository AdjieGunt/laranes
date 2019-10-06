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
              <tr>
                  <td>
                    <form role="form" action="{{url('/product_add')}}" method="POST">
                      <input type="hidden" value="{{csrf_token()}}" name="_token" />
                      <div class="row">
                        <div class="col-md-8">
                          <div class="form-group">
                            <label for="product_name">Product Name</label>
                            <input required type="text" class="form-control" id="product_name" placeholder="Product Name" name="product_name">
                          </div>
                        </div>
                        <div class="col-md-8 mt-4">
                          <div class="form-group">
                            <label for="product_name">Product Code</label>
                            <input required type="text" class="form-control" id="product_code" placeholder="Product Code" name="product_code">
                          </div>
                        </div>
                        <div class="form-group">
                          <div class="col-md-8 mt-5">
                            <button type="submit" class="btn btn-info">Save Product</button>
                          </div>
                        </div>
                      </div>
                    </form>
                  </td>
                </tr>
                @foreach($product as $row)
                  <tr>
                    <td>{{ $row['product_name'] }} ({{ $row['product_code'] }}) <a href="/products/delete/{{$row['product_id']}}"  class="btn btn-sm btn-danger pull-right">Hapus</a></td>
                  </tr>
                @endforeach
              </table>

            </div>
          </div>
        </div>
    </div>
@endsection

@section('custom_script')
<script>
  // $( document ).ready(function() {
    var deleteProduct = function(){
      console.log('sda');
    }
  // })
</script>
@endsection