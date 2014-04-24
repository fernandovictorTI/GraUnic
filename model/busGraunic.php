<?php
	require_once ('../controller/FuncoesBanco.php');
            function ListarLov($sQL)
            {                   
              return ListarDadosArray($sQL);
            }

            function CadastrarAluno()
            {
            	CadastrarPessoa();
            }
?>
