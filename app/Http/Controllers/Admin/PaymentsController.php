<?php

namespace App\Http\Controllers\Admin;

use App\Functions\Upload;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StorePaymentMethodRequest;
use App\Http\Requests\Admin\UpdatePaymentMethodRequest;
use App\Models\Payment;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class PaymentsController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $PaymentMethods = Payment::latest();

            return Datatables::of($PaymentMethods)
                ->addColumn('action', function ($PaymentMethod) {
                    return '<a href="'.route('admin.payments.edit', $PaymentMethod).'"><i class="fa-solid fa-pen-to-square"></i></a>';
                })
                ->addColumn('image', function ($Model) {
                    return '<a class="image-popup-no-margins" href="'.$Model['image'].'">
                        <img src="'.$Model['image'].'" style="max-height: 150px;max-width: 150px">
                    </a>';
                })
                ->editColumn('status', function ($Model) {
                    return '<input class="toggle" type="checkbox" onclick="toggleswitch('.$Model->id.',\'payments\')" '.($Model->status ? 'checked' : '').'>';
                })
                ->addIndexColumn()
                ->addColumn('checkbox', function ($Model) {
                    return '<input type="checkbox" class="DTcheckbox" value="'.$Model->id.'">';
                })
                ->escapeColumns('action', 'checkbox', 'status')
                ->make(true);
        }

        return view('Admin.payments.index');
    }

    public function create()
    {
        return view('Admin.payments.create');
    }

    public function store(StorePaymentMethodRequest $request)
    {
        $PaymentMethod = Payment::latest()->create($request->validated());
        if ($request->hasFile('image')) {
            $PaymentMethod->image = Upload::UploadFile($request['image'], 'PaymentMethods');
            $PaymentMethod->save();
        }
        alert()->success(__('trans.addedSuccessfully'));

        return redirect()->back();
    }

    public function show(Payment $PaymentMethod)
    {
        return view('Admin.payments.show', compact('PaymentMethod'));
    }

    public function edit($id)
    {
        $PaymentMethod = Payment::latest()->where('id', $id)->firstorfail();

        return view('Admin.payments.edit', compact('PaymentMethod'));
    }

    public function update(UpdatePaymentMethodRequest $request, $id)
    {
        $PaymentMethod = Payment::latest()->where('id', $id)->firstorfail();
        $PaymentMethod->update($request->validated());
        if ($request->hasFile('image')) {
            $PaymentMethod->image = Upload::UploadFile($request['image'], 'PaymentMethods');
            $PaymentMethod->save();
        }
        alert()->success(__('trans.updatedSuccessfully'));

        return redirect()->back();
    }

    public function destroy($id)
    {
        Payment::latest()->where('id', $id)->delete();
    }
}
