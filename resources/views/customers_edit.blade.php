@extends('admin_template')

@section('content')
    <div class="row">
      <div class="col-md-12">
        <div class="box box-info">
          <div class="box-header">
            <h3 class="box-title">
              Silahkan Lengkapi Data Customer:
            </h3>
          </div>
          <div class="box-body">
            <div class="row">
              <div class="col-md-6">
                <div class="row">
                <form action="{{url('/customers/edit')}}" role="form" method="POST">
                <input type="hidden" value="{{csrf_token()}}" name="_token" />
                <input type="hidden" value="{{$customers['customer_id']}}" name="customer_id" />
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>Customer Name</label>
                      <input type="text" value="{{$customers['customer_name']}}" class="form-control" placeholder="Jhon Doe" name="customer_name">
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>Email</label>
                      <input type="email" value="{{$customers['customer_email']}}" class="form-control" placeholder="jhon@doe.com" name="customer_email">
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>Phone</label>
                      <input type="text" value="{{$customers['customer_phone']}}" class="form-control" placeholder="083813360366" name="customer_phone">
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>Address</label>
                      <input type="text" value="{{$customers['customer_address']}}" class="form-control" placeholder="Pamulang" name="customer_address">
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <!-- <label>Save</label> -->
                      <input type="submit" class="btn btn-primary form-control" value="Save" name="customer_save"/>
                    </div>
                  </div>
                </form>  
              </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    
@endsection