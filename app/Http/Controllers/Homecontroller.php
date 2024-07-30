<?php

namespace App\Http\Controllers;

use App\Models\Note;  // Make sure the model is correctly referenced
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        return view('home')
            ->with('devices', Note::all());
    }

    public function save(Request $request){
        $request->validate([
            'device' => 'required'
        ]);

        Note::create([
            'device' => $request->device
        ]);

        return redirect()->back();
    }

    public function edit($id){
        $device = Note::find($id);
        return view('home')
            ->with('devices', Note::all())
            ->with('device', $device);
    }

    public function update(Request $request, $id){
        $request->validate([
            'device' => 'required'
        ]);

        $device = Note::find($id);
        $device->device = $request->device;
        $device->save();

        return redirect('/');
    }

    public function delete($id){
        $device = Note::find($id);

        $device->delete();

        return redirect('/');
    }
}
