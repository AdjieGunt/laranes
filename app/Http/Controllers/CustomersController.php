<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customers;

class CustomersController extends Controller
{
    //
    public function index(){
        $data['title'] = 'Customers';
        $data['customers'] = Customers::select(
            'customer_id',
            'customer_name',
            'customer_phone',
            'customer_email',
            'customer_address')->get();
        return view('customers', $data);
    }

    public function search(Request $req){
        $q = $req['q'];

        $get_data = Customers::select('customer_id', 'customer_name', 'customer_address', 'customer_phone')->where(
            function ($query) use ($q){
                $query->where('customer_id','=', $q)
                ->orWhere('customer_name','like', '%'.$q.'%');
            }
        )->get();

        // print_r($get_data);/

        return response()->json($get_data);
    }

    public function store(Request $req){
        $data['customer_name'] = $req['new_customer_name'];
        $data['customer_email'] = $req['new_customer_email'];
        $data['customer_phone'] = $req['new_customer_phone'];
        $data['customer_address'] = $req['new_customer_address'];

        $save = Customers::create($data);

        return redirect('/customers');
    }
}
