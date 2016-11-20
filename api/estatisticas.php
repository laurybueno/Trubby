<?php

/*
 * Recebe comandos relacionados a relatórios e estatísticas a serem computadas pela API Trubby.
 
  *	******GET********
		entrada: id_usuario
		saída: JSON com status (verde, amarelo e vermelho) de todos os itens de estoque atualmente em uso por itens de cardápio

 */

require_once("functions.inc.php");
require_once("connection.php");


// ****************************************************************************
// Checa qual o tipo de requisição recebida e encaminha o comando para a função adequada
// ****************************************************************************
switch ($_SERVER['REQUEST_METHOD']) {
    case 'GET':
        lista();
        break;
    
    default:
        requisicao_incorreta();
        break;
}

// Encerra a execução da API após o disparo de uma função.
die();


// ****************************************************************************
// GET: retorna status de todos os itens de estoque relevantes para o cardapio atual
// ****************************************************************************
function lista(){
    
    // Encontra todos os itens de cardapio
    
    
    // Prepara lista com características relevantes dos itens de estoque ligados ao cardápio atual
    // Infos a guardar: id_produto, nome, nivel de alerta, quantidade que ainda pode ser produzida, id_produto da ficha técnica relacionada (se houver), e nome da ficha técnica relacionada (se houver)
    
    
    // Encontra os itens de cardapio que são diretamente de estoque e coloca suas quantidades disponíveis na lista
    
    
    // Faz o loop de exaustão de ingredientes nas fichas técnicas encontradas
    
    
        // A cada nova ficha, ele tenta exaurir todos os ingredientes sequencialmente em um loop baseado na receita
        
        // Quando um ingrediente é exaurido, o loop para e a ficha é registrada com a quantidade que ainda pode ser produzida
        
        
    // Com todos os itens relevantes listados e suas quantidadades máximas de produção, 
    
    
    
    
}


?>