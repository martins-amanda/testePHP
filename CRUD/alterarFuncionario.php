<?php
    include 'classes/funcionario.php';

     /* chamada do botão alterar  */


    $novo = new funcionario();
    $novo->setId($_POST['funId']);
    $novo->setNome($_POST['nome']);
    $novo->setFone($_POST['fone']);
    $novo->setSalario($_POST['salario']);
    $novo->alteraFuncionario();
    header("Location: index.php");
?>