<!DOCTYPE html>
<html lang="en">

<head>
    <title>{{ setting('title_' . lang()) }}</title>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="csrf_token" value="{{ csrf_token() }}" content="{{ csrf_token() }}" />
    <meta name="user-theme" content="{{ auth()->user()->theme }}" />
    <link rel="icon" href="{{ asset(setting('logo')) }}" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" />
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/lineicons.css') }}" />
    <link href='https://fonts.googleapis.com/css2?family=Tajawal:wght@200;300;400;500;700;800;900&display=swap'
        rel="stylesheet">

    <style>
        :root {
            --main--color: {{ setting('main_color') }};
        }
    </style>
    <link href="{{ asset('css/dashboard.css') }}" rel="stylesheet">

    @stack('css')
    @if (lang('ar'))
        <link href="{{ asset('css/ar.css') }}" rel="stylesheet">
    @else
        <link href="{{ asset('css/en.css') }}" rel="stylesheet">
    @endif
    <style>
        .dropdown-menu.show {
            max-height: 300px;
        }

        .modal-body {
            overflow-x: auto;
        }
    </style>
</head>

<body>
    <aside class="sidebar-nav-wrapper active">
        <div class="navbar-logo">
            <a href="{{ route('admin.home') }}">
                <img src="{{ asset(setting('logo_dark')) }}" alt="logo" style="height: auto;max-width: 200px;" />
            </a>
        </div>
        <nav class="sidebar-nav">
            <ul>
                @include('Admin.Sidebars.visit_website')
                @include('Admin.Sidebars.dashboard')
                @include('Admin.Sidebars.categories')
                @include('Admin.Sidebars.products')
                @include('Admin.Sidebars.branches')

                @include('Admin.Sidebars.faq')
                @include('Admin.Sidebars.vacancy')
                @include('Admin.Sidebars.applicants')
                @include('Admin.Sidebars.orders')
                @include('Admin.Sidebars.payments')
                @include('Admin.Sidebars.lifestyle')
                @include('Admin.Sidebars.banner')
                @include('Admin.Sidebars.coupon')
                @include('Admin.Sidebars.deliveries')
                {{-- @include('Admin.Sidebars.mail_offers') --}}
                @include('Admin.Sidebars.sliders')
                @include('Admin.Sidebars.settings')
                @include('Admin.Sidebars.social_media_icons')
                @include('Admin.Sidebars.admins')
                @include('Admin.Sidebars.clients')
                @include('Admin.Sidebars.reports')
                @include('Admin.Sidebars.countries')
                @include('Admin.Sidebars.contact')
                @include('Admin.Sidebars.lang')
            </ul>
        </nav>
    </aside>
    <div class="overlay"></div>

    <main class="main-wrapper active">
        <header class="header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-5 col-md-5 col-6" style="z-index: 100">
                        <div class="header-left">
                            <div class="menu-toggle-btn mr-20">
                                <button id="menu-toggle" class="main-btn btn-hover">
                                    <i class="lni lni-menu"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-7 col-md-7 col-6">
                        <div class="header-right">
                            <div class="profile-box ml-15">
                                <button class="dropdown-toggle bg-transparent border-0" type="button" id="profile"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    <div class="profile-info">
                                        <div class="info">
                                            <h6>{{ Auth::user()->name }}</h6>
                                        </div>
                                    </div>
                                    <i class="lni lni-chevron-down"></i>
                                </button>
                                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="profile">
                                    <li>
                                        <form method="POST" action="{{ route('admin.logout') }}">
                                            @csrf
                                            <a href="{{ route('admin.logout') }}"
                                                onclick="event.preventDefault(); this.closest('form').submit();"> <i
                                                    class="lni lni-exit"></i> {{ __('trans.logout') }}</a>
                                        </form>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <section class="section">
            <div class="container-fluid">
                <div class="title-wrapper pt-30">
                    <div class="row align-items-center">
                        <div class="col-md-6">
                            <div class="title mb-30">
                                <h2>@yield('pagetitle')</h2>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card-styles">
                    @yield('content')
                </div>
            </div>
        </section>

        <footer class="footer">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6 order-last order-md-first">
                        <div class="copyright text-md-start">
                            <p class="text-sm">
                                @lang('trans.copyrights')
                                <a href="https://emcan-group.com/" rel="nofollow" target="_blank">
                                    {{ __('trans.emcan') }}
                                </a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </main>



    <script src="{{ asset('/js/ion.sound.js') }}"></script>
    @include('sweetalert::alert', ['cdn' => 'https://unpkg.com/sweetalert2@9'])
    <script src="https://cdn.tiny.cloud/1/lj3niasi9s3d111t7rdmcli3m6lwbc6k3gs85xciou7c0oyn/tinymce/6/tinymce.min.js"
        referrerpolicy="origin"></script>
    <script src="{{ asset('js/dashboard.js') }}"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"
        integrity="sha512-uto9mlQzrs59VwILcLiRYeLKPPbS/bT71da/OEBYEwcdNUk8jYIy+D176RYoop1Da+f9mvkYrmj5MCLZWEtQuA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="{{ asset('js/main.js') }}"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.3/css/buttons.dataTables.min.css">
    <script src="//cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.3/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.print.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.colVis.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
    @stack('js')
    <script>
        ion.sound({
            sounds: [{
                    name: "door_bell"
                },
                {
                    name: "door_bell"
                }
            ],
            path: "/sounds/",
            preload: true,
            volume: 1.0
        });
        @if (\App\Models\Order::where('status', 0)->count() > 0)
            var audio = new Audio("/sounds/new_order.mp3");
            audio.play();
        @endif
        setInterval(function() {
            $.ajax({
                type: "GET",
                url: "{{ route('admin.orders.last_order_id') }}",
                data: {
                    last_order_id: {{ \App\Models\Order::orderby('id', 'desc')->first()?->id ?? 0 }}
                },
                dataType: 'text',
                cache: false,
                success: function(Data) {
                    if (Data > 0) {
                        ion.sound.play("door_bell", {
                            loop: 10
                        });
                    }
                },
            });
        }, 10000);
    </script>
</body>

</html>
