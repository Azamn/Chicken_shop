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
            'delivery_permission' => 'required',
            'latitude' => 'required',
            'longitude' => 'required',
//            'latitude2' => 'required',
//            'longitude2' => 'required',
//            'latitude3' => 'required',
//            'longitude3' => 'required',
//            'latitude4' => 'required',
//            'longitude4' => 'required',
        ]);

            Merchant::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => $request->password,
                'contact_no' => $request->contact_no,
                'address' => $request->address,
                'shop_name' => $request->shop_name,
                'shop_code' => $request->shop_code, 
                'chicken_type' => $request->chicken_type,
                'gst_no' => $request->gst_no,
                'document' => $fileNameToStore,
                'delivery_permission' => implode(',', (array) $request->delivery_permission),
                'latitude'=> implode(',', (array) $request->latitude),
                'longitude'=> implode(',', (array) $request->longitude),

            ]);

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
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $merchant = Merchant::find($id);
        return view('Admin.Merchant.edit',compact('merchant','id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $merchant = Merchant::find($id);

//
        $request->validate([
            'name' => 'required',
            'email'=> 'required|email',
            'password'=> 'required',
            'contact_no'=> 'required|min:10|max:10',
            'address'=>'required',
            'shop_name'=>'required',
            'latitude1' => 'required',
            'longitude1' => 'required',

        ]);

        $data = request()->except(['_token','_method']);
        $merchant->where('id','=',$id)->update($data);

        return redirect::route('merchant.index')->with('message','Merchant has been succesfully Updated.');
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
