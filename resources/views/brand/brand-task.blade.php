<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Brand Account</title>
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="{{ asset('assets/css/brand-task.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/calendar-demo.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/calendar-intlTelInput.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/calendar-index.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
</head>

<body>
    <!-- NavBar -->
    <nav class="navbar navbar-expand-lg blue borderbottom fixed-top {border-bottom: white 5px solid;}" style="z-index:0">
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
    <div class="container-fluid" style="z-index:-1">
        <div class="row stripes">
            <div class="col-12 stripe borderbottom orange"></div>
            <div class="col-12 stripe borderbottom red"></div>
            <div class="col-12 stripe borderbottom green"></div>
        </div>
    </div>
    <!-- SideBar -->
    <div class="offcanvas offcanvas-start blue text-white sidebar-nav " tabindex="-1" style="z-index:0" id="offcanvasExample"
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


    <!-- Dashboard -->
    <main class="mt-2 text-start tblack main" data-bs-spy="noscroll">
        <div class="container-fluid">
            <div class="row justify-content-center contents">
                <!-- KANBAN -->
                <div class="container upperDashboard">
                    <div class="row justify-content-start">
                        <h1> Kanban Board </h1>
                    </div>
                </div>
                <div class="container-fluid" id="kanban-table">
                    <div class="row mt-5">
                        <div class="col kanban bg-todo border-start border-top border-3">
                            <h2 class="text-light noscrolly text-center topspace2">Todo</h2>
                        </div>
                        <div class="col kanban bg-working border border-bottom-0 border-3">
                            <h2 class="text-light noscrolly text-center topspace2">Working</h2>
                        </div>
                        <div class="col kanban bg-approval border-end border-top border-3">
                            <h2 class="text-light noscrolly text-center topspace2">For Approval</h2>
                        </div>
                        <div class="col kanban bg-done border-end border-top border-3">
                            <h2 class="text-light noscrolly text-center topspace2">Done</h2>
                        </div>
                        <div class="row"></div>
                        <div class="col kanban-space bg-todo border-start border-bottom border-3 border-primary">
                            <h2 class="text-light noscrolly text-center"></h2>
                                @foreach ($tasks as $task)
                                    @if ($task->status === 'todo')
                                        <div class="todo bg-white p-3 mb-2 border rounded" data-id="{{ $task->id }}" draggable="true">
                                            {{ $task->title }}
                                            <button class="btn-close" aria-label="Close"></button>
                                        </div>
                                    @endif
                                @endforeach
                            <button type="button" class="btn btn-secondary w-100 mb-2" data-bs-toggle="modal" data-bs-target="#todoModal">+Add Todo</button>
                        </div>
                        <div class="col kanban-space bg-working border-bottom border-3 border-primary">
                            <h2 class="text-light noscrolly text-center"></h2>
                                @foreach ($tasks as $task)
                                    @if ($task->status === 'working')
                                        <div class="todo bg-white p-3 mb-2 border rounded" data-id="{{ $task->id }}" draggable="true">
                                            {{ $task->title }}
                                            <button class="btn-close" aria-label="Close"></button>
                                        </div>
                                    @endif
                                @endforeach
                        </div>
                        <div class="col kanban-space bg-approval border-bottom border-3 border-primary">
                            <h2 class="text-light noscrolly text-center"></h2>
                                @foreach ($tasks as $task)
                                    @if ($task->status === 'approval')
                                        <div class="todo bg-white p-3 mb-2 border rounded" data-id="{{ $task->id }}" draggable="true">
                                            {{ $task->title }}
                                            <button class="btn-close" aria-label="Close"></button>
                                        </div>
                                    @endif
                                @endforeach
                        </div>
                        <div class="col kanban-space bg-done border-bottom border-end border-3 border-primary">
                            <h2 class="text-light noscrolly text-center"></h2>
                                @foreach ($tasks as $task)
                                    @if ($task->status === 'done')
                                        <div class="todo bg-white p-3 mb-2 border rounded" data-id="{{ $task->id }}" draggable="true">
                                            {{ $task->title }}
                                            <button class="btn-close" aria-label="Close"></button>
                                        </div>
                                    @endif
                                @endforeach
                        </div>
                    </div>
                </div>
                <div class="modal fade" id="todoModal" tabindex="-1" aria-labelledby="todoModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="todoModalLabel">Add a new todo</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form method="GET" action="{{ route('brand.tasks.create') }}">
                                    @csrf
                                    <input type="text" id="todoInput" name="title" class="form-control mb-3"
                                        placeholder="Enter your task" required>
                                    <button type="submit" class="btn btn-success w-100" id="todoSubmit">Add Todo</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class = "container">
                    <button onclick="appointmentFormModal()">Open Appointment Form</button>
                </div>
            </div>
        </div>

        <div class="appTab" id="appointmentFormModal">
            <div class="appTabBody">
                <div class="header">
                    <span class="back" onclick="closeAppointmentFormModal()">
                        <img src="{{ asset('assets/images/back.svg') }}" alt="back" />
                    </span>
                    <img class="logo" src="{{ asset('assets/images/roc-logo.png') }}" alt="roc-logo" />
                </div>
                <div class="appBody">
                    <div class="ceoDetails">
                        <div class="profile-info">
                            <img class="ceo" src="{{ asset('assets/images/ceo.jpg') }}" alt="ceo" />
                            <p class="ceoName">Mr. Ron Clarin</p>
                        </div>
                        <div class="meetingInfo">
                            <p class="title">Design Consultation</p>
                            <div class="duration">
                                <img class="meetingIcon" src="{{ asset('assets/images/time.svg') }}" alt="time" />
                                <span>60 mins</span>
                            </div>
                            <p>Schedule a tailored graphic design consultation to address your specific business needs.</p>
                            <div class="methodContainer" required>
                                <select id="method">
                                    <option value="" disabled>Select meeting method</option>
                                    <option value="Google meeting" selected>Google meeting</option>
                                    <option value="Office visit">Office visit</option>
                                    <option value="Phone call">Phone call</option>
                                </select>

                                <div id="locationContainer" style="display: none; margin-top: 10px">
                                    <select id="location">
                                        <option value="" disabled>Select branch</option>
                                        <option value="Manila" disabled>Manila</option>
                                        <option value="Laguna" disabled>Laguna</option>
                                        <option value="Gen. Trias Cavite" selected>Gen. Trias Cavite</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="appDetails">
                        <form onsubmit="submitForm(event)">
                            <label for="name">Name <span class="asterisk">*</span></label>
                            <input type="text" id="name" name="name" required autocomplete="name" />
                            <label for="email">Email address <span class="asterisk">*</span></label>
                            <div class="emailContainer">
                                <input type="email" id="email" class="email" name="email" required autocomplete="email"
                                    placeholder="Your Email" />
                            </div>
                            <button type="button" id="addGuest">
                                <img src="{{ asset('assets/images/add_people.svg') }}" alt="add people" />
                                Add Guest
                            </button>
                            <label for="phone">Mobile number <span class="asterisk">*</span></label>
                            <input type="tel" id="phone" name="phone" maxlength="18" required autocomplete="tel" />
                            <div class="dateTime">
                                <div>
                                    <label for="date">Date <span class="asterisk">*</span></label>
                                    <input type="date" id="date" name="date" placeholder="Select Date" required
                                        autocomplete="off" />
                                </div>
                                <div>
                                    <label for="time">Time <span class="asterisk">*</span></label>
                                    <select id="time" name="time" required>
                                        <option value="">Select Time</option>
                                    </select>
                                </div>
                                <div>
                                    <label for="timeZone">Timezone</label>
                                    <input id="timeZone" type="text" disabled />
                                </div>
                            </div>
                            <label for="description">Additional Information</label>
                            <textarea name="description" id="description"
                                placeholder="Please share any details or topics you'd like to discuss during our meeting..."
                                autocomplete="off"></textarea>
                            <div class="cmdBtns">
                                <button class="submitBtn" type="submit">
                                    <img class="bookingIcon" src="{{ asset('assets/images/booking.png') }}" alt="booking" />
                                    Schedule Booking
                                </button>
                                <button class="cancelBtn" type="button" onclick="closeAppointmentFormModal()">
                                    Cancel
                                </button>
                            </div>
                            <footer class="bookingReminder">
                                By registering, you agree to our
                                <span class="policies" id="togglePoliciesModal">terms and conditions</span>
                            </footer>
                            <div class="policiesModal" id="policiesModal">
                                <div class="modal-content">
                                    <h1>By registering, you accept these terms.</h1>
                                    <hr />
                                    <h4>Scheduling</h4>
                                    <p>Appointments are based on availability.</p>
                                    <h4>Rescheduling and Cancellation</h4>
                                    <p>Reschedule or cancel 24 hours in advance.</p>
                                    <h4>Privacy</h4>
                                    <p>Your information is used solely for the service.</p>
                                    <h4>Liability</h4>
                                    <p>We are not liable for any service-related damages.</p>
                                    <h4>Changes to Terms</h4>
                                    <p>Terms may be updated on our website.</p>
                                    <h4>Contact Information</h4>
                                    <p>Contact us at +63 (046) 433-7590 or at 63 (0916) 3227642.</p>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="scheduledAppointment">
                        <div class="checkContainer">
                            <img src="{{ asset('assets/images/check-success.svg') }}" alt="scheduled appointment" />
                        </div>
                        <div class="appointmentStatus" class="appointmentInfo">
                            This meeting is scheduled
                        </div>
                        <div class="meetingInfo">
                            <div>
                                <strong>Method</strong><br />
                                <p id="methodMeetingInfo" class="appointmentInfo"></p>
                            </div>
                            <br />
                            <div>
                                <strong>Location</strong><br />
                                <p id="locationMeetingInfo" class="appointmentInfo"></p>
                            </div>
                            <br />
                            <div>
                                <strong>What</strong><br />
                                <p id="whatMeetingInfo" class="appointmentInfo"></p>
                            </div>
                            <br />
                            <div>
                                <strong>Invitee Time Zone</strong><br />
                                <p id="timeZoneMeetingInfo" class="appointmentInfo"></p>
                            </div>
                            <br />
                            <div>
                                <strong>Contact no</strong><br />
                                <p id="contactMeetingInfo" class="appointmentInfo"></p>
                            </div>
                            <br />
                            <div>
                                <strong>Who</strong><br />
                                <span id="whoMeetingInfo" class="appointmentInfo"></span>
                            </div>
                            <br />
                            <div>
                                <strong>Additional notes</strong><br />
                                <p id="additionalMeetingInfo" class="appointmentInfo"></p>
                            </div>
                        </div>
                        <br />
                    </div>
                </div>
            </div>
        </div>
    </main>
    
    <script>
        document.getElementById('method').addEventListener('change', function () {
            const method = this.value
            const locationContainer = document.getElementById('locationContainer')

            if (method === 'Office visit') {
                locationContainer.style.display = 'block'
            } else {
                locationContainer.style.display = 'none'
            }
        })
    </script>
    <script src="{{ asset('assets/js/kanban.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.0.2/dist/chart.min.js"></script>
    <script src="{{ asset('assets/js/jquery-3.5.1.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/js/dataTables.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('assets/js/script.js') }}"></script>
    <script src="{{ asset('assets/js/booking.js') }}"></script>
    <script src="{{ asset('assets/js/addGuest.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/luxon/2.3.0/luxon.min.js"></script>
    <script src="{{ asset('assets/js/intlTelInput.js') }}"></script>
    <script src="{{ asset('assets/js/intlTelInputPreference.js') }}"></script>
    <script src="{{ asset('assets/js/policiesModal.js') }}"></script>
    <script src="{{ asset('assets/js/flatpickr.js') }}"></script>
</body>

</html>