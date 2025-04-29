<div class="navbar shadow-sm color1 text-white sticky top-0 z-30">
    <div class="navbar-start pl-4">
        <button id="menu-toggle" class="btn btn-ghost md:hidden" title="Menu-toggle">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16m-7 6h7" />
            </svg>
        </button>
        <a href="https://lotusaja.com" class="font-2xl font-semibold text-white ml-2 hover:font-bold md:hidden"
            title="Lotus">Lotus</a>
        <!-- Logo -->
        <a href="https://lotusaja.com"
            class="flex flex-row items-center hover:text-blue-200 transition-colors hidden md:flex"
            title="Website Lotus">
            <img src="{{ asset('image/logoLotus3.png') }}" alt="Lotus Logo" class="h-8">
            <span class="font-semibold text-xl ml-2">Lotus</span>
        </a>
    </div>

    <!-- Desktop Navigation (Hidden on Small Screens) -->
    <div class="navbar-center hidden md:flex">
        <ul class="menu menu-horizontal px-1 gap-4">
            <li title="Home">
                <a href="/"
                    class="flex items-center gap-2 hover:bg-blue-800 rounded-lg px-4 transition-colors {{ request()->is('/') ? 'bg-blue-900 font-semibold border-b-2 border-white' : '' }}">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="m2.25 12 8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
                    </svg>
                    Home
                </a>
            </li>
            <li title="Blogs">
                <a href="/posts"
                    class="flex items-center gap-2 hover:bg-blue-800 rounded-lg px-4 transition-colors {{ request()->is('posts*', 'post*') ? 'bg-blue-900 font-semibold border-b-2 border-white' : '' }}">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M15.75 17.25v3.375c0 .621-.504 1.125-1.125 1.125h-9.75a1.125 1.125 0 0 1-1.125-1.125V7.875c0-.621.504-1.125 1.125-1.125H6.75a9.06 9.06 0 0 1 1.5.124m7.5 10.376h3.375c.621 0 1.125-.504 1.125-1.125V11.25c0-4.46-3.243-8.161-7.5-8.876a9.06 9.06 0 0 0-1.5-.124H9.375c-.621 0-1.125.504-1.125 1.125v3.5m7.5 10.375H9.375a1.125 1.125 0 0 1-1.125-1.125v-9.25m12 6.625v-1.875a3.375 3.375 0 0 0-3.375-3.375h-1.5a1.125 1.125 0 0 1-1.125-1.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H9.75" />
                    </svg>
                    Blogs
                </a>
            </li>
            <li title="Portfolio">
                <a href="/portfolio"
                    class="flex items-center gap-2 hover:bg-blue-800 rounded-lg px-4 transition-colors {{ request()->is('portfolio*', 'portfolios*') ? 'bg-blue-900 font-semibold border-b-2 border-white' : '' }}">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M4.26 10.147a60.438 60.438 0 0 0-.491 6.347A48.62 48.62 0 0 1 12 20.904a48.62 48.62 0 0 1 8.232-4.41 60.46 60.46 0 0 0-.491-6.347m-15.482 0a50.636 50.636 0 0 0-2.658-.813A59.906 59.906 0 0 1 12 3.493a59.903 59.903 0 0 1 10.399 5.84c-.896.248-1.783.52-2.658.814m-15.482 0A50.717 50.717 0 0 1 12 13.489a50.702 50.702 0 0 1 7.74-3.342M6.75 15a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5Zm0 0v-3.675A55.378 55.378 0 0 1 12 8.443m-7.007 11.55A5.981 5.981 0 0 0 6.75 15.75v-1.5" />
                    </svg>
                    Portofolio
                </a>
            </li>
            <li title="About">
                <a href="/about"
                    class="flex items-center gap-3 rounded-lg lisa transition-colors {{ request()->is('about*') ? 'bg-blue-900 font-semibold border-b-2 border-white' : '' }}">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="size-6">
                        <rect x="3" y="4" width="18" height="16" rx="2" ry="2"
                            stroke-linecap="round" stroke-linejoin="round" />
                        <circle cx="9" cy="10" r="2.5" />
                        <path d="M15 8h3M15 12h3" stroke-linecap="round" stroke-linejoin="round" />
                        <path d="M5 16h14" stroke-linecap="round" stroke-linejoin="round" />
                        <path d="M6 14c0-2 1.5-2 3-2s3 0 3 2" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                    About Us
                </a>
            </li>
            <li>
                <label title="Theme-toggle"
                    class="swap swap-rotate flex items-center hover:bg-blue-800 relative w-10 h-10 justify-center">
                    <input type="checkbox" class="theme-controller theme-toggle" value="dark" id="togglemode" />
                    <!-- Sun icon -->
                    <svg class="swap-off h-6 w-6 fill-current absolute" xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 24 24">
                        <path
                            d="M5.64,17l-.71.71a1,1,0,0,0,0,1.41,1,1,0,0,0,1.41,0l.71-.71A1,1,0,0,0,5.64,17ZM5,12a1,1,0,0,0-1-1H3a1,1,0,0,0,0,2H4A1,1,0,0,0,5,12Zm7-7a1,1,0,0,0,1-1V3a1,1,0,0,0-2,0V4A1,1,0,0,0,12,5ZM5.64,7.05a1,1,0,0,0,.7.29,1,1,0,0,0,.71-.29,1,1,0,0,0,0-1.41l-.71-.71A1,1,0,0,0,4.93,6.34Zm12,.29a1,1,0,0,0,.7-.29l.71-.71a1,1,0,1,0-1.41-1.41L17,5.64a1,1,0,0,0,0,1.41A1,1,0,0,0,17.66,7.34ZM21,11H20a1,1,0,0,0,0,2h1a1,1,0,0,0,0-2Zm-9,8a1,1,0,0,0-1,1v1a1,1,0,0,0,2,0V20A1,1,0,0,0,12,19ZM18.36,17A1,1,0,0,0,17,18.36l.71.71a1,1,0,0,0,1.41,0,1,1,0,0,0,0-1.41ZM12,6.5A5.5,5.5,0,1,0,17.5,12,5.51,5.51,0,0,0,12,6.5Zm0,9A3.5,3.5,0,1,1,15.5,12,3.5,3.5,0,0,1,12,15.5Z" />
                    </svg>
                    <!-- Moon icon -->
                    <svg class="swap-on h-6 w-6 fill-current absolute" xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 24 24">
                        <path
                            d="M21.64,13a1,1,0,0,0-1.05-.14,8.05,8.05,0,0,1-3.37.73A8.15,8.15,0,0,1,9.08,5.49a8.59,8.59,0,0,1,.25-2A1,1,0,0,0,8,2.36,10.14,10.14,0,1,0,22,14.05,1,1,0,0,0,21.64,13Zm-9.5,6.69A8.14,8.14,0,0,1,7.08,5.22v.27A10.15,10.15,0,0,0,17.22,15.63a9.79,9.79,0,0,0,2.1-.22A8.11,8.11,0,0,1,12.14,19.73Z" />
                    </svg>
                </label>
            </li>
        </ul>
    </div>

    <!-- Right Side Action Button -->
    <div class="navbar-end pr-6">
        <a href="https://wa.me/6285175112406?text=halo%20saya%20ingin%20berkonsultasi%20website%20" title="Contact us"
            target="_blank"
            class="rounded-lg px-4 py-2 gets flex items-center justify-center font-semibold hover:font-bold transition-all md:text-sm">
            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="w-5 h-5 mr-2" viewBox="0 0 448 512">
                <path
                    d="M380.9 97.1C339 55.1 283.2 32 223.9 32c-122.4 0-222 99.6-222 222 0 39.1 10.2 77.3 29.6 111L0 480l117.7-30.9c32.4 17.7 68.9 27 106.1 27h.1c122.3 0 224.1-99.6 224.1-222 0-59.3-25.2-115-67.1-157zm-157 341.6c-33.2 0-65.7-8.9-94-25.7l-6.7-4-69.8 18.3L72 359.2l-4.4-7c-18.5-29.4-28.2-63.3-28.2-98.2 0-101.7 82.8-184.5 184.6-184.5 49.3 0 95.6 19.2 130.4 54.1 34.8 34.9 56.2 81.2 56.1 130.5 0 101.8-84.9 184.6-186.6 184.6zm101.2-138.2c-5.5-2.8-32.8-16.2-37.9-18-5.1-1.9-8.8-2.8-12.5 2.8-3.7 5.6-14.3 18-17.6 21.8-3.2 3.7-6.5 4.2-12 1.4-32.6-16.3-54-29.1-75.5-66-5.7-9.8 5.7-9.1 16.3-30.3 1.8-3.7.9-6.9-.5-9.7-1.4-2.8-12.5-30.1-17.1-41.2-4.5-10.8-9.1-9.3-12.5-9.5-3.2-.2-6.9-.2-10.6-.2-3.7 0-9.7 1.4-14.8 6.9-5.1 5.6-19.4 19-19.4 46.3 0 27.3 19.9 53.7 22.6 57.4 2.8 3.7 39.1 59.7 94.8 83.8 35.2 15.2 49 16.5 66.6 13.9 10.7-1.6 32.8-13.4 37.4-26.4 4.6-13 4.6-24.1 3.2-26.4-1.3-2.5-5-3.9-10.5-6.6z" />
            </svg>
            Get Started!
        </a>
    </div>
