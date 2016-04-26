<?php

class BookModel
{

    public function findById($id)
    {

        $books = array(

            array(
                'title' => 'Carrie',
                'author' => 'King',
                'price' => 123
            ),
            array(
                'title' => 'Boo',
                'author' => 'Larry',
                'price' => 524
            ),
            array(
                'title' => 'Foo',
                'author' => 'Rood',
                'price' => 55
            )
        );
        return $books[$id];

    }

    public function findAll()
    {

        $books = array(

            array(
                'title' => 'Carrie',
                'author' => 'King',
                'price' => 123
            ),
            array(
                'title' => 'Boo',
                'author' => 'Larry',
                'price' => 524
            ),
            array(
                'title' => 'Foo',
                'author' => 'Rood',
                'price' => 55
            )
        );

        return $books;
    }
}