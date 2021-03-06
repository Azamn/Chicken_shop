<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use function GuzzleHttp\Promise\all;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $products = Product::all();
        return view('Admin.Product.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('Admin.Product.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        if($request->hasFile('image')){
            $fileNameWithExt = $request->file('image')->getClientOriginalName();
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            $extension =$request->file('image')->getClientOriginalExtension();
            $fileNameToStore = $fileName.'_'.time().'.'.$extension;
            $path = $request->file('image')->storeAs('public/merchant/products',$fileNameToStore);
        }
        else{
            $fileNameToStore = 'default.jpeg';
        }


        $request->validate([
           'name' => 'required',
            'price' => 'required',
            'quantity' => 'required|max:4',
            'image'=> 'required',
        ]);

        Product::create([
            'name' => $request->name,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'image' => $fileNameToStore,
        ]);

        return redirect::route('product.index')->with('message','Product has been succesfully Added.');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $product = Product::find($id);

        return view('Admin.Product.edit',compact('product','id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {

       $product = Product::find($id);

        if($request->hasFile('image')){
            $fileNameWithExt = $request->file('image')->getClientOriginalName();
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            $extension =$request->file('image')->getClientOriginalExtension();
            $fileNameToStore = $fileName.'_'.time().'.'.$extension;
            $path = $request->file('image')->storeAs('public/merchant/products',$fileNameToStore);
        }
        else{
            $fileNameToStore = 'default.jpeg';
        }

        $image = $fileNameToStore;

        $request->validate([
//            'name' => 'required',
            'price' => 'required',
            'quantity' => 'required|max:4',
//            'availability' => 'required',

        ]);


        $data = request()->except(['_token','_method']);
        $product->where('id','=',$id)->update($data);

        return redirect::route('product.index')->with('message','Merchant has been succesfully Updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect::route('product.index')->with('message', 'Successfully Deleted');
    }

    public function changeStatus(Request $request){

        $product = Product::find($request->id);
        $product->availability = $request->availability;
        $product->save();

        return response()->json(['success'=>'Status Change Successfully.']);

    }


}
