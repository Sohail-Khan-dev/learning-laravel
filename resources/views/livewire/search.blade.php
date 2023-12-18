<div>
    <div class="table-responsive">
        <h4>Store Data to DB with Livewire and show it without reloading the page </h4>
        <form wire:submit="add" method="POST">
            @csrf
            <label for="name">Name</label>
            <input type="text" wire:model="blogname">
            @error('blogname') <em>{{$message}}</em> @enderror </br>
            <label for="Email">Email</label>
            <input type="text" wire:model="blogemail">
            @error('blogemail') <em>{{$message}}</em> @enderror</br>
            <label for="desc">Description</label>
            <input type="text" wire:model="blogdesc">
            @error('blogdesc') <em>{{$message}}</em> @enderror</br>
            <button type="Button" wire:click="add">Add</button>
        </form>
        <h1>Data From table Blog by Livewire </h1>
        <label for="search">Search</label>
        <input type="text" wire:model.live="nametosearch">
        <table class="table">
            <thead class="sticky-top">
            <tr>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Description</th>
                <th scope="col">Action</th>
            </tr>
            </thead>
            <tbody>
                @foreach($blogs as $blog)
                    <tr wire:key="{{$blog->id}}">
                        <th scope="row">{{$blog->name}}</th>
                        <td>{{$blog->email}}</td>
                        <td>{{str($blog->desc)->limit(20)}} </td>
                        <td><button type="button" wire:click="editBlog({{$blog->id}})" > Edit </button> |
                            <button type="button" wire:click="deleteBlog({{$blog->id}})" wire:confirm="Are you sure to delete" > Delete </button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
</div>
