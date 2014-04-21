<?php
        require_once ('../controller/ConexaoBanco.php');
            function ListarDadosArray($sQL)
            {                    
                    try
                    {
                        $banco = ConectarBanco();
                        $listar = $banco->prepare($sQL);
                        $listar->execute();
                        if($listar->rowCount() > 0)
                        {
                            return $listar->fetchAll(PDO::FETCH_ASSOC);
                        }
                    }
                    catch(PDOException $erro)
                    {
                        echo "Erro: ".$erro->getMessage();		
                    }
            } 
?>
