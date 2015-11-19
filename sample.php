<?php

//include "bootstrap.php";

if (!empty($_POST['submitted'])) {
    
    // Cria as variáveis dinamicamente
    foreach ($_POST as $chave => $valor) {
        // Remove todas as tags HTML
    	// Remove os espaços em branco do valor
    	$$chave = trim(strip_tags($valor));
    }
    
    print_r($_POST);
    
}

?>

<!DOCTYPE html>

<html>
    <head>
        <title>dynamicForm sample</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

        <script type="text/javascript" src="../1.RESOURCES/jquery-1.11.3.min.js"></script>
        <script type="text/javascript" src="../1.RESOURCES/dynamicForm.js"></script>
        


    </head>
    <body>
        <div>
            <h1>dynamicForm</h1>
            <p>This plugin creates the ability to define a template for a dynamic section of a form, which is then
                dynamically added to a form for completion by the user.</p>
        </div>

        <br/>

        <div id="templates_container" hidden>
            
            <h3>Template</h3>
            <p>You first outline the template for the dynamic section.  This should only contain the fields you want to
                include in the dynamic section.  You would also normally hide the parent container to ensure that the
                template itself isn't changed by the user (the pink section below would not be visible to users under
                normal circumstances).</p>
            <div id="multipleLocationsTemplate" style="text-align: center; padding:4px 0px 4px 0px;">
                <label for="startDateMultiLocations_0">From</label>
                <input type="date" id="startDateMultiLocations_0" name = "Name_0" title="Start date in new location" onkeyup="" />
                <label for="multiLocation_0">Location</label>
                <select id="multiLocation_0" name = "Location_0" title="Where do you live?" onchange="">
                    <option value="locationEngland" selected="selected">England</option>
                    <option value="locationScotland">Scotland</option>
                </select>
                <label for="teste_0">Teste</label>
                <input type="text" id="teste_0" name = "Teste_0" title="Testando"/>
                <input type="button" value="&nbsp;-&nbsp;" id="deleteLocation_0" title="Delete this location"
                       onclick="$(document).dynamicForm('remove', '_anchor_', this);" />
                <input type="button" value="&nbsp;+&nbsp;" id="addLocation_0" title="Add a location"
                       onclick="$(document).dynamicForm('add', '_anchor_', this);" />
                <br />
            </div>
            
        </div>

        <br/>

        <div class="anchor_container">
                
                        <h3>Setting the anchor and initiating the template</h3>
                        <p>Once the template is properly configured, simply add the anchor for where the template should actually be
                            located.  This can be anywhere on the page, and the template and anchor can be seperated if necessary,
                            although doing so does make the page less logical when referring to it in the future.  Using the plus and
                            minus buttons adds new unique copies of the fields to the anchor section - plus adds a new section immediately
                            after the instance of the plus button (ie, not at the end of the form), while the minus button deletes the
                            corresponding instance.</p>
                        
                        <!-- MAIS IMPORTARNTE -->
                        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" role="form" method="POST">
                            <div class="form-group">
                        
                                <div id="multipleLocations" class="hidden input_form"></div>
                        
                                <br>
                        
                                <input id="submit" name="submitted" type="submit">
                    
                            </div>
                        </form>
                        
            
                        <p>Finally, once the template and anchor exist within the DOM, configure the plugin itself, and initialise it.</p>
            
                        <script type="text/javascript">
                                       $(document).ready(function() {
                                           $(document).dynamicForm('set', '#multipleLocations', '#multipleLocationsTemplate')
                                                   .dynamicForm('init');
                                       });
                        </script>
                        
                        <!-- MAIS IMPORTARNTE -->
                        
            
                        <p>For more information on usage and configuration, please visit the
                            <a href="https://github.com/nianja/dynamicForm/wiki/Usage">wiki</a>.</p>
                            
        </div>
        
        </br>
        </br>
        </br>
        
        <!-- TEMPLATE \/ -->
        <div id="templates_container">
            <!-- INGREDIENTES PRIMARIOS -->
            <div id="ingredientesPrimariosTemplate">
                <div class="form-inline">
                    
                    <div class="form-group">    
                        <label class="control-label col-sm-3" for="NomeP_0">Nome</label>
                        <select id="NomeP_0" name = "NomeP_0" title="Nome do Igrediente" onchange="">
                            <?php
                            $sql = "SELECT `id_estoque`,`nome` FROM `estoque` WHERE id_usuario = $idUsuario";
                            $resultado = mysql_query($sql);
                            mysql_close($con);
                                while($linha = mysql_fetch_array($resultado)){
                                    echo '<option>'.$linha['nome'].'</option>';
                                }
                            ?>
                        </select>
                    </div>    
                    
                    <div class="form-group">    
                        <label class="control-label col-sm-3" for="QuantidadeUtilizadaP_0">Quantidade Utilizada</label>
                        <div class="col-sm-7">    
                            <input type="number" id="QuantidadeUtilizadaP_0" name = "QuantidadeUtilizadaP_0" title="Quantidade Utilizada"/>
                        </div>
                    </div>
                    
                    <div class="form-group">    
                        <label class="control-label col-sm-3" for="QuantidadeLiquidaP_0">Quantidade Líquida</label>
                        <div class="col-sm-7">    
                            <input type="number" id="QuantidadeLiquidaP_0" name = "QuantidadeLiquidaP_0" title="Quantidade Líquida"/>            
                        </div>
                    </div>
                    
                    <div class="form-group">    
                        <label class="control-label col-sm-3" for="RendimentoP_0">Rendimento</label>
                        <div class="col-sm-7">    
                            <input type="number" id="RendimentoP_0" name = "RendimentoP_0" title="Rendimento"/>
                        </div>
                    </div>
                    
                    <div class="form-group">    
                        <!-- REMOVE E ADD -->    
                        <input type="button" value="&nbsp;-&nbsp;" id="deleteP_0" title="Delete este Ingrediente"
                               onclick="$(document).dynamicForm('remove', '_anchor_', this);" />
                        <input type="button" value="&nbsp;+&nbsp;" id="addP_0" title="Adicione mais um Ingrediente"
                               onclick="$(document).dynamicForm('add', '_anchor_', this);" />
                    </div>
                    
                </div>    
            </div>
        </div>
        <div id="templates_container">    
            <!-- INGREDIENTES SECUNDARIOS -->
            <div id="ingredientesSecundariosTemplate">
                <div class="form-inline">  
                
                    <div class="form-group">
                        <label class="control-label col-sm-3" for="NomeS_0">Nome</label>
                        <select id="NomeS_0" name = "NomeS_0" title="Nome do Igrediente" onchange="">
                            <?php
                            $sql = "SELECT `id_estoque`,`nome` FROM `estoque` WHERE id_usuario = $idUsuario";
                            $resultado = mysql_query($sql);
                            mysql_close($con);
                                while($linha = mysql_fetch_array($resultado)){
                                    echo '<option>'.$linha['nome'].'</option>';
                                }
                            ?>
                        </select>
                    </div>
                    
                    <div class="form-group">    
                        <label class="control-label col-sm-3" for="QuantidadeUtilizadaS_0">Quantidade Utilizada</label>
                        <div class="col-sm-7">    
                            <input type="number" id="QuantidadeUtilizadaS_0" name = "QuantidadeUtilizadaS_0" title="Quantidade Utilizada"/>
                        </div>
                    </div>
                    
                    <div class="form-group">    
                        <label class="control-label col-sm-3" for="QuantidadeLiquidaS_0">Quantidade Líquida</label>
                        <div class="col-sm-7">    
                            <input type="number" id="QuantidadeLiquidaS_0" name = "QuantidadeLiquidaS_0" title="Quantidade Líquida"/>            
                        </div>
                    </div>
                    
                    <div class="form-group">    
                        <label class="control-label col-sm-3" for="RendimentoS_0">Rendimento</label>
                        <div class="col-sm-7">    
                            <input type="number" id="RendimentoS_0" name = "RendimentoS_0" title="Rendimento"/>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <!-- REMOVE E ADD -->    
                        <input type="button" value="&nbsp;-&nbsp;" id="deleteS_0" title="Delete este Ingrediente"
                               onclick="$(document).dynamicForm('remove', '_anchor_', this);" />
                        <input type="button" value="&nbsp;+&nbsp;" id="addS_0" title="Adicione mais um Ingrediente"
                               onclick="$(document).dynamicForm('add', '_anchor_', this);" />
                    </div>
                
                </div>
            </div>
        </div>
        <div id="templates_container">    
            <!-- INGREDIENTES EXTRAS -->
            <div id="ingredientesExtrasTemplate">
                <div class="form-inline">
                    
                    <div class="form-group">
                        <label class="control-label col-sm-3" for="NomeE_0">Nome</label>
                        <select id="NomeE_0" name = "NomeE_0" title="Nome do Igrediente" onchange="">
                            <?php
                            $sql = "SELECT `id_estoque`,`nome` FROM `estoque` WHERE id_usuario = $idUsuario";
                            $resultado = mysql_query($sql);
                            mysql_close($con);
                                while($linha = mysql_fetch_array($resultado)){
                                    echo '<option>'.$linha['nome'].'</option>';
                                }
                            ?>
                        </select>
                    </div>
                    
                    <div class="form-group">
                        <label class="control-label col-sm-3" for="QuantidadeUtilizadaE_0">Quantidade Utilizada</label>
                        <div class="col-sm-7">    
                            <input type="number" id="QuantidadeUtilizadaE_0" name = "QuantidadeUtilizadaE_0" title="Quantidade Utilizada"/>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="control-label col-sm-3" for="QuantidadeLiquidaE_0">Quantidade Líquida</label>
                        <div class="col-sm-7">    
                            <input type="number" id="QuantidadeLiquidaE_0" name = "QuantidadeLiquidaE_0" title="Quantidade Líquida"/>            
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="control-label col-sm-3" for="RendimentoE_0">Rendimento</label>
                        <div class="col-sm-7">    
                            <input type="number" id="RendimentoE_0" name = "RendimentoE_0" title="Rendimento"/>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="control-label col-sm-3" for="PrecoExtraE_0">Preço Extra</label>
                        <div class="col-sm-7">
                            <input type="text" id="PrecoExtraE_0" name = "PrecoExtraE_0" title="Preço Extra"/>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <!-- REMOVE E ADD -->    
                        <input type="button" value="&nbsp;-&nbsp;" id="deleteE_0" title="Delete este Ingrediente"
                               onclick="$(document).dynamicForm('remove', '_anchor_', this);" />
                        <input type="button" value="&nbsp;+&nbsp;" id="addE_0" title="Adicione mais um Ingrediente"
                               onclick="$(document).dynamicForm('add', '_anchor_', this);" />
                    </div>
                
                </div>    
            </div>
        </div>
    
        <!-- MAIS IMPORTARNTE -->
        <div class="anchor_container">
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" role="form" method="POST">
            <div class="form-group">
        
                <div id="testeIngredientePrimario" class="hidden input_form"></div>
        
                <br>
        
                <input id="submit" name="submitted" type="submit">
    
            </div>
        </form>
        

        <script type="text/javascript">
                       $(document).ready(function() {
                           $(document).dynamicForm('set', '#testeIngredientePrimario', '#ingredientesPrimariosTemplate')
                                   .dynamicForm('init');
                       });
        </script>
        
        </div>
        <!-- MAIS IMPORTARNTE -->
        
                <!-- MAIS IMPORTARNTE -->
        <div class="anchor_container">
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" role="form" method="POST">
            <div class="form-group">
        
                <div id="testeIngredienteSecundario" class="hidden input_form"></div>
        
                <br>
        
                <input id="submit" name="submitted" type="submit">
    
            </div>
        </form>
        

        <script type="text/javascript">
                       $(document).ready(function() {
                           $(document).dynamicForm('set', '#testeIngredienteSecundario', '#ingredientesSecundariosTemplate')
                                   .dynamicForm('init');
                       });
        </script>
        
        </div>
        <!-- MAIS IMPORTARNTE -->
        
                <!-- MAIS IMPORTARNTE -->
        <div class="anchor_container">
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" role="form" method="POST">
            <div class="form-group">
        
                <div id="testeIngredienteExtra" class="hidden input_form"></div>
        
                <br>
        
                <input id="submit" name="submitted" type="submit">
    
            </div>
        </form>
        

        <script type="text/javascript">
                       $(document).ready(function() {
                           $(document).dynamicForm('set', '#testeIngredienteExtra', '#ingredientesExtrasTemplate')
                                   .dynamicForm('init');
                       });
        </script>
        
        </div>
        <!-- MAIS IMPORTARNTE -->
        
        

    </body>
</html>
