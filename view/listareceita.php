<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="./favicon.png" type="image/png">
    <title>Doceria Dark Moon - Lista de Receitas</title>
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
                <h2>Lista de Receitas</h2>
                <table id="tabela-itens">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nome</th>
                            <th>Descrição</th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Dados da listagem -->
                        <tr>
                            <td>1</td>
                            <td>Receita 1</td>
                            <td>Descrição da receita 1</td>
                            <td>
                                <button name="btnalterar" onclick="location.href='updreceita.php'">Alterar</button>
                            </td>
                            <td>
                                <button name="btnexcluir">Excluir</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <button style="float: right" name="btncadingrediente" onclick="location.href='cadreceita.php'">Cadastrar</button>
            </div>
        </div>
        <div class="rodape">
            <p>&copy; 2023 Doceria Dark Moon. Todos os direitos reservados.</p>
        </div>
    </div>
</body>
</html>