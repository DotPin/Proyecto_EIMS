    <aside class="sidebar-left"> 
        <section class="sidebar">
          <!-- Sidebar user panel -->
          <div class="user-panel">
            <div class="pull-left image">
              <img src="{{Auth::user()->avatar}}" class="img-circle" alt="User Image">
            </div>
            <div class="info">
              <p>{{Auth::user()->name}}</p>
               <p>{{Auth::user()->lName}}</p>
                @if(Auth::user()->type == 'admin')
                  <p><small>Admin</small></p>
                @elseif(Auth::user()->type == 'worker')
                  <p><small>Worker</small></p>
                @endif
              <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
          </div>
          <!-- Sidebar Menu -->
          @if(Auth::user()->type == 'admin')
          <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>
            <li class="treeview {{ request()->is('home') ? 'active' : '' }}">
              <a href="/home"><i class="fa fa-home"></i> <span>Inicio</span></a>
            </li>
            <li class="treeview {{ request()->is('admin/workers/*') ? 'active' : '' }}">
              <a href="#"><i class="fa fa-users"></i> <span>Trabajadores</span>
              <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
              </span>
              </a>
              <ul class="treeview-menu">
                <li class="{{ request()->is('admin/workers/list') ? 'active' : '' }}">
                  <a href="{{URL::to('admin/workers/list')}}">Ver lista</a></li>
                <li class="{{ request()->is('admin/workers/new') ? 'active' : '' }}">
                  <a href="{{URL::to('admin/workers/new')}}">Registrar</a></li>
              </ul>
            </li>
            <li class="treeview {{ request()->is('admin/items/*') ? 'active' : '' }}">
              <a href="#"><i class="fa fa-archive"></i> <span>Items</span>
              <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
              </span>
              </a>
              <ul class="treeview-menu">
                <li class="{{ request()->is('admin/items/general-view') ? 'active' : '' }}">
                  <a href="{{URL::to('admin/items/general-view')}}">Vista general</a></li>
                <li class="{{ request()->is('admin/items/management') ? 'active' : '' }}">
                  <a href="{{URL::to('admin/items/management')}}">Administrar</a></li>
                <li class="{{ request()->is('admin/items/create-item') ? 'active' : '' }}">
                  <a href="{{URL::to('admin/items/create-item')}}">Agregar item</a></li>
                <li class="{{ request()->is('admin/items/loans/track') ? 'active' : '' }}">
                <a href="{{URL::to('admin/items/loans/track')}}">Prestamos</a></li>
              </ul>
            </li>
            <li class="treeview {{ request()->is('admin/suppliers/*') ? 'active' : '' }}">
              <a href="{{URL::to('admin/suppliers/management')}}"><i class="fa fa-truck"></i> <span>Proveedores</span></a>
            </li>
          </ul>
          @elseif(Auth::user()->type == 'worker')
          <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>
            <li class="treeview {{ request()->is('workerHhome') ? 'active' : '' }}">
              <a href="{{URL::to('worker/home')}}"><i class="fa fa-home"></i> <span>Inicio</span></a>
            </li>
            <li class="treeview {{ request()->is('worker/inventory/*') ? 'active' : '' }}">
              <a href="#"><i class="fa fa-archive"></i> <span>Inventario</span>
              <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
              </span>
              </a>
              <ul class="treeview-menu">
                <li class="{{ request()->is('worker/inventory/generalView') ? 'active' : '' }}">
                  <a href="{{URL::to('worker/inventory/generalView')}}">Vista general</a></li>
                <li class="{{ request()->is('worker/inventory/loansStatus') ? 'active' : '' }}">
                <a href="{{URL::to('worker/inventory/loansStatus')}}">Prestamos actuales</a></li>
              </ul>
            </li>
          </ul>
          @endif
          <!-- /. sidebar-menu -->
        </section>
    </aside>