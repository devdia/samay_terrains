<!-- ========== Left Sidebar Start ========== -->
<div class="vertical-menu">

    <!-- LOGO -->
    <div class="navbar-brand-box">

    </div>

    <button type="button" class="btn btn-sm px-3 font-size-16 header-item waves-effect vertical-menu-btn">
        <i class="fa fa-fw fa-bars"></i>
    </button>

    <div data-simplebar class="sidebar-menu-scroll">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title">Menu</li>

                <li>
                    <a href="{{url('index')}}">
                        <i class="uil-home-alt"></i><span class="badge badge-pill badge-primary float-right">01</span>
                        <span>Dashboard</span>
                    </a>
                </li>

                @if(\Illuminate\Support\Facades\Auth::user()->type == 'admin')
                    <li>
                        <a href="javascript: void(0);" class="has-arrow waves-effect">
                            <i class="uil-window-section"></i>
                            <span>Parametrage</span>
                        </a>
                        <ul class="sub-menu" aria-expanded="false">
                            <li><a href="{{route('regions.index')}}">Regions</a></li>
                            <li><a href="{{route('departements.index')}}">Departements</a></li>
                            <li><a href="{{route('titres.index')}}">Titre de bails</a></li>


                        </ul>
                    </li>
                @endif


                <li>
                    <a href="{{route('terrains.index')}}" class="waves-effect">
                        <i class="uil-calender"></i>
                        <span>Terrains</span>
                    </a>
                </li>

                <li>
                    <a href="{{route('ventes.index')}}" class=" waves-effect">
                        <i class="uil-comments-alt"></i>
                        <span>Ventes</span>
                    </a>
                </li>

                @if(\Illuminate\Support\Facades\Auth::user()->type == 'admin')
                    <li>
                        <a href="{{route('utilisateurs.index')}}" class=" waves-effect">
                            <i class="uil-comments-alt"></i>
                            <span>Utilisateurs</span>
                        </a>
                    </li>
                @endif


            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
<!-- Left Sidebar End -->
