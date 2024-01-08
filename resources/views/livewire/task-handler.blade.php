<div class="py-5">
    <section class="flex justify-end items-center w-full">
            @if (session()->has('success'))
            <div x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 4000)"
                class="flex flex-col sm:flex-row sm:items-center bg-gray-200 dark:bg-green-700 shadow rounded-md py-3 px-4">
                <div class="flex flex-row items-center border-b sm:border-b-0 w-full sm:w-auto pb-4 sm:pb-0">
                    <div class="text-green-500" dark:text-gray-500>
                        <svg class="w-6 sm:w-5 h-6 sm:h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    </div>
                    <div class="text-sm font-medium ml-3">Success!.</div>
                </div>
                <div class="text-sm tracking-wide text-gray-500 dark:text-white mt-4 sm:mt-0 sm:ml-4"> {{ session('success') }}</div>
            </div>
        @endif
    </section>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6 py-7 bg-gray-200 rounded-lg">
        <div class="p-4 sm:p-8  shadow sm:rounded-lg">
            @auth
           <span class="font-semibold "> Hello  </span>
            <span class="font-bold text-xl text-white bg-orange-500 rounded-md px-3" > {{$khan->name }}   </span>  
           <span class="font-semibold px-1"> you are now acting as  </span> 
            <span class="font-bold text-yellow-300 bg-green-600 py-1 px-2 rounded-md">  {{$khan->role}} </span>
            @endauth
            <!-- This is Button for Task adding -->
            <div class="max-w-xl">
                <div class="my-4">
                    <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" wire:click ="create">Add Task</button>
                    <!-- <button wire:click = "created" class="bg-yellow-400 px-6 py-2 font-semibold text-gray-500 hover:bg-yellow-600 rounded-xl hover:text-gray-100"> Test </button> -->
                </div>

                <!-- Below is the modal -->
                @if($isOpen)
                <div class="fixed inset-0 flex items-center justify-center z-50">
                        <!-- below div to show bg darker  -->
                    <div class="absolute inset-0 bg-black opacity-50"></div>
                    <!-- this is the modal  -->
                    <div class="relative bg-gray-200 p-8 rounded shadow-lg w-1/2   xl:w-1/3">
                        <!-- Modal content goes here -->
                        <h2 class="text-2xl font-bold mb-4">{{ $taskId ? 'Edit Task' : 'Create Task' }}</h2>
                        <form wire:submit.prevent="{{ $taskId ? 'updateTask' : 'addTask' }}">
                            <div class="mb-4">
                                <label for="title" class="block text-gray-700 font-bold mb-2">Title:</label>
                                <input type="text" wire:model="title" id="title" class="w-full border border-gray-300 px-4 py-2 rounded">
                                <span class="text-red-500">@error('title') {{ $message }} @enderror</span>
                            </div>
                            <div class="mb-4">
                                <label for="description" class="block text-gray-700 font-bold mb-2">Description:</label>
                                <textarea wire:model="description" id="description" rows="4" class="w-full border border-gray-300 px-4 py-2 rounded"></textarea>
                                <span class="text-red-500">@error('description') {{ $message }} @enderror</span>
                            </div>
                            <div class="mb-4">
                                <label for="status" class="block text-gray-700 font-bold mb-2">status:</label>
                                <select wire:model.live="status">
                                    <option value="{{TaskStatusEnum::Todo->value}}">{{TaskStatusEnum::Todo->value}}</option>
                                    <option value="{{TaskStatusEnum::InProgress->value}}">{{TaskStatusEnum::InProgress->value}}</option>
                                    <option value="{{TaskStatusEnum::Testing->value}}">{{TaskStatusEnum::Testing->value}}</option>
                                    <option value="{{TaskStatusEnum::Completed->value}}">{{TaskStatusEnum::Completed->value}}</option>
                                </select>
                                <label>  status is {{$status}}  </label>
                                <!-- <input type="text" wire:model="status" id="status" class="w-full border border-gray-300 px-4 py-2 rounded"> -->
                                <span class="text-red-500">@error('status') {{ $message }} @enderror</span>
                            </div>
                            <div class="flex justify-end">
                                <button type="submit" class="bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded mr-2" wire:click="{{ $taskId ? 'updateTask' : 'addTask' }}">{{ $taskId ? 'Update' : 'Create' }}</button>
                                <button type="button" class="bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded" wire:click="closeModal">Cancel</button>
                            </div>
                        </form>

                    </div>
                </div>
                @endif
            </div>
            <div class="">
                @if(count($tasks) == 0)
                    <p>No Task found</p>
                @else
                   <table class="w-full text-lg text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                Title
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Description
                            </th>
                            <th scope="col" class="px-6 py-3">
                                    Status
                            </th>
                            <th scope="col" class="px-6 py-3 w-18">
                                Action
                            </th>
                        </tr>
                    </thead>
                        @foreach ($tasks as $task)
                        <tbody wire:key="{{ $task->id }}">
                            <tbody wire:key="{{ $task->id }}">
                                <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        {{$task->Title}}
                                    </th>
                                    <td class="px-6 py-4">
                                        {{$task->Description}}
                                    </td>
                                    <td class="px-6 py-4">
                                    
                                        @if($task->Status == TaskStatusEnum::Completed->value)
                                            <span class="bg-green-600 text-yellow-300 font-semibold text-sm py-2 px-3.5 rounded-xl">{{$task->Status}}</span>
                                        @elseif($task->Status == TaskStatusEnum::Todo->value)
                                            <span class="bg-yellow-300 text-green-800 font-semibold py-2 px-7 text-sm rounded-xl ">{{$task->Status}}</span>
                                        @elseif($task->Status == TaskStatusEnum::InProgress->value)
                                            <span class="bg-blue-400 text-white font-semibold py-2 px-3 text-sm rounded-xl ">{{$task->Status}}</span>
                                        @elseif($task->Status == TaskStatusEnum::Testing->value)
                                            <span class="bg-red-400 text-gray-900 font-semibold py-2 px-4 text-sm rounded-xl ">{{$task->Status}}</span>
                                        @else
                                            {{$task->Status}}
                                        @endif
                                    
                                    </td>
                                    <td class="px-6 py-4 flex gap-1 w-24 ">
                                        <button class="" wire:click="editTask({{ $task->id }})">
                                            <img class="w-12 bg-slate-200 rounded p-1" src="images/edit.png" alt="edit" srcset="Edit recored">
                                        </button>

                                        <button class="" onclick="return confirm('Are you sure you want to delete this item?') " wire:click="deleteTask({{ $task->id }})">
                                             <img src="images/del.png" alt="Del" class="w-12 bg-red-200 rounded p-1">
                                        </button>
                                    </td>
                                </tr>

                            </tbody>
                        @endforeach
                    @endif
                </table>
                    <div> {!!  $tasks->links('pagination.customePagination') !!} </div>
            </div>
        </div>
    </div>
    <div class="">
                @if(count($users) == 0)
                    <p>No Task found</p>
                @else
                   <table class="w-full text-lg text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                Name
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Email
                            </th>
                            <th scope="col" class="px-6 py-3">
                                    role
                            </th>
                            <th scope="col" class="px-6 py-3 w-18">
                                Action
                            </th>
                        </tr>
                    </thead>
                        @foreach ($users as $user)
                        <tbody wire:key="{{ $user->id }}">
                                <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        {{$user->name}}
                                    </th>
                                    <td class="px-6 py-4">
                                        {{$user->email}}
                                    </td>
                                    <td class="px-6 py-4">
                                    
                                        @if($user->role == 'admin')
                                            <span class="bg-green-600 text-yellow-300 font-semibold text-sm py-2 px-3.5 rounded-xl">{{$user->role}}</span>
                                        @elseif($user->role == 'manager')
                                            <span class="bg-yellow-300 text-green-800 font-semibold py-2 px-7 text-sm rounded-xl ">{{$user->role}}</span>
                                        @elseif($user->role == 'user')
                                            <span class="bg-blue-400 text-white font-semibold py-2 px-3 text-sm rounded-xl ">{{$user->role}}</span>
                                        @else
                                            {{$user->role}}
                                        @endif
                                    </td>
                                    <td class="px-6 py-4 flex gap-1 w-24 ">
                                        <button class="" wire:click="editUser({{ $user->id }})">
                                            <img class="w-12 bg-slate-200 rounded p-1" src="images/edit.png" alt="edit" srcset="Edit recored">
                                        </button>

                                        <button class="" onclick="return confirm('Are you sure you want to delete this item?') " wire:click="deleteUser({{ $user->id }})">
                                             <img src="images/del.png" alt="Del" class="w-12 bg-red-200 rounded p-1">
                                        </button>
                                    </td>
                                </tr>

                            </tbody>
                        @endforeach
                    @endif
                </table>
             </div>
</div>

