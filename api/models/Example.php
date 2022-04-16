<?php

namespace Models;

use stdClass;

class Example
{
    private Database $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function create(string $name, string $description): bool
    {
        $this->db->query("INSERT INTO example (`example_name`, `description`) VALUES (:name, :description)");
        $this->db->bind(":name", $name);
        $this->db->bind(":description", $description);

        if ($this->db->execute()) {
            return true;
        }

        return false;
    }

    public function selectAll(): array
    {
        $this->db->query("SELECT * FROM example");
        return $this->db->fetchAll();
    }

    public function select(int $id)
    {
        $this->db->query("SELECT * FROM example WHERE id = :id");
        $this->db->bind(':id', $id);
        return $this->db->fetch();
    }

    public function delete(int $id): bool
    {
        $this->db->query("DELETE FROM example WHERE id = :id");
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

        $this->db->query("UPDATE example SET $setValue WHERE id = :id");
        $this->db->bind(':id', $id);

        if ($this->db->execute()) {
            return true;
        }

        return false;
    }
}