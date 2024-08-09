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
    <link rel="stylesheet" href="{{ asset('assets/css/brand-subscription.css') }}">
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

    <!-- Main Contents --- WAG PAPALITAAAAAN!! -->
    <!-- Main Contents -->
    <main class="mt-3 text-start tblack main" data-bs-spy="noscroll">
        <div class="container-fluid">
            <div class="row justify-content-center contents">
                <div class="container mt-3">
                    <div class="row justify-content-between align-items-center mb-2">
                        <div class="col text-center-custom">
                            <h1 class="text-uppercase fw-bold tblue">Services</h1>
                        </div>
                        <div class="col text-end">
                            <form method="GET" action="{{ route('brand.cart.create') }}">
                                @csrf
                                <button type="submit" class="btn btn-primary rounded-circle">
                                    <i class="bi bi-cart-fill"></i>
                                    <br>
                                    <i>Cart</i>
                                </button>
                            </form>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-lg-3 col-md-6 mb-4">
                            <div class="card h-100 text-center border-0 shadow tblue-outline">
                                <div class="card-body">
                                    <h3 class="card-title">FACEBOOK</h3>
                                    <ul class="list-unstyled">
                                        <li>Up to 4 Facebook Post with Cross Posting to Instagram per week via VA Lite</li>
                                        <li>Up to 15 Social Media posts per month with unlimited revisions</li>
                                        <li>3-5 Business Days Turnaround Time</li>
                                        <li>Unlimited 24/7 Project Manager</li>
                                        <li>8/5 Strategy Virtual Consultation</li>
                                        <li>8/5 Project Support via Email Ticket and Chat</li>
                                    </ul>
                                    <div class="row justify-content-center">
                                        @if(auth()->user()->role == 'company_owner')
                                            <form method="GET" action="{{ route('brand.subscription.payment.create') }}" class="col-3">
                                                @csrf
                                                <input type="hidden" name="package_name" value="Facebook Plan">
                                                <button type="submit" class="btn btn-success mt-2">Avail</button>
                                            </form>
                                        @endif
                                        <form method="POST" action="{{ route('brand.subscription.cart.store') }}" class="col-7">
                                            @csrf
                                            <input type="hidden" name="package_name" value="Facebook Plan">
                                            <button type="submit" class="btn btn-primary mt-2">Add to cart</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 mb-4">
                            <div class="card h-100 text-center border-0 shadow tblue-outline">
                                <div class="card-body">
                                    <h3 class="card-title">YOUTUBE</h3>
                                    <ul class="list-unstyled">
                                        <li>Up to 4 Youtube Post with Cross Posting to Instagram per week via VA Lite</li>
                                        <li>Up to 15 Social Media posts per month with unlimited revisions</li>
                                        <li>3-5 Business Days Turnaround Time</li>
                                        <li>Unlimited 24/7 Project Manager</li>
                                        <li>8/5 Strategy Virtual Consultation</li>
                                        <li>8/5 Project Support via Email Ticket and Chat</li>
                                    </ul>
                                    <div class="row justify-content-center">
                                        @if(auth()->user()->role == 'company_owner')
                                            <form method="GET" action="{{ route('brand.subscription.payment.create') }}" class="col-3">
                                                @csrf
                                                <input type="hidden" name="package_name" value="Youtube Plan">
                                                <button type="submit" class="btn btn-success mt-2">Avail</button>
                                            </form>
                                        @endif
                                        <form method="POST" action="{{ route('brand.subscription.cart.store') }}" class="col-7">
                                            @csrf
                                            <input type="hidden" name="package_name" value="Youtube Plan">
                                            <button type="submit" class="btn btn-primary mt-2">Add to cart</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 mb-4">
                            <div class="card h-100 text-center border-0 shadow tblue-outline">
                                <div class="card-body">
                                    <h3 class="card-title">X</h3>
                                    <ul class="list-unstyled">
                                        <li>Up to 4 X Post with Cross Posting to Instagram per week via VA Lite</li>
                                        <li>Up to 15 Social Media posts per month with unlimited revisions</li>
                                        <li>3-5 Business Days Turnaround Time</li>
                                        <li>Unlimited 24/7 Project Manager</li>
                                        <li>8/5 Strategy Virtual Consultation</li>
                                        <li>8/5 Project Support via Email Ticket and Chat</li>
                                    </ul>
                                    <div class="row justify-content-center">
                                        @if(auth()->user()->role == 'company_owner')
                                            <form method="GET" action="{{ route('brand.subscription.payment.create') }}" class="col-3">
                                                @csrf
                                                <input type="hidden" name="package_name" value="X Plan">
                                                <button type="submit" class="btn btn-success mt-2">Avail</button>
                                            </form>
                                        @endif
                                        <form method="POST" action="{{ route('brand.subscription.cart.store') }}" class="col-7">
                                            @csrf
                                            <input type="hidden" name="package_name" value="X Plan">
                                            <button type="submit" class="btn btn-primary mt-2">Add to cart</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 mb-4">
                            <div class="card h-100 text-center border-0 shadow tblue-outline">
                                <div class="card-body">
                                    <h3 class="card-title">TIKTOK</h3>
                                    <ul class="list-unstyled">
                                        <li>Up to 4 Tiktok Post with Cross Posting to Instagram per week via VA Lite</li>
                                        <li>Up to 15 Social Media posts per month with unlimited revisions</li>
                                        <li>3-5 Business Days Turnaround Time</li>
                                        <li>Unlimited 24/7 Project Manager</li>
                                        <li>8/5 Strategy Virtual Consultation</li>
                                        <li>8/5 Project Support via Email Ticket and Chat</li>
                                    </ul>
                                    <div class="row justify-content-center">
                                        @if(auth()->user()->role == 'company_owner')
                                            <form method="GET" action="{{ route('brand.subscription.payment.create') }}" class="col-3">
                                                @csrf
                                                <input type="hidden" name="package_name" value="Tiktok Plan">
                                                <button type="submit" class="btn btn-success mt-2">Avail</button>
                                            </form>
                                        @endif
                                        <form method="POST" action="{{ route('brand.subscription.cart.store') }}" class="col-7">
                                            @csrf
                                            <input type="hidden" name="package_name" value="Tiktok Plan">
                                            <button type="submit" class="btn btn-primary mt-2">Add to cart</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <!-- Main Contents -->

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="{{ asset('assets/js/contenteditable.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.0.2/dist/chart.min.js"></script>
    <script src="{{ asset('assets/js/jquery-3.5.1.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/js/dataTables.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('assets/js/script.js') }}"></script>
                
</body>

</html>