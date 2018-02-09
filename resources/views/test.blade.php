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
                <form role="form" action="{{url('/sell_in_save')}}" method="POST">
                <input type="hidden" value="{{csrf_token()}}" name="_token" />
                  <!-- text input -->
                  <!-- <div class="form-group">
                    <label>Date</label>
                    <input type="date" class="form-control" name="sell_in_date" placeholder="Enter ...">
                  </div> -->
                  <div class="row product_field">
                      
                      <div class="col-md-3">
                        <div class="form-group">
                            <label>Choose Product</label>
                            <select class="form-control" name="product_id[]">
                                <option value="1">Pentalite</option>
                                <option value="2">Easy Clean</option>
                                <option value="3">option 3</option>
                                <option value="4">option 4</option>
                                <option value="5">option 5</option>
                            </select>
                        </div>
                      </div>
                      <div class="col-md-3">
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
                      <div class="col-md-3">
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
                      <div class="col-md-2">
                          <div class="form-group">
                             <label>Quantity</label>
                             <input type="number" class="form-control" placeholder="Enter ..." name="product_qty[]">
                           </div>
                      </div>
                      <div class="col-md-1">
                        <div class="form-group">
                            <label>Add</label>
                            <div class="btn btn-success" id="add_product_field" > <i class="fa fa-plus"> </i> </div>
                        </div>
                      </div>

                  </div>                 

                  <!-- textarea -->
                  <div class="form-group">
                    <label>Sell In Note</label>
                    <textarea class="form-control" rows="3" name="sell_in_note" placeholder="Enter a note ..."></textarea>
                  </div>
   
                  <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                   </div>
                 
  
                </form>
              </div><!-- /.box-body -->
            </div><!-- /.box -->
        </div><!-- /.col -->
    
    </div><!-- /.row -->
@endsection