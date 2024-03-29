<?php

namespace David\Notas\models;

use David\Notas\lib\Database;
use PDO;

class Note extends Database{

    public string $uuid; // Propiedad para almacenar el UUID único de la nota

    // Constructor de la clase Note que acepta el título y el contenido de la nota
    public function __construct(public string $title, public string $content)
    {
        // Llama al constructor de la clase padre (Database) para establecer la conexión a la base de datos
        parent::__construct();
        
        // Genera un UUID único para la nota
        $this->uuid = uniqid();
    }

    // Método para guardar la nota en la base de datos
    public function save()
    {
        // Prepara la consulta SQL para insertar la nota en la tabla 'notes'
        $query = $this->connect()->prepare("INSERT INTO notes(uuid, title, content, updated) VALUES(:uuid, :title, :content, NOW())");
        // Ejecuta la consulta SQL con los valores de la nota
        $query->execute(['title' => $this->title, 'uuid' => $this->uuid, 'content' => $this->content,]);
    }

    // Método para actualizar una nota en la base de datos
    public function update(){
        // Prepara la consulta SQL para actualizar la nota en la tabla 'notes'
        $query = $this->connect()->prepare("UPDATE notes SET title = :title, content = :content, updated = NOW() WHERE uuid = :uuid");
        // Ejecuta la consulta SQL con los nuevos valores del título y el contenido de la nota
        $query->execute(['title' => $this->title, 'uuid' => $this->uuid, 'content' => $this->content,]);
    }

    // Método estático para obtener una nota por su UUID desde la base de datos
    public static function get($uuid){
        // Crea una nueva instancia de Database para establecer la conexión a la base de datos
        $db = new Database;
        // Prepara la consulta SQL para seleccionar la nota con el UUID proporcionado
        $query = $db->connect()->prepare("SELECT * FROM notes WHERE uuid = :uuid");
        // Ejecuta la consulta SQL con el UUID como parámetro
        $query->execute(['uuid' => $uuid]);
        // Crea una nueva instancia de Note con los datos obtenidos de la base de datos
        $note = Note::createFromArray($query->fetch(PDO::FETCH_ASSOC));
        // Devuelve la not creada
        return $note;
    }

    // Función estática para obtener todas las notas de la base de datos
    public static function getAll()
    {  
         // Inicializa un array para almacenar las notas
        $notes = []; 
         // Crea una instancia de la clase Database
        $db = new Database;
        // Realiza una consulta SQL para seleccionar todas las notas
        $query = $db->connect()->query("SELECT * FROM notes");

        // Recorre los registros devueltos por la consulta
        while ($record = $query->fetch(PDO::FETCH_ASSOC)) {
            // Crea un objeto Note a partir de cada registro y lo agrega al array de notas
            $note = Note::createFromArray($record);
            array_push($notes, $note);
        }

        return $notes; // Devuelve el array de notas
    }

    // Método estático para crear una instancia de Note a partir de un array de datos
    public static function createFromArray($arr): ?Note {
        if (!is_array($arr) || !isset($arr['title']) || !isset($arr['content'])) {
            return null; // Devuelve null si el array no es válido o falta información
        }

        // Crea una nueva instancia de Note con el título y el contenido del array
        $note = new Note($arr['title'], $arr['content']);
        
        // Establece el UUID de la nota con el valor del array si existe
        if (isset($arr['uuid'])) {
            $note->setUuid($arr['uuid']);
        }

        return $note; // Devuelve la nota creada
    }

    // Método para obtener el UUID de la nota
    public function getUuid(){
        return $this->uuid;
    }

    // Método para establecer el UUID de la nota
    public function setUuid($value){
        $this->uuid = $value;
    }

    // Método para obtener el título de la nota
    public function getTitle(){
        return $this->title;
    }

    // Método para establecer el título de la nota
    public function setTitle($value){
        $this->title = $value;
    }

    // Método para obtener el contenido de la nota
    public function getContent(){
        return $this->content;
    }

    // Método para establecer el contenido de la nota
    public function setContent($value){
        $this->content = $value;
    }

}
