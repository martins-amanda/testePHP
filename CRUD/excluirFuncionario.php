<?php
    include 'classes/funcionario.php';
     /* chamada do botão excluir  */


    $novo = new funcionario();
    $novo->setId($_GET['fnc']);
    $retorno = $novo->excluiFuncionario();
    header("Location: index.php");
?>