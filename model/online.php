<?php
    function check($profileID){
        global $db;
        try{
        $stm = $db->prepare("SELECT * FROM online WHERE profileID = :profileID");
        $stm->bindValue(':profileID',$profileID);
        $stm->execute();
        $result = $stm->fetch();
        $stm->closeCursor();
        }catch(PDOException $e){
            if($e->getMessage()){
                return false;
            }else{
                return true;
            }
        }
    }
?>