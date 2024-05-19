<?php

namespace App\Http\Controllers\Client;

use App\Functions\Upload;
use App\Functions\WhatsApp;

use App\Http\Controllers\Controller;
use App\Mail\OrderSummary;
use App\Models\Address;
use App\Models\Banner;
use App\Models\Branch;
use App\Models\Career;
use Illuminate\Support\Carbon;
use App\Models\Vacancy;
use App\Rules\PhoneLength;
use App\Models\Coupon;
use App\Models\Cart;
use Illuminate\Support\Facades\DB;
use App\Models\Category;
use App\Models\Client;
use App\Models\Color;
use App\Models\Contact;
use App\Models\LifeStyle;
use App\Models\Country;
use App\Models\Order;
use App\Models\Product;
use App\Models\ProductGallery;
use App\Models\ProductReview;
use App\Models\Region;
use App\Models\Size;
use App\Models\Slider;
use App\Models\WhishList;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Stevebauman\Location\Facades\Location;
use App\Models\FAQ;

class HomeController extends Controller
{
    public function home(Request $request)
    {
        $Sliders = Slider::where('status', 1)->get();
        $lifstyle = LifeStyle::where('status', 1)->get();
        $bannerSec1 = Banner::where('status', 1)->where('postion', "1")->latest()->first();
        $bannerSec2 = Banner::where('status', 1)->where('postion', "2")->latest()->first();
        // dd($bannerSec2);
        $newCollection = Product::where('status', 1)->where('in_stock', 1)->where('new_collection', 1)->whereHas("Colors.Header")->whereHas("Colors.Gallery")->get();
        // dd($newCollection);
        $Popular = Product::where('popular', 1)->whereHas("Colors.Header")->whereHas("Colors.Gallery")
            ->get();
        $MostSelling = Product::where('most_selling', 1)->whereHas("Colors.Header")->whereHas("Colors.Gallery")
            ->get();
        $products = Product::where('status', 1)->whereHas("Colors.Header")->whereHas("Colors.Gallery")
            ->get();
        $Offers = Product::query()->where('from', '<', now())->where('to', '>', now())->whereHas("Colors.Header")->whereHas("Colors.Gallery")->get();

        return view('Client.home', compact('Sliders', 'newCollection', 'products', 'bannerSec1', 'bannerSec2', 'lifstyle', 'MostSelling', 'Popular', 'Offers'));
    }
    public function faq(Request $request)
    {
        $faqs = FAQ::where('status', 1)->get();
        return view('Client.faq', compact("faqs"));
    }
    public function changeWebsiteSettings(Request $request)
    {
        // dd($request->all());
        if (isset($request->language) && in_array($request->language, config('app.locales'))) {
            app()->setLocale($request->language);
            session()->put('locale', $request->language);
        }
        session()->put('country', $request->country_id);
        Country($request->country_id);
        // lang($request->language);
        // Country($request->country_id);
        return redirect()->back();

    }
    public function getSubcategories(Request $request)
    {
        $subcategories = Category::Active()->where('parent_id', $request->parentCategoryId)->get();
        $subSubcategories = Category::Active()->whereIn('parent_id', $subcategories->pluck('id'))->get();
        $firstSubSub = $subSubcategories->groupBy('parent_id');

        return response()->json(['firstSubSub' => $firstSubSub, 'subcategoriesIds' => $subcategories->pluck('id'), 'subcategories' => $subcategories, 'subSubcategories' => $subSubcategories]);

    }

