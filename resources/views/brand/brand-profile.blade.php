<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile Page</title>
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="{{ asset('assets/css/brand-profile.css') }}">
</head>

<body>
    <!-- NavBar -->
    <nav class="navbar navbar-expand-lg lightblue borderbottom fixed-top {border-bottom: white 5px solid;}">
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
                                    @elseif (auth()->user()->role == 'member')
                                        Member Account
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
                        <form id="profile-form" method="GET" action="{{ route('brand.user.profile.create') }}">
                            @csrf
                            <li><a class="dropdown-item" href="#" onclick="event.preventDefault(); document.getElementById('profile-form').submit();">
                                <i class="bi bi-person-check fs-5 me-2"></i>My Profile</a></li>
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
                        <form id="dashboard-link" method="GET" action="{{ route('brand.dashboard.create') }}">
                            @csrf
                            <a href="#" class="nav-link text-white text-start pt-3" onclick="event.preventDefault(); document.getElementById('dashboard-link').submit();">
                                <i class="bi bi-microsoft fs-5 me-2"></i>
                                <span class="text-uppercase fw-bold fs-5">Dashboard</span>
                            </a>
                        </form>
                        <form id="brand-profile-link" method="GET" action="{{ route('brand.profile.create') }}">
                            @csrf
                            <a href="#" class="nav-link text-white text-start pt-3" onclick="event.preventDefault(); document.getElementById('brand-profile-link').submit();">
                                <i class="bi bi-bag-heart-fill fs-5 me-2"></i>
                                <span class="text-uppercase fw-bold fs-5">Brand Profile</span>
                            </a>
                        </form>
                        <form id="assets-link" method="GET" action="{{ route('brand.assets.create') }}">
                            @csrf
                            <a href="#" class="nav-link text-white text-start pt-3" onclick="event.preventDefault(); document.getElementById('assets-link').submit();">
                                <i class="bi bi-image fs-5 me-2"></i>
                                <span class="text-uppercase fw-bold fs-5">Assets</span>
                            </a>
                        </form>
                        <form id="project-link" method="GET" action="{{ route('brand.tasks.create') }}">
                            @csrf
                            <a href="#" class="nav-link text-white text-start pt-3" onclick="event.preventDefault(); document.getElementById('project-link').submit();">
                                <i class="bi bi-kanban fs-5 me-2"></i>
                                <span class="text-uppercase fw-bold fs-5">Project</span>
                            </a>
                        </form>
                        <form id="tickets-link" method="GET" action="{{ route('brand.tickets.create') }}">
                            @csrf
                            <a href="#" class="nav-link text-white text-start pt-3" onclick="event.preventDefault(); document.getElementById('tickets-link').submit();">
                                <i class="bi bi-ticket-detailed fs-5 me-2"></i>
                                <span class="text-uppercase fw-bold fs-5">Tickets</span>
                            </a>
                        </form>
                        <form id="employees-link" method="GET" action="{{ route('brand.employees.create') }}">
                            @csrf
                            <a href="#" class="nav-link text-white text-start pt-3" onclick="event.preventDefault(); document.getElementById('employees-link').submit();">
                                <i class="bi bi-person-heart fs-5 me-2"></i>
                                <span class="text-uppercase fw-bold fs-5">Employees</span>
                            </a>
                        </form>
                        <a class="nav-link pt-3 sidebar-link text-start" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                            <span><i class="bi bi-house-gear-fill fs-5 me-2"></i></span>
                            <span class="text-uppercase fw-bold fs-5">Services</span>
                            <span><i class="bi bi-chevron-down"></i></span>
                        </a>
                        <div class="collapse" id="collapseExample">
                            <div>
                                <ul class="navbar-nav ps-3">
                                    <li>
                                        <form id="subscription-link" method="GET" action="{{ route('brand.subscription.create') }}">
                                            @csrf
                                            <a href="#" class="nav-link text-white text-start pt-1" onclick="event.preventDefault(); document.getElementById('subscription-link').submit();">
                                                <i class="bi bi-box-fill fs-5 me-2"></i>
                                                <span class="text-uppercase fw-bold fs-6">Subscription</span>
                                            </a>
                                        </form>
                                    </li>
                                    <li>
                                        <form id="cart-link" method="GET" action="{{ route('brand.cart.create') }}">
                                            @csrf
                                            <a href="#" class="nav-link text-white text-start pt-1" onclick="event.preventDefault(); document.getElementById('cart-link').submit();">
                                                <i class="bi bi-cart-plus-fill fs-5 me-2"></i>
                                                <span class="text-uppercase fw-bold fs-6">Cart</span>
                                            </a>
                                        </form>
                                    </li>
                                    <li>
                                        <form id="proof-of-payment-link" method="GET" action="{{ route('brand.proofofpayment.create') }}">
                                            @csrf
                                            <a href="#" class="nav-link text-white text-start pt-1" onclick="event.preventDefault(); document.getElementById('proof-of-payment-link').submit();">
                                                <i class="bi bi-receipt-cutoff fs-5 me-2"></i>
                                                <span class="text-uppercase fw-bold fs-6">Proof of Payment</span>
                                            </a>
                                        </form>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        @if(auth()->user()->role != 'member')
                            <form id="company-dashboard-link" method="GET" action="{{ route('company.dashboard.create') }}">
                                @csrf
                                <a href="#" class="nav-link text-white text-start pt-3" onclick="event.preventDefault(); document.getElementById('company-dashboard-link').submit();">
                                    <i class="bi bi-building-fill-add fs-5 me-2"></i>
                                    <span class="text-uppercase fw-bold fs-5">Return to Company</span>
                                </a>
                            </form>
                        @endif
                    </li>
                </ul>
            </nav>
        </div>
    </div>
    <!-- SideBar -->


    <!-- Dashboard -->
    <main class="mt-3 text-start tblack main" data-bs-spy="noscroll">
        <div class="container-fluid">
            <div class="row justify-content-center contents">
                <div class="col-md-12">
                    <div class="text-center mainProfileImage">
                        <div class="d-flex justify-content-center mb-2">
                            <img id="selectedAvatar" src="{{ asset($brand->logo) }}" class="rounded-circle"
                                style="width: 200px; height: 200px;" alt="Brand Image" />
                        </div>
                    </div>
                    <div class="text-center mt-1">
                        <div class="row justify-content-center">
                            <div class="col-auto blue profileName">
                                <h1 class="text-uppercase fw-bold twhite mt-2">{{ $brand->name }}</h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <main class="mt-3 main" data-bs-spy="noscroll">
        <div class="container-fluid">
            <div class="row justify-content-center ">
                <div class="col-xl-5 orange m-2 twhite brandInformationBox">
                    <h3 class="twhite borderbottom2 fw-bold mt-3">Brand Information</h3>
                    <div class="col-12">
                        <div class="row justify-content-center">
                            <div class="col-11">
                                <p class="text-start">Parent Company</p>
                            </div>
                            <div class="col-11 white brandInformationBox1">
                                <p class="text-start tblack brandInformationP1 mt-2">{{ $company }}</p>
                            </div>
                            <div class="col-11">
                                <p class="text-start">Brand Name</p>
                            </div>
                            <div class="col-11 white brandInformationBox2">
                                <p class="text-start tblack brandInformationP1 mt-2">{{ $brand->name }}</p>
                            </div>
                            <div class="col-11">
                                <p class="text-start mt-1">Social Media Links:</p>
                            </div>
                            @if($socmeds)
                                @if($facebook)
                                    <div class="row justify-content-center">
                                        <div class="col-3">
                                            <p class="text-start">Facebook</p>
                                        </div>
                                        <div class="col-8 white brandInformationBox3">
                                            <a href="{{ $brand->facebook_link }}" target="_blank" style="text-decoration: none;">
                                                <p class="text-start tblack brandInformationP3 mt-2">{{ $brand->facebook_link }}</p>
                                            </a>
                                        </div>
                                    </div>
                                @endif
                                @if($x)
                                    <div class="row justify-content-center">
                                        <div class="col-3">
                                            <p class="text-start">X</p>
                                        </div>
                                        <div class="col-8 white brandInformationBox3">
                                            <a href="{{ $brand->x_link }}" target="_blank" style="text-decoration: none;">
                                                <p class="text-start tblack brandInformationP3 mt-2">{{ $brand->x_link }}</p>
                                            </a>
                                        </div>
                                    </div>
                                @endif
                                @if($linkedin)
                                    <div class="row justify-content-center">
                                        <div class="col-3">
                                            <p class="text-start">LinkedIn</p>
                                        </div>
                                        <div class="col-8 white brandInformationBox3">
                                            <a href="{{ $brand->linkedin_link }}" target="_blank" style="text-decoration: none;">
                                                <p class="text-start tblack brandInformationP3 mt-2">{{ $brand->linkedin_link }}</p>
                                            </a>
                                        </div>
                                    </div>
                                @endif
                                @if($instagram)
                                    <div class="row justify-content-center">
                                        <div class="col-3">
                                            <p class="text-start">Instagram</p>
                                        </div>
                                        <div class="col-8 white brandInformationBox3">
                                            <a href="{{ $brand->instagram_link }}" target="_blank" style="text-decoration: none;">
                                                <p class="text-start tblack brandInformationP3 mt-2">{{ $brand->instagram_link }}</p>
                                            </a>
                                        </div>
                                    </div>
                                @endif
                                @if($youtube)
                                    <div class="row justify-content-center">
                                        <div class="col-3">
                                            <p class="text-start">Youtube</p>
                                        </div>
                                        <div class="col-8 white brandInformationBox3">
                                            <a href="{{ $brand->youtube_link }}" target="_blank" style="text-decoration: none;">
                                                <p class="text-start tblack brandInformationP3 mt-2">{{ $brand->youtube_link }}</p>
                                            </a>
                                        </div>
                                    </div>
                                @endif
                                @if($tiktok)
                                    <div class="row justify-content-center">
                                        <div class="col-3">
                                            <p class="text-start">Tiktok</p>
                                        </div>
                                        <div class="col-8 white brandInformationBox3">
                                            <a href="{{ $brand->tiktok_link }}" target="_blank" style="text-decoration: none;">
                                                <p class="text-start tblack brandInformationP3 mt-2">{{ $brand->tiktok_link }}</p>
                                            </a>
                                        </div>
                                    </div>
                                @endif
                            @else
                                <div class="col-11 white brandInformationBox3">
                                    <p class="text-start tblack mt-2">"No Social Media Link"</p>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-xl-5 m-2 green twhite brandDescriptionBox">
                    <h3 class="twhite borderbottom2 fw-bold mt-3">Brand Description</h3>
                    <div class="col-12">
                        <div class="row justify-content-center">
                            <div class="col-11">
                                <p class="text-start">Brand Description</p>
                            </div>
                            <div class="col-11 white brandDescriptionBox1">
                                <p class="text-start tblack brandInformationP1 mt-2">{{ $brand->description }}</p>
                            </div>
                        </div>
                        <div class="row justify-content-center">
                            <div class="col-4">
                                <form method="GET" action="{{ route('brand.profile.edit') }}">
                                    @csrf
                                    <button type="submit" class="btn white tgreen mt-2">Edit Profile</button>
                                </form>
                            </div>
                        </div>
                    </div>
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