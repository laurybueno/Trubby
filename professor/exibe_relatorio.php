<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Relatorio</title>

  <link href="../css/bootstrap.min.css" rel="stylesheet">
  <link href="../css/style.css" rel="stylesheet">

</head>
<body>
  <?php
  
  //ele pega o id que está sendo passado pela URL. TEndeu? blz qualquer coisa me chama lá
  
    require "../conexao_db.php";
    include("../header/header.html");
   //include("menuAluno.html");
  ?>
    <div class="container">
      <div class="row">
          <div class="col-md-10 col-md-offset-1">
            <form method="POST" action="enviar_relatorio.php" id="formlogin" class="form-horizontal">
              <fieldset>
    
    
              <!-- Form Name -->
              <legend style="font-size: 25px;">Relatório</legend>
    
              <table style="width:100%" border="0">
                <!--
                <tr>
                  <td>
    
                    <div class="controls">
                      <input style="width: 600px;" name="nome" type="text" placeholder="Nome" class="form-control" required="true">
                      <span class="help-block"/>
                    </div>
                    <br>
                  </td>
    
                  <td> 
    
                    <div class="controls">
                      <input style="width: 200px;" id="nusp" name="nusp" type="text" placeholder="NUSP" class="form-control" required="true">
                      <span class="help-block"/>
                    </div>
                    <br>
                  </td>
                </tr>
                -->
    
                <tr rowspan="2">
                  <td colspan="2">
    
                    <div class="controls">
                      <input style="width: 814px;" name="data_matricula" type="text" 
                      placeholder="DATA COMPLETA DE MATRÍCULA (exatamente como consta no sistema Janus): DD/MMM/AAAA"
                      class="form-control"  required="true">
                    </div>
                
                  </td>
                </tr>
    
                <!--
                <tr rowspan="2">
                  <td colspan="2">
    
                    <div class="controls">
                      <input style="width: 814px;"  required="true" name="orientador" type="text" placeholder="Orientador" class="form-control">
                      <span class="help-block"/>
                    </div>
    
                    
                  </td>
                </tr>
                  -->
    
    
                <tr>
                  <td colspan="2">
                    <hr style="border: 1px solid #B9B9B9;">
                    <strong>PERÍODO BOLSA:</strong> <br>
                    <div class="control-group">
                      <div class="controls">
                        
                        
                        <?php
                        
                                $periodo_CNPq = "Período CNPq";
                                $periodo_Capes = "Período Capes";
                                $periodo_Fapes = "Período Fapes";
                                $id_relatorio = $_GET['i'];
                                $sql = "SELECT * FROM bolsas WHERE id_relatorio = $id_relatorio";
                                $query = conectarDB()->query($sql);
                              
                                $dados = $query->fetch_array();
                                $periodo_CNPq = $dados['periodo_bolsa'];
                                
                      ?>
                      
                      
                        <input type="checkbox" name="CNPq" value="CNPq">
                        CNPq
                        <div class="controls">
                          <h3><?php echo $periodo_CNPq; ?></h3>
                          <span class="help-block"/>
                        </div>
    
                        <br>
    
                        <input type="checkbox" name="Capes" value="Capes">
                        Capes
                        <div class="controls">
                          <h3<?php echo $periodo_CAPES; ?></h3>
                          <span class="help-block"/>
                        </div>
    
                        <br>
    
                        <input type="checkbox" name="Fapes" value="Fapes">
                        Fapes
                        <div class="controls">
                          <?php echo $periodo_FAPES; ?></h3>
                          <span class="help-block"/>
                        </div>
    
                        <br>
    
                        <div class="controls">
                          <input style="float:left; margin-right: 5px; margin-top: 12px;" type="checkbox" name="outra_check" value="Outra">
                          <input type="text" style="width: 90px;" name="outra_text" placeholder="Outra" class="form-control">
                          <br>
                          <input style="width: 814px;" name="periodo_outra" type="text" placeholder="Período desta bolsa" class="form-control">
                          <span class="help-block"/>
                        </div>
    
    
                      </div>
                    </div>
    
                    <hr style="border: 1px solid #B9B9B9;">
    
                  </td>
                </tr>
    
                <tr>
                  <td colspan="2">
                    <div class="controls"> 
                    <?php
                                $id_relatorio = $_GET['i'];
                                $sql = "SELECT * FROM relatorio WHERE id_relatorio = $id_relatorio";
                                $query = conectarDB()->query($sql);
                              
                                $dados = $query->fetch_array();
                                $titulo_relatorio = $dados['titulo_relatorio'];
                                
                      ?>
                      <center></center><h2><?php echo $titulo_relatorio;?></h2></center>
                      <span class="help-block"/>
                    </div>
                    <hr style="border: 1px solid #B9B9B9;">
                  </td>
                </tr>
    
    
                <tr>
                  <td colspan="2">
    
                    <strong>RELATÓRIO REFERENTE A (Semestre em questão, ou seja, último semestre cursado): </strong>  <br>
                    
                    <?php
                                $id_relatorio = $_GET['i'];
                                $sql = "SELECT * FROM relatorio WHERE id_relatorio = $id_relatorio";
                                $query = conectarDB()->query($sql);
                                $dados = $query->fetch_array();
                                
                                $semestre_relatorio = $dados['semestre_relatorio'];
                                $ano_relatorio = $dados['ano_relatorio'];
                                $fase_curso = $dados['fase_curso'];
                      ?>
                          
    
                    <div style="float:left;">
                      
                      <?php if($semestre_relatorio == "primeiroSemestre"){ 
                              echo "1º";
                            }else{ 
                              echo "2º";
                            } ?>
                      semestre de 
                      <?php
                        echo $ano_relatorio;
                      ?>
                    </div>
    
                    <!--<select name="anoPrimeiroSemestre">
                      <option value="0" <?php if(($ano_relatorio == "2010") && ($semestre_relatorio == "primeiroSemestre")){echo "selected";}?>>0</option>
                      <option value="1" <?php if(($ano_relatorio == "2011") && ($semestre_relatorio == "primeiroSemestre")){echo "selected";}?>>1</option>
                      <option value="2" <?php if(($ano_relatorio == "2012") && ($semestre_relatorio == "primeiroSemestre")){echo "selected";}?>>2</option>
                      <option value="3" <?php if(($ano_relatorio == "2013") && ($semestre_relatorio == "primeiroSemestre")){echo "selected";}?>>3</option>
                      <option value="4" <?php if(($ano_relatorio == "2014") && ($semestre_relatorio == "primeiroSemestre")){echo "selected";}?>>4</option>
                      <option value="5" <?php if(($ano_relatorio == "2015") && ($semestre_relatorio == "primeiroSemestre")){echo "selected";}?>>5</option>
                      <option value="6" <?php if(($ano_relatorio == "2016") && ($semestre_relatorio == "primeiroSemestre")){echo "selected";}?>>6</option>
                      <option value="7" <?php if(($ano_relatorio == "2017") && ($semestre_relatorio == "primeiroSemestre")){echo "selected";}?>>7</option>
                      <option value="8" <?php if(($ano_relatorio == "2018") && ($semestre_relatorio == "primeiroSemestre")){echo "selected";}?>>8</option>
                      <option value="9" <?php if(($ano_relatorio == "2019") && ($semestre_relatorio == "primeiroSemestre")){echo "selected";}?>>9</option>
                    </select>-->
    
                    <br>
    
                    <!--<div style="float:left;">
                      <?php if($semestre_relatorio == "segundoSemestre"){ ?>
                      <input type="radio" name="radios_semestre" value="primeiroSemestre" checked>
                      <?php }else{ ?>
                      <input type="radio" name="radios_semestre" value="primeiroSemestre">
                      <?php } ?>
                      2º semestre de 201
                    </div>
    
                    <select name="anoSegundoSemestre">
                      <option value="0"<?php if(($ano_relatorio == "2010") && ($semestre_relatorio == "segundoSemestre")){echo "selected";}?>>0</option>
                      <option value="1"<?php if(($ano_relatorio == "2011") && ($semestre_relatorio == "segundoSemestre")){echo "selected";}?>>1</option>
                      <option value="2"<?php if(($ano_relatorio == "2012") && ($semestre_relatorio == "segundoSemestre")){echo "selected";}?>>2</option>
                      <option value="3"<?php if(($ano_relatorio == "2013") && ($semestre_relatorio == "segundoSemestre")){echo "selected";}?>>3</option>
                      <option value="4"<?php if(($ano_relatorio == "2014") && ($semestre_relatorio == "segundoSemestre")){echo "selected";}?>>4</option>
                      <option value="5"<?php if(($ano_relatorio == "2015") && ($semestre_relatorio == "segundoSemestre")){echo "selected";}?>>5</option>
                      <option value="6"<?php if(($ano_relatorio == "2016") && ($semestre_relatorio == "segundoSemestre")){echo "selected";}?>>6</option>
                      <option value="7"<?php if(($ano_relatorio == "2017") && ($semestre_relatorio == "segundoSemestre")){echo "selected";}?>>7</option>
                      <option value="8"<?php if(($ano_relatorio == "2018") && ($semestre_relatorio == "segundoSemestre")){echo "selected";}?>>8</option>
                      <option value="9"<?php if(($ano_relatorio == "2019") && ($semestre_relatorio == "segundoSemestre")){echo "selected";}?>>9</option>
                    </select>-->
                    <hr style="border: 1px solid #B9B9B9;">
    
                  </td>
                </tr>
    
    
    
                <tr>
                  <td colspan="2">
    
                    <strong>FASE DO CURSO: </strong>  <br>
    
                    <?php if($fase_curso == "Option one"){?>
                    <strong>1ª fase: </strong>Até a finalização dos créditos (ou seja, cursou disciplina no semestre em questão, ou deveria ter cursado disciplina no semestre em questão)
                    <br>
                    <?php } ?>
    
                    <?php if($fase_curso == "Option two"){?>
                    <strong>2ª fase: </strong>Após a finalização dos créditos e antes da aprovação no Exame de Qualificação
                    <br>
                    <?php } ?>
    
                    <?php if($fase_curso == "Option three"){?>
                    <strong>3ª fase: </strong> Após a aprovação no Exame de Qualificação 
                    (Data de aprovação na Qualificação: DD/MMM/AA)
                    <?php } ?>
                    
                    <br>
    
                  </td>
                </tr>
    
    
                <tr>
                  <td colspan="2">
                    <br>
                    <hr style="border: 1px solid #B9B9B9;">
    
                    <h3>I - ATIVIDADES DIDÁTICAS</h3>
                    <i>Liste todas as disciplinas já cursadas até o momento (e não apenas as do semestre em questão), 
                      os períodos (semestre e ano) e os respectivos conceitos (colocar inclusive disciplinas dos anos anteriores, 
                      quando houver; colocar inclusive disciplinas com reprovação, se houver). Informar os conceitos das disciplinas 
                      já disponíveis até o prazo máximo para a entrega do relatório; para as demais disciplinas, deixar sem marcar apenas os 
                      conceitos, pois os mesmos serão preenchidos posteriormente pelo Serviço de Pós-graduação.</i>
                      <br><br><br>
                    </td>
                  </tr>
    
                  <tr>
                    <td colspan="2"> 
    
                      <table border="0">
    
    
                        <tr align="center">
    
                          <td width="420px;" rowspan=2>
                            <strong>Disciplina cursada</strong>
                          </td>
    
                          <td width="60px;" colspan=3> 
                            <strong>Período cursado</strong>
                          </td>
    
    
                          <td rowspan=2>Conceito obtido:</td>
    
                          <td rowspan=2>Créditos obtidos:</td>
                        </tr>
    
                        <tr align="center">
                          <td width="60px;"> 
                            Ano
                          </td>
    
                          <td> Semestre</td>
    
                          <td>Aluno especial?</td>
    
                        </tr>
                        
                        <?php
                                
                                $sql = "SELECT * FROM disciplina_cursada WHERE id_relatorio = $id_relatorio";
                                $query = conectarDB()->query($sql);
                              
                                while ($dados = $query->fetch_array()){
                                  $id_disciplina = $dados['id_disciplina'];
                                  
                                  $sql2 = "SELECT nome_disciplina FROM disciplinas WHERE id_disciplina = $id_disciplina";
                                  $query2 = conectarDB()->query($sql);
                                  $dados2 = $query2->fetch_array();
                                  $nome_disciplina = $dados2['nome_disciplina'];
                                  
                                  $ano_disciplina_cursada = $dados['ano_disciplina_cursada'];
                                  $semestre_disciplina_cursada = $dados['semestre_disciplina_cursada'];
                                  $aluno_especial = $dados['aluno_especial'];
                                  $conceito_obtido = $dados['conceito_obtido'];
                                  $credito_obtido = $dados['credito_obtido'];
                                  
                        ?>
                              <tr align="center">
                                <td><?php echo $nome_disciplina;?></td>
                                <td><?php echo $ano_disciplina_cursada?></td>
                                <td><?php echo $semestre_disciplina_cursada?></td>
                                <td><?php echo $aluno_especial?></td>
                                <td><?php echo $conceito_obtido?></td>
                                <td><?php echo $credito_obtido?></td>
                              </tr>
                                
                              <?php
                                }
                              ?>
                        
    
    
                        <tr align="center">
    
                          <td width="420px;">
                             <select name="disciplina_cursada2">
                              <option value=""></option>
                               <?php
                                $sql = "SELECT * FROM disciplinas";
                                $query = conectarDB()->query($sql);
                              
                                while ($dados = $query->fetch_array()){
                                  $id_disciplina = $dados['id_disciplina'];
                                  $nome_disciplina = $dados['nome_disciplina'];
                                
                              ?>
                                
                                <option value="<?php echo $id_disciplina; ?>"><?php echo $nome_disciplina; ?></option>
                                
                              <?php
                                }                
                              ?>
                              
                              </select> 
                          </td>
    
                          <td> 
                            <input maxlength="4" name="ano_atvdidaticas2" type="text" placeholder="Ano" class="form-control"> 
                          </td>
    
                          <td> 
                            <select name="semestre_atvdidaticas2">
                              <option value="1">1</option>
                              <option value="2">2</option>
                            </select>
                          </td>
    
                          <td>
                            <select name="aluno_especial2">
                              <option value="nao">Não</option>
                              <option value="sim">Sim</option>
                            </select>
                          </td>
    
                          <td>
                            <select name="conceito_obtido2">
                              <option value="A">A</option>
                              <option value="B">B</option>
                              <option value="C">C</option>
                              <option value="R">R</option>
                            </select>
                          </td>
    
                          <td>
                            <select name="creditos_obtidos2">
                              <option value="0">0</option>
                              <option value="1">1</option>
                              <option value="2">2</option>
                              <option value="3">3</option>
                              <option value="4">4</option>
                              <option value="5">5</option>
                              <option value="6">6</option>
                              <option value="7">7</option>
                              <option value="8">8</option>
                              <option value="9">9</option>
                            </select>
                          </td>
                        </tr>
    
    
                        <tr align="center">
    
                          <td width="420px;">
                           <select name="disciplina_cursada3">
                              <option value=""></option>
                               <?php
                                $sql = "SELECT * FROM disciplinas";
                                $query = conectarDB()->query($sql);
                              
                                while ($dados = $query->fetch_array()){
                                  $id_disciplina = $dados['id_disciplina'];
                                  $nome_disciplina = $dados['nome_disciplina'];
                                
                              ?>
                                
                                <option value="<?php echo $id_disciplina; ?>"><?php echo $nome_disciplina; ?></option>
                                
                              <?php
                                }                
                              ?>
                              
                              </select> 
                          </td>
    
                          <td> 
                            <input maxlength="4" name="ano_atvdidaticas3" type="text" placeholder="Ano" class="form-control"> 
                          </td>
    
                          <td> 
                            <select name="semestre_atvdidaticas3">
                              <option value="1">1</option>
                              <option value="2">2</option>
                            </select>
                          </td>
    
                          <td>
                            <select name="aluno_especial3">
                              <option value="nao">Não</option>
                              <option value="sim">Sim</option>
                            </select>
                          </td>
    
                          <td>
                            <select name="conceito_obtido3">
                              <option value="A">A</option>
                              <option value="B">B</option>
                              <option value="C">C</option>
                              <option value="R">R</option>
                            </select>
                          </td>
    
                          <td>
                            <select name="creditos_obtidos3">
                              <option value="0">0</option>
                              <option value="1">1</option>
                              <option value="2">2</option>
                              <option value="3">3</option>
                              <option value="4">4</option>
                              <option value="5">5</option>
                              <option value="6">6</option>
                              <option value="7">7</option>
                              <option value="8">8</option>
                              <option value="9">9</option>
                            </select>
                          </td>
                        </tr>
    
    
                        <tr align="center">
    
                          <td width="420px;">
                           <select name="disciplina_cursada4">
                              <option value=""></option>
                               <?php
                                $sql = "SELECT * FROM disciplinas";
                                $query = conectarDB()->query($sql);
                              
                                while ($dados = $query->fetch_array()){
                                  $id_disciplina = $dados['id_disciplina'];
                                  $nome_disciplina = $dados['nome_disciplina'];
                                
                              ?>
                                
                                <option value="<?php echo $id_disciplina; ?>"><?php echo $nome_disciplina; ?></option>
                                
                              <?php
                                }                
                              ?>
                              
                              </select> 
                          </td>
    
                          <td> 
                            <input maxlength="4" name="ano_atvdidaticas4" type="text" placeholder="Ano" class="form-control"> 
                          </td>
    
                          <td> 
                            <select name="semestre_atvdidaticas4">
                              <option value="1">1</option>
                              <option value="2">2</option>
                            </select>
                          </td>
    
                          <td>
                            <select name="aluno_especial4">
                              <option value="nao">Não</option>
                              <option value="sim">Sim</option>
                            </select>
                          </td>
    
                          <td>
                            <select name="conceito_obtido4">
                              <option value="A">A</option>
                              <option value="B">B</option>
                              <option value="C">C</option>
                              <option value="R">R</option>
                            </select>
                          </td>
    
                          <td>
                            <select name="creditos_obtidos4">
                              <option value="0">0</option>
                              <option value="1">1</option>
                              <option value="2">2</option>
                              <option value="3">3</option>
                              <option value="4">4</option>
                              <option value="5">5</option>
                              <option value="6">6</option>
                              <option value="7">7</option>
                              <option value="8">8</option>
                              <option value="9">9</option>
                            </select>
                          </td>
                        </tr>
    
                        <tr align="center">
    
                          <td width="420px;">
                           
                               <?php
                                $sql = "SELECT nome_disciplina FROM disciplinas WHERE id_disciplina IN (
                                        SELECT id_disciplina FROM disciplina_cursada WHERE id_relatorio ='$id_relatorio')
                                        ";

                                $query = conectarDB()->query($sql);
                                
                                while ($dados = $query->fetch_array()){
                                    $nome_disciplina = $dados['nome_disciplina'];
                                }
                                echo  "<p>".$nome_disciplina."</p>";
                              ?>
                            
                          </td>
    
                          <td> 
                            <input maxlength="4" name="ano_atvdidaticas" type="text" placeholder="Ano" class="form-control"> 
                          </td>
    
                          <td> 
                            <select name="semestre_atvdidaticas5">
                              <option value="1">1</option>
                              <option value="2">2</option>
                            </select>
                          </td>
    
                          <td>
                            <select name="aluno_especial5">
                              <option value="nao">Não</option>
                              <option value="sim">Sim</option>
                            </select>
                          </td>
    
                          <td>
                            <select name="conceito_obtido5">
                              <option value="A">A</option>
                              <option value="B">B</option>
                              <option value="C">C</option>
                              <option value="R">R</option>
                            </select>
                          </td>
    
                          <td>
                            <select name="creditos_obtidos5">
                              <option value="0">0</option>
                              <option value="1">1</option>
                              <option value="2">2</option>
                              <option value="3">3</option>
                              <option value="4">4</option>
                              <option value="5">5</option>
                              <option value="6">6</option>
                              <option value="7">7</option>
                              <option value="8">8</option>
                              <option value="9">9</option>
                            </select>
                          </td>
                        </tr>
    
    
    
                      </table>
                      <br><br><br>
                    </td>
    
                  </tr>
    
                  <!--   DISCIPLINA ALMEJADA   -->
                  <!--   DISCIPLINA ALMEJADA   -->
                  <!--   DISCIPLINA ALMEJADA   -->
                  <!--   DISCIPLINA ALMEJADA   -->
                  <!--   DISCIPLINA ALMEJADA   -->
                  <!--   DISCIPLINA ALMEJADA   -->
    
                  <tr>
                    <td colspan="2"> 
    
                      <table border="0">
    
    
                        <tr align="center">
    
                          <td width="420px;" rowspan=2>
                            <strong>Disciplinas Planejadas</strong>
                          </td>
    
                          <td width="60px;" colspan=2 cellpading=5> 
                            <strong>Período planejado</strong>
                          </td>
    
    
                          <td rowspan=2>Conceito:</td>
    
                          <td rowspan=2>Créditos Almejados:</td>
                        </tr>
    
                        <tr align="center">
                          <td width="60px;"> 
                            Ano
                          </td>
    
                          <td> Semestre</td>
    
                        </tr>
    
                        <tr align="center">
    
                          <td width="420px;">
                            <select name="disciplina_planejada">
                              <option value=""></option>
                               <?php
                                $sql = "SELECT * FROM disciplinas";
                                $query = conectarDB()->query($sql);
                              
                                while ($dados = $query->fetch_array()){
                                  $id_disciplina = $dados['id_disciplina'];
                                  $nome_disciplina = $dados['nome_disciplina'];
                                
                              ?>
                                
                                <option value="<?php echo $id_disciplina; ?>"><?php echo $nome_disciplina; ?></option>
                                
                              <?php
                                }                
                              ?>
                              
                              </select> 
                          </td>
    
                          <td> 
                            <input maxlength="4" name="ano_atvplanejada" type="text" placeholder="Ano" class="form-control"> 
                          </td>
    
                          <td> 
                            <select name="semestre_atvplanejada">
                              <option value="1">1</option>
                              <option value="2">2</option>
                            </select>
                          </td>
    
                          <td>
                            N/A
                          </td>
    
                          <td>
                            <select name="creditos_almejados">
                              <option value="0">0</option>
                              <option value="1">1</option>
                              <option value="2">2</option>
                              <option value="3">3</option>
                              <option value="4">4</option>
                              <option value="5">5</option>
                              <option value="6">6</option>
                              <option value="7">7</option>
                              <option value="8">8</option>
                              <option value="9">9</option>
                            </select>
                          </td>
                        </tr>
    
    
                        <tr align="center">
    
                          <td width="420px;">
                            <select name="disciplina_planejada2">
                              <option value=""></option>
                               <?php
                                $sql = "SELECT * FROM disciplinas";
                                $query = conectarDB()->query($sql);
                              
                                while ($dados = $query->fetch_array()){
                                  $id_disciplina = $dados['id_disciplina'];
                                  $nome_disciplina = $dados['nome_disciplina'];
                                
                              ?>
                                
                                <option value="<?php echo $id_disciplina; ?>"><?php echo $nome_disciplina; ?></option>
                                
                              <?php
                                }                
                              ?>
                              
                              </select> 
                          </td>
    
                          <td> 
                            <input maxlength="4" name="ano_atvplanejada2" type="text" placeholder="Ano" class="form-control"> 
                          </td>
    
                          <td> 
                            <select name="semestre_atvplanejada2">
                              <option value="1">1</option>
                              <option value="2">2</option>
                            </select>
                          </td>
    
                          <td>
                            N/A
                          </td>
    
                          <td>
                            <select name="creditos_almejados2">
                              <option value="0">0</option>
                              <option value="1">1</option>
                              <option value="2">2</option>
                              <option value="3">3</option>
                              <option value="4">4</option>
                              <option value="5">5</option>
                              <option value="6">6</option>
                              <option value="7">7</option>
                              <option value="8">8</option>
                              <option value="9">9</option>
                            </select>
                          </td>
                        </tr>
    
    
                        <tr align="center">
    
                          <td width="420px;">
                            <select name="disciplina_planejada3">
                              <option value=""></option>
                               <?php
                                $sql = "SELECT * FROM disciplinas";
                                $query = conectarDB()->query($sql);
                              
                                while ($dados = $query->fetch_array()){
                                  $id_disciplina = $dados['id_disciplina'];
                                  $nome_disciplina = $dados['nome_disciplina'];
                                
                              ?>
                                
                                <option value="<?php echo $id_disciplina; ?>"><?php echo $nome_disciplina; ?></option>
                                
                              <?php
                                }                
                              ?>
                              
                              </select> 
                          </td>
    
                          <td> 
                            <input maxlength="4" name="ano_atvplanejada3" type="text" placeholder="Ano" class="form-control"> 
                          </td>
    
                          <td> 
                            <select name="semestre_atvplanejada3">
                              <option value="1">1</option>
                              <option value="2">2</option>
                            </select>
                          </td>
    
    
                          <td>
                            N/A
                          </td>
    
                          <td>
                            <select name="creditos_almejados3">
                              <option value="0">0</option>
                              <option value="1">1</option>
                              <option value="2">2</option>
                              <option value="3">3</option>
                              <option value="4">4</option>
                              <option value="5">5</option>
                              <option value="6">6</option>
                              <option value="7">7</option>
                              <option value="8">8</option>
                              <option value="9">9</option>
                            </select>
                          </td>
                        </tr>
    
    
                        <tr align="center">
    
                          <td width="420px;">
                            <select name="disciplina_planejada4">
                              <option value=""></option>
                               <?php
                                $sql = "SELECT * FROM disciplinas";
                                $query = conectarDB()->query($sql);
                              
                                while ($dados = $query->fetch_array()){
                                  $id_disciplina = $dados['id_disciplina'];
                                  $nome_disciplina = $dados['nome_disciplina'];
                                
                              ?>
                                
                                <option value="<?php echo $id_disciplina; ?>"><?php echo $nome_disciplina; ?></option>
                                
                              <?php
                                }                
                              ?>
                              
                              </select> 
                          </td>
    
                          <td> 
                            <input maxlength="4" name="ano_atvplanejada4" type="text" placeholder="Ano" class="form-control"> 
                          </td>
    
                          <td> 
                            <select name="semestre_atvplanejada4">
                              <option value="1">1</option>
                              <option value="2">2</option>
                            </select>
                          </td>
    
                          <td>
                            N/A
                          </td>
    
                          <td>
                            <select name="creditos_almejados4">
                              <option value="0">0</option>
                              <option value="1">1</option>
                              <option value="2">2</option>
                              <option value="3">3</option>
                              <option value="4">4</option>
                              <option value="5">5</option>
                              <option value="6">6</option>
                              <option value="7">7</option>
                              <option value="8">8</option>
                              <option value="9">9</option>
                            </select>
                          </td>
                        </tr>
    
    
                        <tr align="center">
    
                          <td width="420px;">
                            <select name="disciplina_planejada5">
                              <option value=""></option>
                               <?php
                                $sql = "SELECT * FROM disciplinas";
                                $query = conectarDB()->query($sql);
                              
                                while ($dados = $query->fetch_array()){
                                  $id_disciplina = $dados['id_disciplina'];
                                  $nome_disciplina = $dados['nome_disciplina'];
                                
                              ?>
                                
                                <option value="<?php echo $id_disciplina; ?>"><?php echo $nome_disciplina; ?></option>
                                
                              <?php
                                }                
                              ?>
                              
                              </select> 
                          </td>
    
                          <td> 
                            <input maxlength="4" name="ano_atvplanejada5" type="text" placeholder="Ano" class="form-control"> 
                          </td>
    
                          <td> 
                            <select name="semestre_atvplanejada5">
                              <option value="1">1</option>
                              <option value="2">2</option>
                            </select>
                          </td>
    
                          <td>
                            N/A
                          </td>
    
                          <td>
                            <select name="creditos_almejados5">
                              <option value="0">0</option>
                              <option value="1">1</option>
                              <option value="2">2</option>
                              <option value="3">3</option>
                              <option value="4">4</option>
                              <option value="5">5</option>
                              <option value="6">6</option>
                              <option value="7">7</option>
                              <option value="8">8</option>
                              <option value="9">9</option>
                            </select>
                          </td>
                        </tr>
    
                      </table>
    
                    </td>
                  </tr>
    
    
                  <tr>
                    <td colspan=2>
                      <br><br>
                      <h4>Comentários sobre Disciplinas Cursadas/Planejadas:</h4>
                      <i>(O total de créditos em disciplinas deve ser igual ou superior a 48. Assim, o planejamento acima 
                        “Total de créditos obtidos” + “Total de créditos almejados” em disciplinas deve ser igual ou superior a 48. 
                        Use o espaço abaixo para apresentar qualquer informação adicional referente ao seu planejamento referente à 
                        obtenção de créditos em disciplinas, incluindo, por exemplo, o uso de Créditos Especiais, conforme previsto no 
                        Regulamento do PPgSI)</i>
                        <br>
    
                        <textarea name="informacoes_adicionais" rows="5" class="form-control" placeholder="Informações adicionais"></textarea>
                        <br>
                        <hr style="border: 1px solid #B9B9B9;">
    
                      </td>
                    </tr>
    
    
    
                    <tr>
                      <td colspan="2">
    
    
                        <h3>II. ATIVIDADES DE PESQUISA</h3>
                        <i>Apresente um resumo do contexto, escopo e objetivos de seu projeto e de seu estado atual de desenvolvimento. 
                          Exiba o cronograma (detalhado para os próximos dois semestres e os principais marcos até o final do curso). 
                          Indique as publicações eventualmente produzidas ou em elaboração no período.
                          <br>
                          Este quadro deve ser preenchido com nível de detalhamento suficiente para dar condições à 
                          CCP-PPgSI de avaliar se o orientando apresenta desempenho adequado em relação ao estágio do mestrado no qual 
                          se encontra. Mesmo orientandos finalizando o primeiro semestre devem preencher essas informações com o maior grau 
                          de detalhamento possível. Quando for o caso, deixar claro que não há informações adicionais para serem apresentadas 
                          e explicar o motivo.
                        </i>
    
                        <?php
                                $id_relatorio = $_GET['i'];
                                $sql = "SELECT * FROM projeto WHERE id_relatorio = $id_relatorio";
                                $query = conectarDB()->query($sql);
                                $dados = $query->fetch_array();
                                
                                $resumo_relatorio = $dados['resumo_relatorio'];
                                $estado_atual = $dados['estado_atual'];
                                $id_projeto = $dados['id_projeto'];
                                
                                $sql = "SELECT * FROM publicacoes WHERE id_projeto = $id_projeto";
                                $query = conectarDB()->query($sql);
                                $dados = $query->fetch_array();
                                
                                $em_elaboracao = $dados['em_elaboracao'];
                                $submetidas = $dados['submetidas'];
                                $aceitas_para_publicacao = $dados['aceitas_para_publicacao'];
                                $publicadas = $dados['publicadas'];
                      ?>
                        
                        <br><br>
                        RESUMO DO PROJETO:
                        <textarea  required="true" name="resumo_projeto" rows="5" class="form-control" 
                        placeholder="<?php echo $resumo_relatorio;?>"></textarea>
    
                        <br>
    
                        ESTADO ATUAL DE DESENVOLVIMENTO DO PROJETO:
    
                        <textarea required="true" name="estado_projeto" rows="5" class="form-control" 
                        placeholder="<?php echo $estado_atual;?>"></textarea>
                        <br> <br>
    
                        <strong>CRONOGRAMA:</strong>
                        <br> <i>
                        Inclua no cronograma abaixo os principais marcos já planejados (e ainda não realizados) para seu curso de Mestrado e que deem subsídio para o parecerista e a CCP-PPgSI avaliar se as datas propostas para depósito da qualificação e/ou depósito da dissertação são realmente factíveis. Inclua quantas novas linhas na tabela abaixo forem necessárias.
                        <br>
                        Exemplos de atividades que devem ser incluídas no cronograma, além das que já aparecem no template de cronograma abaixo: <br>
                        • Disciplinas ainda a serem cursadas <br>
                        • Revisões bibliográficas ou Revisões sistemáticas sendo ou a serem realizadas <br>
                        • Passos metodológicos já previstos para seu projeto (design, implementação, testes, simulação, avaliação, etc.) <br>
                        • Elaboração, revisão, submissão ou apresentação de artigos ou participação em eventos</i>
                      </td>
                    </tr>
    
    
                    <tr>
                      <td>
                        <br>
                        <strong>ATIVIDADE</strong>
                        
                        <?php
                          $sql = "SELECT * FROM atividade WHERE id_projeto='blabla'"; //precisa recuperar o id dele
                          $query = conectarDB()->query($sql);
                            
                          while ($dados = $query->fetch_array()){
                            $atividade = $dados['atividade'];
                            $periodo_atividade = $dados['periodo_atividade'];
                        ?>
                          
                          aqui vc trata as exceções (caso o campo esteja vazio, por exemplo)
                          e exibe o a atividade e seu respectivo período
                          
                          >>>>>> ESCREVE ALGUMA COISA SE ESTIVER AQUI <<<<<<
                          
                        <?php
                          }
                        ?>
                        <input required="true" name="cronograma_proficiencia_ingles" type="text" placeholder="Previsão para Exame de Proficiência em Inglês" class="form-control">
                        <input name="cronograma_atividade" type="text" placeholder="Atividade 1" class="form-control">
                        <input name="cronograma_atividade2" type="text" placeholder="Atividade 2" class="form-control">       
                        <input name="cronograma_atividadeN" type="text" placeholder="Atividade N" class="form-control">
                        <input name="cronograma_qualificacao" type="text" placeholder="Previsão para Depósito da Qualificação" class="form-control">        
                        <input name="cronograma_dissertacao" type="text" placeholder="Previsão para Depósito da Dissertação" class="form-control">                 
                      </td>
                      
                      <td>
                        <br>
                        <strong>PERÍODO</strong>
                        <input required="true" id="cronograma_periodo_profingles" name="cronograma_periodo_profingles" type="text" placeholder="DD/MM/AAAA" class="form-control">
                        <input id="cronograma_periodo" name="cronograma_periodo" type="text" placeholder="DD/MM/AAAA" class="form-control">
                        <input id="cronograma_periodo2" name="cronograma_periodo2" type="text" placeholder="DD/MM/AAAA" class="form-control">
                        <input id="cronograma_periodoN" name="cronograma_periodoN" type="text" placeholder="DD/MM/AAAA" class="form-control">
                        <input id="cronograma_periodo_qualificacao" name="cronograma_periodo_qualificacao" type="text" placeholder="DD/MM/AAAA" class="form-control">
                        <input id="cronograma_periodo_dissertacao" name="cronograma_periodo_dissertacao" type="text" placeholder="DD/MM/AAAA" class="form-control">
                      </td>
                    </tr>
    
    
                    <tr>
                      <td colspan=2>
                        <br><br>
                        <strong>PUBLICAÇÕES/EVENTOS (inclua apenas os relacionados a seu projeto de Mestrado):</strong>
                        <br>
                        Template para uso nos itens abaixo (se aplicável):<br>
    
                        • Título do artigo: <br>
                        • Autores (incluindo necessariamente o orientador):<br>
                        • Data de < submissão/aceitação/publicação >:<br>
                        • Se Periódico:<br>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;- Título:<br>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;- JCR (Impact Factor) (admin-apps.webofknowledge.com/JCR/JCR): <br>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;- H-Index (Scopus - http://www.scimagojr.com/journalsearch.php): <br>
                        • Se Conferência: <br>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;- Título: (se publicado em workshop ou outro tipo de sub-evento, usar o título do workshop/sub-evento, e não da conferência principal, pois o H-Index não é compartilhado/herdado, e procurar o H-Index pelo evento correto, se houver) <br>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;- H-Index (Shine - http://shine.icomp.ufam.edu.br): <br>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;- Trilha da conferência (principal, regular, artigos completos, artigos curtos, indústria, demonstração, trabalhos em andamento, pôster, etc.):  <br>
                        <br> <br>
                        1) PUBLICAÇÕES EM ELABORAÇÃO OU SUBMETIDAS (INCLUINDO APENAS O SEMESTRE EM QUESTÃO):  <br>
                        1.1) EM ELABORAÇÃO:
    
                        <textarea name="publicacoes_em_elaboracao" rows="5" placeholder="<?php echo $em_elaboracao;?>" class="form-control"></textarea>
    
                        <br>
                        1.2) SUBMETIDAS:
                        <textarea name="publicacoes_submetidas" rows="5" placeholder="<?php echo $submetidas;?>" class="form-control"></textarea>
    
                        <br>
                        2) PUBLICAÇÕES GERADAS (DESDE O INÍCIO DO CURSO ATÉ O SEMESTRE EM QUESTÃO): <br>
                        2.1) ACEITAS PARA PUBLICAÇÃO:
                        <textarea name="publicacoes_aceitas_publicacao" rows="5" placeholder="<?php echo $aceitas_para_publicacao;?>" class="form-control"></textarea>
    <br>
                        2.2) PUBLICADAS: <br>
                        <textarea name="publicacoes_publicadas" rows="5" placeholder="<?php echo $publicadas;?>" class="form-control"></textarea>
                        
                        <br>
                        3) PARTICIPAÇÃO EM EVENTOS CIENTÍFICOS (DESDE O INÍCIO DO CURSO ATÉ O SEMESTRE EM QUESTÃO):<br>
                        <input name="publicacoes_eventos_cientificos1" type="text" placeholder="Evento" class="form-control">
                        <input style="margin-top:10px;" name="publicacoes_eventos_cientificos2" type="text" placeholder="Evento" class="form-control">
    
                        <br>
                        <hr style="border: 1px solid #B9B9B9;">
    
                        <h3>ATUALIZAÇÃO DO LATTES:</h3>
                        Todo final de semestre, o Currículo Lattes do orientando deve ser atualizado, com as atividades realizadas no semestre no PPgSI, incluindo:<br>
                        • Curso de mestrado em andamento, incluindo título do projeto e orientador<br>
                        • Projeto de pesquisa sendo desenvolvido no mestrado<br>
                        • Área de atuação / linha de pesquisa (em função do projeto sendo desenvolvido no PPgSI)<br>
                        • Publicação de artigos (em periódicos, em anais de conferências, etc.)<br>
                        • Publicação de relatórios técnicos<br>
                        • Participação em eventos<br>
                        • Apresentação de trabalhos em eventos<br>
                        • Prêmios recebidos<br>
                        (Em caso de dúvida sobre como cadastrar um determinado item, converse com seu orientador)<br><br>
    
                        Data de última atualização de meu Currículo Lates (deve ser obrigatoriamente uma data recente):
                        <input required="true" id="data_lattes" name="data_lattes" placeholder="DD/MM/AAAA" type="text" class="form-control" style="width:120px;">
    
    
                        Inclua aqui o link web para seu CV Lattes (copie da parte “Endereço para acessar este CV” e não do endereço http de seu navegador):
                        <input required="true" name="link_lattes" placeholder="Link" type="text" class="form-control">
    
    
                      </td>
                    </tr>
    
                  </table>
    
                  <!-- Button -->
                  <div class="control-group">
                    <label class="control-label" for="singlebutton"></label>
                    <div class="controls">
                      <button id="btnProximo" name="singlebutton" class="btn btn-primary">Finalizar</button>
                    </div>
                    <br>
                  </div>
    
    
                </fieldset>
              </form>
    
          <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
          <script src="../js/bootstrap.min.js"></script>
          <script src="../js/jquery.maskedinput.js" type="text/javascript"></script>
          <script src="../js/validacaoRelatorio.js"></script>
        </div>
      </div>
    </div>
    <br><br>
  </body>
</html>