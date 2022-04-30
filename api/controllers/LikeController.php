<?php

namespace Controllers;

use Models\Like;

class LikeController
{
    private Like $like;

    public function __construct()
    {
        $this->like = new Like;
    }

    public function read(): void
    {
        $all = $this->like->selectAll();
        return_json(json_encode($all));
    }

    public function getLiker(int $id) {
        $liker = $this->like->selectAllLikerFromPost($id);
        return_json(json_encode($liker));
    }


    public function countLikers(int $id) {
        $likers = $this->like->countLikerFromPost($id);
        return_json(json_encode($followers));
    }


    public function create(): void
    {
        $data = json_decode(file_get_contents("php://input"));

        if (isset($data->idUser, $data->idPost)
            && is_numeric($data->idUser) && is_numeric($data->idPost)) {
            if (!$this->like->create($data->idUser, $data->idPost)) {
                return;
            }
        } else {
            return;
        }

        $this->read();
    }

    public function delete(int $id, int $id2): void
    {
        if ($this->like->delete($id, $id2)) {
            $this->read();
        }
    }
}



