<!-- cadastro.html -->
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" href="./favicon.png" type="image/png">
  <title>Cadastro - Doceria Dark Moon</title>
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
          <h2>Alteração de receitas</h2>
          <form action="#" method="post">
          <label>Nome:</label>
          <input type="text" name="txtnome"><br><br>
          <input type="hidden" name="acao" value="inserir"/>
          <input type="submit" name="btnCadastrar" value="Alterar"/>
          <input type="reset" name="btnLimpar" value="Limpar"/>
        </form>
      </div>
    </div>
    <div class="rodape">
      <p>&copy; 2023 Doceria Dark Moon. Todos os direitos reservados.</p>
    </div>
  </div>
</body>
</html>
