<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

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

            return view('sell_list')->with($data);
    }
}
