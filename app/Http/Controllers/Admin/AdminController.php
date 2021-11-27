<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Settings;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.dashboard');
    }

    public function settings()
    {
        return view('admin.settings')->with('settings', Settings::first());
    }

    public function update()
    {
        $this->validate(request(), [
            'details' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'address' => 'required',
            'instagram' => 'required',
            'facebook' => 'required',
            'tiktok' => 'required',
        ]);

        $settings = Settings::first();

        $settings->details = request()->details;
        $settings->phone = request()->phone;
        $settings->email = request()->email;
        $settings->address = request()->address;
        $settings->instagram = request()->instagram;
        $settings->facebook = request()->facebook;
        $settings->tiktok = request()->tiktok;
        $settings->save();
        return redirect()->back()->with('success', 'Settings Updated !');
    }
}
