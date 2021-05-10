<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cats_category;
use App\Models\Cat;
use App\Models\Page;
use App\Models\Dog;
use App\Models\Dogs_category;
use Carbon\Carbon;


class PostController extends Controller
{
    public function index(){
        $dogs_posts = Dog::latest()->get();
        $dogs_categories = Dogs_category::all();
        $cats_posts = Cat::latest()->get();
        $cats_categories = Cats_category::all();
        return view('admin.post', [
            'dog_posts' => $dogs_posts,
            'cat_posts' => $cats_posts,
            'dogs_categories' => $dogs_categories,
            'cats_categories' => $cats_categories
        ]);
    }
    public function show($cat, $id){
        if($cat == 'dog'){
            $item = Dog::find($id);
        }
        elseif($cat == 'cat'){
            $item = Cat::find($id);
        }
        return view('admin.onePost', [
            'post' => $item,

        ]);
    }

    public function delete($cat, $id){
        if ($cat == 'dog'){
            Dog::where('id', $id)->delete();
        }
        elseif ($cat == 'cat'){
            Cat::where('id', $id)->delete();
        }
        return redirect('admin/posts');
    }

    public function update($cat, $id){
        if($cat == 'dog'){
            $post = Dog::find($id);
            $categories = Dogs_category::all();
            $current_cat = Dogs_category::find($post->category_id);
        }
        elseif($cat == 'cat'){
            $post = Cat::find($id);
            $categories = Cats_category::all();
            $current_cat = Cats_category::find($post->category_id);
        }


        return view('admin.onePost', [
            'post' => $post,
            'categories' => $categories,
            'current_cat' => $current_cat,
            'cat' => $cat
        ]);
    }
    public function updateSubmit($cat, $id, Request $request){
        //TODO сделать валидацию
        if($cat == 'dog'){
            $item = Dog::find($id);
        }
        elseif($cat == 'cat'){
            $item = Cat::find($id);
        }

        $item->title = $request->input('title');
        $item->text = $request->input('text');
        $item->category_id = $request->input('category_id');
        $item->save();

        return redirect('admin/posts');
    }

    public function addPost($cat){
        if($cat == 'dog'){
            $categories = Dogs_category::all();
        }
        elseif($cat == 'cat'){
            $categories = Cats_category::all();
        }
        return view('admin.addPost', [
           'categories' => $categories,
            'cat' => $cat,
        ]);
    }
    public function addPostSubmit($cat, Request $request){
        //TODO сделать валидацию

        if($cat == 'dog'){
            if ($_FILES['preview']['size'] != 0 && $_FILES['preview']['error'] == 0) {
                $path = $request->file('preview')->store('uploads', 'public');
            }
            Dog::insert(['category_id' => $request->input('category_id'),
                'title' => $request->input('title'),
                'text' => $request->input('text'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'preview' => $path

            ]);
        }
        elseif($cat == 'cat'){
            if ($_FILES['preview']['size'] != 0 && $_FILES['preview']['error'] == 0) {
                $path = $request->file('preview')->store('uploads', 'public');
            }
            Cat::insert(['category_id' => $request->input('category_id'),
                'title' => $request->input('title'),
                'text' => $request->input('text'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'preview' => $path
                ]);
        }
        return redirect('admin/posts');
    }
}
