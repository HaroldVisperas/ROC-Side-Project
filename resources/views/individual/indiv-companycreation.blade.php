<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Company Details</title>
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/intl-tel-input@23.1.0/build/css/intlTelInput.css">
    <script src="https://cdn.jsdelivr.net/npm/intl-tel-input@23.1.0/build/js/intlTelInput.min.js"></script>
    <link rel="stylesheet" href="{{ asset('assets/css/individual-company-create.css') }}">
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
                            style="width: 50px; height: 50px; background-image: url('{{ asset('assets/images/Default.png') }}'); background-size: cover;">
                        </div>
                            <div>
                                <div class="text-white fs-2 fw-bold text-uppercase">{{ auth()->user()->firstname }} {{ auth()->user()->middlename }} {{ auth()->user()->lastname }}</div>
                                <div class="text-white fs-6 text-end neg10">Individual Account</div>
                            </div>
                        </div>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="#">My Profile</a></li>
                        </ul>
                    </li>
                    <a class="nav-link dropdown-toggle text-white" href="#" role="button" data-bs-toggle="dropdown"
                        aria-expanded="True"></a>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <form id="profile-form" method="GET" action="{{ route('individual.profile.create') }}">
                            @csrf
                            <li><a class="dropdown-item" href="#" onclick="event.preventDefault(); document.getElementById('profile-form').submit();">
                                <i class="bi bi-person-check fs-5 me-2"></i>My Profile</a></li>
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
                    <li>
                        <form id="dashboard-link" method="GET" action="{{ route('individual.dashboard.create') }}">
                            @csrf
                            <a href="#" class="nav-link text-white text-start pt-3" onclick="event.preventDefault(); document.getElementById('dashboard-link').submit();">
                                <i class="bi bi-microsoft fs-5 me-2"></i>
                                <span class="text-uppercase fw-bold fs-5">Dashboard</span>
                            </a>
                        </form>
                        <form id="brand-create-link" method="GET" action="{{ route('individual.company.create') }}">
                            @csrf
                            <a href="#" class="nav-link text-white text-start pt-3" onclick="event.preventDefault(); document.getElementById('brand-create-link').submit();">
                                <i class="bi bi-building-fill-add fs-5 me-2"></i>
                                <span class="text-uppercase fw-bold fs-5">Create Brand</span>
                            </a>
                        </form>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
    <!-- SideBar -->

    <!-- Create Company Form -->
    <main class="mt-5 pt-1 text-start tblack main">
        <div class="container form-container">
        <div class="bg-image">
            <div class="form-overlay">
                <h2 class="text-center mb-4">Company Details</h2>
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                <form method="POST" action="{{ route('individual.company.store') }}">
                    @csrf
                    <!-- Company Name -->
                    <div class="mb-3">
                        <label for="companyName" class="form-label">Company Name</label>
                        <input type="text" class="form-control custom-input" id="companyName" name="company_name" placeholder="Enter company name" required>
                    </div>
                    <!-- Address Line 1 and Address Line 2 -->
                    <div class="row mb-3">
                        <div class="col">
                            <label for="addressLine1" class="form-label">Address Line 1</label>
                            <input type="text" class="form-control custom-input" id="addressLine1" name="address_line_1" placeholder="Enter address line 1" required>
                        </div>
                        <div class="col">
                            <label for="addressLine2" class="form-label">Address Line 2</label>
                            <input type="text" class="form-control custom-input" id="addressLine2" name="address_line_2" placeholder="Enter address line 2">
                        </div>
                    </div>
                    <!-- City and State -->
                    <div class="row mb-3">
                        <div class="col">
                            <label for="city" class="form-label">City</label>
                            <input type="text" class="form-control custom-input" id="city" name="city" placeholder="Enter city" required>
                        </div>
                        <div class="col">
                            <label for="state" class="form-label">State/Province</label>
                            <input type="text" class="form-control custom-input" id="state" name="state" placeholder="Enter state/province" required>
                        </div>
                    </div>
                    <!-- Country, Mobile Number, and Zip Code -->
                    <div class="row mb-3">
                        <div class="col">
                            <label for="country" class="form-label">Country</label>
                            <input type="text" class="form-control custom-input" id="country" name="country" placeholder="Enter country" required>
                        </div>
                        <div class="col">
                            <label for="mobileNumber" class="form-label">Mobile Number</label>
                            <br>
                            <input type="tel" class="form-control custom-input phone-number" id="mobileNumber" name="mobile_number" placeholder="Enter mobile number" required>
                        </div>
                        <div class="col">
                            <label for="zipCode" class="form-label">Zip Code</label>
                            <input type="text" class="form-control custom-input" id="zipCode" name="zip_code" placeholder="Enter zip code" required>
                        </div>
                    </div>
                    <!-- Hidden User ID Field -->
                    <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                    <!-- Submit Button -->
                    <button type="submit" class="btn blue text-white custom-button">Create</button>
                </form>
            </div>
        </div>
    </main>

    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.0.2/dist/chart.min.js"></script>
    <script src="{{ asset('assets/js/jquery-3.5.1.js') }}"></script> 
    <script src="{{ asset('assets/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/js/dataTables.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('assets/js/script.js') }}"></script>
    <script src="{{ asset('assets/js/companycreationnumber.js') }}"></script>

</body>
</html>
