<?php
    class Pessoa
    {
        private $nome;
        private $idTipoCadastro;
        private $rg;
        private $cpf;
        private $numeroTelefone;
        private $lstDisciplinas = array();
        private $idCurso;
        private $email;
        private $codPriAula;
        private $codSegAula;
        
        function SetNome($nomePessoa)
        {
            $this->nome = $nomePessoa;
        }
        
        function GetNome()
        {
            return $this->nome;
        }
       
        function SetIdTipoCadastro($tipoCadastro)
        {
            $this->idTipoCadastro = $tipoCadastro;
        }
        
        function GetIdTipoCadastro()
        {
            return $this->idTipoCadastro;
        }
        
        function SetRG($rGeral)
        {
            $this->rg = $rGeral;
        }
        
        function GetRG()
        {
            return $this->rg;
        }
        
        function SetCPF($nCpf)
        {
            $this->cpf = $nCpf;
        }
        
        function GetCPF()
        {
            return $this->cpf;
        }
        
        function SetNuTelefone($nTelefone)
        {
            $this->numeroTelefone = $nTelefone;
        }
        
        function GetNuTelefone()
        {
            return $this->numeroTelefone;
        }
        
        function SetCursoAluno($idCursoAluno)
        {
            $this->idCurso = $idCursoAluno;
        }
        
        function GetCursoAluno()
        {
            return $this->idCurso;
        }
        
        function SetLstDisciplinas($disciplinas)
        {
            array_push($this->lstDisciplinas, $disciplinas);
        }
        
        function GetLstDisciplinas()
        {
            return $this->lstDisciplinas;
        }

        function SetEmail($emailPessoa)
        {
            $this->email = $emailPessoa;
        }
        
        function GetEmail()
        {
            return $this->email;
        }

        function SetCodPriAula($priAula)
        {
            $this->codPriAula = $priAula;
        }

        function GetCodPriAula()
        {
            return $this->codPriAula;
        }

        function SetCodSegAula($segAula)
        {
            $this->codSegAula = $segAula;
        }

        function GetCodSegAula()
        {
            return $this->codSegAula;
        }
    }
?>