    public function search(Request $request)
    {
        // dd($request->all());
        $Sizes = Size::Active()->get();
        // dd($Sizes);
        $Colors = Color::Active()->get();
        $Products = Product::Active()->whereHas("Colors.Header")->whereHas("Colors.Gallery")

            ->whereHas('Categories', function ($query) {
                if (count((array) request('categories')) || request('category_id')) {
                    return $query->whereIn('categories.id', (array) request('categories') + [request('category_id')]);
                }
            })
            ->whereHas('Colors', function ($query) {
                if (count((array) request('colors'))) {
                    return $query->whereIn('color_id', request('colors'));
                }
            })
            ->whereHas('Sizes', function ($query) {
                if (count((array) request('sizes'))) {
                    return $query->whereIn('size_id', request('sizes'));
                }
            })

            ->when(request('sortBy') ?? null, function ($query) {
                if (request('sortBy') == 'best') {
                    return $query->where('most_selling', 1);
                } elseif (request('sortBy') == 'priceAsc') {
                    return $query->orderBy('price', 'asc');
                } else {
                    return $query->orderBy('price', 'desc');
                }

            })
            ->when(request('search') ?? null, function ($query) {
                $searchTerm = request('search');

                return $query->where('title_ar', 'LIKE', "%{$searchTerm}%")->orWhere('title_en', 'LIKE', "%{$searchTerm}%");
            })
            ->paginate(50);
        $Sizes = Size::Active()->get();
        $Colors = Color::Active()->get();
        $productsCount = Product::Active()->whereHas("Colors.Header")->whereHas("Colors.Gallery")
            ->whereHas('Categories', function ($query) {
                if (count((array) request('categories')) || request('category_id')) {
                    $query->whereIn('categories.id', (array) request('categories') + [request('category_id')]);
                }
            })
            ->whereHas('Colors', function ($query) {
                if (count((array) request('colors'))) {
                    $query->whereIn('color_id', request('colors'));
                }
            })
            ->whereHas('Sizes', function ($query) {
                if (count((array) request('sizes'))) {
                    $query->whereIn('size_id', request('sizes'));
                }
            })
            ->when(request('sortBy'), function ($query) {
                if (request('sortBy') == 'best') {
                    $query->where('most_selling', 1);
                } elseif (request('sortBy') == 'priceAsc') {
                    $query->orderBy('price', 'asc');
                } else {
                    $query->orderBy('price', 'desc');
                }
            })
            ->when(request('search'), function ($query) {
                $searchTerm = request('search');
                $query->where('title_ar', 'LIKE', "%{$searchTerm}%")->orWhere('title_en', 'LIKE', "%{$searchTerm}%");
            })
            
            ->count();

        $ProductsBestSelling = Product::where('status', 1)->where('most_selling', 1)->whereHas("Colors.Header")->whereHas("Colors.Gallery")->get();
        return view('Client.search', compact('Products', 'productsCount', 'Sizes', 'Colors', 'ProductsBestSelling'));
    }
    public function shop(Request $request)
    {
        // dd($request->all());
        if (request('category_id') == "bestSelling") {
            $Sizes = Size::Active()->get();
            // dd($Sizes);
            $Colors = Color::Active()->get();
            $Products = Product::Active()->where('most_selling', 1)->whereHas("Colors.Header")->whereHas("Colors.Gallery")

                ->whereHas('Colors', function ($query) {
                    if (count((array) request('colors'))) {
                        return $query->whereIn('color_id', request('colors'));
                    }
                })
                ->whereHas('Sizes', function ($query) {
                    if (count((array) request('sizes'))) {
                        return $query->whereIn('size_id', request('sizes'));
                    }
                })

                ->when(request('sortBy') ?? null, function ($query) {
                    if (request('sortBy') == 'best') {
                        return $query->where('most_selling', 1);
                    } elseif (request('sortBy') == 'priceAsc') {
                        return $query->orderBy('price', 'asc');
                    } else {
                        return $query->orderBy('price', 'desc');
                    }

                })
                ->when(request('search') ?? null, function ($query) {
                    $searchTerm = request('search');

                    return $query->where('title_ar', 'LIKE', "%{$searchTerm}%")->orWhere('title_en', 'LIKE', "%{$searchTerm}%")->where('desc_ar', 'LIKE', "%{$searchTerm}%")->orWhere('desc_en', 'LIKE', "%{$searchTerm}%")->orWhere('code', 'LIKE', "%{$searchTerm}%");
                })
                ->paginate(50);
            return view('Client.shop', compact('Products', 'Colors', 'Sizes'));

        } elseif (request('category_id') == "newCollection") {
            $Sizes = Size::Active()->get();
            // dd($Sizes);
            $Colors = Color::Active()->get();
            $Products = Product::Active()->where('new_collection', 1)->whereHas("Colors.Header")->whereHas("Colors.Gallery")

                ->whereHas('Colors', function ($query) {
                    if (count((array) request('colors'))) {
                        return $query->whereIn('color_id', request('colors'));
                    }
                })
                ->whereHas('Sizes', function ($query) {
                    if (count((array) request('sizes'))) {
                        return $query->whereIn('size_id', request('sizes'));
                    }
                })

                ->when(request('sortBy') ?? null, function ($query) {
                    if (request('sortBy') == 'best') {
                        return $query->where('most_selling', 1);
                    } elseif (request('sortBy') == 'priceAsc') {
                        return $query->orderBy('price', 'asc');
                    } else {
                        return $query->orderBy('price', 'desc');
                    }

                })
                ->when(request('search') ?? null, function ($query) {
                    $searchTerm = request('search');

                    return $query->where('title_ar', 'LIKE', "%{$searchTerm}%")->orWhere('title_en', 'LIKE', "%{$searchTerm}%")->where('desc_ar', 'LIKE', "%{$searchTerm}%")->orWhere('desc_en', 'LIKE', "%{$searchTerm}%")->orWhere('code', 'LIKE', "%{$searchTerm}%");
                })
                ->paginate(50);
            return view('Client.shop', compact('Products', 'Colors', 'Sizes'));
        } else {
            $subSubCategory = Category::Active()->where('id', request('category_id'))->first();
            $subCategory = Category::Active()->where('id', $subSubCategory->parent_id)->first();
            $Sizes = Size::Active()->get();
            // dd($Sizes);
            $Colors = Color::Active()->get();
            $Products = Product::Active()->whereHas("Colors.Header")->whereHas("Colors.Gallery")

                ->whereHas('Categories', function ($query) {
                    if (count((array) request('categories')) || request('category_id')) {
                        return $query->whereIn('categories.id', (array) request('categories') + [request('category_id')]);
                    }
                })
                ->whereHas('Colors', function ($query) {
                    if (count((array) request('colors'))) {
                        return $query->whereIn('color_id', request('colors'));
                    }
                })
                ->whereHas('Sizes', function ($query) {
                    if (count((array) request('sizes'))) {
                        return $query->whereIn('size_id', request('sizes'));
                    }
                })

                ->when(request('sortBy') ?? null, function ($query) {
                    if (request('sortBy') == 'best') {
                        return $query->where('most_selling', 1);
                    } elseif (request('sortBy') == 'priceAsc') {
                        return $query->orderBy('price', 'asc');
                    } else {
                        return $query->orderBy('price', 'desc');
                    }

                })
                ->when(request('search') ?? null, function ($query) {
                    $searchTerm = request('search');

                    return $query->where('title_ar', 'LIKE', "%{$searchTerm}%")->orWhere('title_en', 'LIKE', "%{$searchTerm}%")->where('desc_ar', 'LIKE', "%{$searchTerm}%")->orWhere('desc_en', 'LIKE', "%{$searchTerm}%")->orWhere('code', 'LIKE', "%{$searchTerm}%");
                })
                ->paginate(50);
            // dd($Products);
            return view('Client.shop', compact('Products', 'subSubCategory', 'subCategory', 'Colors', 'Sizes'));

        }

        // dd( $subCategory);

    }

