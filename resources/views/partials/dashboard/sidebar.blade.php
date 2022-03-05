<nav id="sidebar" class="sidebar js-sidebar">
    <div class="sidebar-content js-simplebar">
        <a class="sidebar-brand" href="/">
            <i class="align-middle" data-feather="cpu"></i><span class="align-middle"> Blog App</span>
        </a>

        <ul class="sidebar-nav">
            <li class="sidebar-header">
                Pages
            </li>

            <li class="sidebar-item {{ request()->is('dashboard') ? "active" : '' }}">
                <a class="sidebar-link" href="/dashboard">
                    <i class="align-middle" data-feather="sliders"></i> <span
                        class="align-middle">Dashboard</span>
                </a>
            </li>

            <li class="sidebar-item {{ request()->is('dashboard/posts') ? "active" : '' }}">
                <a class="sidebar-link" href="{{ route('posts.index') }}">
                    <i class="align-middle" data-feather="grid"></i> <span class="align-middle">My Posts</span>
                </a>
            </li>

            <li class="sidebar-item {{ request()->is('dashboard/posts/create') ? "active" : '' }}">
                <a class="sidebar-link" href="{{ route('posts.create') }}">
                    <i class="align-middle" data-feather="send"></i> <span
                        class="align-middle">Create new post</span>
                </a>
            </li>

            <li class="sidebar-item">
                <a class="sidebar-link" href="icons-feather.html">
                    <i class="align-middle" data-feather="coffee"></i> <span
                        class="align-middle">Icons</span>
                </a>
            </li>

            <li class="sidebar-header">
                Plugins & Addons
            </li>

            <li class="sidebar-item">
                <a class="sidebar-link" href="charts-chartjs.html">
                    <i class="align-middle" data-feather="bar-chart-2"></i> <span
                        class="align-middle">Charts</span>
                </a>
            </li>

            <li class="sidebar-item">
                <a class="sidebar-link" href="maps-google.html">
                    <i class="align-middle" data-feather="map"></i> <span class="align-middle">Maps</span>
                </a>
            </li>
        </ul>
    </div>
</nav>
