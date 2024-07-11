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
    <link rel="stylesheet" href="{{ asset('assets/css/company-dashboard.css') }}">
</head>

<body>
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
                                style="width: 50px; height: 50px; background-image: url('{{ asset('assets/images/icon.png') }}'); background-size: cover;">
                            </div>
                            <div>
                                <div class="text-white fs-2 fw-bold text-uppercase">{{ auth()->user()->firstname }} {{ auth()->user()->middlename }} {{ auth()->user()->lastname }}</div>
                                <div class="text-white fs-6 text-end neg10">
                                    @if (auth()->user()->role == 'ceo')
                                        CEO Account
                                    @elseif (auth()->user()->role == 'administrator')
                                        Administrator Account
                                    @endif
                                </div>
                            </div>
                        </div>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="#">My Profile</a></li>
                        </ul>
                    </li>
                    <a class="nav-link dropdown-toggle text-white" href="#" role="button" data-bs-toggle="dropdown"
                        aria-expanded="True"></a>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <form id="profile-form" method="GET" action="{{ route('company.profile.create') }}">
                            @csrf
                            <li><a class="dropdown-item" href="#" onclick="event.preventDefault(); document.getElementById('profile-form').submit();">
                                <i class="bi bi-gear fs-5 me-2"></i>My Profile</a></li>
                            <input type="hidden" name="user_timezone" value="{{ auth()->user()->timezone }}">
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
                                <i class="bi bi-gear fs-5 me-2"></i>Logout</a></li>
                        </form>
                    </ul>
                </ul>
            </div>
        </div>
    </nav>
    <!-- NavBar -->
    <div class="container-fluid">
        <div class="row">
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
                        <a href="Sample.html" class="nav-link text-white text-start pt-3">
                            <span><i class="bi bi-bag-heart-fill fs-5 me-2"></i></span>
                            <span class="text-uppercase fw-bold fs-5">Brands</span>
                        </a>
                        <a href="Sample.html" class="nav-link text-white text-start pt-3">
                            <span><i class="bi bi-person-hearts fs-5 me-2"></i></span>
                            <span class="text-uppercase fw-bold fs-5">Employees</span>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
    <!-- SideBar -->


    <!-- Dashboard -->
    <main class="mt2-2 text-start tblack main" data-bs-spy="noscroll">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="m-2 col-lg-6 fw-bold announcementCol">
                    <h1 class="text-center fw-bold tgray">Announcement</h1>
                    @if($latestAnnouncements->isNotEmpty())
                        @foreach($latestAnnouncements as $latestAnnouncement)
                            <div class="row mt-3 justify-content-start announcementImage">
                                <div class="col-md-7 announcementName">
                                    <div class="fs-5 fw-bold tblack">{{ $latestAnnouncement->title }}</div>
                                    <div class="fw-normal announcementName-2">{{ $latestAnnouncement->updated_at->setTimezone(auth()->user()->timezone)->format('F j, Y') }} | 
                                        <span style="color:green">{{ $latestAnnouncement->updated_at->setTimezone(auth()->user()->timezone)->format('g:i A') }}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-3 justify-content-center">
                                <div class="col-md-10">
                                    <div class="fw-normal announcementP lh-sm fw-lighter">
                                        <form id="announcement-form" method="GET" action="{{ route('company.announcement.create') }}">
                                            @csrf
                                            <p>{{ substr($latestAnnouncement->content, 0, 600) }}
                                                <a href="#" style="color:green; text-decoration: none;" onclick="event.preventDefault(); document.getElementById('announcement-form').submit();">
                                                    Read More...
                                                </a>
                                            </p>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <div class="row mt-3 justify-content-start announcementImage">
                            <div class="col-md-7 announcementName">
                                <div class="fs-5 fw-bold tblack">No Announcement</div>
                            </div>
                        </div>
                    @endif
                </div>
                <div class="m-2 col-lg-5 blue currentSubCol text-white">
                    <div class="row">
                        <div class="col">
                            <h4 class="text-center twhite">Current Subscription</h4>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col text-center availedSubsTop">
                            <div class=" fw-bold text-uppercase">
                                <h1>Enterprise</h1>
                            </div>
                            <div class="fw-normal tblack availedSubsTop-2">Availed Subscription</div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col text-center availedSubsBot mt-3">
                            <div class="fw-bold  text-lowercase">
                                <h3 class="ttaskorange">bearbrand</h3>
                            </div>
                            <div class="fw-normal tblack availedSubsBot-2 ">Brand Name</div>
                        </div>
                    </div>
                    <div class="row justify-content-center text-center mt-3 subsDate">
                        <div class="col-4 text-center subsDateTop">
                            <div class="fw-bold">
                                <h6>June 01, 2024</h6>
                            </div>
                            <div class="fw-normal tblack subsDateTop-2 ">Start Date</div>
                        </div>
                        <div class="col-4 text-center subsDateBot">
                            <div class="fw-bold">
                                <h6>August 01, 2023</h6>
                            </div>
                            <div class="fw-normal tblack subsDateBot-2">Billing Date</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <main class="mt-1 text-start tblack main" data-bs-spy="noscroll">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="m-2 col-lg-7 blue actSubs">
                    <div class="row justify-content-center">
                        <div class="col">
                            <h3 class="text-center fw-bold twhite">Active Subscription
                                <button class="btn"
                                    style="background-color: #84c148; color: white; border: solid 2px black;"
                                    type="button">View</button>
                            </h3>
                        </div>
                    </div>
                    <div class="row justify-content-center actSubsTop">
                        <div class="m-2 col-sm-5 actSubBox1">
                            <div class="fw-bold text-uppercase text-start text-white">
                                <h3>Facebook</h3>
                            </div>
                            <div class="fw-normal actSubsP tblack text-start">Brand Name: <span
                                    style="color:#008ec2; font-weight: 800">Nike</span></div>
                            <div class="fw-normal actSubsP tblack text-start">Subscription ID: <span
                                    style="color:#008ec2; font-weight: 800">3268515</span></div>
                            <div class="fw-normal actSubsP tblack text-start">End of Subscription: <span
                                    style="color:#008ec2; font-weight: 800">May 01, 2024</span></div>
                        </div>
                        <div class="m-2 col-sm-5 actSubBox2">
                            <div class="fw-bold text-uppercase text-start text-white">
                                <h3>Facebook</h3>
                            </div>
                            <div class="fw-normal actSubsP tblack text-start">Brand Name: <span
                                    style="color:#008ec2; font-weight: 800">Nike</span></div>
                            <div class="fw-normal actSubsP tblack text-start">Subscription ID: <span
                                    style="color:#008ec2; font-weight: 800">3268515</span></div>
                            <div class="fw-normal actSubsP tblack text-start">End of Subscription: <span
                                    style="color:#008ec2; font-weight: 800">May 01, 2024</span></div>
                        </div>
                    </div>

                    <div class="row justify-content-center actSubsBot">
                        <div class="m-2 col-sm-5 actSubBox3 ">
                            <div class="fw-bold text-uppercase text-start text-white">
                                <h3>Facebook</h3>
                            </div>
                            <div class="fw-normal actSubsP tblack text-start">Brand Name: <span
                                    style="color:#008ec2; font-weight: 800">Nike</span></div>
                            <div class="fw-normal actSubsP tblack text-start">Subscription ID: <span
                                    style="color:#008ec2; font-weight: 800">3268515</span></div>
                            <div class="fw-normal actSubsP tblack text-start">End of Subscription: <span
                                    style="color:#008ec2; font-weight: 800">May 01, 2024</span></div>
                        </div>
                        <div class="m-2 col-sm-5 actSubBox4">
                            <div class="fw-bold text-uppercase text-start text-white">
                                <h3>Facebook</h3>
                            </div>
                            <div class="fw-normal actSubsP tblack text-start">Brand Name: <span
                                    style="color:#008ec2; font-weight: 800">Nike</span></div>
                            <div class="fw-normal actSubsP tblack text-start">Subscription ID: <span
                                    style="color:#008ec2; font-weight: 800">3268515</span></div>
                            <div class="fw-normal actSubsP tblack text-start">End of Subscription: <span
                                    style="color:#008ec2; font-weight: 800">May 01, 2024</span></div>
                        </div>
                    </div>
                </div>

                <div class="m-2 col-lg-4 recentTasks">
                    <h3 class="text-center fw-bold tgray">Recent Tasks
                        <button class="btn" style="background-color: #84c148; color: white; border: solid 2px black;"
                            type="button">View</button>
                    </h3>
                    <div class="row">
                        <div class="mt-2 col-md-12">
                            <div class="row justify-content-center">
                                @foreach ($tasks as $task)
                                    <div class="mb-3 col-md-10 recentTasksBox blue">
                                        <div class="fw-bold text-start text-white">
                                            <h3>{{ $task->title }}</h3>
                                        </div>
                                        <div class="fw-normal actSubsP tblack text-start">Status: 
                                            @if ($task->status == 'todo')
                                                <span class="text-uppercase ttaskgray" style="font-weight: 800">{{ $task->status }}</span>
                                            @elseif ($task->status == 'working')
                                                <span class="text-uppercase ttaskyellow" style="font-weight: 800">{{ $task->status }}</span>
                                            @elseif ($task->status == 'approval')
                                                <span class="text-uppercase ttaskred" style="font-weight: 800">For {{ $task->status }}</span>
                                            @elseif ($task->status == 'done')
                                                <span class="text-uppercase ttaskgreen" style="font-weight: 800">{{ $task->status }}</span>
                                            @endif
                                        </div>
                                        <div class="fw-normal actSubsP tblack text-start">Company Name: 
                                            <span style="color:white; font-weight: 800">Amazon Prime</span>
                                        </div>
                                        <div class="fw-normal actSubsP tblack text-start">Brand Name: 
                                            <span style="color:white; font-weight: 800">Nike</span>
                                        </div>
                                        <div class="fw-normal actSubsP tblack text-start">Ticket No.: 
                                            <span style="color:white; font-weight: 800">{{ sprintf('%05d', $task->id) }}</span>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.0.2/dist/chart.min.js"></script>
    <script src="{{ asset('assets/js/jquery-3.5.1.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/js/dataTables.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('assets/js/script.js') }}"></script>
</body>

</html>