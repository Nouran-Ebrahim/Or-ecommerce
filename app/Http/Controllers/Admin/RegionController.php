<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreRegionRequest;
use App\Http\Requests\Admin\UpdateRegionRequest;
use App\Models\Country;
use App\Models\Region;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class RegionController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $Regions = Region::latest();
            if ($request->country_id) {
                $Regions = $Regions->where('country_id', $request->country_id);
            }

            return DataTables::of($Regions)
                ->addColumn('action', function ($Model) {
                    $data = '';

                    $data .= '<a style="color: #000;" href="'.route('admin.regions.edit', $Model).'"><i class="fa-solid fa-pen-to-square"></i></a>';

                    $data .= '<form class="formDelete" method="POST" action="'.route('admin.regions.destroy', $Model).'">
                                    '.csrf_field().'
                                    <input name="_method" type="hidden" value="DELETE">
                                    <button type="button" class="btn btn-flat show_confirm" data-toggle="tooltip" title="Delete"><i class="fa-solid fa-eraser"></i></button>
                                </form>';

                    return $data;
                })
                ->editColumn('status', function ($Model) {
                    return '<input class="toggle" type="checkbox" onclick="toggleswitch('.$Model->id.',\'regions\')" '.($Model->status ? 'checked' : '').'>';
                })
                ->editColumn('country_id', function ($Region) {
                    return '<a style="color: blue;" href="'.route('admin.countries.show', ['country' => $Region->Country['id']]).'">'.mb_strimwidth($Region->Country->title(), 0, 50, '...').'</a>';
                })
                ->escapeColumns('action', 'checkbox', 'image')
                ->addIndexColumn()
                ->addColumn('checkbox', function ($Model) {
                    return '<input type="checkbox" class="DTcheckbox" value="'.$Model->id.'">';
                })
                ->toJson();
        }

        return view('Admin.regions.index');
    }

    public function create()
    {
        $Countries = Country::Active()->get();

        return view('Admin.regions.create', compact('Countries'));
    }

    public function store(StoreRegionRequest $request)
    {
        $Region = Region::latest()->create($request->validated());
        alert()->success(__('trans.addedSuccessfully'));

        return redirect()->back();
    }

    public function show(Region $Region)
    {
        return view('Admin.regions.show', compact('Region'));
    }

    public function edit(Region $Region)
    {
        $Countries = Country::Active()->get();

        return view('Admin.regions.edit', compact('Countries', 'Region'));
    }

    public function update(UpdateRegionRequest $request, Region $Region)
    {
        $Region->update($request->validated());
        alert()->success(__('trans.updatedSuccessfully'));

        return redirect()->back();
    }

    public function destroy(Region $Region)
    {
        $Region->delete();
    }
}
