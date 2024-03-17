<?php

namespace David\Notes\models;

use David\Notes\lib\Database;
use PDO;

class Note extends Database{

    private string $uuid; // Propiedad para almacenar el UUID único de la nota

    // Constructor de la clase Note que acepta el título y el contenido de la nota
    public function __construct(private string $title, private string $content)
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
        $query = $this->connect()->prepare("INSERT INTO notes(uuid, title, content, updated) VALUES(:uuid, :title, :content, NOW()");
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

    // Método estático para crear una instancia de Note a partir de un array de datos
    public static function createFromArray($arr){
        // Crea una nueva instancia de Note con el título y el contenido del array
        $note = new Note($arr['title'], $arr['content']);
        // Establece el UUID de la nota con el valor del array
        $note->setUuid($arr['uuid']);
        // Devuelve la nota creada
        return $note;
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
