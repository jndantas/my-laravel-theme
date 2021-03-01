<ul class="sidebar-menu">

    <li class="menu-header">Dashboard</li>

    <li>
        <router-link class="nav-link" :to="{ name : 'home'}" ><i class="fas fa-fire"></i> <span>Home</span></router-link>
    </li>
    <li>
        <router-link class="nav-link" :to="{ name : 'entries'}"><i class="fas fa-users"></i> <span>Lançamentos</span></router-link>
    </li>

    <li class="menu-header">Configurações</li>

    <li>
        <router-link class="nav-link" :to="{ name : 'users'}"><i class="fas fa-users"></i> <span>Usuários</span></router-link>
    </li>


    {{--        <li class="menu-header">Starter</li>--}}
    {{--        <li class="nav-item dropdown">--}}
    {{--            <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i> <span>Layout</span></a>--}}
    {{--            <ul class="dropdown-menu">--}}
    {{--                <li><a class="nav-link" href="layout-default.html">Default Layout</a></li>--}}
    {{--                <li><a class="nav-link" href="layout-transparent.html">Transparent Sidebar</a></li>--}}
    {{--                <li><a class="nav-link" href="layout-top-navigation.html">Top Navigation</a></li>--}}
    {{--            </ul>--}}
    {{--        </li>--}}
</ul>
