@extends('admin_template')

@section('content')
    <div class='row'>
        <div class='col-md-12'>
            <!-- Box -->
            <div class="box box-danger">
                <div class="box-header with-border">
                    <h3 class="box-title">Sell Out </h3>
                </div>
                <div class="box-body">
                <form role="form" action="{{url('/sell_save')}}" method="POST">
                <input type="hidden" value="{{csrf_token()}}" name="_token" />
                <input type="hidden" value="OUT" name="sell_flag" />
                
                  <!-- text input -->
                  <!-- <div class="form-group">
                    <label>Date</label>
                    <input type="date" class="form-control" name="sell_in_date" placeholder="Enter ...">
                  </div> -->
                  <div class="row product_field">
                      
                      <div class="col-md-8">
                        <div class="form-group">
                            <label>Product</label>
                            <select class="form-control" name="product_id[]" id="sell_out_prod_id">
                                <option value="">Choose Product ...</option>                        
                                <option value="1">Pentalite</option>
                                <option value="2">Easy Clean</option>
                                <option value="3">option 3</option>
                                <option value="4">option 4</option>
                                <option value="5">option 5</option>
                            </select>
                        </div>
                      </div>
                      <div class="col-md-8">
                        <div class="form-group">
                            <label>Packages</label>
                            <select class="form-control " name="product_package[]" id="sell_out_prod_pkg" disabled>
                                <option value="">Choose Packages</option>
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
                             <select class="form-control" name="product_color_base[]" id="sell_out_color_base" disabled>
                                 <option value="">Choose Color Base</option>
                                 <option value="A">A</option>
                                 <option value="B">B</option>
                                 <option value="B">C</option>
                                 <option value="D">D</option>
                                 <option value="E">E</option>
                             </select>
                          </div>
                      </div>
                      <div class="col-md-8">
                          <div class="form-group">
                             <label>Quantity </label>
                             <input type="number" class="form-control" id="sell_out_qty" placeholder="Enter ..." name="product_qty[]" disabled>
                             <p class="info_stock" > </p>
                           </div>
                      </div>
                      <!-- <div class="col-md-1">
                        <div class="form-group">
                            <label>Add</label>
                            <div class="btn btn-danger" id="add_product_field" > <i class="fa fa-plus"> </i> </div>
                        </div>
                      </div> -->

                                 
                    <!-- <div class="col-md-8">
                       
                        <div class="form-group">
                            <label>Sell Out Note</label>
                            <textarea class="form-control" rows="3" name="sell_in_note" placeholder="Enter a note ..."></textarea>
                        </div>
                    </div> -->
                        
                  </div>  
                  <div class="box-footer">
                    <button type="submit" class="btn btn-danger">Submit</button>
                   </div>
                 
  
                </form>
              </div><!-- /.box-body -->
            </div><!-- /.box -->
        </div><!-- /.col -->
    
    </div><!-- /.row -->
@endsection