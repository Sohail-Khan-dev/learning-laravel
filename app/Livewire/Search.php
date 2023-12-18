<?php

namespace App\Livewire;

use App\Http\Controllers\BlogController;
use App\Models\Blog;
use Livewire\Attributes\Rule;
use Livewire\Component;

class Search extends Component
{
    public $nametosearch = "";

    public $blogs = [];
    #[Rule('required', message: "This field is required. Please input data")]
    #[Rule('min:3', message: "Minimum 3 characters required")]
    public $blogname,$blogemail ,$blogdesc;

    public function deleteBlog(Blog $blog){
        $blog->delete();
        $this->blogs = Blog::all();
//        BlogController::deleteBlogWithLivewire($id);
    }
    public function editBlog($id){
//        dd("Edit of live wire is called ");
        BlogController::updateBlogWithLivewire($id,$this->blogname,$this->blogemail,$this->blogdesc);
    }

    public function add(){
        $this->validate();
        BlogController::addBlogWithLivewire($this->blogname,$this->blogemail,$this->blogdesc);
        $this->blogname = "";
        $this->blogemail = "";
        $this->blogdesc = "";
        $this->blogs = Blog::all();
    }
    public function updated(){
        $this->blogs = Blog::where('name', 'like', '%' . $this->nametosearch . '%')
        ->orWhere('email', 'like', '%' . $this->nametosearch . '%')
        ->orWhere('desc', 'like', '%' . $this->nametosearch . '%')->get();
    }
    public function mount(){
        $this->blogs = Blog::all();
    }
    public function render()
    {
        return view('livewire.search');
    }
}
