<?php
class Database
{
    private $servername = "localhost";
    private $username   = "root";
    private $password   = "root";
    private $dbname     = "proyecto_cv";
    public  $conn;

    public function __construct()
    {
        // Crear conexión
        $this->conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);

        // Verificar conexión
        if ($this->conn->connect_error) {
            die("Conexión fallida: " . $this->conn->connect_error);
        }
    }

    public function close()
    {
        $this->conn->close();
    }
}

// Usar la clase para la conexión
$db = new Database();
