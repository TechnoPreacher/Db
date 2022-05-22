<?php

namespace ns\builder;



use Aigletter\Contracts\Builder\BuilderInterface;

class QueryBuilder implements NewQueryInterafce
{

    protected string $table = '';
    protected string $fields = '';
    protected string $conditions = '';
    protected string $orders = '';
    protected string $limit = '';
    protected string $offset = '';

    public function select($columns): \Aigletter\Contracts\Builder\BuilderInterface
    {
        $this->fields = implode(', ', $columns);
        return $this;
    }

    public function where($conditions): \Aigletter\Contracts\Builder\BuilderInterface
    {
        $conditionsToString = '';
        foreach ($conditions as $k => $v) {
            $conditionsToString .= "$k = '$v' ";
        }
        $this->conditions = " WHERE " . $conditionsToString;
        return $this;
    }

    public function table($table): \Aigletter\Contracts\Builder\BuilderInterface
    {
        $this->table = ' FROM ' . $table;
        return $this;
    }

    public function limit($limit): \Aigletter\Contracts\Builder\BuilderInterface
    {
        $this->limit = " LIMIT " . $limit;
        return $this;
    }

    public function offset($offset): \Aigletter\Contracts\Builder\BuilderInterface
    {
        $this->offset = " OFFSET " . $offset;
        return $this;
    }

    public function order($order): \Aigletter\Contracts\Builder\BuilderInterface
    {
        $conditionsToString = '';
        foreach ($order as $k => $v) {
            $conditionsToString .= "$k $v";
        }
        $this->orders = " ORDER BY " . $conditionsToString;
        return $this;
    }

    public function build(): NewQueryInterafce
    {
    return $this;
    }

    public function __toString(): string//собираю запрос
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