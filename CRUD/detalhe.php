<!DOCTYPE html>
<?php
include "classes/funcionario.php";

     /* Pagina de edição de dados do funcionário  */

$func = new funcionario();
$func->setId($_GET['fnc']);
$objeto = $func->findById();

foreach($objeto as $chave => $valor){
    $nfuncionario = new funcionario();
    $nfuncionario->setId($valor->id);
    $nfuncionario->setNome($valor->nome);
    $nfuncionario->setFone($valor->fone);
    $nfuncionario->setSalario($valor->salario);
}
?>

<html lang="pt">
<head>
  <title>Cadastro de Funcionarios</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2>Alteração de Cadastro de Funcionários</h2>
  <form name='f1' id='f1' method='post' action="alterarFuncionario.php">
    <div class="form-group">
      <label for="nome">Nome:</label>
      <input type="text" class="form-control" id="nome" name="nome" value="<?php echo $nfuncionario->getNome();?>">
    </div>
    <div class="form-group">
      <label for="fone">Fone:</label>
      <input type="number" class="form-control" id="fone" name="fone" value="<?php echo $nfuncionario->getFone();?>">
    </div>
    <div class="form-group">
      <label for="salario">Salário:</label>
      <input type="number" step="0.01" class="form-control" id="salario" name="salario" value="<?php echo $nfuncionario->getSalario();?>" min=1>
    </div>
    <div class="form-group">
        <input type="hidden" id="funId" name="funId" value="<?php echo $nfuncionario->getId();?>">
    </div>
    <div class="form-group">
        <input type="submit" class="btn btn-primary" value="Enviar" />
    </div>
    
  </form>
</div>
</body>
</html>
