<?php
    include "../bootstrap.php"
?>

<?php
// Inicia a session
session_start();

$erro = false;
$msg_erro = '';

$classUsuario = 'control-group';
$classCpf = 'control-group';

if (!empty($_POST['submitted'])) {
    
    // Cria as variáveis dinamicamente
    foreach ($_POST as $chave => $valor) {
        
        $$chave = trim(strip_tags($valor));
        
       	// Verifica se tem algum valor nulo
    	if (empty($valor)) {
    	    $erro = true;
    	    $msg_erro = 'Existem campos em branco.';
    	}
    }

    // Verificação de Duplicatas (Contas com mesmo e-mail ou CPF)
    // EU FIZ MAS PODERIA VAI ESTAR NO WS \/\/\/\/\/\/\/\/\/\/
    /*
    require_once("../connection.php");
	
    $sql =  "SELECT email FROM usuarios WHERE email='$email'";
    
    $resultado = mysql_query($sql);
    
    $qntResposta = mysql_num_rows($resultado);
    
    if($linhas >= 1){
        $erro = true;
    	$msg_erro = 'E-mail ja cadastrado';
    }
    
    $sql =  "SELECT cpf FROM usuarios WHERE cpf='$cpf'";
    
    $resultado = mysql_query($sql);
    
    $qntResposta = mysql_num_rows($resultado);
    
    if($linhas >= 1){
        $erro = true;
    	$msg_erro = 'Cadastro de pessoa fisica ja cadastrado';
    }
    */
    // EU FIZ MAS PODERIA VAI ESTAR NO WS /\/\/\/\/\/\/\/\/\/\
    
    //mysql_close($con);
	
	//header("Location: insereEstoque.php");
	
	
    // Verifica de $Cpf realmente existe, se tem campos em branco e se tem 11 digitos.
    // Também verifica se não existe nenhum erro anterior.
    // Reza a Lenda que isso e papel do WebService. TBD.
    /*
    if ((!isset($cpf) || campoEmBranco($cpf) || onzeDigitos($cpf)) && !$erro) {
        echo 'Teste';
        $msg_erro = 'O Cadastro de pessoa fisica não deve conter espaços em branco e deve ter 11 digitos (nem mais nem menos).';
        $erro = true;
        $cpf = '';
        $classCpf = 'control-group has-error'; //Borda vermelha
    }
    */
    
    if (false === $erro) {
        
        require_once("../connection.php");
        
        $sql =  "INSERT INTO `trubby`.`usuarios` (
                    `nome` ,
                    `sobrenome` ,
                    `cpf` ,
                    `email` ,
                    `senha` ,
                    `dt_nasc` ,
                    `tel`
                )
                VALUES (
                    '".$nome."', '".$sobrenome."', '".$cpf."', '".$email."', '".$senha."', '".$dataNasc."', '".$telefone."'
                );";
                
        $resultado = mysql_query($sql);
        mysql_close($con);
    	
    	//header("Location: insereEstoque.php");
    	
    	if(!$resultado){
    	    $_SESSION["erro"] = 'Falha no Banco de Dados, tente novamente!';
    	} else $_SESSION["erro"] = 'Inserido com Sucesso';
    	
    } else {
        $_SESSION["erro"] = $msg_erro;
    }
}

?>


