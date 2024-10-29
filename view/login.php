<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="./favicon.png" type="image/png">
    <title>Doceria Dark Moon - Login</title>   
    <link rel="stylesheet" href="../css/estilo.css">
</head>
<body>
    <div class="geral">
        <div class="topo">
            <div class="logo">
                <img src="../img/logo.png" alt="Doceria Dark Moon">
            </div>
            <div class="texto-topo">
                <h1>Doceria Dark Moon - Login</h1>
                <p>Faça login para acessar o sistema.</p>
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
                <h2>Login</h2>
                <form id="formulario-login" method="post" action="../controller/loginBO.php">
                    <label for="usuario">Usuário:</label>
                    <input type="text" id="usuario" name="usuario">
                    <br><br>
                    <label for="senha">Senha:</label>
                    <input type="password" id="senha" name="senha">
                    <br><br>
                    <input type="submit" name="btnlogin" value="Login"/>
                    <input type="reset" name="btncancelar" value="Cancelar"/>
                </form>
                <p>Não possui conta? <a href="#">Cadastre-se</a></p>
            </div>
        </div>
        <div class="rodape">
            <p>&copy; 2023 Doceria Dark Moon. Todos os direitos reservados.</p>
        </div>
    </div>
</body>
</html>
