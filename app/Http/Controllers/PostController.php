<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function posts()
    {
        $post = Post::paginate(6);
        return view('post', compact('post'));
    }
    public function add_post()
    {
        return view('add_post');
    }
    public function store_post(Request $request)
    {
        $request->validate([
            'title'=>'required',
            'content'=>'required',
            'image' => 'required|image|mimes:jpg,jpeg,png,svg'
        ]);

        $data = new Post;

        $data->title = $request->title;
        $data->content = $request->content;

        $image = $request->image;
    
        if($image){
            $imagename = time().'.'.$image->getClientOriginalExtension();
            $request->image->move('posts', $imagename);
            $data->image = $imagename;
        }

        $data->save();

        return redirect()->back()->with('message', 'Your post has been successfully added!');
    }
    public function delete_post($id)
    {
        $data = Post::find($id);
        $data->delete();

        return redirect()->back();
    }
    public function edit_post($id)
    {
        $data = Post::find($id);
        return view('edit_post', compact('data'));
    }
    public function update_post(Request $request, $id)
    {
        $request->validate([
            'title'=>'required',
            'content'=>'required',
            'image' => 'required|image|mimes:jpg,jpeg,png,svg'
        ]);

        $data = new Post;

        $data->title = $request->title;
        $data->content = $request->content;

        $image = $request->image;
    
        if($image){
            $imagename = time().'.'.$image->getClientOriginalExtension();
            $request->image->move('posts', $imagename);
            $data->image = $imagename;
        }

        $data->save();

        return redirect()->back()->with('message', 'Your post has been successfully updated!');
    }
}
