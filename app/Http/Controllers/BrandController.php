<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Brand;

class BrandController extends Controller
{
    //view add brand
    public function add_brand()
    {
        return view('admin.brand.add-brand');
    }

    //store barnd
    public function store_brand(Request $request)
    {
        //dd($request->all());
        $cat = new Brand;
                
        $cat->brand_title = request('brand_name');
        $cat->brand_desc = request('brand_desc');
        $cat->status = 1;
        try{
            $cat->save();
            return redirect()->back()->with('success','brand add successfully');
        } catch (Throwable $e) {
    
            return redirect()->back()->with('error',$e);
        }
    }

    //list brand
    public function brand_list()
    {
        $getAllBrand = Brand::orderby('id','desc')
                            ->get();
        ///dd($getAllBrand);
        return view('admin.brand.brand-list',compact('getAllBrand'));

    }

    public function edit_brand($id)
    {
        //dd($id);
        $getBrand = Brand::find($id);
        //dd($getBrand);
        return view('admin.brand.edit-brand',compact('getBrand'));
    }

    public function update_brand(Request $request, $id)
    {
        # code...
        //dd($id);
        //dd($request->all());
        $getBrand = Brand::findOrFail($id);

        $getBrand->brand_title = request('brand_name');
        $getBrand->brand_desc = request('brand_desc');
        //dd($getBrand);
        $getBrand->save();
        return redirect('/admin/brand-list')->with('success','Brand Update Sucesfully');

    }


}
