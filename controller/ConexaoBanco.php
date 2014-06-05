<?php
        define('HOST','localhost');
	define('USER','root');
	define('PASS','');
	define('DB','GU');
	function ConectarBanco()
	{	
            $dsn = "mysql:host=".HOST.";dbname=".DB.";charset=utf8";		
            try
            {
		$conectar = new PDO($dsn,USER,PASS);
		$conectar->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$conectar->exec("SET CHARACTER SET utf8");
		return $conectar;
            }
            catch(PDOException $erro)
            {
		echo "Erro ao conectar ao banco ".$erro->getMessage();
            }
	}
?>
