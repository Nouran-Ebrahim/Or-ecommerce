<?php

namespace App\Http\Controllers\Admin;

use App\Functions\Upload;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AttributeValuesRequest;
use App\Models\Addition;
use App\Models\Attribute;
use App\Models\ProductGallery;
use App\Models\Branch;
use App\Models\Color;
use App\Models\Product;
use App\Models\ProductHeader;
use App\Models\Remove;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class ProductGalleryController extends Controller
{
    public function index($id, Request $request)
    {
        // dd(1);
        // $Model = ProductGallery::where('product_id', $id)->with(['product', "color"])->get();
        $colors = Product::where('id', request()->route("id"))->with([
            'Colors' => function ($q) {
                $q->where('status', 1);
            }
        ])->first()->Colors;
        $product = Product::where('id', request()->route("id"))->with(['Colors', 'Header'])->first();
        // dd($colors);
        // dd($Model);
        return view('Admin.productGallery.index', ['id' => $id, 'product' => $product, 'colors' => $colors]);
    }

    public function create()
    {

        $product = Product::where('id', request()->route("id"))->with([
            'Colors' => function ($q) {
                $q->where('status', 1);
            }
        ])->first();
        //   dd($product);
        return view('Admin.productGallery.create', compact('product'));
    }


    public function store(Request $request, $id)
    {
        $this->validate($request, [
            'color_id' => 'required|exists:colors,id',
            'image' => 'required'
        ]);
        if ($request->hasFile('image')) {
            $image = Upload::UploadFile($request['image'], 'productGallery');
        }

        ProductGallery::create([
            "product_id" => $id,
            "color_id" => $request->color_id,
            'image' => $image
        ]);


        alert()->success(__('trans.addedSuccessfully'));

        return redirect()->back();
    }

    // public function show($id)
    // {
    //     $attibutes = AttributeValue::latest()->findOrFail($id);
    //     return view('Admin.productGallery.show', compact('attibutes'));
    // }
    public function deleteGalleryPhoto(Request $request)
    {
        // dd( $request->all());
        Upload::deleteImage($request->image);
        ProductGallery::where('product_id', $request->product_id)->where('image', $request->image)->first()->delete();
    }
    public function edit($product_id, $id)
    {
        $product = Product::where('id', $product_id)->with(['Colors'])->first();
        // dd($product);
        $color = Color::where('id', $id)->first();
        // dd($color);
        $gallary = ProductGallery::where('color_id', $id)->where('product_id', $product_id)->get();
        $header = ProductHeader::where('color_id', $id)->where('product_id', $product_id)->first();

        return view('Admin.productGallery.edit', ['header' => $header, 'product' => $product, 'id' => $id, 'color' => $color, 'gallary' => $gallary]);
    }

    public function update(Request $request, $product_id, $id)
    {

        $ProductGallery = ProductGallery::where('color_id', $id)->where('product_id', $product_id)->get();
        $Header = ProductHeader::where('color_id', $id)->where('product_id', $product_id)->first();
        if ($ProductGallery->count() > 0 && $Header) {
            if ($request->hasFile('image')) {
                // foreach ($ProductGallery as $item) {
                //     Upload::deleteImage($item->image);
                //     $item->delete();
                // }
                foreach ($request['image'] as $image) {
                    ProductGallery::create([
                        "product_id" => $product_id,
                        "color_id" => $id,
                        'image' => Upload::UploadFile($image, 'productGallery')
                    ]);
                }
            }
            if ($request->hasFile('header')) {

                Upload::deleteImage($Header->header);
                $Header->update([
                    'header' => Upload::UploadFile($request->header, 'productGallery'),
                ]);



            }
        } else {
         
            $this->validate($request, [
                'image' => 'required|array|min:1',
                'image.*' => 'required|image',
                'header' => 'required|image',
            ]);
            if ($request->hasFile('image')) {
                foreach ($request['image'] as $image) {
                    ProductGallery::create([
                        "product_id" => $product_id,
                        "color_id" => $id,
                        'image' => Upload::UploadFile($image, 'productGallery')
                    ]);
                }
            }

            ProductHeader::create([
                "product_id" => $product_id,
                "color_id" => $id,
                'header' => Upload::UploadFile($request->header, 'productGallery')
            ]);

        }



        alert()->success(__('trans.updatedSuccessfully'));

        return redirect()->back();
    }

    public function destroy($product_id, $id)
    {
        // dd($image);
        $image = ProductGallery::where('id', $id)->first()->image;
        Upload::deleteImage($image);
        ProductGallery::where('id', $id)->delete();

    }
}