    public function product($id, Request $request)
    {
        // dd(request('category_id'));
        if (request('category_id') == "bestSelling") {
            $Product = Product::Active()->where('id', $id)->where('most_selling', 1)->with([
                "Sizes" => function ($q) {
                    $q->where('status', 1);
                },
                "Colors" => function ($q) {
                    $q->where('status', 1);
                },
                'Gallery' => function ($q) {
                    $q->whereHas('color', function ($subQuery) {
                        $subQuery->where('status', 1);
                    });
                },
                'Header' => function ($q) {
                    $q->whereHas('color', function ($subQuery) {
                        $subQuery->where('status', 1);
                    });
                }
            ])->firstorfail();
            // dd($Product);
            $RelatedProducts = Product::whereNot('id', $Product->id)->whereHas("Colors.Header")->whereHas("Colors.Gallery")->orderBy('title_' . lang())->where('most_selling', 1)->get();
        } elseif (request('category_id') == "newCollection") {
            $Product = Product::Active()->where('id', $id)->where('new_collection', 1)->with([
                "Sizes" => function ($q) {
                    $q->where('status', 1);
                },
                "Colors" => function ($q) {
                    $q->where('status', 1);
                },
                'Gallery' => function ($q) {
                    $q->whereHas('color', function ($subQuery) {
                        $subQuery->where('status', 1);
                    });
                },
                'Header' => function ($q) {
                    $q->whereHas('color', function ($subQuery) {
                        $subQuery->where('status', 1);
                    });
                }
            ])->firstorfail();
            // dd($Product);
            $RelatedProducts = Product::whereNot('id', $Product->id)->whereHas("Colors.Header")->whereHas("Colors.Gallery")->orderBy('title_' . lang())->where('new_collection', 1)->get();
        } else {
            $Product = Product::Active()->where('id', $id)->with([
                'Categories' => function ($q) {
                    $q->where('category_id', request('category_id'));
                },
                "Colors" => function ($q) {
                    $q->where('status', 1);
                },
                "Sizes" => function ($q) {
                    $q->where('status', 1);
                },
                'Gallery' => function ($q) {
                    $q->whereHas('color', function ($subQuery) {
                        $subQuery->where('status', 1);
                    });
                },
                'Header' => function ($q) {
                    $q->whereHas('color', function ($subQuery) {
                        $subQuery->where('status', 1);
                    });
                }
            ])->firstorfail();
            // dd($Product);
            $RelatedProducts = Product::whereNot('id', $Product->id)->whereHas("Colors.Header")->whereHas("Colors.Gallery")->orderBy('title_' . lang())->whereHas('Categories', function ($q) {
                $q->where("category_id", request('category_id'));
            })->get();
        }
        $clientReviews = ProductReview::with('Client')->where('product_id', $id)->paginate(5);
        $averageRating = ProductReview::where('product_id', $id)
            ->avg('rate');

        $averageRating = round($averageRating);
        // dd( $RelatedProducts );
        return view('Client.product', compact('Product', 'averageRating', 'clientReviews', 'RelatedProducts'));
    }
    public function productGallery(Request $request)
    {
        //  dd($request->all());
        $images = ProductGallery::where('product_id', $request->product_id)->where('color_id', $request->color_id)->get()->pluck('image');
        return response()->json($images);
    }
    public function contactUs(Request $request)
    {
        $branches = Branch::where('status', 1)->get();
        return view('Client.contact', compact('branches'));
    }
    public function contact(Request $request)
    {
        // dd($request->all());
        $this->validate($request, [
            'last_name' => 'required|string',
            'first_name' => 'required|string',
            'email' => 'required|email',
            'message' => 'required',
            'subject' => 'required',
            'country_code' => 'required',
            'phone' => ["required", new PhoneLength($request->input('country_code'), $max = 8)],
        ]);
        Contact::create([
            'name' => $request->first_name . ' ' . $request->last_name,
            'email' => $request->email,
            'message' => $request->message,
            'subject' => $request->subject,
            'phone' => '+' . $request->phone_code . $request->phone,
        ]);
        toast(__('trans.We Will Contact You as soon as possible'), 'success');

        return back();
    }

