<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Models\Category;

class CategoryController extends Controller
{
    //
    public function getCategories(){
        return Category::all();
    }

    public function getCategoriesById($id){
        return Category::find($id);
        // $category->item;
    }

    public function createCategory(Request $request){ 
        // var_dump()

      Log::info($request);

      $category  = new Category();
      $category->name = $request->name;
      $category->image = $request->image;



      $category -> save(); 


    //   $category->item()->attach($request->item_id)
      return $category;
      
    }

    public function deleteCategory($id){
        $category = Category::find($id);
        if(isset($category)){
          $category->delete();
            $respond = [
                'status' => 201,
                'message' => ' found ',
                'data' => $category
            ];
        }else{

        $respond = [
            'status' => 403,
            'message' => 'not found '
        ];
    }
        return $respond;

    }

    public function updateCategory(Request $request, $id){
        $category = Category::find($id);
        if(isset($category)){

            // $category->name = $request->name;
            // $category->image = $request->image;

            // $category->save();
$category->update($request->all());
            $respond = [
                'status' => 201,
                'message' => ' found ',
                'data' => $category
            ];


        }
        else{

        $respond = [
            'status' => 403,
            'message' => 'not found '
        ];
        }
        return $respond;

    }
}
