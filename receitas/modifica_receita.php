<?php
include "$_SERVER[DOCUMENT_ROOT]/includes/usa_api.inc.php";
include "$_SERVER[DOCUMENT_ROOT]/includes/valida_session.inc.php";

if(!$dados_usuario[validade]){ 

// se o usuário não está logado, aparece a tela de login
header("Location: ../usuario/login.php");

}

// GRAVATAR
$email = $dados_usuario[email];
$default = "retro";
$size = 80;

$grav_url = "http://www.gravatar.com/avatar/" . md5( strtolower( trim( $email ) ) ) . "?d=" . urlencode( $default ) . "&s=" . $size;
// GRAVATAR

// RESPOSTA DA API

$receita = le_receita($dados_usuario[id_usuario], $_GET['id_produto']);

$estoque = le_estoque($dados_usuario[id_usuario]);

// RESPOSTA DA API

if (!empty($_POST[submitted])) {

    $ingredientes = array();
    $id_e_nome = $_POST[nome];
    
    for($i = 0; $i < $_POST[contador]; $i++){
        //echo $i . " " . $_POST['contador'];
        $id_produto = explode(".", $id_e_nome[$i]);
        $ingredientes[$i] = array(
            id_estoque => $id_produto[0],
            quantidade_liq => $_POST[quantidade_liquida][$i],
            quantidade_brt => $_POST[quantidade_utilizada][$i],
            rendimento => $_POST[rendimento][$i],
            tipo => "primario",
            preco_extra => "0"
        );
    }
    
    $array_info = array(
            id_produto => $_GET[id_produto],
            id_usuario => $dados_usuario[id_usuario],
            nome_tecnico => $_POST[nome_receita],
            modo_preparo => $_POST[modo_preparo],
            seq_montagem => $_POST[seq_montagem],
            equipamento => $_POST[equipamento],
            n_porcoes => $_POST[n_porcoes],
            peso_porcao => $_POST[peso_porcao],
            obs => $_POST[obs],
            foto => "foto.jpg",
            ingredientes => $ingredientes
        );
    
    /*
    echo '<pre>';
    echo print_r($_POST);
    echo print_r($array_info);
    echo '</pre>';
    */
    
    
    modifica_receita($array_info);
    
    header("Location: ../receitas/");
    
}

/*
echo "<pre>";
print_r($resposta);
echo "</pre>";
*/

?>


<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>
<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Trubby | Inserir item no Estoque</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.5 -->
  <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
        page. However, you can choose any other skin. Make sure you
        apply the skin class to the body tag so the changes take effect.
  -->
  <link rel="stylesheet" href="../dist/css/skins/skin-blue.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<!--
