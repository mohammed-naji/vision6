<?php

namespace App\Http\Controllers;

use App\Models\Insurance;
use App\Models\User;
use Illuminate\Http\Request;

class RelationController extends Controller
{
    public function one_to_one()
    {
        // $user = User::find(1);
        // // $in = Insurance::where('user_id', $user->id)->first();
        // dd($user->insurance);

        // $in = Insurance::find(1);

        // dd($in->user->name);

        $insurances = Insurance::with('user')->get();
        // $insurances = Insurance::get();
        return view('relation.one_to_one', compact('insurances'));
    }
}
