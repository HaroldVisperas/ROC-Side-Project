<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ROCPH Digital Marketing Services</title>
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="{{ asset('assets/css/company-announcement.css') }}">
</head>

<body>

    <!-- Start of NavBar -->
    <nav class="navbar navbar-expand-lg blue borderbottom {border-bottom: white 5px solid;}">
        <div class="container-fluid">

            <!-- Start of offcanvas trigger -->
            <button class="navbar-toggler navbar-dark" type="button" data-bs-toggle="offcanvas"
                data-bs-target="#offcanvasExample" aria-controls="offcanvasExample">
                <span class="navbar-toggler-icon" data-bs-target="#offcanvasExample"></span>
            </button>
            <!-- End of offcanvas trigger -->

            <a class="navbar-brand" href="#">
                <img src="{{ asset('assets/images/logo.png') }}" class="logo" alt="ROCPH">
            </a>
            <button class="navbar-toggler navbar-dark" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item dropdown ">
                        <div class="d-flex align-items-center my-2">
                            <div class="rounded-4 me-3"
                                style="width: 50px; height: 50px; background-image: url('{{ asset('assets/images/icon.png') }}'); background-size: cover;">
                            </div>
                            <div>
                                <div class="text-white fs-2 fw-bold text-uppercase">{{ auth()->user()->firstname }} {{ auth()->user()->middlename }} {{ auth()->user()->lastname }}</div>
                                <div class="text-white fs-6 text-end neg10">
                                <div class="text-white fs-6 text-end neg10">
                                    @if (auth()->user()->role == 'ceo')
                                        CEO Account
                                    @elseif (auth()->user()->role == 'administrator')
                                        Administrator Account
                                    @endif
                                </div>
                            </div>
                        </div>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="#">My Profile</a></li>
                        </ul>
                    </li>
                    <a class="nav-link dropdown-toggle text-white" href="#" role="button" data-bs-toggle="dropdown"
                        aria-expanded="True"></a>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <form id="profile-form" method="GET" action="{{ route('company.profile.create') }}">
                            @csrf
                            <li><a class="dropdown-item" href="#" onclick="event.preventDefault(); document.getElementById('profile-form').submit();">
                                <i class="bi bi-gear fs-5 me-2"></i>My Profile</a></li>
                        </form>
                        <form id="task-form" method="GET" action="{{ route('brand.tasks.create') }}">
                            @csrf
                            <li><a class="dropdown-item" href="#" onclick="event.preventDefault(); document.getElementById('task-form').submit();">
                                <i class="bi bi-gear fs-5 me-2"></i>Tasks</a></li>
                        </form>
                        <form id="mockup-form" method="GET" action="{{ route('mockup.dashboard.create') }}">
                            @csrf
                            <li><a class="dropdown-item" href="#" onclick="event.preventDefault(); document.getElementById('mockup-form').submit();">
                                <i class="bi bi-gear fs-5 me-2"></i>Mock Up</a></li>
                        </form>
                        <form id="logout-form" method="POST" action="{{ route('logout') }}">
                            @csrf
                            <li><a class="dropdown-item" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <i class="bi bi-gear fs-5 me-2"></i>Logout</a></li>
                        </form>
                    </ul>
                </ul>
            </div>
        </div>
    </nav>
    <!-- End of NavBar -->

    <!-- Start of Stripes -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 stripe borderbottom orange"></div>
            <div class="col-12 stripe borderbottom red"></div>
            <div class="col-12 stripe borderbottom green"></div>
        </div>
    </div>
    <!-- End of Stripes -->


    <!-- Start of SideBar -->
    <div class="offcanvas offcanvas-start blue text-white sidebar-nav " tabindex="-1" id="offcanvasExample"
        aria-labelledby="offcanvasExampleLabel">
        <div class="offcanvas-body">
            <nav class="navbar-dark">
                <ul class="navbar-nav">
                    <li>
                        <form id="dashboard-link" method="GET" action="{{ route('company.dashboard.create') }}">
                            @csrf
                            <a href="#" class="nav-link text-white text-start pt-3" onclick="event.preventDefault(); document.getElementById('dashboard-link').submit();">
                                <i class="bi bi-microsoft fs-5 me-2"></i>
                                <span class="text-uppercase fw-bold fs-5">Dashboard</span>
                            </a>
                        </form>
                        <a href="Sample.html" class="nav-link text-white text-start pt-3">
                            <span><i class="bi bi-person-plus-fill fs-5 me-2"></i></span>
                            <span class="text-uppercase fw-bold fs-5">Create Brands</span>
                        </a>
                        <a class="nav-link pt-3 sidebar-link text-start" data-bs-toggle="collapse"
                            href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                            <span><i class="bi bi-bag-heart-fill fs-5 me-2"></i></span>
                            <span class="text-uppercase fw-bold fs-5">Brand</span>
                            <span><i class="bi bi-chevron-down"></i></span>
                        </a>
                        <div class="collapse" id="collapseExample">
                            <div>
                                <ul class="navbar-nav ps-3">
                                    <li><a href="Sample.html" class="nav-link text-white text-start pt-3">
                                            <span><i class="bi bi-ticket-detailed fs-5 me-2"></i></span>
                                            <span class="text-uppercase fw-bold fs-5">Tickets</span>
                                        </a></li>
                                    <li><a href="Sample.html" class="nav-link text-white text-start pt-3">
                                            <span><i class="bi bi-cart4 fs-5 me-2"></i></span>
                                            <span class="text-uppercase fw-bold fs-5">Services</span>
                                        </a></li>
                                </ul>
                            </div>
                        </div>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
    <!-- End of SideBar -->

    <!-- Start of Main -->
    <main class="mt-3 tblack main" data-bs-spy="noscroll">
        <div class="container-fluid neg20">
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <form id="return-form" method="GET" action="{{ route('company.dashboard.create') }}">
                        @csrf
                        <a class="nav-link tblue text-end pt-3" href="#" onclick="event.preventDefault(); document.getElementById('return-form').submit();">
                            <span class="text-uppercase fw-bold fs-5">X</span>
                        </a>
                    </form>
                </div>
                <div class="col-lg-12">
                    <h2 class="text-center tblue fw-bold">Announcement</h2>
                </div>
                <div class="col-lg-10">
                    <h6 class="text-start borderbottom2 tblack fw-normal">Recent Feeds</h6>
                </div>
            </div>
            @foreach($announcements as $announcement)
                <div class="row justify-content-center mt-3">
                    <div class="col-9">
                        <div class="row">
                            <div class="col-sm-5 m-1">
                                <div class="fs-5 fw-bold tblack">{{ $announcement->title }}</div>
                                <div class="fw-normal announcementName-2">{{ $announcement->updated_at->format('F j, Y') }} | 
                                    <span style="color:green">{{ $announcement->updated_at->format('g:i A') }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center mt-3">
                    <div class="col-10">
                        <div class="row">
                            <div class="fw-normal announcementParagraph lh-sm">
                                <p>{{ $announcement->content }}</p>
                                <br>
                                <p>For more information, click <a href="{{ Str::startsWith($announcement->link_url, ['http://', 'https://']) ? 
                                    $announcement->link_url : 'http://' . $announcement->link_url }}" target="_blank">{{ $announcement->link_text }}</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </main>

    <!-- End of Main -->


    <!-- Scripts -->
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.0.2/dist/chart.min.js"></script>
    <script src="{{ asset('assets/js/jquery-3.5.1.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/js/dataTables.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('assets/js/script.js') }}"></script>
</body>

</html>