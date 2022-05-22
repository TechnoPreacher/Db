<?php

use ns\builder\QueryBuilder;

require_once "vendor/autoload.php";

echo PHP_EOL.'level1'.PHP_EOL;

$builder = new \ns\builder\SqlBuilder();

//“SELECT first_name, age FROM users WHERE status = ‘active’ ORDER BY id ASC LIMIT 20 OFFSET 40”
echo $builder->table('users')
        ->select(['first_name', 'age'])
        ->where(['status' => 'active'])
        ->order(['id' => 'ASC'])
        ->limit(20)
        ->offset(40)
        ->build() . PHP_EOL;


//SELECT first, age FROM users WHERE status = 'passive'  LIMIT 50
$builder = new \Ns\Builder\SqlBuilder();
echo $builder->table('users')
        ->select(['first', 'age'])
        ->where(['status' => 'passive'])
        ->limit(50)
        ->build() . PHP_EOL;

//SELECT age FROM users
$builder = new \Ns\Builder\SqlBuilder();
echo $builder->table('users')
        ->select(['age'])
        ->build() . PHP_EOL;

echo PHP_EOL.'level2'.PHP_EOL;

$builder = new QueryBuilder();
$query = $builder->table('users')
    ->select(['first_name', 'age'])
    ->where(['status' => 'active'])
    ->order(['id' => 'ASC'])
    ->limit(200)
    ->offset(400)
    ->build();
$sql = (string)$query;

echo $sql. PHP_EOL;

$builder = new QueryBuilder();
$query = $builder->table('users')
    ->select(['first_name', 'age'])
    ->where(['status' => 'active'])
    ->build();
$sql = (string)$query;

echo $sql. PHP_EOL;


echo PHP_EOL.'level3'.PHP_EOL;



//И при вызове метода one:
$db = new \ns\builder\Db();
$db->setUser("user");
$db->setPass("pass");
$user = $db->one($query);

var_dump($user);
