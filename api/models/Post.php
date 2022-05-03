<?php

namespace Models;

class Post extends BaseModel
{
   public string $entity = 'post';

    public function create(string $description, string $picture, string $date, string $idUser): bool
    {
        $values = [$description, $picture, $date, $idUser];
        $keys = ['description', 'picture', 'date', 'idUser'];

        return $this->createFromArray($values, $keys);
    }

    //Méthode pour selectionner tous les posts d'un User
    public function selectAllPostsFromUserId(int $idUser)
    {
        $this->db->query("SELECT * FROM post INNER JOIN user ON post.idUser = user.id ORDER BY date DESC");
        $this->db->bind(':id', $idUser);
        return $this->db->fetchAll();
    }

    //Méthode pour compter tous les posts d'un User
    public function countPostsFromUserId(int $idUser)
    {
        $this->db->query("SELECT COUNT(*) FROM post WHERE idUser = :id");
        $this->db->bind(':id', $idUser);
        return $this->db->fetchAll();
    }

    //Méthode pour selectionner tous les posts publiés
    public function selectAllPostsWithUsers(int $idUser){
        $this->db->query("SELECT post.*, user.pseudo FROM post INNER JOIN user ON post.idUser = user.id WHERE idUser=':id' ORDER BY date DESC");
        $this->db->bind(':id', $idUser);
        return $this->db->fetchAll();
    }

    //Méthode pour selectionner tous les posts publiés par les Users suivies
    public function selectAllFollowedPostsFromLoggedUser (int $idUser){
        $this->db->query("SELECT post.*, user.pseudo FROM post INNER JOIN user ON post.idUser=user.id INNER JOIN following ON user.id=following.idFollowing WHERE idUser=':id' ORDER BY date DESC");
        $this->db->bind(':id', $idUser);
        return $this->db->fetchAll();
    }
}



