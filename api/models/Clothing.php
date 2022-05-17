<?php

namespace Models;

class Clothing extends BaseModel
// Méthodes selectAll, select, update, delete dans BaseModel.php
{
    public string $entity = 'clothing';

    public function create(string $type, string $color, string $url_shop, string $style, string $store, int $idTag): bool
    {
        $values = [$type, $color, $url_shop, $style, $store, $idTag];
        $keys = ['type', 'color', 'url_shop', 'style', 'store', 'idTag'];

        return $this->createFromArray($values, $keys);
    }
}