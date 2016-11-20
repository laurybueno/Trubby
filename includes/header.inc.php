
<div class="container">
    <?php 
    
    if(!$dados_usuario[validade]){ 
    
    // se o usuário não está logado, aparece a tela de login
    header("Location: https://trubby-flashfox.c9.io/usuario/login.php");
    
    } else { 
   
    // GRAVATAR
    $email = $dados_usuario[email];
    $default = "retro";
    $size = 80;
    
    $grav_url = "http://www.gravatar.com/avatar/" . md5( strtolower( trim( $email ) ) ) . "?d=" . urlencode( $default ) . "&s=" . $size;
    // GRAVATAR
    
    ?>
        
    <div class="container-fluid">
        </br>
        <!-- GRAVATAR -->
        <img src="<?= $grav_url; ?>" alt="" />
        </br>
        <h4 class="nome-usuario"><?= $dados_usuario[nome]?></h4>
        </br>
        <a class="btn btn-default" href="../usuario/logout.php" role="button">Logout</a>
        </br>
        </br>
        </br>
    </div>
    
    <?php } ?>
</div>
<div class="container">
    <div class="container-fluid">
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                
                <li><a href="../estoque/mostra_estoque.php">Estoque</a></li>
                <li><a href="../receitas/mostra_receita.php">Receitas</a></li>
                <li><a href="../cardapio/mostra_cardapio.php">Cardápio</a></li>
                <li><a href="../caixa/mostraCaixa.php">Caixa</a></li>
            </ul>
        </div>
    </div>
</div>