<?php

namespace App\Http\Controllers;

use App\Mail\TestMail;
use App\Rules\CheckWordCount;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class FormsController extends Controller
{
    public function form1()
    {
        return view('forms.form1');
    }

    public function form1_submit(Request $request)
    {
        // dd( $request->all() );
        // $name = $request->input('name') ;
        // $age = $request->input('age');
        $agree = $request->input('agree', 'Disagree');
        $name = $request->name;
        $age = $request->age;
        // $agree = $request->agree;
        dd($name, $age, $agree);
    }

    public function form2()
    {
        return view('forms.form2');
    }

    public function form2_submit(Request $request)
    {
        // dd( $request->all() );
        $name = $request->abcdef;
        $age = $request->age;

        return view('forms.form2_data', compact('name', 'age'));
    }

    public function form3()
    {
        return view('forms.form3');
    }

    public function form3_submit(Request $request)
    {
        $name = $request->file('image')->getClientOriginalName();
        $ex = $request->file('image')->getClientOriginalExtension();
        // new.png
        // png

        // adjhsgfsjdhfajdhsbfjhafhjgasdgfasfgdsgahgfhdsaghfgadshjgfhgdsafghdsghjfghjsdgfjhgadsgfjgdsahjfghjdasgfgadsjhgfhjasjhgfjdshjgf.png
        // $new_name = 'vision6_'.rand().'_'.time().'_'.rand().'.'.$ex;
        // vision6_57544555_5555555555_77777777.png
        $letters = range('a', 'z');
        $letter = $letters[ rand(0,  count($letters) - 1 ) ];
        $fb_name = rand(000000000000000, 999999999999999).'_'.rand().'_'.rand().'_'.$letter.'.'.$ex;

        $request->file('image')->move(public_path('uploads/images'), $fb_name);
        // mkdir()
        // explode('/', 'uploads/images');
        // fopen();
    }


    public function form4()
    {
        return view('forms.form4');
    }

    public function form4_submit(Request $request)
    {

        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
        ]);

        return 'Done';
    }


    public function form5()
    {
        return view('forms.form5');
    }

    public function form5_submit(Request $request)
    {
        // form validation
        $request->validate([
            'name' => 'required|min:3|max:30',
            'email' => ['required', 'email'],
            'password' => 'required|min:6|confirmed',
            'bio' => ['nullable', new CheckWordCount(10)]
        ]);

        dd($request->all());

    }

    public function form6()
    {
        return view('forms.form6');
    }

    public function form6_submit(Request $request)
    {
        // check the inputs
        $request->validate([
            'name' => 'required',
            'age' => 'required',
            'image' => 'required|image|mimes:png,jpg|max:2048',
        ]);

        $name = $request->name;
        $age = $request->age;

        // upload the file
        $ex = $request->file('image')->getClientOriginalExtension();
        $new_name = rand().rand().'.'.$ex;
        $request->file('image')->move(public_path('uploads/images'), $new_name);

        // send the email
        Mail::to('admin@admin.com')->send(new TestMail($name, $age, $new_name));
    }
}
