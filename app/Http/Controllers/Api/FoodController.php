<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\FoodList;
use Illuminate\Http\Request;

class FoodController extends Controller
{
    public function foodList(){
        $foodList = FoodList::with('category')->get();
        return response()->json($foodList);
    }
    public function addFood(Request $request){
        $food = new FoodList();
        if($request->hasFile('image')){
            $filename = time() . '_' . $request->image->getClientOriginalName();
            $request->image->move(public_path('images'), $filename);
            $food->image = $filename;
        }

        $food->name = $request->name;
        $food->info = $request->info;
        $food->price = $request->price;
        $food->category_id  = $request->category_id;
        $food->save();

        return response()->json(['status' => 'success', 'message' => 'تم إضافة وجبة بنجاح']);
    }

    public function DeleteFood($id){
        $food = FoodList::where('id', $id)->first();

        // delete image
        if($food->image !== null){
            $filename = public_path('images/' . $food->image);
            if(file_exists($filename)){
                unlink($filename);
            }
        }

        $food->delete();
        return response()->json(['status' => 'success', 'message' => 'تم حذف الوجبة من القائمة بنجاح']);
    }

    public function updateFood(Request $request){
        $food = FoodList::where('id', $request->id)->first();

        if($request->hasFile('image')){
            // delete old image
            if($food->image !== null){
                $filename = public_path('images/' . $food->image);
                if(file_exists($filename)){
                    unlink($filename);
                }
            }
            // update image
            $filename = time() . '_' . $request->image->getClientOriginalName();
            $request->image->move(public_path('images'), $filename);
            $food->image = $filename;
        }

        $food->name = $request->name;
        $food->info = $request->info;
        $food->price = $request->price;
        $food->category_id = $request->category_id;
        $food->is_active = $request->is_active;
        $food->save();
        return response()->json(['status' => 'success' , 'message' => 'تم تعديل التصنيف بنجاح']);
    }

    public function getfoodList(Request $request){
        $category_id = $request->category_id;
        $foodListTarget = FoodList::where('category_id', $category_id)->get();
        return response()->json($foodListTarget);
    }
}
