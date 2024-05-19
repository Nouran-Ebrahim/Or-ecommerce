<?php

namespace App\Http\Controllers\Admin;

use App\Functions\Upload;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreAdminRequest;
use App\Http\Requests\Admin\UpdateAdminRequest;
use App\Models\Admin;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class AdminsController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $Admins = Admin::query();

            return Datatables::of($Admins)
                ->addColumn('action', function ($Model) {
                    $data = '';
                    $data .= '<a style="color: #000;" href="'.route('admin.admins.show', $Model).'"><i class="fas fa-eye"></i></a>';

                    $data .= '<a style="color: #000;" href="'.route('admin.admins.edit', $Model).'"><i class="fa-solid fa-pen-to-square"></i></a>';

                    $data .= '<form class="formDelete" method="POST" action="'.route('admin.admins.destroy', $Model).'">
                                    '.csrf_field().'
                                    <input name="_method" type="hidden" value="DELETE">
                                    <button type="button" class="btn btn-flat show_confirm" data-toggle="tooltip" title="Delete"><i class="fa-solid fa-eraser"></i></button>
                                </form>';

                    return $data;
                })
                ->addIndexColumn()
                ->addColumn('checkbox', function ($Model) {
                    return '<input type="checkbox" class="DTcheckbox" value="'.$Model->id.'">';
                })
                ->escapeColumns('action', 'checkbox', 'status')
                ->make(true);
        }

        return view('Admin.admins.index');
    }

    public function create()
    {
        return view('Admin.admins.create');
    }

    public function store(StoreAdminRequest $request)
    {
        $Admin = Admin::create($request->only(['name', 'email', 'phone', 'password', 'country_code', 'phone_code']));
        $Admin->password = bcrypt($request->password);
        if ($request->hasFile('image')) {
            $Admin->image = Upload::UploadFile($request->image, 'Admins');
        }
        $Admin->save();

        alert()->success(__('trans.addedSuccessfully'));

        return redirect()->back();
    }

    public function show($id)
    {
        $Admin = Admin::where('id', $id)->firstorfail();

        return view('Admin.admins.show', compact('Admin'));
    }

    public function edit($id)
    {
        $Admin = Admin::where('id', $id)->firstorfail();

        return view('Admin.admins.edit', compact('Admin'));
    }

    public function update(UpdateAdminRequest $request, $id)
    {
        $Admin = Admin::where('id', $id)->firstorfail();
        $Admin->update($request->only(['name', 'email', 'phone', 'country_code', 'phone_code']));
        if ($request->hasFile('image')) {
            $Admin->image = Upload::UploadFile($request->image, 'Admins');
        }
        if ($request->password) {
            $Admin->password = bcrypt($request->password);
        }
        $Admin->save();
        alert()->success(__('trans.updatedSuccessfully'));

        return redirect()->back();
    }

    public function destroy($id)
    {
        $Admin = Admin::where('id', $id)->firstorfail();
        if (Admin::count()) {
            $Admin->delete();
            alert()->success(__('trans.User successfully Deleted'));

            return redirect()->back();
        } else {
            alert()->error(__('trans.cantDeleteElement'));

            return redirect()->back();
        }
    }
}
