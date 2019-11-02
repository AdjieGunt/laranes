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
                <form role="form" action="{{url('/sell_save')}}" method="POST">
                <input type="hidden" value="{{csrf_token()}}" name="_token" />
                <input type="hidden" value="IN" name="sell_flag" />
                
                  <!-- text input -->
                  <!-- <div class="form-group">
                    <label>Date</label>
                    <input type="date" class="form-control" name="sell_in_date" placeholder="Enter ...">
                  </div> -->
                  <div class="row product_field">
                    <div class="col-md-8">
                    <div class="form-group">
                        <label>Choose Product</label>
                        <select class="form-control" name="product_id[]">
                            @foreach($product_data as $row)
                                <option value="{{$row['product_id']}}">{{$row['product_name']}}</option>
                            @endforeach
                        </select>
                    </div>
                    </div>
                    <div class="col-md-8">
                    <div class="form-group">
                        <label>Product Packages</label>
                        <select class="form-control" name="product_package[]">
                            <option value="2 L">2 L</option>
                            <option value="2.5 L"> 2.5 L</option>
                            <option value="20 L">20 L</option>
                            <option value="5 Kg">5 Kg</option>
                            <option value="25 Kg">25 Kg</option>
                        </select>
                    </div>
                    </div>
                    <div class="col-md-8">
                        <div class="form-group">
                            <label>Color Base</label>
                            <select class="form-control" name="product_color_base[]">
                                <option>A</option>
                                <option>B</option>
                                <option>C</option>
                                <option>D</option>
                                <option>E</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="form-group">
                            <label>Quantity</label>
                            <input type="number" id="quantity-sell" class="quantity-sell form-control" placeholder="Enter ..." name="product_qty[]">
                        </div>
                    </div>

                    <div class="col-md-8">
                        <div class="form-group">
                            <button disabled type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </div>

                  </div>           
                 
  
                </form>
              </div><!-- /.box-body -->
            </div><!-- /.box -->
        </div><!-- /.col -->
    
    </div><!-- /.row -->
@endsection

@section('custom_script')
<script>
$( document ).ready(function() {
    console.log("sell in ready");
    var $buttonSubmit = $("button[type='submit']");
  $("input[id='quantity-sell']").on('input', function() {
        var qty = $(this).val();
        if(qty > 0) {
            $buttonSubmit.removeAttr('disabled');
            return;
        } 
        if(qty <= 0) { 
            $buttonSubmit.attr('disabled', true);
        }
  })
})
</script>
@endsection