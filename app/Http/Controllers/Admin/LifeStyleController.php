<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreFAQRequest;
use App\Http\Requests\Admin\UpdateFAQRequest;
use App\Models\LifeStyle;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use App\Functions\Upload;

class LifeStyleController extends Controller
{
    public function index(Request $request)
    {
        // dd(1);
        if ($request->ajax()) {
            $lifeStyle = LifeStyle::latest();

            return Datatables::of($lifeStyle)
                ->addColumn('action', function ($lifestyle) {
                    return '
                            <a style="color: #000;" href="' . route('admin.lifestyle.edit', $lifestyle) . '"><i class="fa-solid fa-pen-to-square"></i></a>
                            <form class="formDelete" method="POST" action="' . route('admin.lifestyle.destroy', $lifestyle) . '">
                                ' . csrf_field() . '
                                <input name="_method" type="hidden" value="DELETE">
                                <button type="button" class="btn btn-flat show_confirm" data-toggle="tooltip" title="Delete"><i class="fa-solid fa-eraser"></i></button>
                            </form>';
                })
                ->editColumn('status', function ($Model) {
                    return '<input class="toggle" type="checkbox" onclick="toggleswitch(' . $Model->id . ',\'life_styles\')" ' . ($Model->status ? 'checked' : '') . '>';
                })->addColumn('image', function ($Model) {
                    return '<a class="image-popup-no-margins" href="' . image_path($Model['image']) . '">
                        <img src="' . image_path($Model['image']) . '" style="max-height: 150px;max-width: 150px">
                    </a>';
                })
                ->addIndexColumn()
                ->addColumn('checkbox', function ($Model) {
                    return '<input type="checkbox" class="DTcheckbox" value="' . $Model->id . '">';
                })
                ->escapeColumns('action', 'checkbox', 'status')
                ->make(true);
        }

        return view('Admin.lifestyle.index');
    }

    public function create()
    {
        return view('Admin.lifestyle.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'image' => ['required'],
            'status' => ['boolean'],
        ]);

        LifeStyle::create([
            'image' => Upload::UploadFile($request->image, 'lifstyle'),
            'status' => $request->status,
        ]);


        alert()->success(__('trans.addedSuccessfully'));

        return redirect()->back();
    }

    public function show($id)
    {
        $faq = FAQ::latest()->findOrFail($id);

        return view('Admin.lifestyle.show', compact('faq'));
    }

    public function edit($id)
    {
        $LifeStyle = LifeStyle::latest()->findOrFail($id);

        return view('Admin.lifestyle.edit', compact('LifeStyle'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'status' => ['boolean'],
        ]);
        $LifeStyle = LifeStyle::latest()->findOrFail($id);
        $LifeStyle->update([
            'status'=> $request->status,
        ]);
        if ($request->hasFile('image')) {
            $LifeStyle->image = Upload::UploadFile($request['image'], 'lifstyle');
            $LifeStyle->save();
        }
        alert()->success(__('trans.updatedSuccessfully'));

        return redirect()->back();
    }

    public function destroy($id)
    {
        $LifeStyle = LifeStyle::latest()->findOrFail($id);
        Upload::deleteImage($LifeStyle->image);
        $LifeStyle->delete();

    }


}
