<?php
	require_once ('../dados/ConexaoBanco.php');
	
	function ListarDados()
	{
		$banco = ConectarBanco();
		try
		{
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