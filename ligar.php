<?php
//RECEBENDO NUMERO

$asterisk_ip = "0.0.0.0"; // IP do servidor
$user_manager = "USUARIO"; // Usuario do manager.conf
$senha_manager = "SENHA"; // Senha usuario manager.conf
//$channel = "SIP/7000"; // Canal interno que irá receber a chamada, fixado manualmente.
$channel = $_GET['ramal']; // Canal interno que irá receber a chamada, vindo do POST.
//$num = "41985365855"; // Numero para discagem fixado manualmente.
$num = $_GET['fone']; // Numero para discagem, vindo do POST.
$context = "from-internal"; // Seu contexto de chamadas

//FAZENDO CONEXAO COM ASTERISK
$socket = fsockopen($asterisk_ip,"5038", $errno, $errstr, 10);
if (!$socket){
   echo "$errstr ($errno)\n";
}else{
       fputs($socket, "Action: Login\r\n");
       fputs($socket, "UserName: ".$user_manager."\r\n");
       fputs($socket, "Secret: ".$senha_manager."\r\n\r\n");
       //ORIGINANDO A CHAMADA
       fputs($socket, "Action: Originate\r\n" );
       fputs($socket, "Channel: SIP/".$channel."\r\n" );
       fputs($socket, "Exten: ".$num."\r\n" );
	fputs($socket, "Callerid: ".$num."\r\n" );
       fputs($socket, "Context: ".$context."\r\n" );
       fputs($socket, "Priority: 1\r\n" );
       fputs($socket, "Async: yes\r\n\r\n" );
       fputs($socket, "Action: Logoff\r\n\r\n");
			
       /****************DEBUGAR*****************/
       while (!feof($socket)){
        $retorno[] = fgets($socket);
       }
        fclose($socket);
       }

//VERIFICANDO SE TEM ALGUM ERRO
  $result = '';
  for ($i=0; $i < count($retorno) ; $i++) { 
   $result = (preg_match("/Response: Error/",$retorno[$i]))?'erro':$result;
   echo $retorno[$i]."<br/>"; //para debugar
  }
 if($result == "erro"){
  echo "Não foi possível efetuar a ligação";
 }else{
  echo "Aguarde o retorno da chamada";
 }

?>