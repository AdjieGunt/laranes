<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Stock;
use DB;

class StockController extends Controller
{
    //

    public function stock_list(Request $request) {
        $data['title'] = 'Info Stock';

        // print_r($request->all());

        $query = DB::table('stock as s')
                      ->join('products as p', 's.stock_product_id', '=', 'p.product_id');

        if(empty($request->all())) {
            $stocks = $query->get();
        } else {
            $req = $request->all();
            $stocks = $query->where('stock_product_id', $req['product_id'])
                            ->where('stock_product_color_base', $req['product_color_base'])
                            ->where('stock_product_package', $req['product_package'])
                            // ->where('stock_product_package', $req['product_package'])                           
                            ->get();            
        }

        $data['sell_in'] = $stocks;

        return view('stocklist')->with($data);
    }

    public function check_stock_for_sell_out(Request $request) {
        //TODO :
        // get data by product id
        $req = $request->all();

        $stock_info = Stock::select('stock_product_color_base',
                                    'stock_product_package',
                                    'stock_product_qty');
        if(isset($req['product_id']) && isset($req['product_pkg']) && isset($req['product_color_base'])) {
            $product_id = $req['product_id'];
            $product_pkg = $req['product_pkg'];
            $product_color_base = $req['product_color_base'];
            
            $stock_info = $stock_info   
                                ->where('stock_product_id', $product_id)
                                ->where('stock_product_package', $product_pkg)
                                ->where('stock_product_color_base', $product_color_base)                                
                                ->get();
                                
        } elseif(isset($req['product_id']) && isset($req['product_pkg'])) {
            $product_id = $req['product_id'];
            $product_pkg = $req['product_pkg'];
            $stock_info = $stock_info   
                                ->where('stock_product_id', $product_id)
                                ->where('stock_product_package', $product_pkg)
                                ->get();
        } else {
            $product_id = $req['product_id'];
            $stock_info = $stock_info   
                                ->where('stock_product_id', $product_id)
                                ->get();
        }

        $data = $stock_info->toArray();

        // print_r($stock_info->toArray());

        return response()->json($data);
    }
    
}