<!DOCTYPE html>
<html>
    <head>
    </head>
    <body>
        <div class="container">
            <a href="../" class="btn btn-default"><span aria-hidden="true">&larr;</span> Voltar</a>
            <h4 class="modal-title">Cadastro</h4>
        </div>
        <div class="container">
            <form class="form-horizontal"  action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" role="form" method="POST">

                <!-- Usuário -->
                <!--
                <div class="control-group">
                    <label class="control-label" for="usuario">Usuário</label>
                    <div class="controls">
                        <input id="usuario" name="usuario" placeholder="" class="form-control input-lg" type="text">
                        <input type="text" class="form-control" id="usuario" name="usuario" placeholder="Usuário para Login" value=''>
                    </div>
                </div>
                -->
                 
                <!-- E-mail -->
                <div class="form-group">
                    <label class="control-label col-sm-3" for="email">E-mail:</label>
                    <div class="col-sm-7">
                        <input type="email" class="form-control" id="email" name="email" placeholder="Ex.: meu@email.com" value=''>
                        <!--<input id="email" name="email" placeholder="" class="form-control" type="email">-->
                    </div>
                </div>
                
                <!-- Senha -->
                <div class="form-group">
                    <label class="control-label col-sm-3" for="senha">Token de autorização memorizável:</label>
                    <div class="col-sm-7">
                        <input type="password" class="form-control" id="senha" name="senha" placeholder="Ex.: **********" value=''>
                        <!--<input id="senha" name="senha" placeholder="" class="form-control" type="password">-->
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-3" for="senha_confirmar">Token de autorização memorizável  (Confirma):</label>
                    <div class="col-sm-7">
                        <input type="password" class="form-control" id="senha_confirmar" name="senha_confirmar" placeholder="Repita '**********'" value=''>
                        <!--<input id="senha_confirmar" name="senha_confirmar" placeholder="" class="form-control" type="password">-->
                    </div>
                </div>
                
                <!-- Nome -->
                <div class="form-group">
                    <label class="control-label col-sm-3" for="nome">Nome:</label>
                    <div class="col-sm-7">
                        <input type="text" class="form-control" id="nome" name="nome" placeholder="Ex.: João" value=''>
                        <!--<input id="nome" name="nome" placeholder="" class="form-control" type="text">-->
                    </div>
                </div>
                
                <!-- Sobrenome -->
                <div class="form-group">
                    <label class="control-label col-sm-3" for="sobrenome">Sobrenome:</label>
                    <div class="col-sm-7">
                        <input type="text" class="form-control" id="sobrenome" name="sobrenome" placeholder="Ex.: Silva Pinto" value=''>
                        <!--<input id="sobrenome" name="sobrenome" placeholder="" class="form-control" type="text">-->
                    </div>
                </div>
                
                <!-- Sexo -->
                <div class="form-group">
                    <label class="control-label col-sm-3" for="sexo">Sexo:</label>
                    <div class="col-sm-7">
                        <label class="radio-inline">
                            <input type="radio" name="sexo" id="sexoMasculino" value="sexoMasculino" checked> Masculino
                        </label>
                        <label class="radio-inline">
                            <input type="radio" name="sexo" id="sexoFeminino" value="sexoFeminino"> Feminino
                        </label>

                        <!--
                        <input type="radio" class="form-control" id="sexo" name="sexo" placeholder="Masculino" value='Masculino' checked> Masculino
                        <input type="radio" class="form-control" id="sexo" name="sexo" placeholder="Feminino" value='Feminino'> Feminino
                        
                        <input type="radio" name="sexo" id="sexo" value="masculino" checked> Masculino
                        <input type="radio" name="sexo" id="sexo" value="feminino"> Feminino
                        -->
                    </div>
                </div>
                
                <!-- Data de Nascimento -->
                <div class="form-group">
                    <label class="control-label col-sm-3" for="dataNasc">Data de nascimento:</label>
                    <div class="col-sm-7">
                        <input type="date" class="form-control" id="dataNasc" name="dataNasc" placeholder="Ex.: 01/02/2003" value=''> 
                        <!--<input id="dataNasc" name="dataNasc" placeholder="" class="form-control" type="date">-->
                    </div>
                </div>
                
                <!-- CPF -->
                <div class="form-group">
                    <label class="control-label col-sm-3" for="cpf">Cadastro de pessoa física:</label>
                    <div class="col-sm-7">
                        <input type="number" class="form-control" id="cpf" name="cpf" placeholder="Ex.: 12345678911" value=''> 
                        <!--<input id="cpf" name="cpf" placeholder="" class="form-control" type="number">-->
                    </div>
                </div>
                
                <!-- Endereço -->
                <div class="form-group">
                    <label class="control-label col-sm-3" for="endereco">Endereço:</label>
                    <div class="col-sm-7">
                        <input type="endereco" class="form-control" id="endereco" name="endereco" placeholder="Ex.: Esquina com Avenida das Alamedas, 467" value=''> 
                        <!--<input id="endereco" name="endereco" placeholder="" class="form-control" type="text">-->
                    </div>
                </div>
               
               <!-- Telefone -->
                <div class="form-group">
                    <label class="control-label col-sm-3" for="telefone">Telefone:</label>
                    <div class="col-sm-7">
                        <input type="number" class="form-control" id="telefone" name="telefone" placeholder="Ex.: 11912345678" value=''>
                        <!--<input id="telefone" name="telefone" placeholder="" class="form-control" type="number">-->
                    </div>
                </div>
                
                <!-- Termos de Uso -->
                <div class="form-group">
                    <label class="control-label col-sm-3" for="telefone">TDU:</label>
                    <div class="col-sm-7">
                        <label class="checkbox-inline">
                            <input type="checkbox" id="termos" name="termos" required> Li e aceito os termos de uno.
                            <!-- <input type="checkbox" name="termos" id="termos" value="termos" required> Li e aceito os termos de uno.-->
                        </label>
                    </div>
                </div>


                <!-- BOTÃO DE CONCLUIR -->
                <div class="form-group">        
                    <div align="center">
                        <span class="label label-danger">
                            <?php
                                echo  $_SESSION["nomeItem"]. " " . $_SESSION["erro"] . "<br>";
                                session_destroy(); 
                            ?>
                        </span>
                        <br>
                        <input id="submit" name="submitted" type="submit" value="Cadastrar" class="btn btn-success">
                    </div>
                </div>
            </form>
         </div>
    </body>
</html>
  