<header
    class="bg-white/90 dark:bg-gray-800/60 backdrop-blur sticky top-0 z-40 shadow-sm border-b border-slate-300 dark:border-slate-600">
    <div class="max-w-7xl xl:max-w-[96rem] mx-auto px-4 py-3 flex items-center justify-between">
        <div class="flex items-center gap-4">
            <a href="{{route('web.home')}}" class="flex items-center gap-3">
                <img src="{{ asset('assets/images/joel_logo.png') }}" alt="logo"
                    class="size-14 rounded-full border" />
                <div class="hidden sm:block">
                    <div class="font-semibold text-lg">JSF</div>
                    <div class="text-xs text-gray-500 dark:text-gray-400">Scholarship</div>
                </div>
            </a>
        </div>

        <!-- Desktop Navigation -->
        <nav class="hidden lg:flex items-center gap-6">
            <ul class="flex gap-2 items-center">
                <li class="group relative">
                    <a href="{{ route('web.home') }}"
                        class="border-b-2 {{ request()->routeIs('web.home') ? 'border-orange-500 text-orange-500' : 'border-transparent hover:border-orange-500 hover:text-orange-500' }} px-3 py-2 transition-colors duration-200">
                        Home
                    </a>
                </li>
                <li class="group relative">
                    <a href="{{ route('web.about') }}" 
                        class="border-b-2 {{ request()->routeIs('web.about') ? 'border-orange-500 text-orange-500' : 'border-transparent hover:border-orange-500 hover:text-orange-500' }} px-3 py-2 transition-colors duration-200">
                        Who I Am
                    </a>
                </li>

                <li class="group relative">
                    <a href="{{ route('web.whatwedo') }}"
                        class="border-b-2 {{ request()->routeIs('web.whatwedo') ? 'border-orange-500 text-orange-500' : 'border-transparent hover:border-orange-500 hover:text-orange-500' }} px-3 py-2 transition-colors duration-200">
                        What We Do
                    </a>
                </li>

                <li class="group relative">
                    <button
                        class="border-b-2 border-transparent hover:border-orange-500 hover:text-orange-500 px-3 py-2 flex items-center gap-2 submenu-toggle no-select transition-colors duration-200">
                        Activity
                        <svg class="w-3 h-3 transition-transform duration-200 group-hover:rotate-180"
                            viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd"
                                d="M5.23 7.21a.75.75 0 011.06.02L10 10.94l3.71-3.71a.75.75 0 111.06 1.06l-4.24 4.24a.75.75 0 01-1.06 0L5.21 8.29a.75.75 0 01.02-1.08z"
                                clip-rule="evenodd" />
                        </svg>
                    </button>
                    <ul
                        class="submenu absolute left-0 mt-2 w-48 bg-white dark:bg-gray-800 rounded-md shadow-lg py-2 border border-gray-200 dark:border-gray-700">
                        <li>
                            <a href="#events"
                                class="block px-4 py-2 {{ request()->routeIs('web.events') ? 'bg-gray-100 dark:bg-gray-700 text-orange-500' : 'hover:bg-gray-100 dark:hover:bg-gray-700' }} transition-colors duration-200">
                                Events
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('web.news') }}"
                                class="block px-4 py-2 {{ request()->routeIs('web.news') ? 'bg-gray-100 dark:bg-gray-700 text-orange-500' : 'hover:bg-gray-100 dark:hover:bg-gray-700' }} transition-colors duration-200">
                                News
                            </a>
                        </li>
                    </ul>
                </li>

                <li>
                    <a href="{{ route('web.contact') }}"
                        class="border-b-2 {{ request()->routeIs('web.contact') ? 'border-orange-500 text-orange-500' : 'border-transparent hover:border-orange-500 hover:text-orange-500' }} px-3 py-2 transition-colors duration-200">
                        Contact Us
                    </a>
                </li>
            </ul>
        </nav>
        
        <div class="relative">
            <a href="{{ route('web.donation') }}"
                class="px-3 py-2 border border-orange-500 rounded-md bg-orange-500 hover:bg-transparent dark:hover:bg-gray-7 hover:text-orange-500 text-slate-100 transition-colors duration-200 cursor-pointer">
                <i
                    class="fas fa-hand-holding-heart w-5 group-hover:text-blue-500 transition-colors duration-200"></i>
                Donation
            </a>
        </div>
        <div class="flex items-center gap-2">
            <a href="{{ route('login') }}" class="header-btn">Login</a>
            <a href="{{ route('register') }}" class="header-btn">Register</a>
        </div>
        <!-- Desktop Theme Toggle -->
        <button id="darkToggle"
            class="darkToggle size-9 hidden lg:flex items-center justify-center rounded-full cursor-pointer p-2 border border-slate-300 dark:border-slate-700 hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors duration-200"
            title="Toggle dark mode">
            <i class="fas fa-moon"></i>
        </button>
        <!-- Mobile controls -->
        <div class="flex items-center gap-3 lg:hidden">
            <button id="mobileOpen"
                class="bg-indigo-800 cursor-pointer text-slate-200 size-9 flex items-center justify-center rounded-full p-2 
                border hover:bg-slate-100 hover:text-indigo-800 dark:hover:bg-gray-700 transition-colors duration-200"
                aria-expanded="false">
                <i class="fas fa-bars"></i>
            </button>
        </div>
    </div>
