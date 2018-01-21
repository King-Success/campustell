<?php
    
    function createUser($schoolID, $firstName, $lastName, $email, $password){
        try{
            global $db;
        $stm = $db->prepare('INSERT INTO users (schoolID, firstName, lastName, userEmail, userPassword)
                                                VALUES (:schoolID, :firstName, :lastName, :email, :password)');
        $stm->bindValue(':schoolID', $schoolID);
        $stm->bindValue(':firstName', $firstName);
        $stm->bindValue(':lastName', $lastName);
        $stm->bindValue(':email', $email);
        $stm->bindValue(':password', $password);
        $stm->execute();
        $stm->closeCursor();
        }catch(PDOException $e){
            echo $error_message = 'Error : '.$e->getMessage();
        }
    }

    function getUsers(){
        try{
            global $db;
            $stm = $db->prepare('SELECT * FROM users');
            $stm->execute();
            $users = $stm->fetchAll();
            $stm->closeCursor();
        }catch(PDOException $e){
            echo $error_message= 'Error :'.$e->getMessage();
        }
        return $users;
    }

    
    function getUser($userID){
        try{
            global $db;
            $stm = $db->prepare('SELECT * FROM users WHERE userID = :userID');
            $stm->bindValue(':userID', $userID);
            $stm->execute();
            $user = $stm->fetch();
            $stm->closeCursor();
        }catch(PDOException $e){
            echo $error_message = 'Error :'.$e->getMessage();
        }
            return $user;
    }

    function getFirstName($userID){
        try{
            global $db;
            $stm = $db->prepare('SELECT firstName FROM users WHERE userID = :userID');
            $stm->bindValue(':userID', $userID);
            $stm->execute();
            $firstName = $stm->fetch();
            $stm->closeCursor();
        }catch(PDOException $e){
            echo $error_message = 'Error :'.$e->getMessage();
        }
            return $firstName['firstName'];
    }

    function getLastName($userID){
        try{
            global $db;
            $stm = $db->prepare('SELECT lastName FROM users WHERE userID = :userID');
            $stm->bindValue(':userID', $userID);
            $stm->execute();
            $lastName = $stm->fetch();
            $stm->closeCursor();
        }catch(PDOException $e){
            echo $error_message = 'Error :'.$e->getMessage();
        }
            return $lastName['lastName'];
    }

    function getFullName($userID){
        try{
            global $db;
            $stm = $db->prepare('SELECT firstName, lastName FROM users WHERE userID = :userID');
            $stm->bindValue(':userID', $userID);
            $stm->execute();
            $fullName = $stm->fetch();
            $stm->closeCursor();
        }catch(PDOException $e){
            echo $error_message = 'Error :'.$e->getMessage();
        }
            return $fullName['firstName'].' '.$fullName['lastName'];
    }

    function getUserEmail($userID){
        try{
            global $db;
            $stm = $db->prepare('SELECT userEmail FROM users WHERE userID = :userID');
            $stm->bindValue(':userID', $userID);
            $stm->execute();
            $email = $stm->fetch();
            $stm->closeCursor();
        }catch(PDOException $e){
            echo $error_message = 'Error :'.$e->getMessage();
        }
            return $email['userEmail'];
    }

    function getUserPassword($userID){
        try{
            global $db;
            $stm = $db->prepare('SELECT userPassword FROM users WHERE userID = :userID');
            $stm->bindValue(':userID', $userID);
            $stm->execute();
            $password = $stm->fetch();
            $stm->closeCursor();
        }catch(PDOException $e){
            echo $error_message = 'Error :'.$e->getMessage();
        }
            return $password['userPassword'];
    }

    function getUserSchool($userID){
        try{
            global $db;
            $stm = $db->prepare('SELECT schoolName, schoolAddress, schoolWebsite, schoolState, schoolLogoPath
                                        FROM users u INNER JOIN schools s ON u.schoolID = s.schoolID WHERE
                                        userID = :userID');
            $stm->bindValue(':userID', $userID);
            $stm->execute();
            $school = $stm->fetch();
            $stm->closeCursor();
        }catch(PDOException $e){
            echo $error_message = 'Error :'.$e->getMessage();
        }
            return $school;
    }

    function updateFirstName($newFirstName, $userID){
        try{
            global $db;
            $stm = $db->prepare('UPDATE users SET firstName = :newFirstName WHERE userID = :userID');
            $stm->bindValue(':userID', $userID);
            $stm->bindValue(':newFirstName', $newFirstName);
            $stm->execute();
            $stm->closeCursor();
        }catch(PDOException $e){
            echo $error_message = 'Error :'.$e->getMessage();
        }
    }

    function updateLastName($newLastName, $userID){
        try{
            global $db;
            $stm = $db->prepare('UPDATE users SET lastName = :newLastName WHERE userID = :userID');
            $stm->bindValue(':userID', $userID);
            $stm->bindValue(':newLastName', $newLastName);
            $stm->execute();
            $stm->closeCursor();
        }catch(PDOException $e){
            echo $error_message = 'Error :'.$e->getMessage();
        }
    }

    function updateEmail($newEmail, $userID){
        try{
            global $db;
            $stm = $db->prepare('UPDATE users SET userEmail = :newEmail WHERE userID = :userID');
            $stm->bindValue(':userID', $userID);
            $stm->bindValue(':newEmail', $newEmail);
            $stm->execute();
            $stm->closeCursor();
        }catch(PDOException $e){
            echo $error_message = 'Error :'.$e->getMessage();
        }
    }

    function updatePassword($newPassword, $userID){
        try{
            global $db;
            $stm = $db->prepare('UPDATE users SET userPassword = :newPassword WHERE userID = :userID');
            $stm->bindValue(':userID', $userID);
            $stm->bindValue(':newPassword', $newPassword);
            $stm->execute();
            $stm->closeCursor();
        }catch(PDOException $e){
            echo $error_message = 'Error :'.$e->getMessage();
        }
    }

    function updateSchool($newSchoolID, $userID){
        try{
            global $db;
            $stm = $db->prepare('UPDATE users SET schoolID = :newSchoolID WHERE userID = :userID');
            $stm->bindValue(':userID', $userID);
            $stm->bindValue(':newSchoolID', $newSchoolID);
            $stm->execute();
            $stm->closeCursor();
        }catch(PDOException $e){
            echo $error_message = 'Error :'.$e->getMessage();
        }
    }

    function deleteUser($userID){
        try{
            global $db;
            $stm = $db->prepare('DELETE FROM users WHERE userID = :userID');
            $stm->bindValue(':userID',$userID);
            $stm->execute();
            $rows = $stm->rowCount();
            $stm->closeCursor();
        }catch(PDOException $e){
            echo $error_message= 'Error :'.$e->getMessage();
        }
        return $rows;
    }

    


?>