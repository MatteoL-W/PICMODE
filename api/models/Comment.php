<?php

namespace Models;

use stdClass;

class Comment
{
    private Database $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function create(string $text): bool
    {
        $this->db->query("INSERT INTO comment (`text`) VALUES (:text)");
        $this->db->bind(":text", $text);

        if ($this->db->execute()) {
            return true;
        }

        return false;
    }

    public function selectAll(): array
    {
        $this->db->query("SELECT * FROM comment");
        return $this->db->fetchAll();
    }

    public function select(int $id)
    {
        $this->db->query("SELECT * FROM comment WHERE id = :id");
        $this->db->bind(':id', $id);
        return $this->db->fetch();
    }

    public function delete(int $id): bool
    {
        $this->db->query("DELETE FROM comment WHERE id = :id");
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

        $this->db->query("UPDATE comment SET $setValue WHERE id = :id");
        $this->db->bind(':id', $id);

        if ($this->db->execute()) {
            return true;
        }

        return false;
    }
}