<?php

namespace App\Http\Controllers;

use App\Models\Insurance;
use App\Models\Product;
use App\Models\Student;
use App\Models\Subject;
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

    public function all_products()
    {
        $products = Product::with('comments.user', 'images')->get();
        return view('relation.all_products', compact('products'));
    }

    public function single_products($id)
    {
        $product = Product::with('comments.user')->find($id);

        $next_prod = Product::where('id', '>' ,$product->id)->first();
        $prev_prod = Product::where('id', '<' ,$product->id)->orderBy('id', 'desc')->first();

        return view('relation.single_products', compact('product', 'next_prod', 'prev_prod'));
    }

    public function one_to_many()
    {
        $user = User::find(1);

        dd($user->comments);
    }

    public function register_subjects()
    {
        $subjects = Subject::all();
        $student = Student::find(1);
        return view('relation.register_subjects', compact('subjects', 'student'));
    }

    public function register_subjects_submit(Request $request)
    {
        // dd($request->all());
        $studnt = Student::find(1);

        // attach
        // detach
        // sync
        $studnt->subjects()->sync( $request->register_subject );

        return redirect()->back();

    }
}