    public function about(Request $request)
    {
        $Products = Product::Active()->where('most_selling', 1)->whereHas("Colors.Header")->whereHas("Colors.Gallery")
            ->take(5)->get();
        return view('Client.about', compact("Products"));
    }
    public function Vacancy(Request $request)
    {
        $currentDate = Carbon::today();
        $vacancies = Vacancy::where('status', 1)->where('from', '<=', $currentDate)
            ->where('to', '>', $currentDate)->get();
        $branches = Branch::where('status', 1)->get();
        return view('Client.vacancies', compact('branches', 'vacancies'));
    }
    public function Career(Request $request)
    {
        // dd($request->all());
        $this->validate($request, [
            'last_name' => 'required|string',
            'first_name' => 'required|string',
            'email' => 'required|email',
            'vacancy_id' => 'required|exists:vacancies,id',
            'address' => 'nullable',
            'file' => 'required|file|mimes:pdf',
            'country_code' => 'required',
            'phone' => ["required", new PhoneLength($request->input('country_code'), $max = 8)],
        ]);

        Career::create([
            'last_name' => $request->last_name,
            'first_name' => $request->first_name,
            'email' => $request->email,
            'vacancy_id' => $request->vacancy_id,
            'address' => $request->address,
            'phone_code' => $request->phone_code,
            'file' => Upload::UploadFile($request->file, 'career'),
            'country_code' => $request->country_code,
            'phone' => $request->phone,
        ]);
        toast(__('trans.We Will Contact You as soon as possible'), 'success');

        return back();
    }
    public function AddToCart(Request $request)
    {
        $inWishList = WhishList::where('client_id', client_id())
            ->where('product_id', $request->product_id)
            ->where('category', $request->category_id)->whereNull('size_id')->whereNull('color_id')->first();
        // dd($inWishList);
        if (isset($inWishList)) {
            $inWishList->delete();
            $Cart = Cart::where([
                'client_id' => client_id(),
                'product_id' => $request->product_id,
                'size_id' => $request->size_id,
                'color_id' => $request->color_id,
                'category' => $request->category_id
            ])->first();
            if ($Cart) {
                // dd($Cart);
                $Cart->update(['quantity' => $request->quantity]);
            } else {
                Cart::create([
                    'client_id' => client_id(),
                    'product_id' => $request->product_id,
                    'size_id' => $request->size_id,
                    'color_id' => $request->color_id,
                    'quantity' => $request->quantity,
                    'category' => $request->category_id
                ]);
            }
            $cartCount = Cart::where('client_id', client_id())->count();
            return response()->json(['status' => 'moved', 'cartCount' => $cartCount]);
        } else {
            $Cart = Cart::where([
                'client_id' => client_id(),
                'product_id' => $request->product_id,
                'size_id' => $request->size_id,
                'color_id' => $request->color_id,
                'category' => $request->category_id
            ])->first();
            if ($Cart) {
                // dd($Cart);
                $Cart->update(['quantity' => $request->quantity]);
            } else {
                Cart::create([
                    'client_id' => client_id(),
                    'product_id' => $request->product_id,
                    'size_id' => $request->size_id,
                    'color_id' => $request->color_id,
                    'quantity' => $request->quantity,
                    'category' => $request->category_id
                ]);
                $cartCount = Cart::where('client_id', client_id())->count();
                return response()->json(['cartCount' => $cartCount]);
            }
        }


    }
    public function AddToWhishList(Request $request)
    {
        // dd($request->all());
        $WhishList = WhishList::where([
            'client_id' => client_id(),
            'product_id' => $request->product_id,
            'category' => $request->category,
        ])->first();
        if ($WhishList) {
            // dd($WhishList);
            $WhishList->delete();
            return response()->json(['status' => 'deleted']);
        } else {
            WhishList::create([
                'client_id' => client_id(),
                'product_id' => $request->product_id,
                'category' => $request->category,
            ]);
            return response()->json(['status' => 'adedd']);
        }

    }
    public function ClientReview(Request $request)
    {
        ProductReview::create([
            "client_id" => client_id(),
            "product_id" => $request->product_id,
            'rate' => $request->rate,
            'comment' => $request->comment,
        ]);
        return redirect()->back()->with('review', trans('trans.Your Review Has Been Added Successfully'));
    }
    public function confirm(Request $request)
    {
        $Location = Location::get(request()->ip());
        $addresses = Address::where('client_id', client_id())->get();
        $countries = Country::active()->whereHas('Regions')->get();
        $data = CalcCart();
        $regions = Region::where('country_id', Country()->id)->where('status', 1)->get();
        return view('Client.confirm', [
            'Carts' => $data['carts'],
            'subTotal' => $data['subTotal'],
            'vat' => $data['vat'],
            'countries' => $countries,
            'regions' => $regions,
            'total' => $data['total'],
            'addresses' => $addresses,
            'lat' => $Location ? $Location->latitude : 0,
            'long' => $Location ? $Location->longitude : 0,
        ]);
    }
    public function getRigons(Request $request)
    {

        $rigons = Region::where('country_id', $request->country_id)->where('status', 1)->get();
        return response()->json($rigons);

    }
    public function getInailDeliveryCost(Request $request)
    {
        // dd($request->inialRegion);
        if ($request->inialRegion != null) {
            $inailDeliveryCost = Region::where('id', $request->inialRegion)->first()->delivery_cost;
            $inailDeliveryCostForSelectedCurrancy = number_format(Country()->currancy_value * $inailDeliveryCost, Country()->decimals, '.', '');
        } elseif ($request->address_id != null) {
            $address = Address::where('id', $request->address_id)->first();
            $inailDeliveryCost = Region::where('id', $address->region_id)->first()->delivery_cost;
            $inailDeliveryCostForSelectedCurrancy = number_format(Country()->currancy_value * $inailDeliveryCost, Country()->decimals, '.', '');
        } else {
            $inailDeliveryCostForSelectedCurrancy = number_format(Country()->currancy_value * 0, Country()->decimals, '.', '');
        }

        $data = CalcCart();
        $totalAfterShipping = number_format($data['total'] + $inailDeliveryCostForSelectedCurrancy, Country()->decimals, '.', '');
        return response()->json(['inailDeliveryCostForSelectedCurrancy' => $inailDeliveryCostForSelectedCurrancy, 'totalAfterShipping' => $totalAfterShipping]);
    }
    public function getTotalBeforShipping(Request $request)
    {
        $data = CalcCart();
        return response()->json($data['total']);
    }
    public function getDeliveryCost(Request $request)
    {
        // dd($request->address_id);
        if ($request->address_id == null) {
            $DeliveryCost = Region::where('id', $request->region_id)->where('status', 1)->first()->delivery_cost;
            $DeliveryCost = number_format(Country()->currancy_value * $DeliveryCost, Country()->decimals, '.', '');

        } else {
            // dd(1);
            $address = Address::where('id', $request->address_id)->first();
            // dd($address->region_id);
            $DeliveryCost = Region::where('id', $address->region_id)->where('status', 1)->first()->delivery_cost;
            // dd($DeliveryCost);
            $DeliveryCost = number_format(Country()->currancy_value * $DeliveryCost, Country()->decimals, '.', '');


        }

        $data = CalcCart();
        $totalAfterShipping = number_format($data['total'] + $DeliveryCost, Country()->decimals, '.', '');
        return response()->json(['DeliveryCost' => $DeliveryCost, 'totalAfterShipping' => $totalAfterShipping]);
        ;

    }

