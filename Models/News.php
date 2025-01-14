<?php
class News extends db {
    public function ShowNews() {
        $sql = "SELECT * FROM news";
        $stm = $this->Connect()->prepare($sql);
        $stm->execute();
        $news = $stm->fetchAll();
        return $news;
    }

    public function addNews($data) {
        $sql = "INSERT INTO news (Tentintuc, hinhanh, motasp, createdate) 
                VALUES (?, ?, ?, ?)";
        $stmt = $this->Connect()->prepare($sql);
        return $stmt->execute([$data['Tentintuc'],$data['hinhanh'],$data['motasp'],$data['createdate']
        ]);
    }

    public function deleteNews($id) {
        $sql = "DELETE FROM news WHERE id = :id";
        $stmt = $this->Connect()->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_STR);
        $stmt->execute();
    }


    public function getNewByid($id) {
        $sql = "SELECT * FROM news WHERE id = :id";
        $stm = $this->Connect()->prepare($sql);
        $stm->bindParam(':id', $id, PDO::PARAM_STR);
        $stm->execute();
        return $stm->fetch(PDO::FETCH_ASSOC);
    }


}