BODY TAG OPTIONS:
=================
Apply one or more of the following classes to get the
desired effect
|---------------------------------------------------------|
| SKINS         | skin-blue                               |
|               | skin-black                              |
|               | skin-purple                             |
|               | skin-yellow                             |
|               | skin-red                                |
|               | skin-green                              |
|---------------------------------------------------------|
|LAYOUT OPTIONS | fixed                                   |
|               | layout-boxed                            |
|               | layout-top-nav                          |
|               | sidebar-collapse                        |
|               | sidebar-mini                            |
|---------------------------------------------------------|
-->
<body class="hold-transition skin-blue layout-boxed">
<div class="wrapper">

  <!-- Main Header -->
  <header class="main-header">

    <!-- Logo -->
    <a href="../index.php" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>bb</b></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg">Tru<b>bb</b>y</span>
    </a>

    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top" role="navigation">
      <!-- Sidebar toggle button
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <!-- Sidebar toggle button-->
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->
          <li class="dropdown messages-menu">
            <!-- Menu toggle button -->
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-envelope-o"></i>
              <span class="label label-success">4</span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">You have 4 messages</li>
              <li>
                <!-- inner menu: contains the messages -->
                <ul class="menu">
                  <li><!-- start message -->
                    <a href="#">
                      <div class="pull-left">
                        <!-- User Image -->
                        <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                      </div>
                      <!-- Message title and timestamp -->
                      <h4>
                        Support Team
                        <small><i class="fa fa-clock-o"></i> 5 mins</small>
                      </h4>
                      <!-- The message -->
                      <p>Why not buy a new awesome theme?</p>
                    </a>
                  </li>
                  <!-- end message -->
                </ul>
                <!-- /.menu -->
              </li>
              <li class="footer"><a href="#">See All Messages</a></li>
            </ul>
          </li>
          <!-- /.messages-menu -->

          <!-- Notifications Menu -->
          <li class="dropdown notifications-menu">
            <!-- Menu toggle button -->
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-bell-o"></i>
              <span class="label label-warning">10</span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">You have 10 notifications</li>
              <li>
                <!-- Inner Menu: contains the notifications -->
                <ul class="menu">
                  <li><!-- start notification -->
                    <a href="#">
                      <i class="fa fa-users text-aqua"></i> 5 new members joined today
                    </a>
                  </li>
                  <!-- end notification -->
                </ul>
              </li>
              <li class="footer"><a href="#">View all</a></li>
            </ul>
          </li>
          <!-- Tasks Menu -->
          <li class="dropdown tasks-menu">
            <!-- Menu Toggle Button -->
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-flag-o"></i>
              <span class="label label-danger">9</span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">You have 9 tasks</li>
              <li>
                <!-- Inner menu: contains the tasks -->
                <ul class="menu">
                  <li><!-- Task item -->
                    <a href="#">
                      <!-- Task title and progress text -->
                      <h3>
                        Design some buttons
                        <small class="pull-right">20%</small>
                      </h3>
                      <!-- The progress bar -->
                      <div class="progress xs">
                        <!-- Change the css width attribute to simulate progress -->
                        <div class="progress-bar progress-bar-aqua" style="width: 20%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                          <span class="sr-only">20% Complete</span>
                        </div>
                      </div>
                    </a>
                  </li>
                  <!-- end task item -->
                </ul>
              </li>
              <li class="footer">
                <a href="#">View all tasks</a>
              </li>
            </ul>
          </li>
          <!-- User Account Menu -->
          <!--
          <li class="dropdown user user-menu">
            <!-- Menu Toggle Button --
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <!-- The user image in the navbar--
              <img src="dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
              <!-- hidden-xs hides the username on small devices so only the image appears. --
              <span class="hidden-xs">Alexander Pierce</span>
            </a>
            <ul class="dropdown-menu">
              <!-- The user image in the menu --
              <li class="user-header">
                <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">

                <p>
                  Alexander Pierce - Web Developer
                  <small>Member since Nov. 2012</small>
                </p>
              </li>
              <!-- Menu Body --
              <li class="user-body">
                <div class="row">
                  <div class="col-xs-4 text-center">
                    <a href="#">Followers</a>
                  </div>
                  <div class="col-xs-4 text-center">
                    <a href="#">Sales</a>
                  </div>
                  <div class="col-xs-4 text-center">
                    <a href="#">Friends</a>
                  </div>
                </div>
                <!-- /.row --
              </li>
              <!-- Menu Footer--
              <li class="user-footer">
                <div class="pull-left">
                  <a href="#" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <a href="#" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
          -->
          <!-- Control Sidebar Toggle Button -->
          <li>
            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
          </li>
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

      <!-- Sidebar user panel (optional) -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?= $grav_url ?>" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?= $dados_usuario[nome] . " " . $dados_usuario[sobrenome] ?></p>
          <!-- Status -->
          <!--<a href="#"><i class="fa fa-circle text-success"></i> Online</a>-->
        </div>
        </br></br></br>
        <!--
        <div class="pull-left">
          <a href="#" class="btn btn-default btn-flat">Profile</a>
        </div>
        -->

          <a href="../usuario/logout.php" class="btn btn-primary btn-block btn-sm">Desconectar</a>

      </div>

      <!-- search form (Optional)
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->

      <!-- Sidebar Menu -->
      <ul class="sidebar-menu">
        <li class="header">MENU</li>
        <li><a href="../"><i class="fa fa-home"></i> <span>Página Inicial</span></a></li>
        <li><a href="../estoque/"><i class="fa fa-archive"></i> <span>Estoque</span></a></li>
        <li><a href="../receitas/"><i class="fa fa-book"></i> <span>Receitas</span></a></li>
        <li><a href="../cardapio/"><i class="fa fa-cutlery"></i> <span>Cardapio</span></a></li>
        <li><a href="../caixa/"><i class="fa fa-money"></i> <span>Caixa</span></a></li>
        <!-- Optionally, you can add icons to the links -->
        <!-- Menu Ativo
        <li class="active"><a href="#"><i class="fa fa-link"></i> <span>Link</span></a></li>
        Menu Ativo -->
        <!-- Menu com su-bitens
        <li class="treeview">
          <a href="#"><i class="fa fa-link"></i> <span>Multilevel</span> <i class="fa fa-angle-left pull-right"></i></a>
          <ul class="treeview-menu">
            <li><a href="#">Link in level 2</a></li>
            <li><a href="#">Link in level 2</a></li>
          </ul>
        </li>
        Menu com sub-itens -->
      </ul>
      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Receitas
        <small>Modificar Receita</small>
      </h1><!--
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
        <li class="active">Here</li>
      </ol>-->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="box">
        <div class="box-body">
          <!-- CONTEUDO -->
            <form class="form-horizontal" role="form" method="post">
                <div class="form-group">
                    <label class="control-label col-sm-3" for="nome_receita">Nome da ficha técnica:</label>
                    <div class="col-sm-7">
                        <input type="text" class="form-control" id="nome_receita" name="nome_receita" value="<?= $receita[nome_tecnico]?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-3" for="modo_preparo">Modo de preparo:</label>
                    <div class="col-sm-7">
                        <input type="text" class="form-control" id="modo_preparo" name="modo_preparo" value="<?= $receita[modo_preparo]?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-3" for="seq_montagem">Sequencia de montagem:</label>
                    <div class="col-sm-7">
                        <input type="text" class="form-control" id="seq_montagem" name="seq_montagem" value="<?= $receita[seq_montagem]?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-3" for="equipamento">Equipamentos:</label>
                    <div class="col-sm-7">
                        <input type="text" class="form-control" id="equipamento" name="equipamento" value="<?= $receita[equipamento]?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-3" for="n_porcoes">Número de porções:</label>
                    <div class="col-sm-7">
                        <input type="number" class="form-control" id="n_porcoes" name="n_porcoes" value="<?= $receita[n_porcoes]?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-3" for="peso_porcao">Peso da porção (g):</label>
                    <div class="col-sm-7">
                        <input type="number" class="form-control" id="peso_porcao" name="peso_porcao" value="<?= $receita[peso_porcao]?>">
                    </div>
                </div>
                
                <div class="form-group">
                    <label class="control-label col-sm-3" for="obs">Observações:</label>
                    <div class="col-sm-7">
                        <!--<textarea class="form-control" rows="3"></textarea>-->
                        <input type="text" class="form-control" id="obs" name="obs" value="<?= $receita[obs]?>">
                    </div>
                </div>
                
                <div class="form-group">
                    <label class="control-label col-sm-3" for="contador">Contador Ingredientes:</label>
                    <div class="col-sm-7">
                        <input type="text" class="form-control" id="contador" name="contador" value="<?= (count($receita[ingredientes]) + 1)?>">
                    </div>
                </div>
                
                <h2>Ingredientes:</h2>
                <h4>Ingredientes primários</h4>
                <div class="box">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <td>Nome do ingrediente</td>
                                <td>Quantidade utilizada</td>
                                <td>Quantidade líquida</td>
                                <td>Rendimento</td>
                            </tr>
                        </thead>
                        
                        <tbody class="tbodyClone">
                            
                            <?php
                            // INGREDIENTES ATUAIS
                            foreach($receita[ingredientes] as $key => $ingrediente){

                            ?>

                                <tr id="clonedInput0" class="clonedInput" name="clonedInput0">
                                    <td>

                                        <select id="nome[]" name="nome[]" class="form-control">

                                            <option><?= $ingrediente[id_estoque].'. '.$ingrediente[nome]?></option>

                                        </select>
                                        
                                    </td>
                                    <td><input id="quantidade_utilizada[]" name="quantidade_utilizada[]" required type="number" class="form-control" value="<?= $ingrediente[quantidade_brt]?>"></td>
                                    <td><input id="quantidade_liquida[]" name="quantidade_liquida[]" required type="number" class="form-control" value="<?= $ingrediente[quantidade_liq]?>"></td>
                                    <td><input id="rendimento[]" name="rendimento[]" required type="number" class="form-control" value="<?= $ingrediente[rendimento]?>"></td>
                                    <td>
                                        <button id="BtnAdd_0" name="BtnAdd_0" type="button" class="clone btn btn-success"><i class="fa fa-plus-circle">+</i></button>
                                        <button id="BtnDel_0" name="BtnDel_0" type="button" class="remove btn btn-danger"><i class="fa fa-trash-o"></i>-</button>
                                    </td>
                                </tr>

                            <?php
                            // INGREDIENTES ATUAIS
                            }
                            
                            ?>
                            
                            <tr id="clonedInput0" class="clonedInput" name="clonedInput0">
                                    <td>

                                        <select id="nome[]" name="nome[]" class="form-control">
                                            <?php
                                                foreach($estoque as $key => $aux) {
                                                    echo
                                                        '
                                                        <option>'.$aux[id_produto].'. '.$aux[nome].'</option>
                                                        ';
                                                }
                                            ?>
                                        </select>
                                        
                                    </td>
                                    <td><input id="quantidade_utilizada[]" name="quantidade_utilizada[]" required type="number" class="form-control"></td>
                                    <td><input id="quantidade_liquida[]" name="quantidade_liquida[]" required type="number" class="form-control"></td>
                                    <td><input id="rendimento[]" name="rendimento[]" required type="number" class="form-control"></td>
                                    <td>
                                        <button id="BtnAdd_0" name="BtnAdd_0" type="button" class="clone btn btn-success"><i class="fa fa-plus-circle">+</i></button>
                                        <button id="BtnDel_0" name="BtnDel_0" type="button" class="remove btn btn-danger"><i class="fa fa-trash-o"></i>-</button>
                                    </td>
                                </tr>
                        
                        </tbody>
                        </table>
                </div>
                <br class="clearfix" />

                <div class="form-group">        
                    <div align="center">
                        <input id="submit" name="submitted" type="submit" value="Confirmar" class="btn btn-success">
                    </div>
                </div>
            </form>         
        </div>
      </div>      
      <!-- Your Page Content Here -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="pull-right hidden-xs">
      
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2015 <a href="#">Trubby</a>.</strong> Todos os direitos reservados.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Create the tabs -->
    <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
      <li class="active"><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
      <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
    </ul>
    <!-- Tab panes -->
    <div class="tab-content">
      <!-- Home tab content -->
      <div class="tab-pane active" id="control-sidebar-home-tab">
        <h3 class="control-sidebar-heading">Recent Activity</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript::;">
              <i class="menu-icon fa fa-birthday-cake bg-red"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>

                <p>Will be 23 on April 24th</p>
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

        <h3 class="control-sidebar-heading">Tasks Progress</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript::;">
              <h4 class="control-sidebar-subheading">
                Custom Template Design
                <span class="label label-danger pull-right">70%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

      </div>
      <!-- /.tab-pane -->
      <!-- Stats tab content -->
      <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
      <!-- /.tab-pane -->
      <!-- Settings tab content -->
      <div class="tab-pane" id="control-sidebar-settings-tab">
        <form method="post">
          <h3 class="control-sidebar-heading">General Settings</h3>

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Report panel usage
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Some information about this general settings option
            </p>
          </div>
          <!-- /.form-group -->
        </form>
      </div>
      <!-- /.tab-pane -->
    </div>
  </aside>
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- REQUIRED JS SCRIPTS -->

<!-- jQuery 2.1.4 -->
<script src="../plugins/jQuery/jQuery-2.1.4.min.js"></script>
<!-- Bootstrap 3.3.5 -->
<script src="../bootstrap/js/bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="../plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="../plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/app.min.js"></script>
<!-- dynamicForm -->
<script src="../plugins/dynamicForm.js"></script>

<!-- Optionally, you can add Slimscroll and FastClick plugins.
     Both of these plugins are recommended to enhance the
     user experience. Slimscroll is required when using the
     fixed layout. -->
</body>
</html>