    public function cart()
    {
        $data = CalcCart();
// dd($data['carts']);
        return view('Client.cart', [
            'Carts' => $data['carts'],
            'subTotal' => $data['subTotal'],
            'vat' => $data['vat'],
            'total' => $data['total'],
        ]);
    }

    public function deleteitem()
    {
        Cart::where('client_id', client_id())->where('id', request('id'))->delete();
        $cart_count = Cart::where('client_id', client_id())->count();
        $data = CalcCart();
        return response()->json([
            'success' => true,
            'type' => 'success',
            'subTotal' => $data['subTotal'],
            'vat' => $data['vat'],
            'total' => $data['total'],
            'cart_count' => $cart_count,
            'message' => __('trans.DeletedSuccessfully'),
        ]);
    }

    public function minus()
    {
        if (request('count')) {
            Cart::where('client_id', client_id())->where('id', request('id'))->update(['quantity' => request('count')]);
            $userCart = Cart::where('client_id', client_id())->where('id', request('id'))->with('Product')->first();
            $cart_count = Cart::where('client_id', client_id())->count();
            $subTotalItem = number_format($userCart->quantity * $userCart->Product->CalcPrice(), Country()->decimals, '.', '');
            $data = CalcCart();

            return response()->json([
                'success' => true,
                'type' => 'success',
                'subTotal' => $data['subTotal'],
                'vat' => $data['vat'],
                'total' => $data['total'],
                'subTotalItem' => $subTotalItem,
                'cart_count' => $cart_count,
                'message' => __('trans.updatedSuccessfully'),
            ]);
        } else {
            $cart_count = Cart::where('client_id', client_id())->count();

            return response()->json([
                'success' => false,
                'type' => 'error',
                'cart_count' => $cart_count,
                'message' => __('trans.sorry_there_was_an_error'),
            ]);
        }
    }

