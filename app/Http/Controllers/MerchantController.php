<?php

namespace App\Http\Controllers;

use App\Merchant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Validation\Validator;

class MerchantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(){
        $merchants = Merchant::all();
        return view('Admin.Merchant.index',compact('merchants'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('Admin.Merchant.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        if($request->hasFile('document')){
            $fileNameWithExt = $request->file('document')->getClientOriginalName();
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            $extension =$request->file('document')->getClientOriginalExtension();
            $fileNameToStore = $fileName.'_'.time().'.'.$extension;
            $path = $request->file('document')->storeAs('public/merchant/documents',$fileNameToStore);
        }
        else{
            $fileNameToStore = 'default.jpeg';
        }

        $document = $fileNameToStore;
        $request->validate([
            'name' => 'required',
            'email'=> 'required|email',
            'password'=> 'required',
            'contact_no'=> 'required|min:10|max:10',
            'address'=>'required',
            'shop_name'=>'required',
            'document' => 'required',
            'latitude' => 'required',
            'longitude' => 'required',
        ]);

            Merchant::create($request->all());

        return redirect::route('merchant.index')->with('message','Merchant has been succesfully Added.');

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
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Merchant $merchant)
    {
            $merchant->delete();
            return redirect::route('merchant.index')->with('message', 'Successfully Deleted');
    }
}
