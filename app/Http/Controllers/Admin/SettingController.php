<?php

namespace App\Http\Controllers\Admin;

use App\Functions\Upload;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreSettingRequest;
use App\Models\Country;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
class SettingController extends Controller
{
    public function index()
    {
        return $this->show(null);
    }

    public function show($type = null)
    {
        $countries = Country::get();
        $Settings = Setting::when($type, function ($query, $type) {
            return $query->where('type', $type);
        })->where('status',1)->get();

        return view('Admin.setting.edit', compact('Settings', 'type', 'countries'));
    }

    public function create()
    {
        return view('Admin.setting.create');
    }

    public function store(StoreSettingRequest $request)
    {
        if ($request['valuetype'] == 'description') {
            Setting::create($request->only('key', 'type', 'value'));
        }
        if ($request['valuetype'] == 'image') {
            $imageName = Upload::UploadFile($request->file('Imagevalue'), 'settings');
            Setting::create($request->only('key', 'type') + ['value' => $imageName]);
        }
        alert()->success(__('trans.addedSuccessfully'));

        return redirect()->back();
    }

    public function update($id, Request $request)
    {
        if ($request->type) {
            $settings = Setting::latest()->where('type', $request->type)->get();
        } else {
            $settings = Setting::get();
        }

        foreach ($settings as $setting) {
            if ($setting['key'] == 'Country') {
                $countries = Country::get();
                $dividedBy = $countries->where('id', $request->get($setting['key']))->first()->currancy_value;
                foreach ($countries as $country) {
                    $country->currancy_value = $country->currancy_value / $dividedBy;
                    $country->save();
                }
            }

            if (str_contains($setting['key'], '_image') || str_contains($setting['key'], 'logo') || str_contains($setting['key'], 'watermark')) {
                if ($request->hasFile($setting['key'])) {
                    Upload::deleteImage($setting['value'], 'settings');
                    Setting::latest()->where('key', $setting['key'])->update(['value' => Upload::UploadFile($request[$setting['key']], 'settings')]);
                }
            } else {
                Setting::latest()->where('key', $setting['key'])->update(['value' => $request->get($setting['key'])]);
            }
        }
        alert()->success(__('trans.updatedSuccessfully'));
        $locale=Setting::where('key','DefaultLang')->first();
        session()->put('locale', $locale->value);

            App::setLocale($locale->value);
      

       
        session()->forget('Settings');

        return redirect()->back();
    }

    public function destroy(Setting $setting)
    {
        $setting->delete();
    }
}
