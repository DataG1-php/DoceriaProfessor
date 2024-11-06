<?php

include_once '../model/ItemReceita.php';
include_once '../model/database/ItemReceitaDAO.php';

if (isset($_REQUEST['acao'])){
    
   $acao = $_REQUEST['acao']; 
    
    switch ($acao) {
        case 'inserir':
            if (isset($_POST['cbxreceita']) && 
                isset($_POST['cbxitem'])&&
                isset($_POST['quantidade'])&&
                !empty($_POST['quantidade'])){
                
                $dao = new ItemReceitaDAO();
                $objeto = new ItemReceita();
                $objeto->idreceita = $_POST['cbxreceita'];
                $objeto->iditem = $_POST['cbxitem'];
                $objeto->quantidade = $_POST['quantidade'];
             
                if($dao->insert($objeto)){
                    ?>
                    <script type="text/javascript">
                        alert('Item salvo com sucesso na receita.');
                        location.href = '../view/listaitemreceita.php';
                    </script>
                    <?php
                }else{
                    ?>
                    <script type="text/javascript">
                        alert('Problema ao salvar o item na receita');
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
            if (isset($_POST['idreceita']) && 
                isset($_POST['cbxitem'])&&
                isset($_POST['quantidade'])&&
                !empty($_POST['quantidade'])){
                
                $dao = new ItemReceitaDAO();
                $objeto = new ItemReceita();
                $objeto->idreceita = $_POST['idreceita'];
                $objeto->iditem = $_POST['cbxitem'];
                $objeto->quantidade = $_POST['quantidade'];
                try {
                    if($dao->update($objeto)){
                        ?>
                            <script type="text/javascript">
                                alert('Item alterado com sucesso na receita.');
                                location.href = '../view/listaitemreceita.php';
                            </script>
                        <?php
                        }
                } catch (Exception $exc) {
                    ?>
                        <script type="text/javascript">
                            alert('Problema ao alterar.\nEsse item já está vinculado a receita.');
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
            if (isset($_GET['iditem'])&&isset($_GET['idreceita'])){
                $dao = new ItemReceitaDAO();
                $iditem = $_GET['iditem'];
                $idreceita = $_GET['idreceita'];
                try{
                    if($dao->delete($iditem, $idreceita)){
                        ?>
                        <script type="text/javascript">
                            alert('Item excluído com sucesso da receita.');
                            location.href = '../view/listaitemreceita.php';
                        </script>
                        <?php
                    }    
                }
                catch (Exception $exc) {
                    ?>
                    <script type="text/javascript">
                        alert('Problema ao excluir o item.\nHá um registro filho localizado.');
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