
<style>
    .logo-pertamina img {
        width: auto;
        height: auto;
        max-width: 100%;
        max-height: 100%;


    }

    #myDiv {
        display: none;
        text-align: center;
        
    }
</style>

<div id="app">
        <div class="sidebar-wrapper active">
            <div class="logo-pertamina">
                <img src="{{ asset('assets\images\logo\pertamina.png') }}" alt="">
            </div>
            <div class="sidebar-header">
                <div class="d-flex justify-content-between">
                    <!-- logo pertamina -->

                    <div class="col">
                        <h6>PT Pertamina Patra Niaga Regional Sumbagsel</h6>
                    </div>
                    <div class="toggler">
                        <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                    </div>
                </div>
            </div>

            <div id="sidebar-menu">
                <ul class="menu">
                    <li class="sidebar-title">Menu</li>
                    <li class="sidebar-item @if(Request::segment(2)=='') active @endif">
                        <a href="{{url('/master-data-petugas/')}}" class='sidebar-link'>
                            <i class="bi bi-grid-fill mr-1"></i>
                            <span>Dashboard</span>
                        </a>
                    </li>
                    <li class="sidebar-item sidebar-item @if(Request::segment(2)=='logout') active @endif">
                        <a href="{{url('/logout')}}" class='sidebar-link'>
                        <i class="bi bi-box-arrow-left"></i>
                            <span> Log Out</span>
                        </a>
                    </li>
                    <li class="sidebar-title">Laporan</li>
                    <li class="sidebar-item @if(Request::segment(2)=='laporan') active @endif">
                        <a href="{{url('/master-data-petugas/laporan')}}" class='sidebar-link'>
                        <i class="bi bi-file-text-fill"></i>
                            <span>Laporan Data Pengunjung</span>
                        </a>
                    </li>
                </ul>
            </div>
            <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
        </div>
    </div>
</div>