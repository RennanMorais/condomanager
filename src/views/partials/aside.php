<div class="wrapper">

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light" style="background-color:#0099A0;">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fa fa-bars"></i></a>
        </li>
      </ul>

      <!-- Right navbar links -->
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a class="nav-link" href="<?=$base;?>/sair" role="button" title="Sair"><i
              class="fa fa-power-off"></i></a>
        </li>
      </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-light-secondary elevation-4">
      <!-- Brand Logo -->
      <a href="<?=$base;?>/app" class="brand-link">
        <img src="<?=$base;?>/assets/images/logo_condo.png" alt="Condo System" width="100px" style='max-width: 50%;min-width: 60px;'>
        <span class="brand-text font-weight-light"></span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar Users panel (optional) -->
        <div class="Users-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
            <img src="<?=$base;?>/assets/images/avatar.png" class="img-circle elevation-2" alt="Users Image">
          </div>
          <div class="info">
            <a href="#" class="d-block"><?=$loggedUser->name;?></a>
          </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

            <!-- Add icons to the links using the .nav-icon class
                with font-awesome or any other icon font library -->
            <li class="nav-item has-treeview">
              <a href="<?=$base;?>/app" class="nav-link <?= ($activeMenu == 'dash') ? 'active':''; ?>">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                  Dashboard
                </p>
              </a>
            </li>

            <li class="nav-item has-treeview <?= ($activeMasterMenu == 'condominio') ? 'menu-open':''; ?>">
              <a href="<?=$base;?>/app/condominios" class="nav-link <?= ($activeMasterMenu == 'condominio') ? 'active':''; ?>">
                <i class="nav-icon fas fa-building"></i>
                <p>
                  Condominios
                  <i class="right fas fa-angle-right"></i>
                </p>
              </a>

              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="<?=$base;?>/app/condominios" class="nav-link <?= ($activeMenu == 'condominio') ? 'active':''; ?>">
                    <i class="far fa-building nav-icon"></i>
                    <p>Condominio</p>
                  </a>
                </li>
              </ul>

              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="<?=$base;?>/app/predios" class="nav-link <?= ($activeMenu == 'predio') ? 'active':''; ?>">
                    <i class="fa fa-city nav-icon"></i>
                    <p>Prédios</p>
                  </a>
                </li>
              </ul>

              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="<?=$base;?>/app/moradores" class="nav-link <?= ($activeMenu == 'morador') ? 'active':''; ?>">
                    <i class="far fa-address-book nav-icon"></i>
                    <p>Morador</p>
                  </a>
                </li>
              </ul>

              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="<?=$base;?>/app/area_comum" class="nav-link <?= ($activeMenu == 'area_comum') ? 'active':''; ?>">
                    <i class="fa fa-plus-circle nav-icon"></i>
                    <p>Área Comum</p>
                  </a>
                </li>
              </ul>

              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="<?=$base;?>/app/reservas_area_comum" class="nav-link <?= ($activeMenu == 'reserva_area') ? 'active':''; ?>">
                    <i class="fa fa-glass-cheers nav-icon"></i>
                    <p>Reserva de Área Comum</p>
                  </a>
                </li>
              </ul>

              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="<?=$base;?>/app/cad_pets" class="nav-link <?= ($activeMenu == 'pets') ? 'active':''; ?>">
                    <i class="fa fa-paw nav-icon"></i>
                    <p>Cadastro de Pets</p>
                  </a>
                </li>
              </ul>

              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="<?=$base;?>/app/veiculos" class="nav-link <?= ($activeMenu == 'veiculos') ? 'active':''; ?>">
                    <i class="fa fa-car nav-icon"></i>
                    <p>Veículos</p>
                  </a>
                </li>
              </ul>

              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="<?=$base;?>/app/assembleias" class="nav-link <?= ($activeMenu == 'assembleia') ? 'active':''; ?>">
                    <i class="fa fa-handshake nav-icon"></i>
                    <p>Agenda de Assembleias</p>
                  </a>
                </li>
              </ul>

              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="<?=$base;?>/app/ocorrencias" class="nav-link <?= ($activeMenu == 'ocorrencias') ? 'active':''; ?>">
                    <i class="fa fa-exclamation-circle nav-icon"></i>
                    <p>Ocorrências</p>
                  </a>
                </li>
              </ul>

            </li>

            <li class="nav-item has-treeview <?= ($activeMasterMenu == 'financeiro') ? 'menu-open':''; ?>">
              <a href="" class="nav-link <?= ($activeMenu == 'financeiro') ? 'active':''; ?>">
                <i class="nav-icon fa fa-dollar-sign"></i>
                <p>
                  Financeiro
                  <i class="right fas fa-angle-right"></i>
                </p>
              </a>

              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="<?=$base;?>/app/categoria_contas" class="nav-link <?= ($activeMenu == 'categoria_contas') ? 'active':''; ?>">
                    <i class="fa fa-file-invoice-dollar nav-icon"></i>
                    <p>Categoria de Contas</p>
                  </a>
                </li>
              </ul>

              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="<?=$base;?>/app/contas_pagar" class="nav-link <?= ($activeMenu == 'contas_pagar') ? 'active':''; ?>">
                    <i class="fa fa-hand-holding-usd nav-icon"></i>
                    <p>Contas a Pagar</p>
                  </a>
                </li>
              </ul>

              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="<?=$base;?>/app/contas_receber" class="nav-link <?= ($activeMenu == 'contas_receber') ? 'active':''; ?>">
                    <i class="fa fa-funnel-dollar nav-icon"></i>
                    <p>Contas a Receber</p>
                  </a>
                </li>
              </ul>

              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="<?=$base;?>/app/fornecedores" class="nav-link <?= ($activeMenu == 'fornecedores') ? 'active':''; ?>">
                    <i class="fa fa-truck nav-icon"></i>
                    <p>Fornecedores</p>
                  </a>
                </li>
              </ul>

            </li>

            <li class="nav-item has-treeview <?= ($activeMenu == 'visitantes') ? 'menu-open':''; ?>">
              <a href="" class="nav-link <?= ($activeMenu == 'visitantes') ? 'active':''; ?>">
                <i class="nav-icon fa fa-door-closed"></i>
                <p>
                  Portaria
                  <i class="right fas fa-angle-right"></i>
                </p>
              </a>

              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="<?=$base;?>/app/visitantes" class="nav-link <?= ($activeMenu == 'visitantes') ? 'active':''; ?>">
                    <i class="fa fa-user-friends nav-icon"></i>
                    <p>Visitantes</p>
                  </a>
                </li>
              </ul>

            </li>

            <li class="nav-item has-treeview <?= ($activeMenu == 'usuarios') ? 'menu-open':''; ?>">
              <a href="<?=$base;?>/app/config" class="nav-link <?= ($activeMenu == 'usuarios') ? 'active':''; ?>">
                <i class="nav-icon fa fa-cog"></i>
                <p>
                  Configurações
                  <i class="right fas fa-angle-right"></i>
                </p>
              </a>

              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="<?=$base;?>/app/usuarios" class="nav-link <?= ($activeMenu == 'usuarios') ? 'active':''; ?>">
                    <i class="fa fa-users nav-icon"></i>
                    <p>Usuários</p>
                  </a>
                </li>
              </ul>

            </li>

          </ul>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>