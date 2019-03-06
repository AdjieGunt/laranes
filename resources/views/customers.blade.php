@extends('admin_template')

@section('content')
    <div class="row">
      <div class="col-md-12">
        <div class="box box-info">
          <div class="box-header">
            <h3 class="box-title">
              Silahkan Input Data Customer Dulux
            </h3>
          </div>
          <div class="box-body">
            <div class="row">
              <div class="col-md-6">
                <div class="row">
                <form action="{{url('/new_customer')}}" role="form" method="POST">
                <input type="hidden" value="{{csrf_token()}}" name="_token" />
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>Customer Name</label>
                      <input type="text" class="form-control" placeholder="Jhon Doe" name="new_customer_name">
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>Email</label>
                      <input type="email" class="form-control" placeholder="jhon@doe.com" name="new_customer_email">
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>Phone</label>
                      <input type="text" class="form-control" placeholder="083813360366" name="new_customer_phone">
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>Address</label>
                      <input type="text" class="form-control" placeholder="Pamulang" name="new_customer_address">
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <!-- <label>Save</label> -->
                      <input type="submit" class="btn btn-primary form-control" value="Save" name="new_customer_save"/>
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
    <div class='row'>
        <div class='col-md-12'>
          <!-- Box -->
          <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">
                    Customers
                </h3>
            </div>
            <div class="box-body">
              <table id="example2" class="table table-bordered table-hover">
                <tr>
                  <th>#ID</th>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Phone</th>
                  <th>Address</th>
                </tr>
                @foreach($customers as $row)
                  <tr>
                    <td>{{ $row['customer_id'] }}</td>
                    <td>{{ $row['customer_name'] }}</td>
                    <td>{{ $row['customer_email'] }}</td>
                    <td>{{ $row['customer_phone'] }}</td>
                    <td>{{ $row['customer_address'] }}</td>
                  </tr>
                @endforeach
              </table>

            </div>
          </div>
        </div>
    </div>

    
@endsection