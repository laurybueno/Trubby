<?php include "verifica.php"; ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title> Área do aluno </title>
    <style type="text/css">
    .tr:hover{
        background:#fff;
    }
    .td{
        border:1px solid #000;    
        padding:5px;
    }
    </style>
    <link href="../css/style.css" rel="stylesheet">
</head>
<body>
    
    <?php
    require '../conexao_db.php';
    session_start();
    
    if(isset($_GET['exit'])){
        session_destroy();
        header("Location: ../login.php");
    }
    
    $nusp = $_SESSION['professor'];
    
    
    $sql = "SELECT * FROM relatorio WHERE nusp_orientador = '$nusp' AND status = '0' OR status = '5'";
    $query = conectarDB()->query($sql);
    $numero_registros = $query->num_rows;
    
    if($numero_registros > 0){
        
        ?>
        
        <br><br>    
        Relatório dos seus alunos: 
        <table border="0">
            <tr>
                <td class="td">
                    Aluno
                </td>
                <td class="td">
                    NUSP
                </td>
                <td class="td">
                    Título do relatório
                </td>
                <td class="td">
                    Ano
                </td>
                <td class="td">
                    Semestre
                </td>
                <td class="td">
                    Segunda tentativa
                </td>
            </tr>
            
            <?php
            
            while($dados = $query->fetch_array()){
                $id_relatorio = $dados['id_relatorio'];
                $nusp_aluno = $dados['nusp_aluno'];
                $titulo_relatorio = $dados['titulo_relatorio'];
                $ano_relatorio = $dados['ano_relatorio'];
                $semestre_relatorio = $dados['semestre_relatorio'];
                $segunda_tentativa = $dados['segunda_tentativa'];
                
                $sql2 = "SELECT * FROM usuarios WHERE nusp = '$nusp_aluno'";
                $dados2 = conectarDB()->query($sql2)->fetch_array();
                $nome_aluno = $dados2['nome_usuario'];
                ?>
                <tr class="tr">
                    
                    <td class="td">
                        <?php echo $nome_aluno; ?>
                    </td>
                    <td class="td">
                        <?php echo $nusp_aluno; ?>
                    </td>
                    <td class="td">
                        <a href="exibe_relatorio.php?i=<?php echo $id_relatorio; ?>">
                            <?php echo $titulo_relatorio; ?>
                        </a>
                    </td>
                    <td class="td">
                        <?php echo $ano_relatorio; ?>
                    </td>
                    <td class="td">
                        <?php echo $semestre_relatorio; ?>
                    </td>
                    <td class="td">
                        <?php 
                        if($segunda_tentativa == "0")
                            echo "Não";
                        else echo "Sim";
                        ?>
                    </td>
                    
                </tr>
                <?php
            }
        } else {
            echo "Não há relatórios de orientador";
        }
        ?>
    </table>
    
    
    
    
    <?php
    $sql = "SELECT * FROM relatorio WHERE nusp_parecerista = '$nusp' AND status = '1'";
    $query = conectarDB()->query($sql);
    $numero_registros = $query->num_rows;
    
    if($numero_registros > 0){
        
        ?>
        
        <br><br>
        Relatórios de parecerista:
        <table border="0">
            <tr>
                <td class="td">
                    Aluno
                </td>
                <td class="td">
                    NUSP
                </td>
                <td class="td">
                    Título do relatório
                </td>
                <td class="td">
                    Ano
                </td>
                <td class="td">
                    Semestre
                </td>
                <td class="td">
                    Segunda tentativa
                </td>
            </tr>
            
            <?php
            
            while($dados = $query->fetch_array()){
                $id_relatorio = $dados['id_relatorio'];
                $nusp_aluno = $dados['nusp_aluno'];
                $titulo_relatorio = $dados['titulo_relatorio'];
                $ano_relatorio = $dados['ano_relatorio'];
                $semestre_relatorio = $dados['semestre_relatorio'];
                $segunda_tentativa = $dados['segunda_tentativa'];
                
                $sql2 = "SELECT * FROM usuarios WHERE nusp = '$nusp_aluno'";
                $dados2 = conectarDB()->query($sql2)->fetch_array();
                $nome_aluno = $dados2['nome_usuario'];
                ?>
                <tr class="tr">
                    
                    <td class="td">
                        <?php echo $nome_aluno; ?>
                    </td>
                    <td class="td">
                        <?php echo $nusp_aluno; ?>
                    </td>
                    <td class="td">
                        <a href="exibe_relatorio.php?i=<?php echo $id_relatorio; ?>">
                            <?php echo $titulo_relatorio; ?>
                        </a>
                    </td>
                    <td class="td">
                        <?php echo $ano_relatorio; ?>
                    </td>
                    <td class="td">
                        <?php echo $semestre_relatorio; ?>
                    </td>
                    <td class="td">
                        <?php 
                        if($segunda_tentativa == "0")
                            echo "Não";
                        else echo "Sim";
                        ?>
                    </td>
                    
                </tr>
                <?php
            }
        }else{
            echo "<br><br>Não há relatórios de parecerista";
        }
        ?>
    </table>
    
    
</body>
</html>