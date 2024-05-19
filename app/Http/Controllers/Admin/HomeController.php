<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $chartOrders = DB::table('orders')->whereMonth('created_at', '>=', Carbon::now()->subMonth()->month)->select([DB::raw('DATE(created_at) AS label'), DB::raw('(COUNT(*)) as y')])->groupBy('label')->get()->toarray();
        $chartChanges = DB::table('orders')->where('status', 1)->select(DB::raw('sum(net_total) as y'), DB::raw("DATE_FORMAT(created_at,'%M %Y') as label"))->groupBy('label')->orderBy('created_at')->get()->toarray();
        $chartUsers = \App\Models\Client::whereNotNull('created_at')->whereMonth('created_at', '>=', Carbon::now()->subMonth()->month)->select([DB::raw('DATE(created_at) AS label'), DB::raw('(COUNT(*)) as y')])->groupBy('label')->get()->toarray();

        $productsCount = \App\Models\Product::count();
        $clientsCount = \App\Models\Client::count();
        $currentOrdersCount = DB::table('orders')->where('status', 1)->whereIn('follow', [0, 1, 2])->count();
        $previousOrdersCount = DB::table('orders')->where('status', 1)->whereIn('follow', [3])->count();
        $sliderCount = \App\Models\Slider::count();

        return view('Admin.home', compact(

            'productsCount',
            'clientsCount',
            'currentOrdersCount',
            'previousOrdersCount',
            'sliderCount',
            'chartOrders',
            'chartUsers',
            'chartChanges',
        ));

    }
}
