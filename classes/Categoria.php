<?php require_once 'global.php' ?>
<?php
class Categoria
{

    public $id;
    public $nome;

    public function __construct($id = false){

        if ($id){

            $this->id = $id;
            $this->carregar();
        }
    }

    public static function listar()
    {
        
       // throw new Exception('Erro ao Listar Categorias');
        $query = "SELECT id, nome FROM categorias  ORDER BY nome ASC";
        $conexao = conexao::pegarConexao();
        $resultado = $conexao->query($query);
        $lista = $resultado->fetchAll();
        return $lista;
    }
    public function inserir()
    {
        $query = "INSERT INTO categorias(nome) VALUES(:nome)";
        $conexao = Conexao::pegarConexao();
        $stmt = $conexao->prepare($query);
        $stmt->bindValue(':nome', $this->nome);
        $stmt->execute(); 
        
    }

  public function carregar()
    {
        $query = "SELECT id, nome FROM categorias WHERE id = :id";
        $conexao = Conexao::pegarConexao();
        $stmt = $conexao->prepare($query);
        $stmt->bindValue(':id', $this->id);
        $stmt->execute();
        $linha = $stmt->fetch(); /* como percorre apenas 1 linha não precisa de usar
                                    o $lista = $stmt->fetchAll();
                                    foreach ($lista as $linha) {
                                        $this->nome = $linha['nome'];
                                        }*/
        $this->nome = $linha['nome'];
    }

    public function atualizar()
    {
        $query = "UPDATE categorias set nome = :nome WHERE id = :id";
        $conexao = Conexao::pegarConexao();
        $stmt = $conexao->prepare($query);
        $stmt->bindValue(':nome', $this->nome);
        $stmt->bindValue(':id', $this->id);
        $stmt->execute();
    }

    public function excluir()
    {
        $query = "DELETE FROM categorias WHERE id = :id";
        $conexao = Conexao::pegarConexao();
        $stmt = $conexao->prepare($query);
        $stmt->bindValue(':id', $this->id);
        $stmt->execute();
    }

}