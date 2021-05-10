<?php

namespace App\Http\Controllers;


use App\Models\Page;
use Illuminate\Http\Request;
use App\Models\Dog;
use App\Models\Dogs_category;
class DogsController extends Controller
{
    public function all($page = 0, $categoryId = 0)
    {
        $categories = Dogs_category::where('page_id', $page);
        $posts = Dog::latest();
        $cats = array();
        $i = 0;
        foreach ($categories->get() as $category){
            $cats[$i] = $category->id;
            $i += 1;
        }

        switch ($page)
        {
            case 1:
                $name = 'Уход';
                $current = 'Уход';
                break;
            case 2:
                $name = 'Кормление';
                $current = 'Кормление';
                break;
            case 3:
                $name = 'Содержание';
                $current = 'Содержание';
                break;
            case 4:
                $name = 'Репродукция';
                $current = 'Репродукция';
                break;
        }
        if ($categoryId == 0){
            $posts->whereIn('category_id', $cats);
        }
        if ($categoryId){
            $posts->where('category_id', $categoryId);
            if($categoryId > 0) {
                $current = Dogs_category::where('id', $categoryId)->first()->category_name;
            }
        }

        return view('dogs', [
            'categories' => $categories->get(),
            'posts' => $posts->get(),
            'name' => $name,
            'page' => $page,
            'current' => $current
        ]);
    }
    public function post($page = 0, $categoryId = 0, $postId = 0){
        $categories = Dogs_category::where('page_id', $page);
        $post = Dog::where('id', $postId);
        $page_name = Page::where('id', $page)->first()->page_name;

        switch ($page)
        {
            case 1:
                $name = 'Уход';
                $current = 'Уход';
                break;
            case 2:
                $name = 'Кормление';
                $current = 'Кормление';
                break;
            case 3:
                $name = 'Содержание';
                $current = 'Содержание';
                break;
            case 4:
                $name = 'Репродукция';
                $current = 'Репродукция';
                break;
        }


        return view('postdg', [
            'categories' => $categories->get(),
            'post' => $post->first(),
            'name' => $name,
            'page' => $page,
            'current' => $current,
            'page_name' => $page_name
        ]);
    }
}
