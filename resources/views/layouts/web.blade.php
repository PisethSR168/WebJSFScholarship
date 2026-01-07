<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>JSF Scholarship</title>
    <!-- SwiperJS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
    <!-- AOS -->
    <link href="https://unpkg.com/aos@2.3.4/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>
    <!-- Fancybox -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.css" />
    <script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.umd.js"></script>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">


    <style>
        body {
            font-family: sans-serif;
        }

        .swiper-slide {
            width: auto;
        }

        /* Offcanvas transitions */
        .offcanvas {
            transform: translateX(-100%);
            transition: transform 0.3s ease-in-out;
        }

        .offcanvas.open {
            transform: translateX(0);
        }

        .backdrop {
            opacity: 0;
            visibility: hidden;
            transition: opacity 0.3s ease-in-out, visibility 0.3s ease-in-out;
        }

        .backdrop.open {
            opacity: 1;
            visibility: visible;
        }

        /* small helper for smooth submenu transitions */
        .submenu {
            display: none;
        }

        .no-select {
            -webkit-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }

        /* Hero video cover */
        .hero-video {
            object-fit: cover;
            width: 100%;
            height: 100%;
        }

        .footer-gradient {
            background: linear-gradient(135deg, #1e3a8a 0%, #0f172a 100%);
        }

        .dark .footer-gradient {
            background: linear-gradient(135deg, #0f172a 0%, #020617 100%);
        }

        .gradient-text {
            background: linear-gradient(to right, white, #3b82f6);
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
        }

        .dark .gradient-text {
            background: linear-gradient(to right, #e2e8f0, #60a5fa);
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
        }

        .hero-gradient {
            background: linear-gradient(135deg, #1e3a8a 0%, #0f172a 100%);
        }

        .header-btn {
            padding: 10px 25px;
            border: 2px solid #667eea;
            background: transparent;
            color: #667eea;
            border-radius: 8px;
            font-size: 14px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            text-decoration: none;
            display: inline-block;
        }

        .header-btn:hover {
            background: #667eea;
            color: white;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(102, 126, 234, 0.3);
        }

        .header-btn.active {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            border: none;
        }
    </style>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-50 text-gray-800 dark:bg-gray-900 dark:text-gray-100 transition-colors duration-300">
    <!-- Container -->
    <div class="min-h-screen flex flex-col">
        <!-- Header / Nav -->
        @include('web.partials.header')
        <!-- Main -->
        <main class="flex-1">
            @yield('content')
        </main>
        @include('web.partials.footer')
    </div>
    <script src="{{ asset('assets/js/jquery.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    @stack('scripts')
    @stack('script')
    <script>
        $(document).ready(function () {

            /* -------------------------------
               AOS
            -------------------------------- */
            AOS.init({
                duration: 1000,
                once: true,
                offset: 100
            });

            /* -------------------------------
               Offcanvas Open / Close (Mobile)
            -------------------------------- */
            $('#mobileOpen').on('click', function () {
                $('#offcanvasMenu').addClass('open');
                $('#offcanvasBackdrop').addClass('open');
                $('body').css('overflow', 'hidden');
            });

            function closeOffcanvas() {
                $('#offcanvasMenu').removeClass('open');
                $('#offcanvasBackdrop').removeClass('open');
                $('body').css('overflow', '');
                $('.mobile-submenu').addClass('hidden');
            }

            $('#mobileClose, #offcanvasBackdrop, #offcanvasMenu a').on('click', closeOffcanvas);

            /* -------------------------------
               Mobile Submenu Toggle
            -------------------------------- */
            $('.mobile-menu-toggle').on('click', function () {
                let submenu = $(this).closest('.mobile-menu-section').find('.mobile-submenu');
                let icon = $(this).find('.fa-chevron-down');

                submenu.toggleClass('hidden');
                icon.toggleClass('rotate-180');
            });

            /* -------------------------------
               Desktop Menu Hover Submenu
            -------------------------------- */
            $('.group').hover(
                function () {
                    $(this).find('.submenu').stop(true, true).fadeIn(150);
                },
                function () {
                    $(this).find('.submenu').stop(true, true).fadeOut(120);
                }
            );

            /* -------------------------------
               Dark Mode
            -------------------------------- */
            function setDarkMode(isDark) {
                $('html').toggleClass('dark', isDark);
                localStorage.setItem('watdamnak_dark', isDark ? '1' : '0');
            }

            let savedMode = localStorage.getItem('watdamnak_dark');
            if (savedMode === null) {
                setDarkMode(window.matchMedia('(prefers-color-scheme: dark)').matches);
            } else {
                setDarkMode(savedMode === '1');
            }

            $('.darkToggle').on('click', function () {
                setDarkMode(!$('html').hasClass('dark'));
            });

            /* -------------------------------
               Escape key closes menu
            -------------------------------- */
            $(document).on('keydown', function (e) {
                if (e.key === 'Escape') closeOffcanvas();
            });

            /* -------------------------------
               Swiper
            -------------------------------- */
            new Swiper('.mySwiper', {
                loop: true,
                autoplay: {
                    delay: 4500
                },
                pagination: {
                    el: '.swiper-pagination',
                    clickable: true
                },
            });

            new Swiper('.staffSwiper', {
                slidesPerView: 1,
                spaceBetween: 20,
                loop: true,
                autoplay: {
                    delay: 3000,
                    disableOnInteraction: false,
                },
                pagination: {
                    el: '.swiper-pagination',
                    clickable: true
                },
                navigation: false,
                breakpoints: {
                    640: {
                        slidesPerView: 2
                    },
                    1024: {
                        slidesPerView: 3
                    }
                },
            });

            new Swiper('.studentSwiper', {
                slidesPerView: 1,
                spaceBetween: 20,
                loop: true,
                autoplay: {
                    delay: 3500
                },
                pagination: {
                    el: '.swiper-pagination',
                    clickable: true
                },
                navigation: false,
                breakpoints: {
                    640: {
                        slidesPerView: 2
                    },
                    1024: {
                        slidesPerView: 3
                    }
                },
            });

            /* -------------------------------
               Fancybox
            -------------------------------- */
            Fancybox.bind("[data-fancybox]", {});
        });
    </script>
</body>

</html>