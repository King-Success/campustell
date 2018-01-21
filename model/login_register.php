<?php
    $valid =false;
    function isUser($password){
        global $db;
        global $valid;
            $query = "SELECT `userID` FROM `users` WHERE userPassword = '$password'";
            $stm = $db->query($query);
            $user = $stm->fetch();
            if($user){
                $valid = true;
            }

            return $valid;
            // $stm->bindValue(':password',$password);
            // $stm->execute();
            // $stm->closeCursor();
    }

    function getValidUser($password){
        global $db;
        $stm = $db->prepare("SELECT userID FROM users WHERE userPassword = '$password'");
        $stm->execute();
        $user = $stm->fetch();
        $stm->closeCursor();
        return $user['userID'];
    }

    function login($userID){
        global $db;
        $stm = $db->prepare("SELECT *  FROM userprofile WHERE userID = :userID");
        $stm->bindValue(':userID',$userID);
        $stm->execute();
        $profile = $stm->fetch();
        $stm->closeCursor();
        return $profile;
    }

?>