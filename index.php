<?php

include "exemplo_classe/OrdemUnida.php";

/**
 *
 * O encadeamento será realizado neste arquivo de teste.  
 * @ Élio Laender
 *
 */


$objOU = new OrdemUnida("Pelotão Alfa");

#Os métodos serão executados na ordem de chamada. 
$retorno = $objOU->advertencia()
	         ->marche()
	         ->advertencia()
	      	 ->alto()
	      	 ->advertencia()
	      	 ->volver('esquerda')
	      	 ->advertencia()
	      	 ->volver('meia volta')
	      	 ->aVontade()
	      	 ->descansar()
	      	 ->executar();


#exibindo na tela o resultado do encadeamento.
echo $retorno;
