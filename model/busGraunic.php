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

            function BsContemDados($sQL)
            {
              $valor = ListarDadosArray($sQL);
              foreach ($valor as $value) 
              {
                return $value["count(id_pessoa)"];
              }
            }

            function VerificaLogin($emailPessoa, $senhaPessoa)
            {
              $valor = VerLogin($emailPessoa, $senhaPessoa);
              if(count($valor) > 0)
              {
                foreach ($valor as $value) 
                {
                  return $value["id_pessoa"];
                }
              }
              else
              {
                return 0;
              }
            }

            function RetornaDadosPessoa($id_pessoa)
            {
              return ListarDadosArray("select * from tab_pessoa where id_pessoa = $id_pessoa");
            }
?>
