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
    <link rel="stylesheet" href="{{ asset('assets/css/brand-order-confirmation.css') }}">
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
                                    <li>
                                        <form id="payment-method-link" method="GET" action="{{ route('brand.paymentmethod.create') }}">
                                            @csrf
                                            <a href="#" class="nav-link text-white text-start pt-1" onclick="event.preventDefault(); document.getElementById('payment-method-link').submit();">
                                                <i class="bi bi-cash fs-5 me-2"></i>
                                                <span class="text-uppercase fw-bold fs-6">Payment Method</span>
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
                <!-- Add the "Proof of Payment" Section Here -->
                <div class="col-12">
                    <div class="card">
                        <div class="card-body text-center">
                            <i class="bi bi-check-circle" style="font-size: 3rem; color: #84C148;"></i>
                            <h3 class="card-title mt-3">Your order is confirmed</h3>
                            <p class="card-text mt-3">Thank you for your payment! We're thrilled to confirm that your order has been successfully processed and accepted. 
                            <br>    
                            Your support means a lot to us, and we're eager to fulfill your product/service.</p>
                            <div class="card mt-4">
                                <div class="card-body">
                                    <h5 class="card-title">Purchase Details:</h5>
                                    <p class="card-text">Reference Number: F20240710-001</p>
                                    <form method="GET" action="{{ route('brand.proofofpayment.create') }}">
                                        @csrf
                                        <button type="submit" class="btn btn-primary">View Proof of Payment</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End of "Proof of Payment" Section -->
            </div>
        </div>
    </main>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>
</body>

</html>
