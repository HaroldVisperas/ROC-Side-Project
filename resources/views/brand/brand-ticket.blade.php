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
    <link rel="stylesheet" href="{{ asset('assets/css/brand-ticket.css') }}">
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
                                style="width: 50px; height: 50px; background-image: url('{{ asset('assets/images/icon.png') }}'); background-size: cover;">
                            </div>
                            <div>
                                <div class="text-white fs-2 fw-bold text-uppercase">Zara Inocencio</div>
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
                        <li><a class="dropdown-item" href="#"><i class="bi bi-person-check fs-5 me-2"></i>My Profile</a>
                        </li>
                        <li><a class="dropdown-item" href="#"><i class="bi bi-box-arrow-right fs-5 me-2"></i>Logout</a>
                        </li>
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
                        <a href="Sample.html" class="nav-link text-white text-start pt-3">
                            <span><i class="bi bi-microsoft fs-5 me-2"></i></span>
                            <span class="text-uppercase fw-bold fs-5">Dashboard</span>
                        </a>
                        <a href="Sample.html" class="nav-link text-white text-start pt-3">
                            <span><i class="bi bi-bag-heart-fill fs-5 me-2"></i></span>
                            <span class="text-uppercase fw-bold fs-5">Brand profile</span>
                        </a>
                        <a href="Sample.html" class="nav-link text-white text-start pt-3">
                            <span><i class="bi bi-kanban fs-5 me-2"></i></span>
                            <span class="text-uppercase fw-bold fs-5">Project</span>
                        </a>
                        <a href="Sample.html" class="nav-link text-white text-start pt-3">
                            <span><i class="bi bi-ticket-detailed fs-5 me-2"></i></span>
                            <span class="text-uppercase fw-bold fs-5">Ticket</span>
                        </a>
                        <a href="Sample.html" class="nav-link text-white text-start pt-3">
                            <span><i class="bi bi-person-heart fs-5 me-2"></i></span>
                            <span class="text-uppercase fw-bold fs-5">Employee</span>
                        </a>
                        <a class="nav-link pt-3 sidebar-link text-start" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                            <span><i class="bi bi-house-gear-fill fs-5 me-2"></i></span>
                            <span class="text-uppercase fw-bold fs-5">Services</span>
                            <span><i class="bi bi-chevron-down"></i></span>
                        </a>
                        <div class="collapse" id="collapseExample">
                            <div>
                                <ul class="navbar-nav ps-3">
                                    <li><a href="Sample.html" class="nav-link text-white text-start pt-1">
                                            <span><i class="bi bi-box-fill fs-5 me-2"></i></span>
                                            <span class="text-uppercase fw-bold fs-6">Subscription</span>
                                        </a></li>
                                    <li><a href="Sample.html" class="nav-link text-white text-start pt-1">
                                            <span><i class="bi bi-cart-plus-fill fs-5 me-2"></i></span>
                                            <span class="text-uppercase fw-bold fs-6">Cart</span>
                                        </a></li>
                                    <li><a href="Sample.html" class="nav-link text-white text-start pt-1">
                                            <span><i class="bi bi-receipt-cutoff fs-5 me-2"></i></span>
                                            <span class="text-uppercase fw-bold fs-6">Proof of Payment</span>
                                        </a></li>
                                </ul>
                            </div>
                        </div>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
    <!-- SideBar -->

    <!-- Main Contents -->
        <main class="mt-3 text-start tblack main" data-bs-spy="noscroll">
                <div class="container-fluid">
                    <div class="row justify-content-center contents">
                        <div class="container my-5">
                            @if (session('success'))
                                <div class="alert alert-success">
                                    {{ session('success') }}
                                </div>
                            @endif
                            <form action="{{ url('/form') }}" method="POST">
                                @csrf
                                <div class="mb-3">
                                    <label for="employee_id" class="form-label">Employee ID Number *</label>
                                    <input type="text" name="employee_id" class="form-control" id="employee_id" required>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-4">
                                        <label for="first_name" class="form-label">First Name *</label>
                                        <input type="text" name="first_name" class="form-control" id="first_name" required>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="middle_name" class="form-label">Middle Name</label>
                                        <input type="text" name="middle_name" class="form-control" id="middle_name">
                                    </div>
                                    <div class="col-md-4">
                                        <label for="last_name" class="form-label">Last Name *</label>
                                        <input type="text" name="last_name" class="form-control" id="last_name" required>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="work_email" class="form-label">Work Email *</label>
                                    <input type="email" name="work_email" class="form-control" id="work_email" required>
                                </div>
                                <div class="mb-3">
                                    <label for="message" class="form-label">Message *</label>
                                    <textarea name="message" class="form-control" id="message" rows="4" required></textarea>
                                </div>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </main>

    <!-- JavaScript -->
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.0.2/dist/chart.min.js"></script>
    <script src="{{ asset('assets/js/jquery-3.5.1.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/js/dataTables.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('assets/js/script.js') }}"></script>
</body>

</html>