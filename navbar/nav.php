 <!-- Sidebar -->
 <ul class="navbar-nav bg-gradient-info sidebar sidebar-dark accordion" id="accordionSidebar">

<!-- Sidebar - Brand -->
<a class="sidebar-brand d-flex align-items-center justify-content-center" href="ad_index.php">
    <div class="sidebar-brand-icon rotate-n-15">
        <i class="fa fa-heartbeat"></i>
    </div>
    <div class="sidebar-brand-text mx-3"> vokse </div>
</a>

<!-- Divider -->
<hr class="sidebar-divider my-0">

<!-- Nav Item - Dashboard -->
<li class="nav-item active">
    <a class="nav-link" href="ad_index.php">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Dashboard</span></a>
</li>

<!-- Divider -->
<hr class="sidebar-divider">



<!-- Nav Item - Pages Collapse Menu -->
<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
        aria-expanded="true" aria-controls="collapseTwo">
        <i class="fa fa-user-circle"></i>
        <span>member</span>
    </a>
    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">member</h6>
            <a class="collapse-item" href="ad_teacher.php">tercher</a>
            <a class="collapse-item" href="ad_user.php">user</a>
        </div>
    </div>
</li>

<!-- Nav Item - Utilities Collapse Menu    -->
<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
        aria-expanded="true" aria-controls="collapseUtilities">
        <i class="fa fa-table"></i>
        <span>reprot</span>
    </a>
    <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
        data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">reprot:</h6>
            <a class="collapse-item" href="ad_work.php">work</a>
            <a class="collapse-item" href="ad_booking.php">booking</a>
            <a class="collapse-item" href="ad_article.php">article</a>
            
        </div>
    </div>
</li>

<!-- Nav Item - category -->
<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#category"
        aria-expanded="true" aria-controls="category">
        <i class="fa fa-table"></i>
        <span>category</span>
    </a>
    <div id="category" class="collapse" aria-labelledby="headingUtilities"
        data-parent="#category">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">category:</h6>
            <a class="collapse-item" href="#">tag in work</a>
            <a class="collapse-item" href="#">room in booking</a>
            <a class="collapse-item" href="#">consult in booking</a>
            <a class="collapse-item" href="#">tag in article</a>
            
        </div>
    </div>
</li>


<!-- Divider -->
<hr class="sidebar-divider d-none d-md-block">

<!-- Sidebar Toggler (Sidebar) -->
<div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
</div>



</ul>
<!-- End of Sidebar -->
