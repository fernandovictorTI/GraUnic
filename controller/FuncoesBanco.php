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
                        $sql = $banco->prepare("insert into tab_pessoa (id_pessoa ,nome_pessoa, status_pessoa, rg_pessoa, cpf_pessoa, num_telefone, dataCadastro_pessoa, senha_pessoa,email_pessoa)
                                    values (:id, :nome, :status, :rg, :cpf, :nTelefone, now(),123456, :emailPessoa )");
                        $sql->bindValue(':id',RetornarValorMax("SELECT max(id_pessoa) FROM tab_pessoa")+1,PDO::PARAM_INT);
                        $sql->bindValue(':nome',$PessoaOp->GetNome(),PDO::PARAM_STR);
                        $sql->bindValue(':status',$PessoaOp->GetIdTipoCadastro(),PDO::PARAM_INT);
                        $sql->bindValue(':rg',$PessoaOp->GetRG(),PDO::PARAM_INT);
                        $sql->bindValue(':cpf',$PessoaOp->GetCPF(),PDO::PARAM_STR);
                        $sql->bindValue(':nTelefone',$PessoaOp->GetNuTelefone(),PDO::PARAM_STR);
                        $sql->bindValue(':emailPessoa',$PessoaOp->GetEmail(),PDO::PARAM_STR);
                        $sql->execute();
                        $sql = null;
                        if($PessoaOp->GetIdTipoCadastro() == "2")
                        {
                            $sql = $banco->prepare("insert into tab_aluno (id_aluno, cod_pessoa, cod_curso, cod_semestre)
                                            values (:idAluno, :id, :idCurso, :codSemestre)");
                            $sql->bindValue(':idAluno',RetornarValorMax("SELECT max(id_aluno) FROM tab_aluno")+1,PDO::PARAM_INT);
                            $sql->bindValue(':id',RetornarValorMax("SELECT max(id_pessoa) FROM tab_pessoa"),PDO::PARAM_INT);
                            $sql->bindValue(':idCurso',$PessoaOp->GetCursoAluno(),PDO::PARAM_INT);
                            $sql->bindValue(':codSemestre',1,PDO::PARAM_INT);
                            $sql->execute();
                            $sql = null;
                        }
                        else
                        {
                            $lastID = RetornarValorMax("SELECT max(cod_professor) FROM tab_professor")+1;
                            foreach ($PessoaOp->GetLstDisciplinas() as $value) 
                            {
                                $sql = $banco->prepare("insert into tab_professor (cod_professor, cod_pessoa, cod_materia)
                                                        values (:idProfessor,:id,:idMateria)");
                                $sql->bindValue(':idProfessor',$lastID == null ? 1 : $lastID,PDO::PARAM_INT);
                                $sql->bindValue(':id',RetornarValorMax("SELECT max(id_pessoa) FROM tab_pessoa"),PDO::PARAM_INT);
                                $sql->bindValue(':idMateria',$value,PDO::PARAM_INT);
                                $sql->execute();
                                $sql = null;
                            }      
                        }
                        return true;   
                    }
                    catch(PDOException $erro)
                    {
                        echo "Erro: ".$erro->getMessage();		
                    }
            }

            function VerLogin($emailPessoa, $senhaPessoa)
            {
                try 
                {
                    $banco = ConectarBanco();
                    $sql = $banco->prepare("select id_pessoa from tab_pessoa where email_pessoa = :email_pessoa and senha_pessoa = :senha_pessoa");
                    $sql->bindValue(':email_pessoa',$emailPessoa,PDO::PARAM_STR);
                    $sql->bindValue(':senha_pessoa',$senhaPessoa,PDO::PARAM_INT);
                    $sql->execute();
                    if($sql->rowCount() > 0)
                    {
                        return $sql->fetchAll(PDO::FETCH_ASSOC);
                    } 
                } 
                catch(PDOException $erro)
                {
                    echo "Erro: ".$erro->getMessage();      
                }
            }
            
?>
