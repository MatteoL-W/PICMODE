<?php

namespace Models;

use stdClass;

class BaseModel
{
    public Database $db;
    public string $entity = 'TBD';

    public function __construct()
    {
        $this->db = new Database();
    }

    public function createFromArray(array $values, array $keys): bool
    {
        $allValues = '`' . implode("`, `", $keys) . '`';
        $allValuesSQL = ':' . implode(', :', $keys);

        $this->db->query("INSERT INTO " . $this->entity . " ($allValues) VALUES ($allValuesSQL)");
        for ($i = 0, $iMax = count($keys); $i < $iMax; $i++) {
            $this->db->bind(':' . $keys[$i], $values[$i]);
        }

        return $this->db->execute();
    }

    public function selectAll(): array
    {
        $this->db->query("SELECT * FROM " . $this->entity);
        return $this->db->fetchAll();
    }


    public function select(int $id)
    {
        $this->db->query("SELECT * FROM " . $this->entity . " WHERE id = :id");
        $this->db->bind(':id', $id);
        return $this->db->fetch();
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

        $this->db->query("UPDATE " . $this->entity . " SET $setValue WHERE id = :id");
        $this->db->bind(':id', $id);

        return $this->db->execute();
    }

    public function delete(int $id): bool
    {
        $this->db->query("DELETE FROM " . $this->entity . " WHERE id = :id");
        $this->db->bind(':id', $id);

        return $this->db->execute();
    }
}