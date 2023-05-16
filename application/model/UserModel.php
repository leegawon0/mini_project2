<?php

namespace application\model;

class UserModel extends Model {
    public function getUser($arrUserInfo, $pwFlg = true, $dFlg = true ) {
        $sql = 
            " SELECT * "
            ." FROM user_info "
            ." WHERE " 
            ." u_id = :id "
            ;

        if($pwFlg) {
            $sql .= " AND u_pw = BINARY(:pw) ";
        }
        if($dFlg) {
            $sql .= " AND d_flg = '0' ";
        }

        $prepare = [
            ":id" => $arrUserInfo["id"]
        ];

        if($pwFlg) {
            $prepare[":pw"] = $arrUserInfo["pw"];
        }

        try {
            $stmt = $this->conn->prepare($sql);
            $stmt->execute($prepare);
            $result = $stmt->fetchAll();
        } catch (Exception $e) {
            echo "UserModel->getUser Error : ".$e->getMessage();
            exit();
        }
        return $result;
    }

    public function insertUser($arrUserInfo) {
        $sql = 
            " INSERT INTO "
            ." user_info( "
            ." u_id "
            ." ,u_pw "
            ." ,u_name "
            ." ) "
            ." VALUES( "
            ." :id "
            ." ,:pw "
            ." ,:name "
            ." ) "
            ;
        
        $prepare = [
            ":id" => $arrUserInfo["id"]
            ,":pw" => $arrUserInfo["pw"]
            ,":name" => $arrUserInfo["name"]
        ];
        try {
            $stmt = $this->conn->prepare($sql);
            $result = $stmt->execute( $prepare );
            return $result;
        } catch (Exception $e) {
            return false;
        }
    }

    public function deleteUser($arrUserInfo) {
        $sql = 
            " UPDATE "
            ." user_info "
            ." SET "
            ." d_flg = '1' "
            ." WHERE "
            ." u_id = :id "
            ;
        
        $prepare = [
            ":id" => $arrUserInfo['u_id']
        ];

        try {
            $this->conn->beginTransaction();
            $stmt = $this->conn->prepare($sql);
            $stmt->execute($prepare);
            $result_cnt = $stmt->rowCount();
            $this->conn->commit();
        } catch (Exception $e) {
            $this->conn->rollback();
            echo "UserModel->deleteUser Error : ".$e->getMessage();
            exit();
        }
        return $result_cnt;
    }

    public function updateUser($arrUserInfo) {
        $sql = 
            " UPDATE "
            ." user_info "
            ." SET "
            ." u_pw = :pw "
            ." ,u_name = :name "
            ." WHERE "
            ." u_id = :id "
            ;
        
        $prepare = [
            ":pw" => $arrUserInfo['pw']
            ,":name" => $arrUserInfo['name']
            ,":id" => $arrUserInfo['id']
        ];

        try {
            $stmt = $this->conn->prepare($sql);
            $result = $stmt->execute( $prepare );
            return $result;
        } catch (Exception $e) {
            return false;
        }
    }
}

?>