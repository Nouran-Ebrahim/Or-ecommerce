<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreCouponRequest;
use App\Http\Requests\Admin\UpdateCouponRequest;
use App\Models\Coupon;
use App\Models\CouponProduct;
use App\Models\Product;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class CouponController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $coupons = Coupon::latest();

            return DataTables::of($coupons)
                ->addColumn('action', function ($Model) {
                    $data = '';
                    $data .= '<a style="color: #000;" href="'.route('admin.coupons.edit', $Model).'"><i class="fa-solid fa-pen-to-square"></i></a>';

                    $data .= '<form class="formDelete" method="POST" action="'.route('admin.coupons.destroy', $Model).'">
                                '.csrf_field().'
                                <input name="_method" type="hidden" value="DELETE">
                                <button type="button" class="btn btn-flat show_confirm" data-toggle="tooltip" title="Delete"><i class="fa-solid fa-eraser"></i></button>
                            </form>';

                    return $data;
                })
                ->editColumn('percent_off', function ($Coupon) {
                    return blank($Coupon['percent_off']) ? '' : $Coupon['percent_off'].' %';
                })
                ->editColumn('discount', function ($Coupon) {
                    return blank($Coupon['discount']) ? '' : $Coupon['discount'].' '.Country()->currancy_code;
                })
                ->editColumn('type', function ($Coupon) {
                    return $Coupon['type'] == 'discount' ? __('trans.fixedprice') : __('trans.Discount Percentage');
                })
                ->editColumn('status', function ($Model) {
                    return '<input class="toggle" type="checkbox" onclick="toggleswitch('.$Model->id.',\'coupons\')" '.($Model->status ? 'checked' : '').'>';
                })
                ->addIndexColumn()
                ->addColumn('checkbox', function ($Model) {
                    return '<input type="checkbox" class="DTcheckbox" value="'.$Model->id.'">';
                })
                ->escapeColumns('action', 'checkbox', 'status')
                ->make(true);
        }

        return view('Admin.coupons.index');
    }

    public function create()
    {
        $Coupons = Coupon::all();
        $products = Product::all();

        return view('Admin.coupons.create', compact('Coupons', 'products'));
    }

    public function store(StoreCouponRequest $request)
    {
        $Coupon = Coupon::latest()->create($request->only('code', 'type', 'discount', 'percent_off', 'from', 'to', 'status'));
        // $Coupon->Products()->attach($request->products_ids);
        alert()->success(__('trans.addedSuccessfully'));

        return redirect()->back();
    }

    public function show(Coupon $Coupon)
    {
        return view('Admin.coupons.show', compact('Coupon'));
    }

    public function edit($id)
    {
        $Coupons = Coupon::with('Products')->get();
        $Coupon = $Coupons->where('id', $id)->first();
        $products = Product::all();

        return view('Admin.coupons.edit', compact('Coupon', 'Coupons', 'products'));
    }

    public function update(UpdateCouponRequest $request, Coupon $Coupon)
    {
        $Coupon->update($request->only('code', 'type', 'discount', 'percent_off', 'from', 'to', 'status'));
        // $Coupon->Products()->detach();
        // $arr = [];
        // foreach ($request->products_ids as $key => $item) {
        //     $arr[$key]['coupon_id'] = $Coupon['id'];
        //     $arr[$key]['product_id'] = $item;
        // }
        // CouponProduct::insert($arr);
        alert()->success(__('trans.updatedSuccessfully'));

        return redirect()->back();
    }

    public function destroy(Coupon $Coupon)
    {
        $Coupon->delete();
    }

    public function CouponProducts($Coupon_id)
    {
        if ($Coupon_id == 0) {
            return response()->json(Product::pluck('id'));
        } else {
            return response()->json(CouponProduct::when($Coupon_id, function ($query, $Coupon_id) {
                return $query->where('coupon_id', $Coupon_id);
            })->pluck('product_id'));
        }
    }
}
