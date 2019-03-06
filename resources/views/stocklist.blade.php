@extends('admin_template')

@section('content')

@include('checkstock')

    <div class='row'>
        <div class='col-md-12'>
            <!-- Box -->
            <div class="box box-success">
                <!-- <div class="box-header with-border">
                    <h3 class="box-title">Sell In </h3>
                </div> -->
                <div class="box-body">
                @if(\Session::has('success'))
                    <div class="alert alert-success alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <h4><i class="icon fa fa-info"></i> Success!</h4>
                        {{ \Session::get('success')}}
                    </div>
                @endif
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>Stock ID</th>
                  <!-- <th>Product ID</th> -->
                  <th>Product Name</th>                  
                  <th>Product Color Base</th>                  
                  <th>Product Packages</th>
                  <th>Total Qty</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($sell_in as $data)
                    <tr>
                        <td>{{ $data->stock_id }}</td>
                        <!-- <td>{{ $data->stock_product_id }}</td>  -->
                        <td>{{ $data->product_name }}</td>                                                                                                                       
                        <td>{{ $data->stock_product_color_base }}</td>                        
                        <td>{{ $data->stock_product_package }}</td>
                        <td>{{ $data->stock_product_qty }}</td>
                        <td>
                            <button
                             data-stockid="{{ $data->stock_id }}"
                             data-product="{{ $data->product_name }}"
                             data-colorbase="{{ $data->stock_product_color_base }}"
                             data-package="{{ $data->stock_product_package }}"
                             data-qty="{{ $data->stock_product_qty }}"
                             type="button"
                             class="btn btn-primary btn-sm"
                             data-toggle="modal"
                             data-target="#exampleModal"
                             data-whatever="@mdo">
                            Update
                            </button> or 
                            <button data-stockid="{{ $data->stock_id }}"
                             data-product="{{ $data->product_name }}"
                             data-colorbase="{{ $data->stock_product_color_base }}"
                             data-package="{{ $data->stock_product_package }}"
                             data-qty="{{ $data->stock_product_qty }}" 
                             type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modalDelete">
                            Delete
                            </button>
                        </td>
                    </tr>
                @endforeach
                </tbody>
              </table>
            </div>
            </div><!-- /.box -->
        </div><!-- /.col -->
    
    </div><!-- /.row -->

    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Update data stock</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <input type="hidden" class="form-control" id="stockid" >
                    <div class="form-group">
                        <label for="product-name" class="col-form-label">Product:</label>
                        <input type="text" class="form-control" id="productname">
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Color Base:</label>
                        <input type="text" class="form-control" id="colorbase" disabled>
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Product Packages:</label>
                        <input type="text" class="form-control" id="package" disabled>
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Qty:</label>
                        <input type="text" class="form-control" id="qty">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button id="submit-edit-stock" type="button" class="btn btn-primary">Update</button>
            </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modalDelete" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">

        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">Delete Stock?</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
            <input type="hidden" class="form-control" id="stockiddelete" >
        <div class="modal-body">
            Are you sure want to delete 
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
            <button type="button" class="btn btn-primary" id="action-delete-stock">Delete</button>
        </div>
        </div>
    </div>
    </div>
@endsection

@section('custom_script')

<script>
$( document ).ready(function() {
    console.log('stock doc ready');
    $('#exampleModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        var stockid = button.data('stockid') // Extract info from data-* attributes
        var product = button.data('product') // Extract info from data-* attributes
        var colorbase = button.data('colorbase') // Extract info from data-* attributes
        var package = button.data('package') // Extract info from data-* attributes
        var qty = button.data('qty') // Extract info from data-* attributes

        // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
        // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
        var modal = $(this)
        modal.find('.modal-title').html('Update data stock : <b>' + product + '</b>')
        modal.find('.modal-body input#stockid').val(stockid)
        modal.find('.modal-body input#productname').val(product)
        modal.find('.modal-body input#colorbase').val(colorbase)
        modal.find('.modal-body input#package').val(package)
        modal.find('.modal-body input#qty').val(qty)
    })

    $('#submit-edit-stock').click(function(event) {
        console.log($('meta[name="csrf-token"]').attr('content'));
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        })
        var data = {
            'stockid': $('input#stockid').val(),
            'qty': $('input#qty').val()
        }

        $.ajax({
            type:"POST",
            url: "stock/update_stock",
            data: data,
            success: function() {
                console.log("yesy!");
                window.location.reload()
            }
        })
    })

    $('#modalDelete').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        var stockid = button.data('stockid') // Extract info from data-* attributes
        var product = button.data('product') // Extract info from data-* attributes
        var colorbase = button.data('colorbase') // Extract info from data-* attributes
        var package = button.data('package') // Extract info from data-* attributes
        var qty = button.data('qty') // Extract info from data-* attributes

        var modal = $(this)
        modal.find('input#stockiddelete').val(stockid)

        var inner = 'Are you sure want to delete  : <b>' + stockid + ' - ' + product + ' - ' + colorbase + ' - ' + package + ' - ' + qty + '</b>' 
        modal.find('.modal-body').html(inner);
    })

    $('#action-delete-stock').click(function(event) {
        console.log($('meta[name="csrf-token"]').attr('content'));
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        })
        var data = {
            'stockid': $('input#stockiddelete').val(),
            'qty': $('input#qty').val()
        }

        $.ajax({
            type:"POST",
            url: "stock/delete_stock",
            data: data,
            success: function() {
                console.log("yesy!");
                window.location.reload()
            }
        })
    })

    

})
</script>

@endsection