<?php

namespace application\model;

class UserModel extends Model {
    public function getUser($arrUserInfo) {
        $sql = 
            " SELECT * "
            ." FROM user_info "
            ." WHERE " 
            ." u_id = :id "
            ." AND u_pw = :pw "
            ." AND d_flg = '0' "
            ;
        $prepare = [
            ":id" => $arrUserInfo["id"]
            ,":pw" => $arrUserInfo["pw"]
        ];
        try {
            $stmt = $this->conn->prepare($sql);
            $stmt->execute($prepare);
            $result = $stmt->fetchAll();
        } catch (Exception $e) {
            echo "UserModel->getUser Error : ".$e->getMessage();
            exit();
        } finally {
            $this->closeConn();
        }
        return $result;
    }

    public function idDupChk($arrUserInfo) {
        $sql = 
            " SELECT count(*) cnt "
            ." FROM "
            ." user_info "
            ." WHERE "
            ." u_id = :id "
            ;
        
        $prepare = [
            ":id" => $arrUserInfo["id"]
        ];
        try {
            $stmt = $this->conn->prepare($sql);
            $stmt->execute($prepare);
            $result = $stmt->fetchAll();
        } catch (Exception $e) {
            echo "UserModel->getUser Error : ".$e->getMessage();
            exit();
        } finally {
            $this->closeConn();
        }
        return $result[0]['cnt'];
    }

    public function insertUser($arrUserInfo) {
        $sql = 
            " INSERT INTO "
            ." user_info( "
            ." u_id "
            ." ,u_pw "
            ." ) "
            ." VALUES( "
            ." :id "
            ." ,:pw "
            ." ) "
            ;
        
        $prepare = [
            ":id" => $arrUserInfo["chkId"]
            ,":pw" => $arrUserInfo["pw"]
        ];
        try {
            $this->conn->beginTransaction();
            $stmt = $this->conn->prepare($sql);
            $stmt->execute( $prepare );
            $result_cnt = $stmt->rowCount();
            $this->conn->commit();
        } catch (Exception $e) {
            $this->conn->rollback();
            echo "UserModel->insertUser Error : ".$e->getMessage();
            exit();
        }
        finally {
            $this->closeConn();
        }
        return $result_cnt;
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
        finally {
            $this->closeConn();
        }
        return $result_cnt;
    }
}

?>