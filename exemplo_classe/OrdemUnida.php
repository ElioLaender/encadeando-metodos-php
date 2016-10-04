<?php

/**
 *
 * Classe de exemplo, na qual os métodos da mesma serão chamados de forma encadeada. 
 * @ Élio Laender
 *
 */


class OrdemUnida{

    private $nomePelotao,
	    $comandos = "",
	    #armazena as mensagens de notificação conforme resultado da validação. 
	    $notificacoes = "Notificações: <br/>",
	    #rebe o nome dos métodos executados
	    $historico = array(""), 
	    #incrementa percorrendo o vetor a cada chamada do método histórico
	    $contadora =0;
            

    #construtora
    function __construct($nomePelotao = "pelotão")
    {
    
        $this->nomePelotao = $nomePelotao;  

    }

    #armazena o histórico dos comandos realizados. 
    private function setHistorico($comando)
    {
    
    array_push($this->historico, $comando);

    }

    #Advertência que deve preceder um comando a ser executado pelo pelotão. 
    public function advertencia()
    {

    $this->setHistorico('advertência');
        $this->comandos .= "- Atenção ".$this->nomePelotao."!<br/>";
        return $this;

    }

    #inicia a marcha
    public function marche()
    {
    
    $this->setHistorico('marche');
        $this->comandos .= "- Marche!"."<br/>";      
        return $this;
    }

    #para a marcha instantes após o comando
    public function alto()
    {
    
    $this->setHistorico('alto');
        $this->comandos .= "- Alto!"."<br/>";
        return $this;
    }

    #Posição de sentido
    public function sentido()
    {

    $this->setHistorico('sentido');
        $this->comandos .= "- Sentido!"."<br/>";
        return $this;
    }

    #Posição de descansar. (Só pode ser realizado a partir da posição de sentido)
    public function descansar()
    {

    $this->setHistorico('descansar');
        $this->comandos .= "- Descansar!"."<br/>";
        return $this;
    }

    #Comando de à vontade. (Só pode ser realizado a partir da posição de descançar)
    public function aVontade()
    {

    $this->setHistorico('à vontade');
        $this->comandos .= "- À vontade!"."<br/>";
        return $this;

    }

 
    #Em posição de descansar, o pelotão dá um pulo fazendo um giro de 180 graus para esquerda, permanecendo em posição de descansar.
    public function frenteRetaguarda()
    {

    $this->setHistorico('frente retaguarda');
        $this->comandos .= "- Frente para a retaguarda!"."<br/>";
        return $this;

    }

    public function volver($direcao)
    {
            
      $this->setHistorico('volver');

          #utilizando o swit apenas para demonstrar que outras lógicas poderiam ser inseridas no case.
          switch ($direcao){

            case 'esquerda':
                 $this->comandos .= "- Esquerda volver!<br/>";break;
                case 'direita':
                 $this->comandos .= "- Direita volver!<br/>";break;
            case 'meia volta':
                 $this->comandos .= "- Meia volta volver!<br/>";break;
            default:
                 $this->comandos .= "- Impossível volver para ".$direcao."<br/>";break;

          }

        return $this;

    }

    
   #valida comandos de acordo com o pré-requisito
   private function validaComandos()
   {

    for($i = 0; $i < count($this->historico); $i++){
    
    	
         switch ($this->historico[$i]){

            case 'descansar':
                  if($this->historico[($i - 1)] != 'sentido')
                     $this->notificacoes .= "* Comando numero ".$i." [descansar] não pode ser executado, somente executado a partir de [sentido] <br/>";break;

                
            case 'à vontade':
                  if($this->historico[($i - 1)] != 'descansar')
                     $this->notificacoes .= "* Comando numero ".$i."  [à vontade] não pode ser executado, somente executado a partir de [descansar] <br/>";break;
	     
            case 'frente retaguarda':
		  if($this->historico[($i - 1)] != 'descansar')
		      $this->notificacoes .= "* Comando numero ".$i."  [frente retaguarda] não pode ser executado, somente executado a partir de [descansar] <br/>";break;
                  
         }

    }

    return $this->notificacoes;

   }
    

    #executa as instruções
    public function executar()
    {

    	return $this->comandos.
	       $this->validaComandos();

    }


}#encerra class











