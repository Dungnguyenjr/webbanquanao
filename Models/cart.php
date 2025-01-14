<?php
class cart extends db {
    public function getCartById($id) {
        $sql = "SELECT * FROM cart WHERE id = :id";
        $stm = $this->Connect()->prepare($sql);
        $stm->bindParam(':id', $id, PDO::PARAM_INT);
        $stm->execute();
        return $stm->fetchAll(PDO::FETCH_ASSOC);
    }

    public function Cart($userId, $cartItems) {
        $pdo = $this->Connect(); // Store the connection in a variable
        try {
            $pdo->beginTransaction(); // Start the transaction
            
            foreach ($cartItems as $item) {
                // Check if the product already exists in the cart
                $sqlCheck = "SELECT * FROM `cart` WHERE `id` = :id AND `Ma_sp` = :Ma_sp";
                $stmCheck = $pdo->prepare($sqlCheck);
                $stmCheck->bindParam(':id', $userId, PDO::PARAM_INT);
                $stmCheck->bindParam(':Ma_sp', $item['Ma_sp']);
                $stmCheck->execute();
    
                if ($stmCheck->rowCount() > 0) {
                    // Update quantity, price, and promotion
                    $sqlUpdate = "UPDATE `cart` SET `qty` = :qty + 1, `giaxuat` = :giaxuat, `khuyenmai` = :khuyenmai WHERE `id` = :id AND `Ma_sp` = :Ma_sp";
                    $stmUpdate = $pdo->prepare($sqlUpdate);
                    $newQty = $item['qty'];
                    $stmUpdate->bindParam(':qty', $newQty, PDO::PARAM_INT);
                    $stmUpdate->bindParam(':giaxuat', $item['giaxuat'], PDO::PARAM_STR);
                    $stmUpdate->bindParam(':khuyenmai', $item['khuyenmai'], PDO::PARAM_STR);
                    $stmUpdate->bindParam(':id', $userId, PDO::PARAM_INT);
                    $stmUpdate->bindParam(':Ma_sp', $item['Ma_sp']);
                    $stmUpdate->execute();
                } else {
                    // Insert new product into the cart
                    $sqlInsert = "INSERT INTO `cart`(`id`, `Ma_sp`, `Tensp`, `hinhanh`, `giaxuat`, `khuyenmai`, `qty`) 
                                  VALUES (:id, :Ma_sp, :Tensp, :hinhanh, :giaxuat, :khuyenmai, :qty)";
                    $stmInsert = $pdo->prepare($sqlInsert);
                    $stmInsert->bindParam(':id', $userId, PDO::PARAM_INT);
                    $stmInsert->bindParam(':Ma_sp', $item['Ma_sp']);
                    $stmInsert->bindParam(':Tensp', $item['Tensp']);
                    $stmInsert->bindParam(':hinhanh', $item['hinhanh']);
                    $stmInsert->bindParam(':giaxuat', $item['giaxuat']);
                    $stmInsert->bindParam(':khuyenmai', $item['khuyenmai']);
                    $stmInsert->bindParam(':qty', $item['qty'], PDO::PARAM_INT);
                    $stmInsert->execute();
                }
            }
            
            $pdo->commit(); // Commit the transaction
        } catch (PDOException $e) {
            $pdo->rollBack(); // Roll back the transaction if an error occurs
            error_log("Error updating cart: " . $e->getMessage());
            echo "An error occurred while updating the cart.";
        }
    }
    public function removeCart($userId, $ma_sp) {
        $sqlDelete = "DELETE FROM `cart` WHERE `id` = :id AND `Ma_sp` = :Ma_sp";
        $stmDelete = $this->Connect()->prepare($sqlDelete);
        $stmDelete->bindParam(':id', $userId, PDO::PARAM_INT);
        $stmDelete->bindParam(':Ma_sp', $ma_sp, PDO::PARAM_INT);
        $stmDelete->execute();
    }
    
    public function updateCartInModel($Id, $ma_sp, $qty, $giaxuat, $khuyenmai) {
        $sql = "UPDATE cart SET qty = :qty, giaxuat = :giaxuat, khuyenmai = :khuyenmai WHERE id = :id AND ma_sp = :Ma_sp"; 
        $stmt = $this->Connect()->prepare($sql);
        
        $stmt->bindParam(':qty', $qty, PDO::PARAM_INT);
        $stmt->bindParam(':giaxuat', $giaxuat, PDO::PARAM_STR);
        $stmt->bindParam(':khuyenmai', $khuyenmai, PDO::PARAM_STR);
        $stmt->bindParam(':id', $Id, PDO::PARAM_INT);
        $stmt->bindParam(':Ma_sp', $ma_sp, PDO::PARAM_STR);
        
        if (!$stmt->execute()) {
            error_log("Lỗi khi cập nhật giỏ hàng: " . implode(", ", $stmt->errorInfo()));
        } else {
            error_log("Cập nhật thành công.");
        }
    }
    public function getProductDetails($Id, $ma_sp) {
        $sql = "SELECT giaxuat, khuyenmai FROM cart WHERE Id = ? AND ma_sp = ?";
        $stmt = $this->Connect()->prepare($sql);
        $stmt->execute([$Id, $ma_sp]);
        $productDetails = $stmt->fetch(PDO::FETCH_ASSOC);
        return $productDetails;
    }

    
    
    
    
    
    
    
}
