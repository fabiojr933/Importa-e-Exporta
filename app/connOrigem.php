<?php
class DatabaseOrigem {
    
    private $ip_origem;
    private $caminho_origem;
    private $usuario_origem;
    private $senha_origem;
    private $conn;

    public function __construct($ip, $caminho, $usuario, $senha) {
        $this->ip_origem = $ip;
        $this->caminho_origem = $caminho;
        $this->usuario_origem = $usuario;
        $this->senha_origem = $senha;
    }

    public function connectOrigem() {
        try {
            $this->conn = new PDO("firebird:dbname={$this->ip_origem}:{$this->caminho_origem}", $this->usuario_origem, $this->senha_origem, [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
            ]);
            return $this->conn;
        } catch (PDOException $e) {
            die("Erro na conexão com o banco de dados: " . $e->getMessage());
        }
    }

    public function closeOrigem() {
        $this->conn = null;
    }
}

?>




