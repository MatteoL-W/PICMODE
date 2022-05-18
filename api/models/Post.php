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
        $this->db->query("SELECT * FROM post INNER JOIN user ON post.idUser = user.id WHERE idUser = :id ORDER BY date DESC");
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
    public function selectAllPostsWithUsers(){
        $this->db->query("SELECT post.*, user.pseudo FROM post INNER JOIN user ON post.idUser = user.id ORDER BY date DESC");
        return $this->db->fetchAll();
    }

    //Méthode pour selectionner tous les posts publiés par les Users suivies
    public function selectAllFollowedPostsFromLoggedUser (int $idUser){
        $this->db->query("SELECT post.*, user1.pseudo FROM post INNER JOIN user AS user1 ON post.idUser = user1.id INNER JOIN following ON user1.id = following.idFollowing INNER JOIN user AS user2 ON following.idFollower = user2.id WHERE idFollower=:id ORDER BY date DESC");
        $this->db->bind(':id', $idUser);
        return $this->db->fetchAll();
    }

    //Méthode pour selectionner tous les posts avec un certain tag
    public function selectAllPostsFromTagId (int $idTag){
        $this->db->query("SELECT post.* FROM post INNER JOIN contains ON contains.idPost = post.id INNER JOIN clothing ON clothing.id = contains.idClothing WHERE idTag = :id ORDER BY date DESC");
        $this->db->bind(':id', $idTag);
        return $this->db->fetchAll();
    }
}



