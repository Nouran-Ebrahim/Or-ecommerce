<?php

namespace App\Http\Controllers\Admin;

use App\Functions\WhatsApp;
use App\Http\Controllers\Controller;
use App\Models\Country;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index($method, Request $request)
    {
        $Orders = Order::with(['PaymentMethod', 'OrderProducts' => ['Product'], 'address.region'])->latest()

            ->when(request()->phone, function ($query, $role) {
                return $query->whereHas('client', function ($q) {
                    $q->where('phone', 'like', '%'.request()->phone.'%');
                });
            })
            ->when(request()->client, function ($query, $role) {
                return $query->whereHas('client', function ($q) {
                    $q->where('name', 'like', '%'.request()->client.'%');
                });
            })
            ->when(request()->id, function ($query, $role) {
                return $query->where('id', request()->id);
            })

            ->when($method == 'new', function ($query) {
                return $query->where('status', 0);
            })
            ->when($method == 'current', function ($query) {
                return $query->where('status', 1)->whereIn('follow', [0, 1, 2]);
            })
            ->when($method == 'previous', function ($query) {
                return $query->where('status', 1)->whereIn('follow', [3]);
            })
            ->when($method == 'declined', function ($query) {
                return $query->where('status', 2);
            })
            ->when($method == 'order_history', function ($query) {
                return $query->where('status', 5);
            })
            ->paginate(25);

        $last_order_id = Order::orderby('id', 'desc')->first()->id ?? 0;
        $Countries = Country::get();

        return view('Admin.orders.index', compact('method', 'Orders', 'last_order_id', 'Countries'));
    }

    public function last_order_id(Request $request)
    {
        return response()->json(Order::orderBy('id', 'desc')->where('id', '>', $request->last_order_id)->where('status', 0)->count());
    }

    public function show(Order $Order)
    {
        return view('Admin.orders.show', compact('Order'));
    }

    public function destroy(Order $Order)
    {
        $Order->delete();
    }

    public function changestatus(Request $request)
    {
        $Order = Order::with('OrderProducts')->where('id', $request->id)->first();
        $Order->status = $request->status;
        $Order->follow = $request->follow;
        $Order->save();

        if ($Order->delivery_id == 1) {
            if ($request->status == 2) {
                $msg = 'order_rejected';
            } elseif ($request->status == 1 && $request->follow == 1) {
                $msg = 'order_preparing';
            } elseif ($request->status == 1 && $request->follow == 2) {
                $msg = 'order_onway';
            } elseif ($request->status == 1 && $request->follow == 3) {
                $msg = 'order_delivered';
            } else {
                $msg = 'updatedSuccessfully';
            }
        } elseif ($Order->delivery_id > 1) {
            if ($request->status == 2) {
                $msg = 'order_rejected';
            } elseif ($request->status == 1 && $request->follow == 1) {
                $msg = 'order_preparing';
            } elseif ($request->status == 1 && $request->follow == 2) {
                $msg = 'order_ready';
            } elseif ($request->status == 1 && $request->follow == 3) {
                $msg = 'order_delivered';
            } else {
                $msg = 'updatedSuccessfully';
            }
        }

        $message = '%0a *('.env('APP_NAME').')* %0a';
        $message .= '%0a *Order Number :* '.$Order->id;
        $message .= '%0a '.__('trans.'.$msg).' %0a';
        $message .= '%0a *Powered By Emcan Solutions* %0a';

        WhatsApp::SendWhatsApp($Order->client()->first()->phone_code.$Order->client()->first()->phone, $message);
        alert()->success(__('trans.'.$msg));

        return response()->json([
            'message' => __('trans.'.$msg),
        ]);
    }
}
