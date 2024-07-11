<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BrandList Page</title>
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="{{ asset('assets/css/company-brand-list.css') }}">
</head>

<body>
    <!-- NavBar -->
    <nav class="navbar navbar-expand-lg blue borderbottom fixed-top {border-bottom: white 5px solid;}">
        <div class="container-fluid">
            <!-- offcanvas trigger -->
            <button class="navbar-toggler navbar-dark" type="button" data-bs-toggle="offcanvas"
                data-bs-target="#offcanvasExample" aria-controls="offcanvasExample">
                <span class="navbar-toggler-icon" data-bs-target="#offcanvasExample"></span>
            </button>
            <!-- offcanvas trigger -->
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
                                style="width: 50px; height: 50px; background-image: url('{{ asset('assets/images/Default.png') }}'); background-size: cover;">
                            </div>
                            <div>
                                <div class="text-white fs-2 fw-bold text-uppercase">{{ auth()->user()->firstname }} {{ auth()->user()->middlename }} {{ auth()->user()->lastname }}</div>
                                <div class="text-white fs-6 text-end neg10">
                                    @if (auth()->user()->role == 'company_owner')
                                        Company Owner Account
                                    @elseif (auth()->user()->role == 'brand_owner')
                                        Brand Owner Account
                                    @endif
                                </div>
                            </div>
                        </div>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="#">My Profile</a></li>
                        </ul>
                    </li>
                    <a class="navbarName dropdown-toggle text-white" href="#" role="button" data-bs-toggle="dropdown"
                        aria-expanded="True"></a>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <form id="profile-form" method="GET" action="{{ route('company.profile.create') }}">
                            @csrf
                            <li><a class="dropdown-item" href="#" onclick="event.preventDefault(); document.getElementById('profile-form').submit();">
                                <i class="bi bi-person-check fs-5 me-2"></i>My Profile</a></li>
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
                                <i class="bi bi-box-arrow-right fs-5 me-2"></i>Logout</a></li>
                        </form>
                    </ul>
                </ul>
            </div>
        </div>
    </nav>
    <!-- NavBar -->
    <div class="container-fluid">
        <div class="row stripes">
            <div class="col-12 stripe borderbottom orange"></div>
            <div class="col-12 stripe borderbottom red"></div>
            <div class="col-12 stripe borderbottom green"></div>
        </div>
    </div>
    <!-- SideBar -->
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
                        <form id="brand-create-link" method="GET" action="{{ route('company.brand.create') }}">
                            @csrf
                            <a href="#" class="nav-link text-white text-start pt-3" onclick="event.preventDefault(); document.getElementById('brand-create-link').submit();">
                                <i class="bi bi-building-fill-add fs-5 me-2"></i>
                                <span class="text-uppercase fw-bold fs-5">Create Brand</span>
                            </a>
                        </form>
                        <form id="brands-link" method="GET" action="{{ route('company.brands.create') }}">
                            @csrf
                            <a href="#" class="nav-link text-white text-start pt-3" onclick="event.preventDefault(); document.getElementById('brands-link').submit();">
                                <i class="bi bi-bag-heart-fill fs-5 me-2"></i>
                                <span class="text-uppercase fw-bold fs-5">Brands</span>
                            </a>
                        </form>
                        <form id="employees-link" method="GET" action="{{ route('company.employee.create') }}">
                            @csrf
                            <input type="hidden" name="email" value="{{ auth()->user()->email }}">
                            <a href="#" class="nav-link text-white text-start pt-3" onclick="event.preventDefault(); document.getElementById('employees-link').submit();">
                                <i class="bi bi-person-hearts fs-5 me-2"></i>
                                <span class="text-uppercase fw-bold fs-5">Employees</span>
                            </a>
                        </form>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
    <!-- SideBar -->


    <!-- Dashboard -->
    <main class="mt-3 tblack main">
        <div class="container-fluid">
            <div class="row justify-content-center contents">
                <div class="col-lg-11 text-center ">
                    <h3 class="tblue fw-bold fs-3 me-2 p-2 borderbottom2">List of Brands</h3>
                </div>
            </div>
        </div>

        <div class="container-fluid">
            <div class="row">
                <!-- foreach -->
                <div class="col-md-3 pt-3">
                    <form id="brand-dashboard-link" method="GET" action="{{ route('brand.dashboard.create') }}">
                        @csrf
                        <a href="#" class="card-link" onclick="event.preventDefault(); document.getElementById('brand-dashboard-link').submit();">
                            <div class="card custom-card text-center">
                                <div class="card-body p-0">
                                    <div class="card-image">
                                        <img src="{{ asset('assets/images/Gardenia.png') }}" class="img-fluid" alt="Gardenia Logo">
                                    </div>
                                    <div class="card-footer blue text-white">
                                        GARDENIA
                                    </div>
                                </div>
                            </div>
                        </a>
                    </form>
                </div>
                <!-- foreach -->
                <div class="col-md-3 pt-3">
                    <form id="brand-dashboard-link" method="GET" action="{{ route('brand.dashboard.create') }}">
                        @csrf
                        <a href="#" class="card-link" onclick="event.preventDefault(); document.getElementById('brand-dashboard-link').submit();">
                            <div class="card custom-card text-center">
                                <div class="card-body p-0">
                                    <div class="card-image">
                                        <img src="{{ asset('assets/images/Gardenia.png') }}" class="img-fluid" alt="Gardenia Logo">
                                    </div>
                                    <div class="card-footer blue text-white">
                                        GARDENIA
                                    </div>
                                </div>
                            </div>
                        </a>
                    </form>
                </div>
                <div class="col-md-3 pt-3">
                    <a href="Sample.html" class="card-link">
                        <div class="card custom-card text-center">
                            <div class="card-body p-0">
                                <div class="card-image">
                                    <img src="{{ asset('assets/images/Gardenia.png') }}" class="img-fluid" alt="Gardenia Logo">
                                </div>
                                <div class="card-footer blue text-white">
                                    GARDENIA
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-3 pt-3">
                    <a href="Sample.html" class="card-link">
                        <div class="card custom-card text-center">
                            <div class="card-body p-0">
                                <div class="card-image">
                                    <img src="{{ asset('assets/images/Gardenia.png') }}" class="img-fluid" alt="Gardenia Logo">
                                </div>
                                <div class="card-footer blue text-white">
                                    GARDENIA
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-3 pt-3">
                    <a href="Sample.html" class="card-link">
                        <div class="card custom-card text-center">
                            <div class="card-body p-0">
                                <div class="card-image">
                                    <img src="{{ asset('assets/images/Gardenia.png') }}" class="img-fluid" alt="Gardenia Logo">
                                </div>
                                <div class="card-footer blue text-white">
                                    GARDENIA
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </main>

    <script src="{{ asset('assets/js/contenteditable.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.0.2/dist/chart.min.js"></script>
    <script src="{{ asset('assets/js/jquery-3.5.1.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/js/dataTables.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('assets/js/script.js') }}"></script>
</body>

</html>