<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function getCategory(){
        $categoryList = Category::where('is_active', 1)->get();
        return response()->json($categoryList);
    }

    public function getAllCategory(){
        $categoryList = Category::all();
        return response()->json($categoryList);
    }

    public function addCategory(Request $request){
        $category = new Category();
        $category->name = $request->name;
        $category->save();
        return response()->json(['status' => 'success' , 'message' => 'تم إنشاء تصنيف جديد بنجاح']);
    }

    public function deleteCategory($id){
        $category = Category::where('id', $id)->first();
        $category->delete();
        return response()->json(['status' => 'success' , 'message' => 'تم حذف التصنيف بنجاح']);
    }

    public function updateCategory(Request $request){
        $category = Category::where('id', $request->id)->first();
        $category->name = $request->name;
        $category->is_active = $request->is_active;
        $category->save();
        return response()->json(['status' => 'success' , 'message' => 'تم تعديل التصنيف بنجاح']);
    }
}
