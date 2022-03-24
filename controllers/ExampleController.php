<?php

namespace Controllers;

use Models\Example;

class ExampleController
{
    private Example $example;

    public function __construct()
    {
        $this->example = new Example;
    }

    public function create(): bool
    {
        $data = json_decode(file_get_contents("php://input"));

        if (isset($data->name, $data->description)
            && is_string($data->name) && is_string($data->description)) {
            return $this->example->create($data->name, $data->description);
        } else {
            return false;
        }

    }

    public function read(int $id = -1)
    {
        if ($id === -1) {
            $example = $this->example->selectAll();
        } else {
            $example = $this->example->select($id);
        }

        return_json(json_encode($example));
    }

    public function update(int $id)
    {
        var_dump("put");
        // ToDo
    }

    public function delete(int $id): bool
    {
        return $this->example->delete($id);
    }
}