    public function plus(Request $request)
    {
        // dd($request->all());

        $CartItem = Cart::where('client_id', client_id())->where('id', request('id'))->update(['quantity' => request('count')]);
        $userCart = Cart::where('client_id', client_id())->where('id', request('id'))->with('Product')->first();
        $cart_count = Cart::where('client_id', client_id())->count();
        $subTotalItem = number_format($userCart->quantity * $userCart->Product->CalcPrice(), Country()->decimals, '.', '');
        $data = CalcCart();
        return response()->json([
            'success' => true,
            'subTotal' => $data['subTotal'],
            'vat' => $data['vat'],
            'total' => $data['total'],
            'type' => 'success',
            'subTotalItem' => $subTotalItem,
            'cart_count' => $cart_count,
            'message' => __('trans.updatedSuccessfully'),
        ]);
    }

    public function submit(Request $request)
    {
        // dd($request->all());
        if (session()->has('client_id')) {
            $this->validate($request, [
                'last_name' => 'required|string',
                'first_name' => 'required|string',
                'payment_id' => 'required',
                'phone' => ["required", new PhoneLength($request->input('country_code'), $max = 8)],
                'email' => 'required|email'
            ]);
            $client = Client::where('phone', $request->phone)->where('phone_code', $request->phone_code)->where('country_code', $request->country_code)->exists();
            if ($client) {
                $client_id = Client::where('phone', $request->phone)->where('phone_code', $request->phone_code)->where('country_code', $request->country_code)->first()->id;
            } else {
                $this->validate($request, [
                    'last_name' => 'required|string',
                    'first_name' => 'required|string',
                    'payment_id' => 'required',
                    'phone' => ["required", new PhoneLength($request->input('country_code'), $max = 8), 'unique:clients,phone'],
                    'email' => 'required|email'
                ]);
                $newClient = Client::create([
                    "first_name" => $request->first_name,
                    "last_name" => $request->last_name,
                    'email' => $request->email,
                    'country_code' => $request->country_code,
                    'phone_code' => $request->phone_code,
                    'phone' => $request->phone,
                    // 'password' => bcrypt(rand(1000, 9999)),
                ]);
                $client_id = $newClient->id;
            }
            if ($request->delivery_id == 1) {
                if (isset($request->address_id)) {
                    $address_id = $request->address_id;
                } else {
                    $this->validate($request, [
                        'country_id' => 'required|exists:countries,id',
                        'region_id' => 'required|exists:regions,id',
                        'flat' => 'nullable',
                        'zone' => 'required',
                        'road' => 'required',
                        'payment_id' => 'required',
                        'building_no' => 'required',
                        'floor_no' => 'nullable',
                        'note' => 'nullable'
                    ]);
                    $Address = Address::create([
                        'client_id' => $client_id,
                        'default' => isset($request->default) ? 1 : 0,
                        'country_id' => $request->country_id,
                        'region_id' => $request->region_id,
                        'flat' => $request->flat,
                        'zone' => $request->zone,
                        'road' => $request->road,
                        'building_no' => $request->building_no,
                    ]);
                    $address_id = $Address->id;
                }


            } else {
                $address_id = null;
            }
            $oldCart = Cart::where('client_id', $client_id)->get();
            if ($oldCart->count() > 0) {
                foreach ($oldCart as $cart) {
                    $cart->delete();
                }
            }

            DB::table('cart')->where('client_id', client_id())->update(['client_id' => $client_id]);
            DB::table('whish_lists')->where('client_id', client_id())->update(['client_id' => $client_id]);

            session()->forget('client_id_website');
        } else {
            $client_id = auth('client')->user()->id;
            if ($request->delivery_id == 1) {
                if (isset($request->address_id)) {
                    $address_id = $request->address_id;
                } else {
                    $this->validate($request, [
                        'country_id' => 'required|exists:countries,id',
                        'region_id' => 'required|exists:regions,id',
                        'flat' => 'nullable',
                        'payment_id' => 'required',
                        'zone' => 'required',
                        'road' => 'required',
                        'building_no' => 'required',
                        'floor_no' => 'nullable',
                        'note' => 'nullable'
                    ]);
                    $Address = Address::create([
                        'client_id' => $client_id,
                        'default' => isset($request->default) ? 1 : 0,
                        'country_id' => $request->country_id,
                        'region_id' => $request->region_id,
                        'flat' => $request->flat,
                        'zone' => $request->zone,
                        'road' => $request->road,
                        'building_no' => $request->building_no,
                    ]);
                    $address_id = $Address->id;
                }


            } else {
                $address_id = null;
            }

        }
        // $Client = auth('client')->user();
        if ($request->code != null) {
            $coupon = Coupon::where('code', $request->code)->first();
            $coupon_id = $coupon->id;
        } else {
            $coupon_id = null;
        }

        $Cart = Cart::where('client_id', $client_id)->with('Product', 'Color', 'Color.Header', 'Size')->get();
        $sub_total = 0;
        $sub_total_exclusive_vat = 0;
        $discount = 0;
        // foreach ($Cart as $key => $CartItem) {
        //     $Product = $CartItem->Product->first();
        //     $sub_total += ($Product->CalcPrice()) * $CartItem->quantity;
        //     $discount += ($Product->Price() - $Product->CalcPrice()) * $CartItem->quantity;
        //     if ($CartItem->Product->VAT == 'exclusive') {
        //         $sub_total_exclusive_vat += ($Product->CalcPrice()) * $CartItem->quantity;
        //     }
        // }
        // $vat = $sub_total_exclusive_vat / 100 * setting('VAT');
        // $delivery_cost = $Address ? $Address->Region()->select('delivery_cost')->value('delivery_cost') : 0;


        $Order = Order::create([
            'client_id' => $client_id,
            'delivery_id' => $request->delivery_id,
            'address_id' => $address_id,
            'payment_id' => $request->payment_id,
            'status' => $request->payment_id > 1 ? 5 : 0,
            'follow' => 0,
            'coupon_id' => $coupon_id,
            'sub_total' => $request->sub_total,
            'discount' => $discount,
            'discount_percentage' => 0,
            'vat' => $request->vat,
            'vat_percentage' => setting('VAT'),
            'coupon' => $request->coupon,
            'coupon_percentage' => 0,
            'charge_cost' => $request->charge_cost,
            'net_total' => $request->net_total,
            'sub_total_after_coupon' => $request->sub_total_after_coupon
        ]);

        foreach ($Cart as $key => $CartItem) {
            $Product = $CartItem->Product->first();
            $ProPrice = ($Product->CalcPrice());

            $OrderProduct = $Order->OrderProducts()->create([
                'product_id' => $CartItem->Product->id,
                'size_id' => $CartItem->size_id > 0 ? $CartItem->size_id : null,
                'color_id' => $CartItem->color_id > 0 ? $CartItem->color_id : null,
                'price' => $ProPrice,
                'quantity' => $CartItem->quantity,
                'category' => $CartItem->category,
                'total' => $ProPrice * $CartItem->quantity,
                // 'note' => $CartItem->note,
            ]);

            if ($request->payment_id == 1) {
                $CartItem->delete();
            }
        }



        if ($Order) {
            if ($request->payment_id == 1) {

                WhatsApp::SendOrder($Order);
                try {
                    Mail::to(['info@or-couture.com', setting('email'), $Order->client->email])->send(new OrderSummary($Order));
                } catch (\Exception $e) {
                    return $e->getMessage();
                }
                // alert()->success(__('trans.order_added_successfully'));

                return redirect()->route('client.success', $Order->id);
            }
            // else {
            //     $TapController = new \App\Http\Controllers\Payment\TapController();

            //     return redirect()->away($TapController->VerifyTapTransaction($Order->id));
            // }

        } else {
            return redirect()->back();
        }

    }


