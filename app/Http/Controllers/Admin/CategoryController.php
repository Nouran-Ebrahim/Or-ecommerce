<?php

namespace App\Http\Controllers\Admin;

use App\Functions\Upload;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreCategoryRequest;
use App\Http\Requests\Admin\UpdateCategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class CategoryController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $Categories = Category::latest();

            return Datatables::of($Categories)
                ->addColumn('action', function ($Category) {
                    return '<a href="' . route('admin.categories.edit', $Category) . '"><i class="fa-solid fa-pen-to-square"></i></a>
                    <form class="formDelete" method="POST" action="' . route('admin.categories.destroy', $Category) . '">
                                    ' . csrf_field() . '
                                    <input name="_method" type="hidden" value="DELETE">
                                    <button type="button" class="btn btn-flat show_confirm" data-toggle="tooltip" title="Delete"><i class="fa-solid fa-eraser"></i></button>
                    </form>
                    ';
                })
                ->addColumn('image', function ($Model) {
                    return '<a class="image-popup-no-margins" href="' . $Model['image'] . '">
                        <img src="' . $Model['image'] . '" style="max-height: 150px;max-width: 150px">
                    </a>';
                })
                ->editColumn('is_parent', function ($Model) {
                    return $Model->is_parent ? trans('trans.yes') : trans('trans.no');

                })
                ->editColumn('parent_id', function ($Model) {
                    if ($Model->parent_id == null) {
                        return '';
                    } else {
                        $mainCategory = Category::where('id', '=', $Model->parent_id)->first()->title();
                        return $mainCategory;
                    }


                })
                ->editColumn('status', function ($Model) {
                    return '<input class="toggle" type="checkbox" onclick="toggleswitch(' . $Model->id . ',\'categories\')" ' . ($Model->status ? 'checked' : '') . '>';
                })
                ->addIndexColumn()
                ->addColumn('checkbox', function ($Model) {
                    return '<input type="checkbox" class="DTcheckbox" value="' . $Model->id . '">';
                })
                ->escapeColumns('action', 'checkbox', 'status')
                ->make(true);
        }

        return view('Admin.categories.index');
    }

    public function create()
    {
        $MainCategories = Category::
            where('status', 1)->where('parent_id', null)->with('children') // Fetch main categories
            ->get();
        $rows = [];
        foreach ($MainCategories as $main) {
            $rows[] = $main;
            foreach ($main->children->where('status',1) as $sub) {
                $rows[] = $sub;
            }

        }
        return view('Admin.categories.create', ['Categories' => $rows]);
    }

    public function store(StoreCategoryRequest $request)
    {
        // dd($request->all());
        if (isset($request->parent_id)) {
            $parent_id = $request->parent_id;
        } else {
            $parent_id = null;
        }
        if (isset($request->is_parent)) {
            $is_parent = $request->is_parent;
        } else {
            $is_parent = 0;
        }
        $Category = Category::latest()->create([
            'parent_id' => $parent_id,
            'is_parent' => $is_parent
        ] + $request->validated());
        if ($request->hasFile('image')) {
            $Category->image = Upload::UploadFile($request['image'], 'Categories');
            $Category->save();
        }
        alert()->success(__('trans.addedSuccessfully'));

        return redirect()->back();
    }

    public function show(Category $Category)
    {
        return view('Admin.categories.show', compact('Category'));
    }

    public function edit($id)
    {
        $Category = Category::latest()->where('id', $id)->firstorfail();
        $MainCategories = Category::
            where('status', 1)->where('parent_id', null)->with('children') // Fetch main categories
            ->get();
        $rows = [];
        foreach ($MainCategories as $main) {
            if ($main->id != $id) {
                $rows[] = $main;
            }

            foreach ($main->children as $sub) {
                if ($sub->id != $id) {
                    $rows[] = $sub;
                }

            }

        }
        return view('Admin.categories.edit', ['Category' => $Category, 'MainCategories' => $rows]);
    }

    public function update(UpdateCategoryRequest $request, $id)
    {
        $Category = Category::latest()->where('id', $id)->firstorfail();
        if (isset($request->parent_id)) {
            $parent_id = $request->parent_id;

        } else {
            $parent_id = null;
        }
        if (isset($request->is_parent)) {
            $is_parent = 1;
            $parent_id = null;
        } else {
            $is_parent = 0;
            $parent_id = $request->parent_id;
        }
        $Category->update([
            'parent_id' => $parent_id,
            'is_parent' => $is_parent
        ] + $request->validated());
        if ($request->hasFile('image')) {
            $Category->image = Upload::UploadFile($request['image'], 'Categories');
            $Category->save();
        }
        alert()->success(__('trans.updatedSuccessfully'));

        return redirect()->back();
    }

    public function destroy($id)
    {
        $category = Category::where('id', $id)->first();
        $child = Category::where('parent_id', $id)->pluck('id');
        if ($category) {
            $category->delete();
            if (count($child) > 0) {
                Category::shiftChild($child);
            }

        }


    }
}
