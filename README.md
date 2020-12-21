<h1 align="center">
    <img alt="logo" title="#clicktocall" src=".github/logo.png" width="250px" />
</h1>

<h4 align="center">
   LinxSys
</h4>

  

  <img alt="License" src="https://img.shields.io/badge/license-MIT-brightgreen">
</p>

<p align="center">
  <a href="#-tecnologias">Tecnologias</a>&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;
  <a href="#-projeto">Projeto</a>&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;
  <a href="#-como-contribuir">Como contribuir</a>&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;
  <a href="#memo-licença">Licença</a>
</p>

<br>

## Tecnologias

Esse projeto foi desenvolvido com as seguintes tecnologias:

- [AGI Asterisk](https://www.voip-info.org/asterisk-agi/)
- [PHP](https://www.php.net/)
- [Postgres](https://www.postgresql.org/)
- [GoogleTTS](https://zaf.github.io/asterisk-googletts/)

##  Projeto

Click to Call

Esse script serve para voce fazer uma ligação através do AMI usando PHP, recebendo o numero e ramal via método POST, voce pode fazer a adaptação que achar necessaria, basta ter um conhecimento basico em PHP e asterisk, as aplicaçãoes são inumeras fica a seu critério.

=)

Bom vamos começar

Requisitos do projeto:

- Asterisk 

Será necessario uma configuração no arquivo "manager.conf" localido em "/etc/asterisk/".

Acrescentar um usuario e senha com algumas permissões para poder realizar as chamadas e/ou consultas.

EX.

[admin] // aqui será o usuario que voce vai criar.
secret=UMASENHA // aqui será a senha para o usuario que voce vai criar.
displayconnects=yes // Para mostrar as ações de conexão no CLI do asterisk.
;deny=0.0.0.0/0.0.0.0 // Negar todas as redes e/ou ip para poderão se comunicar com o AMI..
permit=0.0.0.0/0.0.0.0 // Pemitir quais redes e/ou ip poderão se comunicar com o AMI.
read=system,call,log,verbose,command,agent,user,config,command,dtmf,reporting,cdr,dialplan,originate,all // Permissões de leitura
write=system,call,log,verbose,command,agent,user,config,command,dtmf,reporting,cdr,dialplan,originate,all // Permissões de escrita
writetimeout=5000 // Tempo que o AMI vai esperar pelo próximo comando.


- PHP

Mover o arquivo "ligar.php" para dentro de alguma pasta onde contenha seus códigos WEB, ou criar uma pasta separada para execução do mesmo (RECOMENDO).

Meu script fica dentro da pasta abaixo e o acesso via navegador fica com o link localhost/clicktocall/ligar.php

/var/www/html/clicktocall/

Pra teste uso o POSTMAN para fazer o post, mas voce pode fazer diretamente via URL dessa forma.

SEUIP/clicktocall/ligar.php?fone=XXXXXXXXXXX&ramal=XXXX


Fácil demais né =) Faça bom aproveito!


No meu Ambiente estou usando:

- Asterisk 13.27.0
- Php PHP 5.6.40



## Como contribuir

- Faça um fork desse repositório;

## :memo: Licença

Esse projeto está sob a licença MIT. Veja o arquivo [LICENSE](LICENSE.md) para mais detalhes.
