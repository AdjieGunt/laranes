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
                <form role="form">
                  <!-- text input -->
                  <div class="form-group">
                    <label>Date</label>
                    <input type="date" class="form-control" placeholder="Enter ..." disabled>
                  </div>
                  <div class="row" id="product_field">
                      
                      <div class="col-md-3">
                        <div class="form-group">
                            <label>Choose Product</label>
                            <select class="form-control">
                                <option>option 1</option>
                                <option>option 2</option>
                                <option>option 3</option>
                                <option>option 4</option>
                                <option>option 5</option>
                            </select>
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group">
                            <label>Product Packages</label>
                            <select class="form-control">
                                <option>option 1</option>
                                <option>option 2</option>
                                <option>option 3</option>
                                <option>option 4</option>
                                <option>option 5</option>
                            </select>
                        </div>
                      </div>
                      <div class="col-md-3">
                          <div class="form-group">
                             <label>Color Base</label>
                             <select class="form-control">
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
                             <input type="number" class="form-control" placeholder="Enter ..." >
                           </div>
                      </div>
                      <div class="col-md-1">
                        <div class="form-group">
                            <label>Add</label>
                            <div class="btn btn-success" > <i class="fa fa-plus"> </i> </div>
                        </div>
                      </div>

                  </div>
                 

                  <!-- textarea -->
                  <div class="form-group">
                    <label>Sell In Note</label>
                    <textarea class="form-control" rows="3" placeholder="Enter a note ..."></textarea>
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