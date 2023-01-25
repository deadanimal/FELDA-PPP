<style>
    .sidebar.toggled {
    margin-left: -260px;
}
</style>
<nav id="sidebar" class="sidebar" style="max-width: auto; min-width:auto;">
    <a class="sidebar-brand" href="/dashboard" style="background:#781E2A;">
        <img src="/Image/logo.png" style="max-width: 230px; background:#ffff; border-radius:4px;"/>
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
                    <i class="align-middle me-2 fas fa-fw fa-home"></i> <span class="align-middle">LAMAN UTAMA</span>
                </a>
            </li>
            @if (Request::is('user/tugasan') || Request::is('user/tugasan/*'))
                    <li class="sidebar-item active">
                @else
                    <li class="sidebar-item">
                @endif
                    <a  class="sidebar-link" href="/user/tugasan/list">
                        <i class="align-middle me-2 fas fa-fw fa-clipboard-check"></i> <span class="align-middle">TUGASAN</span>
                    </a>
                </li>
            @if(Auth::user()->kategoripengguna == "1")
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
                        <i class="align-middle me-2 fas fa-fw fa-file"></i> <span class="align-middle">PENGURUSAN MODUL</span>
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
                        <i class="align-middle me-2 fas fa-fw fa-folder-open"></i> <span class="align-middle">PENGURUSAN MODUL</span>
                    </a>
                    <ul id="auth" class="sidebar-dropdown list-unstyled collapse " data-bs-parent="#sidebar">
                        <li class="sidebar-item"><a class="sidebar-link" href="/modul/add">Cipta Modul</a></li>
                        <li class="sidebar-item"><a class="sidebar-link" href="/moduls">Senarai Modul</a></li>
                    </ul>
                </li>
                @endif

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
            @elseif(Auth::user()->kategoripengguna != "4")
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
                    <i class="align-middle me-2 ion ion-ios-folder"></i> <span class="align-middle">{{$mModul->nama}}</span>
                </a>
                <ul id="auth{{$mModul->id}}" class="sidebar-dropdown list-unstyled collapse " data-bs-parent="#sidebar">
                    @foreach ($menuProses as $mProses)
                        @if ($mProses->modul == $mModul->id)
                        <li class="sidebar-item">
                            <a data-bs-target="#subauth{{$mProses->id}}" data-bs-toggle="collapse" class="sidebar-link submenu collapsed" aria-expanded="false">
                                <i class="align-middle me-2 ion ion-ios-journal"></i> <span class="align-middle">{{$mProses->nama}}</span>
                            </a>
                            <ul id="subauth{{$mProses->id}}" class="sidebar-dropdown list-unstyled collapse " data-bs-parent="#submenu">
                                @foreach ($menuBorang as $mBorang)
                                    @if ($mBorang->proses == $mProses->id)
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