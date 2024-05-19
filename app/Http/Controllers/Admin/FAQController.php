<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreFAQRequest;
use App\Http\Requests\Admin\UpdateFAQRequest;
use App\Models\FAQ;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class FAQController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $FAQs = FAQ::latest();

            return Datatables::of($FAQs)
                ->addColumn('action', function ($FAQ) {
                    return '<a style="color: #000;" href="'.route('admin.faq.show', $FAQ).'"><i class="fas fa-eye"></i></a>
                            <a style="color: #000;" href="'.route('admin.faq.edit', $FAQ).'"><i class="fa-solid fa-pen-to-square"></i></a>
                            <form class="formDelete" method="POST" action="'.route('admin.faq.destroy', $FAQ).'">
                                '.csrf_field().'
                                <input name="_method" type="hidden" value="DELETE">
                                <button type="button" class="btn btn-flat show_confirm" data-toggle="tooltip" title="Delete"><i class="fa-solid fa-eraser"></i></button>
                            </form>';
                })
                ->editColumn('type', function ($Model) {
                    return trans('trans.'.$Model->type);
                })
                ->editColumn('status', function ($Model) {
                    return '<input class="toggle" type="checkbox" onclick="toggleswitch('.$Model->id.',\'f_a_q_s\')" '.($Model->status ? 'checked' : '').'>';
                })
                ->addIndexColumn()
                ->addColumn('checkbox', function ($Model) {
                    return '<input type="checkbox" class="DTcheckbox" value="'.$Model->id.'">';
                })
                ->escapeColumns('action', 'checkbox', 'status')
                ->make(true);
        }

        return view('Admin.faq.index');
    }

    public function create()
    {
        return view('Admin.faq.create');
    }

    public function store(StoreFAQRequest $request)
    {
        FAQ::create($request->validated());

        alert()->success(__('trans.addedSuccessfully'));

        return redirect()->back();
    }

    public function show($id)
    {
        $faq = FAQ::latest()->findOrFail($id);

        return view('Admin.faq.show', compact('faq'));
    }

    public function edit($id)
    {
        $FAQ = FAQ::latest()->findOrFail($id);

        return view('Admin.faq.edit', compact('FAQ'));
    }

    public function update(UpdateFAQRequest $request, $id)
    {
        FAQ::latest()->findOrFail($id)->update($request->validated());

        alert()->success(__('trans.updatedSuccessfully'));

        return redirect()->back();
    }

    public function destroy($id)
    {
        $faq = FAQ::latest()->findOrFail($id);
        $faq->delete();

    }

    public function switch()
    {
        $faq = FAQ::latest()->findOrFail(request('id'));
        $faq->status = request('status');
        $faq->save();
    }
}
