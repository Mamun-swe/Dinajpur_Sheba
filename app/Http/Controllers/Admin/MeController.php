<?php

namespace App\Http\Controllers\Admin;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MeController extends Controller
{
    public function index(){
        return view('admin.me.index');
    }

    public function update(Request $request){
        $name_data = array(
            'name' => $request->name
        );

        User::where('id', '=', Auth()->User()->id)->update($name_data);
        return redirect()->back()->with('success', 'Successfully account updated.');
    }
}
