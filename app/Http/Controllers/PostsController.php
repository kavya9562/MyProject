<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
class PostsController extends Controller
{
   public function index(){
    $post=Post::find(3);
     // return $post;
     $post=Post::where('id','41')->get();
     //return $post[0]->title;
    // $posts=Post::withTrashed()->limit(10)->latest()->get();
     $posts=Post::withTrashed()->latest()->paginate(6);
     //session()->put('user_name','Kavya');
    // session()->put('user_id','45');
   // session()->flash('date',date('d-M-Y'));
   //session()->forget('user_id');
     //return $posts;
    return view('post.create',compact('posts'));
   }
   public function add(){
      return view('post.add');
   }
   public function save(){//(Request $request){
      $title=request('title');
      $description=request('description');
      $author=request('author');
      // $validatedData = $request->validate([
      //    'images' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',

      //   ]);

      //   $name = $request->file('images')->getClientOriginalName();

      //   $path = $request->file('images')->store('public/images');

      // Post::create([
      //    'title'=>$title,
      //    'description'=>$description,
      //    'author'=>$author,
      //    'images' =>$path,


      // ]);
   //    Post::firstOrCreate([
   //       'title'=>request('title')
   //    ], ['description'=>$description,
   //       'author'=>$author,
   //       //'images' =>$path,
   // ]);
      //return view('post.save');
      Post::updateOrCreate([
         'title'=>request('title')
      ], ['description'=>$description,
         'author'=>$author,
         //'images' =>$path,
   ]);
      return view('post.save');
   }
   public function edit($id){
    /// return session()->get('user_name');
    // return session()->get('user_id');
      $post=Post::find(decrypt($id));
      return view('post.edit',compact('post'));
   }
   public function update(){
     $id=decrypt(request('id'));
     $post=Post::find($id);
     $post->update([
      'title'=>request('title'),
      'description'=>request('description'),
      'author'=>request('author'),
      'image'=>request('image')

     ]);
     //OR ANOTHER METHOD TO UPDATE//
      //   public function update(){
      //   $id=decrypt(request('id'));
      //   Post::find($id)->update([
      //   'title'=>request('title'),
      //   'description'=>request('description'),
      //   'author'=>request('author'),
      //   'image'=>request('image')

   //    ]);
     return redirect()->route('post.create')->with('message','Post Updated Successfully !!');
}
public function delete($id){
   $post=Post::find(decrypt(request('id')));
   //$post=Post::truncate();//To empty the table//
   //$post=Post::where('status',0)->delete();//To delete all posts where status=0;//
  // $post=Post::destroy(decrypt(request('id')));//Same as delete query//
   $post->delete();
   return redirect()->route('post.create')->with('message','Post Deleted Successfully !!');
}
public function activate($id){
   $post=Post::withTrashed()->find(decrypt(request('id')));
   $post->restore();
   return redirect()->route('post.create')->with('message','Post Activated Successfully !!');
}
public function forceDelete($id){
   $post=Post::find(decrypt(request('id')));
   $post->forceDelete();
   return redirect()->route('post.create')->with('message','Post Force deleted Successfully !!');
}
public function myPosts(){
   //$post=Post::find(3);
    //$posts=Post::withTrashed()->find(5)->paginate(2);
    $posts=Post::where('author',auth()->user()->name)->get()->take(5);
    //var_dump($posts);exit;
   return view('post.my_posts',compact('posts'));
  }

}
