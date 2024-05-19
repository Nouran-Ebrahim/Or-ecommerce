<?php

namespace App\Http\Controllers\Admin;

use App\Exports\AllUsers;
use App\Exports\ClientExport;
use App\Exports\FinancialExport;
use App\Exports\MostSelling;
use App\Exports\PaymentExport;
use App\Exports\Products;
use App\Exports\SalesExport;
use App\Http\Controllers\Controller;
use App\Models\Client;
use App\Models\Order;
use App\Models\Product;
use App\Models\OrderProduct;
use App\Models\Transaction;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Maatwebsite\Excel\Facades\Excel;

class ReportController extends Controller
{
    public function sales()
    {
        $orders = [];
        if (request('from') && request('to')) {
            $orders = Order::whereIn('status', [0, 1, 2, 9])
                ->whereDate('created_at', '>=', request('from'))
                ->whereDate('created_at', '<=', request('to'))->get();
        }
        Session::put('reports_data', $orders);
        Session::put('reports_type', 'sales');

        return view('Admin.report.sales', compact('orders'));
    }

    public function financial()
    {
        $orders = [];
        $address_ids = [];
        if (request('from') && request('to')) {
            $orders = Order::whereIn('status', [0, 1, 2, 9])
                ->whereDate('created_at', '>=', request('from'))
                ->whereDate('created_at', '<=', request('to'))->get();
        }
        Session::put('reports_data', $orders);
        Session::put('reports_type', 'financial');

        return view('Admin.report.financial', compact('orders'));
    }

    public function client()
    {
        $clients = Client::all();
        $client = null;
        if (request('client_id')) {
            $client = Client::find(request('client_id'));
        }
        $client ? Session::put('reports_data', $client->orders) : '';
        Session::put('reports_type', 'client');

        return view('Admin.report.client', compact('client', 'clients'));
    }

    public function payment()
    {
        $reports = [];
        if (request('from') && request('to')) {
            $reports = Transaction::whereDate('created_at', '>=', request('from'))
                ->whereDate('created_at', '<=', request('to'))->get();
        }
        Session::put('reports_data', $reports);
        Session::put('reports_type', 'payment');

        return view('Admin.report.payment', compact('reports'));
    }

    public function mostselling()
    {
        $MostSelling = OrderProduct::with(['product' => function ($product) {
            $product->select('title_'.lang(), 'id');
        }])->select('product_id', DB::raw('COUNT(product_id) as count'), DB::raw('DATE(created_at)'));
        if (request('from')) {
            $MostSelling = $MostSelling->where('created_at', '>=', request('from'));
        }
        if (request('to')) {
            $MostSelling = $MostSelling->where('created_at', '<=', request('to'));
        }

        $MostSelling = $MostSelling
            ->groupBy('product_id')
            ->orderby('count', 'DESC')
            ->get();

        Session::put('reports_data', $MostSelling);
        Session::put('reports_type', 'mostselling');

        return view('Admin.report.mostselling', compact('MostSelling'));
    }

    public function products()
    {
        // $products = Product::select('title_'.lang(), 'id', 'price', DB::raw('quantity as count'), DB::raw('DATE(created_at)'));
        $products = Product::select('title_'.lang(), 'id', 'price','price_after_discount','in_stock', DB::raw('DATE(created_at)'));

        if (request('sort') == 'price_desc') {
            $products = $products->orderby('price', 'DESC')->get();
        } else  {
            $products = $products->orderby('price', 'ASC')->get();
        } 
        // elseif (request('sort') == 'quantity_desc') {
        //     $products = $products->orderby('count', 'DESC')->get();
        // } 
        // elseif (request('sort') == 'price_asc') {
        //     $products = $products->orderby('count', 'ASC')->get();
        // } 
        // else {
        //     $products = $products->orderby('count', 'asc')->get();
        // }
        // dd($products);
        Session::put('reports_data', $products);
        Session::put('reports_type', 'products');

        return view('Admin.report.products', compact('products'));
    }

    public function vat()
    {
        $Orders = Order::query();
        if (request('from')) {
            $Orders = $Orders->where('created_at', '>=', request('from'));
        }
        if (request('to')) {
            $Orders = $Orders->where('created_at', '<=', request('to'));
        }

        $amount = (float) $Orders->sum('net_total');
        $VatAmount = (float) $Orders->where('vat', '>', 0.000)->sum('net_total');
        $NoVatAmount = (float) $amount - $VatAmount;
        $vat = [
            'amount' => $amount,

            'VatAmount' => $VatAmount,
            'VatAmountPercentage' => $VatAmount / setting('VAT'),

            'NoVatAmount' => $NoVatAmount,
            'NoVatAmountPercentage' => 0,
        ];
        Session::put('reports_data', $vat);
        Session::put('reports_type', 'vat');

        return view('Admin.report.vat', compact('vat'));
    }

    public function exportData()
    {
        if (Session::get('reports_type') == 'sales') {
            $export = new SalesExport([Session::get('reports_data')]);
        }
        if (Session::get('reports_type') == 'financial') {
            $export = new FinancialExport([Session::get('reports_data')]);
        }
        if (Session::get('reports_type') == 'client') {
            $export = new ClientExport([Session::get('reports_data')]);
        }
        if (Session::get('reports_type') == 'payment') {
            $export = new PaymentExport([Session::get('reports_data')]);
        }
        if (Session::get('reports_type') == 'clients') {
            $export = new AllUsers([Session::get('reports_data')]);
        }
        if (Session::get('reports_type') == 'mostselling') {
            $export = new MostSelling([Session::get('reports_data')]);
        }
        if (Session::get('reports_type') == 'products') {
            $export = new Products([Session::get('reports_data')]);
        }
        session()->forget('data');
        session()->forget('type');

        return Excel::download($export, 'report- '.now().'.xlsx');
    }
}
