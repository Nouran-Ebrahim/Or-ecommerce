<?php

namespace App\Http\Controllers\Admin;

use App\Functions\Upload;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreImageRequest;
use App\Http\Requests\Admin\UpdateImageRequest;
use App\Models\Slider;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class SliderController extends Controller
{
    public function index(Request $request)
    {
        // dd(1);
        if ($request->ajax()) {
            $Models = Slider::latest();

            return DataTables::of($Models)
                ->addColumn('action', function ($Model) {
                    return '<a href="' . route('admin.sliders.show', ['slider' => $Model]) . '"><i class="fas fa-eye"></i></a>
                            <a href="' . route('admin.sliders.edit', ['slider' => $Model]) . '"><i class="fa-solid fa-pen-to-square"></i></a>
                            <form class="formDelete" method="POST" action="' . route('admin.sliders.destroy', ['slider' => $Model]) . '">
                                ' . csrf_field() . '
                                <input name="_method" type="hidden" value="DELETE">
                                <button type="button" class="btn btn-flat show_confirm" data-toggle="tooltip" title="Delete">
                                    <i class="fa-solid fa-eraser"></i>
                                </button>
                            </form>';
                })
                ->addColumn('image', function ($Model) {
                    if ($Model->type == "image") {
                        return '<a class="image-popup-no-margins" href="' . image_path($Model['image']) . '">
                        <img src="' . image_path($Model['image']) . '" style="max-height: 150px;max-width: 150px">
                    </a>';
                    }

                })

                ->editColumn('status', function ($Model) {
                    return '<input class="toggle" type="checkbox" onclick="toggleswitch(' . $Model->id . ',\'sliders\')" ' . ($Model->status ? 'checked' : '') . '>';
                })
                ->editColumn('type', function ($Model) {
                    return trans('trans.' . $Model->type);
                })
                ->escapeColumns('action', 'checkbox', 'image')
                ->addIndexColumn()
                ->addColumn('checkbox', function ($Model) {
                    return '<input type="checkbox" class="DTcheckbox" value="' . $Model->id . '">';
                })
                ->toJson();
        }

        return view('Admin.sliders.index');
    }

    public function create(Request $request)
    {
        return view('Admin.sliders.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title_ar' => 'required',
            'title_en' => 'required',
            'desc_ar' => 'required',
            'type' => 'required',
            'desc_en' => 'required',
            'image' => 'required_if:type,image',
            'vedio' => 'required_if:type,vedio',
            'status' => ['boolean'],
        ]);
        $slider = Slider::create([
            'title_ar' => $request->title_ar,
            'title_en' => $request->title_en,
            'desc_ar' => $request->desc_ar,
            'type' => $request->type,
            'desc_en' => $request->desc_en,
            'status' => $request->status,
        ]);
        if ($request->hasFile('image')) {
            $slider->image = Upload::UploadFile($request['image'], 'Images');
            $slider->save();
        }
        if ($request->hasFile('vedio')) {
            $slider->vedio = Upload::UploadFile($request['vedio'], 'Images');
            $slider->save();
        }


        alert()->success(__('trans.addedSuccessfully'));

        return redirect()->back();
    }

    public function show($id)
    {
        $Image = Slider::latest()->findOrFail($id);

        return view('Admin.sliders.show', compact('Image'));
    }

    public function edit($id, Request $request)
    {
        $Image = Slider::latest()->findOrFail($id);

        return view('Admin.sliders.edit', compact('Image'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title_ar' => 'required',
            'title_en' => 'required',
            'desc_ar' => 'required',
            'desc_en' => 'required',
            'status' => ['boolean'],
        ]);
        $slider = Slider::latest()->findOrFail($id);
        $slider->update([
            'title_ar' => $request->title_ar,
            'title_en' => $request->title_en,
            'desc_ar' => $request->desc_ar,
            'desc_en' => $request->desc_en,
            'status' => $request->status,
        ]);
        if ($request->hasFile('image')) {
            $slider->image = Upload::UploadFile($request['image'], 'Images');
            $slider->save();
        }
        alert()->success(__('trans.updatedSuccessfully'));

        return redirect()->back();
    }

    public function destroy($id)
    {
        Slider::latest()->where('id', $id)->delete();
    }
}
