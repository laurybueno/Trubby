<?php
include "$_SERVER[DOCUMENT_ROOT]/includes/usa_api.inc.php";
include "$_SERVER[DOCUMENT_ROOT]/includes/dependencias.inc.php";

// Inicia a session
session_start();

if (!empty($_POST['submitted'])) {
    
    $array_info = array(
            nome => $_POST['nome'], 
            sobrenome => $_POST['sobrenome'],
            sexo => $_POST['sexo'],
            cpf => $_POST['cpf'],
            email => $_POST['email'],
            endereco => $_POST['endereco'],
            senha => $_POST['senha'],
            dt_nasc => $_POST['data_nasc'],
            tel => $_POST['telefone'],
        );

    /*
    echo '<pre>';
    print_r($_POST);
    echo '</pre>';
            
    echo '<pre>';
    print_r($array_info);
    echo '</pre>';
    */
    
    cadastro($array_info);

}

?>


<!DOCTYPE html>
<html>
    <head>
    </head>
    <body>
        <div class="container">
            </br>
            <a href="../" class="btn btn-default"><span aria-hidden="true">&larr;</span> Voltar</a>
            </br>
            </br>
            </br>
            <h4 class="modal-title">Cadastro</h4>
        </div>
        <div class="container">
            <form class="form-horizontal"  action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" role="form" method="POST">
                <!-- E-mail -->
                <div class="form-group">
                    <label class="control-label col-sm-3" for="email">E-mail:</label>
                    <div class="col-sm-7">
                        <input type="email" class="form-control" id="email" name="email" placeholder="Ex.: meu@email.com">
                    </div>
                </div>
                
                <!-- Senha -->
                <div class="form-group">
                    <label class="control-label col-sm-3" for="senha">Senha:</label>
                    <div class="col-sm-7">
                        <input type="password" class="form-control" id="senha" name="senha" placeholder="Ex.: **********">
                    </div>
                </div>

                <!-- Nome -->
                <div class="form-group">
                    <label class="control-label col-sm-3" for="nome">Nome:</label>
                    <div class="col-sm-7">
                        <input type="text" class="form-control" id="nome" name="nome" placeholder="Ex.: João" value=''>
                    </div>
                </div>
                
                <!-- Sobrenome -->
                <div class="form-group">
                    <label class="control-label col-sm-3" for="sobrenome">Sobrenome:</label>
                    <div class="col-sm-7">
                        <input type="text" class="form-control" id="sobrenome" name="sobrenome" placeholder="Ex.: Silva Pinto">
                    </div>
                </div>
                
                <!-- Sexo -->
                <div class="form-group">
                    <label class="control-label col-sm-3" for="sexo">Sexo:</label>
                    <div class="col-sm-7">
                        <label class="radio-inline">
                            <input type="radio" name="sexo" id="Masculino" value="Masculino" checked> Masculino
                        </label>
                        <label class="radio-inline">
                            <input type="radio" name="sexo" id="Feminino" value="Feminino"> Feminino
                        </label>
                    </div>
                </div>
                
                <!-- Data de Nascimento -->
                <div class="form-group">
                    <label class="control-label col-sm-3" for="data_nasc">Data de nascimento:</label>
                    <div class="col-sm-7">
                        <input type="date" class="form-control" id="data_nasc" name="data_nasc" placeholder="Ex.: 01/02/2003"> 
                    </div>
                </div>
                
                <!-- CPF -->
                <div class="form-group">
                    <label class="control-label col-sm-3" for="cpf">CPF:</label>
                    <div class="col-sm-7">
                        <input type="number" class="form-control" id="cpf" name="cpf" placeholder="Ex.: 12345678911"> 
                    </div>
                </div>
                
                <!-- Endereço -->
                <div class="form-group">
                    <label class="control-label col-sm-3" for="endereco">Endereço:</label>
                    <div class="col-sm-7">
                        <input type="endereco" class="form-control" id="endereco" name="endereco" placeholder="Ex.: Esquina com Avenida das Alamedas, 467"> 
                    </div>
                </div>
               
               <!-- Telefone -->
                <div class="form-group">
                    <label class="control-label col-sm-3" for="telefone">Telefone:</label>
                    <div class="col-sm-7">
                        <input type="number" class="form-control" id="telefone" name="telefone" placeholder="Ex.: 11912345678" value=''>
                    </div>
                </div>
                
                <!-- Termos de Uso -->
                <div class="form-group">
                    <label class="control-label col-sm-3" for="termos">TDU:</label>
                    <div class="col-sm-7">
                        <label class="checkbox-inline">
                            <input type="checkbox" id="termos" name="termos" required> Li e aceito os termos de uso.
                        </label>
                    </div>
                </div>

                <!-- BOTÃO DE CONCLUIR -->
                <div class="form-group">        
                    <div align="center">
                        <br>
                        <input id="submit" name="submitted" type="submit" value="Cadastrar" class="btn btn-success">
                    </div>
                </div>
            </form>
         </div>
    </body>
</html>
  