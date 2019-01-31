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
                
                  <!-- text input -->
                  <!-- <div class="form-group">
                    <label>Date</label>
                    <input type="date" class="form-control" name="sell_in_date" placeholder="Enter ...">
                  </div> -->
                  <div class="row product_field">
                    <div class="col-md-8">
                        <div class="form-group">
                            <label>Cari Customer</label>
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <input type="text" name="customer_q"  placeholder="Masukan Id atau nama" class="form-control" id="sell_out_customer"/>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <button class="btn btn-primary" id="sell_out_cari_customer">Cari</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                  <form role="form" action="{{url('/sell_save')}}" method="POST">
                    <input type="hidden" value="{{csrf_token()}}" name="_token" />
                    <input type="hidden" value="OUT" name="sell_flag" />
                    <input type="hidden" name="customer_id" id="sell_out_customer_hide"/>

                      <div class="col-md-8">
                        <div class="form-group">
                            <label>Product</label>
                            <select class="form-control" name="product_id[]" id="sell_out_prod_id">
                                <option value="">Choose Product ...</option>                        
                                @foreach($product_data as $row)
                                    <option value="{{$row['product_id']}}">{{$row['product_name']}}</option>
                                @endforeach
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
                             <label>Color Name</label>
                             <input type="text" class="form-control" id="sell_out_color_name" placeholder="Enter ..." name="sell_out_color_name[]" disabled>
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
    <div class="modal fade" tabindex="-1" role="dialog" id="customers_search_modal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Search Customers</h4>
            </div>
            <div class="modal-body" id="customer_modal_body">
                <h4>Data tidak ditemukan!</h4>
                <a href="/customers" class="btn btn-primary">Create New Customer</a>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
            </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
@endsection