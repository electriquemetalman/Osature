<?php

    use App\models\PermissionRole;

    function checkpermission($nom){
        $check = PermissionRole::join('permissions', 'permissions.id', '=', 'permission_roles.permissions_id')
                                ->where('permission_roles.roles_id',auth()->user()->roles_id)
                                ->where('permissions.nom',$nom)
                                ->count();   
        if($check==0){
            return false;
        }
        return true;
    }
?>
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
          <img src="{{auth()->user()->image=='' ? 'profile.jpg':'image/profil/'.auth()->user()->image}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="{{ route('index_admin_path') }}" class="d-block">{{ auth()->user()->nomuser }}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">


          <li class="nav-header active">Configuration</li>
            @if(checkpermission('voir_aboutUs'))
            <li class="nav-item has-treeview">
                <a href="{{ route('admin_about_path') }}" class="nav-link" >
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
            @endif

            @if(checkpermission('voir_faq'))
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
            @endif

            @if(checkpermission('voir_contact'))
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
            @endif

            @if(checkpermission('voir_investment'))
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
            @endif

            @if(checkpermission('voir_compte'))
            <li class="nav-header active">Utilisateur</li>
            <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-user"></i>
                    <p>
                    COMPTE UTILISATEUR
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">

                    <li class="nav-item">
                        <a href="{{ route('admin_AccountList_path') }}" class="nav-link">
                            <i class="fa fa-caret-right nav-icon"></i>
                            <p>Gerer les comptes</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin_Role') }}" class="nav-link">
                            <i class="fa fa-caret-right nav-icon"></i>
                            <p>Gerer les roles</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin_Permission') }}" class="nav-link">
                            <i class="fa fa-caret-right nav-icon"></i>
                            <p>Gerer les permissions</p>
                        </a>
                    </li>
                </ul>
            </li>
            @endif

            @if(checkpermission('voir_news'))
            <li class="nav-item">
                <a href="Administration|news" class="nav-link">
                    <i class="nav-icon far fa-plus-square"></i>
                    <p>
                        NEWS
                    </p>
                </a>
            </li>
            @endif

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
