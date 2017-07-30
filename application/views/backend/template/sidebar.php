<!-- Left side column. contains the sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>
            <li>
                <a href="<?php echo base_url('admin/dashboard') ?>""><i class="fa fa-dashboard"></i> <span>Dashboard</span></a>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-th-list"></i>
                    <span>Kelola Lapang</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="<?php echo base_url('admin/lapang') ?>"><i class="fa fa-circle-o"></i> Lapang</a></li>
                    <li><a href="<?php echo base_url('admin/reservasi') ?>"><i class="fa fa-circle-o"></i> Booking</a></li>
                </ul>
            </li>
            <li>
                <a href="<?php echo base_url('admin/artikel') ?>"><i class="fa fa-edit"></i> <span>Artikel</span></a>
            </li>         
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-users"></i>
                    <span>User Management</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="<?php echo base_url('admin/user-trustee/admin') ?>"><i class="fa fa-circle-o"></i> Admin</a></li>
                    <li><a href="<?php echo base_url('admin/user-trustee/owner') ?>"><i class="fa fa-circle-o"></i> Owner</a></li>
                    <li><a href="<?php echo base_url('admin/user-trustee/member') ?>"><i class="fa fa-circle-o"></i> Member</a></li>
                </ul>
            </li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>

<div class="content-wrapper">