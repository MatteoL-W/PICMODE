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

    public function read(int $id = -1): void
    {
        if ($id === -1) {
            $example = $this->example->selectAll();
        } else {
            $example = $this->example->select($id);
        }

        return_json(json_encode($example));
    }

    public function create(): void
    {
        $data = json_decode(file_get_contents("php://input"));

        if (isset($data->example_name, $data->description)
            && is_string($data->example_name) && is_string($data->description)) {
            if (!$this->example->create($data->example_name, $data->description)) {
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

        if ($this->example->update($id, $data)) {
            $this->read();
        }
    }

    public function delete(int $id): void
    {
        if ($this->example->delete($id)) {
            $this->read();
        }
    }
}