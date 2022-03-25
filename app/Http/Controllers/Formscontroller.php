<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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

}
