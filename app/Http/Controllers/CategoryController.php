<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cats_category;
use App\Models\Cat;
use App\Models\Page;
use App\Models\Dog;
use App\Models\Dogs_category;
use Carbon\Carbon;


class CategoryController extends Controller
{
    public function index()
    {
        $dogs_categories = Dogs_category::all();
        $cats_categories = Cats_category::all();
        return view('admin.admin', [
            'dogs_category' => $dogs_categories,
            'cats_category' => $cats_categories
        ]);
    }

    public function delete($cat ,$id){
        if($cat == 1) {
            Dogs_category::where('id', $id)->delete();
        }
        elseif($cat == 2){
            Cats_category::where('id', $id)->delete();
        }
        return redirect('admin/categories');
    }
    public function update($cat, $id){
        if($cat == 1){
            $item = Dogs_category::find($id);
        }
        elseif($cat == 2){
            $item = Cats_category::find($id);
        }
        $title = $item->category_name;

        return view('admin.edit', [
            'title' => $title,
            'cat' => $cat,
            'id' => $id
        ]);
    }
    public function updateSubmit($cat, $id, Request $request){
        //TODO сделать валидацию
        //cat_name
        if($cat == 1){
            $item = Dogs_category::find($id);
        }
        elseif($cat == 2){
            $item = Cats_category::find($id);
        }
        $item->category_name = $request->input('cat_name');
        $item->save();

        return redirect('admin/categories');
    }

    public function createCategory($cat, Request $request){
        //TODO сделать валидацию
        if($cat == 1){
            Dogs_category::insert(['page_id' => $request->input('page_id'),
                'category_name' => $request->input('category_name'),
                'updated_at' => Carbon::now()
                ]);
        }
        elseif($cat == 2){
            Cats_category::insert(['page_id' => $request->input('page_id'),
                'category_name' => $request->input('category_name'),
                'updated_at' => Carbon::now()
            ]);
        }
        return redirect('admin/categories');
    }
}
