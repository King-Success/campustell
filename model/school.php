<?php
    
    function addSchool($name, $state, $lpath, $address, $website){
        try{
            global $db;
            $stm = dbConnect()->prepare('INSERT INTO schools (schoolName, schoolState, schoolLogoPath, schoolAddress, 
                                                schoolWebsite) VALUES (:name, :state, :lpath, :address, :website)');
            $stm->bindValue(':name', $name);
            $stm->bindValue(':state', $state);
            $stm->bindValue(':lpath', $lpath);
            $stm->bindValue(':address', $address);
            $stm->bindValue(':website', $website);
            $stm->execute();
            $stm->closeCursor();
        }catch(PDOException $e){
            echo $error_message = 'Error :'.$e->getMessage();
        }
    }

    function getSchools(){
        global $db;
        try{
            $stm = $db->prepare('SELECT * FROM schools ORDER BY schoolName');
            $stm->execute();
            $schools = $stm->fetchAll();
            $stm->closeCursor();
        }catch(PDOException $e){
            echo $error_message= 'Error :'.$e->getMessage();
        }
        return $schools;
    }

    
    function getSchool($schoolID){
        global $db;
        try{
            $stm = $db->prepare('SELECT * FROM schools WHERE schoolID = :schoolID');
            $stm->bindValue(':schoolID', $schoolID);
            $stm->execute();
            $school = $stm->fetch();
            $stm->closeCursor();
        }catch(PDOException $e){
            echo $error_message = 'Error :'.$e->getMessage();
        }
            return $school;
    }

    function getSchoolName($schoolID){
        try{
            global $db;
            $stm = $db->prepare('SELECT schoolName FROM schools WHERE schoolID = :schoolID');
            $stm->bindValue(':schoolID', $schoolID);
            $stm->execute();
            $school = $stm->fetch();
            $stm->closeCursor();
        }catch(PDOException $e){
            echo $error_message = 'Error :'.$e->getMessage();
        }
            return $school;
    }

    function getSchoolState($schoolID){
        try{
            global $db;
            $stm = $db->prepare('SELECT schoolState FROM schools WHERE schoolID = :schoolID');
            $stm->bindValue(':schoolID', $schoolID);
            $stm->execute();
            $school = $stm->fetch();
            $stm->closeCursor();
        }catch(PDOException $e){
            echo $error_message = 'Error :'.$e->getMessage();
        }
            return $school;
    }

    function getSchoolLogo($schoolID){
        try{
            global $db;
            $stm = $db->prepare('SELECT schoolLogoPath FROM schools WHERE schoolID = :schoolID');
            $stm->bindValue(':schoolID', $schoolID);
            $stm->execute();
            $school = $stm->fetch();
            $stm->closeCursor();
        }catch(PDOException $e){
            echo $error_message = 'Error :'.$e->getMessage();
        }
            return $school;
    }

    function getSchoolAddress($schoolID){
        try{
            global $db;
            $stm = $db->prepare('SELECT schoolAddress FROM schools WHERE schoolID = :schoolID');
            $stm->bindValue(':schoolID', $schoolID);
            $stm->execute();
            $school = $stm->fetch();
            $stm->closeCursor();
        }catch(PDOException $e){
            echo $error_message = 'Error :'.$e->getMessage();
        }
            return $school;
    }

    function getSchoolWebsite($schoolID){
        try{
            global $db;
            $stm = $db->prepare('SELECT schoolWebsite FROM schools WHERE schoolID = :schoolID');
            $stm->bindValue(':schoolID', $schoolID);
            $stm->execute();
            $school = $stm->fetch();
            $stm->closeCursor();
        }catch(PDOException $e){
            echo $error_message = 'Error :'.$e->getMessage();
        }
            return $school;
    }

    
    function updateSchoolName($schoolName, $schoolID){
        try{
            global $db;
            $stm = $db->prepare('UPDATE schools SET schoolName = :schoolName WHERE schoolID = :schoolID');
            $stm->bindValue(':schoolID', $schoolID);
            $stm->bindValue(':schoolName', $schoolName);
            $stm->execute();
            $stm->closeCursor();
        }catch(PDOException $e){
            echo $error_message = 'Error :'.$e->getMessage();
        }
    }

    function updateSchoolState($schoolState, $schoolID){
        try{
            global $db;
            $stm = $db->prepare('UPDATE schools SET schoolState = :schoolState WHERE schoolID = :schoolID');
            $stm->bindValue(':schoolID', $schoolID);
            $stm->bindValue(':schoolState', $schoolState);
            $stm->execute();
            $stm->closeCursor();
        }catch(PDOException $e){
            echo $error_message = 'Error :'.$e->getMessage();
        }
    }

    function updateSchoolLogo($schoolLogo, $schoolID){
        try{
            global $db;
            $stm = $db->prepare('UPDATE schools SET schoolLogo = :schoolLogo WHERE schoolID = :schoolID');
            $stm->bindValue(':schoolID', $schoolID);
            $stm->bindValue(':schoolLogo', $schoolLogo);
            $stm->execute();
            $stm->closeCursor();
        }catch(PDOException $e){
            echo $error_message = 'Error :'.$e->getMessage();
        }
    }

    function updateSchoolAddress($schoolAddress, $schoolID){
        try{
            global $db;
            $stm = $db->prepare('UPDATE schools SET schoolAddress = :schoolAddress WHERE schoolID = :schoolID');
            $stm->bindValue(':schoolID', $schoolID);
            $stm->bindValue(':schoolAddress', $schoolAddress);
            $stm->execute();
            $stm->closeCursor();
        }catch(PDOException $e){
            echo $error_message = 'Error :'.$e->getMessage();
        }
    }

    function updateSchoolWebsite($schoolAddress, $schoolID){
        try{
            global $db;
            $stm = $db->prepare('UPDATE schools SET schoolWebsite = :schoolWebsite WHERE schoolID = :schoolID');
            $stm->bindValue(':schoolID', $schoolID);
            $stm->bindValue(':schoolWebsite', $schoolWebsite);
            $stm->execute();
            $stm->closeCursor();
        }catch(PDOException $e){
            echo $error_message = 'Error :'.$e->getMessage();
        }
    }
    function searchSchool($SearchKey){
        try{
            global $db;
            $stm = $db->prepare('SELECT * FROM schools WHERE schoolName LIKE "%'.$SearchKey.'%"');
            $stm->execute();
            $school = $stm->fetch();
            $stm->closeCursor();
        }catch(PDOException $e){
            echo $error_message = 'Error :'.$e->getMessage();
        }
            return $school;
    }

    function deleteSchool($schoolID){
        try{
            global $db;
            $stm = $db->prepare('DELETE FROM schools WHERE schoolID = :schoolID');
            $stm->bindValue(':schoolID',$schoolID);
            $stm->execute();
            $rows = $stm->rowCount();
            $stm->closeCursor();
        }catch(PDOException $e){
            echo $error_message= 'Error :'.$e->getMessage();
        }
        return $rows;
    }

?>