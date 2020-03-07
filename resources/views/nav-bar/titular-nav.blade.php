
        <div class="sidebar">
            <div class="dropdown mt-2">
                <a class="btn btn-outline-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <img class="rounded-circle" src="/img/user.png" width="15%"> {{ auth()->user()->name }}
                </a>
                <div class="dropdown-menu user-info" aria-labelledby="dropdownMenuLink">
                    <a class="dropdown-item" role="menuitem" tabindex="1" href="/users/{{ auth()->id() }}">Mi Cuenta</a>
                        <a class="dropdown-item" onclick="event.preventDefault();
                      document.getElementById('logout-form').submit();"
                      {{ __('Logout') }} href="{{ route('logout') }}">
                      Cerrar Sesión
                      </a>
                </div>
            </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-accordion="false" data-widget="treeview" role="menu">
                    <li class="nav-item has-treeview menu-close">
                        <a href="{{route('requisitions.index')}}" class="nav-link {{ activeMenu('requisitions')}}">
                            <i class="nav-icon fas fa-sticky-note"></i>
                            <p>
                                {{ auth()->user()->departments->name }}
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a class="{{ activeMenu('requisitions.load') }} nav-link" href="{{ route('requisitions.index') }}">
                                    <i class="nav-icon fas fa-clipboard">
                                    </i>
                                    <p>
                                        Pendientes
                                    </p>
                                </a>
                            </li>
                        </ul>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a class="{{ activeMenu('requisitions.authorized') }} nav-link" href="{{route('requisitions.authorized')}}">
                                    <i class="nav-icon fas fa-clipboard-check q">
                                    </i>
                                    <p>
                                        Autorizadas
                                    </p>
                                </a>
                            </li>
                        </ul>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a class="{{ activeMenu('quotes.index') }} nav-link" href="{{route('quotes.index')}}">
                                    <i class="nav-icon fas fa-clipboard-list">
                                    </i>
                                    <p>
                                        Cotizadas
                                    </p>
                                </a>
                            </li>
                        </ul>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a class="{{ activeMenu('purchased.index') }} nav-link" href="{{route('purchased.index')}}">
                                    <i class="nav-icon fas fa-paste">
                                    </i>
                                    <p>
                                        Compradas
                                    </p>
                                </a>
                            </li>
                        </ul>
                    </li>
