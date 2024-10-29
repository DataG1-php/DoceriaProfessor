<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="./favicon.png" type="image/png">
    <title>Doceria Dark Moon - Lista de Itens para Receita</title>
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
                <h2>Lista de Itens para Receita</h2>
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Receita</th>
                            <th>Ingrediente</th>
                            <th>Quantidade</th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Dados da listagem -->
                        <tr>
                            <td>1</td>
                            <td>Receita 1</td>
                            <td>Ingrediente 1</td>
                            <td>10</td>
                            <td>
                                <button name="btnalterar" onclick="location.href='upditem.php'">Alterar</button>
                            </td>
                            <td>
                                <button name="btnexcluir">Excluir</button>
                            </td>
                        </tr>
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