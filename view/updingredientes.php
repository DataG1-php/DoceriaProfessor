<!-- cadastro.html -->
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" href="./favicon.png" type="image/png">
  <title>Alteração - Doceria Dark Moon</title>
  <link rel="stylesheet" href="../css/estilo.css">
</head>
<body>
  <div class="geral">
    <div class="topo">
      <div class="logo">
        <img src="../img/logo.png" alt="Doceria Dark Moon">
      </div>
      <div class="texto-topo">
        <h1>Doceria Dark Moon</h1>
        <p>Artigos gourmet e doces deliciosos</p>
      </div>
    </div>
    <div class="menu-horizontal">
        <?php
            include_once './menulateral.php';
        ?>
    </div>
    <div class="container">
      <div class="menu-lateral">
        <?php
          include_once './menu.php';
        ?>
      </div>      
        <div class="conteudo">
          <h2>Alteração de ingredientes</h2>
          <form action="../controller/ingredienteBO.php" method="post">
          <?php
            include_once '../model/database/IngredienteDAO.php';
            $dao = new IngredienteDAO();
            $id = $_GET['idingredientes'];
            $lista = $dao->list($id);
            foreach ($lista as $value) {
          ?>
          <label>Nome:</label>
          <input type="text" name="txtnome" value="<?php echo $value->descricao;?>"><br><br>
          <input type="hidden" name="acao" value="alterar"/>
          <input type="hidden" name="idingredientes" value="<?php echo $value->idingredientes;?>"/>
          <input type="submit" name="btnAlterar" value="Alterar"/>
          <input type="reset" name="btnLimpar" value="Limpar"/>
        <?php 
            }
        ?>
        </form>
      </div>
    </div>
    <div class="rodape">
      <p>&copy; 2023 Doceria Dark Moon. Todos os direitos reservados.</p>
    </div>
  </div>
</body>
</html>