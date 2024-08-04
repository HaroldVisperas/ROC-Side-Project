<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PROOF OF PAYMENT</title>
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="{{ asset('assets/css/brand-proof-of-payment.css') }}">
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

    <!-- Main Contents --- WAG PAPALITAAAAAN!! -->
    <main class="mt-3 text-start tblack main" data-bs-spy="noscroll">
        <div class="container-fluid">
            <div class="row justify-content-center contents">
            <div class="container mt-5">
                    <div class="header">
                        <h2>Proof of Payment</h2>
                        <div class="search-bar">
                            <form method="GET" action="">
                                <div class="input-group">
                                    <input type="text" name="search" class="form-control" placeholder="Search Bar" value="{{ request('search') }}">
                                    <div class="input-group-append">
                                        <button class="btn btn-outline-secondary" type="submit">
                                            <i class="fas fa-search"></i>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="underline"></div>
                    <form method="GET" action="">
                        <div class="form-group-inline">
                            <div class="form-group">
                                <label for="company">Company</label>
                                <input type="text" id="company" class="form-control" placeholder="Company" value="AMAZON" readonly>
                            </div>
                            <div class="form-group">
                                <label for="brand">Brand</label>
                                <input type="text" id="brand" class="form-control" placeholder="Brand" value="AMAZON PRIME" readonly>
                            </div>
                            <div class="form-group">
                                <label for="status">Status</label>
                                <select name="status" id="status" class="form-control" onchange="this.form.submit()">
                                    <option value="">- Status -</option>
                                    <option value="paid" {{ request('status') == 'paid' ? 'selected' : '' }}>Paid</option>
                                    <option value="processing" {{ request('status') == 'processing' ? 'selected' : '' }}>Processing</option>
                                    <option value="verified" {{ request('status') == 'verified' ? 'selected' : '' }}>Verified</option>
                                    <option value="not verified" {{ request('status') == 'not verified' ? 'selected' : '' }}>Not Verified</option>
                                </select>
                            </div>
                        </div>
                    </form>
                    <table class="table table-striped">
                        <thead class="thead-dark">
                            <tr style="background-color: #008EC2;">
                                <th style="background-color: #008EC2;">Reference ID</th>
                                <th style="background-color: #008EC2;">Description</th>
                                <th style="background-color: #008EC2;">Status</th>
                                <th style="background-color: #008EC2;">Payment Method</th>
                                <th style="background-color: #008EC2;">Transaction Date</th>
                                <th style="background-color: #008EC2;">Amount</th>
                            </tr>
                        </thead>
                        <tbody>
                            {{-- Mock Data --}}
                            @php
                            $mockPayments = [
                                (object)[
                                    'reference_id' => 'F20240710-001',
                                    'description' => 'Facebook Basic Plan',
                                    'status' => 'paid',
                                    'payment_method' => 'PayPal',
                                    'transaction_date' => '2019-01-05',
                                    'amount' => 500.00
                                ],
                                (object)[
                                    'reference_id' => 'F20240710-002',
                                    'description' => 'Twitter Standard Plan',
                                    'status' => 'processing',
                                    'payment_method' => 'Gcash',
                                    'transaction_date' => '2019-01-05',
                                    'amount' => 1000.00
                                ],
                                (object)[
                                    'reference_id' => 'F20240710-003',
                                    'description' => 'Tiktok Pro Plan',
                                    'status' => 'verified',
                                    'payment_method' => 'Maya',
                                    'transaction_date' => '2019-01-05',
                                    'amount' => 3000.00
                                ],
                                (object)[
                                    'reference_id' => 'F20240710-004',
                                    'description' => 'Youtube Premium Plan',
                                    'status' => 'not verified',
                                    'payment_method' => 'BDO',
                                    'transaction_date' => '2019-01-05',
                                    'amount' => 3500.00
                                ],
                            ];
                            @endphp

                            @foreach($mockPayments as $payment)
                                @if(request('status') && $payment->status != request('status'))
                                    @continue
                                @endif
                                @if(request('payment_method') && $payment->payment_method != request('payment_method'))
                                    @continue
                                @endif
                                <tr>
                                    <td>{{ $payment->reference_id }}</td>
                                    <td>{{ $payment->description }}</td>
                                    <td class="status-{{ str_replace(' ', '-', strtolower($payment->status)) }}">{{ ucfirst($payment->status) }}</td>
                                    <td>{{ $payment->payment_method }}</td>
                                    <td>{{ \Carbon\Carbon::parse($payment->transaction_date)->format('m - d - y') }}</td>
                                    <td>PHP {{ number_format($payment->amount, 2) }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{-- Pagination Links --}}
                </div>
            </div>
        </div>
    </main>
     

    <!-- JavaScript -->
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.0.2/dist/chart.min.js"></script>
    <script src="{{ asset('assets/js/jquery-3.5.1.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/js/dataTables.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('assets/js/script.js') }}"></script>
</body>

</html>
