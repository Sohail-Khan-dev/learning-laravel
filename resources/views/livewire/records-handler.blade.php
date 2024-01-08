<div class ="lg:w-min-full md:min-w-min py-10 border-slate-600 px-10 border-x-2 border-y-2 m-3 ">
    <div class="">
        <div class="">
            <div class="bg-gray-100 ">
                <div>
                    <div class="items-center flex flex-col">
                    <h2 class="bg-yellow-200 text-green font-bold text-2xl text-center"> CRUD Operation with Livewire </h2>
                        <form wire:submit.prevent="@if($isEdit == "edit") updateBlog @else addBlog @endif" method="get">
                            <div class="p-3 border-x-2 border-y-2 font-semibold flex-row w-auto h-auto py-2">
                               <div class = "py-1 w-96">
                                    <label> Name :</label>  <input class="border ml-10" type="text" id="name" wire:model.debounce.500ms="name" >
                                    @error('name') <span class="text-danger">{{ $message }} </span> @enderror
                                </div>
                                <div class = "py-1 w-96">
                                <label for="email">Email : </label> <input class="border ml-11" wire:model.defer="email">
                                @if($errors->has('email'))
                                    <span>{{ $errors->first('email') }}</span>
                                @endif
                                </div>
                                <div class = "py-1 w-96 ">
                               <label for="description"> Description: </label> <input class="border ml-2" wire:model.defer="desc">
                                @error('desc') <span class="error"> There is an error in the description field </span> @enderror
                                </div>
                                <div class = "py-1 w-96 items-end ml-24 ">
                                @if($isEdit == "edit")
                                    <button class=" bg-blue-500 hover:bg-blue-700 hover:text-white px-3 font-semibold text-orange-200 rounded-md py-1 " type="submit" wire:click.prevent="updateBlog">Edit</button>
                                @else
                                    <button class=" bg-blue-500 hover:bg-blue-700 hover:text-white px-4 font-semibold  text-orange-200 rounded-md py-1" type="submit" wire:click.prevent="addBlog"> Add </button>
                                @endif
                                </div>
                            </div>
                        </form>
                        <div class="py-3 text-xl font-bold">
                           Search Record  <input class="border rounded-br-md text-center font-semibold" type="text" wire:model.live ="searchstr" placeholder="Search record" >
                            <!-- {{$searchstr}} -->
                        </div>
                        <table class="table table-responsive bg-white">
                            <thead class="sticky-top">
                            <tr>
                                <th scope="col"><span class="font-bold text-black text-sm "> Name </span></th>
                                <th scope="col"><span class="font-bold text-black text-sm "> Email</th>
                                <th scope="col"><span class="font-bold text-black text-sm "> Description</th>
                                <th scope="col w-1"><span class="font-bold text-black text-sm ">  Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($blogs as $blog)
                                <tr>
                                    <td class="text-primary">{{ str($blog->name)->limit(25)}}</td>
                                    <td class="text-secondary">{{$blog->email}}</td>
                                    <td class="text-secondary">{{ str($blog->desc)->limit(50) }}</td>
                                    <td> <button type="button" wire:click="editBlog({{$blog->id}})" class = "bg-blue-600 px-3 rounded py-[4px] font-semibold text-white hover:bg-blue-800 hover:text-yellow-300">Edit</button> </td>
                                    <td> <button type="button" wire:click="deleteBlog({{$blog->id}})" wire:confirm="Are you sure you want to delete this Record?" class=" font-semibold bg-red-500 px-2 rounded text-white hover:bg-orange-800 hover:text-green-900 py-[3px] ">Delete</button> </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
