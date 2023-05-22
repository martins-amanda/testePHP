<!DOCTYPE html>
<?php
include "classes/funcionario.php";
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
  <h2>Cadastro de Funcionários</h2>
  <form name='f1' id='f1' method='post' action="index.php">
    <div class="form-group">
      <label for="nome">Nome:</label>
      <input type="text" class="form-control" id="nome" name="nome" value="">
    </div>
    <div class="form-group">
      <label for="peso">Fone:</label>
      <input type="number" class="form-control" id="fone" name="fone" value="">
    </div>
    <div class="form-group">
      <label for="altura">Salário:</label>
      <input type="number" step="0.01" class="form-control" id="salario" name="salario" value="" min=1>
    </div>
    <div class="form-group">
        <input type="submit" class="btn btn-primary" value="Enviar" />
    </div>
  </form>
  
  <?php
  // Checando se existem valores para o cálculo
    if(isset($_POST['nome']) && isset($_POST['fone']) && isset($_POST['salario']) && $_POST['nome'] != "" && $_POST['fone'] != "" && $_POST['salario'] != ""){
        
        // Pegando os valores que chegaram pelo POST
        extract($_POST);
        
        // Sanitizando o nome
		$nome = filter_var($nome,FILTER_SANITIZE_STRING);
		
		// Instanciando um objeto funcionario
		$novo = new funcionario();
		$novo->setNome($nome);
		$novo->setFone($fone);
		$novo->setSalario($salario);
		$novo->insereFuncionario();
    } 

  ?>
  
  <h2>Funcionários Cadastrados</h2>
  <br>           
  <table class="table">
    <thead>
      <tr>
        <th>Ident #</th>
        <th>Nome</th>
        <th>Fone</th>
        <th>Salário</th>
        <th>Ação</th>
      </tr>
    </thead>
    <tbody>
        <?php
        $lista = new funcionario();
        $arr = $lista->findAll();
        $arrFuncionarios = array();
        
        foreach($arr as $chave => $valor){
            $objeto = new funcionario();
            $objeto->setId($valor->id);
            $objeto->setNome($valor->nome);
            $objeto->setFone($valor->fone);
            $objeto->setSalario($valor->salario);
            $arrFuncionarios[] = $objeto;
            
        };
        
        foreach($arrFuncionarios as $tmp){
            echo "<tr>";
                echo "<td>" . $tmp->getId() . "</td>";
                echo "<td>" . $tmp->getNome() . "</td>";
                echo "<td>" . $tmp->getFone() . "</td>";
                echo "<td>" . $tmp->getSalario() . "</td>";
                echo "<td><a href=detalhe.php?fnc=" . $tmp->getId() . ">Alterar</a> / <a href=excluirFuncionario.php?fnc=" . $tmp->getId() . ">Excluir</a></td>";
            echo "</tr>";    
        }
        

        ?>
    </tbody>
  </table>

</div>

</body>
</html>
