<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Team;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teams = Team::latest()->paginate(5);

        return view('admin.teams.index', compact('teams'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.teams.create');
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
            'position' => 'required',
            'image' => 'required',
        ]);
        $file = $request->file('image')->store('public/images/teams');
        $teams = new Team();
        $teams->image = str_replace('public', 'storage', $file);
        $teams->name = $request->name;
        $teams->position = $request->position;
        $teams->linkedin = $request->linkedin;
        $teams->instagram = $request->instagram;
        $teams->facebook = $request->facebook;
        $teams->twitter = $request->twitter;
        $teams->save();


        return redirect()->route('teams.index')
            ->with('success', 'Team created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Team $team)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Team $team)
    {
        return view('admin.teams.edit', compact('team'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Team $team)
    {
        $request->validate([
            'name' => 'required',
            'position' => 'required',

        ]);
        $team = Team::find($team)->first();
        $team->name = request('name');
        $team->position = request('position');
        $team->linkedin = request('linkedin');
        $team->instagram = request('instagram');
        $team->twitter = request('twitter');
        $team->facebook = request('facebook');



        if (file_exists($team->image) && request('image')) {
            unlink($team->image);
            $file = $request->file('image')->store('public/images/teams');
            $team->image = str_replace('public', 'storage', $file);
        } elseif (!file_exists($team->image) && request('image')) {
            $file = $request->file('image')->store('public/images/teams');
            $team->image = str_replace('public', 'storage', $file);
        } else {
            $team->image = $team->image;
        }
        $team->update();

        return redirect()->route('teams.index')
            ->with('success', 'Team updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Team $team)
    {
        $team->delete();

        if (file_exists($team->image)) {
            unlink($team->image);
        }
        return redirect()->route('teams.index')
            ->with('success', 'Team deleted successfully');
    }
}
