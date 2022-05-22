<?php

namespace ns\builder;

use Aigletter\Contracts\Builder\BuilderInterface;
use Aigletter\Contracts\Builder\SqlBuilderInterface;

class SqlBuilder implements SqlBuilderInterface
{
    protected string $table = '';
    protected string $fields = '';
    protected string $conditions = '';
    protected string $orders = '';
    protected string $limit = '';
    protected string $offset = '';


    public function select($columns): BuilderInterface
    {
        $this->fields = implode(', ', $columns);
        return $this;
    }


    public function where($conditions): BuilderInterface
    {
        $conditionsToString = '';
        foreach ($conditions as $k => $v) {
            $conditionsToString .= "$k = '$v' ";
        }
        $this->conditions = " WHERE " . $conditionsToString;
        return $this;
    }


    public function table($table): BuilderInterface
    {
        $this->table = ' FROM ' . $table;
        return $this;
    }


    public function limit($limit): BuilderInterface
    {
        $this->limit = " LIMIT " . $limit;
        return $this;
    }


    public function offset($offset): BuilderInterface
    {
        $this->offset = " OFFSET " . $offset;
        return $this;
    }

    public function order($order): BuilderInterface
    {
        $conditionsToString = '';
        foreach ($order as $k => $v) {
            $conditionsToString .= "$k $v";
        }
        $this->orders = " ORDER BY " . $conditionsToString;
        return $this;
    }


    public function build(): string//перебираю свойства, и собираю строку запроса
    {
        $sql = "SELECT " .
            $this->fields .
            $this->table .
            $this->conditions .
            $this->orders .
            $this->limit .
            $this->offset;
        return $sql;
    }
}