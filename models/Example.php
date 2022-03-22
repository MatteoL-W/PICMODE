<?php

namespace Models;

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

    public function delete($id): bool
    {
        $this->db->query("DELETE FROM example WHERE id = :id");
        $this->db->bind(':id', $id);
        if ($this->db->execute()) {
            return true;
        }
        return false;
    }
}