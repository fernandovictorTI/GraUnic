<?php
	require_once ('../controller/ConexaoBanco.php');
            function ListarDados()
            {                    
                    try
                    {
                        $banco = ConectarBanco();
                        $listar = $banco->query("SELECT * FROM LOV_SEMESTRE");
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