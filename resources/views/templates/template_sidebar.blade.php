<aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
          <div class="user-panel">
            <div class="pull-left image">
              <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
              <p>Alexander Pierce</p>
              <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
          </div>
          <!-- search form -->
          <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
              <input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i></button>
              </span>
            </div>
          </form>
          <!-- /.search form -->
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>
             <li>
              <a href="#">
                <i class="fa  fa-child"></i> <span>Personas</span>
              </a>
             </li>
             <li>
              <a href="#">
                <i class="fa fa-list-alt"></i> <span>Pre-informes</span>
              </a>
             </li>

              <li>
              <a href="#">
                <i class="fa fa-user"></i> <span>Matrículas</span>
              </a>
             </li>

              <li>
              <a href="#">
                <i class="fa fa-pencil-square-o"></i> <span>Recibos</span>
              </a>
             </li>
              <li>
              <a href="{{route('curso.index') }}">
                <i class="fa fa-user"></i> <span>Cursos</span>
              </a>
             </li>
              <li>
              <a href="{{route('carrera.index')}}">
                <i class="fa fa-user"></i> <span>Carreras</span>
              </a>
             </li>
             <li>
              <a href="{{route('materia.index') }}">
                <i class="fa fa-user"></i> <span>Materias</span>
              </a>
             </li>
             <li>
              <a href="#">
                <i class="fa  fa-users"></i> <span>Grupos</span>
              </a>
             </li>

             <li>
              <a href="#">
                <i class="fa fa-file-text-o"></i> <span>Exámenes</span>
              </a>
             </li>

             <li>
              <a href="#">
                <i class="fa fa-user"></i> <span>Asesores</span>
              </a>
             </li>

             <li>
              <a href="{{ route('docentes.index')}}">
                <i class="fa fa-user"></i> <span>Docentes</span>
              </a>
             </li>

             <li>
              <a href="#">
                <i class="fa fa-bar-chart-o"></i> <span>Estadísticas</span>
              </a>
             </li>

            <li class="active treeview">
               <a href="{{route('alumnos.index') }}">
                <i class="fa fa-user"></i> <span>Alumnos</span> <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li class="active"><a href="{{route('alumnos.index')}}"><i class="fa fa-circle-o"></i> Dashboard v1</a></li>
                <li> <a href="{{route('alumnos.index') }}"><i class="fa fa-circle-o"></i> Dashboard v2</a></li>
              </ul>
            </li>

            <li>
              <a href="#">
                <i class="fa fa-contao"></i> <span>Contactos</span>
              </a>
             </li>
           
            <li class="header">LABELS</li>
            <li><a href="#"><i class="fa fa-circle-o text-red"></i> <span>Important</span></a></li>
            <li><a href="#"><i class="fa fa-circle-o text-yellow"></i> <span>Warning</span></a></li>
            <li><a href="#"><i class="fa fa-circle-o text-aqua"></i> <span>Information</span></a></li>
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>
