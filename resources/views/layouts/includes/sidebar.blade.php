<nav class="pcoded-navbar">
    <div class="nav-list">
        <div class="pcoded-inner-navbar main-menu">
            {{-- DASHBOARD --}}
            <div class="pcoded-navigation-label">Navigation</div>
                <ul class="pcoded-item pcoded-left-item">
                    <li class="pcoded-hasmenu @if ($pageSlug == 'dashboard') active pcoded-trigger @endif">
                        <a href="javascript:void(0)" class="waves-effect waves-dark">
                            <span class="pcoded-micon"><i class="feather icon-home"></i></span>
                            <span class="pcoded-mtext">Dashboard</span>
                        </a>
                        <ul class="pcoded-submenu">
                            <li @if ($pageSlug == 'dashboard') class="active" @endif>
                                <a href="/" class="waves-effect waves-dark">
                                <span class="pcoded-mtext">Default</span>
                                 </a>
                            </li>
                            <li @if ($pageSlug == 'analytics') class="active" @endif>
                                <a href="#" class="waves-effect waves-dark">
                                <span class="pcoded-mtext">Analytics</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>

            {{-- KIOSK --}}
            <div class="pcoded-navigation-label">Kiosks Management</div>
                <ul class="pcoded-item pcoded-left-item">
                    @can('List Kiosk')
                        <li @if ($pageSlug == 'property-index') class="active" @endif>
                            <a href="#" class="waves-effect waves-dark">
                                <span class="pcoded-micon">
                                <i class="feather icon-home"></i>
                                </span>
                                <span class="pcoded-mtext">Kiosks</span>
                            </a>
                        </li>
                    @endcan
                    <li @if ($pageSlug == 'property-index') class="active" @endif>
                        <a href="#" class="waves-effect waves-dark">
                            <span class="pcoded-micon">
                            <i class="feather icon-home"></i>
                            </span>
                            <span class="pcoded-mtext">Discounts</span>
                        </a>
                    </li>
                </ul>

            {{-- PRODUCTS --}}
            <div class="pcoded-navigation-label">Inventory Management</div>
                <ul class="pcoded-item pcoded-left-item">
                    <li @if ($pageSlug == 'inventory-index') class="active" @endif>
                        <a href="#" class="waves-effect waves-dark">
                            <span class="pcoded-micon">
                            <i class="feather icon-package"></i>
                            </span>
                            <span class="pcoded-mtext">Products</span>
                        </a>
                    </li>
                    <li @if ($pageSlug == 'inventory-index') class="active" @endif>
                        <a href="#" class="waves-effect waves-dark">
                            <span class="pcoded-micon">
                            <i class="feather icon-package"></i>
                            </span>
                            <span class="pcoded-mtext">Stocks</span>
                        </a>
                    </li>
                </ul>

            {{-- REPORTS --}}
            <div class="pcoded-navigation-label">Reports</div>
                <ul class="pcoded-item pcoded-left-item">
                    <li @if ($pageSlug == 'reports-index') class="active" @endif>
                        <a href="#" class="waves-effect waves-dark">
                            <span class="pcoded-micon">
                            <i class="feather icon-package"></i>
                            </span>
                            <span class="pcoded-mtext">Reports</span>
                        </a>
                    </li>
                </ul>

            {{-- ADMIN --}}
            @role('Owner')
            <div class="pcoded-navigation-label">Administrator Settings</div>
                <ul class="pcoded-item pcoded-left-item">
                    <li class="pcoded-hasmenu @if ($pageSlug == 'user-index' || $pageSlug == 'user-create') active pcoded-trigger @endif">
                        <a href="javascript:void(0)" class="waves-effect waves-dark">
                            <span class="pcoded-micon"><i class="feather icon-at-sign"></i></span>
                            <span class="pcoded-mtext">Users</span>
                        </a>
                        <ul class="pcoded-submenu">
                            <li @if ($pageSlug == 'user-index') class="active" @endif>
                                <a href="#" class="waves-effect waves-dark">
                                <span class="pcoded-mtext">List All Users</span>
                                 </a>
                            </li>
                        </ul>
                        <ul class="pcoded-submenu">
                            <li class=" pcoded-hasmenu @if ($pageSlug == 'user-create') active pcoded-trigger @endif">
                                <a href="javascript:void(0)" class="waves-effect waves-dark">
                                <span class="pcoded-mtext">Manage Users</span>
                                </a>
                                <ul class="pcoded-submenu">
                                    <li @if ($pageSlug == 'user-create') class="active" @endif>
                                        <a href="#" class="waves-effect waves-dark">
                                        <span class="pcoded-mtext">Add User</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li class="pcoded-hasmenu @if ($pageSlug == 'roles-index') active pcoded-trigger @endif">
                        <a href="javascript:void(0)" class="waves-effect waves-dark">
                            <span class="pcoded-micon"><i class="feather icon-briefcase"></i></span>
                            <span class="pcoded-mtext">Roles</span>
                        </a>
                            <ul class="pcoded-submenu">
                                <li class="pcoded-hasmenu">
                                    <a href="javascript:void(0)" class="waves-effect waves-dark">
                                    <span class="pcoded-mtext">Manage Roles</span>
                                    </a>
                                    <ul class="pcoded-submenu">
                                        <li class="">
                                            <a href="menu-static.html" class="waves-effect waves-dark">
                                            <span class="pcoded-mtext">List All Roles</span>
                                            </a>
                                        </li>
                                        <li class="">
                                            <a href="menu-header-fixed.html" class="waves-effect waves-dark">
                                            <span class="pcoded-mtext">Add Roles</span>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                    </li>
                    <li @if ($pageSlug == 'activity-index') class="active" @endif>
                        <a href="#" class="waves-effect waves-dark">
                            <span class="pcoded-micon">
                            <i class="feather icon-home"></i>
                            </span>
                            <span class="pcoded-mtext">Activity Log</span>
                        </a>
                    </li>
                </ul>
            @endrole
        </div>
    </div>
</nav>