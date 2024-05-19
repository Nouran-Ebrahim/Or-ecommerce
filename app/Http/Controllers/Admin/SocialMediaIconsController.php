<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreSocialMediaIconRequest;
use App\Http\Requests\Admin\UpdateSocialMediaIconRequest;
use App\Models\SocialMediaIcons as SocialMediaIcon;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class SocialMediaIconsController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $countries = SocialMediaIcon::latest();

            return DataTables::of($countries)
                ->addColumn('action', function ($Model) {
                    $data = '';

                    $data .= '<form class="formDelete" method="POST" action="'.route('admin.social_media_icons.destroy', $Model).'">
                                    '.csrf_field().'
                                    <input name="_method" type="hidden" value="DELETE">
                                    <button type="button" class="btn btn-flat show_confirm" data-toggle="tooltip" title="Delete"><i class="fa-solid fa-eraser"></i></button>
                                </form>';

                    return $data;
                })
                ->editColumn('icon', function ($SocialMediaIcon) {
                    if (str_contains($SocialMediaIcon->icon, 'emcan')) {
                        return '<img style="height: 100px" src="'.$SocialMediaIcon->icon.'" alt="IMG" width="150">';
                    } else {
                        return '<span class="'.$SocialMediaIcon->icon.'"></span>';
                    }
                })
                ->addIndexColumn()
                ->addColumn('checkbox', function ($Model) {
                    return '<input type="checkbox" class="DTcheckbox" value="'.$Model->id.'">';
                })
                ->escapeColumns('action', 'checkbox', 'status')
                ->make(true);
        }

        return view('Admin.social_media_icons.index');
    }

    public function create()
    {
        $client = new Client();
        $res = $client->request('POST', 'https://emcan.bh/api/social_media_icons', [
            'form_params' => [
                'client_id' => 'test_id',
                'secret' => 'test_secret',
            ],
        ]);

        $icons = json_decode($res->getBody(), true);

        return view('Admin.social_media_icons.create', compact('icons'));
    }

    public function store(StoreSocialMediaIconRequest $request)
    {
        SocialMediaIcon::latest()->create($request->validated());
        alert()->success(__('trans.addedSuccessfully'));

        return redirect()->back();
    }

    public function show(SocialMediaIcon $SocialMediaIcon)
    {
        return view('Admin.social_media_icons.show', compact('SocialMediaIcon'));
    }

    public function edit(SocialMediaIcon $SocialMediaIcon)
    {
        return view('Admin.social_media_icons.edit', compact('SocialMediaIcon'));
    }

    public function update(UpdateSocialMediaIconRequest $request, SocialMediaIcon $SocialMediaIcon)
    {
        $SocialMediaIcon->update($request->validated());
        alert()->success(__('trans.updatedSuccessfully'));

        return redirect()->back();
    }

    public function destroy(SocialMediaIcon $SocialMediaIcon)
    {
        $SocialMediaIcon->delete();
    }
}
