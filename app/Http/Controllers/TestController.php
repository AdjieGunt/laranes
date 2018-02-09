<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Sell;
use App\SellProductDetail;

use Illuminate\Support\Facades\DB;


class TestController extends Controller
{
    public function index() {
        $data['title'] = 'Sell In Product';
        $data['tasks'] = [
            [
                    'name' => 'Design New Dashboard',
                    'progress' => '87',
                    'color' => 'danger'
            ],
            [
                    'name' => 'Create Home Page',
                    'progress' => '76',
                    'color' => 'warning'
            ],
            [
                    'name' => 'Some Other Task',
                    'progress' => '32',
                    'color' => 'success'
            ],
            [
                    'name' => 'Start Building Website',
                    'progress' => '56',
                    'color' => 'info'
            ],
            [
                    'name' => 'Develop an Awesome Algorithm',
                    'progress' => '10',
                    'color' => 'success'
            ]
        ];
        return view('test')->with($data);
    }

    public function sell_list() {
            $data['title'] = 'Sell In List';

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
                        ->where('s.sell_flag', '=', 'IN')
                        ->groupBy('s.sell_id', 'u.username')
                        ->get();
            $sell_in = collect($sell_in)->map(function($x){ return (array) $x;})->toArray();

            $data['sell_in'] = $sell_in;
            // print_r($sell_in);
            // return json_encode($sell_in);

            return view('sell_list')->with($data);
    }

    public function sell_list_detail($id) {
        $data['title'] = 'Sell In List';

        $sell_in = DB::table('sell_products_detail as sd')
                    ->join('sell as s', 'sd.sell_id', '=', 's.sell_id')
                    ->join('products as p', 'sd.sell_products_detail_product_id', '=', 'p.product_id')                        
                    ->where('s.sell_flag', '=', 'IN')
                    ->where('s.sell_id', '=', $id)                    
                    ->get();
        $sell_in = collect($sell_in)->map(function($x){ return (array) $x;})->toArray();

        $data['sell_in'] = $sell_in;
        // print_r($sell_in);

        return view('sell_list_detail')->with($data);
}

    public function store(Request $request) {
        // print_r($request->all());
        
        $data['sell_flag'] = 'IN';
        $data['sell_created_by'] = 1;
        $data['sell_updated_by'] = 1;
        
        $req = $request->all();

        if(
            count($req['product_id']) == count($req['product_package']) 
            && count($req['product_package']) == count($req['product_color_base'])
        )
        {
            $sell = Sell::create($data);
            if ($sell->id !== 0) {
                for($i=0; $i < count($req['product_id']); $i++)
                {
                    $product['sell_id'] = $sell->id;
                    $product['sell_products_detail_product_id'] = $req['product_id'][$i];
                    $product['sell_products_detail_product_qty'] = $req['product_qty'][$i];
                    $product['sell_products_detail_product_base'] = $req['product_color_base'][$i];
                    $product['sell_products_detail_product_packages'] = $req['product_package'][$i];
                    $product['sell_products_detail_created_by'] = 1;
                    $product['sell_products_detail_updated_by'] = 1;
                    
                    SellProductDetail::create($product);
                }
                return redirect('/sell_in_list')->with('success', 'Sell In data with '.$i.' product(s) inserted succesfully!');
            }
        }
    
    
    
    }
}