</div>

<!-- Mobile Sidebar (Off-Canvas) -->
<div id="overlay"
    class="fixed inset-0 bg-transparent bg-opacity-0 transition-opacity duration-300 ease-in-out z-40 hidden">
</div>

<div id="sidebar"
    class="fixed top-0 left-0 h-screen w-64 shadow-lg bg-base-300 transform -translate-x-full transition-transform duration-300 ease-in-out bg-base-400 z-50 overflow-y-auto md:hidden">
    <!-- Sidebar Header -->
    <div class="p-3 flex justify-between items-center color1">
        <div class="flex items-center">
            <img src="{{ asset('image/logoLotus3.png') }}" alt="Lotus Logo" class="h-6">
            <h2 class="text-lg font-bold ml-2 text-white">Lotus</h2>
        </div>
        <button id="close-menu" class="p-2 rounded-full lisa">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>
    </div>

    <!-- Sidebar Theme Toggle -->
    <div class="px-5 pt-4 flex justify-between items-center">
        <span class="text-sm font-medium">Theme Mode</span>
        <label class="swap swap-rotate lisa rounded-xl" title="Theme-Toggle">
            <input type="checkbox" class="theme-controller theme-toggle" value="dark" id="togglemob" />
            <svg class="swap-off h-6 w-6 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                <path
                    d="M5.64,17l-.71.71a1,1,0,0,0,0,1.41,1,1,0,0,0,1.41,0l.71-.71A1,1,0,0,0,5.64,17ZM5,12a1,1,0,0,0-1-1H3a1,1,0,0,0,0,2H4A1,1,0,0,0,5,12Zm7-7a1,1,0,0,0,1-1V3a1,1,0,0,0-2,0V4A1,1,0,0,0,12,5ZM5.64,7.05a1,1,0,0,0,.7.29,1,1,0,0,0,.71-.29,1,1,0,0,0,0-1.41l-.71-.71A1,1,0,0,0,4.93,6.34Zm12,.29a1,1,0,0,0,.7-.29l.71-.71a1,1,0,1,0-1.41-1.41L17,5.64a1,1,0,0,0,0,1.41A1,1,0,0,0,17.66,7.34ZM21,11H20a1,1,0,0,0,0,2h1a1,1,0,0,0,0-2Zm-9,8a1,1,0,0,0-1,1v1a1,1,0,0,0,2,0V20A1,1,0,0,0,12,19ZM18.36,17A1,1,0,0,0,17,18.36l.71.71a1,1,0,0,0,1.41,0,1,1,0,0,0,0-1.41ZM12,6.5A5.5,5.5,0,1,0,17.5,12,5.51,5.51,0,0,0,12,6.5Zm0,9A3.5,3.5,0,1,1,15.5,12,3.5,3.5,0,0,1,12,15.5Z" />
            </svg>
            <svg class="swap-on h-6 w-6 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                <path
                    d="M21.64,13a1,1,0,0,0-1.05-.14,8.05,8.05,0,0,1-3.37.73A8.15,8.15,0,0,1,9.08,5.49a8.59,8.59,0,0,1,.25-2A1,1,0,0,0,8,2.36,10.14,10.14,0,1,0,22,14.05,1,1,0,0,0,21.64,13Zm-9.5,6.69A8.14,8.14,0,0,1,7.08,5.22v.27A10.15,10.15,0,0,0,17.22,15.63a9.79,9.79,0,0,0,2.1-.22A8.11,8.11,0,0,1,12.14,19.73Z" />
            </svg>
        </label>
    </div>

    <!-- Sidebar Menu Items -->
    <ul class="menu p-4 space-y-2 mt-2 w-full">
        <li title="Home">
            <a href="/"
                class="flex items-center gap-3 p-3 rounded-lg lisa transition-colors  {{ request()->is('/') ? 'color1 text-white' : '' }}">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-5 h-5">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="m2.25 12 8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
                </svg>
                Home
            </a>
        </li>
        <li title="Blogs">
            <a href="/posts"
                class="flex items-center gap-3 p-3 rounded-lg lisa transition-colors {{ request()->is('posts*', 'post*') ? 'color1 text-white' : '' }}">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-5 h-5">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M15.75 17.25v3.375c0 .621-.504 1.125-1.125 1.125h-9.75a1.125 1.125 0 0 1-1.125-1.125V7.875c0-.621.504-1.125 1.125-1.125H6.75a9.06 9.06 0 0 1 1.5.124m7.5 10.376h3.375c.621 0 1.125-.504 1.125-1.125V11.25c0-4.46-3.243-8.161-7.5-8.876a9.06 9.06 0 0 0-1.5-.124H9.375c-.621 0-1.125.504-1.125 1.125v3.5m7.5 10.375H9.375a1.125 1.125 0 0 1-1.125-1.125v-9.25m12 6.625v-1.875a3.375 3.375 0 0 0-3.375-3.375h-1.5a1.125 1.125 0 0 1-1.125-1.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H9.75" />
                </svg>
                Blogs
            </a>
        </li>
        <li title="Portfolio">
            <a href="/portfolio"
                class="flex items-center gap-3 p-3 rounded-lg lisa transition-colors {{ request()->is('portfolio*', 'portfolios*') ? 'color1 text-white' : '' }}">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-5 h-5">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M4.26 10.147a60.438 60.438 0 0 0-.491 6.347A48.62 48.62 0 0 1 12 20.904a48.62 48.62 0 0 1 8.232-4.41 60.46 60.46 0 0 0-.491-6.347m-15.482 0a50.636 50.636 0 0 0-2.658-.813A59.906 59.906 0 0 1 12 3.493a59.903 59.903 0 0 1 10.399 5.84c-.896.248-1.783.52-2.658.814m-15.482 0A50.717 50.717 0 0 1 12 13.489a50.702 50.702 0 0 1 7.74-3.342M6.75 15a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5Zm0 0v-3.675A55.378 55.378 0 0 1 12 8.443m-7.007 11.55A5.981 5.981 0 0 0 6.75 15.75v-1.5" />
                </svg>
                Portfolio
            </a>
        </li>
        <li title="About">
            <a href="/about"
                class="flex items-center gap-3 p-3 rounded-lg lisa transition-colors {{ request()->is('about*') ? 'color1 text-white' : '' }}">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-5 h-5">
                    <rect x="3" y="4" width="18" height="16" rx="2" ry="2"
                        stroke-linecap="round" stroke-linejoin="round" />
                    <circle cx="9" cy="10" r="2.5" />
                    <path d="M15 8h3M15 12h3" stroke-linecap="round" stroke-linejoin="round" />
                    <path d="M5 16h14" stroke-linecap="round" stroke-linejoin="round" />
                    <path d="M6 14c0-2 1.5-2 3-2s3 0 3 2" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
                About Us
            </a>
        </li>
    </ul>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Theme Toggle Setup
        const themeToggles = document.querySelectorAll('.theme-toggle');

        // Function to set theme based on localStorage or system preference
        function setTheme() {
            const savedTheme = localStorage.getItem('theme');

            if (savedTheme) {
                document.documentElement.setAttribute('data-theme', savedTheme);
                themeToggles.forEach(toggle => {
                    toggle.checked = savedTheme === 'dark';
                });
            } else {
                const prefersDark = window.matchMedia('(prefers-color-scheme: dark)').matches;
                const theme = prefersDark ? 'dark' : 'light';
                document.documentElement.setAttribute('data-theme', theme);
                themeToggles.forEach(toggle => {
                    toggle.checked = prefersDark;
                });
                localStorage.setItem('theme', theme);
            }
        }

        // Set theme on initial load
        setTheme();

        // Add event listeners to all theme toggles
        themeToggles.forEach(toggle => {
            toggle.addEventListener('change', function() {
                const theme = this.checked ? 'dark' : 'light';
                document.documentElement.setAttribute('data-theme', theme);
                localStorage.setItem('theme', theme);

                // Sync other toggles
                themeToggles.forEach(otherToggle => {
                    if (otherToggle !== this) {
                        otherToggle.checked = this.checked;
                    }
                });
            });
        });

        // Sidebar functionality
        const menuToggle = document.getElementById('menu-toggle');
        const closeMenu = document.getElementById('close-menu');
        const sidebar = document.getElementById('sidebar');
        const overlay = document.getElementById('overlay');

        // Function to open sidebar
        function openSidebar() {
            sidebar.classList.remove('-translate-x-full');
            sidebar.classList.add('translate-x-0');
            overlay.classList.remove('hidden');
            setTimeout(() => {
                overlay.classList.add('bg-opacity-50');
                overlay.classList.remove('bg-opacity-0');
            }, 50);
        }

        // Function to close sidebar
        function closeSidebar() {
            sidebar.classList.remove('translate-x-0');
            sidebar.classList.add('-translate-x-full');
            overlay.classList.remove('bg-opacity-50');
            overlay.classList.add('bg-opacity-0');
            setTimeout(() => {
                overlay.classList.add('hidden');
            }, 300);
        }

        // Event listeners for sidebar toggle
        if (menuToggle) {
            menuToggle.addEventListener('click', openSidebar);
        }

        if (closeMenu) {
            closeMenu.addEventListener('click', closeSidebar);
        }

        if (overlay) {
            overlay.addEventListener('click', closeSidebar);
        }

        // Close sidebar when pressing Escape key
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') {
                closeSidebar();
            }
        });
    });
</script>