    public function success($id, Request $request)
    {
        // dd($id);
        $Order = Order::findorfail($id);
        return view('Client.success', compact('Order'));
    }

    public function washList(Request $request)
    {
        $whishLists = WhishList::where('client_id', client_id())->with('Product', 'Color', 'Color.Header', 'Size')->get();
        return view('Client.washList', compact('whishLists'));
    }
    public function deleteitemWishList()
    {
        WhishList::where('client_id', client_id())->where('id', request('id'))->delete();
        $cart_count = Cart::where('client_id', client_id())->count();

        return response()->json([
            'success' => true,
            'type' => 'success',
            'cart_count' => $cart_count,
            'message' => __('trans.DeletedSuccessfully'),
        ]);
    }
    public function deleteitemWishListAll()
    {
        WhishList::where('client_id', client_id())->delete();
        $cart_count = Cart::where('client_id', client_id())->count();

        return response()->json([
            'success' => true,
            'type' => 'success',
            'cart_count' => $cart_count,
            'message' => __('trans.DeletedSuccessfully'),
        ]);
    }
    // public function Transform(Request $request)
    // {
    //     $wishList = WhishList::where('client_id', client_id())->where('id', $request->id)->first();
    //     Cart::create([
    //         'client_id' => $wishList->client_id,
    //         'product_id' => $wishList->product_id,
    //         'size_id' => $wishList->size_id,
    //         'color_id' => $wishList->color_id,
    //         'quantity' => $wishList->quantity,
    //     ]);
    //     $wishList->delete();
    //     $cart_count = Cart::where('client_id', client_id())->count();

