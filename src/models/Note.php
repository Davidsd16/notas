<?php

namespace David\Notes\models;

use David\Notes\lib\Database;

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
