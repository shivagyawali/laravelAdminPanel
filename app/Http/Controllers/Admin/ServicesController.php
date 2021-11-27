<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Services;
use Illuminate\Http\Request;

class ServicesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $services = Services::latest()->paginate(5);

        return view('admin.services.index', compact('services'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.services.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'detail' => 'required',

        ]);
        $file = $request->file('image')->store('public/images/services');
        $services = new Services();
        $services->image = str_replace('public', 'storage', $file);
        $services->name = $request->name;
        $services->detail = $request->detail;

        $services->save();


        return redirect()->route('services.index')
            ->with('success', 'Service created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Services  $services
     * @return \Illuminate\Http\Response
     */
    public function show(Services $services)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Services  $services
     * @return \Illuminate\Http\Response
     */
    public function edit(Services $service)
    {

        return view('admin.services.edit', compact('service'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Services  $services
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Services $service)
    {
        $request->validate([
            'name' => 'required',
            'detail' => 'required',

        ]);
        $service = Services::find($service)->first();
        $service->name = request('name');
        $service->detail = request('detail');

        if (file_exists($service->image) && request('image')) {
            unlink($service->image);
            $file = $request->file('image')->store('public/images/services');
            $service->image = str_replace('public', 'storage', $file);
        } elseif (!file_exists($service->image) && request('image')) {
            $file = $request->file('image')->store('public/images/services');
            $service->image = str_replace('public', 'storage', $file);
        } else {
            $service->image = $service->image;
        }
        $service->update();

        return redirect()->route('services.index')
            ->with('success', 'Service updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Services  $services
     * @return \Illuminate\Http\Response
     */
    public function destroy(Services $service)
    {
        $service->delete();

        if (file_exists($service->image)) {
            unlink($service->image);
        }
        return redirect()->route('services.index')
            ->with('success', 'Service deleted successfully');
    }
}
