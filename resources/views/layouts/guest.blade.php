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
	<link data-require="sweet-alert@*" data-semver="0.4.2" rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css" />
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
	<div class="wrapper">
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
								<i class="align-middle fas fa-cog"></i>
							</a>
							<div class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
								<a class="dropdown-item" href="/users/info"><i class="align-middle me-1 fas fa-fw fa-user"></i>Kemaskini</a>
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
                </style>
                @yield('innercontent')

			</main>
    </div>

</body>

{{-- </html>
<body>
    
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
