<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>@yield('title', 'Evently')</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body>

<div class="evently-app">

    <aside class="evently-sidebar">

        <div>

            <a
                href="{{ route('events.index') }}"
                class="evently-logo"
            >
                <span class="logo-mark">✦</span>
                <span>evently</span>
            </a>


            <p class="sidebar-heading">
                MENU
            </p>


            <nav class="evently-navigation">

                <a
                    href="{{ route('events.index') }}"
                    class="evently-nav-link {{ request()->routeIs('events.index') ? 'active' : '' }}"
                >
                    <span>⌂</span>
                    Dashboard
                </a>


                <a
                    href="{{ route('events.index') }}"
                    class="evently-nav-link {{ request()->routeIs('events.*') && !request()->routeIs('events.index') && !request()->routeIs('events.create') ? 'active' : '' }}"
                >
                    <span>▣</span>
                    My Events
                </a>


                <a
                    href="{{ route('events.create') }}"
                    class="evently-nav-link {{ request()->routeIs('events.create') ? 'active' : '' }}"
                >
                    <span>＋</span>
                    Create Event
                </a>


                <a
                    href="#"
                    class="evently-nav-link"
                >
                    <span>♡</span>
                    Favorites
                </a>


                <a
                    href="#"
                    class="evently-nav-link"
                >
                    <span>◷</span>
                    Calendar
                </a>

            </nav>

        </div>


        <div class="sidebar-footer">

            <a
                href="#"
                class="evently-nav-link"
            >
                <span>⚙</span>
                Settings
            </a>


            <div class="evently-user">

                <div class="user-avatar">
                    P
                </div>

                <div class="user-details">

                    <strong>Prakriti</strong>

                    <span>Event Manager</span>

                </div>

                <span class="user-more">
                    •••
                </span>

            </div>

        </div>

    </aside>


    <main class="evently-main">

        @yield('content')

    </main>

</div>

</body>

</html>