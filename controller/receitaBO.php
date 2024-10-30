<?php
include_once '../model/Receita.php';
include_once '../model/database/ReceitaDAO.php';

if (isset($_REQUEST['acao'])){ //verifica se o hidden chegou

$acao = $_REQUEST['acao'];
    
    switch ($acao) {
        case 'inserir':
            //inserindo um ingrediente
            if (isset($_POST['txtnome']) && 
                !empty($_POST['txtnome'])){
                $dao = new ReceitaDAO();
                $objeto = new Receita();
                $objeto->nome = $_POST['txtnome'];

                if($dao->insert($objeto)){
                    ?>
                    <script type="text/javascript">
                        alert('Receita salva com sucesso.');
                        location.href = '../view/listareceita.php';
                    </script>
                    <?php
                }else{
                    ?>
                    <script type="text/javascript">
                        alert('Problema ao salvar a receita');
                        history.go(-1);
                    </script>
                    <?php
                }
            }else{
                ?>
                    <script type="text/javascript">
                        alert('Prencha o campo adequadamente.');
                        history.go(-1);
                    </script>
                <?php
            }
            break;
        case 'alterar':
            if (isset($_POST['idreceita'])
                && isset($_POST['txtnome'])
                && !empty($_POST['txtnome'])){
                    $dao = new ReceitaDAO();
                    $objeto = new Receita();
                    $objeto->idreceita = $_POST['idreceita'];
                    $objeto->nome = $_POST['txtnome'];
                    if($dao->update($objeto)){
                    ?>
                        <script type="text/javascript">
                            alert('Receita alterada com sucesso.');
                            location.href = '../view/listareceita.php';
                        </script>
                    <?php
                    }else{
                    ?>
                        <script type="text/javascript">
                            alert('Problema ao alterar a receita');
                            history.go(-1);
                        </script>    
                    <?php
                    }
                }else{
                ?>
                    <script type="text/javascript">
                        alert('Prencha o campo adequadamente.');
                        history.go(-1);
                    </script>
                <?php
                }
            break;
        case 'deletar':
            if (isset($_GET['idreceita'])){
                $dao = new ReceitaDAO();
                $id = $_GET['idreceita'];
                if($dao->delete($id)){
                    ?>
                    <script type="text/javascript">
                        alert('Receita excluída com sucesso.');
                        location.href = '../view/listareceita.php';
                    </script>
                    <?php
                }else{
                    ?>
                    <script type="text/javascript">
                        alert('Problema ao excluir a receita.');
                        history.go(-1);
                    </script>
                    <?php
                }
            }
            break;
        default:
            break;

            }        
}       

?>