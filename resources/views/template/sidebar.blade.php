<div class="navbar-default sidebar" role="navigation">
    <div class="sidebar-nav navbar-collapse">
        <ul class="nav" id="side-menu">
            <li>
                <a href="{{ route('escritorio') }}"><i class="fa fa-dashboard fa-fw"></i> Escritorio</a>
            </li>
            <li>
                <a href="#"><i class="fa fa-film fa-fw"></i> Peliculas<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="{{ route('peliculas') }}">Listado</a>
                    </li>
                </ul>
                <!-- /.nav-second-level -->
            </li>
        </ul>
    </div>
    <!-- /.sidebar-collapse -->
</div>
<!-- /.navbar-static-side -->