<?php

namespace App\Http\Controllers\Admin;

use App\Functions\Upload;
use App\Http\Controllers\Controller;

use App\Models\Banner;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class BannerController extends Controller
{
    public function index(Request $request)
    {
        // dd(1);
        if ($request->ajax()) {
            $Models = Banner::latest();

            return DataTables::of($Models)
                ->addColumn('action', function ($Model) {
                    return '
                            <a href="'.route('admin.banner.edit', ['banner' => $Model]).'"><i class="fa-solid fa-pen-to-square"></i></a>
                            <form class="formDelete" method="POST" action="'.route('admin.banner.destroy', ['banner' => $Model]).'">
                                '.csrf_field().'
                                <input name="_method" type="hidden" value="DELETE">
                                <button type="button" class="btn btn-flat show_confirm" data-toggle="tooltip" title="Delete">
                                    <i class="fa-solid fa-eraser"></i>
                                </button>
                            </form>';
                })
                ->addColumn('image', function ($Model) {
                    return '<a class="image-popup-no-margins" href="'.image_path($Model['image']).'">
                        <img src="'.image_path($Model['image']).'" style="max-height: 150px;max-width: 150px">
                    </a>';
                })

                ->editColumn('status', function ($Model) {
                    return '<input class="toggle" type="checkbox" onclick="toggleswitch('.$Model->id.',\'banners\')" '.($Model->status ? 'checked' : '').'>';
                })
                ->escapeColumns('action', 'checkbox', 'image')
                ->addIndexColumn()
                ->addColumn('checkbox', function ($Model) {
                    return '<input type="checkbox" class="DTcheckbox" value="'.$Model->id.'">';
                })
                ->toJson();
        }

        return view('Admin.banner.index');
    }

    public function create(Request $request)
    {
        return view('Admin.banner.create');
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $this->validate($request, [
            'title_ar'=> 'nullable',
            'title_en'=> 'nullable',
            'desc_ar'=> 'nullable',
            'postion'=>'required',
            'desc_en'=> 'nullable',
            'image'=>'required',
            'status' => ['boolean'],
        ]);
        $banner=Banner::create([
            'title_ar'=> $request->title_ar,
            'title_en'=> $request->title_en,
            'desc_ar'=> $request->desc_ar,
            'postion'=>$request->postion,
            'desc_en'=> $request->desc_en,
            'status'=> $request->status,
        ]);
        if ($request->hasFile('image')) {
            $banner->image = Upload::UploadFile($request['image'], 'banner');
            $banner->save();
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
        $Image = Banner::latest()->findOrFail($id);

        return view('Admin.banner.edit', compact('Image'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title_ar'=> 'nullable',
            'title_en'=> 'nullable',
            'desc_ar'=> 'nullable',
            'postion'=>'required',
            'desc_en'=> 'nullable',
            'status' => ['boolean'],
        ]);
        $banner = Banner::latest()->findOrFail($id);
        $banner->update([
            'title_ar'=> $request->title_ar,
            'title_en'=> $request->title_en,
            'desc_ar'=> $request->desc_ar,
            'desc_en'=> $request->desc_en,
            'status'=> $request->status,
        ]);
        if ($request->hasFile('image')) {
            $banner->image = Upload::UploadFile($request['image'], 'banner');
            $banner->save();
        }
        alert()->success(__('trans.updatedSuccessfully'));

        return redirect()->back();
    }

    public function destroy($id)
    {
        Banner::latest()->where('id', $id)->delete();
    }
}
