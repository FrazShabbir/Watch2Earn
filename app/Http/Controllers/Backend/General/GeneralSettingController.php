<?php

namespace App\Http\Controllers\Backend\General;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Image;
class GeneralSettingController extends Controller
{

    public function index()
    {
        return view('backend.general.general_settings');
    }

    public function store(Request $request)
    {
        //dd($request->all());

        if ($request->company_name) {
            setSettings('company_name', request('company_name'));
        }

        if ($request->phone_number) {
            setSettings('phone_number', request('phone_number'));
        }
        if ($request->email) {
            setSettings('email', request('email'));
        }
        if ($request->lead_receiver_email) {
            setSettings('lead_receiver_email', request('lead_receiver_email'));
        }
        if ($request->lead_receiver_phone) {
            setSettings('lead_receiver_phone', request('lead_receiver_phone'));
        }

        if ($request->email_bcc) {
            setSettings('email_bcc', request('email_bcc'));
        }
        if ($request->email_cc) {
            setSettings('email_cc', request('email_cc'));
        }
        if ($request->whatsapp) {
            setSettings('whatsapp', request('whatsapp'));
        }

        if ($request->address) {
            setSettings('address', request('address'));
        }
        if ($request->city_name) {
            setSettings('city_name', request('city_name'));
        }
        // logo
        if ($request->file('logo')) {
            //dd($request->file('logo'));
            $request->validate([
                'logo' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            ]);
            $file = $request->file('logo');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('uploads/SiteLogo/', $filename);
            $resizedImage = Image::make(public_path('uploads/SiteLogo/' . $filename))->resize(200, null, function ($constraint) {
                $constraint->aspectRatio();
            });
            $resizedImage->save();
            setSettings('logo', 'uploads/SiteLogo/'.$filename);
        }
        if ($request->file('logo_dark')) {
            //dd($request->file('logo_dark'));
            $request->validate([
                'logo_dark' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            ]);
            $file = $request->file('logo_dark');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('uploads/Sitelogo_dark/', $filename);
            $resizedImage = Image::make(public_path('uploads/Sitelogo_dark/' . $filename))->resize(200, null, function ($constraint) {
                $constraint->aspectRatio();
            });
            $resizedImage->save();
            setSettings('logo_dark', 'uploads/Sitelogo_dark/'.$filename);
        }


        if ($request->file('watermark')) {
            $request->validate([
                'watermark' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            ]);
            //dd($request->file('watermark'));
            $file = $request->file('watermark');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('uploads/SiteWatermark/', $filename);
            $resizedImage = Image::make(public_path('uploads/SiteWatermark/' . $filename));
            $resizedImage->save();
            setSettings('watermark', 'uploads/SiteWatermark/'.$filename);
        }


        if ($request->file('fav_icon_frontend')) {
            $request->validate([
                'fav_icon_frontend' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            ]);
            //dd($request->file('fav_icon_frontend'));
            $file = $request->file('fav_icon_frontend');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('uploads/Sitefav_icon_frontend/', $filename);
            $resizedImage = Image::make(public_path('uploads/Sitefav_icon_frontend/' . $filename));
            $resizedImage->save();
            setSettings('fav_icon_frontend', 'uploads/Sitefav_icon_frontend/'.$filename);
        }


        if ($request->file('fav_icon_backend')) {
            $request->validate([
                'fav_icon_backend' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            ]);
            //dd($request->file('fav_icon_backend'));
            $file = $request->file('fav_icon_backend');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('uploads/Sitefav_icon_backend/', $filename);
            $resizedImage = Image::make(public_path('uploads/Sitefav_icon_backend/' . $filename));
            $resizedImage->save();
            setSettings('fav_icon_backend', 'uploads/Sitefav_icon_frontend/'.$filename);
        }


        if ($request->scripts) {
            $scripts = base64_encode(request('scripts'));
            setSettings('scripts', $scripts);
        }

        if ($request->styles) {
            $styles = base64_encode(request('styles'));
            setSettings('styles', $styles);
        }
        return redirect()->back();
    }
}
