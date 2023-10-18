<?php
class DatabaseDestino {
    
    private $ip_destino;
    private $caminho_destino;
    private $usuario_destino;
    private $senha_destino;
    private $conn;

    public function __construct($ip, $caminho, $usuario, $senha) {
        $this->ip_destino = $ip;
        $this->caminho_destino = $caminho;
        $this->usuario_destino = $usuario;
        $this->senha_destino = $senha;
    }

    public function connectDestino() {
        try {
            $this->conn = new PDO("firebird:dbname={$this->ip_destino}:{$this->caminho_destino}", $this->usuario_destino, $this->senha_destino, [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
            ]);
            return $this->conn;
        } catch (PDOException $e) {
            die("Erro na conexão com o banco de dados: " . $e->getMessage());
        }
    }

    public function closeDestino() {
        $this->conn = null;
    }
}

?>




