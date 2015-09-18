<!DOCTYPE html>
<html>
    <head>
        <?php
            include "../bootstrap.php" 
        ?>

        
        <script src="jquery-1.11.3.min.js"></script>
        <script src="bootstrap/js/bootstrap.min.js"></script>
        <script src="jquery.tablesorter.min.js"></script>
    </head>
    <body>
        <div class="container">
            <div class="row">
              	<div class="col-md-6">
                    <form class="form-horizontal" action="" method="POST">
                        <fieldset>
                            <div id="legend">
                                <legend class="">Cadastro</legend>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="usuario">Usuário</label>
                                <div class="controls">
                                    <input id="usuario" name="usuario" placeholder="" class="form-control input-lg" type="text">
                                    <p class="help-block">Usuário pode ter qualquer letra ou numero, sem espaços</p>
                                </div>
                            </div>
                 
                            <div class="control-group">
                                <label class="control-label" for="email">E-mail</label>
                                <div class="controls">
                                    <input id="email" name="email" placeholder="" class="form-control input-lg" type="email">
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="senha">Token de autorização memorizável </label>
                                <div class="controls">
                                    <input id="senha" name="senha" placeholder="" class="form-control input-lg" type="password">
                                </div>
                            </div>
                 
                            <div class="control-group">
                                <label class="control-label" for="senha_confirmar">Token de autorização memorizável  (Confirm)</label>
                                <div class="controls">
                                    <input id="senha_confirmar" name="senha_confirmar" placeholder="" class="form-control input-lg" type="password">
                                    <p class="help-block">Por favor, confirme o seu token de autorização memorizável</p>
                                </div>
                            </div>
                            
                            <div class="control-group">
                                <label class="control-label" for="nome">Nome:</label>
                                <div class="controls">
                                    <input id="nome" name="nome" placeholder="" class="form-control input-lg" type="text">
                                </div>
                            </div>
                            
                            <div class="control-group">
                                <label class="control-label" for="sobrenome">Sobrenome:</label>
                                <div class="controls">
                                    <input id="sobrenome" name="sobrenome" placeholder="" class="form-control input-lg" type="text">
                                </div>
                            </div>
                            
                            <div class="control-group">
                                <label class="control-label" for="sexo">Sexo:</label>
                                <div class="controls">
                                    <input type="radio" name="sexo" id="sexo" value="masculino" checked> Masculino
                                    <input type="radio" name="sexo" id="sexo" value="feminino"> Feminino
                                </div>
                            </div>
                            
                            <div class="control-group">
                                <label class="control-label" for="dataNasc">Data de nascimento:</label>
                                <div class="controls">
                                    <input id="dataNasc" name="dataNasc" placeholder="" class="form-control input-lg" type="number">
                                    <p class="help-block">Apenas números</p>
                                </div>
                            </div>
                            
                            <div class="control-group">
                                <label class="control-label" for="cpf">Cadastro de pessoa física:</label>
                                <div class="controls">
                                    <input id="cpf" name="cpf" placeholder="" class="form-control input-lg" type="number">
                                    <p class="help-block">Apenas números</p>
                                </div>
                            </div>
                            
                            <div class="control-group">
                                <label class="control-label" for="endereco">Endereço:</label>
                                <div class="controls">
                                    <input id="endereco" name="endereco" placeholder="" class="form-control input-lg" type="text">
                                </div>
                            </div>
                           
                            <div class="control-group">
                                <label class="control-label" for="telefone">Telefone:</label>
                                <div class="controls">
                                    <input id="telefone" name="telefone" placeholder="" class="form-control input-lg" type="number">
                                    <p class="help-block">Apenas números</p>
                                </div>
                            </div>
                            
                            <div class="control-group">
                                <label class="control-label" for="telefone">Telefone:</label>
                                <div class="controls">
                                    <input type="checkbox" name="termos" id="termos" value="termos" required> Li e aceito os termos de uno
                                </div>
                            </div>

                            <div class="control-group">
                              <!-- Button -->
                                <div class="controls">
                                    <button class="btn btn-success">Cadastrar</button>
                                </div>
                            </div>
                        </fieldset>
                    </form>
                
                </div> 
              </div>
            </div>
        </div>
    </body>
</html>
  