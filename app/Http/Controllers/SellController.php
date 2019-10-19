<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Sell;
use App\SellProductDetail;
use App\Stock;
use App\Product;


use Illuminate\Support\Facades\DB;


class SellController extends Controller
{
    // public function __construct() {
    //     $this->middleware('auth');
    // }

    public function index() {
        $data['title'] = 'Sell In Product';

        $data['product_data'] = Product::select('product_id', 'product_name')->get();
        
        return view('test')->with($data);
    }

    public function sell_list(Request $request) {
        $sell_flag = $request->is('sell_in_list') ? 'In' : 'Out';
        $data['title'] = 'Sell '.ucfirst($sell_flag).' List';
        $data['sell_flag'] = $sell_flag;
        if($sell_flag === 'Out'){
            $sell_in = DB::table('sell_products_detail as sd')
                    ->join('sell as s', 'sd.sell_id', '=', 's.sell_id')
                    ->join('products as p', 'sd.sell_products_detail_product_id', '=', 'p.product_id')
                    ->join('users as u', 'sd.sell_products_detail_created_by', '=', 'u.user_id')
                    ->join('customers as cs', 's.customer_id', '=', 'cs.customer_id')
                    ->select(
                        's.sell_id',
                        's.sell_created_date',
                        DB::raw('SUM(sd.sell_products_detail_product_qty) as total_qty'),
                        DB::raw('COUNT(sd.sell_products_detail_product_id) as total_product'),
                        'u.username',                            
                        'cs.customer_name',
                        'cs.customer_id'
                        )                        
                    ->where('s.sell_flag', '=', $sell_flag)
                    ->groupBy('s.sell_id', 'u.username', 's.sell_created_date','cs.customer_name', 'cs.customer_id')
                    ->orderBy('s.sell_id','desc');
                    // ->get();

                    if($request->has('customer')) {
                        $identifier = $request->get('customer');
                        $sell_in = $sell_in->where(function($query) use($identifier){
                            $query->where('cs.customer_name', 'like', '%' . $identifier . '%')
                                    ->orWhere('cs.customer_id', '=', $identifier);
                        });
                    };

                    $sell_in = $sell_in->get();
        } else {
            $sell_in = DB::table('sell_products_detail as sd')
                    ->join('sell as s', 'sd.sell_id', '=', 's.sell_id')
                    ->join('products as p', 'sd.sell_products_detail_product_id', '=', 'p.product_id')
                    ->join('users as u', 'sd.sell_products_detail_created_by', '=', 'u.user_id')
                    ->select(
                        's.sell_id',
                        's.sell_created_date',
                        DB::raw('SUM(sd.sell_products_detail_product_qty) as total_qty'),
                        DB::raw('COUNT(sd.sell_products_detail_product_id) as total_product'),
                        'u.username'
                        )                        
                    ->where('s.sell_flag', '=', $sell_flag)
                    ->groupBy('s.sell_id', 'u.username', 's.sell_created_date')
                    ->orderBy('s.sell_id','desc')
                    ->get();
        }
        $sell_in = collect($sell_in)->map(function($x){ return (array) $x;})->toArray();

        $data['sell_in'] = $sell_in;
        // print_r($sell_in);
        // return json_encode($sell_in);

        return view('sell_list')->with($data);
    }

    public function sell_list_detail($id) {
        $data['title'] = 'Sell In List';
        
        $sell_data = Sell::find($id);

        // print_r($sell_data);

        $sell_in = DB::table('sell_products_detail as sd')
                    ->join('sell as s', 'sd.sell_id', '=', 's.sell_id')
                    ->join('products as p', 'sd.sell_products_detail_product_id', '=', 'p.product_id')                        
                    // ->where('s.sell_flag', '=', 'IN')
                    ->where('s.sell_id', '=', $id)                    
                    ->get();

        $sell_in = collect($sell_in)->map(function($x){ return (array) $x;})->toArray();

        $data['sell_in'] = $sell_in;
        $data['sell_in_data'] = $sell_data;

        // print_r($sell_in);

        return view('sell_list_detail')->with($data);
    }

