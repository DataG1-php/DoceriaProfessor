<?php
include_once '../model/Item.php';
include_once '../model/database/ItemDAO.php';

if (isset($_REQUEST['acao'])){
    
   $acao = $_REQUEST['acao']; 
    
    switch ($acao) {
        case 'inserir':
            if (isset($_POST['combo']) && 
                isset($_POST['txtnome'])&&
                !empty($_POST['txtnome'])&&
                isset($_POST['data'])&&
                isset($_POST['valor'])){
                
                $dao = new ItemDAO();
                $objeto = new Item();
                $objeto->nome = $_POST['txtnome'];
                $objeto->validade = $_POST['data'];
                $objeto->valor = $_POST['valor'];
                $objeto->idingredientes = $_POST['combo'];

                if($dao->insert($objeto)){
                    ?>
                    <script type="text/javascript">
                        alert('Item salvo com sucesso.');
                        location.href = '../view/listaitens.php';
                    </script>
                    <?php
                }else{
                    ?>
                    <script type="text/javascript">
                        alert('Problema ao salvar o item');
                        history.go(-1);
                    </script>
                    <?php
                }
            }else{
                ?>
                    <script type="text/javascript">
                        alert('Prencha os campos adequadamente.');
                        history.go(-1);
                    </script>
                <?php
            }
            break;
        case 'alterar':
            if (isset($_POST['combo']) && 
                isset($_POST['txtnome'])&&
                !empty($_POST['txtnome'])&&
                isset($_POST['data'])&&
                isset($_POST['valor'])&&
                isset($_POST['iditem'])){
                
                $dao = new ItemDAO();
                $objeto = new Item();
                $objeto->nome = $_POST['txtnome'];
                $objeto->validade = $_POST['data'];
                $objeto->valor = $_POST['valor'];
                $objeto->idingredientes = $_POST['combo'];
                $objeto->iditem = $_POST['iditem'];
                
                    if($dao->update($objeto)){
                    ?>
                        <script type="text/javascript">
                            alert('Item alterado com sucesso.');
                            location.href = '../view/listaitens.php';
                        </script>
                    <?php
                    }else{
                    ?>
                        <script type="text/javascript">
                            alert('Problema ao alterar o item');
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
            if (isset($_GET['iditem'])){
                $dao = new ItemDAO();
                $id = $_GET['iditem'];
                if($dao->delete($id)){
                    ?>
                    <script type="text/javascript">
                        alert('Item excluído com sucesso.');
                        location.href = '../view/listaitens.php';
                    </script>
                    <?php
                }else{
                    ?>
                    <script type="text/javascript">
                        alert('Problema ao excluir o item.');
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