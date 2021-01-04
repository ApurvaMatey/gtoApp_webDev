    <div class="az-header">
        <div class="container">
            <div class="az-header-left">
                <a href="{{ url('home') }}" class="az-logo"><span></span> {{ config('app.name', 'GTO') }}</a>
                <a href="{{ url('home') }}" id="azMenuShow" class="az-header-menu-icon d-lg-none"><span></span></a>
            </div><!-- az-header-left -->
            <div class="az-header-menu">
                <div class="az-header-menu-header">
                    <a href="{{ url('home') }}" class="az-logo"><span></span> {{ config('app.name', 'GTO') }}</a>
                    <a href="#" class="close">&times;</a>
                </div><!-- az-header-menu-header -->
                <ul class="nav">
                    <li class="nav-item active nav-home">
                        <a href="{{ url('home') }}" class="nav-link nav-home">
                            <i class="typcn typcn-home-area-outline"></i> Casa
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ url('admin') }}" class="nav-link nav-admin">
                            <i class="typcn typcn-group-outline"></i> Administración
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ url('scholarship') }}" class="nav-link nav-scholarship">
                            <i class="typcn typcn-bookmark"></i> Becas
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ url('culture') }}" class="nav-link nav-culture">
                            <i class="typcn typcn-book"></i> Cultura
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ url('emergency') }}" class="nav-link nav-emergency">
                            <i class="typcn typcn-bell"></i> Seguridad
                        </a>
                    </li>
                </ul>
            </div><!-- az-header-menu -->

            <div class="az-header-right">
                <div class="dropdown az-profile-menu">
                    <a href="#" class="az-img-user"><img src="{{ asset('img/avatar/default-avatar.png') }}" alt=""></a>
                    <div class="dropdown-menu">
                        <div class="az-dropdown-header d-sm-none">
                            <a href="#" class="az-header-arrow"><i class="icon ion-md-arrow-back"></i></a>
                        </div>
                        <div class="az-header-profile">
                            <div class="az-img-user">
                            <img src="{{ asset('img/avatar/default-avatar.png') }}" alt="">
                            </div><!-- az-img-user -->
                            <h6>@php echo Session::get('adminName'); @endphp</h6>
                            <span>Admin</span>
                        </div><!-- az-header-profile -->

                        <a href="#" class="dropdown-item"><i class="typcn typcn-edit"></i> Cambia la contraseña</a>
                        <a href="{{ url('logout') }}" class="dropdown-item"><i class="typcn typcn-power-outline"></i> Cerrar sesión</a>
                    </div><!-- dropdown-menu -->
                </div>
            </div><!-- az-header-right -->
        </div><!-- container -->
    </div><!-- az-header -->
