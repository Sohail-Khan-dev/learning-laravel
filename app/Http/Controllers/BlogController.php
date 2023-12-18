<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    //
    public function index(){
//        echo 'here ';
        $name = 'Sohail Khan';
        $num = 32;
        return view('blogs',compact('name','num'));
//        return "I am in Blog Controller ";
    }
    public function layout(){
        return view('layout.masterLayout');
    }

    public function createBlog(){
        return view('blogs.createBlog');
    }
    public function addNewBlog(Request $request){
        Blog::create([
                'name' => $request->name,
                'desc' => $request->desc,
                'email' => $request->email
            ]);
            return redirect()->back()->with('message', 'Your Blog has been added ');
    }
    public function editBlog($id){
        $blog = Blog::find($id);
      return view('blogs.editBlog',compact('blog'));
    }
    public function updateBlog($id,Request $request){
        Blog::where('id','=',$id)->update([
            'name' => $request->name,
            'desc' => $request->desc,
            'email' => $request->email
        ]);
        return redirect('/'
        )->with('message', 'Your Blog has been Edited ');
    }
    public function deleteBlog($id){
        Blog::where('id','=',$id)->delete();
        return redirect()->back()->with('message','Your blog Has SuccessFully Deleted ');
    }
    public function searchBlog(Request $request)
    {
        $searchName = $request->input('searchName');
        $searchEmail = $request->input('searchEmail');

        $results = Blog::where('name', 'like', '%' . $searchName . '%')
            ->where('email', 'like', '%' . $searchEmail . '%')
            ->get();
        // Pass the search results to your view
        return view('home.index', ['blogs' => $results])->with('message', 'Show all Results Button');
    }
    // Below is code for Live wire components :
    public static function updateBlogWithLivewire($id,$name,$email,$desc){
        Blog::where('id','=',$id)->update([
            'name' => $name,
            'desc' => $desc,
            'email' => $email
        ]);
        return Blog::all();
    }
    public static function getAllblogs(){
        return  Blog::all();
    }
    public static function addBlogWithLivewire($name,$email,$desc){
        Blog::create([
            'name' => $name,
            'desc' => $desc,
            'email' => $email
        ]);
        return Blog::all();
    }

}
