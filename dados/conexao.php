<?php
	class Conexao
	{
		private static $intance = null;
		private static $dbType = "mysql";
		private static $host = "localhost";
		private static $user = "root";
		private static $senha = "";
		private static $db = "gu";
		private static $persistent = false;
		private static tabelas = array(
			'lov_semestre' => 'lov_semestre',
			'lov_statuscurso' => 'lov_statuscurso',
			'lov_statuspessoa' => 'lov_statuspessoa',
			'tab_aluno' => 'tab_aluno',
			'tab_curso' => 'tab_curso',
			'tab_grade' => 'tab_grade',
			'tab_materia' => 'tab_materia',
			'tab_materiacursando' => 'tab_materiacursando',
			'tab_pessoa' => 'tab_pessoa',
			'tab_professor' => 'tab_professor',
			'tab_professormateria' => 'tab_professormateria',
		)
		
		public static function getInstance()
		{
			if(self::$persistent != false)
			{
				self::$persistent = true;
			}
			if(!isset(self::$instance))
			{
				try
				{
					self::$instance = new \PDO
						(
						self::$dbType . ':host=' . self::$host . ';dbname=' . self::$db
                        , self::$user
                        , self::$senha
                        , array(\PDO::ATTR_PERSISTENT => self::$persistent)
						);	
				}
				catch (\PDOException $ex)
				{
					exit ("Erro ao conectar com o banco de dados: " . $ex->getMessage());
				}
			}
			
			return self::$instance;
		}
		
		public static function close() 
		{
			if (self::$instance != null)
			{
				self::$instance = null;
			}
		}
		
		public static function getTabela($chave)
		{
			return self::$tabelas[$chave];
		}
	
	}
?>
