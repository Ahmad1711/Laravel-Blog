<?php

namespace App\Http\Controllers;

use App\Setting;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }
    public function edit()
    {
        return view('admin.settings.edit')->with('settings',Setting::first());

    }
    public function update(Request $request)
    {
        $this->validate($request,[
            'site_name'=>'required',
            'contact_phone'=> 'required',
            'contact_email'=>'required',
            'address'=>'required'
        ]);
        $settings=Setting::first();
        $settings->site_name=$request->site_name;
        $settings->contact_phone=$request->contact_phone;
        $settings->contact_email=$request->contact_email;
        $settings->address=$request->address;
        $settings->save();
        session()->flash('success','Settings was updated successfully');
        return redirect()->route('setting.edit');

;    }
}