</header>


<!-- Offcanvas Backdrop -->
<div id="offcanvasBackdrop" class="backdrop fixed inset-0 bg-black/50 z-50 lg:hidden"></div>
<!-- Offcanvas Menu -->
<div id="offcanvasMenu"
    class="offcanvas fixed top-0 left-0 h-full w-80 bg-white dark:bg-gray-800 shadow-xl z-50 lg:hidden overflow-y-auto">
    <!-- Offcanvas Header -->
    <div class="flex items-center justify-between p-4 border-b border-gray-200 dark:border-gray-700">
        <div class="flex items-center gap-3">
            <img src="{{ asset('assets/images/joel_logo.png') }}" alt="logo"
                class="size-12 rounded-full border" />
            <div>
                <div class="font-semibold text-lg">JSF</div>
                <div class="text-xs text-gray-500 dark:text-gray-400">Scholarship</div>
            </div>
        </div>
        <button id="mobileClose"
            class="size-8 flex justify-center items-center cursor-pointer dark:text-red-500
             hover:bg-red-500 hover:text-slate-200 dark:hover:text-red-500 text-red-500 p-2 rounded-md dark:hover:bg-gray-700 transition-colors duration-200">
            <i class="fas fa-times text-lg"></i>
        </button>
    </div>

    <!-- Offcanvas Body -->
    <div class="p-4">
        <nav class="space-y-2">
            <a href="{{ route('web.home') }}"
                class="flex items-center gap-3 px-3 py-3 rounded-lg {{ request()->routeIs('web.home') ? 'bg-gray-100 dark:bg-gray-700 text-orange-500' : 'hover:bg-gray-100 dark:hover:bg-gray-700' }} transition-colors duration-200 group">
                <i class="fas fa-home w-5 {{ request()->routeIs('web.home') ? 'text-orange-500' : 'text-gray-400 group-hover:text-blue-500' }} transition-colors duration-200"></i>
                <span>Home</span>
            </a>
            
            <a href="{{ route('web.about') }}"
                class="flex items-center gap-3 px-3 py-3 rounded-lg {{ request()->routeIs('web.about') ? 'bg-gray-100 dark:bg-gray-700 text-orange-500' : 'hover:bg-gray-100 dark:hover:bg-gray-700' }} transition-colors duration-200 group">
                <i class="fas fa-user w-5 {{ request()->routeIs('web.about') ? 'text-orange-500' : 'text-gray-400 group-hover:text-blue-500' }} transition-colors duration-200"></i>
                <span>Who I Am</span>
            </a>

            <a href="{{ route('web.whatwedo') }}"
                class="flex items-center gap-3 px-3 py-3 rounded-lg {{ request()->routeIs('web.whatwedo') ? 'bg-gray-100 dark:bg-gray-700 text-orange-500' : 'hover:bg-gray-100 dark:hover:bg-gray-700' }} transition-colors duration-200 group">
                <i class="fas fa-tasks w-5 {{ request()->routeIs('web.whatwedo') ? 'text-orange-500' : 'text-gray-400 group-hover:text-blue-500' }} transition-colors duration-200"></i>
                <span>What We Do</span>
            </a>

            <!-- Activity Section -->
            <div class="mobile-menu-section">
                <div
                    class="w-full flex items-center justify-between px-3 py-3 rounded-lg {{ request()->routeIs('web.news', 'web.events') ? 'bg-gray-100 dark:bg-gray-700 text-orange-500' : 'hover:bg-gray-100 dark:hover:bg-gray-700' }} transition-colors duration-200 group">
                    <a href="#"
                        class="w-full">
                        <div class="flex items-center gap-3">
                            <i class="fas fa-calendar-alt w-5 {{ request()->routeIs('web.news', 'web.events') ? 'text-orange-500' : 'text-gray-400 group-hover:text-blue-500' }} transition-colors duration-200"></i>
                            <span>Activity</span>
                        </div>
                    </a>
                    <button
                        class="mobile-menu-toggle group cursor-pointer size-6 flex justify-center items-center border border-slate-200 dark:border-slate-700 rounded-full hover:bg-gray-200 dark:hover:bg-gray-700 transition-colors duration-200">
                        <i
                            class="fas fa-chevron-down text-xs text-gray-400 transition-transform duration-200"></i>
                    </button>
                </div>

                <div class="mobile-submenu pl-8 hidden">
                    <a href="#events"
                        class="block py-2 px-3 rounded-lg {{ request()->routeIs('web.events') ? 'bg-gray-100 dark:bg-gray-700 text-orange-500' : 'hover:bg-gray-100 dark:hover:bg-gray-700' }} transition-colors duration-200">
                        Events
                    </a>
                    <a href="{{ route('web.news') }}"
                        class="block py-2 px-3 rounded-lg {{ request()->routeIs('web.news') ? 'bg-gray-100 dark:bg-gray-700 text-orange-500' : 'hover:bg-gray-100 dark:hover:bg-gray-700' }} transition-colors duration-200">
                        News
                    </a>
                </div>
            </div>

            <a href="{{ route('web.contact') }}"
                class="flex items-center gap-3 px-3 py-3 rounded-lg {{ request()->routeIs('web.contact') ? 'bg-gray-100 dark:bg-gray-700 text-orange-500' : 'hover:bg-gray-100 dark:hover:bg-gray-700' }} transition-colors duration-200 group">
                <i class="fas fa-envelope w-5 {{ request()->routeIs('web.contact') ? 'text-orange-500' : 'text-gray-400 group-hover:text-blue-500' }} transition-colors duration-200"></i>
                <span>Contact Us</span>
            </a>

            <div class="flex gap-2 px-3 py-3">
                <a href="{{ route('login') }}" class="header-btn">Login</a>
                <a href="{{ route('register') }}" class="header-btn">Register</a>
            </div>

        </nav>

        <div class="mt-6 flex justify-center">
            <button id="darkToggle"
                class="darkToggle size-9 flex items-center justify-center rounded-full cursor-pointer p-2 border border-slate-300 dark:border-slate-700 hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors duration-200"
                title="Toggle dark mode">
                <i class="fas fa-moon"></i>
            </button>
        </div>

        <!-- Social Links in Mobile Menu -->
        <div class="mt-8 pt-6 border-t border-gray-200 dark:border-gray-700">
            <h4 class="font-medium text-gray-700 dark:text-gray-300 mb-4">Follow Us</h4>
            <div class="flex space-x-3">
                <a href="#"
                    class="w-10 h-10 rounded-full bg-gray-100 dark:bg-gray-700 flex items-center justify-center hover:bg-blue-500 hover:text-white transition-all duration-300">
                    <i class="fab fa-facebook-f text-sm"></i>
                </a>
                <a href="#"
                    class="w-10 h-10 rounded-full bg-gray-100 dark:bg-gray-700 flex items-center justify-center hover:bg-pink-500 hover:text-white transition-all duration-300">
                    <i class="fab fa-instagram text-sm"></i>
                </a>
                <a href="#"
                    class="w-10 h-10 rounded-full bg-gray-100 dark:bg-gray-700 flex items-center justify-center hover:bg-red-500 hover:text-white transition-all duration-300">
                    <i class="fab fa-youtube text-sm"></i>
                </a>
                <a href="#"
                    class="w-10 h-10 rounded-full bg-gray-100 dark:bg-gray-700 flex items-center justify-center hover:bg-blue-400 hover:text-white transition-all duration-300">
                    <i class="fab fa-telegram text-sm"></i>
                </a>
            </div>
        </div>
    </div>
</div>