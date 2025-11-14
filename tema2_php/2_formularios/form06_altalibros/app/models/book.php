<?php

class Book implements JsonSerializable{
    private $title;
    private $author;
    private $year;
    private $caratula;
    private $genre;

    public function __construct($title, $author, $year, $caratula, $genre){
        $this->title=$title;
        $this->author=$author;
        $this->year=$year;
        $this->caratula=$caratula;
        $this->genre=$genre;
    }

    public function getTitle(){
        return $this->title;
    }
    public function getAuthor(){
        return $this->author;
    }
    public function getYear(){
        return $this->year;
    }
    public function getCaratula(){
        return $this->caratula;
    }
    public function getGenre(){
        return $this->genre;
    }

    //setters
    public function setTitle($title){
        $this->title=$title;
    }
    public function setAuthor($author){
        $this->author=$author;
    }
    public function setYear($year){
        $this->year=$year;
    }
    public function setCaratula($caratula){
        $this->caratula=$caratula;
    }
    public function setGenre($genre){
        $this->genre=$genre;
    }

    public function jsonSerialize() {
        return [
            'title' => $this->title,
            'author' => $this->author,
            'year' => $this->year,
            'caratula' => $this->caratula,
            'genre' => $this->genre
        ];
    }
    
}