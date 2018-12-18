<aside class="main-sidebar">
    <section class="sidebar">
        <ul class="sidebar-menu">
            <?php if($_SESSION["rol"] == "administrador"):?>
                <li>
                    <a href="inicio">
                        <i class="fa fa-home"></i>
                        <span>Inicio</span>
                    </a>
                </li>
                <li>
                    <a href="personal">
                        <i class="fa fa-user"></i>
                        <span>Personal</span>
                    </a>
                </li>
                <?php endif;?>
                <?php if(($_SESSION["rol"]) == "administrador" || ($_SESSION["rol"]) == "cocinero"):?>
                <li>
                    <a href="menu_restaurant">
                        <i class="fa fa-calendar-o"></i>
                        <span>Menú</span>
                    </a>
                </li>
                <?php endif;?>
                <?php if(($_SESSION["rol"]) == "administrador" || ($_SESSION["rol"]) == "mesero"):?>
                <li>
                    <a href="mesas">
                        <i class="fa fa-cutlery"></i>
                        <span>Mesas</span>
                    </a>
                </li>
                <li>
                    <a href="pedido">
                        <i class="fa fa-list-alt"></i>
                        <span>Pedido</span>
                    </a>
                </li>
                <?php endif;?>
                <?php if(($_SESSION["rol"]) == "administrador" || ($_SESSION["rol"]) == "cocinero"):?>
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-list-ul"></i>
                        <span>Áreas</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li>
                            <a href="cocina">
                                <i class="fa fa-shopping-basket"></i>
                                <span>Cocina</span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="fa fa-glass"></i>
                                <span>Bar</span>
                            </a>
                        </li>
                    </ul>                
                </li>
                <?php endif;?>
                <?php if(($_SESSION["rol"]) == "administrador" || ($_SESSION["rol"]) == "cajero"):?>
                <li>
                    <a href="caja">
                        <i class="fa fa-money"></i>
                        <span>Caja</span>
                    </a>
                </li>
                <?php endif;?>
                <?php if($_SESSION["rol"] == "administrador"):?>
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-list-ul"></i>
                        <span>Reportes</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li>
                            <a href="reporte_ventas">
                                <i class="fa fa-usd"></i>
                                <span>Reporte de Ventas</span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="fa fa-user-circle"></i>
                                <span>Reporte de Personal</span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="fa fa-address-card"></i>
                                <span>Reporte de Clientes</span>
                            </a>
                        </li>
                    </ul>                
                </li>
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-list-ul"></i>
                        <span>Gestión de Sistema</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li>
                            <a href="gestion_usuarios">
                                <i class="fa fa-user-secret"></i>
                                <span>Gestión de Usuarios</span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="glyphicon glyphicon-inbox"></i>
                                <span>Otros</span>
                            </a>
                        </li>
                    </ul>                
                </li>
            <?php endif;?>
        </ul>
    </section>
</aside>



