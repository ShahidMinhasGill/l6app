<?php

namespace App\Http\Controllers;
use App\Http\Requests\StoreBlogPost;
use App\Post;
use App\Category;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class PostController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         // $categories = User::with('children')->get();
        $posts = Post::with(['categories','user'])->get();
    
       return view('dashboard.posts.index',compact('posts'));
        // $users = \App\User::with(['roles','profile']);

        // return view('dashboard.users.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('dashboard.posts.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
 
        
      // $roleuser = User::create(['name' => 'Sample user']);

        $filename = sprintf('thumbnail_%s.jpg',random_int(1, 1000));

        if ($request->hasFile('thumbnail'))
        $filename = $request->file('thumbnail')->storeAs('posts', $filename ,'public');

        else 
            $filename = "posts/dummy.jpg";
                   $post = [
        'title' => $request->title,
        'content'   => $request->content,
        'user_id'   => 1,
        'slug'   => $request->title,
        'thumbnail'   => $filename,
        ];
        
        $post = Post::create($post);
        if ($post) {
              
           $post->categories()->attach($request->categories);
           
           return redirect()->route('posts.index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::with(['categories','user'])->where('id',$id)->first();
       return view('dashboard.posts.show',compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::with(['categories','user'])->where('id',$id)->first();
        $categories = Category::all();

        return view('dashboard.posts.edit',compact('post','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
         $post = Post::find($id);

         $post->title = $request->title;
         $post->slug = $request->slug;

         $post->content = $request->content;
            
        $filename = sprintf('thumbnail_%s.jpg',random_int(1, 1000));

        if ($request->hasFile('thumbnail'))
        $filename = $request->file('thumbnail')->storeAs('posts', $filename ,'public');

        else 
            $filename = $post->thumbnail;
          
        if ($post->save()) {
           $post->categories()->sync($request->categories);
           
           return redirect()->route('posts.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        $post->categories()->detach();
        $post->delete();
        return redirect()->route('posts.index');
    }
}
