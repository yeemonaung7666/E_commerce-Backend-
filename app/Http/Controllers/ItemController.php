<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Category_Item;
use Illuminate\Http\Request;
use App\Models\Item;

class ItemController extends Controller
{
    public function index(){
        $items=Item::paginate(5);
        $count=Item::all()->count();

        return view('admin.item', compact('items','count'));
    }
    public function addItemIndex(){
        $categories=Category::all();
        return view('admin.addItem',compact('categories'));
    }

    public function assign(Request $request){  
        $this->validate($request, [
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ]);
        $image_path = $request->file('image')->store('images', 'public');
        $items=Item::create([
            'item_name'=>$request->item_name,
            'price'=>$request->price,
            'description'=>$request->description,
            'condition'=>$request->condition,
            'type'=>$request->type,
            'image'=>$request->$image_path,
            'publish'=>$request->publish,
            'owner_name'=>$request->owner_name,
            'country_code'=>$request->country_code,
            'phone_number'=>$request->phone_number,
            'address'=>$request->address
        ]);
        $items->save();
        $findItemId=Item::find($items->id);
        $category_id=$request->categories;
        $findItemId->categories()->sync($category_id);
        
        return redirect('Admin/item')->with('successAlert', 'You have successfully inserted!');

    }

    public function edit($id){
        $categories= Category::all();
        $item = Item:: find($id);
        return view('Admin/updateItem', compact('item','categories'));        
    }

    public function update(Request $request, $id){
        $item=Item::find($id);

        if ($request->image==null) {
            Item::find($id)->update([
                'item_name'=>$request->item_name,
                'price'=>$request->price,
                'description'=>$request->description,
                'condition'=>$request->condition,
                'type'=>$request->type,
                'image'=>$item->image,
                'publish'=>$request->publish,
                'owner_name'=>$request->owner_name,
                'country_code'=>$request->country_code,
                'phone_number'=>$request->phone_number,
                'address'=>$request->address
            ]);

        } else {
            $this->validate($request, [
                'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            ]);
            $image_path = $request->file('image')->store('images', 'public');
            
            Item::find($id)->update([
                'item_name'=>$request->item_name,
                'price'=>$request->price,
                'description'=>$request->description,
                'condition'=>$request->condition,
                'type'=>$request->type,
                'image'=>$image_path,
                'publish'=>$request->publish,
                'owner_name'=>$request->owner_name,
                'country_code'=>$request->country_code,
                'phone_number'=>$request->phone_number,
                'address'=>$request->address
            ]);
           
        }

        $updateItemId=Item::find($id);
        $category_id=$request->categories;
        $updateItemId->categories()->sync($category_id);

        return redirect('Admin/item')->with('successAlert', 'You have successfully updated!');
    }

    public function delete($id){
        
        Item::find($id)->delete();
        Category_Item::where('item_id',$id)->delete();
        return redirect('Admin/item')->with('successAlert', 'You have successfully deleted!');

    }
}
