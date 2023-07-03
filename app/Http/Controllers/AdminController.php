<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    //



    public function getPostWithCategory()
    {
        $posts = Post::with('category')->get();
        return view('posts', compact('posts'));
    }


    public function deletePost($id)
    {
        $post = Post::findOrFail($id);
        $post->delete();
        return redirect()->route('posts.index');
    }



    public function getPosts($id)
    {
        $category = Category::findOrFail($id);
        $posts = $category->posts;

        return view('category.posts', compact('category', 'posts'));
    }


    public function softDeleteds()
    {
        $softDeletedPosts = Post::getSoftDeletedPosts();
        return response()->json($softDeletedPosts);
    }


    public function getCategory()
    {
        $categories = Category::with('latestPost')->get();

        return view('categories', compact('categories'));
    }


}
