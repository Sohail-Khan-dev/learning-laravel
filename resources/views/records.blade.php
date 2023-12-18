<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/core@latest/dist/css/tabler.min.css">
    <script src="https://cdn.jsdelivr.net/npm/@tabler/core@latest/dist/js/tabler.min.js"></script>
</head>
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
                <ul class="navbar-nav pt-lg-3">
                    <li class="nav-item">
                        <a class="nav-link" href="/">
                          <span class="nav-link-title">
                            Home
                          </span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                          <span class="nav-link-title">
                            Link 1
                          </span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
              <span class="nav-link-title">
                Link 2
              </span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
              <span class="nav-link-title">
                Link 3
              </span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </aside>
    <div class="page-wrapper">
        <div class="page-header d-print-none">
            <div class="container-xl">
                <div class="row g-2 align-items-center">
                    <div class="col">
                        <h2 class="page-title">
                            Vertical layout
                        </h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="page-body">
            <div class="container-xl">
                <div class="row row-deck row-cards">
                    <div style="width: fit-content">
                        <div class="card">
                            <table class="table table-responsive">
                                <thead class="sticky-top">
                                <tr>
                                    <th scope="col">Name</th>
                                    <th scope="col">Title</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Role</th>
                                    <th scope="col w-1"></th>
                                </tr>
                                </thead>
                                <tbody>
                                @for($i = 0; $i < 10; $i++)
                                    <tr>
                                        <td>Paweł Kuna {{$i}}</td>
                                        <td class="text-secondary">UI Designer, Training</td>
                                        <td class="text-secondary"><a href="#" class="text-reset">This is dummy test This is dummy test This is dummy test </a></td>
                                        <td class="text-secondary">
                                            User
                                        </td>
                                        <td>
                                            <a href="#">Edit</a>
                                        </td>
                                    </tr>
                                @endfor
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
