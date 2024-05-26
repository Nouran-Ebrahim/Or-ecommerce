<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Address;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Stevebauman\Location\Facades\Location;
use App\Models\Region;
use App\Models\Order;
use App\Models\Country;

class AddressController extends Controller
{
    public function index()
    {
        // return redirect()->route('client.profile');
        $Client = auth('client')->user();
        $addresses = $Client->addresses;
        $defaultAddress = Address::with(['country', 'region'])->where('client_id', $Client->id)->where('default', 1)->first();
        
        $Orders = Order::where('client_id',auth('client')->user()->id)->get();
        return view('Client.address.index', [
            'Client' => $Client,
            'addresses' => $addresses,
            'defaultAddress' => $defaultAddress,
            'Orders'=>$Orders
        ]);
    }

    public function create()
    {
        // dd(1);
        // $Location = Location::get(request()->ip());

        // return view('Client.address.create', [
        //     'lat' => $Location ? $Location->latitude : 0,
        //     'long' => $Location ? $Location->longitude : 0,
        // ]);
        $countries = Country::active()->whereHas('Regions')->get();
        $regions = Region::where('country_id', Country()->id)->where('status', 1)->get();
        $Client = auth('client')->user();
        $addresses = $Client->addresses;
        $defaultAddress = Address::with(['country', 'region'])->where('client_id', $Client->id)->where('default', 1)->first();
        
        $Orders = Order::where('client_id',auth('client')->user()->id)->get();
        return view('Client.address.create', [
            'countries' => $countries,
            'regions' => $regions,
            'Client' => $Client,
            'addresses' => $addresses,
            'defaultAddress' => $defaultAddress,
            'Orders'=>$Orders
        ]);
    }

    public function store(Request $request)
    {
        // dd(1);
        // dd($request->all());
        $this->validate($request, [
            'country_id' => 'required|exists:countries,id',
            'region_id' => 'required|exists:regions,id',
            'flat' => 'numeric|nullable',
            'zone' => 'required',
            'road' => 'required',
            'building_no' => 'required|numeric',
            'floor_no' => 'numeric|nullable',
            'note' => 'nullable'
        ]);
        $defaultAddress = Address::where('client_id', auth('client')->user()->id)->where('default', 1)->latest()->first();
        $default = isset($request->default) ? 1 : 0;
        if ($defaultAddress) {

            if ($default == 1) {
                $defaultAddress->update(["default" => 0]);
                Address::create([
                    'client_id' => auth('client')->user()->id,
                    'region_id' => $request->region_id,
                    'flat' => $request->flat,
                    'zone' => $request->zone,
                    'road' => $request->road,
                    'building_no' => $request->building_no,
                    'floor_no' => $request->floor_no,
                    'default' => 1,
                    'country_id' => $request->country_id,
                    'note' => $request->note,
                ]);
            } else {
                Address::create([
                    'client_id' => auth('client')->user()->id,
                    'region_id' => $request->region_id,
                    'flat' => $request->flat,
                    'zone' => $request->zone,
                    'road' => $request->road,
                    'building_no' => $request->building_no,
                    'floor_no' => $request->floor_no,
                    'default' => 0,
                    'country_id' => $request->country_id,
                    'note' => $request->note,
                ]);
            }

        } else {
            // $this->validate($request, [
            //     'default' => 'required'
            // ]);

            Address::create([
                'client_id' => auth('client')->user()->id,
                'region_id' => $request->region_id,
                'country_id' => $request->country_id,
                'flat' => $request->flat,
                'zone' => $request->zone,
                'road' => $request->road,
                'building_no' => $request->building_no,
                'floor_no' => $request->floor_no,
                'default' => $default,
                'note' => $request->note,
            ]);
        }
        // dd(1);

        // dd($default);


        alert()->success(__('trans.addedSuccessfully'));

        return redirect()->back();
    }

    public function edit($id)
    {
        $countries = Country::active()->whereHas('Regions')->get();
        $regions = Region::where('country_id', Country()->id)->where('status', 1)->get();
        $address = Address::findOrFail($id);
        $Location = Location::get(request()->ip());
        $Client = auth('client')->user();
        $addresses = $Client->addresses;
        $defaultAddress = Address::with(['country', 'region'])->where('client_id', $Client->id)->where('default', 1)->first();
        
        $Orders = Order::where('client_id',auth('client')->user()->id)->get();
        return view('Client.address.edit', [
            'address' => $address,
            'countries' => $countries,
            'regions' => $regions,
            'Client' => $Client,
            'addresses' => $addresses,
            'defaultAddress' => $defaultAddress,
            'Orders'=>$Orders
        ]);
    }

    public function update(Request $request, $id)
    {

        $this->validate($request, [
            'country_id' => 'required|exists:countries,id',
            'region_id' => 'required|exists:regions,id',
            'flat' => 'numeric|nullable',
            'zone' => 'required',
            'road' => 'required',
            'building_no' => 'required|numeric',
            'floor_no' => 'numeric|nullable',
            'note' => 'nullable'
        ]);
        $defaultAddress = Address::where('client_id', auth('client')->user()->id)->where('default', 1)->latest()->first();
        $default = isset($request->default) ? 1 : 0;
        if ($defaultAddress) {
            if ($default == 1) {
                $defaultAddress->update(["default" => 0]);
                Address::where('id', $id)->update(['default' => 1] + $request->except('_token', '_method'));

            } else {
                Address::where('id', $id)->update(['default' => 0] + $request->except('_token', '_method'));

            }
        } else {
            Address::where('id', $id)->update(['default' => $default] + $request->except('_token', '_method'));

        }

        alert()->success(__('trans.updatedSuccessfully'));

        return redirect()->back();
    }

    public function destroy($id)
    {
        $address = Address::where('id', $id)->first();
        $ordersCount = Order::where('address_id', $id)->count();

        // If the address has orders, return a response indicating it cannot be deleted
        if ($ordersCount > 0) {
            alert()->success(__('trans.Cannot be deleted as it has orders'));

        }else{
            $address->delete();
            alert()->success(__('trans.DeletedSuccessfully'));

        }

        return redirect()->back();
    }
}
