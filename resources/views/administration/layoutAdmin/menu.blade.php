  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Osature</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ 'image/profil/'.auth()->user()->avatar }}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="{{ route('index_admin_path') }}" class="d-block">{{ auth()->user()->nomuser }}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">


          <li class="nav-header active">Configuration</li>


                <li class="nav-item has-treeview">
                <a href="{{ route('admin_about_path') }}" class="nav-link">
                    <i class="nav-icon fas fa-copy"></i>
                    <p>
                        ABOUT US
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ route('admin_about_path') }}" class="nav-link">
                            <i class="fa fa-caret-right nav-icon"></i>
                            <p>Gerer ABOUT US</p>
                        </a>
                    </li>

                </ul>
            </li>

            <li class="nav-item has-treeview">
                <a href="{{ route('admin_faq_path') }}" class="nav-link">
                    <i class="nav-icon fas fa-copy"></i>
                    <p>
                        FAQ
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ route('admin_faq_path') }}" class="nav-link">
                            <i class="fa fa-caret-right nav-icon"></i>
                            <p>Gerer FAQ</p>
                        </a>
                    </li>

                </ul>
            </li>

            <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-phone"></i>
                    <p>
                        CONTACT
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">

                    <li class="nav-item">
                        <a href="{{ route('admin_contact_path') }}" class="nav-link">
                            <i class="fa fa-caret-right nav-icon"></i>
                            <p>Adresses</p>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-phone"></i>
                    <p>
                    INVESTMENT
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">

                    <li class="nav-item">
                        <a href="{{ route('admin_Investment_path') }}" class="nav-link">
                            <i class="fa fa-caret-right nav-icon"></i>
                            <p>New</p>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item">
                <a href="Administration|news" class="nav-link">
                    <i class="nav-icon far fa-plus-square"></i>
                    <p>
                        NEWS
                    </p>
                </a>
            </li>
            <li class="nav-header active">Extra</li>

                              <li class="nav-item">
                                  <a href="{{ route('admin_Deconnexion_path') }}" class="nav-link">
                                      <p>Déconnexion</p>
                                  </a>
                              </li>

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
