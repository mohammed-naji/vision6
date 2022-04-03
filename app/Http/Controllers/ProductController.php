<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items_count = Product::count();
        // $items_count = 103;
        // dd(request()->sort??'new');
        if(request()->has('keyword')) {
            // $products = Product::where('name', 'like', '%'.request()->keyword .'%')->orWhere('price', 'like', '%'.request()->keyword .'%')->paginate(5);
            $keyword = '%'.request()->keyword .'%';
            if(request()->col == 'price') {
                $keyword = number_format(request()->keyword, 3);
            }
            $products = Product::where(request()->col, 'like', $keyword)->orderBy(request()->col, request()->sort??'asc')->paginate(request()->perpage??5);
        }else {
            $products = Product::paginate(request()->perpage??5);
        }

        return view('products.index', compact('products', 'items_count'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return 'Showwwwww';
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Product::destroy($id);
        return redirect()->route('mohammed_naji')->with('msg', 'Product Deleted Successfully');
    }
}
