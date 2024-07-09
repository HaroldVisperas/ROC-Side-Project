<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ROCPH Digital Marketing Services</title>
    <link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="{{ asset('assets/css/landing.css') }}">
</head>

<body class="maxwidth">

    @if (auth()->user()->role == 'ceo')
        <script>window.location.href = "{{ route('company.dashboard.create') }}";</script>
    @elseif (auth()->user()->role == 'employee')
        <script>window.location.href = "{{ route('company.dashboard.create') }}";</script>
    @elseif (auth()->user()->role == 'administrator')
        <script>window.location.href = "{{ route('mockup.dashboard.create') }}";</script>
    @endif

    <!-- NavBar -->
    <nav class="navbar navbar-expand-lg blue borderbottom">
        <div class="container-fluid">
            <!-- offcanvas trigger -->
            <button class="navbar-toggler navbar-dark" type="button" data-bs-toggle="offcanvas"
                data-bs-target="#offcanvasExample" aria-controls="offcanvasExample">
                <span class="navbar-toggler-icon"></span>
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
                    <li class="nav-item dropdown d-flex align-items-center">
                        <div class="d-flex align-items-center my-2">
                            <div class="rounded-4 me-3" style="width: 50px; height: 50px; background-image: url('{{ asset('assets/images/icon.png') }}'); background-size: cover;">
                            </div>
                            <div>
                                <div class="text-white fs-2 fw-bold text-uppercase">{{ auth()->user()->firstname }} {{ auth()->user()->middlename }} {{ auth()->user()->lastname }}</div>
                                <div class="text-white fs-6 text-end neg10">Individual Account</div>
                            </div>
                        </div>
                        <a class="nav-link dropdown-toggle text-white ms-2" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <form id="profile-form" method="GET" action="{{ route('company.profile.create') }}">
                                @csrf
                                <li><a class="dropdown-item" href="#" onclick="event.preventDefault(); document.getElementById('profile-form').submit();">
                                    <i class="bi bi-gear fs-5 me-2"></i>My Profile</a></li>
                                <input type="hidden" name="user_timezone" value="{{ auth()->user()->timezone }}">
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
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- NavBar -->
    <div class="container-fluid p-0 maxwidth">
        <div class="row stripe borderbottom orange">i</div>
        <div class="row stripe borderbottom red">i</div>
        <div class="row stripe borderbottom green">i</div>
    </div>

    <!-- Company -->
    <div class="container-fluid">
        <div class="row">         
            <div class="col-md-8 profilecontext">
                <h2 class="row companyprofile">Create your <br> Company Profile</h2>
                <p class="row initialStep">Before you can begin the process, you will need to <br>
                    establish a company account with our platform. <br>
                    This initial step of setting up a business profile will <br>
                    allow you to access the necessary tools and <br>
                    features to proceed with the next stages.</p>
                <div>
                    <button class="row click_create_company">Create Company</button>
                </div>
            </div>
            <div class="col-md-4 officebuilding">
                <img src="{{ asset('assets/images/office-building.png') }}" alt="Office Building" class="img-fluid large-image">
            </div>
        </div>
    </div> 
    <!-- Company -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('assets/js/jquery-3.5.1.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/js/dataTables.bootstrap5.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.0.2/dist/chart.min.js"></script>
    <script src="{{ asset('assets/js/script.js') }}"></script>
</body>

</html>
