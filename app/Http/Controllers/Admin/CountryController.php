<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreCountryRequest;
use App\Http\Requests\Admin\UpdateCountryRequest;
use App\Models\Country;
use App\Models\Region;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class CountryController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $countries = Country::latest();

            return DataTables::of($countries)
                ->addColumn('action', function ($Model) {
                    $data = '';
                    $data .= '<a style="color: #000;" href="'.route('admin.countries.show', $Model).'"><i class="fas fa-eye"></i></a>';

                    $data .= '<a style="color: #000;" href="'.route('admin.countries.edit', $Model).'"><i class="fa-solid fa-pen-to-square"></i></a>';

                    return $data;
                })
                ->editColumn('title_ar', function ($Country) {
                    return '<a href="'.route('admin.countries.show', $Country).'">'.$Country->title_ar.'</a>';
                })
                ->editColumn('title_en', function ($Country) {
                    return '<a href="'.route('admin.countries.show', $Country).'">'.$Country->title_en.'</a>';
                })
                ->editColumn('regions', function ($Country) {
                    return '<a href="'.route('admin.countries.show', $Country).'">'.__('trans.regions').'</a>';
                })
                ->editColumn('status', function ($Model) {
                    return '<input class="toggle" type="checkbox" onclick="toggleswitch('.$Model->id.',\'countries\')" '.($Model->status ? 'checked' : '').'>';
                })
                ->addColumn('image', function ($Model) {
                    return '<a class="image-popup-no-margins" href="'.image_path($Model['image']).'">
                        <img src="'.image_path($Model['image']).'" style="max-height: 150px;max-width: 150px">
                    </a>';
                })
                ->escapeColumns('action', 'checkbox', 'image')
                ->addIndexColumn()
                ->addColumn('checkbox', function ($Model) {
                    return '<input type="checkbox" class="DTcheckbox" value="'.$Model->id.'">';
                })
                ->toJson();
        }

        return view('Admin.countries.index');
    }

    public function create()
    {
        return view('Admin.countries.create');
    }

    public function store(StoreCountryRequest $request)
    {
        Country::latest()->create($request->validated());
        alert()->success(__('trans.addedSuccessfully'));

        return redirect()->back();
    }

    public function show(Country $Country)
    {
        if (request()->delivery_cost) {
            Region::where('country_id', $Country->id)->update([
                'delivery_cost' => request()->delivery_cost,
            ]);
        }

        return view('Admin.countries.show', compact('Country'));
    }

    public function edit(Country $Country)
    {
        return view('Admin.countries.edit', compact('Country'));
    }

    public function update(UpdateCountryRequest $request, Country $Country)
    {
        $Country->update($request->validated());
        alert()->success(__('trans.updatedSuccessfully'));

        return redirect()->back();
    }

    public function destroy(Country $Country)
    {
        $Country->delete();
    }
}