    public function store(Request $request) {
        // print_r($request->all());die();
        $data['sell_created_by'] = 1;
        $data['sell_updated_by'] = 1;
        
        $req = $request->all();
        $data['sell_flag'] = $req['sell_flag'];
        $data['customer_id'] = isset($req['customer_id']) ? $req['customer_id'] : null;

        if(
            count($req['product_id']) == count($req['product_package']) 
            && count($req['product_package']) == count($req['product_color_base'])
        )
        {
            $sell = Sell::create($data);
            if ($sell->sell_id !== 0) {
                for($i=0; $i < count($req['product_id']); $i++)
                {
                    $product['sell_id'] = $sell->sell_id;
                    $product['sell_products_detail_product_id'] = $req['product_id'][$i];
                    $product['sell_products_detail_product_qty'] = $req['product_qty'][$i];
                    $product['sell_products_detail_product_base'] = $req['product_color_base'][$i];
                    $product['sell_products_detail_product_color'] = $req['sell_flag'] === 'out' || $req['sell_flag'] === 'OUT' ? $req['sell_out_color_name'][$i] : '';
                    $product['sell_products_detail_product_packages'] = $req['product_package'][$i];
                    $product['sell_products_detail_created_by'] = 1;
                    $product['sell_products_detail_updated_by'] = 1;
                    
                    SellProductDetail::create($product);

                    $prod = Product::find($req['product_id'])->first();

                    // Update stock
                    $stock_data['stock_id'] = $prod->product_code . $req['product_color_base'][$i] . str_replace('L', '', str_replace('.','', $req['product_package'][$i]));
                    $stock_data['product_id'] = $req['product_id'][$i];
                    $stock_data['product_qty'] = $req['product_qty'][$i];
                    $stock_data['product_package'] = $req['product_package'][$i];
                    $stock_data['product_color_base'] = $req['product_color_base'][$i];
                    
                    $this->update_stock($data['sell_flag'], $stock_data);
                    
                }
                return redirect('/sell_'.strtolower($req['sell_flag']).'_list')->with('success', 'Sell '.$data['sell_flag'].' data with '.$i.' product(s) inserted succesfully!');
            }
        }
    }

    public function sell_out_form(){
        $data['title'] = "Sell Out Product";
        $data['product_data'] = Product::select('product_id', 'product_name')->get();

        return view('sell_out')->with($data);
    }
    
    public function update_stock($update_type = 'IN', $data) {
        // get product in Stock table
        $data['product_id'];

        $current_stock = Stock::where('stock_product_id', $data['product_id'])
                                ->where('stock_product_color_base',$data['product_color_base'])
                                ->where('stock_product_package',$data['product_package'])
                                ->get();
        // print_r($current_stock);
        // print_r($current_stock->first()->stock_id);
        // die();
        if($current_stock->isEmpty()) {
            // if empty, insert data to db
            $stock = new Stock;
            $stock->stock_id = $data['stock_id'];
            $stock->stock_product_id = $data['product_id'];
            $stock->stock_product_color_base = $data['product_color_base'];
            $stock->stock_product_package = $data['product_package'];
            $stock->stock_product_qty = $data['product_qty'];

            $stock->save();
            return true;

        } else {
            // else, update data
            $current_stock = $current_stock->first();
            if ($update_type == 'IN') {
                $new_product_qty = $current_stock->stock_product_qty + $data['product_qty'];
            } else {
                $new_product_qty = $current_stock->stock_product_qty - $data['product_qty'];                
            }
            Stock::find($current_stock->stock_id)
                    ->update(
                        ['stock_product_qty' => $new_product_qty]
                    ); 
            return true;
        }

        return false;

    }

    
    
    
}
