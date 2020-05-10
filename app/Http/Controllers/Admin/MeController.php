<?php

namespace App\Http\Controllers\Admin;

use App\Models\Location;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MeController extends Controller
{
    public function index(){
        $location = Location::where('user_id', '=', Auth()->User()->id)->first();
        return view('admin.me.index', compact('location'));
    }

    public function update(Request $request){
        $name_data = array(
            'name' => $request->name
        );
        $location_data = array(
            'user_id' => Auth()->User()->id,
            'location' => $request->location
        );

        User::where('id', '=', Auth()->User()->id)->update($name_data);
        $location = Location::where('user_id', '=', Auth()->User()->id)->first();
        if($location){
            Location::where('user_id', '=', Auth()->User()->id)->update($location_data);
            return redirect()->back()->with('success', 'Successfully account updated.');
        }else{
            Location::create([
                'user_id' => Auth()->User()->id,
                'location' => $request['location']
            ]);
            return redirect()->back()->with('success', 'Successfully account updated.');
        }

    }
}
