<? include "verifica.php"; ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cadastro</title>
    <link href="../css/style.css" rel="stylesheet">
    <link href="../css/bootstrap.min.css" rel="stylesheet">
  </head>
  <body>
    <?php
      session_start();
      if(isset($_GET['exit'])){
        session_destroy();
        header("Location: index.php");
      }
      include("../header/header.html");
      include("menuProfessor.html");
    ?>
    <div class="container">
      <div class="row">
        <div class="col-md-6 col-md-offset-3">
          <form action="?ac=cadastrar" method="POST" id="formlogin" class="form-horizontal">
          <fieldset>
  
            <legend style="font-size: 25px;">Cadastro</legend>
  
            <!-- NUSP -->
            <div class="form-group">
              <div class="controls">
                <input id="nusp" name="nusp" type="text" placeholder="NUSP" class="form-control" required="true">
                <span class="help-block"/>
              </div>
            </div>
  
            <!-- NOME COMPLETO-->
            <div class="form-group">
              <div class="controls">
                <input id="nomecompleto" name="nomecompleto" type="text" placeholder="Nome completo" class="form-control" required="">
                <span class="help-block"/>
              </div>
            </div>
  
            <!-- E-MAIL -->
            <div class="form-group">
              <div class="controls">
                <input id="email" name="email" type="text" placeholder="E-mail" class="form-control" required="">
                <span class="help-block"/>
              </div>
            </div>
  
            <!-- TELEFONE -->
            <div class="form-group">
              <div class="controls">
                <input id="telefone" name="telefone" type="text" placeholder="Telefone" class="form-control" required="">
                <span class="help-block"/>
              </div>
            </div>
  
            <!-- SENHA -->
            <div class="form-group">
              <div class="controls">
                <input id="senha" name="senha" type="password" placeholder="Senha" class="form-control" required="">
                <span class="help-block"/>
              </div>
            </div>
  
            <!-- REPETIR SENHA -->
            <div class="form-group">
              <div class="controls">
                <input id="senharepetir" name="senharepetir" type="password" placeholder="Repita a senha" class="form-control" required="">
                <span class="help-block"/>
              </div>
            </div>
            
            <!-- Multiple Radios (inline) -->
            <div class="control-group">
              <div class="controls">
                <label>
                  <input type="radio" name="tipoDeConta" value="Aluno" checked="checked">
                  Aluno
                  <input style="margin-left: 30px" type="radio" name="tipoDeConta" value="Professor">
                  Professor
                </label>
              </div>
            </div>
  
            <!-- BOTÃO CADASTRAR -->
            <div class="control-group">
              <label class="control-label" for="singlebutton"></label>
              <div class="controls">
                <button id="btnEnviar" name="singlebutton" type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-plus"></span> Cadastrar</button>
                <input type="reset" value="Cancelar" class="btn btn-primary" onClick="window.location.reload()">
                <input type="button" class="btn btn-primary" onclick="history.back();" value="Voltar">
              </div>
            </div>
    
          </fieldset>
          </form>
  
          
  
          <?php
            if($_GET['ac'] == "cadastrar"){
              require '../conexao_db.php';
              
              $nusp = protectDB($_POST['nusp']);
              $nomecompleto = protectDB($_POST['nomecompleto']);
              $email = protectDB($_POST['email']);
              $telefone = protectDB($_POST['telefone']);
              $senha = protectDB($_POST['senha']);
              $tipodeconta = $_POST['tipoDeConta'];
              
              $senhaHash = password_hash($senha, PASSWORD_DEFAULT);
              
              $sql = "SELECT * FROM usuarios WHERE nusp = '$nusp'";
              
              $query = conectarDB()->query($sql);
              
              $count = mysqli_num_rows($query);
    
              if($count != 0)
                echo "<br><br><div style='padding: 10px; background-color: #EC6262; border: 1px solid #B73232'>Usuário de NUSP "
                .$nusp." já está cadastrado. </div> <br>";
              
              else{
                $inserir = "INSERT INTO usuarios (nusp, nome_usuario, email_usuario, telefone_usuario, senha_usuario, tipoConta_usuario) 
                            VALUES ('$nusp', '$nomecompleto', '$email', '$telefone', '$senhaHash', '$tipodeconta')";
                
                if(conectarDB()->query($inserir)){
                  if($tipodeconta == "Aluno"){
                    $inserir_aluno = "INSERT INTO aluno (NUSP_aluno) VALUES ('$nusp')";
                    conectarDB()->query($inserir_aluno);
                  }
                  echo "<script type='text/javascript'>alert('Usuário cadastrado com sucesso!');</script>";
                  echo "<script type='text/javascript'>location.href='inicio.php';</script>";
                  
                }else{
                  echo "<script type='text/javascript'>alert('Ocorreu algum erro');</script>";
                }
                
              }
              
            }
          ?>
          <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
          <script src="../js/bootstrap.min.js"></script>
          <a href="javascript:window.history.go(-1);">Voltar</a>
        </div>
      </div>  
    </div>
  </body>
</html>