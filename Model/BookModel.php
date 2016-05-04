<?php

class BookModel
{

    public function findById($id)
    {

        $db = DbConnection::getInstance()->getPdo();
        $sth = $db->query('SELECT * FROM book WHERE id ='. $id);
        $sth->execute();
        $data = $sth->fetchAll(PDO::FETCH_ASSOC);
        if(!$data){
            throw new Exception('empty array',404);
        }

        $books = $data;

//        if (!isset($books[$id])) {
//            throw new Exception (' Book ' . $id . ' not found', 404);
//        }
        return $books[$id];

    }

    public function findAll()
    {

        $db = DbConnection::getInstance()->getPdo();
        $sth = $db->query('SELECT * FROM book ORDER BY price');
        $sth->execute();
        $data = $sth->fetchAll(PDO::FETCH_ASSOC);
        if(!$data){
            throw new Exception('empty array',404);
        }

        $books = $data;

        return $books;
    }
}