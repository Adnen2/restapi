<?php

    class Category{
        //db stuff
        private $conn;
        private $table = 'categories';

        //category porperties
        public $id;
        public $category_id;
        public $category_at;

        //constructor with db connection
        public function __construct($db){
            $this->conn = $db;
        }
        //getting posts from our database
        public function read(){
            //create query
            $query = 'SELECT
            *
            FROM
                ' .this->table;
        //Prepare statement
        $stmt = $this->conn->prepare($query);

        //EXecute query
        $stmt->execute();

        return $stmt;
        }
    
}