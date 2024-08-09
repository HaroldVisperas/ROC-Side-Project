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
    <link rel="stylesheet" href="{{ asset('assets/css/brand-employees.css') }}">
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
                <div class="col-lg-10 borderbottom2">
                    <h3 class="text-center tblack fw-bold">Employee List</h3>
                </div>
            </div>
        </div>

        <div class="container-fluid">
            <div class="row justify-content-center mt-4">
                <div class="col-lg-10 d-flex justify-content-end">
                    <form method="GET" action="{{ route('brand.employees.search') }}" class="d-flex w-20">
                        <input class="form-control border border-2 me-2 search-input" type="text" placeholder="Search Employee" name="search">
                        <button class="btn orange twhite me-2 btn-sm" type="submit">Search</button>
                        <button type="button" class="btn blue twhite me-2 invite-button btn-sm inviteEmployee"
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
                                        <form method="POST" action="{{ route('brand.employees.update') }}">
                                            @csrf
                                            <input type="hidden" name="email" value="{{ $companyowner->email }}">
                                            <td>
                                                <span id="td-id-display-{{ $companyowner->email }}">{{ $companyowner->employee_id }}</span>
                                            </td>
                                            <td id="td-name-display-{{ $companyowner->email }}">{{ $companyowner->firstname }} {{ $companyowner->middlename }} {{ $companyowner->lastname }}</td>
                                            <td>
                                                <span id="td-role-display-{{ $companyowner->email }}">Company Owner</span>
                                            </td>
                                            <td>
                                                <span id="td-affiliation-secondary-display-{{ $companyowner->email }}">{{ $companyowner->affiliation_secondary }}</span>
                                            </td>
                                            <td>
                                            </td>
                                        </form>
                                    </tr>
                                @endforeach
                                @foreach($brandowners as $brandowner)
                                    <tr>
                                        <form method="POST" action="{{ route('brand.employees.update') }}">
                                            @csrf
                                            <input type="hidden" name="email" value="{{ $brandowner->email }}">
                                            <td>
                                                <span id="td-id-display-{{ $brandowner->email }}">{{ $brandowner->employee_id }}</span>
                                                <input type="text" id="td-id-edit-{{ $brandowner->email }}" style="display:none;" name="employee_id" class="form-control" value="{{ $brandowner->employee_id }}" required>
                                            </td>
                                            <td id="td-name-display-{{ $brandowner->email }}">{{ $brandowner->firstname }} {{ $brandowner->middlename }} {{ $brandowner->lastname }}</td>
                                            <td>
                                                <span id="td-role-display-{{ $brandowner->email }}">Brand Owner</span>
                                                <select name="role" id="td-role-edit-{{ $brandowner->email }}" style="display:none;" class="form-select" required>
                                                    <option value="brand_owner">Brand Owner</option>
                                                    <option value="member">Member</option>
                                                </select>
                                            </td>
                                            <td>
                                                <span id="td-affiliation-secondary-display-{{ $brandowner->email }}">{{ $brandowner->affiliation_secondary }}</span>
                                            </td>
                                            <td>
                                                <button type="button" id="btn-edit-{{ $brandowner->email }}" class="btn orange twhite btn-sm" 
                                                    onclick="editButton('btn-edit-{{ $brandowner->email }}', 'btn-delete-{{ $brandowner->email }}', 'btn-save-{{ $brandowner->email }}', 'btn-cancel-{{ $brandowner->email }}', 
                                                    'td-id-display-{{ $brandowner->email }}', 'td-id-edit-{{ $brandowner->email }}', 'td-role-display-{{ $brandowner->email }}', 'td-role-edit-{{ $brandowner->email }}')">
                                                    Edit</button>
                                                <a href="#" id="btn-delete-{{ $brandowner->email }}" class="btn blue twhite btn-sm" onclick="event.preventDefault(); document.getElementById('delete-brandowner').submit();">
                                                    <span>Delete</span>
                                                </a>
                                                <button type="submit" id="btn-save-{{ $brandowner->email }}" class="btn green twhite btn-sm" style="display:none;" 
                                                    onclick="saveButton('btn-edit-{{ $brandowner->email }}', 'btn-delete-{{ $brandowner->email }}', 'btn-save-{{ $brandowner->email }}', 'btn-cancel-{{ $brandowner->email }}', 
                                                    'td-id-display-{{ $brandowner->email }}', 'td-id-edit-{{ $brandowner->email }}', 'td-role-display-{{ $brandowner->email }}', 'td-role-edit-{{ $brandowner->email }}')">
                                                    Save</button>
                                                <a href="#" id="btn-cancel-{{ $brandowner->email }}" class="btn red twhite btn-sm" style="display:none;" onclick="event.preventDefault(); document.getElementById('cancel-brandowner').submit();">
                                                    <span>Cancel</span>
                                                </a>
                                            </td>
                                        </form>
                                        <form id="delete-brandowner" method="POST" action="{{ route('brand.employees.delete') }}">
                                            @csrf
                                            <input type="hidden" name="employee_email" value="{{ $brandowner->email }}">
                                        </form>
                                        <form id="cancel-brandowner" method="GET" action="{{ route('brand.employees.cancel') }}">
                                            @csrf
                                        </form>
                                    </tr>
                                @endforeach
                                @foreach($members as $member)
                                    <tr>
                                        <form method="POST" action="{{ route('brand.employees.update') }}">
                                            @csrf
                                            <input type="hidden" name="email" value="{{ $member->email }}">
                                            <td>
                                                <span id="td-id-display-{{ $member->email }}">{{ $member->employee_id }}</span>
                                                <input type="text" id="td-id-edit-{{ $member->email }}" style="display:none;" name="employee_id" class="form-control" value="{{ $member->employee_id }}" required>
                                            </td>
                                            <td id="td-name-display-{{ $member->email }}">{{ $member->firstname }} {{ $member->middlename }} {{ $member->lastname }}</td>
                                            <td>
                                                <span id="td-role-display-{{ $member->email }}">Member</span>
                                                <select name="role" id="td-role-edit-{{ $member->email }}" style="display:none;" class="form-select" required>
                                                    <option value="brand_owner">Brand Owner</option>
                                                    <option value="member">Member</option>
                                                </select>
                                            </td>
                                            <td>
                                                <span id="td-affiliation-secondary-display-{{ $member->email }}">{{ $member->affiliation_secondary }}</span>
                                            </td>
                                            <td>
                                                <button type="button" id="btn-edit-{{ $member->email }}" class="btn orange twhite btn-sm" 
                                                    onclick="editButton('btn-edit-{{ $member->email }}', 'btn-delete-{{ $member->email }}', 'btn-save-{{ $member->email }}', 'btn-cancel-{{ $member->email }}', 
                                                    'td-id-display-{{ $member->email }}', 'td-id-edit-{{ $member->email }}', 'td-role-display-{{ $member->email }}', 'td-role-edit-{{ $member->email }}')">
                                                    Edit</button>
                                                <a href="#" id="btn-delete-{{ $member->email }}" class="btn blue twhite btn-sm" onclick="event.preventDefault(); document.getElementById('delete-member').submit();">
                                                    <span>Delete</span>
                                                </a>
                                                <button type="submit" id="btn-save-{{ $member->email }}" class="btn green twhite btn-sm" style="display:none;" 
                                                    onclick="saveButton('btn-edit-{{ $member->email }}', 'btn-delete-{{ $member->email }}', 'btn-save-{{ $member->email }}', 'btn-cancel-{{ $member->email }}', 
                                                    'td-id-display-{{ $member->email }}', 'td-id-edit-{{ $member->email }}', 'td-role-display-{{ $member->email }}', 'td-role-edit-{{ $member->email }}')">
                                                    Save</button>
                                                <a href="#" id="btn-cancel-{{ $member->email }}" class="btn red twhite btn-sm" style="display:none;" onclick="event.preventDefault(); document.getElementById('cancel-member').submit();">
                                                    <span>Cancel</span>
                                                </a>
                                            </td>
                                        </form>
                                        <form id="delete-member" method="POST" action="{{ route('brand.employees.delete') }}">
                                            @csrf
                                            <input type="hidden" name="employee_email" value="{{ $member->email }}">
                                        </form>
                                        <form id="cancel-member" method="GET" action="{{ route('brand.employees.cancel') }}">
                                            @csrf
                                        </form>
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
                        <form method="POST" action="{{ route('brand.employees.invitation.store') }}">
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
                                        <option value="brand_owner">Brand Owner</option>
                                        <option value="member">Member</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="affiliation_secondary" class="form-label">Affiliation:</label>
                                <input type="text" name="affiliation_secondary" class="form-control" id="affiliation_secondary" value="{{ $brand }}" readonly>
                            </div>
                            <input type="hidden" name="inviter_email" value="{{ auth()->user()->email }}">
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

    <script src="{{ asset('assets/js/editableBrandEmployeeList.js') }}"></script>
    <script src="{{ asset('assets/js/contenteditable.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.0.2/dist/chart.min.js"></script>
    <script src="{{ asset('assets/js/jquery-3.5.1.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/js/dataTables.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('assets/js/script.js') }}"></script>
</body>

</html>