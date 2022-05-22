<?php

namespace ns\builder;

use Aigletter\Contracts\Builder\BuilderInterface;

interface NewQueryInterafce extends BuilderInterface
{
    public function build(): self;//чтоб возвращать объект по билду

}