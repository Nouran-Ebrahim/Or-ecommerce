<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreAddressRequest;
use App\Http\Requests\Admin\UpdateAddressRequest;
use App\Models\Address;
use App\Models\Client;
use App\Models\Region;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class AddressController extends Controller
{
    public function index(Request $request, Client $client)
    {
        if ($request->ajax()) {
            $Addresss = Address::where('client_id', $client->id)->with('client', 'region')->get();

            return Datatables::of($Addresss)
                ->addColumn('action', function ($Model) {
                    $data = '';
                    $data .= '<a style="color: #000;" href="'.route('admin.addresses.show', $Model).'"><i class="fas fa-eye"></i></a>';

                    $data .= '<a style="color: #000;" href="'.route('admin.addresses.edit', $Model).'"><i class="fa-solid fa-pen-to-square"></i></a>';

                    $data .= '<form class="formDelete" method="POST" action="'.route('admin.addresses.destroy', $Model).'">
                                    '.csrf_field().'
                                    <input name="_method" type="hidden" value="DELETE">
                                    <button type="button" class="btn btn-flat show_confirm" data-toggle="tooltip" title="Delete"><i class="fa-solid fa-eraser"></i></button>
                                </form>';

                    return $data;
                })
                ->addColumn('client', function ($address) {
                    return $address->client->name;
                })
                ->addColumn('region', function ($address) {
                    return $address->region->title();
                })
                ->addColumn('email', function ($address) {
                    return $address->client->email;
                })
                ->addIndexColumn()
                ->addColumn('checkbox', function ($Model) {
                    return '<input type="checkbox" class="DTcheckbox" value="'.$Model->id.'">';
                })
                ->escapeColumns('action', 'client', 'region', 'email')
                ->make(true);
        }

        return view('Admin.addresses.index', compact('client'));
    }

    public function create(Client $client)
    {
        $regions = Region::get();

        return view('Admin.addresses.create', compact('regions', 'client'));
    }

    public function store(StoreAddressRequest $request)
    {
        Address::create($request->validated());
        alert()->success(__('trans.addedSuccessfully'));

        return redirect()->back();
    }

    public function show(Address $address)
    {
        return view('Admin.addresses.show', compact('address'));
    }

    public function edit(Address $address)
    {
        $regions = Region::get();

        return view('Admin.addresses.edit', compact('address', 'regions'));
    }

    public function udpate(UpdateAddressRequest $request, Address $address)
    {
        $address->update($request->validated());
        alert()->success(__('trans.updatedSuccessfully'));

        return redirect()->back();
    }

    public function destroy(Address $address)
    {
        $address->delete();
    }
}
