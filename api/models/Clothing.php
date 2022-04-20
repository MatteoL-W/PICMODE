<?php

namespace Models;

class Clothing extends BaseModel
// Méthodes selectAll, select, update, delete dans BaseModel.php
{
    public string $entity = 'user';

    public function create(string $type, string $color, string $url_shop, string $style, string $store): bool
    {
        $values = [$type, $color, $url_shop, $style, $store];
        $keys = ['type', 'color', 'url_shop', 'style', 'store'];

        return $this->createFromArray($values, $keys);
    }
}