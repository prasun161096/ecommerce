<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
        //add catrgory
        public function showCategory()
        {
            return view('admin.category.add-category');
        }
    
        //add category type
        public function storeCategory(Request $request)
        {

            
                 //dd($request-> all());
                $cat = new Category;
                
                $cat->category_title = request('Category_name');
                $cat->category_desc = request('Category_desc');
                //$cat->category_img_url = request()->file('Category_img')->store('public/images');
                $cat->status = 1;
                //dd($cat);
                //$isSaved=$cat->save();
            try{
                $cat->save();
                return redirect()->back()->with('success','categoty add success fully');
            } catch (Throwable $e) {
        
                return redirect()->back()->with('error',$e);
            }
        
           
    
        }
        //list category
        public function categoryList()
        {   
            $getallcategory =Category::orderby('id','desc')->get();

            //dd($getallcategory);
            return view('admin.category.category-list',compact('getallcategory'));
        }

        public function edit_category($id)
        {
            //dd($id);
            $getcategory =Category::find($id);
            //dd($getcategory);
            return view('admin.category.edit-category',compact('getcategory'));
        }
        public function update_category(Request $request,$id)
        {
            //dd($id);
            //dd($request->all());
            $getcategory = Category::findOrFail($id);
            $getcategory->category_title = request('category_name');
            $getcategory->category_desc = request('category_desc');
            //dd($getcategory);
            $getcategory->save();
            return redirect('/admin/category-list')->with('success','Category Update Sucesfully');
    

         }
}
