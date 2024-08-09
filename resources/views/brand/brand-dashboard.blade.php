<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Brand Account</title>
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="{{ asset('assets/css/brand-dashboard.css') }}">
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


    <!-- Dashboard -->
    <main class="mt-2 text-start tblack main" data-bs-spy="noscroll">
        <div class="container-fluid">
            <div class="row justify-content-center contents">
                @if($latestAnnouncements->isNotEmpty())
                    @foreach($latestAnnouncements as $latestAnnouncement)
                        <div class="m-2 col-lg-6 fw-bold announcementCol">
                            <h1 class="text-center mt-4 fw-bold tgray">Announcement</h1>
                            <div class="row justify-content-center">
                                <div class="col-md-10">
                                    <div class="row mt-3 justify-content-center">
                                        <div class="col-sm-auto me-4">
                                            <div class="fs-5 fw-bold text-start tblack">{{ $latestAnnouncement->title }}</div>
                                        </div>
                                        <div class="col-sm-auto text-end mt-2">
                                            <div class="fw-normal announcementName-2">{{ $latestAnnouncement->updated_at->setTimezone(auth()->user()->timezone)->format('F j, Y') }} | 
                                                <span style="color:green">{{ $latestAnnouncement->updated_at->setTimezone(auth()->user()->timezone)->format('g:i A') }}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-3 justify-content-center">
                                <div class="col-md-10">
                                    <div class="fw-normal announcementP lh-sm fw-lighter">
                                        <form id="announcement-form" method="GET" action="{{ route('brand.announcements.create') }}">
                                            @csrf
                                            <p>{{ substr($latestAnnouncement->content, 0, 600) }}
                                                <a href="#" style="color:green; text-decoration: none;" onclick="event.preventDefault(); document.getElementById('announcement-form').submit();">
                                                    Read More...
                                                </a>
                                            </p>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="m-2 col-lg-6 fw-bold announcementCol">
                        <h1 class="text-center mt-4 fw-bold tgray">Announcement</h1>
                        <div class="col-5 gray recentTaskBox1 p-3">
                            <h4 class="text-white fw-bold text-center">
                                <span class="tblack">No Announcement</span>
                            </h4>
                        </div>
                    </div>
                @endif
                <div class="m-2 col-lg-5 blue currentSubCol text-white">
                    <div class="row">
                        <div class="col">
                            <h4 class="text-center twhite">Recent Subscription</h4>
                        </div>
                    </div>
                    @if($recentsubscriptions)
                        <div class="row">
                            <div class="col text-center availedSubsTop">
                                <div class=" fw-bold text-uppercase">
                                    <h1>{{ $recentsubscriptions->package_name }}</h1>
                                </div>
                                <div class="fw-normal tblack availedSubsTop-2">Availed Subscription</div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col text-center availedSubsBot mt-3">
                                <div class="fw-bold">
                                    <h3 style="color:rgb(22, 14, 101)">{{ $recentsubscriptions->brand }}</h3>
                                </div>
                                <div class="fw-normal tblack availedSubsBot-2 ">Brand Name</div>
                            </div>
                        </div>
                        <div class="row justify-content-center text-center mt-3 subsDate">
                            <div class="col-4 text-center subsDateTop">
                                <div class="fw-bold">
                                    <h6>{{ date('M d, Y', strtotime($recentsubscriptions->created_at)) }}</h6>
                                </div>
                                <div class="fw-normal tblack subsDateTop-2 ">Start Date</div>
                            </div>
                            <div class="col-4 text-center subsDateBot">
                                <div class="fw-bold">
                                    <h6>{{ date('M d, Y', strtotime($recentsubscriptions->created_at . ' + ' . $recentsubscriptions->duration . ' months')) }}</h6>
                                </div>
                                <div class="fw-normal tblack subsDateBot-2">Billing Date</div>
                            </div>
                        </div>
                    @else
                        <div class="row mt-3 justify-content-center">
                            <div class="col-9 gray recentTaskBox1 p-3">
                                <h4 class="text-white fw-bold text-center">
                                    <span class="tblack">No Subscription Made</span>
                                </h4>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </main>

    <main class="mt-1 text-start tblack main" data-bs-spy="noscroll">
        <div class="container-fluid">
            <div class="row justify-content-center mt-2">
                <div class="col-md-11 recentTasks">
                    <div class="row">
                        <div class="col d-flex justify-content-center align-items-center">
                            <h3 class="text-center fw-bold tgray mt-3">Recent Tasks</h3>
                            <form method="GET" action="{{ route('brand.tasks.create') }}">
                                @csrf
                                <button type="submit" class="btn ms-3" style="background-color: #84c148; color: white; border: solid 2px black;">View All</button>
                            </form>
                        </div>
                    </div>
                    <div class="row justify-content-center actSubsTop">
                        @if($recenttasks->isNotEmpty())
                            @foreach($recenttasks as $recenttask)
                                <div class="m-3 col-sm-5 actSubBox1 blue">
                                    <div class="fw-bold text-uppercase">
                                        <h3 class="text-white text-center"><span class="tblack">{{ $recenttask->title }}</span></h3>
                                    </div>
                                    <div class="fw-normal recentTaskP tblack text-center">Status:
                                        @if($recenttask->status == 'todo')
                                            <span class="text-uppercase" style="color: #534B4B; font-weight: 800">{{ $recenttask->status }}</span>
                                        @elseif($recenttask->status == 'working')
                                            <span class="text-uppercase" style="color: #F38C1E; font-weight: 800">{{ $recenttask->status }}</span>
                                        @elseif($recenttask->status == 'approval')
                                            <span class="text-uppercase" style="color: #D23426; font-weight: 800">{{ $recenttask->status }}</span>
                                        @elseif($recenttask->status == 'done')
                                            <span class="text-uppercase" style="color: #84C148; font-weight: 800">{{ $recenttask->status }}</span>
                                        @endif
                                    </div>
                                    <div class="fw-normal actSubsP tblack text-center">Company Name: 
                                        <span style="color:white; font-weight: 800">{{ $recenttask->company }}</span>
                                    </div>
                                    <div class="fw-normal actSubsP tblack text-center">Brand Name: 
                                        <span style="color:white; font-weight: 800">{{ $recenttask->brand }}</span>
                                    </div>
                                    <div class="fw-normal actSubsP tblack text-center">Ticket No.: 
                                        <span style="color:white; font-weight: 800">{{ $recenttask->id }}</span>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <div class="col-5 gray recentTaskBox1 p-3">
                                <div>
                                    <h4 class="text-white fw-bold text-center">
                                        <span class="tblack">No Recent Task</span>
                                    </h4>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
    </main>

    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.0.2/dist/chart.min.js"></script>
    <script src="{{ asset('assets/js/jquery-3.5.1.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/js/dataTables.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('assets/js/script.js') }}"></script>
</body>

</html>