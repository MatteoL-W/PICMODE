<?php

namespace Models;

class Comment extends BaseModel
{

    public string $entity = 'comment';

    public function create(string $text, int $idUser, int $idPost): bool
    {
        $values = [$text, $idUser, $idPost];
        $keys = ['text', 'idUser', 'idPost'];

        return $this->createFromArray($values, $keys);

    }

    //Méthode pour selectionner tous les commentaires sous un post
    public function selectAllCommentsFromPost(int $idPost)
    {
        $this->db->query("SELECT comment.* FROM comment INNER JOIN post ON comment.idPost = post.id WHERE idPost = :id ORDER BY date DESC");
        $this->db->bind(':id', $idPost);
        return $this->db->fetchAll();
    }


}