<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" class="opacity-0" lang="en"><!-- BEGIN: Head -->

<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<meta name="csrf-token" content="{{ csrf_token() }}">

<head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="Koo2zWJKliRELq4FawEfkQPg3CJYusp6ppGFZw4O">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description"
        content="Midone admin is super flexible, powerful, clean & modern responsive tailwind admin template with unlimited possibilities.">
    <meta name="keywords"
        content="admin template, midone Admin Template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="LEFT4CODE">
    <title>Capex</title>
    <!-- BEGIN: CSS Assets-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
        integrity="" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{ asset('assets') }}/dist/css/vendors/tippy.css">
    <link rel="stylesheet" href="{{ asset('assets') }}/dist/css/vendors/litepicker.css">
    <link rel="stylesheet" href="{{ asset('assets') }}/dist/css/vendors/tiny-slider.css">
    <link rel="stylesheet" href="{{ asset('assets') }}/dist/css/themes/rubick/side-nav.css">
    <link rel="stylesheet" href="{{ asset('assets') }}/dist/css/vendors/leaflet.css">
    <link rel="stylesheet" href="{{ asset('assets') }}/dist/css/vendors/simplebar.css">
    <link rel="stylesheet" href="{{ asset('assets') }}/dist/css/components/mobile-menu.css">
    <link rel="stylesheet" href="{{ asset('assets') }}/dist/css/vendors/tom-select.css">
    <link rel="stylesheet" href="{{ asset('assets') }}/dist/css/app.css"> <!-- END: CSS Assets-->
    <link rel="stylesheet" href="{{ asset('assets') }}/css/style.css"> <!-- END: CSS Assets-->
    <script src="{{ asset('assets') }}/dist/js/vendors/dom.js"></script>
    <script src="{{ asset('assets') }}/js/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.datatables.net/2.1.8/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/2.1.8/js/dataTables.tailwindcss.js"></script>
    <script src="{{ asset('assets') }}/dist/js/vendors/lucide.js"></script>
    <script src="{{ asset('assets') }}/dist/js/vendors/tailwind-merge.js"></script>
    <script src="{{ asset('assets') }}/dist/js/vendors/tom-select.js"></script>


    <script src="{{ asset('assets') }}/js/custom/ajaxsetup.js"></script>

</head>
<!-- END: Head -->

