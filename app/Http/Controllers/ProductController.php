<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

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
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'image' => 'required',
            'description' => 'required',
            'price' => 'required',
        ]);

        $new_name = rand().rand().'_'.$request->file('image')->getClientOriginalName();
        $request->file('image')->move(public_path('uploads/images'), $new_name);

        $item = Product::create([
            'name' => $request->name,
            'image' => $new_name,
            'description' => $request->description,
            'price' => $request->price,
            'discount' => $request->discount,
        ]);
        if($item) {
            return redirect()->back()->with('msg', 'Product added successfully')->with('icon', 'info');
        }else {
            return redirect()->back()->with('msg', 'Product not added')->with('icon', 'error');
        }


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
        // Product::destroy($id);
        $product = Product::find($id);
        $image = $product->image;
        if($image && file_exists(public_path('uploads/images/').$image)) {
            File::delete(public_path('uploads/images/').$image);
        }
        // unlink()
        $product->delete();

        return redirect()->route('mohammed_naji')->with('msg', 'Product Deleted Successfully');
    }
}
