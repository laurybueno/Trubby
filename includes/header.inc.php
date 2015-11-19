
<div class="container">
    <?php 
    
    if(!$dados_usuario[validade]){ ?>
    
    <div class="container-fluid">
        </br>                
        <a class="btn btn-default" href="../usuario/login.php" role="button">Login</a>
        <a class="btn btn-default" href="../usuario/cadastro.php" role="button">Cadastrar</a>
        </br>
        </br>
        </br>
    </div>
    
    <?php } else { ?>
        
    <div class="container-fluid">
    
        <h4>Bem vindo, <?= $dados_usuario[nome]?></h4>
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