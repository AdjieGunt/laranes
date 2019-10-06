<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class ProductController extends Controller
{
    //
    public function index(){
        $data['title'] = 'Product Master';
        $data['product'] = Product::select('product_id', 'product_name', 'product_code')->get();

        return view('product_master', $data);
    }

    public function store(Request $request){
        $req = $request->all();
        $timestamps = \Carbon\Carbon::now('Asia/Jakarta');
        $data = [
            'product_name' => $req['product_name'],
            'product_code' => $req['product_code'],
            'product_created_date' => $timestamps,
            'product_updated_date' => $timestamps,
            'product_created_by' => 1,
            'product_updated_by' => 1,
            'product_description' => '',
            'product_status' => 1
        ];

        Product::create($data);

        return redirect('/products');
    }

    public function delete($id){
        $products = Product::find($id);

        // return $products->trashed();

        if($products->delete()) {
            return redirect('/products');
        }

        return redirect('/products');
    }
}
