<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ url('/admin/') }}">
        <div class="sidebar-brand-text mx-3">Food Hunter Admin</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="{{ route('user.index') }}">
            <i class="fas fa-fw fa-user"></i>
            <span>Kelola User</span></a>
    </li>
    <li class="nav-item active">
        <a class="nav-link" href="{{ route('tempatmakan.index') }}">
            <i class="fas fa-fw fa-map-marker-alt"></i>
            <span>Tempat Makan</span></a>
    </li>
    <li class="nav-item active">
        <a class="nav-link" href="{{ route('gallery.index') }}">
            <i class="fas fa-fw fa-images"></i>
            <span>Galeri Tempat Makan</span></a>
    </li>
    <li class="nav-item active">
        <a class="nav-link" href="{{ route('review.index') }}">
            <i class="fas fa-fw fa-comments"></i>
            <span>Ulasan Tempat Makan</span></a>
    </li>
    <li class="nav-item active">
        <a class="nav-link" href="{{ route('favorite.index') }}">
            <i class="fas fa-fw fa-heart"></i>
            <span>Tempat Makan Favorit</span></a>
    </li>
    <li class="nav-item active">
        <a class="nav-link" href="{{ route('category.index') }}">
            <i class="fas fa-fw fa-utensils"></i> 
            {{-- bisa cari ikon lain yang lebih cocok gak nih wkwk --}}
            <span>Kategori Tempat Makan</span></a>
    </li>
    

    <!-- Divider -->
    <hr class="sidebar-divider">

</ul>
<!-- End of Sidebar -->
