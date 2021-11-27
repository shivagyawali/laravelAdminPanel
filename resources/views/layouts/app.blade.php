<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ str_replace('_', ' ', config('app.name', 'Merit Credit & Savings')) }} </title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Styles -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <style>
        .alert {
            border: 0;
            border-radius: 0.1875rem;
            color: #fff;
            background-color: green;
            margin-top: -4.8rem;
            z-index: 19100;
            padding-top: .9rem;
            padding-bottom: .9rem;
            position: fixed;
            width: 240px;
            right: 0;
            float: right !important;
        }

    </style>
    <script>
        setTimeout(fade_out, 4000);

        function fade_out() {
            $("#message").fadeOut().empty();
        }
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

</head>

<body class="bg-gray-100 h-screen antialiased leading-none font-sans">
    <div id="app">
        <header class="bg-blue-900 py-6">
            <div class="container mx-auto flex justify-between items-center px-6">
                <div>
                    <a href="{{ url('/') }}" class="text-lg font-semibold text-gray-100 no-underline">
                        {{ str_replace('_', ' ', config('app.name', 'Merit Credit & Savings')) }}
                    </a>
                </div>
                <nav class="space-x-5 text-gray-300 text-sm sm:text-base">
                    @guest
                        <a class="no-underline hover:underline" href="{{ route('login') }}">{{ __('Login') }}</a>
                        {{-- @if (Route::has('register'))
                            <a class="no-underline hover:underline"
                                href="{{ route('register') }}">{{ __('Register') }}</a>
                        @endif --}}
                    @else

                        <div class="flex">
                            <!-- Website Logo -->
                            <a href="" class="flex">

                                <span class="mr-2 font-semibold text-white-500 text-lg">{{ Auth::user()->name }}</span>
                            </a>
                            <a href="{{ route('logout') }}"
                                class="font-semibold  text-white-500 text-lg mr-3 no-underline"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                                {{ csrf_field() }}
                            </form>
                        </div>


                    @endguest
                </nav>
            </div>
        </header>


        <main>
            @if (Auth::check() && auth()->user()->is_admin == 1)
                <div class="md:flex flex-col md:flex-row md:min-h-screen w-full">
                    <div @click.away="open = false"
                        class="flex flex-col w-full md:w-64 text-gray-700 bg-white dark-mode:text-gray-200 dark-mode:bg-gray-800 flex-shrink-0"
                        x-data="{ open: false }">
            @endif
            @if (Auth::check() && auth()->user()->is_admin == 1)
                @include('admin.layouts.sidebar')
            @endif

    </div>
    <div class="md:container md:mx-auto mt-10">
        @if (session('success'))
            <div class="alert float-right bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md"
                role="alert" id="message">
                <div class="flex">
                    <div class="py-1"><svg class="fill-current h-6 w-6 text-teal-500 mr-4"
                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                            <path
                                d="M2.93 17.07A10 10 0 1 1 17.07 2.93 10 10 0 0 1 2.93 17.07zm12.73-1.41A8 8 0 1 0 4.34 4.34a8 8 0 0 0 11.32 11.32zM9 11V9h2v6H9v-4zm0-6h2v2H9V5z" />
                        </svg></div>
                    <div>
                        <p class="font-bold">
                            {{ session('success') }}
                        </p>

                    </div>
                </div>
            </div>
        @endif
        {{-- <a href="{{ URL::previous() }}">
            <button
                class="bg-yellow-500 mb-4 text-white active:bg-lightBlue-600 font-bold uppercase text-xs px-4 py-2 rounded shadow hover:shadow-md outline-none focus:outline-none mr-1 ease-linear transition-all duration-150"
                type="button">
                Back
            </button>
        </a> --}}
        @yield('content')

    </div>

    </div>
    </main>



    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
    <script type="text/javascript">
        $('.show_confirm').click(function(event) {
            var form = $(this).closest("form");
            var name = $(this).data("name");
            event.preventDefault();
            swal({
                    title: `Are you sure you want to delete this record?`,
                    text: "If you delete this, it will be gone forever.",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        form.submit();
                    }
                });
        });
    </script>
</body>

<script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
<script src="{{ asset('ckeditor/config.js') }}"></script>

<script type="text/javascript">
    $(document).ready(function() {
        $('.ckeditor').ckeditor();
    });

    CKEDITOR.editorConfig = function(config) {
        config.language = 'es';
        config.uiColor = '#F7B42C';
        config.height = 300;
        config.toolbarCanCollapse = true;
    };
</script>

</html>
