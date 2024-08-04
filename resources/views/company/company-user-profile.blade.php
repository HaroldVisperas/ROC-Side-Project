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
    <link rel="stylesheet" href="{{ asset('assets/css/company-profile.css') }}">
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
                        aria-expanded="true"></a>
                    <ul class="dropdown-menu dropdown-menu-end custom-dropdown-menu">
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
    <main class="mt-3 text-start tblack main" data-bs-spy="noscroll">
        <div class="container-fluid">
            <div class="row justify-content-center contents">
                <div class="col-md-12">
                    <div class="text-center mainProfileImage">
                        <div class="d-flex justify-content-center mb-2">
                            <img id="selectedAvatar" src="{{ asset('assets/images/Default.png') }}" class="rounded-circle"
                                style="width: 200px; height: 200px;" alt="example placeholder" />
                        </div>
                    </div>
                    <div class="text-center mt-1">
                        <div class="row justify-content-center">
                            <div class="col-auto blue profileName">
                                <h1 class="text-uppercase fw-bold twhite mt-2">{{ auth()->user()->firstname }} {{ auth()->user()->middlename }} {{ auth()->user()->lastname }}</h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <main class="mt-3 text-start tblack main" data-bs-spy="noscroll">
        <div class="container-fluid">
            <div class="row justify-content-center userInfo">
                <div class="col-xl-5 m-2 tblue basicInfo">
                    <h3 class="tblue fw-bold">Basic Information</h3>
                    <div class="col">
                        <div class="table-responsive">
                            <table class="table mt-3 biTable">
                                <tbody>
                                    <tr>
                                        <td class="text-start nowrap">First Name</td>
                                        <td id="firstname" name="firstname" class="text-end">{{ auth()->user()->firstname }}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-start">Middle Name</td>
                                        <td id="middlename" name="middlename" class="text-end">{{ auth()->user()->middlename }}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-start">Last Name</td>
                                        <td id="lastname" name="lastname" class="text-end">{{ auth()->user()->lastname }}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-start nowrap">Contact Number</td>
                                        <td id="phone_num" name="phone_num" class="text-end">{{ auth()->user()->phone_num }}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-start">Gender</td>
                                        <td id="gender" name="gender" class="text-end">{{ auth()->user()->gender }}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-start nowrap">Change Password</td>
                                        <td id="password" class="text-end">*********************</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="col-xl-5 m-2 contactInfo">
                    <h3 class="tblue fw-bold">Employee Information</h3>
                    <div class="col tblue">
                        <div class="table-responsive">
                            <table class="table mt-3 ciTable">
                                <tbody>
                                    <tr>
                                        <td class="text-start">Personal Email</td>
                                        <td id="email" name="email" class="text-end">{{ $employeeInfo->email }}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-start">Employee ID</td>
                                        <td id="employee_id" name="employee_id" class="text-end">{{ $employeeInfo->employee_id }}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-start">Position</td>
                                        <td id="role" name="role" class="text-end">
                                            @if ($employeeInfo->role == 'company_owner')
                                                Company Owner
                                            @elseif ($employeeInfo->role == 'brand_owner')
                                                Brand Owner
                                            @elseif ($employeeInfo->role == 'member')
                                                Member
                                            @elseif ($employeeInfo->role == 'roc_administrator')
                                                ROC Administrator
                                            @elseif ($employeeInfo->role == 'individual_client')
                                                Individual Client
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-start">Affiliation</td>
                                        <td id="affiliation" name="affiliation" class="text-end">{{ $employeeInfo->affiliation }}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-start">TimeZone</td>
                                        <td id="timezone" name="timezone" class="text-end">{{ auth()->user()->timezone }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <form method="GET" action="{{ route('company.profile.edit') }}">
            <div class="container-fluid">
                <div class="row justify-content-center userInfo">
                    <div class="col-10 text-end">
                        <button type="submit" class="col-xl-2 nowrap btn green twhite">Edit Profile</button>
                    </div>
                </div>
            </div>
        </form>
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