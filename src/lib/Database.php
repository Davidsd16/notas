<?php

namespace David\Notas\lib;
use PDO;
use PDOException;

class Database{

    private string $host;
    private string $db;
    private string $user;
    private string $password;
    private string $charset;

    // Constructor de la clase Database
    public function __construct()
    {
        // Configuración predeterminada para la conexión a la base de datos
        $this->host = 'localhost';
        $this->db = 'notas';
        $this->user = 'root';
        $this->password = 'root';
        $this->charset = 'utf8mb4';

    }

    // Método para conectar a la base de datos
    public function connect(){
        try {
            // Configuración de la cadena de conexión
            $connection = "mysql:host={$this->host}; dbname={$this->db}; charset={$this->charset}";
            // Opciones de configuración para la conexión PDO
            $options = [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_EMULATE_PREPARES => false
            ];
            // Crear una instancia de PDO para la conexión
            $pdo = new PDO($connection, $this->user, $this->password, $options);
            // Devolver la instancia de PDO
            return $pdo;

        } catch (PDOException $th) {
            throw $th;
        }
    }

}
