<?php
        require_once ('../controller/ConexaoBanco.php');
        require_once ('../model/Pessoa.php');
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

            function RetornarValorMax($sQL)
            {
                try 
                {
                    $banco = ConectarBanco();
                    $listar = $banco->prepare($sQL);
                    $listar->execute();
                    if($listar->rowCount() > 0)
                    {
                        foreach ($listar as $value) {
                            return $value[0];
                        }
                    }
                }                    
                catch(PDOException $erro)
                {
                    echo "Erro: ".$erro->getMessage();      
                }
            }
            
            function CadastrarPessoa(Pessoa $PessoaOp)
            {                    
                    try
                    {  
                        $banco = ConectarBanco();
                        $sql = $banco->prepare("insert into tab_pessoa (id_pessoa ,nome_pessoa, status_pessoa, rg_pessoa, cpf_pessoa, num_telefone, dataCadastro_pessoa)
                                    values (:id, :nome, :status, :rg, :cpf, :nTelefone, now() )");
                        $sql->bindValue(':id',RetornarValorMax("SELECT max(id_pessoa) FROM tab_pessoa")+1,PDO::PARAM_INT);
                        $sql->bindValue(':nome',$PessoaOp->GetNome(),PDO::PARAM_STR);
                        $sql->bindValue(':status',$PessoaOp->GetIdTipoCadastro(),PDO::PARAM_INT);
                        $sql->bindValue(':rg',$PessoaOp->GetRG(),PDO::PARAM_INT);
                        $sql->bindValue(':cpf',$PessoaOp->GetCPF(),PDO::PARAM_STR);
                        $sql->bindValue(':nTelefone',$PessoaOp->GetNuTelefone(),PDO::PARAM_STR);
                        $sql->execute();
                        if($PessoaOp->GetIdTipoCadastro() == "2")
                        {
                            $sql2 = $banco->prepare("insert into tab_aluno (id_aluno, cod_pessoa, cod_curso, cod_semestre)
                                            values (:idAluno, :id, :idCurso, :codSemestre)");
                            $sql2->bindValue('idAluno',RetornarValorMax("SELECT max(id_aluno) FROM tab_aluno")+1,PDO::PARAM_INT);
                            $sql2->bindValue('id',RetornarValorMax("SELECT max(id_pessoa) FROM tab_pessoa"),PDO::PARAM_INT);
                            $sql2->bindValue('idCurso',$PessoaOp->GetCursoAluno(),PDO::PARAM_INT);
                            $sql2->bindValue('codSemestre',1,PDO::PARAM_INT);
                            $sql2->execute();
                        }   
                    }
                    catch(PDOException $erro)
                    {
                        echo "Erro: ".$erro->getMessage();		
                    }
            }
?>
