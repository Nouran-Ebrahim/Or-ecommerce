<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreDelivryRequest;
use App\Http\Requests\Admin\UpdateDelivryRequest;
use App\Models\Delivry;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class DelivryController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $delivrys = Delivry::latest();

            return Datatables::of($delivrys)
                ->addColumn('action', function ($Model) {
                    $data = '';
                    $data .= '<a style="color: #000;" href="'.route('admin.deliveries.edit', $Model).'"><i class="fa-solid fa-pen-to-square"></i></a>';

                    return $data;
                })
                ->editColumn('status', function ($Model) {
                    return '<input class="toggle" type="checkbox" onclick="toggleswitch(' . $Model->id . ',\'delivries\')" ' . ($Model->status ? 'checked' : '') . '>';
                })
                ->addIndexColumn()
                ->addColumn('checkbox', function ($Model) {
                    return '<input type="checkbox" class="DTcheckbox" value="'.$Model->id.'">';
                })
                ->escapeColumns('action', 'checkbox', 'status')
                ->make(true);
        }

        return view('Admin.deliveries.index');
    }

    public function create()
    {
        return view('Admin.deliveries.create');
    }

    public function store(StoreDelivryRequest $request)
    {
        Delivry::create($request->validated());
        alert()->success(__('trans.addedSuccessfully'));

        return redirect()->back();
    }

    public function show($id)
    {
        $Delivry = Delivry::find($id);

        return view('Admin.deliveries.show', compact('Delivry'));
    }

    public function edit($id)
    {
        $Delivry = Delivry::find($id);

        return view('Admin.deliveries.edit', compact('Delivry'));
    }

    public function update(UpdateDelivryRequest $request, $id)
    {
        $Delivry = Delivry::find($id);
        $Delivry->update($request->validated());
        alert()->success(__('trans.updatedSuccessfully'));

        return redirect()->back();
    }

    public function destroy($id)
    {
        $Delivry = Delivry::find($id);
        $Delivry->delete();
    }
}
