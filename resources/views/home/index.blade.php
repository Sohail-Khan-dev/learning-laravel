<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/core@latest/dist/css/tabler.min.css">
    <script src="https://cdn.jsdelivr.net/npm/@tabler/core@latest/dist/js/tabler.min.js"></script>
    @vite('resources/css/app.css')
</head>
<body>
    <a href="/tasks"> Tasks</a>

<div class="flex flex-col md:flex-row items-center bg-slate-100 justify-around gap-2  ">
        <div class="">
            <livewire:recordshandler/>
        </div>
    <div>
    <div class ="lg:w-min-full md:min-w-min py-10 border-slate-600 px-10 border-x-2 border-y-2 m-3 w-auto h-auto">
                <div class="text-blue-400 font-semibold">
                    <div class="" >
                        <h1 class="bg-green text-yellow-300 text-2xl text-center ">Crud Operation with Laravel</h1>
                        @if(isset($message))
                            <a href="/"> All Record</a>
                        @else
                        <a href= '/createBlog'><h3 class="text-yellow-700 text-xl text-center underline hover:bg-blue-300 w-fit ml-36 py-2"> Create a blog</h3></a>

                        <form action="/search-blog" method="get" class="border shadow-md py-2 px-6 mx-3 flex items-center justify-center flex-col">
                            <label class="font-bold text-orange-500" for="searchName">Search by Name:</label>
                            <input class="border px-2 py-1" type="text" name="searchName" id="searchName">

                            <label class="font-bold text-orange-400 pt-2" for="searchEmail">Search by Email:</label>
                            <input class="border px-2 py-1 mt-1" type="text" name="searchEmail" id="searchEmail">

                            <button class="font-semibold text-white bg-blue-600 px-3 py-2 rounded hover:bg-blue-800 hover:text-yellow-300 mt-2" type="submit">Search</button>
                        </form>
                        @endif
                        <table class="table">
                            <thead class="sticky-top">
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Description</th>
                                <th> Actions </th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($blogs as $item)
                                <tr>
                                    <td> {{ $item->name }}</td>
                                    <td> {{ $item->email }}</td>
                                    <td> {{ str($item->desc)->limit(50) }} </td>
                                    <td> <a href='edit-blog-data/{{$item->id}}'> Edit </a> | <a href='delete-blog-data/{{$item->id}}'> Delete</a> </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
            </div>
        </div>
    </div>
</div>

<livewire:scripts />
</body>
</html>
