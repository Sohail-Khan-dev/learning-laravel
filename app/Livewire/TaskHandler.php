<?php

namespace App\Livewire;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\Rule;
use App\Models\ezitask;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use TaskStatusEnum;

class TaskHandler extends Component
{
    use WithPagination;
#region for Properties to store recoreds in database
    #[Rule('required|min:3')]
    public $title;
    #[Rule('required|min:3')]
    public $description;
    #[Rule('required')]
    public $status = TaskStatusEnum::Todo->value;
    
#endregion
    // This is for the Editing the tasks.
    public $taskId;
    // isOpen is a variable which handle the modal opening and closing.
    public $isOpen = false;

    public function create(){
       
        $this->openModal();
    }
  
    public function openModal(){
        $this->isOpen = true;
        // This will reset the error text written below the textfields if any.
        $this->resetValidation();
    }
    public function closeModal(){
        $this->isOpen = false;
    }
    // public function mount(){
    //     $status = TaskStatusEnum::Todo->value;
    //     // dd($status);
    // }
    public function addTask(){
        $this->validate();
       $etask =eziTask::create([
            'Title' => $this->title,
            'Description' => $this->description,
            'Status'=>$this->status
        ]);
        session()->flash('success', 'Task created successfully.');
       

        
        // we can also use $this->reset() to reset all the public properties
        $this->closeModal();

        $this->dispatch('task-created', $etask);
//        dd("Event is dispatched");
        $this->resetExcept('isOpen','tasks');
    }

    public function deleteTask($id){
        eziTask::find($id)->delete();
      session()->flash('success', 'Task deleted successfully.');
      $this->reset();
    }
    public function deleteUser($id){
       $user =  User::find($id)->delete();
        // dd("user is deleted : ".$user); 
        session()->flash('success', 'User deleted successfully.');
    }
    public function editTask($id){
        // dd('edit is called');
        $task = eziTask::findOrFail($id);
        $this->taskId = $id;
        $this->title = $task->Title;
        $this->description = $task->Description;
        $this->status = $task->Status;
        $this->openModal();
    }
    public function updateTask()
    {
        $this->validate();
        if ($this->taskId) {
            $task = eziTask::findOrFail($this->taskId);
            $task->update([
                'Title' => $this->title,
                'Description' => $this->description,
                'Status' => $this->status
            ]);
            session()->flash('success', 'Task updated successfully.');
            $this->closeModal();
          $this->sendMail('sohailciit38@gmail.com');
            $this->reset();
        }
    }
    public function sendMail($email){
        $mailData['email'] = $email;
        $mailData['subject'] = 'Mail Check';

        Mail::send('email.email',$mailData,function($message) use($mailData){
            $message->to($mailData['email'])
            ->subject($mailData['subject']) ;
        });

        $this->dispatchBrowserEvent('sucssess',['message'=>'Mail Sent Successfully']);
        // dd($email);
    }

    public function render()
    {
        return view('livewire.task-handler', [
            'tasks' =>  eziTask::latest()->Paginate(10),
            'users' => User::all(),
            'khan' => auth()->user()
          ]);
    }
}
