<?php

namespace ns\builder;

use PDO;

class Db
{
    protected string $user;
    protected string $pass;


    public function one(QueryBuilder $query): array
    {

        $sql = (string)$query;//запрос
        $data=[];
        //$connection = new PDO('mysql:host=localhost;dbname=test', $user, $pass);
        //$data = $connection->query($sql);
        $output = [];
        foreach ($data as $row) {
            $output = $row;
            break;
        }
       $connection = null;
        $outputArray = [];
       foreach ($output as $k => $v) {
           $outputArray =   array_merge($outputArray, [$k,$v]);
        }
        return $outputArray;
    }

    public function all(QueryBuilder $query): array
    {

        $sql = (string)$query;//запрос
        $data=[];
        //$connection = new PDO('mysql:host=localhost;dbname=test', $user, $pass);
        //$data = $connection->query($sql);
        $outputArray = [];
        foreach ($data as $row) {
            foreach ($row as $k => $v) {
                $outputArray = array_merge($outputArray, $k->$v);
            }
        }
        $connection = null;
        return $outputArray;
    }


    public function setPass(string $pass): void
    {
        $this->pass = $pass;
    }


    public function setUser(string $user): void
    {
        $this->user = $user;
    }

}