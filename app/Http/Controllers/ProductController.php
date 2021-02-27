<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Brand;
use App\Models\Category;

class ProductController extends Controller
{
    //view add product from
    public function add_product()
    {
        $getAllBrand = Brand::orderby('brand_title','asc')->get();

        $getallcatagory=Category::orderby('category_title','asc')->get();
        //dd($getAllBrand);
        return view('admin.products.add-product',compact('getAllBrand','getallcatagory'));
    }
    //store product
    public function store_poroduct(Request $request)
    {
        //dd($request->all());
        $cat = new Product;
        $cat->product_title = request('product_name');
        $cat->product_desc = request('product_desc');
        $cat->product_brand_id = request('product_brand_id');
        $cat->product_cat_id = request('product_cat_id');
        $cat->product_mrp_price = request('product_mrp_price');
        $cat->product_sell_price = request('product_sell_price');
        $cat->status = 1;

        try{
            $cat->save();
            return redirect()->back()->with('success','product add success fully');
        } catch (Throwable $e) {
    
            return redirect()->back()->with('error',$e);
        }
    }

    //list show of product
    public function list_product()
    {
        $getallproduct=Product::join('brand_tbl','brand_tbl.id','=', 'product_master.product_brand_id')
                            ->join('category_tbl','category_tbl.id','=', 'product_master.product_cat_id')
                            ->select('category_tbl.category_title','brand_tbl.brand_title','product_master.*')
                            ->get();
        //dd($getallproduct);
        return view('admin.products.list-product',compact('getallproduct'));
    }
    public function edit_product($id)
    {
        
        $getProduct = Product::findOrFail($id);
        $getAllBrand = Brand::orderby('brand_title','asc')->get();
        $getallcatagory=Category::orderby('category_title','asc')->get();
        return view('admin.products.edit-product',compact('getProduct','getAllBrand','getallcatagory'));
        
    }
    public function update_product(Request $request, $id)
    {
        //dd($id); 
        //dd($request->all());
        $getallproduct = Product::findOrFail($id);

        $getallproduct->product_title = request('product_name');
        $getallproduct->product_desc = request('product_desc');
        $getallproduct->product_brand_id = request('product_brand_id');
        $getallproduct->product_cat_id = request('product_cat_id');
        $getallproduct->product_mrp_price = request('product_mrp_price');
        $getallproduct->product_sell_price = request('product_sell_price');
        //dd($getallproduct);
        $getallproduct->save();
        return redirect('/admin/list-product')->with('success','Product Update Sucesfully');


    }
    public function delete_product($id)
    {
        //dd($id);
        $getProduct = Product::findOrFail($id);
        $getProduct->delete();
        return redirect()->back()->with('success','product delete Succesfully');
    }
}
