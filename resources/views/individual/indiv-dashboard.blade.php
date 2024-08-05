<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ROCPH Digital Marketing Services</title>
    <link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="{{ asset('assets/css/individual-dashboard.css') }}">
</head>

<body class="maxwidth">

    @if (auth()->user()->role == 'company_owner')
        <script>window.location.href = "{{ route('company.dashboard.create') }}";</script>
    @elseif (auth()->user()->role == 'brand_owner')
        <script>window.location.href = "{{ route('company.dashboard.create') }}";</script>
    @elseif (auth()->user()->role == 'member')
        <script>window.location.href = "{{ route('brand.dashboard.create') }}";</script>
    @elseif (auth()->user()->role == 'roc_administrator')
        <script>window.location.href = "#";</script>
    @endif

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
                    <li class="nav-item dropdown d-flex align-items-center">
                        <div class="d-flex align-items-center my-2">
                            <div class="rounded-4 me-3" style="width: 50px; height: 50px; background-image: url('{{ asset('assets/images/Default.png') }}'); background-size: cover;">
                            </div>
                            <div>
                                <div class="text-white fs-2 fw-bold text-uppercase">{{ auth()->user()->firstname }} {{ auth()->user()->middlename }} {{ auth()->user()->lastname }}</div>
                                <div class="text-white fs-6 text-end neg10">Individual Client Account</div>
                            </div>
                        </div>
                        <a class="nav-link dropdown-toggle text-white ms-2" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <form id="profile-form" method="GET" action="{{ route('individual.profile.create') }}">
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
                    </li>
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

    <!-- Main Contents -->
    <main class="mt-3 text-start tblack main" data-bs-spy="noscroll">
        <div class="container-fluid">
            <div class="row justify-content-end contents">
                <div class="col-lg-12 text-end">
                    <i class="bi bi-bell fs-1 p-3 text-end" id="bell-icon" data-toggle="modal"
                        data-target="#notificationModal"></i>
                </div>

                <!-- Modal -->
                <div class="modal fade" id="notificationModal" tabindex="-1" aria-labelledby="notificationModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="notificationModalLabel">All Notifications</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                @if ($invitations != null && count($invitations) > 0)
                                    @foreach($invitations as $invitation)
                                        <div class="notification mt-3">
                                            <img src="{{ asset('assets/images/Default.png') }}" alt="Profile Image">
                                            <div class="text">
                                                <p class="fw-bold">{{ $invitation->affiliation }} <span style="color: #CDCDCD; font-weight: 100;">
                                                    invited you to the company as a <span class="fw-bold">
                                                    @if ($invitation->role == 'company_owner')
                                                        Company Owner
                                                    @elseif ($invitation->role == 'brand_owner')
                                                        Brand Owner
                                                    @elseif ($invitation->role == 'member')
                                                        Member
                                                    @endif
                                                    </span>
                                                    @if ($invitation->affiliation != $invitation->affiliation_secondary)
                                                        of <span class="fw-bold">{{ $invitation->affiliation_secondary }}</span>
                                                    @endif
                                                </span></p>
                                                <p class="tblack notifdate">{{ $invitation->updated_at->setTimezone(auth()->user()->timezone)->format('F j, Y') }} |<span style="color: #84c148;"> {{ $invitation->updated_at->setTimezone(auth()->user()->timezone)->format('g:i A') }}</span></p>
                                                <div class="d-flex gap-2">
                                                    <form method="POST" action="{{ route('individual.invitation.update') }}">
                                                        @csrf
                                                        <input type="hidden" name="email" value="{{ $invitation->email }}">
                                                        <input type="hidden" name="employee_id" value="{{ $invitation->employee_id }}">
                                                        <input type="hidden" name="affiliation" value="{{ $invitation->affiliation }}">
                                                        <input type="hidden" name="affiliation_secondary" value="{{ $invitation->affiliation_secondary }}">
                                                        <input type="hidden" name="role" value="{{ $invitation->role }}">
                                                        <button type="submit" class="btn text-white green accept">Accept</button>
                                                    </form>
                                                    <form method="POST" action="{{ route('individual.invitation.delete') }}">
                                                        @csrf
                                                        <input type="hidden" name="email" value="{{ $invitation->email }}">
                                                        <button type="submit" class="btn text-white red decline">Decline</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                @else
                                    <div class="gray recentTaskBox1">
                                        <p class="text-white fw-bold text-center">
                                            <span class="tblack fw-bold">No Notifications</span>
                                        </p>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="row justify-content-center">
                    <div class="col-lg-6 text-start ">
                        <div class="col">
                            <h3 class="tblue fw-bold fs-1 me-2 p-2 borderbottom2"> Create your </h3>
                        </div>
                        <div class="col">
                            <h3 class="tblue fw-bold fs-1 me-2 p-2 borderbottom2"> Company Profile </h3>
                        </div>
                        <div class="col">
                            <h3 class="tblue fw-bold fs-4 me-2 p-2 borderbottom2"> Before you can begin the process, you
                                will need to establish a company account with our platform. This initial step of setting
                                up a business profile will allow you to access the necessary tools and features to
                                proceed with the next stages. </h3>
                        </div>
                        <div class="col">
                            <form method="GET" action="{{ route('individual.company.create') }}">
                                @csrf
                                <button type="submit" class="btn btn-primary custom-button mt-4">Create Company</button>
                            </form>
                        </div>
                    </div>
                    <div class="col-lg-4 text-center ">
                        <img src="{{ asset('assets/images/office-building.png') }}" alt="Office Building" class="img-fluid mt-3">
                    </div>
                </div>
            </div>
        </div>
    </main>
    <!-- Main Contents -->

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="{{ asset('assets/js/contenteditable.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.0.2/dist/chart.min.js"></script>
    <script src="{{ asset('assets/js/jquery-3.5.1.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/js/dataTables.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('assets/js/script.js') }}"></script>
</body>

</html>
