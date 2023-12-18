<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/core@latest/dist/css/tabler.min.css">
    <script src="https://cdn.jsdelivr.net/npm/@tabler/core@latest/dist/js/tabler.min.js"></script>
    <livewire:styles />
</head>
<body>
<div class="page">
    <!-- Sidebar -->
    <aside class="navbar navbar-vertical navbar-expand-sm navbar-dark">
        <div class="container-fluid">
            <h1 class="navbar-brand navbar-brand-autodark">
                <a href="records">
                    <img src="/images/accessible.png" width="80" height="80" alt="Tabler" class="navbar-brand-image">
                </a>
            </h1>
            <div class="collapse navbar-collapse" id="sidebar-menu">
{{--                <ul class="navbar-nav pt-lg-3">--}}
{{--                    <li class="nav-item">--}}
{{--                        <a class="nav-link" href="/">--}}
{{--                          <span class="nav-link-title">--}}
{{--                            Home--}}
{{--                          </span>--}}
{{--                        </a>--}}
{{--                    </li>--}}
{{--                    <li class="nav-item">--}}
{{--                        <a class="nav-link" href="#">--}}
{{--                          <span class="nav-link-title">--}}
{{--                            Link 1--}}
{{--                          </span>--}}
{{--                        </a>--}}
{{--                    </li>--}}
{{--                    <li class="nav-item">--}}
{{--                        <a class="nav-link" href="#">--}}
{{--              <span class="nav-link-title">--}}
{{--                Link 2--}}
{{--              </span>--}}
{{--                        </a>--}}
{{--                    </li>--}}
{{--                    <li class="nav-item">--}}
{{--                        <a class="nav-link" href="#">--}}
{{--              <span class="nav-link-title">--}}
{{--                Link 3--}}
{{--              </span>--}}
{{--                        </a>--}}
{{--                    </li>--}}
{{--                </ul>--}}
                    <h2 style="margin-left: 10px">Same Records Manged with 2 Different Ways</h2>
                <li style="margin-left: 10px; font-size: 25px"> <b><u>Livewire </u></b></li>
                <li style="margin-left: 10px; font-size:25px"> <b>Laravel</b> </li>
            </div>
        </div>
    </aside>
    <div class="page-wrapper">
        <div class="page-header d-print-none">
            <h2 class="page-title text-align-center" style="margin-left: 380px"> Livewire with Laravel </h2>
        </div>
    <livewire:recordshandler/>
    <div>
        <div class="page-body">
            <div class="container-xl">
                <div class="row row-cards">
                    <div class="card" style="width: fit-content">
                        <h1 style="text-align: center">Data From table Blog </h1>
                        @if(isset($message))
                            <a href="/"> All Record</a>
                        @else
                        <a href= '/createBlog'><h3 style="text-align: center"> Create a blog</h3></a>

                            <form action="/search-blog" method="get">
                            <label for="searchName">Search by Name:</label>
                            <input type="text" name="searchName" id="searchName">

                            <label for="searchEmail">Search by Email:</label>
                            <input type="text" name="searchEmail" id="searchEmail">

                            <button type="submit">Search</button>
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
    </div>
</div>

<livewire:scripts />
</body>
</html>
