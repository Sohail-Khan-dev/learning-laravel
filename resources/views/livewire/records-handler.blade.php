<div>
    <div class="page-body">
        <div class="container-xl">

            <div class="row row-deck row-cards">
                <div style="width: fit-content">
                    <div class="card">
                        <form wire:submit.prevent="@if($isEdit == "edit") updateBlog @else addBlog @endif" method="get">
                            <div class="form-group mt-3 mb-3">
                                Name: <input type="text" id="name" wire:model.debounce.500ms="name" value="name">
                                @error('name') <span class="text-danger">{{ $message }} </span> @enderror
                                Email: <input wire:model.defer="email">
                                @if($errors->has('email'))
                                    <span>{{ $errors->first('email') }}</span>
                                @endif
                                Description: <input wire:model.defer="desc">
                                @error('desc') <span class="error"> There is an error in the description field </span> @enderror
                                @if($isEdit == "edit")
                                    <button type="submit" wire:click.prevent="updateBlog">Edit</button>
                                @else
                                    <button type="submit" wire:click.prevent="addBlog"> Add </button>
                                @endif
                            </div>
                        </form>
                        <div class="card-header">
                           Search Record  <input type="text" wire:model.live="searchstr" placeholder="Search record" style="margin-left: 30px;">
                            {{$searchstr}}
                        </div>
                        <table class="table table-responsive">
                            <thead class="sticky-top">
                            <tr>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Description</th>
                                <th scope="col w-1"> Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($blogs as $blog)
                                <tr>
                                    <td class="text-primary">{{ str($blog->name)->limit(25)}}</td>
                                    <td class="text-secondary">{{$blog->email}}</td>
                                    <td class="text-secondary">{{ str($blog->desc)->limit(50) }}</td>
                                    <td> <button type="button" wire:click="editBlog({{$blog->id}})">Edit</button> </td>
                                    <td> <button type="button" wire:click="deleteBlog({{$blog->id}})" wire:confirm="Are you sure you want to delete this Record?" class="btn btn-danger btn-sm">Delete</button> </td>
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
