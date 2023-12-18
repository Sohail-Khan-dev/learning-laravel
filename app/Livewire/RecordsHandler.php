<?php

namespace App\Livewire;

use App\Http\Controllers\BlogController;
use App\Models\Blog;
use Livewire\Attributes\Rule;
use Livewire\Component;

class RecordsHandler extends Component
{
    public $blogs;
    public $searchstr = " ";
    #[Rule('required', message: 'Name has to be enter ')]
    public $name;
    #[Rule('required','unique:users,email', message: 'Enter valid and unique email')]
    public $email;
    #[Rule('required', message: 'Description should not be empty ')]
    public $desc;

    public $blogcurrent;
    public $isEdit ="";

    public function addBlog(){
        $this->validate();
       $this->blogs =BlogController::addBlogWithLivewire($this->name,$this->email,$this->desc);
        $this->resetExcept(['blogs','$blogcurrent']);

    }
    public function editBlog($id){
        $this->isEdit = "edit";
        $this->blogcurrent = Blog::find($id);
        $this->name = $this->blogcurrent->name;
        $this->email = $this->blogcurrent->email;
        $this->desc = $this->blogcurrent->desc;
    }
    public function deleteBlog($id){
        $this->blogs = Blog::find($id);
        $this->blogs->delete();
        $this->blogs = BlogController::getAllblogs();
    }
    public function updated(){
//        dd('update is called');
        $this->blogs = Blog::where('name','like','%'.$this->searchstr.'%')
            ->orWhere('desc','like','%'.$this->searchstr.'%')
            ->orWhere('email','like','%'.$this->searchstr.'%')
            ->get();
    }
    public function mount(){
        $this->blogs=BlogController::getAllblogs();
    }
    public function updateBlog(){
        $this->validate();
        $this->blogs = BlogController::updateBlogWithLivewire($this->blogcurrent->id,$this->name,$this->email,$this->desc);
        $this->resetExcept(['blogs']);
    }
    public function render()
    {
        return view('livewire.records-handler');
    }
}
