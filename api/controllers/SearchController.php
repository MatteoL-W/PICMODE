<?php

namespace Controllers;

use Models\Search;

class SearchController
{
    private Search $search;

    public function __construct()
    {
        $this->search = new Search;
    }

    public function getAllUsersFromPseudo()
    {
        $data = json_decode(file_get_contents("php://input"));

        if (isset($data->mot) && is_string($data->mot)) {
            $search = $this->search->getAllUsersFromPseudo($data->mot);
            return_json(json_encode($search));
        }
    }
}