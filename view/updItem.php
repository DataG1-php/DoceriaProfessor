<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="./favicon.png" type="image/png">
    <title>Doceria Dark Moon</title>
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
                <h1>Doceria Dark Moon</h1>
                <p>Artigos gourmet e doces deliciosos</p>
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
                <h2>Alteração de Itens para receita</h2>
                <form action="../controller/itemBO.php" method="post">
                    <?php 
                        include_once '../model/database/ItemDAO.php';
                        $dao = new ItemDAO();
                        $lista = $dao->list($_REQUEST['iditem']);
                        foreach ($lista as $value) {
                    ?>
                    <label>Ingrediente selecionado:</label>
                    <input type="text" name="txtingrediente" value="<?php echo $value->descricao;?>" disabled/>
                    
                    <br><br>
                    <label for="texto">Nome do item:</label>
                    <input type="text" id="texto" name="txtnome" value="<?php echo $value->nome;?>">
                    <br><br>
                    <label for="data">Data de validade:</label>
                    <input type="date" id="data" name="data" value="<?php echo $value->validade;?>">
                    <br><br>
                    <label for="valor">Valor:</label>
                    <input type="number" id="valor" name="valor" step="0.01" value="<?php echo $value->valor;?>" placeholder="R$ 0,00">
                    <br><br>
                    <input type="hidden" name="acao" value="alterar"/>
                    <input type="hidden" name="iditem" value="<?php echo $value->iditem;?>"/>
                    <input type="hidden" name="idingredientes" value="<?php echo $value->idingredientes;?>"/>
                    <?php 
                        }
                    ?>
                    <br/>
                    <input type="submit" value="Alterar">
                    <input type="reset" value="Limpar">
                </form>
            </div>
        </div>
        <div class="rodape">
            <p>&copy; 2023 Doceria Dark Moon. Todos os direitos reservados.</p>
        </div>
    </div>
</body>
</html>