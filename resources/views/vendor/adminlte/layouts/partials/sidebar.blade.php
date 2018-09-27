<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- Sidebar user panel (optional) -->
        @if (! Auth::guest())
            <div class="user-panel">
                <div class="pull-left image">
                    <img src="img/noemi.jpg" class="img-circle" alt="User Image" />
                </div>
                <div class="pull-left info">
                    <p>{{ Auth::user()->name }}</p>
                    <!-- Status -->
                    <a href="#"><i class="fa fa-circle text-success"></i> {{ trans('adminlte_lang::message.online') }}</a>
                </div>
            </div>
        @endif

        <!-- search form (Optional) -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="{{ trans('adminlte_lang::message.search') }}..."/>
              <span class="input-group-btn">
                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
              </span>
            </div>
        </form>
        <!-- /.search form -->

        <!-- Sidebar Menu -->
        <ul class="sidebar-menu">
            <li class="header">{{ trans('adminlte_lang::message.header') }}</li>
            <!-- Optionally, you can add icons to the links -->
            <li class="treeview">
                <a href="#"><i class='fa fa-tachometer'></i> <span>DASHBOARD</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="#"><i class='fa fa-bar-chart-o'></i>Dashboard Sistema</a></li>
                    <li><a href="#">Dashboard Peticiones</a></li>
                    <li><a href="#">Dashboard SLA</a></li>
                    <li><a href="#">Dashboard Prioridad</a></li>

                </ul>
            </li>
            
            

            <li class="treeview">
                <a href="#"><i class=' fa fa-users'></i> <span>GESTION USUARIO</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="#">Perfil de Usuarios</a></li>
                    <li><a href="{{ url('/Usuario') }}"><i class="fa fa-user" aria-hidden="true"></i>Usuarios</a></li>
                    <li><a href="{{ url('/TipoUsuario') }}"><i class='fa fa-users'></i>Tipo Usuarios</a></li>
                    <li><a href="{{ url('/general') }}"><i class='fa fa-users' ></i>Mostar</a></li>
                  

                </ul>
            </li>

             <li class="treeview">
                <a href="#"><i class='fa fa-bar-chart-o'></i> <span> GESTION REGISTRO</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="{{ url('/Avance')}} "><i class="fa fa-file-text-o"></i>Gestion Avances </a></li> 
                    <li><a href="{{ url('/Actividad')}}"><i class="fa fa-list"></i>Gestion Actividad</a></li>
                    <li><a href="{{ url('/Departamento') }}"><i class="fa fa-university"></i>Gestion Departamento</a></li>
                    <li><a href="{{ url('/Estado')}}"><i class="fa fa-cogs"></i>Gestion Estado</a></li>
                    <li><a href="{{ url('/Informe')}}"><i class="fa fa-list-alt" ></i>Gestion Informe</a></li>
                    <li><a href="{{ url('/subtema')}}"><i class="fa fa-file-o"></i>Gestion Subtema</a></li> 
                    <li><a href="{{ url('/recomendaciones')}}"><i class="fa fa-file"></i>Gestion Recomendacion </a></li> 
                    <li><a href="{{ url('/RecomendacionesDepartamento')}}"><i class="fa fa-archive"></i>Gestion RecomendacionesD</a></li>
                    <li><a href="{{ url('/TipoRecomendacion') }}"><i class="fa fa-file-o"></i> Gestion TRecomendacion </a></li> 
                    <li><a href="{{ url('/Tarea')}}"><i class="fa fa-bar-chart"></i>Gestion Tarea</a></li>
                
                    

                </ul>
            </li>

        </ul><!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>
