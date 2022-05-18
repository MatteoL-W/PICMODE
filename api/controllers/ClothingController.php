<?php

namespace Controllers;

use Models\Clothing;

class ClothingController
{
    private Clothing $clothing;

    public function __construct()
    {
        $this->clothing = new Clothing;
    }

    public function read(int $id = -1): void
    {
        if ($id === -1) {
            $clothing = $this->clothing->selectAll();
        } else {
            $clothing = $this->clothing->select($id);
        }

        return_json(json_encode($clothing));
    }

    public function getFromPost(int $id) {
        $clothing = $this->clothing->selectAllFromPost($id);
        return_json(json_encode($clothing));
    }

    public function create(): void
    {
        $data = json_decode(file_get_contents("php://input"));

        if (isset($data->type, $data->color, $data->url_shop, $data->style, $data->store, $data->idTag)
            && is_string($data->type) && is_string($data->color) && is_string($data->url_shop) && is_string($data->style) && is_string($data->store) && is_numeric($data->idTag)) {
            if (!$this->clothing->create($data->type, $data->color, $data->url_shop, $data->style, $data->store, $data->idTag)) {
                return;
            }
        } else {
            return;
        }

        $this->read();
    }

    public function update(int $id): void
    {
        $data = json_decode(file_get_contents("php://input"));

        if ($this->clothing->update($id, $data)) {
            $this->read();
        }
    }

    public function delete(int $id): void
    {
        if ($this->clothing->delete($id)) {
            $this->read();
        }
    }
}