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
    <link rel="stylesheet" href="{{ asset('assets/css/company-employees.css') }}">
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
                    </ulx>
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
    <main class="mt-2 text-start tblack main" data-bs-spy="noscroll">
        <div class="container-fluid">
            <div class="row justify-content-center contents">
                <div class="col-lg-10 borderbottom2">
                    <h3 class="text-center tblack fw-bold">Employee List</h3>
                </div>
            </div>
        </div>

        <div class="container-fluid">
            <div class="row justify-content-center mt-4">
                <div class="col-lg-10 d-flex justify-content-end">
                    <form class="d-flex w-20" role="search">
                        <input class="form-control border border-2 me-2 search-input" type="search" placeholder="Search"
                            aria-label="Search">
                        <button class="btn green twhite me-2 btn-sm" type="submit">Search</button>
                        <button type="button" class="btn blue twhite invite-button btn-sm inviteEmployee"
                            data-bs-toggle="modal" data-bs-target="#inviteEmployeeModal">
                            Invite Employee
                        </button>
                    </form>
                </div>
            </div>
        </div>

        <div class="container-fluid">
            <div class="mt-4 row justify-content-center">
                <div class="col-lg-12">
                    <div class="table-responsive">
                        <table id="example" class="table table-striped table-bordered">
                            <thead>
                                <tr class="fs-6">
                                    <th class="employeeID">Employee ID</th>
                                    <th class="employeeName">Employee Name</th>
                                    <th class="position">Position</th>
                                    <th class="affiliation">Affiliation</th>
                                    <th class="actions">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($companyowners as $companyowner)
                                    <tr>
                                        <td>{{ $companyowner->employee_id }}</td>
                                        <td>{{ $companyowner->firstname }} {{ $companyowner->middlename }} {{ $companyowner->lastname }}</td>
                                        <td>Company Owner</td>
                                        <td>{{ $companyowner->affiliation }}</td>
                                        <td>
                                            <button type="button" class="btn green twhite btn-sm"
                                                onclick="makeEditable(this)">Edit</button>
                                            <button type="button" class="btn blue twhite btn-sm">Delete</button>
                                        </td>
                                    </tr>
                                @endforeach
                                @foreach($brandowners as $brandowner)
                                    <tr>
                                        <td>{{ $brandowner->employee_id }}</td>
                                        <td>{{ $brandowner->firstname }} {{ $brandowner->middlename }} {{ $brandowner->lastname }}</td>
                                        <td>Brand Owner</td>
                                        <td>{{ $brandowner->affiliation }}</td>
                                        <td>
                                            <button type="button" class="btn green twhite btn-sm"
                                                onclick="makeEditable(this)">Edit</button>
                                            <button type="button" class="btn blue twhite btn-sm">Delete</button>
                                        </td>
                                    </tr>
                                @endforeach
                                @foreach($members as $member)
                                    <tr>
                                        <td>{{ $member->employee_id }}</td>
                                        <td>{{ $member->firstname }} {{ $member->middlename }} {{ $member->lastname }}</td>
                                        <td>Member</td>
                                        <td>{{ $member->affiliation }}</td>
                                        <td>
                                            <button type="button" class="btn green twhite btn-sm"
                                                onclick="makeEditable(this)">Edit</button>
                                            <button type="button" class="btn blue twhite btn-sm">Delete</button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="inviteEmployeeModal" tabindex="-1" aria-labelledby="inviteEmployeeModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="inviteEmployeeModalLabel">Invite Company Employees</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form method="POST" action="{{ route('company.employee.invite.store') }}">
                            @csrf
                            <div class="mb-3">
                                <label for="email" class="form-label">Email Address:</label>
                                <input type="email" name="email" id="email" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label for="employee_id" class="form-label">Employee ID:</label>
                                <input type="number" name="employee_id" id="employee_id" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label for="role" class="form-label">Position:</label>
                                <select name="role" id="role" class="form-select" required>
                                    <option value="company_owner">Company Owner</option>
                                    <option value="brand_owner">Brand Owner</option>
                                    <option value="member">Member</option>
                                </select>
                            </div>
                            <input type="hidden" name="affiliation" value="Universal Studios">
                            <input type="hidden" name="user_email" value="{{ auth()->user()->email }}">
                            <div class="modal-footer">
                                <button type="button" class="btn text-white blue" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn text-white green">Invite</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </main>

    <script src="{{ asset('assets/js/editableEmployeeList.js') }}"></script>
    <script src="{{ asset('assets/js/contenteditable.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.0.2/dist/chart.min.js"></script>
    <script src="{{ asset('assets/js/jquery-3.5.1.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/js/dataTables.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('assets/js/script.js') }}"></script>
</body>

</html>