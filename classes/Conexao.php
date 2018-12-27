<?php require_once 'global.php' ?>
<?php
class Conexao
{
    public static function pegarConexao()
    {
        $conexao = new PDO(DB_DRIVE .':host=' . DB_HOSTNAME . '; dbname=' . DB_DATABASE, DB_USERNAME, DB_PASSWORD);
        $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $conexao;
    }
}

// Para o nosso caso, utilizaremos PDO::ATTR_ERRMODE, que contém três opções de erro:
// O mais adequado  no site: http://php.net/manual/pt_BR/pdo.setattribute.php
// PDO::ERRMODE_SILENT
// PDO::ERRMODE_WARNING
// PDO::ERRMODE_EXCEPTION