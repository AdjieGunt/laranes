    <div class='row'>
        <div class='col-md-12'>
            <!-- Box -->
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Search Stock </h3>
                </div>
                <div class="box-body">
                <form role="form" action="{{url('/stock')}}" method="GET">
                <!-- <input type="hidden" value="{{csrf_token()}}" name="_token" /> -->
                  <!-- text input -->
                  <!-- <div class="form-group">
                    <label>Date</label>
                    <input type="date" class="form-control" name="sell_in_date" placeholder="Enter ...">
                  </div> -->
                  <div class="row product_field">
                      
                      <div class="col-md-8">
                        <div class="form-group">
                            <label>Choose Product</label>
                            <select class="form-control" name="product_id">
                            <option value="">All products</option>
            
                            @foreach($products as $row)
                                <option value="{{$row['product_id']}}" {{ $row['product_id'] == request()->product_id ? 'selected' : '' }}>{{$row['product_name']}}</option>
                            @endforeach
                            </select>
                        </div>
                      </div>
                      <div class="col-md-8">
                        <div class="form-group">
                            <label>Product Packages</label>
                            <select class="form-control" name="product_package">
                                <!-- <option value="">Semua</option> -->
                                <option value="">All Packages</option>                                
                                <option value="2 L" {{ request()->product_package === '2 L' ? 'selected' : '' }}>2 L</option>
                                <option value="2.5 L" {{ request()->product_package === '2.5 L' ? 'selected' : '' }}> 2.5 L</option>
                                <option value="20 L" {{ request()->product_package === '20 L' ? 'selected' : '' }}>20 L</option>
                                <option value="5 Kg" {{ request()->product_package === '5 Kg' ? 'selected' : '' }}>5 Kg</option>
                                <option value="25 Kg" {{ request()->product_package === '25 Kg' ? 'selected' : '' }}>25 Kg</option>
                            </select>
                        </div>
                      </div>
                      <div class="col-md-8">
                          <div class="form-group">
                             <label>Color Base</label>
                             <select class="form-control" name="product_color_base">
                                 <option value="">All colors</option>
                                 <option {{ request()->product_color_base === 'A' ? 'selected' : '' }}>A</option>
                                 <option {{ request()->product_color_base === 'B' ? 'selected' : '' }}>B</option>
                                 <option {{ request()->product_color_base === 'C' ? 'selected' : '' }}>C</option>
                                 <option {{ request()->product_color_base === 'D' ? 'selected' : '' }}>D</option>
                                 <option {{ request()->product_color_base === 'E' ? 'selected' : '' }}>E</option>
                             </select>
                          </div>
                      </div>
                      
                      <div class="col-md-8">
                          <!-- <div class="form-group"> -->
                             <!-- <label>Search</label> -->
                             <button type="submit" class="btn btn-success">Search</button>
                           <!-- </div> -->
                          <!-- <div class="form-group"> -->
                             <!-- <label>Reset</label> -->
                             <a href="{{ url("/stock") }}" class="btn btn-info">Reset</a>
                           <!-- </div> -->
                      </div>

                      


                            
     

                  </div>                 
   
                  
                 
  
                </form>
              </div><!-- /.box-body -->
            </div><!-- /.box -->
        </div><!-- /.col -->
    
    </div><!-- /.row -->
