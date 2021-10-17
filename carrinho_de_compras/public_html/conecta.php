<?php 

$conexao = mysqli_connect('host_do_servidor', 'nome_do_banco', 'senha_do_banco') or die ('não foi possivel conectar');

$db = mysqli_select_db($conexao, 'nome_do-banco') or die ('não foi possivel conectar a base de dados');

?>