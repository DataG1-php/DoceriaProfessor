<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="./favicon.png" type="image/png">
    <title>Doceria Dark Moon - Consulta</title>
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
                <h2>Cadastro de itens para receita</h2>
                <form id="formulario">
                    <label for="receita">Selecione uma receita:</label>
                    <select id="receita" name="receita">
                        <option value="opcao1">Opção 1</option>
                        <option value="opcao2">Opção 2</option>
                        <option value="opcao3">Opção 3</option>
                    </select>
                    <br><br>
                    <label for="item">Selecione um item:</label>
                    <select id="item" name="item">
                        <option value="opcao1">Opção 1</option>
                        <option value="opcao2">Opção 2</option>
                        <option value="opcao3">Opção 3</option>
                    </select>
                    <br><br>
                    <label for="quantidade">Quantidade:</label>
                    <input type="number" id="quantidade" name="quantidade">
                    <br><br>
                    <button type="button" name="btncadastrar">Adicionar</button>
                    <table id="tabela-itens">
                        <thead>
                            <tr>
                                <th>Item</th>
                                <th>Quantidade</th>
                                <th>Ações</th>
                            </tr>
                        </thead>
                        <tbody id="lista-itens">
                            <!-- Itens serão adicionados dinamicamente aqui -->
                        </tbody>
                    </table>
                    <button type="submit" id="enviar" name="btncadastrar" style="display: none;">Cadastrar</button>
                </form>
            </div>
        </div>
        <div class="rodape">
            <p>&copy; 2023 Doceria Dark Moon. Todos os direitos reservados.</p>
        </div>
    </div>

    <script>
        window.addEventListener('load', () => {
            const listaItens = document.getElementById('lista-itens');
            const formulario = document.getElementById('formulario');
            const botaoEnviar = document.getElementById('enviar');

            function adicionarItem(item, quantidade) {
                const linha = document.createElement('tr');
                linha.innerHTML = `
                    <td>${item}</td>
                    <td>${quantidade}</td>
                    <td>
                        <button class="excluir" name="btnexcluir" data-item="${item}">Excluir</button>
                    </td>
                `;

                linha.querySelector('.excluir').addEventListener('click', () => {
                    listaItens.removeChild(linha);
                    verificarItens();
                });

                listaItens.appendChild(linha);
                verificarItens();
            }

            function verificarItens() {
                if (listaItens.childElementCount > 0) {
                    botaoEnviar.style.display = 'block';
                } else {
                    botaoEnviar.style.display = 'none';
                }
            }

            document.querySelector('button[name="btncadastrar"]').addEventListener('click', (e) => {
                const item = document.getElementById('item').value;
                const quantidade = document.getElementById('quantidade').value;

                if (item && quantidade) {
                    adicionarItem(item, quantidade);
                    document.getElementById('item').value = '';
                    document.getElementById('quantidade').value = '';
                }
            });

            formulario.addEventListener('submit', (e) => {
                e.preventDefault();
                // Enviar dados para backend aqui
                console.log('Enviar dados para backend');
            });
        });
    </script>
</body>
</html>