    //     return response()->json([
    //         'success' => true,
    //         'type' => 'success',
    //         'cart_count' => $cart_count,
    //         'message' => __('trans.AddedToCartSuccessfully'),
    //     ]);
    // }
    public function applayCode(Request $request)
    {

        $coupon = Coupon::where('code', $request->code)->first();
        if ($coupon) {
            if ($coupon->from < now() && $coupon->to > now()) {
                if ($coupon->type == "discount") {
                    if ($coupon->discount < $request->subTotal) {
                        $subTotalAfterCoupon = number_format($request->subTotal - ($coupon->discount * Country()->currancy_value), Country()->decimals, '.', '');
                        $couponValue = number_format($coupon->discount * Country()->currancy_value, Country()->decimals, '.', '');
                        // $vat = number_format($subTotal * (setting('VAT') / 100), Country()->decimals, '.', '');
                        $charge_cost = $request->charge_cost;
                        $total = number_format($charge_cost + $request->vat + $subTotalAfterCoupon, Country()->decimals, '.', '');
                        $message = "coupon applied sucsessfly";
                        return response()->json(['status' => true, 'message' => $message, 'total' => $total, 'subTotalAfterCoupon' => $subTotalAfterCoupon, 'couponValue' => $couponValue]);
                    } else {
                        $message = "coupon value greater than sub total";
                        $subTotalAfterCoupon = number_format(0 * Country()->currancy_value, Country()->decimals, '.', '');
                        $couponValue = number_format(0 * Country()->currancy_value, Country()->decimals, '.', '');
                        // $vat = number_format($subTotal * (setting('VAT') / 100), Country()->decimals, '.', '');
                        $charge_cost = $request->charge_cost;
                        $total = number_format($charge_cost + $request->vat + $request->subTotal, Country()->decimals, '.', '');
                        return response()->json(['status' => true, 'message' => $message, 'total' => $total, 'subTotalAfterCoupon' => $subTotalAfterCoupon, 'couponValue' => $couponValue]);
                    }
                } else {
                    // type percentage

                    $message = "coupon applied sucsessfly";
                    $subTotalAfterCoupon = ($request->subTotal) * (1 - ($coupon->percent_off / 100));
                    $couponValue = number_format(($request->subTotal * ($coupon->percent_off / 100)) * Country()->currancy_value, Country()->decimals, '.', '');
                    // $vat = number_format($subTotal * (setting('VAT') / 100), Country()->decimals, '.', '');
                    $charge_cost = $request->charge_cost;
                    $total = number_format($charge_cost + $request->vat + $subTotalAfterCoupon, Country()->decimals, '.', '');
                    return response()->json(['status' => true, 'message' => $message, 'total' => $total, 'subTotalAfterCoupon' => $subTotalAfterCoupon, 'couponValue' => $couponValue]);
                }

            } else {
                $message = "coupon expierd";
                $subTotalAfterCoupon = number_format(0 * Country()->currancy_value, Country()->decimals, '.', '');
                $couponValue = number_format(0 * Country()->currancy_value, Country()->decimals, '.', '');
                // $vat = number_format($subTotal * (setting('VAT') / 100), Country()->decimals, '.', '');
                $charge_cost = $request->charge_cost;
                $total = number_format($charge_cost + $request->vat + $request->subTotal, Country()->decimals, '.', '');
                return response()->json(['status' => true, 'message' => $message, 'total' => $total, 'subTotalAfterCoupon' => $subTotalAfterCoupon, 'vat' => $request->vat, 'couponValue' => $couponValue]);
            }

        } else {
            $message = "coupon not found";
            $subTotalAfterCoupon = number_format(0 * Country()->currancy_value, Country()->decimals, '.', '');
            $couponValue = number_format(0 * Country()->currancy_value, Country()->decimals, '.', '');
            // $vat = number_format($subTotal * (setting('VAT') / 100), Country()->decimals, '.', '');
            $charge_cost = $request->charge_cost;
            $total = number_format($charge_cost + $request->vat + $request->subTotal, Country()->decimals, '.', '');
            return response()->json(['status' => false, 'message' => $message, 'total' => $total, 'subTotalAfterCoupon' => $subTotalAfterCoupon, 'couponValue' => $couponValue]);
        }


    }
    public function ToggleFav(Request $request)
    {
        $Client = auth('client')->user();
        if ($Client) {
            if ($Client->WashList()->where('product_id', $request->id)->count()) {
                $Client->WashList()->detach($request->product_id);
            } else {
                $Client->WashList()->attach($request->product_id);
            }
        } else {
            $washList = session()->get('washList') ?? [];
            if ($washList) {
                if (in_array($request->product_id, $washList)) {
                    unset($washList[array_search($request->product_id, $washList)]);
                } else {
                    $washList[] = $request->product_id;
                }
            } else {
                $washList[] = $request->product_id;
            }

            session()->put('washList', $washList);
        }

    }

}
