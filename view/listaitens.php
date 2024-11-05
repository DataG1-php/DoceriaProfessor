<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="./favicon.png" type="image/png">
    <title>Doceria Dark Moon - Lista de Itens para Receita</title>
    <?php
        include_once '../model/Login.php';
        Login::verificaSessao();
    ?>
    <script type="text/javascript">
        function deletar(iditem){
            if(confirm('Deseja excluir o registro?')){
                document.location.href='../controller/itemBO.php?acao=deletar&iditem='+iditem;
            }
        }
    </script>    
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
                <h2>Lista de Itens para Receita</h2>
                <table>
                    <thead>
                        <tr>
                            <th>ID</th> 
                            <th>Item</th>
                            <th>Ingrediente</th>
                            <th>Validade</th>
                            <th>Valor</th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Dados da listagem -->
                        <?php
                            include_once '../model/database/ItemDAO.php';
                            $dao = new ItemDAO();
                            $lista = $dao->list();
                            foreach ($lista as $value) {
                                
                        ?>
                        <tr>
                            <td><?php echo $value->iditem;?></td>
                            <td><?php echo $value->nome;?></td>
                            <td><?php echo $value->descricao;?></td>
                            <td><?php echo $value->validade;?></td>
                            <td><?php echo $value->valor;?></td>
                            <td>
                                <button name="btnalterar" onclick="location.href='upditem.php?iditem=<?php echo $value->iditem;?>'">Alterar</button>
                            </td>
                            <td>
                                <button name="btnexcluir" onclick="javascript:deletar(<?php echo $value->iditem;?>)">Excluir</button>
                            </td>
                        </tr>
                        <?php
                            }
                        ?>
                    </tbody>
                </table>
                <button style="float: right" name="btncadingrediente" onclick="location.href='cadItem.php'">Cadastrar item</button>
            </div>
        </div>
        <div class="rodape">
            <p>&copy; 2023 Doceria Dark Moon. Todos os direitos reservados.</p>
        </div>
    </div>
</body>
</html>