<?php

namespace App\Http\Controllers\User;

use App\User;
use App\Models\Location;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    public function Account(){
        return view('website.account.index');
    }


    public function Update(Request $request){
        $name_data = array(
            'name' => $request->name
        );

        User::where('id', '=', Auth()->User()->id)->update($name_data);
        return redirect()->back()->with('success', 'Successfully account updated.');
    }
}
