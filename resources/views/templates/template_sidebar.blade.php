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
            <?php
              switch (session('usuario')['rol_id']) {
                case 2: 
            ?>
                <li class="treeview">
                  <a href="{{route('dueño.directores')}}">
                    <i class="fa fa-child"></i> <span>@lang('menu.directores')</span><i class="fa fa-angle-left pull-right"></i>
                  </a>
                  <ul class="treeview-menu">
                    <li class="active"><a href="{{route('dueño.directores')}}"><i class="fa fa-circle-o"></i> Lista</a></li>
                    <li> <a href="{{route('dueño.directores_nuevo') }}"><i class="fa fa-circle-o"></i> Nuevo</a></li>
                  </ul>
                </li>

                <li class="treeview">
                  <a href="{{route('dueño.filiales')}}">
                    <i class="fa fa-child"></i> <span>@lang('menu.filiales')</span><i class="fa fa-angle-left pull-right"></i>
                  </a>
                  <ul class="treeview-menu">
                    <li class="active"><a href="{{route('dueño.filiales')}}"><i class="fa fa-circle-o"></i> Lista</a></li>
                    <li> <a href="{{route('dueño.filiales_nuevo') }}"><i class="fa fa-circle-o"></i> Nuevo</a></li>
                  </ul>
                </li>

                <li>
                  <a href="#"> <i class="fa fa-bar-chart-o"></i> <span>@lang('menu.estadistica')</span> </a>
                </li>
            <?php
                break;
                case 3:
                break;
                case 4:
            ?>
                <li>
                <a href="#"> <i class="fa fa-child"></i> <span>@lang('menu.persona')</span> </a>
                </li>

                <li class="treeview">
                    <a href="{{route('filial.preinformes')}}">
                      <i class="fa fa-list-alt"></i> <span>@lang('menu.preinforme')</span><i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                      <li class="active"><a href="{{route('filial.preinformes')}}"><i class="fa fa-circle-o"></i> Lista</a></li>
                      <li> <a href="{{route('filial.preinformes_seleccion') }}"><i class="fa fa-circle-o"></i> Nuevo</a></li>
                    </ul>
                  </li>

                  <li class="treeview">
                    <a href="{{route('filial.matriculas')}}">
                      <i class="fa fa-user"></i> <span>@lang('menu.matricula')</span><i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                      <li class="active"><a href="{{route('filial.matriculas')}}"><i class="fa fa-circle-o"></i> Lista</a></li>
                      <li> <a href="{{route('filial.matriculas_seleccion') }}"><i class="fa fa-circle-o"></i> Nueva</a></li>
                    </ul>
                  </li>

                  <li>
                  <a href="#">
                    <i class="fa fa-pencil-square-o"></i> <span>@lang('menu.recibo')</span>
                  </a>
                  </li>

                  <li class="treeview">
                    <a href="{{route('filial.cursos') }}">
                      <i class="fa fa-user"></i> <span>@lang('menu.curso')</span><i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                      <li class="active"><a href="{{route('filial.cursos')}}"><i class="fa fa-circle-o"></i> Lista</a></li>
                      <li> <a href="{{route('filial.cursos_nuevo') }}"><i class="fa fa-circle-o"></i> Nuevo</a></li>
                    </ul>
                  </li>

                  <li class="treeview">
                    <a href="{{route('filial.carreras')}}">
                      <i class="fa fa-user"></i> <span>@lang('menu.carrera')</span><i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                      <li class="active"><a href="{{route('filial.carreras')}}"><i class="fa fa-circle-o"></i> Lista</a></li>
                      <li> <a href="{{route('filial.carreras_nuevo') }}"><i class="fa fa-circle-o"></i> Nueva</a></li>
                    </ul>
                  </li>

                  <li class="treeview">
                    <a href="{{route('filial.materias')}}">
                      <i class="fa fa-user"></i> <span>@lang('menu.materia')</span><i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                      <li class="active"><a href="{{route('filial.materias')}}"><i class="fa fa-circle-o"></i> Lista</a></li>
                      <li> <a href="{{route('filial.materias_nuevo') }}"><i class="fa fa-circle-o"></i> Nueva</a></li>
                    </ul>
                  </li>

                  <li>
                  <a href="#">
                    <i class="fa  fa-users"></i> <span>@lang('menu.grupo')</span>
                  </a>
                  </li>

                  <li>
                  <a href="#">
                    <i class="fa fa-file-text-o"></i> <span>@lang('menu.examen')</span>
                  </a>
                  </li>

                  <li>
                  <a href="#">
                    <i class="fa fa-user"></i> <span>@lang('menu.asesor')</span>
                  </a>
                  </li>

                  <li class="treeview">
                    <a href="{{route('filial.docentes')}}">
                      <i class="fa fa-user"></i> <span>@lang('menu.docente')</span><i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                      <li class="active"><a href="{{route('filial.docentes')}}"><i class="fa fa-circle-o"></i> Lista</a></li>
                      <li> <a href="{{route('filial.docentes_nuevo') }}"><i class="fa fa-circle-o"></i> Nuevo</a></li>
                    </ul>
                  </li>

                  <li>
                  <a href="#">
                    <i class="fa fa-bar-chart-o"></i> <span>@lang('menu.estadistica')</span>
                  </a>
                  </li>
            <?php
                break;
              }
            ?>
                <li>
                  <a href="#">
                    <i class="fa fa-contao"></i> <span>@lang('menu.contacto')</span>
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
