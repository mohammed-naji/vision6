<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\Image;
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
            $products = Product::where(request()->col, 'like', $keyword)->orderBy(request()->col, request()->sort??'asc')->latest()->paginate(request()->perpage??5);
            return view('products._table', compact('products', 'items_count'))->render();
        }else {
            // $products = Product::latest()->paginate(request()->perpage??5);
            $products = Product::orderBy('id', 'desc')->paginate(request()->perpage??5);
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
        $categories = Category::select('id', 'name')->get();
        // $categories = Category::all();
        // dd($categories);
        return view('products.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'name' => 'required',
            'image' => 'required|image|mimes:png,jpg,svg',
            'description' => 'required',
            'price' => 'required',
            'category_id' => 'required'
        ]);

        $new_name = rand().rand().'_'.$request->file('image')->getClientOriginalName();
        $request->file('image')->move(public_path('uploads/images'), $new_name);

        $product = Product::create([
            'name' => $request->name,
            'image' => $new_name,
            'description' => $request->description,
            'price' => $request->price,
            'discount' => $request->discount,
            'category_id' => $request->category_id,
        ]);

        if($request->has('gallery')) {
            foreach($request->gallery as $item) {
                $gallery_name = rand().rand().'_'.$item->getClientOriginalName();
                $item->move(public_path('uploads/images'), $gallery_name);
                Image::create([
                    'path' => $gallery_name,
                    'product_id' => $product->id
                ]);
            }
        }

        if($product) {
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
        $product = Product::findOrFail($id);
        $categories = Category::select('id', 'name')->get();
        // if(!$product) {
        //     abort(404);
        // }

        return view('products.edit', compact('product', 'categories'));
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
        $request->validate([
            'name' => 'required',
            'image' => 'nullable|image|mimes:png,jpg,svg',
            // 'description' => 'required',
            'price' => 'required',
            'category_id' => 'required'
        ]);

        $product = Product::findOrFail($id);
        $new_name = $product->image;
        if($request->has('image')) {
            if($new_name && file_exists(public_path('uploads/images/').$new_name)) {
                File::delete(public_path('uploads/images/').$new_name);
            }


            $new_name = rand().rand().'_'.$request->file('image')->getClientOriginalName();
            $request->file('image')->move(public_path('uploads/images'), $new_name);


        }

        $item = $product->update($request->all());

        if($request->has('gallery')) {
            foreach($request->gallery as $item) {
                $gallery_name = rand().rand().'_'.$item->getClientOriginalName();
                $item->move(public_path('uploads/images'), $gallery_name);
                Image::create([
                    'path' => $gallery_name,
                    'product_id' => $id
                ]);
            }
        }
        if($item) {
            return redirect()->back()->with('msg', 'Product updated successfully')->with('icon', 'success');
        }else {
            return redirect()->back()->with('msg', 'Product not added')->with('icon', 'error');
        }
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

        // return redirect()->route('mohammed_naji')->with('msg', 'Product Deleted Successfully');
        return 'Product Deleted Successfully';
    }

    public function show_msg()
    {
        return 'Mohammed Naji';
    }

    public function delete_image($id)
    {
        return Image::destroy($id);
    }

    public function delete_all()
    {
        Product::truncate();
    }

    public function delete_selected(Request $request)
    {
        return Product::whereIn('id', $request->items)->delete();
    }
}
