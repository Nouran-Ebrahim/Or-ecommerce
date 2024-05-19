<?php

namespace App\Http\Controllers\Admin;

use App\Functions\Upload;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\VacancyRequest;

use App\Models\Vacancy;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class VacanyController extends Controller
{
    public function index(Request $request)
    {
        // dd(1);
        if ($request->ajax()) {
            $Models = Vacancy::latest();

            return DataTables::of($Models)
                ->addColumn('action', function ($Model) {
                    return '
                            <a href="' . route('admin.vacancy.edit', ['vacancy' => $Model]) . '"><i class="fa-solid fa-pen-to-square"></i></a>
                            <form class="formDelete" method="POST" action="' . route('admin.vacancy.destroy', ['vacancy' => $Model]) . '">
                                ' . csrf_field() . '
                                <input name="_method" type="hidden" value="DELETE">
                                <button type="button" class="btn btn-flat show_confirm" data-toggle="tooltip" title="Delete">
                                    <i class="fa-solid fa-eraser"></i>
                                </button>
                            </form>';
                })
                // ->addColumn('image', function ($Model) {
                //     return '<a class="image-popup-no-margins" href="'.image_path($Model['image']).'">
                //         <img src="'.image_path($Model['image']).'" style="max-height: 150px;max-width: 150px">
                //     </a>';
                // })
               
                ->editColumn('status', function ($Model) {
                    return '<input class="toggle" type="checkbox" onclick="toggleswitch(' . $Model->id . ',\'vacancies\')" ' . ($Model->status ? 'checked' : '') . '>';
                })
                ->addColumn('applicants', function ($Model) {
                    return '<a href="' . route('admin.applicants.index',['vacancy'=>$Model->id] ) . '"><button class="btn btn-primary">' . __('trans.applicants') . '</button></a>';
                })
                ->escapeColumns('action', 'checkbox', 'image')
                ->addIndexColumn()
                ->addColumn('checkbox', function ($Model) {
                    return '<input type="checkbox" class="DTcheckbox" value="' . $Model->id . '">';
                })
                ->toJson();
        }

        return view('Admin.vacancy.index');
    }

    public function create(Request $request)
    {
        return view('Admin.vacancy.create');
    }

    public function store(VacancyRequest $request)
    {
        // dd($request->all());

        $vacancy = Vacancy::create([
            'title_ar' => $request->title_ar,
            'title_en' => $request->title_en,
            'desc_ar' => $request->desc_ar,
            'from' => $request->from,
            'to' => $request->to,
            'desc_en' => $request->desc_en,
            'status' => $request->status,
        ]);
        // dd($vacancy);
        // if ($request->hasFile('image')) {
        //     $vacancy->image = Upload::UploadFile($request['image'], 'vacancy');
        //     $vacancy->save();
        // }



        alert()->success(__('trans.addedSuccessfully'));

        return redirect()->back();
    }

    public function show($id)
    {
        $vacancy = Slider::latest()->findOrFail($id);

        return view('Admin.sliders.show', compact('vacancy'));
    }

    public function edit($id, VacancyRequest $request)
    {
        $vacancy = Vacancy::latest()->findOrFail($id);

        return view('Admin.vacancy.edit', compact('vacancy'));
    }

    public function update(Request $request, $id)
    {

        $vacancy = Vacancy::latest()->findOrFail($id);
        $vacancy->update([
            'title_ar' => $request->title_ar,
            'title_en' => $request->title_en,
            'desc_ar' => $request->desc_ar,
            'from' => $request->from,
            'to' => $request->to,
            'desc_en' => $request->desc_en,
            'status' => $request->status,
        ]);
        // if ($request->hasFile('image')) {
        //     $vacancy->image = Upload::UploadFile($request['image'], 'vacancy');
        //     $vacancy->save();
        // }
        alert()->success(__('trans.updatedSuccessfully'));

        return redirect()->back();
    }

    public function destroy($id)
    {
        Vacancy::latest()->where('id', $id)->delete();
    }
}
