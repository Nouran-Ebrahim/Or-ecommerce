<?php

namespace App\Http\Controllers\Admin;

use App\Functions\Upload;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreClientRequest;
use App\Http\Requests\Admin\UpdateClientRequest;
use App\Models\Client;
use App\Models\Country;
use App\Models\Career;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class ApplicantsController extends Controller
{
    public function index(Request $request,$id=null)
    {
        // dd($request->vacancy);
        // $Clients = Career::where('vacancy_id', request("vacancy"))->get();
        // dd($Clients);
        if (request("vacancy") ?? null) {
                
            $Clients = Career::where('vacancy_id', request("vacancy"))->get();

        } else {
            // dd(1);
            $Clients = Career::all();

        }
        if ($request->ajax()) {
            return Datatables::of($Clients)
                ->addColumn('action', function ($Model) {
                    $data = '';
                    // $data .= '<a style="color: #000;" href="' . route('admin.applicants.show', $Model) . '"><i class="fas fa-eye"></i></a>';

                    // $data .= '<a style="color: #000;" href="'.route('admin.applicants.edit', $Model).'"><i class="fa-solid fa-pen-to-square"></i></a>';
    
                    $data .= '<form class="formDelete" method="POST" action="' . route('admin.applicants.destroy', $Model) . '">
                                    ' . csrf_field() . '
                                    <input name="_method" type="hidden" value="DELETE">
                                    <button type="button" class="btn btn-flat show_confirm" data-toggle="tooltip" title="Delete"><i class="fa-solid fa-eraser"></i></button>
                                </form>';

                    return $data;
                })

                ->addColumn('name', function ($Client) {
                    return $Client->first_name . ' ' . $Client->last_name;
                })
                ->addColumn('file', function ($Client) {
                    return '<a href="' . $Client->file . '" download>' . trans('trans.DownloadCv') . '</a>';
                })
                ->addColumn('img', function ($Client) {
                    return '<img src="' . Country::where('country_code', $Client->country_code)->first()->image . '" style="height: 30px;" >';
                })
                // ->addColumn('addresses', function ($Client) {
                //     return '<a href="'.route('admin.addresses.index', $Client).'"><button class="btn btn-primary">'.__('trans.addresses').'</button></a>';
                // })
                ->addIndexColumn()
                ->addColumn('checkbox', function ($Model) {
                    return '<input type="checkbox" class="DTcheckbox" value="' . $Model->id . '">';
                })
                ->escapeColumns('action', 'checkbox', 'status', 'addresses')
                ->make(true);
        }

        return view('Admin.applicants.index',['Clients'=>$Clients]);
    }

    public function create()
    {
        return view('Admin.clients.create');
    }

    public function store(StoreClientRequest $request)
    {
        $Client = Client::create($request->only(['name', 'email', 'phone', 'country_code', 'phone_code']));
        $Client->password = bcrypt($request->password);
        if ($request->hasFile('image')) {
            $Client->image = Upload::UploadFile($request->image, 'Clients');
        }
        $Client->save();
        alert()->success(__('trans.addedSuccessfully'));

        return redirect()->back();
    }

    public function show(Client $Client)
    {
        $Client = $Client->firstorfail();

        return view('Admin.clients.show', compact('Client'));
    }

    public function edit(Client $Client)
    {
        return view('Admin.clients.edit', compact('Client'));
    }

    public function update(UpdateClientRequest $request, $id)
    {
        // dd($request->all());
        $Client = Client::where('id', $id)->firstorfail();
        $Client->update($request->only(['first_name', 'last_name', 'email', 'phone', 'country_code', 'phone_code']));
        if ($request->hasFile('image')) {
            $Client->image = Upload::UploadFile($request->image, 'Clients');
        }
        if ($request->password) {
            $Client->password = bcrypt($request->password);
        }
        if ($request->password) {
            $Client->password_confirmation = bcrypt($request->password_confirmation);
        }
        $Client->save();
        alert()->success(__('trans.updatedSuccessfully'));

        return redirect()->back();
    }

    public function destroy($id)
    {
        $Client = Client::where('id', $id)->firstorfail();
        $Client->delete();
    }
}
