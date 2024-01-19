<?php

namespace App\Http\Controllers;

use App\Http\Requests\Post\StoreRequest;
use App\Http\Requests\Post\UpdateRequest;
use App\Http\Requests\PostRequest;
use App\Http\Requests\SlugRequest;
use App\Models\Post;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Str;


class PostController extends Controller
{
    public function index(PostRequest $request): \Illuminate\Http\JsonResponse
    {
        $data=$request->validated();
        $page=$data['page']??1;
        $perPage=$data['per_page']??5;
        $posts=Post::all()->forPage($page,$perPage);
        return response()->json($posts,200);
    }


    public function slug($slug): \Illuminate\Http\JsonResponse
    {
        return response()->json( Post::where('slug',$slug)->first(),200);
    }

    public function store(StoreRequest $request): \Illuminate\Http\JsonResponse
    {
        $data=$request->validated();
        $data['slug']=Str::slug($data['title'],'_');
        $post=Post::create($data);
        return response()->json('Post is created!',200);
    }

    public function show($id): \Illuminate\Http\JsonResponse
    {
        return response()->json( Post::where('id',$id)->first(),200);
    }
    public function update(UpdateRequest $request,$id): \Illuminate\Http\JsonResponse
    {
        $post=Post::find($id)->first();
        $data=$request->validated();
        $post->update($data);
        return response()->json( 'Post is update!',200);
    }

    public function destroy($id)
    {
        $post=Post::find($id);
        $post->delete();
        return response()->json('Post is delete!',200);
    }
}
