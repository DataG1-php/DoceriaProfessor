<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="./favicon.png" type="image/png">
    <title>Doceria Dark Moon - Consulta</title>
    <?php
        include_once '../model/Login.php';
        Login::verificaSessao();
    ?>    
    <link rel="stylesheet" href="../css/estilo.css">
</head>
<body>
    <div class="geral">
        <div class="topo">
            <div class="logo">
                <img src="../img/logo.png" alt="Doceria Dark Moon">
            </div>
            <div class="texto-topo">
                <h1>Doceria Dark Moon - Consulta</h1>
                <p>Consulta de itens utilizados</p>
            </div>
        </div>
        <div class="menu-horizontal">
            <?php
                include_once 'menusuperior.php';
            ?>
        </div>
        <div class="container">
            <div class="menu-lateral">
            <?php
              include_once './menu.php';
            ?>
            </div>
            <div class="conteudo">
                <h2>Cadastro de itens para receita</h2>
                <form id="formulario" action="../controller/itemReceitaBO.php" method="post">
                    <label for="receita">Receita selecionada:</label>
                        <?php
                            include_once '../model/database/ReceitaDAO.php';
                            $dao = new ReceitaDAO();
                            $lista = $dao->list($_GET['idreceita']);
                            foreach ($lista as $value) {
                        ?>
                        <input type="text" name="receita" value="<?php echo $value->nome;?>" disabled/>
                        <input type="hidden" name="idreceita" value="<?php echo $value->idreceita;?>"/>
                        <?php
                            }
                        ?>                    
                    <br><br>
                    <label for="item">Selecione um item:</label>
                    <select id="item" name="cbxitem">
                        <?php
                            include_once '../model/database/ItemDAO.php';
                            $dao = new ItemDAO();
                            $listaitem = $dao->list();
                            foreach ($listaitem as $valueItem) {
                        ?>                          
                        <option value="<?php echo $valueItem->iditem;?>" selected><?php echo $valueItem->nome;?></option>
                        <?php 
                            }
                        ?>
                    </select>
                    <br><br>
                    <label for="quantidade">Quantidade:</label>
                    <input type="number" id="quantidade" name="quantidade">
                    <br><br>
                    <button type="submit" name="btncadastrar">Alterar</button>
                    <input type="hidden" name="acao" value="alterar"/>
                </form>
            </div>
        </div>
        <div class="rodape">
            <p>&copy; 2023 Doceria Dark Moon. Todos os direitos reservados.</p>
        </div>
    </div>
</body>
</html>