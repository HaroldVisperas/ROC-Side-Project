<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Brand Details</title>
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="{{ asset('assets/css/company-brand-create.css') }}">
</head>

<body class="maxwidth">
    <!-- NavBar -->
    <nav class="navbar navbar-expand-lg blue borderbottom {border-bottom: white 5px solid;}">
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
                            style="width: 50px; height: 50px; background-image: url('{{ asset('assets/images/icon.png') }}'); background-size: cover;">
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
                    <a class="nav-link dropdown-toggle text-white" href="#" role="button" data-bs-toggle="dropdown"
                        aria-expanded="True"></a>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <form id="profile-form" method="GET" action="{{ route('company.profile.create') }}">
                            @csrf
                            <li><a class="dropdown-item" href="#" onclick="event.preventDefault(); document.getElementById('profile-form').submit();">
                                <i class="bi bi-gear fs-5 me-2"></i>My Profile</a></li>
                            <input type="hidden" name="user_timezone" value="{{ auth()->user()->timezone }}">
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
    <!-- NavBar -->
    <div class="container-fluid p-0 maxwidth">
        <div class="row stripe borderbottom orange">i</div>
        <div class="row stripe borderbottom red">i</div>
        <div class="row stripe borderbottom green">i</div>
    </div>
    <!-- SideBar -->
    <div class="offcanvas offcanvas-start blue text-white sidebar-nav " tabindex="-1" id="offcanvasExample"
        aria-labelledby="offcanvasExampleLabel">
        <div class="offcanvas-body">
            <nav class="navbar-dark">
                <ul class="navbar-nav">
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
                </ul>
            </nav>
        </div>
    </div>
    <!-- SideBar -->

    <!-- Upload Image -->
    <main class="mt-5 pt-1 text-start tblack main">
        <div class="container form-container">
        <div class="bg-image">
            <div class="form-overlay">
            <h2 class="text-center mb-4 custom-heading">Brand Details</h2>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form method="POST" action="{{ route('company.brand.store') }}" >
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Brand Name*</label>
                        <input type="text" class="form-control custom-input" id="name" name="name" value="{{ old('name') }}" placeholder="Enter brand name" required>
                    </div>
                    <div class="mb-3">
                        <label for="color" class="form-label">Brand Color*</label>
                        <input type="text" class="form-control custom-input" id="color" name="color" value="{{ old('color') }}" placeholder="Enter brand color in hex (e.g., #008EC2)" required>
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Brand Description*</label>
                        <textarea class="form-control custom-input" id="description" name="description" rows="3" placeholder="Enter brand description" required>{{ old('description') }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label for="social_media_link" class="form-label">Social Media Link</label>
                        <input type="url" class="form-control custom-input" id="social_media_link" name="social_media_link" value="{{ old('social_media_link') }}" placeholder="Enter social media link">
                    </div>
                    <button type="submit" class="btn blue text-white custom-button">Create</button>
                </form>
            </div>  
        </div>
    </main>

    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery-3.5.1.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/js/dataTables.bootstrap5.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.0.2/dist/chart.min.js"></script>
</body>

</html>