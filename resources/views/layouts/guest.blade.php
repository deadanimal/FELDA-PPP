<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="Responsive Bootstrap 4 Admin &amp; Dashboard Template">
        <meta name="author" content="Bootlab">

        <title>Felda - Program Pembangunan Peneroka</title>

        <!-- PICK ONE OF THE STYLES BELOW -->
        <link href="{{ URL::asset('css/modern.css') }}" rel="stylesheet">

        @yield('styles')
        <!-- END SETTINGS -->
    </head>

    <body>
        @include('sweetalert::alert')
        <script src="/js/app.js"></script>
        <div class="wrapper" >
            @include('layouts.navigation')
            <div class="main">
                <nav class="navbar navbar-expand navbar-theme">
                    <a class="sidebar-toggle d-flex me-2">
                        <i class="hamburger align-self-center"></i>
                    </a>

                    <div class="navbar-collapse collapse">
                        <ul class="navbar-nav ms-auto">
                            <li class="nav-item dropdown ms-lg-2">
                                <a class="nav-link dropdown-toggle position-relative" href="#" id="userDropdown" data-bs-toggle="dropdown">
                                    <i class="align-middle fas fa-cog" style="color:#FFFF !important;"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                                    <a class="dropdown-item" href="/users/info"><i class="align-middle me-1 fas fa-fw fa-user"></i>Kemaskini Profil</a>
                                    <a class="dropdown-item" href="/user/project"><i class="align-middle me-1 fas fa-fw fa-suitcase"></i>Senarai Projek</a>
                                    <a  class="dropdown-item" href="/Aduan/List">
                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xml:space="preserve" width="20" height="20" fill="currentColor" viewBox="0 0 100 100" style="margin-right:8;">
                                            <path d="M50,47.5C50,43.356,53.356,40,57.5,40C61.644,40,65,43.356,65,47.5C65,51.644,61.644,55,57.5,55C53.356,55,50,51.644,50,47.5Z" stroke="none"></path>
                                            <path d="M60,10.423L60,35.252C65.699,36.413,70,41.463,70,47.5S65.699,58.587,60,59.748L60,60C60,65.514,55.514,70,50,70L35,70L35,65L50,65C52.757,65,55,62.757,55,60L55,59.748C49.301,58.587,45,53.537,45,47.5S49.301,36.413,55,35.252L55,10C38.431,10,25,23.431,25,40L25,42.929L16.464,51.465C15.56,52.369,15,53.619,15,55C15,57.761,17.239,60,20,60L25,60L25,70C25,75.523,29.477,80,35,80L45,80L45,90L75,90L75,66.443C81.219,59.393,85,50.141,85,40L85,40C85,25.136,74.187,12.804,60,10.423Z" stroke="none"></path>
                                        </svg>
                                        <span class="align-middle">ADUAN</span>
                                    </a>
                                            
                                    <div class="dropdown-divider"></div>
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <a class="dropdown-item" :href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();" style="cursor: pointer;"><i class="align-middle me-1 fas fa-fw fa-arrow-alt-circle-right"></i>Log Keluar</a>
                                    </form>
                                </div>
                            </li>
                        </ul>
                    </div>

                </nav>
                <main class="content">
                    <style>
                        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@700&display=swap');
                        @font-face{
                            font-family:'Eina01-SemiBold';
                            src: url('/fonts/Eina01-SemiBold.ttf');
                        }
                        @font-face{
                            font-family:'Arial-N';
                            src: url('/fonts/Arial-Narrow.ttf');
                        }
                        @font-face{
                            font-family:'Arial';
                            src: url('/fonts/arial.ttf');
                        }
                    </style>
                    @yield('innercontent')

                </main>
            </div>
        </div>
    </body>
</html>
{{-- <body>
    
    <header class="header">
        <div class="frame9396-frame9274">
            <img
                src="/Image/logo.png"
                alt="logo14609"
                class="frame9396-logo1"
            />
            <div class="frame9396-frame9273">
                <span class="header-text">
                    <span>SISTEM PENGURUSAN MAKLUMAT</span>
                </span>
                <span class="frame9396-text2">
                    <span>Program Pembangunan Peneroka (IMS PPP)</span>
                </span>
            </div>
        </div>
    </header>
    <div class="container" data-layout="container">
        <div class="navbar">
            @include('layouts.navigation')
        </div>

        <div class="content">
            
        </div>
    </div>
    <footer class="footer">
        <span class="footer-text">
            <span>FELDA PPP © 2022 Program Pembangunan Peneroka (IMS PPP)</span>
        </span>
    </footer>
</body>
</html> --}}
