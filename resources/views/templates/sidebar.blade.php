<div id="app">
    <div id="sidebar" class="active">
        <div class="sidebar-wrapper active">
            <div class="sidebar-header">
                <div class="d-flex justify-content-between">
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
                    <li class="sidebar-item active">
                        <a href="{{url('/dashboard')}}" class='sidebar-link'>
                            <i class="bi bi-grid-fill"></i>
                            <span>Dashboard</span>
                        </a>
                    </li>

                    <li class="sidebar-item">
                        <a href="{{url('/visitor')}}" class='sidebar-link'>
                            <i class="fa-solid fa-users"></i>
                            <span>Data Visitor</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="{{url('/employee')}}" class='sidebar-link'>
                            <i class="fa-solid fa-briefcase"></i>
                            <span>Data Karyawan</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="{{url('/officer')}}" class='sidebar-link'>
                            <i class="fa-regular fa-building"></i>
                            <span> Data Petugas</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="{{url('/fungsi')}}" class='sidebar-link'>
                            <i class="fa-brands fa-accusoft"></i>
                            <span> Data Fungsi</span>
                        </a>
                    </li>

                    <li class="sidebar-title">Laporan</li>

                    <li class="sidebar-item  ">
                        <a href="{{url('/laporan')}}" class='sidebar-link'>
                            <i class="fa-solid fa-book"></i>
                            <span>Laporan Data Pengunjung</span>
                        </a>
                        <a href="{{url('/cetakformpertanggal')}}" class='sidebar-link'>
                            <i class="fa-solid fa-book"></i>
                            <span>Laporan Data Pengunjung per Tanggal Berkunjung</span>
                        </a>
                    </li>
                </ul>
            </div>
            <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
        </div>
    </div>
</div>
