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

/*
Saída:

- Atenção Pelotão Alfa!
- Marche!
- Atenção Pelotão Alfa!
- Alto!
- Atenção Pelotão Alfa!
- Esquerda volver!
- Atenção Pelotão Alfa!
- Meia volta volver!
- À vontade!
- Descansar!
Notificações: 
* Comando numero 9 [à vontade] não pode ser executado, somente executado a partir de [descansar] 
* Comando numero 10 [descansar] não pode ser executado, somente executado a partir de [sentido] 


*/
