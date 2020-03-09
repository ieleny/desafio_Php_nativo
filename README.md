# desafio_Php_nativo

# Como executar

1 - Executar os scripts que está na pasta script</br>
2 - Dê um composer Install</br>
3 - Modifique a conexão do banco no seguinte caminho util/connection.php</br>

Acesse no localhost esse link:</br>
http://localhost/desafio_Php_nativo/

# Servidor Apache 

Foi utilizado a URL amigavel, então é preciso seguir alguns passos. 

1 - Abrir o arquivo httpd.conf
E localizar essa linha #LoadModule rewrite_module modules/mod_rewrite.so
Nessa linha retire o #(cerquilha)

# Tecnologias

 - PHP NATIVO Versão 7.2<br>
 - Composer 
 - PDO
 - JQUERY
 - AJAX

# Banco de Dados

Foi utilizado o MySql (MariaDb), scripts no pasta <b> script </b>

# CARREGAR CLASSES NO COMPOSER (Autoload)

Executar o comando: <b>composer dump-autoload -o </b>

