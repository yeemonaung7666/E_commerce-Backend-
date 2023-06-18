<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Category_Item;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;

class CategoryController extends Controller
{
    public function index(){
        $categories=Category::paginate(4);
        $count=Category::all()->count();
        return view('admin.category',compact('categories','count'));
    }

    public function addCategoryindex(){
        return view('admin.addCategory');
    }

    public function assign(Request $request){
        $this->validate($request, [
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ]);
        $image_path = $request->file('image')->store('images', 'public');
        
        Category::create([
            'name'=>$request->c_name,
            'image' => $image_path,
            'publish'=>$request->publish
        ]);
        return redirect('Admin/category')->with('successAlert', 'You have successfully inserted!');
    }

    public function edit($id){
        $category = Category::find($id);
        return view('admin.updateCategory', compact('category'));
       
    }

    public function update(Request $request, $id){
        $category = Category::find($id);
        
        if ($request->image==null) {
            Category::find($id)->update([
                'name'=>$request->c_name,
                'image'=>$category->image,
                'publish'=>$request->publish
            ]);

        } else {
            $this->validate($request, [
                'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            ]);
            $image_path = $request->file('image')->store('images', 'public');
            
            Category::find($id)->update([
                'name'=>$request->c_name,
                'image' => $image_path,
                'publish'=>$request->publish
            ]);
           
        }
        return redirect('Admin/category')->with('successAlert','You have successfully updated!');
    }

    public function delete($id){
        Category::find($id)->delete();
        Category_Item::where('category_id',$id)->delete();
        return redirect('Admin/category')->with('successAlert','You have successfully deleted!');
 
    }
}
