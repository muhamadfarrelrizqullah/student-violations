<!DOCTYPE html>
<html lang="en">

<head>
    <title>Landing Page - EduGuard</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="shortcut icon" href="assets/media/logos/favicon.png" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700" />
    <link href="assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/style.bundle.css" rel="stylesheet" type="text/css" />
</head>

<body id="kt_body" data-bs-spy="scroll" data-bs-target="#kt_landing_menu" class="bg-body position-relative app-blank">
    <div class="d-flex flex-column flex-root" id="kt_app_root">
        <div class="mb-0" id="home">
            <div class="bgi-no-repeat bgi-size-contain bgi-position-x-center bgi-position-y-bottom landing-dark-bg"
                style="background-image: url(assets/media/svg/illustrations/landing.svg)">
                <div class="landing-header" data-kt-sticky="true" data-kt-sticky-name="landing-header"
                    data-kt-sticky-offset="{default: '200px', lg: '300px'}">
                    <div class="container">
                        <div class="d-flex align-items-center justify-content-between">
                            <div class="d-flex align-items-center flex-equal">
                                <button class="btn btn-icon btn-active-color-primary me-3 d-flex d-lg-none"
                                    id="kt_landing_menu_toggle">
                                    <i class="ki-duotone ki-abstract-14 fs-2hx">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                    </i>
                                </button>
                                <a href="/">
                                    <img alt="Logo" src="assets/media/logos/landing.png"
                                        class="logo-default h-20px h-lg-25px" />
                                    <img alt="Logo" src="assets/media/logos/landing-dark.png"
                                        class="logo-sticky h-20px h-lg-25px" />
                                </a>
                            </div>
                            <div class="d-lg-block" id="kt_header_nav_wrapper">
                                <div class="d-lg-block p-5 p-lg-0" data-kt-drawer="true"
                                    data-kt-drawer-name="landing-menu"
                                    data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true"
                                    data-kt-drawer-width="200px" data-kt-drawer-direction="start"
                                    data-kt-drawer-toggle="#kt_landing_menu_toggle" data-kt-swapper="true"
                                    data-kt-swapper-mode="prepend"
                                    data-kt-swapper-parent="{default: '#kt_body', lg: '#kt_header_nav_wrapper'}">
                                    <div class="menu menu-column flex-nowrap menu-rounded menu-lg-row menu-title-gray-600 menu-state-title-primary nav nav-flush fs-5 fw-semibold"
                                        id="kt_landing_menu">
                                        <div class="menu-item">
                                            <a class="menu-link nav-link active py-3 px-4 px-xxl-6" href="#kt_body"
                                                data-kt-scroll-toggle="true" data-kt-drawer-dismiss="true">Home</a>
                                        </div>
                                        <div class="menu-item">
                                            <a class="menu-link nav-link py-3 px-4 px-xxl-6" href="#how-it-works"
                                                data-kt-scroll-toggle="true" data-kt-drawer-dismiss="true">How it
                                                Works</a>
                                        </div>
                                        <div class="menu-item">
                                            <a class="menu-link nav-link py-3 px-4 px-xxl-6" href="#key"
                                                data-kt-scroll-toggle="true" data-kt-drawer-dismiss="true">Key
                                                Metrics</a>
                                        </div>
                                        <div class="menu-item">
                                            <a class="menu-link nav-link py-3 px-4 px-xxl-6" href="#contact"
                                                data-kt-scroll-toggle="true" data-kt-drawer-dismiss="true">Contact</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="flex-equal text-end ms-1">
                                <a href="/login" class="btn btn-primary">Login</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="d-flex flex-column flex-center w-100 min-h-350px min-h-lg-500px px-9">
                    <div class="text-center mb-5 mb-lg-10 py-10 py-lg-20">
                        <h1 class="text-white lh-base fw-bold fs-2x fs-lg-3x mb-15">Streamline
                            <span
                                style="background: linear-gradient(to right, #12CE5D 0%, #FFD80C 100%);-webkit-background-clip: text;-webkit-text-fill-color: transparent;">
                                <span id="kt_landing_hero_text">Student Behavior</span>
                            </span>
                            <br>Management with
                            <span
                                style="background: linear-gradient(to right, rgb(101, 91, 161) 0%, #0094FF 100%);-webkit-background-clip: text;-webkit-text-fill-color: transparent;">
                                <span id="kt_landing_hero_text">EduGuard</span>
                            </span>
                        </h1>
                    </div>
                </div>
            </div>
            <div class="landing-curve landing-dark-color mb-10 mb-lg-20">
                <svg viewBox="15 12 1470 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M0 11C3.93573 11.3356 7.85984 11.6689 11.7725 12H1488.16C1492.1 11.6689 1496.04 11.3356 1500 11V12H1488.16C913.668 60.3476 586.282 60.6117 11.7725 12H0V11Z"
                        fill="currentColor"></path>
                </svg>
            </div>
        </div>
        <div class="mb-n10 mb-lg-n20 z-index-2">
            <div class="container">
                <div class="text-center mb-17">
                    <h3 class="fs-2hx text-gray-900 mb-5" id="how-it-works"
                        data-kt-scroll-offset="{default: 100, lg: 150}">How it Works</h3>
                    <div class="fs-5 text-muted fw-bold px-sm-20">Managing student discipline can be challenging, but
                        with our
                        cutting-edge Student Discipline Tracker, it becomes easier, more efficient, and highly
                        effective. Keep track of student behavior incidents, analyze trends, and improve your
                        school's
                        disciplinary processes.
                    </div>
                </div>
                <div class="row w-100 gy-10 mb-md-20">
                    <div class="col-md-4 px-5">
                        <div class="text-center mb-10 mb-md-0">
                            <img src="assets/media/illustrations/sketchy-1/17.png" class="mh-125px mb-9"
                                alt="" />
                            <div class="d-flex flex-center mb-5">
                                <span class="badge badge-circle badge-light-success fw-bold p-5 me-3 fs-3">1</span>
                                <div class="fs-5 fs-lg-3 fw-bold text-gray-900">Record</div>
                            </div>
                            <div class="fw-semibold fs-6 fs-lg-4 text-muted">Input details of student misconduct <br>
                                incidents quickly and accurately.
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 px-5">
                        <div class="text-center mb-10 mb-md-0">
                            <img src="assets/media/illustrations/sketchy-1/2.png" class="mh-125px mb-9"
                                alt="" />
                            <div class="d-flex flex-center mb-5">
                                <span class="badge badge-circle badge-light-success fw-bold p-5 me-3 fs-3">2</span>
                                <div class="fs-5 fs-lg-3 fw-bold text-gray-900">Analyze</div>
                            </div>
                            <div class="fw-semibold fs-6 fs-lg-4 text-muted">Use our analytical tools to identify
                                trends <br> and implement effective interventions.
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 px-5">
                        <div class="text-center mb-10 mb-md-0">
                            <img src="assets/media/illustrations/sketchy-1/12.png" class="mh-125px mb-9"
                                alt="" />
                            <div class="d-flex flex-center mb-5">
                                <span class="badge badge-circle badge-light-success fw-bold p-5 me-3 fs-3">3</span>
                                <div class="fs-5 fs-lg-3 fw-bold text-gray-900">Report</div>
                            </div>
                            <div class="fw-semibold fs-6 fs-lg-4 text-muted">Generate and share comprehensive reports
                                <br> with relevant stakeholders.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="mt-18 mt-sm-18">
            <div class="landing-curve landing-dark-color">
                <svg viewBox="15 -1 1470 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M1 48C4.93573 47.6644 8.85984 47.3311 12.7725 47H1489.16C1493.1 47.3311 1497.04 47.6644 1501 48V47H1489.16C914.668 -1.34764 587.282 -1.61174 12.7725 47H1V48Z"
                        fill="currentColor"></path>
                </svg>
            </div>
            <div class="pt-10 landing-dark-bg">
                <div class="container">
                    <div class="text-center mt-15 mb-15" id="key"
                        data-kt-scroll-offset="{default: 100, lg: 150}">
                        <h3 class="fs-2hx text-white fw-bold mb-5">We Make Things Better</h3>
                        <div class="fs-5 text-gray-700 fw-bold">Enhance school discipline and efficiency with our <br>
                            comprehensive tool.</div>
                    </div>
                    <div class="d-flex flex-center">
                        <div class="d-flex flex-wrap flex-center justify-content-lg-between mb-15 mx-auto w-xl-900px">
                            <div class="d-flex flex-column flex-center h-200px w-200px h-lg-250px w-lg-250px m-3 bgi-no-repeat bgi-position-center bgi-size-contain text-center"
                                style="background-image: url('assets/media/svg/misc/octagon.svg')">
                                <i class="ki-duotone ki-user fs-2tx text-white mb-3">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                    <span class="path3"></span>
                                    <span class="path4"></span>
                                </i>
                                <div class="mb-0">
                                    <div class="fs-lg-2hx fs-2x fw-bold text-white d-flex flex-center">
                                        <div class="min-w-70px" data-kt-countup="true"
                                            data-kt-countup-value="{{ $users->count() }}" data-kt-countup-suffix="+">0
                                        </div>
                                    </div>
                                    <span class="text-gray-600 fw-semibold fs-5 lh-0">Users</span>
                                </div>
                            </div>
                            <div class="d-flex flex-column flex-center h-200px w-200px h-lg-250px w-lg-250px m-3 bgi-no-repeat bgi-position-center bgi-size-contain text-center"
                                style="background-image: url('assets/media/svg/misc/octagon.svg')">
                                <i class="ki-duotone ki-element-11 fs-2tx text-white mb-3">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                    <span class="path3"></span>
                                </i>
                                <div class="mb-0">
                                    <div class="fs-lg-2hx fs-2x fw-bold text-white d-flex flex-center">
                                        <div class="min-w-70px" data-kt-countup="true"
                                            data-kt-countup-value="{{ $violations->count() }}"
                                            data-kt-countup-suffix="+">0</div>
                                    </div>
                                    <span class="text-gray-600 fw-semibold fs-5 lh-0">Violations Recorded</span>
                                </div>
                            </div>
                            <div class="d-flex flex-column flex-center h-200px w-200px h-lg-250px w-lg-250px m-3 bgi-no-repeat bgi-position-center bgi-size-contain text-center"
                                style="background-image: url('assets/media/svg/misc/octagon.svg')">
                                <i class="ki-duotone ki-briefcase fs-2tx text-white mb-3">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                    <span class="path3"></span>
                                    <span class="path4"></span>
                                </i>
                                <div class="mb-0">
                                    <div class="fs-lg-2hx fs-2x fw-bold text-white d-flex flex-center">
                                        <div class="min-w-70px" data-kt-countup="true"
                                            data-kt-countup-value="{{ $students->count() }}"
                                            data-kt-countup-suffix="+">0</div>
                                    </div>
                                    <span class="text-gray-600 fw-semibold fs-5 lh-0">Students</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="mb-0">
            <div class="landing-dark-bg pt-20">
                <div class="container">
                    <div class="row py-10 py-lg-20" id="contact">
                        <div class="col-lg-6 pe-lg-16 mb-10 mb-lg-0">
                            <div class="rounded landing-dark-border p-9 mb-10">
                                <h2 class="text-white">Require a Custom Solution?</h2>
                                <span class="fw-normal fs-4 text-gray-700">Email us to <a
                                        href="mailto:eduguard@gmail.com"
                                        class="text-white opacity-50 text-hover-primary">eduguard@gmail.com</a></span>
                            </div>
                            <div class="rounded landing-dark-border p-9">
                                <h2 class="text-white">Need Help?</h2>
                                <span class="fw-normal fs-4 text-gray-700">Contact our Help Center. <a
                                        href="https://wa.me/082139511153" target="_blank"
                                        class="text-white opacity-50 text-hover-primary">Click to Get a
                                        Number</a></span>
                            </div>
                        </div>
                        <div class="col-lg-6 ps-lg-16">
                            <div class="d-flex justify-content-center">
                                <div class="d-flex fw-semibold flex-column me-20">
                                    <h4 class="fw-bold text-gray-500 mb-6">More for EduGuard</h4>
                                    <a class="text-white opacity-50 text-hover-primary fs-5 mb-6">FAQ</a>
                                    <a class="text-white opacity-50 text-hover-primary fs-5 mb-6">Documentaions</a>
                                    <a class="text-white opacity-50 text-hover-primary fs-5 mb-6">Video
                                        Tutorials</a>
                                    <a class="text-white opacity-50 text-hover-primary fs-5">Blog</a>
                                </div>
                                <div class="d-flex fw-semibold flex-column ms-lg-20">
                                    <h4 class="fw-bold text-gray-500 mb-6">Stay Connected</h4>
                                    <a class="mb-6">
                                        <img src="assets/media/svg/brand-logos/github.svg" class="h-20px me-2"
                                            alt="" />
                                        <span class="text-white opacity-50 text-hover-primary fs-5 mb-6">Github</span>
                                    </a>
                                    <a class="mb-6">
                                        <img src="assets/media/svg/brand-logos/dribbble-icon-1.svg"
                                            class="h-20px me-2" alt="" />
                                        <span
                                            class="text-white opacity-50 text-hover-primary fs-5 mb-6">Dribbble</span>
                                    </a>
                                    <a class="mb-6">
                                        <img src="assets/media/svg/brand-logos/instagram-2-1.svg" class="h-20px me-2"
                                            alt="" />
                                        <span
                                            class="text-white opacity-50 text-hover-primary fs-5 mb-6">Instagram</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="landing-dark-separator"></div>
                <div class="container">
                    <div class="d-flex flex-column flex-md-row flex-stack py-7 py-lg-10">
                        <div class="d-flex align-items-center order-2 order-md-1">
                            <a href="/">
                                <img alt="Logo" src="assets/media/logos/landing.png" class="h-15px h-md-20px" />
                            </a>
                            <span class="mx-5 fs-6 fw-semibold text-gray-600 pt-1" href="/">&copy; 2024
                                EduGuard</span>
                        </div>
                        <ul
                            class="menu menu-gray-600 menu-hover-primary fw-semibold fs-6 fs-md-5 order-1 mb-5 mb-md-0">
                            <li class="menu-item">
                                <a class="menu-link px-2">About</a>
                            </li>
                            <li class="menu-item mx-5">
                                <a class="menu-link px-2">Support</a>
                            </li>
                            <li class="menu-item">
                                <a class="menu-link px-2">Purchase</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div id="kt_scrolltop" class="scrolltop" data-kt-scrolltop="true">
            <i class="ki-duotone ki-arrow-up">
                <span class="path1"></span>
                <span class="path2"></span>
            </i>
        </div>
    </div>
    <div id="kt_scrolltop" class="scrolltop" data-kt-scrolltop="true">
        <i class="ki-duotone ki-arrow-up">
            <span class="path1"></span>
            <span class="path2"></span>
        </i>
    </div>
    <script>
        var hostUrl = "assets/";
    </script>
    <script src="assets/plugins/global/plugins.bundle.js"></script>
    <script src="assets/js/scripts.bundle.js"></script>
    <script src="assets/plugins/custom/fslightbox/fslightbox.bundle.js"></script>
    <script src="assets/plugins/custom/typedjs/typedjs.bundle.js"></script>
    <script src="assets/js/custom/landing.js"></script>
    <script src="assets/js/custom/pages/pricing/general.js"></script>
</body>

</html>
