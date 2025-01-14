<?php
class Inventorymodel extends db {

    function showinventorymodel() {
        $sql = "SELECT * FROM adproduct";
        try {
            $stm=$this->Connect()->prepare($sql);
            $stm->execute();
            $inventory = $stm->fetchAll();
            return $inventory;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
}

    
?>
