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
            array_push($this->lstDisciplinas,$disciplinas);
        }
        
        function GetLstDisciplinas()
        {
            return $this->lstDisciplinas;
        }
    }
?>