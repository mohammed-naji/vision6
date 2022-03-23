<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Site2Controller extends Controller
{
    public function index()
    {
        $title = 'Vision Course';
        $desc = 'Graphic Artist - Web Designer';

        // dd(compact('title', 'desc'));

        $portfolios = [
            [
                'id' => 1,
                'title' => 'LOG CABIN',
                'image' => 'cabin.png',
                'content' => 'lorem'
            ],
            [
                'id' => 2,
                'title' => 'TASTY CAKE',
                'image' => 'cake.png',
                'content' => 'lorem'
            ],
            [
                'id' => 3,
                'title' => 'CIRCUS TENT',
                'image' => 'circus.png',
                'content' => 'lorem'
            ]
        ];

        // return view('site2.index')->with('title', $title)->with('desc', $desc);
        return view('site2.index', compact('title', 'desc', 'portfolios'));
        // return view('site2.index', [
        //     'my_title' => $title,
        //     'new_desc' => $desc
        // ]);
    }

    public function portfolio()
    {
        return view('site2.portfolio');
    }

    public function about()
    {
        return view('site2.about');
    }

    public function contact()
    {
        return view('site2.contact');
    }

}
