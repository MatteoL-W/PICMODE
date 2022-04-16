<?php

namespace Models;

use stdClass;

class Clothing
{
    private Database $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function create(string $type, string $color, string $url_shop, string $style, string $store): bool
    {
        $this->db->query("INSERT INTO clothing (`type`, `color`, `url_shop`, `style`, `store`) VALUES (:type, :color, :url_shop, :style, :store)");
        $this->db->bind(":type", $type);
        $this->db->bind(":color", $color);
        $this->db->bind(":url_shop", $url_shop);
        $this->db->bind(":style", $style);
        $this->db->bind(":store", $store);

        if ($this->db->execute()) {
            return true;
        }

        return false;
    }

    public function selectAll(): array
    {
        $this->db->query("SELECT * FROM clothing");
        return $this->db->fetchAll();
    }

    public function select(int $id)
    {
        $this->db->query("SELECT * FROM clothing WHERE id = :id");
        $this->db->bind(':id', $id);
        return $this->db->fetch();
    }

    public function delete(int $id): bool
    {
        $this->db->query("DELETE FROM clothing WHERE id = :id");
        $this->db->bind(':id', $id);

        if ($this->db->execute()) {
            return true;
        }

        return false;
    }

    public function update(int $id, stdClass $fields): bool
    {
        $setValue = '';
        $i = 0;

        foreach ($fields as $name => $value) {
            $setValue .= "{$name} = '{$value}'";
            if ($i < count((array)$fields) - 1) {
                $setValue .= ', ';
            }
            $i++;
        }

        $this->db->query("UPDATE clothing SET $setValue WHERE id = :id");
        $this->db->bind(':id', $id);

        if ($this->db->execute()) {
            return true;
        }

        return false;
    }
}