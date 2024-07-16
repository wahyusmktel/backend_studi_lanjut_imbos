<!-- resources/views/admin/partials/sidebar.blade.php -->
<div class="fixed-sidebar-left">
    <ul class="nav navbar-nav side-nav nicescroll-bar">
        <li class="navigation-header">
            <span>Main</span> 
            <hr/>
        </li>
        <li>
            <a href="/admin/dashboard"><div class="pull-left"><i class="ti-dashboard mr-20"></i><span class="right-nav-text">Dashboard</span></div><div class="clearfix"></div></a>
        </li>
        <li>
            <a href="javascript:void(0);" data-toggle="collapse" data-target="#data_guru"><div class="pull-left"><i class="ti-dashboard mr-20"></i><span class="right-nav-text">Data Guru</span></div><div class="pull-right"><i class="ti-angle-down"></i></div><div class="clearfix"></div></a>
            <ul id="data_guru" class="collapse collapse-level-1">
                <li>
                    <a href="/admin/guru">Data Guru</a>
                </li>
            </ul>
        </li>
        <li>
            <a href="javascript:void(0);" data-toggle="collapse" data-target="#data_master"><div class="pull-left"><i class="ti-dashboard mr-20"></i><span class="right-nav-text">Master Data</span></div><div class="pull-right"><i class="ti-angle-down"></i></div><div class="clearfix"></div></a>
            <ul id="data_master" class="collapse collapse-level-1">
                <li>
                    <a href="/admin/mata_pelajaran/">Mata Pelajaran</a>
                </li>
                <li>
                    <a href="/admin/kelas/">Kelas</a>
                </li>
                <li>
                    <a href="/admin/program_bimbel/">Program Bimbel</a>
                </li>
                <li>
                    <a href="/admin/siswa/">Siswa</a>
                </li>
                <li>
                    <a href="/admin/tahun_pelajaran/">Tahun Pelajaran</a>
                </li>
            </ul>
        </li>
        <li>
            <a href="javascript:void(0);" data-toggle="collapse" data-target="#tryout"><div class="pull-left"><i class="ti-dashboard mr-20"></i><span class="right-nav-text">Try Out</span></div><div class="pull-right"><i class="ti-angle-down"></i></div><div class="clearfix"></div></a>
            <ul id="tryout" class="collapse collapse-level-1">
                <li>
                    <a href="/admin/tryout">Data Try Out</a>
                </li>
            </ul>
        </li>
        <li>
            <a href="javascript:void(0);" data-toggle="collapse" data-target="#nilai"><div class="pull-left"><i class="ti-dashboard mr-20"></i><span class="right-nav-text">Nilai</span></div><div class="pull-right"><i class="ti-angle-down"></i></div><div class="clearfix"></div></a>
            <ul id="nilai" class="collapse collapse-level-1">
                <li>
                    <a href="/admin/nilai">Data Nilai</a>
                </li>
            </ul>
        </li>
        <!-- Add other sidebar items here -->
    </ul>
</div>
