<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreColorRequest;
use App\Http\Requests\Admin\UpdateColorRequest;
use App\Models\Color;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use App\Functions\Upload;

class ColorController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $countries = Color::latest();

            return DataTables::of($countries)
                ->addColumn('action', function ($Model) {
                    $data = '';
                    $data .= '<a style="color: #000;" href="'.route('admin.colors.edit', $Model).'"><i class="fa-solid fa-pen-to-square"></i></a>';

                    $data .= '<form class="formDelete" method="POST" action="'.route('admin.colors.destroy', $Model).'">
                                    '.csrf_field().'
                                    <input name="_method" type="hidden" value="DELETE">
                                    <button type="button" class="btn btn-flat show_confirm" data-toggle="tooltip" title="Delete"><i class="fa-solid fa-eraser"></i></button>
                                </form>';

                    return $data;
                })
                ->editColumn('status', function ($Model) {
                    return '<input class="toggle" type="checkbox" onclick="toggleswitch('.$Model->id.',\'colors\')" '.($Model->status ? 'checked' : '').'>';
                })
                ->editColumn('hexa', function ($Color) {
                    return '<span class="dot" style="background-color:'.$Color->hexa.'"></span>';
                })
                // ->addColumn('image', function ($Model) {
                //     return '<a class="image-popup-no-margins" href="'.$Model['image'].'">
                //         <img src="'.$Model['image'].'" style="max-height: 150px;max-width: 150px">
                //     </a>';
                // })
                ->addIndexColumn()
                ->addColumn('checkbox', function ($Model) {
                    return '<input type="checkbox" class="DTcheckbox" value="'.$Model->id.'">';
                })
                ->escapeColumns('action', 'checkbox', 'status')
                ->make(true);
        }

        return view('Admin.colors.index');
    }

    public function create()
    {
        return view('Admin.colors.create');
    }

    public function store(StoreColorRequest $request)
    {

        $colors=Color::latest()->create($request->validated());
        // if ($request->hasFile('image')) {
        //     $colors->image = Upload::UploadFile($request['image'], 'Colors');
        //     $colors->save();
        // }
        alert()->success(__('trans.addedSuccessfully'));

        return redirect()->back();
    }

    public function show(Color $Color)
    {
        return view('Admin.colors.show', compact('Color'));
    }

    public function edit(Color $Color)
    {
        return view('Admin.colors.edit', compact('Color'));
    }

    public function update(UpdateColorRequest $request, Color $Color)
    {
        $Color->update($request->validated());
        // if ($request->hasFile('image')) {
        //     $Color->image = Upload::UploadFile($request['image'], 'Colors');
        //     $Color->save();
        // }
        alert()->success(__('trans.updatedSuccessfully'));

        return redirect()->back();
    }

    public function destroy(Color $Color)
    {
        $Color->delete();
    }
}
