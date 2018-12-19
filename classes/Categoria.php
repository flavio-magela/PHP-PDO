<?php
require_once 'classes/Conexao.php';

class Categoria
{

    public $id;
    public $nome;

    public function listar()
    {
        $query = "SELECT id, nome FROM categorias  ORDER BY id ASC";
        $conexao = conexao::pegarConexao();
        $resultado = $conexao->query($query);
        $lista = $resultado->fetchAll();
        return $lista;
    }
    public function inserir()
    {
        $query = "INSERT INTO categorias(nome) VALUES('". $this->nome ."')";
        $conexao = conexao::pegarConexao();
        $conexao->exec($query);

        /* O PDO::exec() retorna apenas um valor inteiro com o número de linhas afetadas pelo script que foi executado.  Como em um INSERT, UPDATE ou DELETE não trazem um resultado, usar o ->exec() aqui é o ideal...
        No caso de um SELECT, não existe manipulação de dados no Banco e sim, um retorno de uma consulta ($conexao->query($query)). 
        O método PDO::exec() não vai dar erro, mas não vai nos trazer o resultado.*/
    }
    public function carregar()
    {
        $query = "SELECT id, nome FROM categorias WHERE id = " . $this->id;
        $conexao = Conexao::pegarConexao();
        $resultado = $conexao->query($query);
        $lista = $resultado->fetchAll();
        foreach ($lista as $linha) {
            return $linha;
        }
    }


    public function atualizar()
    {
        $query = "UPDATE categorias set nome = ' . this->nome . ' WHERE id = " . $this->id;
        $conexao = Conexao::pegarConexao();
        $conexao->exec($query);
    }

}