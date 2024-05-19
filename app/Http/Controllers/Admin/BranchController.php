<?php

namespace App\Http\Controllers\Admin;

use App\Functions\Upload;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreBranchRequest;
use App\Http\Requests\Admin\UpdateBranchRequest;
use App\Models\Branch;
use App\Models\Category;
use App\Models\Country;
use App\Models\Day;
use App\Models\Product;
use App\Models\Region;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class BranchController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $Branchs = Branch::latest();
            // if ($request->country_id) {
            //     $Branchs = $Branchs->where('country_id', $request->country_id);
            // }

            return Datatables::of($Branchs)
                ->addColumn('action', function ($Model) {
                    $data = '';
                    // $data .= '<a style="color: #000;" href="'.route('admin.branch.categories', $Model).'"><i class="fas fa-eye"></i></a>';

                    $data .= '<a style="color: #000;" href="'.route('admin.branches.edit', $Model).'"><i class="fa-solid fa-pen-to-square"></i></a>';

                    $data .= '<form class="formDelete" method="POST" action="'.route('admin.branches.destroy', $Model).'">
                                    '.csrf_field().'
                                    <input name="_method" type="hidden" value="DELETE">
                                    <button type="button" class="btn btn-flat show_confirm" data-toggle="tooltip" title="Delete"><i class="fa-solid fa-eraser"></i></button>
                                </form>';

                    return $data;
                })
                ->editColumn('status', function ($Model) {
                    return '<input class="toggle" type="checkbox" onclick="toggleswitch('.$Model->id.',\'branches\')" '.($Model->status ? 'checked' : '').'>';
                })
                // ->editColumn('delivery', function ($Model) {
                //     return '<input class="toggle" type="checkbox" onclick="toggleswitch('.$Model->id.',\'branches\',\'delivery\')" '.($Model->delivery ? 'checked' : '').'>';
                // })
                // ->editColumn('pickup', function ($Model) {
                //     return '<input class="toggle" type="checkbox" onclick="toggleswitch('.$Model->id.',\'branches\',\'pickup\')" '.($Model->pickup ? 'checked' : '').'>';
                // })
                // ->editColumn('dinein', function ($Model) {
                //     return '<input class="toggle" type="checkbox" onclick="toggleswitch('.$Model->id.',\'branches\',\'dinein\')" '.($Model->dinein ? 'checked' : '').'>';
                // })
                // ->editColumn('title_ar', function ($Country) {
                //     return '<a href="'.route('admin.branch.categories', $Country).'">'.$Country->title_ar.'</a>';
                // })
                // ->editColumn('title_en', function ($Country) {
                //     return '<a href="'.route('admin.branch.categories', $Country).'">'.$Country->title_en.'</a>';
                // })
                // ->editColumn('country_id', function ($Branch) {
                //     return '<a style="color: blue;" href="'.route('admin.countries.show', ['country' => $Branch->Country ? $Branch->Country['id'] : 1]).'">'.mb_strimwidth($Branch->Country ? $Branch->Country->title() : null, 0, 50, '...').'</a>';
                // })
                ->addIndexColumn()
                ->addColumn('checkbox', function ($Model) {
                    return '<input type="checkbox" class="DTcheckbox" value="'.$Model->id.'">';
                })
                ->escapeColumns('action', 'checkbox', 'status')
                ->make(true);
        }

        return view('Admin.branchs.index');
    }

    public function create()
    {
        $countries = Country::where('status',1)->whereHas('Regions')->get();
        $categories = Category::get();
        $Days = Day::get();

        return view('Admin.branchs.create', compact('categories', 'countries','Days'));
    }
    public function CountryRegions($country_id)
    {
        $Append = '';
        $SelectedBranch = session()->get('SelectedBranch');
        foreach (Region::where('country_id', $country_id)->where('status',1)->when($SelectedBranch && str_contains(url()->previous(), '/address/create'), function ($query) use ($SelectedBranch) {
            return $query->whereIn('id', $SelectedBranch->Regions->pluck('id'));
        })->get() as $Region) {
            $Append .= '<option value="'.$Region->id.'">'.$Region->title().'</option>';
        }

        return response()->json($Append);
    }
    public function store(StoreBranchRequest $request)
    {
        $Branch = Branch::create($request->only('country_id','region_id', 'title_ar', 'title_en', 'phone', 'whatsapp', 'email', 'address_ar', 'address_en', 'status'));

        // $Branch->categories()->attach($request->categories);
        // $Branch->Regions()->attach($request->regions);
        // foreach ((array) $request->images as $img) {
        //     $Branch->Images()->create([
        //         'image' => Upload::UploadFile($img, 'Branches'),
        //     ]);
        // }
        // if ($request->open && $request->close && count($request->open) == count($request->open)) {
        //     foreach ((array) $request->open as $key => $val) {
        //         $Branch->Days()->attach($request->days[$key],[
        //             'open' => $request->open[$key],
        //             'close' => $request->close[$key],
        //         ]);
        //     }
        // }
        alert()->success(__('trans.addedSuccessfully'));

        return redirect()->back();
    }

    public function edit($id)
    {
        $countries = Country::where('status',1)->whereHas('Regions')->get();
        $Branch = Branch::with('Country', 'Region')->find($id);
        $categories = Category::get();
        $regions = Region::where('country_id', $Branch->country_id)->get();
        $Days = Day::get();

        return view('Admin.branchs.edit', compact('Branch', 'categories', 'regions', 'countries','Days'));
    }

    public function update(UpdateBranchRequest $request, Branch $Branch)
    {
        $Branch->update($request->only('country_id','region_id', 'title_ar', 'title_en', 'phone', 'whatsapp', 'email', 'address_ar', 'address_en', 'delivery', 'pickup', 'dinein', 'status', 'lat', 'long'));

        // $Branch->categories()->detach();
        // $Branch->categories()->attach($request->categories);
        // $Branch->Regions()->detach();
        // $Branch->Regions()->attach($request->regions);
        // if ($request->images && count($request->images)) {
        //     foreach ((array) $request->images as $img) {
        //         $Branch->Images()->create([
        //             'image' => Upload::UploadFile($img, 'Branches'),
        //         ]);
        //     }
        // }
        // $Branch->Days()->detach();
        // if ($request->open && $request->close && count($request->open) == count($request->open)) {
        //     foreach ((array) $request->open as $key => $val) {
        //         $Branch->Days()->attach($request->days[$key],[
        //             'open' => $request->open[$key],
        //             'close' => $request->close[$key],
        //         ]);
        //     }
        // }
        alert()->success(__('trans.updatedSuccessfully'));

        return redirect()->back();
    }

    public function destroy(Branch $Branch)
    {
        $Branch->delete();
    }

    public function editCategories(Branch $Branch, Request $request)
    {
        $categories = Category::get();

        return view('Admin.branchs.editCategories', compact('Branch', 'categories'));
    }

    public function updateCategories(Branch $Branch, Request $request)
    {
        $Branch->categories()->detach();
        $Branch->categories()->attach($request->categories);
        alert()->success(__('trans.updatedSuccessfully'));

        return back();
    }

    public function editProducts(Branch $Branch, Category $Category, Request $request)
    {
        $products = Product::select(['id', 'title_ar', 'title_en'])->whereHas('Categories', function ($query) use ($Category) {
            $query->where('category_id', $Category->id);
        })->without(['Images', 'SizeColor'])->get();

        return view('Admin.branchs.editProducts', compact('Branch', 'Category', 'products'));
    }

    public function updateProducts(Branch $Branch, Category $Category, Request $request)
    {
        DB::table('branch_product')->where('branch_id', $Branch->id)->whereIn('product_id', $Category->products->wherenotIn('id', $request->products)->pluck('id'))->delete();
        $Branch->products()->attach($request->products);
        alert()->success(__('trans.updatedSuccessfully'));

        return back();
    }
}
