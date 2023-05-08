<style>
    .sidebar.toggled {
    margin-left: -260px;
}
</style>
<nav id="sidebar" class="sidebar" style="max-width: auto; min-width:auto;">
    <a class="sidebar-brand" href="/" style="background:#781E2A; display: flex;justify-content: center;">
        <img src="/Image/logo.png" style="max-width: 245px; background:#ffff; border-radius:4px;"/>
    </a>
    <div class="sidebar-content">
        <div class="sidebar-user">
            <img src="/Image/dummy-person.jpeg" class="img-fluid rounded-circle mb-2" alt="Linda Miller" />
            <div class="fw-bold"><h2 style="color: #153d77;">{{Auth::user()->idPengguna}}</h2></div>
            <h4 style="color: #153d77; text-transform: uppercase;">{{Auth::user()->nama}}</h4>
        </div>
        
        <ul class="sidebar-nav">
            @if (Request::is('dashboard'))
                <li class="sidebar-item active">
            @else
                <li class="sidebar-item">
            @endif
                    <a  class="sidebar-link" href="/dashboard">
                        <i class="align-middle me-2 fas fa-fw fa-home"></i> <span class="align-middle">PAPAN PEMUKA</span>
                    </a>
                </li>
            @if (Request::is('home') || Request::is('home/*'))
                <li class="sidebar-item active">
            @else
                <li class="sidebar-item">
            @endif
                    <a  class="sidebar-link" href="/setting">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-house-gear-fill" viewBox="0 0 16 16">
                            <path d="M7.293 1.5a1 1 0 0 1 1.414 0L11 3.793V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v3.293l2.354 2.353a.5.5 0 0 1-.708.708L8 2.207 1.354 8.854a.5.5 0 1 1-.708-.708L7.293 1.5Z"/>
                            <path d="M11.07 9.047a1.5 1.5 0 0 0-1.742.26l-.02.021a1.5 1.5 0 0 0-.261 1.742 1.5 1.5 0 0 0 0 2.86 1.504 1.504 0 0 0-.12 1.07H3.5A1.5 1.5 0 0 1 2 13.5V9.293l6-6 4.724 4.724a1.5 1.5 0 0 0-1.654 1.03Z"/>
                            <path d="m13.158 9.608-.043-.148c-.181-.613-1.049-.613-1.23 0l-.043.148a.64.64 0 0 1-.921.382l-.136-.074c-.561-.306-1.175.308-.87.869l.075.136a.64.64 0 0 1-.382.92l-.148.045c-.613.18-.613 1.048 0 1.229l.148.043a.64.64 0 0 1 .382.921l-.074.136c-.306.561.308 1.175.869.87l.136-.075a.64.64 0 0 1 .92.382l.045.149c.18.612 1.048.612 1.229 0l.043-.15a.64.64 0 0 1 .921-.38l.136.074c.561.305 1.175-.309.87-.87l-.075-.136a.64.64 0 0 1 .382-.92l.149-.044c.612-.181.612-1.049 0-1.23l-.15-.043a.64.64 0 0 1-.38-.921l.074-.136c.305-.561-.309-1.175-.87-.87l-.136.075a.64.64 0 0 1-.92-.382ZM12.5 14a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3Z"/>
                        </svg> 
                        <span class="align-middle">TETAPAN HALAMAN WEB</span>
                    </a>
                </li>
            @if (Request::is('user/tugasan') || Request::is('user/tugasan/*'))
                <li class="sidebar-item active">
            @else
                <li class="sidebar-item">
            @endif
                    <a  class="sidebar-link" href="/user/tugasan/list" style="display: flex">
                        <i class="align-middle me-2 fas fa-fw fa-clipboard-check" style="margin-top: 1%;"></i> 
                        <span class="align-middle" style="display: flex">TUGASAN 
                            @if ($noti != 0)
                                <div class="alert alert-danger" role="alert" style="padding: 0 10%;margin: 0 10%;">
                                    {{$noti}}
                                </div>
                            @endif
                        </span>
                    </a>
                </li>

            @if(Auth::user()->kategori->nama == "Pegawai Aduan")

                @if (Request::is('Aduan') || Request::is('Aduan/*'))
                    <li class="sidebar-item active">
                @else
                    <li class="sidebar-item">
                @endif
                        <a  class="sidebar-link" href="/Aduan/List/Pegawai">
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xml:space="preserve" width="20" height="20" fill="currentColor" viewBox="0 0 100 100" style="margin-right:8;">
                                <path d="M50,47.5C50,43.356,53.356,40,57.5,40C61.644,40,65,43.356,65,47.5C65,51.644,61.644,55,57.5,55C53.356,55,50,51.644,50,47.5Z" stroke="none"></path>
                                <path d="M60,10.423L60,35.252C65.699,36.413,70,41.463,70,47.5S65.699,58.587,60,59.748L60,60C60,65.514,55.514,70,50,70L35,70L35,65L50,65C52.757,65,55,62.757,55,60L55,59.748C49.301,58.587,45,53.537,45,47.5S49.301,36.413,55,35.252L55,10C38.431,10,25,23.431,25,40L25,42.929L16.464,51.465C15.56,52.369,15,53.619,15,55C15,57.761,17.239,60,20,60L25,60L25,70C25,75.523,29.477,80,35,80L45,80L45,90L75,90L75,66.443C81.219,59.393,85,50.141,85,40L85,40C85,25.136,74.187,12.804,60,10.423Z" stroke="none"></path>
                            </svg>
                            <span class="align-middle">SENARAI ADUAN</span>
                        </a>
                        
                    </li>
            
            @endif

            @if(Auth::user()->kategori->nama == "Pengurus Rancangan")

                @if (Request::is('tarik_Diri') || Request::is('tarik_Diri/*'))
                    <li class="sidebar-item active">
                @else
                    <li class="sidebar-item">
                @endif
                        <a  class="sidebar-link" href="/tarik_Diri/List">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-envelope-slash-fill" viewBox="0 0 16 16">
                                <path d="M.05 3.555A2 2 0 0 1 2 2h12a2 2 0 0 1 1.95 1.555L8 8.414.05 3.555ZM0 4.697v7.104l5.803-3.558L0 4.697ZM6.761 8.83l-6.57 4.026A2 2 0 0 0 2 14h6.256A4.493 4.493 0 0 1 8 12.5a4.49 4.49 0 0 1 1.606-3.446l-.367-.225L8 9.586l-1.239-.757ZM16 4.697v4.974A4.491 4.491 0 0 0 12.5 8a4.49 4.49 0 0 0-1.965.45l-.338-.207L16 4.697Z"/>
                                <path d="M14.975 10.025a3.5 3.5 0 1 0-4.95 4.95 3.5 3.5 0 0 0 4.95-4.95Zm-4.243.707a2.501 2.501 0 0 1 3.147-.318l-3.465 3.465a2.501 2.501 0 0 1 .318-3.147Zm.39 3.854 3.464-3.465a2.501 2.501 0 0 1-3.465 3.465Z"/>
                              </svg> <span class="align-middle">PERMOHONAN TARIK DIRI</span>
                        </a>
                    </li>

            @endif
            
            @if(Auth::user()->kategori->nama == "Super Admin")
                @if (Request::is('users') || Request::is('users/*') || Request::is('user-categories') || Request::is('user-categories/*'))
                <li class="sidebar-item active">
                    <a data-bs-target="#pages" data-bs-toggle="collapse" class="sidebar-link" aria-expanded="true">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-people-fill" viewBox="0 0 16 16">
                            <path d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1H7Zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm-5.784 6A2.238 2.238 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.325 6.325 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1h4.216ZM4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5Z"/>
                        </svg><span class="align-middle">PENGURUSAN PENGGUNA</span>
                    </a>

                    <ul id="pages" class="sidebar-dropdown list-unstyled collapse show" data-bs-parent="#sidebar">
                        @if (Request::is('users') || Request::is('users/*'))
                        <li class="sidebar-item active"><a class="sidebar-link" href="/users">Senarai Pengguna</a></li>
                        @else
                        <li class="sidebar-item"><a class="sidebar-link" href="/users">Senarai Pengguna</a></li>
                        @endif
                        @if (Request::is('user-categories') || Request::is('user-categories/*'))
                        <li class="sidebar-item active"><a class="sidebar-link" href="/user-categories">Pengurusan Kategori Pengguna</a></li>
                        @else
                        <li class="sidebar-item"><a class="sidebar-link" href="/user-categories">Pengurusan Kategori Pengguna</a></li>
                        @endif
                    </ul>  
                </li>
                @else
                <li class="sidebar-item">
                    <a data-bs-target="#pages" data-bs-toggle="collapse" class="sidebar-link collapsed" aria-expanded="false">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-people-fill" viewBox="0 0 16 16">
                            <path d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1H7Zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm-5.784 6A2.238 2.238 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.325 6.325 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1h4.216ZM4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5Z"/>
                        </svg><span class="align-middle">PENGURUSAN PENGGUNA</span>
                    </a>
                    <ul id="pages" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                        <li class="sidebar-item"><a class="sidebar-link" href="/users">Senarai Pengguna</a></li>
                        <li class="sidebar-item"><a class="sidebar-link" href="/user-categories">Pengurusan Kategori Pengguna</a></li>
                    </ul>
                </li>
                @endif 
                @if (Request::is('moduls') || Request::is('moduls/*') || Request::is('modul/*') )
                <li class="sidebar-item active">
                    <a data-bs-target="#auth" data-bs-toggle="collapse" class="sidebar-link" aria-expanded="true">
                        <i class="align-middle me-2 fas fa-fw fa-folder"></i> <span class="align-middle">PENGURUSAN MODUL</span>
                    </a>
                    <ul id="auth" class="sidebar-dropdown list-unstyled collapse show" data-bs-parent="#sidebar">
                        @if (Request::is('modul/add'))
                        <li class="sidebar-item active"><a class="sidebar-link" href="/modul/add">Cipta Modul</a></li>
                        @else
                        <li class="sidebar-item"><a class="sidebar-link" href="/modul/add">Cipta Modul</a></li> 
                        @endif
                        @if (Request::is('moduls') || Request::is('moduls/*'))
                        <li class="sidebar-item active"><a class="sidebar-link" href="/moduls">Senarai Modul</a></li>
                        @else
                        <li class="sidebar-item"><a class="sidebar-link" href="/moduls">Senarai Modul</a></li>
                        @endif
                    </ul>
                </li>
                @else
                <li class="sidebar-item">
                    <a data-bs-target="#auth" data-bs-toggle="collapse" class="sidebar-link collapsed" aria-expanded="false">
                        <i class="align-middle me-2 fas fa-fw fa-folder"></i> <span class="align-middle">PENGURUSAN MODUL</span>
                    </a>
                    <ul id="auth" class="sidebar-dropdown list-unstyled collapse " data-bs-parent="#sidebar">
                        <li class="sidebar-item"><a class="sidebar-link" href="/modul/add">Cipta Modul</a></li>
                        <li class="sidebar-item"><a class="sidebar-link" href="/moduls">Senarai Modul</a></li>
                    </ul>
                </li>
                @endif

                @if (Request::is('pelaporan') || Request::is('pelaporan/*'))
                    <li class="sidebar-item active">
                        <a data-bs-target="#pelaporan" data-bs-toggle="collapse" class="sidebar-link collapsed" aria-expanded="true">
                            <i class="align-middle me-2 fas fa-fw fa-file-invoice"></i> <span class="align-middle">PELAPORAN</span>
                        </a>
                    <ul id="pelaporan" class="sidebar-dropdown list-unstyled collapse show" data-bs-parent="#sidebar">
                            
                @else
                    <li class="sidebar-item">
                        <a data-bs-target="#pelaporan" data-bs-toggle="collapse" class="sidebar-link collapsed" aria-expanded="false">
                            <i class="align-middle me-2 fas fa-fw fa-file-invoice"></i> <span class="align-middle">PELAPORAN</span>
                        </a>
                    <ul id="pelaporan" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">          
                @endif
                       @foreach ($menuModul as $mModul) 
                            <li class="sidebar-item"><a class="sidebar-link" href="/pelaporan/{{$mModul->id}}">{{$mModul->nama}}</a></li>
                        @endforeach
                    </ul>
                </li>

                @if (Request::is('user/borang_app') || Request::is('user/borang_app/*'))
                    <li class="sidebar-item active">
                @else
                    <li class="sidebar-item">
                @endif
                    <a  class="sidebar-link" href="/user/borang_app/list">
                        <i class="align-middle me-2 fas fa-fw fa-file-signature"></i> <span class="align-middle">KELULUSAN BORANG</span>
                    </a>
                </li>

                @if (Request::is('audit'))
                <li class="sidebar-item active">
                @else
                <li class="sidebar-item">
                @endif
                    <a  class="sidebar-link" href="/audit">
                        <i class="align-middle me-2 fas fa-fw fa-book"></i> <span class="align-middle">AUDIT</span>
                    </a>
                </li>
                
            @elseif(Auth::user()->kategori->nama != "Peserta")
                @if (Request::is('user/borang_app') || Request::is('user/borang_app/*'))
                    <li class="sidebar-item active">
                @else
                    <li class="sidebar-item">
                @endif
                    <a  class="sidebar-link" href="/user/borang_app/list">
                        <i class="align-middle me-2 fas fa-fw fa-file-signature"></i> <span class="align-middle">KELULUSAN BORANG</span>
                    </a>
                </li>
            @endif

            <li class="sidebar-header">
                Pengguna
            </li>
            @if (Request::is('/user/sub_borang/*'))
                <li class="sidebar-item active">
            @else
                <li class="sidebar-item">
            @endif
                <a  class="sidebar-link" href="/user/sub_borang/list">
                    <i class="align-middle me-2 fas fa-fw fa-list-alt"></i> <span class="align-middle">BORANG DI MOHON</span>
                </a>
            </li>
            @foreach ($menuModul as $mModul) 
            <li class="sidebar-item">
                <a data-bs-target="#auth{{$mModul->id}}" data-bs-toggle="collapse" class="sidebar-link collapsed" aria-expanded="false">
                    <i class="align-middle me-2 ion ion-ios-folder"></i> <span class="align-middle" style="text-transform: uppercase;">{{$mModul->nama}}</span>
                </a>
                <ul id="auth{{$mModul->id}}" class="sidebar-dropdown list-unstyled collapse " data-bs-parent="#sidebar">
                    @foreach ($menuProses as $mProses)
                        @if ($mProses->modul_id == $mModul->id)
                        <li class="sidebar-item">
                            <a data-bs-target="#subauth{{$mProses->id}}" data-bs-toggle="collapse" class="sidebar-link submenu collapsed" aria-expanded="false">
                                <i class="align-middle me-2 ion ion-ios-journal"></i> <span class="align-middle">{{$mProses->nama}}</span>
                            </a>
                            <ul id="subauth{{$mProses->id}}" class="sidebar-dropdown list-unstyled collapse " data-bs-parent="#submenu">
                                @foreach ($menuBorang as $mBorang)
                                    @if ($mBorang->proses_id == $mProses->id)
                                        <li class="sidebar-item"><a class="sidebar-link" href="/userBorang/view/{{$mBorang->id}}"><i class="align-middle me-2 fas fa-fw fa-file-alt"></i>{{$mBorang->namaBorang}}</a></li>  
                                    @endif                                  
                                @endforeach
                            </ul>
                        </li>
                        @endif
                    @endforeach
                </ul>
            </li>
            @endforeach
{{-- 
            @foreach ($menuModul as $mModul)
                <li class="sidebar-header">
                    {{$mModul->nama}}
                </li>
                @foreach ($menuProses as $mProses)
                    @if ($mProses->modul == $mModul->id)
                        <li class="sidebar-item">
                            <a data-bs-target="#auth{{$mProses->id}}" data-bs-toggle="collapse" class="sidebar-link collapsed" aria-expanded="false">
                                <i class="align-middle ion ion-ios-journal me-2"></i> <span class="align-middle">{{$mProses->nama}}</span>
                            </a>
                            <ul id="auth{{$mProses->id}}" class="sidebar-dropdown list-unstyled collapse " data-bs-parent="#sidebar">
                                @foreach ($menuBorang as $mBorang)
                                    @if ($mBorang->proses == $mProses->id)
                                        <li class="sidebar-item"><a class="sidebar-link" href="/userBorang/view/{{$mBorang->id}}">{{$mBorang->namaBorang}}</a></li>                                    
                                    @endif
                                @endforeach
                            </ul>
                        </li>
                    @endif
                @endforeach
            @endforeach --}}

            
            
            {{-- <li class="sidebar-item">
                <a data-bs-target="#ui" data-bs-toggle="collapse" class="sidebar-link collapsed">
                    <i class="align-middle me-2 fas fa-fw fa-flask"></i> <span class="align-middle">User Interface</span>
                </a>
                <ul id="ui" class="sidebar-dropdown list-unstyled collapse " data-bs-parent="#sidebar">
                    <li class="sidebar-item"><a class="sidebar-link" href="ui-alerts.html">Alerts</a></li>
                    <li class="sidebar-item"><a class="sidebar-link" href="ui-buttons.html">Buttons</a></li>
                    <li class="sidebar-item"><a class="sidebar-link" href="ui-cards.html">Cards</a></li>
                    <li class="sidebar-item"><a class="sidebar-link" href="ui-general.html">General</a></li>
                    <li class="sidebar-item"><a class="sidebar-link" href="ui-grid.html">Grid</a>
                    </li>
                    <li class="sidebar-item"><a class="sidebar-link" href="ui-modals.html">Modals</a></li>
                    <li class="sidebar-item"><a class="sidebar-link" href="ui-offcanvas.html">Offcanvas</a></li>
                    <li class="sidebar-item"><a class="sidebar-link" href="ui-notifications.html">Notifications</a></li>
                    <li class="sidebar-item"><a class="sidebar-link" href="ui-tabs.html">Tabs</a>
                    </li>
                    <li class="sidebar-item"><a class="sidebar-link" href="ui-typography.html">Typography</a></li>
                </ul>
            </li> --}}
        </ul>
    </div>
</nav>