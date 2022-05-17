<?php

namespace Controllers;

use Models\Contains;

class ContainsController
{
    private Contains $contains;

    public function __construct()
    {
        $this->contains = new Contains;
    }

    public function read(): void
    {
        $all = $this->contains->selectAll();
        return_json(json_encode($all));
    }

    public function getClothing(int $id) {
        $clothing = $this->contains->selectAllClothingFromPostId($id);
        return_json(json_encode($clothing));
    }

    public function countClothing(int $id) {
        $clothing = $this->contains->countClothingFromPostId($id);
        return_json(json_encode($clothing));
    }

    public function create(): void
    {
        $data = json_decode(file_get_contents("php://input"));

        if (isset($data->idPost, $data->idClothing)
            && is_numeric($data->idPost) && is_numeric($data->idClothing)) {
            if (!$this->contains->create($data->idPost, $data->idClothing)) {
                return;
            }
        } else {
            return;
        }

        $this->read();
    }

    public function delete(int $id, int $id2): void
    {
        if ($this->contains->delete($id, $id2)) {
            $this->read();
        }
    }
}