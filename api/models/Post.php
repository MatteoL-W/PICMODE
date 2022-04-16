<?php

namespace Models;

use stdClass;

class Post
{
    private Database $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function create(string $description, string $picture, string $date): bool
    {
        $this->db->query("INSERT INTO post (`description`, `picture`, `date`) VALUES (:description, :picture, :date)");
        $this->db->bind(":description", $description);
        $this->db->bind(":picture", $picture);
        $this->db->bind(":date", $date);

        if ($this->db->execute()) {
            return true;
        }

        return false;
    }

    public function selectAll(): array
    {
        $this->db->query("SELECT * FROM post");
        return $this->db->fetchAll();
    }

    public function select(int $id)
    {
        $this->db->query("SELECT * FROM post WHERE id = :id");
        $this->db->bind(':id', $id);
        return $this->db->fetch();
    }

    public function delete(int $id): bool
    {
        $this->db->query("DELETE FROM post WHERE id = :id");
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

        $this->db->query("UPDATE post SET $setValue WHERE id = :id");
        $this->db->bind(':id', $id);

        if ($this->db->execute()) {
            return true;
        }

        return false;
    }
}