<body>

    <div
        class="rubick px-5 sm:px-8 py-5 bodyPaddLeftRight before:content-[''] before:bg-gradient-to-b before:from-theme-1 before:to-theme-2 dark:before:from-darkmode-800 dark:before:to-darkmode-800 before:fixed before:inset-0 before:z-[-1]">
        <!-- BEGIN: Mobile Menu -->
        <div
            class="mobile-menu group top-0 inset-x-0 fixed bg-theme-1/90 z-[60] border-b border-white/[0.08] dark:bg-darkmode-800/90 md:hidden before:content-[''] before:w-full before:h-screen before:z-10 before:fixed before:inset-x-0 before:bg-black/90 before:transition-opacity before:duration-200 before:ease-in-out before:invisible before:opacity-0 [&.mobile-menu--active]:before:visible [&.mobile-menu--active]:before:opacity-100">
            <div class="flex h-[70px] items-center px-3 sm:px-8">
                <a class="mr-auto flex" href="#">
                    <img class="w-6" src="{{ asset('assets') }}/dist/images/logo.png" alt="GEPL Capex">
                </a>
                <a class="mobile-menu-toggler" href="#">
                    <i data-tw-merge="" data-lucide="bar-chart2"
                        class="stroke-1.5 h-8 w-8 -rotate-90 transform text-white"></i>
                </a>
            </div>
            <div
                class="scrollable h-screen z-20 top-0 left-0 w-[270px] -ml-[100%] bg-primary transition-all duration-300 ease-in-out dark:bg-darkmode-800 [&[data-simplebar]]:fixed [&_.simplebar-scrollbar]:before:bg-black/50 group-[.mobile-menu--active]:ml-0">
                <a href="#"
                    class="fixed top-0 right-0 mt-4 mr-4 transition-opacity duration-200 ease-in-out invisible opacity-0 group-[.mobile-menu--active]:visible group-[.mobile-menu--active]:opacity-100">
                    <i data-tw-merge="" data-lucide="x-circle"
                        class="stroke-1.5 mobile-menu-toggler h-8 w-8 -rotate-90 transform text-white"></i>
                </a>
                <ul class="py-2">
                    <li>
                        <a class="menu menu--active" href="rubick-side-menu-inbox-page.html">
                            <div class="menu__icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round" data-lucide="inbox"
                                    class="lucide lucide-inbox stroke-1.5 w-5 h-5">
                                    <polyline points="22 12 16 12 14 15 10 15 8 12 2 12"></polyline>
                                    <path
                                        d="M5.45 5.11 2 12v6a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2v-6l-3.45-6.89A2 2 0 0 0 16.76 4H7.24a2 2 0 0 0-1.79 1.11z">
                                    </path>
                                </svg>
                            </div>
                            <div class="menu__title">
                                Inbox
                            </div>
                        </a>
                    </li>

                    <li>
                        <a class="menu" href="javascript:;">
                            <div class="menu__icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round" data-lucide="home"
                                    class="lucide lucide-home stroke-1.5 w-5 h-5">
                                    <path d="m3 9 9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                                    <polyline points="9 22 9 12 15 12 15 22"></polyline>
                                </svg>
                            </div>
                            <div class="menu__title">
                                Dashboard
                                <div class="menu__sub-icon transform rotate-180">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round" data-lucide="chevron-down"
                                        class="lucide lucide-chevron-down stroke-1.5 w-5 h-5">
                                        <path d="m6 9 6 6 6-6"></path>
                                    </svg>
                                </div>
                            </div>
                        </a>
                        <ul class="menu__sub-open" style="display: block;">
                            <li>
                                <a class="menu" href="rubick-side-menu-dashboard-overview-1-page.html">
                                    <div class="menu__icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                            data-lucide="activity" class="lucide lucide-activity stroke-1.5 w-5 h-5">
                                            <path d="M22 12h-4l-3 9L9 3l-3 9H2"></path>
                                        </svg>
                                    </div>
                                    <div class="menu__title">
                                        Overview 1
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a class="menu" href="rubick-side-menu-dashboard-overview-2-page.html">
                                    <div class="menu__icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                            data-lucide="activity" class="lucide lucide-activity stroke-1.5 w-5 h-5">
                                            <path d="M22 12h-4l-3 9L9 3l-3 9H2"></path>
                                        </svg>
                                    </div>
                                    <div class="menu__title">
                                        Overview 2
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a class="menu" href="rubick-side-menu-dashboard-overview-3-page.html">
                                    <div class="menu__icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                            data-lucide="activity" class="lucide lucide-activity stroke-1.5 w-5 h-5">
                                            <path d="M22 12h-4l-3 9L9 3l-3 9H2"></path>
                                        </svg>
                                    </div>
                                    <div class="menu__title">
                                        Overview 3
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a class="menu" href="rubick-side-menu-dashboard-overview-4-page.html">
                                    <div class="menu__icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                            data-lucide="activity" class="lucide lucide-activity stroke-1.5 w-5 h-5">
                                            <path d="M22 12h-4l-3 9L9 3l-3 9H2"></path>
                                        </svg>
                                    </div>
                                    <div class="menu__title">
                                        Overview 4
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
        <!-- END: Mobile Menu -->


        <div class="mt-[4.7rem] flex md:mt-0">
            <!-- BEGIN: Side Menu -->
            <nav class="side-nav hidden w-[80px] overflow-x-hidden pb-16 pr-5 md:block xl:w-[230px]">
                <a class="flex items-center pt-4 pl-5 intro-x" href="#">
                    <img class="w-6" src="{{ asset('assets') }}/dist/images/logo.png" alt="GEPL Capex">
                    <span class="hidden ml-3 text-lg text-white xl:block"> Capex-Employee </span>
                </a>
                <div class="my-6 side-nav__divider"></div>
                <input type="hidden" name="base_url" id="base_url" value="{{ url('/') }}">
                <ul>
                    @php
                        $capexEmployee = session()->get('capexEmployee');
                       // pre($capexEmployee['emp_type']);exit;
                        $roleId = $capexEmployee['roleId'];
                        $name = $capexEmployee['employeeName'];
                        $role = $capexEmployee['role'];
                    @endphp
                    {!! getTopNavCat($roleId) !!}
                </ul>

            </nav>
            <!-- END: Side Menu -->
            <!-- BEGIN: Content -->
            <div
                class="md:max-w-auto min-h-screen min-w-0 max-w-full flex-1 rounded-[30px] bg-slate-100 px-4 pb-10 before:block before:h-px before:w-full before:content-[''] dark:bg-darkmode-700 md:px-[22px]">
                <!-- BEGIN: Top Bar -->
                <div class="relative z-[51] flex h-[67px] items-center border-b border-slate-200">
                    <!-- BEGIN: Breadcrumb -->
                    <nav aria-label="breadcrumb" class="flex -intro-x mr-auto hidden sm:flex">
                        <ol class="flex items-center text-theme-1 dark:text-slate-300">
                            <li class="">
                                <a href="#">Application</a>
                            </li>
                            <li
                                class="relative ml-5 pl-0.5 before:content-[''] before:w-[14px] before:h-[14px] before:bg-chevron-black before:transform before:rotate-[-90deg] before:bg-[length:100%] before:-ml-[1.125rem] before:absolute before:my-auto before:inset-y-0 dark:before:bg-chevron-white text-slate-800 cursor-text dark:text-slate-400">
                                {{-- <a href="#">Dashboard</a> --}}
                                <a href="#"> @yield('title', '')</a>
                            </li>
                        </ol>
                    </nav>
                    <!-- END: Breadcrumb -->

                    
                    <!-- BEGIN: Account Menu -->
                    <div data-tw-merge="" data-tw-placement="bottom-end" class="dropdown relative"><button
                            data-tw-toggle="dropdown" aria-expanded="false"
                            class="cursor-pointer image-fit zoom-in intro-x block h-8 w-8 overflow-hidden rounded-full shadow-lg"><img
                                src="{{ asset('assets') }}/dist/images/fakers/profile-5.jpg" alt="GEPL Capex">
                        </button>
                        <div data-transition="" data-selector=".show"
                            data-enter="transition-all ease-linear duration-150"
                            data-enter-from="absolute !mt-5 invisible opacity-0 translate-y-1"
                            data-enter-to="!mt-1 visible opacity-100 translate-y-0"
                            data-leave="transition-all ease-linear duration-150"
                            data-leave-from="!mt-1 visible opacity-100 translate-y-0"
                            data-leave-to="absolute !mt-5 invisible opacity-0 translate-y-1"
                            class="dropdown-menu absolute z-[9999] hidden">
                            <div data-tw-merge=""
                                class="dropdown-content rounded-md border-transparent p-2 shadow-[0px_3px_10px_#00000017] dark:border-transparent dark:bg-darkmode-600 mt-px w-56 bg-theme-1 text-white">
                                <div class="p-2 font-medium font-normal">
                                    <div class="font-medium">{{ $name }}</div>
                                    <div class="mt-0.5 text-xs text-white/70 dark:text-slate-500">
                                        {{ $role }}-{{ $capexEmployee['empCode'] }}
                                    </div>
                                </div>
                                <div class="h-px my-2 -mx-2 bg-slate-200/60 dark:bg-darkmode-400 bg-white/[0.08]">
                                </div>
                                <a
                                    class="cursor-pointer flex items-center p-2 transition duration-300 ease-in-out rounded-md hover:bg-slate-200/60 dark:bg-darkmode-600 dark:hover:bg-darkmode-400 dropdown-item hover:bg-white/5"><i
                                        data-tw-merge="" data-lucide="user" class="stroke-1.5 mr-2 h-4 w-4"></i>
                                    Profile</a>
                             
                                <a
                                    class="cursor-pointer flex items-center p-2 transition duration-300 ease-in-out rounded-md hover:bg-slate-200/60 dark:bg-darkmode-600 dark:hover:bg-darkmode-400 dropdown-item hover:bg-white/5"><i
                                        data-tw-merge="" data-lucide="lock" class="stroke-1.5 mr-2 h-4 w-4"></i>
                                    Reset Password</a>
                            
                                <div class="h-px my-2 -mx-2 bg-slate-200/60 dark:bg-darkmode-400 bg-white/[0.08]">
                                </div>
                                <a href="{{ url('logout') }}"
                                    class="cursor-pointer flex items-center p-2 transition duration-300 ease-in-out rounded-md hover:bg-slate-200/60 dark:bg-darkmode-600 dark:hover:bg-darkmode-400 dropdown-item hover:bg-white/5"><i
                                        data-tw-merge="" data-lucide="toggle-right"
                                        class="stroke-1.5 mr-2 h-4 w-4"></i>
                                    Logout</a>
                            </div>
                        </div>
                    </div>
                    <!-- END: Account Menu -->
                </div>
                <!-- END: Top Bar -->

                {!! $bodyView !!}




            </div>
            <!-- END: Content -->
        </div>
    </div>
    <!-- BEGIN: Vendor JS Assets-->
    <script src="{{ asset('assets') }}/dist/js/vendors/tippy.js"></script>
    <script src="{{ asset('assets') }}/dist/js/vendors/dayjs.js"></script>
    <script src="{{ asset('assets') }}/dist/js/vendors/litepicker.js"></script>
    <script src="{{ asset('assets') }}/dist/js/vendors/popper.js"></script>
    <script src="{{ asset('assets') }}/dist/js/vendors/dropdown.js"></script>
    <script src="{{ asset('assets') }}/dist/js/vendors/tiny-slider.js"></script>
    <script src="{{ asset('assets') }}/dist/js/vendors/transition.js"></script>
    <script src="{{ asset('assets') }}/dist/js/vendors/chartjs.js"></script>
    <script src="{{ asset('assets') }}/dist/js/vendors/leaflet-map.js"></script>
    <script src="{{ asset('assets') }}/dist/js/vendors/axios.js"></script>
    <script src="{{ asset('assets') }}/dist/js/utils/colors.js"></script>
    <script src="{{ asset('assets') }}/dist/js/utils/helper.js"></script>
    <script src="{{ asset('assets') }}/dist/js/vendors/simplebar.js"></script>
    <script src="{{ asset('assets') }}/dist/js/vendors/modal.js"></script>

    <script src="{{ asset('assets') }}/dist/js/components/base/theme-color.js"></script>
    <script src="{{ asset('assets') }}/dist/js/components/base/lucide.js"></script>
    <script src="{{ asset('assets') }}/dist/js/components/base/tippy.js"></script>
    <script src="{{ asset('assets') }}/dist/js/components/base/litepicker.js"></script>
    <script src="{{ asset('assets') }}/dist/js/components/report-line-chart.js"></script>
    <script src="{{ asset('assets') }}/dist/js/components/report-pie-chart.js"></script>
    <script src="{{ asset('assets') }}/dist/js/components/report-donut-chart.js"></script>
    <script src="{{ asset('assets') }}/dist/js/components/report-donut-chart-1.js"></script>
    <script src="{{ asset('assets') }}/dist/js/components/simple-line-chart-1.js"></script>
    <script src="{{ asset('assets') }}/dist/js/components/base/tiny-slider.js"></script>
    <script src="{{ asset('assets') }}/dist/js/themes/rubick.js"></script>
    <script src="{{ asset('assets') }}/dist/js/components/base/leaflet-map-loader.js"></script>
    <script src="{{ asset('assets') }}/dist/js/components/mobile-menu.js"></script>
    <script src="{{ asset('assets') }}/dist/js/components/themes/rubick/top-bar.js"></script>
    <script src="{{ asset('assets') }}/js/custom/common.js"></script>
    <!-- END: Vendor JS Assets-->



    <!-- BEGIN: Pages, layouts, components JS Assets-->
    <!-- END: Pages, layouts, components JS Assets-->



    <!-- BEGIN: Slide Over Content -->
    <div data-tw-backdrop="static" aria-hidden="true" tabindex="-1" id="header-footer-slide-over-preview"
        class="modal group bg-black/60 transition-[visibility,opacity] w-screen h-screen fixed left-0 top-0 [&:not(.show)]:duration-[0s,0.2s] [&:not(.show)]:delay-[0.2s,0s] [&:not(.show)]:invisible [&:not(.show)]:opacity-0 [&.show]:visible [&.show]:opacity-100 [&.show]:duration-[0s,0.4s]">
        <!-- BEGIN: Slide Over Header -->
        <div data-tw-merge=""
            class="w-[90%] ml-auto h-screen flex flex-col bg-white relative shadow-md transition-[margin-right] duration-[0.6s] -mr-[100%] group-[.show]:mr-0 dark:bg-darkmode-600 sm:w-[460px]">
            <a class="absolute top-0 left-0 right-auto mt-4 -ml-10 sm:-ml-12" data-tw-dismiss="modal" href="#">
                <i data-tw-merge="" data-lucide="x" class="stroke-1.5 w-8 h-8 text-slate-400"></i>
            </a>
            <div data-tw-merge=""
                class="flex items-center px-5 py-3 border-b border-slate-200/60 dark:border-darkmode-400"
                style="background-color: #1d3885 !important;color: #fff !important;">
                <h2 class="mr-auto text-base font-medium" id="slide-over-title">
                   
                </h2>


            </div>
            <!-- END: Slide Over Header -->
            <!-- BEGIN: Slide Over Body -->
            <div data-tw-merge="" class="p-5 overflow-y-auto flex-1">

                <div id="model_data_details"></div>
            </div>
            <!-- END: Slide Over Body -->
            <!-- BEGIN: Slide Over Footer -->
            {{-- <div class="px-5 py-3 text-right border-t border-slate-200/60 dark:border-darkmode-400">
            <button data-tw-merge="" data-tw-dismiss="modal" type="button" class="transition duration-200 border shadow-sm inline-flex items-center justify-center py-2 px-3 rounded-md font-medium cursor-pointer focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus-visible:outline-none dark:focus:ring-slate-700 dark:focus:ring-opacity-50 [&:hover:not(:disabled)]:bg-opacity-90 [&:hover:not(:disabled)]:border-opacity-90 [&:not(button)]:text-center disabled:opacity-70 disabled:cursor-not-allowed border-secondary text-slate-500 dark:border-darkmode-100/40 dark:text-slate-300 [&:hover:not(:disabled)]:bg-secondary/20 [&:hover:not(:disabled)]:dark:bg-darkmode-100/10 w-20 mr-1">Cancel</button>
            <button data-tw-merge="" type="button" class="transition duration-200 border shadow-sm inline-flex items-center justify-center py-2 px-3 rounded-md font-medium cursor-pointer focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus-visible:outline-none dark:focus:ring-slate-700 dark:focus:ring-opacity-50 [&:hover:not(:disabled)]:bg-opacity-90 [&:hover:not(:disabled)]:border-opacity-90 [&:not(button)]:text-center disabled:opacity-70 disabled:cursor-not-allowed bg-primary border-primary text-white dark:border-primary w-20">Send</button>
        </div> --}}
        </div>
        <!-- END: Slide Over Footer -->
    </div>
    <!-- END: Slide Over Content -->
</body>

<!-- Mirrored from midone-html.vercel.app/rubick-side-menu-dashboard-overview-1-page.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 30 Dec 2024 13:46:53 GMT -->

</html>
