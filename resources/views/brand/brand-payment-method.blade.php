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
    <link rel="stylesheet" href="{{ asset('assets/css/brand-payment-method.css') }}">
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

    <!-- Main Contents --- WAG PAPALITAAAAAN!! -->
    <main class="mt-3 text-start tblack main" data-bs-spy="noscroll">
        <div class="container-fluid">
            <div class="row justify-content-center contents">
                
            </div>
        </div>
        <!-- Main Content Area -->
        <div class="form-container">
            <div class="container my-4">
                <div class="title-pay">Payment Method</div>

                <form method="POST" action="{{ route('brand.orderconfirmation.create') }}">
                    @csrf
                    <div class="row">
                        <!-- Left Side -->
                        <div class="col-md-6 left-side">
                            <div class="form-group">
                                <label for="payment_method"></label>
                                <select name="payment_method" id="payment_method" class="form-control tblue" required>
                                    <option hidden>Choose a Method</option>
                                    <option value="Maya">Maya</option>
                                    <option value="GCash">Gcash</option> 
                                    <option value="BDO">BDO</option>
                                    <option value="BPI">BPI</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="card_number"></label>
                                <input type="text" name="card_number" id="card_number" class="form-control tblue" placeholder="Card Number" required>
                            </div>
                            <div class="form-row">
                                <div class="col-date">
                                    <label for="valid_date_month"></label>
                                    <input type="text" name="valid_date_month" id="valid_date_month" class="form-control tblue" placeholder="MM" required>
                                </div>
                                <div class="col-year">
                                    <label for="valid_date_year"></label>
                                    <input type="text" name="valid_date_year" id="valid_date_year" class="form-control tblue" placeholder="YYYY" required>
                                </div>
                                <div class="col-cvv">
                                    <label for="cvv"></label>
                                    <input type="text" name="cvv" id="cvv" class="form-control tblue" placeholder="CVV" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="first_name"></label>
                                <input type="text" name="firstname" id="firstname" class="form-control tblue" value="{{ auth()->user()->firstname }}" readonly>
                            </div>
                            <div class="form-group">
                                <label for="last_name"></label>
                                <input type="text" name="lastname" id="lastname" class="form-control tblue" value="{{ auth()->user()->lastname }}" readonly>
                            </div>
                        </div>

                        <!-- Right Side -->
                        @if($order_quantity == "single")
                            <input type="hidden" name="order_quantity" value="single">
                            <input type="hidden" name="order_package" value="{{ $orders->package_name }}">
                            <input type="hidden" name="order_price" value="{{ $orders->total_price }}">
                            <input type="hidden" name="order_duration" value="{{ $orders->duration }}">
                            <div class="col-md-6 right-side">
                                <br>
                                <br>
                                <p class="powered-by">Powered by: <img id="payment_image" src="#" alt="Payment Image" style="max-width: 150px; max-height: 150px; object-fit: contain;"></p>
                                <hr class="centered-hr">
                                <h4>Order Summary</h4>
                                <hr>
                                <h7 class="blue-text text-capitalize">{{ $orders->package_name }} <br>Duration: <b>{{ $orders->duration }} Month<span class="float-right">PHP {{ number_format($orders->total_price, 2) }}</span></b></h7>
                                <hr>
                                <h4>Total Amount <span class="float-right">PHP {{ number_format($orders->total_price, 2) }}</span></h4>
                                <hr>
                                <h6>1 Item <span class="float-right">Order Total: PHP {{ number_format($orders->total_price, 2) }}</span></h6>
                                <button type="submit" class="btn btn-primary mt-3">Place Order</button>
                            </div>
                        @else
                            <input type="hidden" name="order_quantity" value="multiple">
                            <div class="col-md-6 right-side">
                                <br>
                                <br>
                                <p class="powered-by">Powered by: <img id="payment_image" src="#" alt="Payment Image" style="max-width: 150px; max-height: 150px; object-fit: contain;"></p>
                                <hr class="centered-hr">
                                <h4>Order Summary</h4>
                                <hr>
                                @foreach($orders as $order)
                                    <div>
                                        <h7 class="blue-text text-capitalize"><b>{{ $order->package_name }}</b> <br>Duration: <b>{{ $order->duration }} Month{{ $order->duration > 1 ? 's' : '' }}<span class="float-right">PHP {{ number_format($order->total_price, 2) }}</span></b></h7>
                                    </div>
                                @endforeach
                                <hr>
                                <h4>Total Amount <span class="float-right">PHP {{ number_format($total_price, 2) }}</span></h4>
                                <hr>
                                <h6>{{ count($orders) }} Item{{ count($orders) > 1 ? 's' : '' }} <span class="float-right">Order Total: PHP {{ number_format($total_price, 2) }}</span></h6>
                                <button type="submit" class="btn btn-primary mt-3">Place Order</button>
                            </div>
                        @endif
                    </div>
                </form>
            </div>
        </div>
    </main>

    <!-- JavaScript Section -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#payment_method').change(function() {
                var selectedMethod = $(this).val();
                var imageSrc = '';

                if (selectedMethod === 'Maya') {
                    imageSrc = "{{ asset('assets/images/maya.png') }}"; 
                    $('#selected_payment_method').text('Maya');
                } else if (selectedMethod === 'GCash') {
                    imageSrc = "{{ asset('assets/images/gcash.png') }}"; 
                    $('#selected_payment_method').text('Gcash');
                } else if (selectedMethod === 'BDO') {
                    imageSrc = "{{ asset('assets/images/bdo.png') }}"; 
                    $('#selected_payment_method').text('BDO');
                } else if (selectedMethod === 'BPI') {
                    imageSrc = "{{ asset('assets/images/bpi.png') }}"; 
                    $('#selected_payment_method').text('BPI');
                } else {
                    imageSrc = '';
                    $('#selected_payment_method').text('Choose a method');
                }

                $('#payment_image').attr('src', imageSrc);

                // Toggle the display based on the selected method (show the image for all methods)
                if (imageSrc !== '') {
                    $('#payment_image').show();
                } else {
                    $('#payment_image').hide();
                }
            });
        });
    </script>
    <!-- End of JavaScript Section -->

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>
</body>

</html>
