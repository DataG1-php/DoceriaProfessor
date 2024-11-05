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
    <script type="text/javascript">
        function deletar(iditem,idreceita){
            if(confirm('Deseja excluir o registro?')){
                document.location.href='../controller/itemReceitaBO.php?acao=deletar&iditem='+iditem+'&idreceita='+idreceita;
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
                <?php include_once './menu.php'; ?>
            </div>
            <div class="conteudo">
                <h2>Listagem de Receitas e Itens</h2>
                <table id="tabela-receitas">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Receita</th>
                            <th>Itens</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody id="lista-receitas">
                        <!-- Receitas serão adicionadas dinamicamente aqui -->
                        <?php
                            include_once '../model/database/ItemReceitaDAO.php';
                            $dao = new ItemReceitaDAO();
                            $listareceita = $dao->list();
                            foreach ($listareceita as $valuereceita) {
                        ?>
                        <tr>
                            <td><?php echo $valuereceita->idreceita;?></td>
                            <td><?php echo $valuereceita->receita;?></td>
                            <td>
                                <table id="tabela-itens-receita">
                                    <thead>
                                        <tr>
                                            <th>Item</th>
                                            <th>Quantidade</th>
                                            <th>Ações</th>
                                        </tr>
                                    </thead>
                                    <tbody id="lista-itens-receita">
                                        <!-- Itens serão adicionados dinamicamente aqui -->
                                        <?php
                                            include_once '../model/database/ItemDAO.php';
                                            $dao = new ItemDAO();
                                            $listaitem = $dao->list($valuereceita->iditem);
                                            foreach ($listaitem as $valueItem) {
                                        ?>                                        
                                        <tr>
                                            <td><?php echo $valueItem->nome;?></td>
                                            <td><?php echo $valuereceita->quantidade;?></td>
                                            <td>
                                                <button class="excluir" name="btnexcluir" data-item="Item 1" onclick="javascript:deletar(<?php echo $valuereceita->iditem;?>,<?php echo $valuereceita->idreceita;?>)">Excluir</button>
                                            </td>
                                        </tr>
                                        <?php
                                            }
                                        ?>
                                    </tbody>
                                </table>
                            </td>
                            <td>
                                <button name="btnalterar" data-receita="Receita 1" onclick="location.href='updItemReceita.php?idreceita=<?php echo $valuereceita->idreceita;?>'">Alterar</button>
                            </td>
                        </tr>
                    <?php 
                            }
                    ?>
                    </tbody>
                </table>
                <button style="float: right" name="btncadingrediente" onclick="location.href='cadItemReceita.php'">Cadastrar</button>
            </div>
        </div>
        <div class="rodape">
            <p>&copy; 2023 Doceria Dark Moon. Todos os direitos reservados.</p>
        </div>
    </div>

    <script>
        window.addEventListener('load', () => {
            const listaReceitas = document.getElementById('lista-receitas');
            const listaItensReceita = document.getElementById('lista-itens-receita');

            // Adicionar evento de clique para botão Excluir
            listaItensReceita.addEventListener('click', (e) => {
                if (e.target.classList.contains('excluir')) {
                    const item = e.target.getAttribute('data-item');
                    const linha = e.target.parentNode.parentNode;
                    listaItensReceita.removeChild(linha);
                }
            });

            // Adicionar evento de clique para botão Alterar
            listaReceitas.addEventListener('click', (e) => {
                if (e.target.name === 'btnalterar') {
                    const receita = e.target.getAttribute('data-receita');
                    // Abrir formulário para alterar receita
                    console.log(`Alterar receita: ${receita}`);
                }
            });
        });
    </script>
</body>
</html>