<?php
    
   
   function createProfile($schoolID, $userID, $firstName, $lastName, $profilePicPath, $courseName, $dob,$relationship, $sex, $email){
        try{
            global $db;
        $stm = $db->prepare('INSERT INTO userProfile (schoolID, userID, firstName, lastName, profilePicPath, courseName, dob, relationship, sex, email)
                                                VALUES (:schoolID, :userID, :firstName, :lastName, :profilePicPath, :courseName, :dob, :relationship, :sex, :email)');
        $stm->bindValue(':schoolID', $schoolID);
        $stm->bindValue(':userID', $userID);
        $stm->bindValue(':firstName', $firstName);
        $stm->bindValue(':lastName', $lastName);
        $stm->bindValue(':profilePicPath', $profilePicPath);
        $stm->bindValue(':courseName', $courseName);
        $stm->bindValue(':dob', $dob);
        $stm->bindValue(':relationship', $relationship);
        $stm->bindValue(':sex', $sex);
        $stm->bindValue(':email', $email);
        $stm->execute();
        $stm->closeCursor();
        }catch(PDOException $e){
            echo $error_message = 'Error : '.$e->getMessage();
        }
    }

    function getProfile($profileID){
                global $db;
        try{
            $stm = $db->prepare('SELECT * FROM userProfile WHERE profileID = :profileID');
            $stm->bindValue(':profileID', $profileID);
            $stm->execute();
            $profile = $stm->fetch();
            $stm->closeCursor();
        }catch(PDOException $e){
            echo $error_message = 'Error :'.$e->getMessage();
        }
            return $profile;
    }

    function getProfileSchool($profileID){
        try{
            global $db;
            $stm = $db->prepare('SELECT schoolName, schoolAddress, schoolWebsite, schoolState, schoolLogoPath
                                        FROM userProfile u INNER JOIN schools s ON u.schoolID = s.schoolID WHERE
                                        profileID = :profileID');
            $stm->bindValue(':profileID', $profileID);
            $stm->execute();
            $school = $stm->fetch();
            $stm->closeCursor();
        }catch(PDOException $e){
            echo $error_message = 'Error :'.$e->getMessage();
        }
            return $school;
    }

    function getProfileFirstName($profileID){
        try{
            global $db;
            $stm = $db->prepare('SELECT firstName FROM userProfile WHERE profileID = :profileID');
            $stm->bindValue(':profileID', $profileID);
            $stm->execute();
            $firstName = $stm->fetch();
            $stm->closeCursor();
        }catch(PDOException $e){
            echo $error_message = 'Error :'.$e->getMessage();
        }
            return $firstName['firstName'];
    }

    function getProfileLastName($profileID){
        try{
            global $db;
            $stm = $db->prepare('SELECT lastName FROM userProfile WHERE profileID = :profileID');
            $stm->bindValue(':profileID', $profileID);
            $stm->execute();
            $lastName = $stm->fetch();
            $stm->closeCursor();
        }catch(PDOException $e){
            echo $error_message = 'Error :'.$e->getMessage();
        }
            return $lastName['lastName'];
    }

    function getProfileFullName($profileID){
        try{
            global $db;
            $stm = $db->prepare('SELECT firstName, lastName FROM userProfile WHERE profileID = :profileID');
            $stm->bindValue(':profileID', $profileID);
            $stm->execute();
            $fullName = $stm->fetch();
            $stm->closeCursor();
        }catch(PDOException $e){
            echo $error_message = 'Error :'.$e->getMessage();
        }
            return $fullName['firstName'].' '.$fullName['lastName'];
    }

    function getProfilePic($profileID){
        try{
            global $db;
            $stm = $db->prepare('SELECT profilePicPath FROM userProfile WHERE profileID = :profileID');
            $stm->bindValue(':profileID', $profileID);
            $stm->execute();
            $pic = $stm->fetch();
            $stm->closeCursor();
        }catch(PDOException $e){
            echo $error_message = 'Error :'.$e->getMessage();
        }
            return $pic['profilePicPath'];
    }

    function getDob($profileID){
        try{
            global $db;
            $stm = $db->prepare('SELECT dob FROM userProfile WHERE profileID = :profileID');
            $stm->bindValue(':profileID', $profileID);
            $stm->execute();
            $dob = $stm->fetch();
            $stm->closeCursor();
        }catch(PDOException $e){
            echo $error_message = 'Error :'.$e->getMessage();
        }
            return $dob['dob'];
    }

    function getRelationship($profileID){
        try{
            global $db;
            $stm = $db->prepare('SELECT relationship FROM userProfile WHERE profileID = :profileID');
            $stm->bindValue(':profileID', $profileID);
            $stm->execute();
            $relationship = $stm->fetch();
            $stm->closeCursor();
        }catch(PDOException $e){
            echo $error_message = 'Error :'.$e->getMessage();
        }
            return $relationship['relationship'];
    }

    function getSex($profileID){
        try{
            global $db;
            $stm = $db->prepare('SELECT sex FROM userProfile WHERE profileID = :profileID');
            $stm->bindValue(':profileID', $profileID);
            $stm->execute();
            $sex = $stm->fetch();
            $stm->closeCursor();
        }catch(PDOException $e){
            echo $error_message = 'Error :'.$e->getMessage();
        }
            return $sex['sex'];
    }

    function getEmail($profileID){
        try{
            global $db;
            $stm = $db->prepare('SELECT email FROM userProfile WHERE profileID = :profileID');
            $stm->bindValue(':profileID', $profileID);
            $stm->execute();
            $email = $stm->fetch();
            $stm->closeCursor();
        }catch(PDOException $e){
            echo $error_message = 'Error :'.$e->getMessage();
        }
            return $email['email'];
    }

    function getCourseName($profileID){
        try{
            global $db;
            $stm = $db->prepare('SELECT courseName FROM userProfile WHERE profileID = :profileID');
            $stm->bindValue(':profileID', $profileID);
            $stm->execute();
            $password = $stm->fetch();
            $stm->closeCursor();
        }catch(PDOException $e){
            echo $error_message = 'Error :'.$e->getMessage();
        }
            return $password['courseName'];
    }

    function updateProfileFirstName($newFirstName, $profileID){
        try{
            global $db;
            $stm = $db->prepare('UPDATE userProfile SET firstName = :newFirstName WHERE profileID = :profileID');
            $stm->bindValue(':profileID', $profileID);
            $stm->bindValue(':newFirstName', $newFirstName);
            $stm->execute();
            $stm->closeCursor();
        }catch(PDOException $e){
            echo $error_message = 'Error :'.$e->getMessage();
        }
    }

    function updateProfileLastName($newLastName, $profileID){
        try{
            global $db;
            $stm = $db->prepare('UPDATE userProfile SET lastName = :newLastName WHERE profileID = :profileID');
            $stm->bindValue(':profileID', $profileID);
            $stm->bindValue(':newLastName', $newLastName);
            $stm->execute();
            $stm->closeCursor();
        }catch(PDOException $e){
            echo $error_message = 'Error :'.$e->getMessage();
        }
    }

    function updateProfilePic($newProfilePic, $profileID){
        try{
            global $db;
            $stm = $db->prepare('UPDATE userProfile SET profilePicPath = :newProfilePic WHERE profileID = :profileID');
            $stm->bindValue(':profileID', $profileID);
            $stm->bindValue(':newProfilePic', $newProfilePic);
            $stm->execute();
            $stm->closeCursor();
        }catch(PDOException $e){
            echo $error_message = 'Error :'.$e->getMessage();
        }
    }

    function UpdateCourseName($courseName, $profileID){
        try{
            global $db;
            $stm = $db->prepare('UPDATE userProfile SET courseName = :courseName WHERE profileID = :profileID');
            $stm->bindValue(':profileID', $profileID);
            $stm->bindValue(':courseName', $courseName);
            $stm->execute();
            $stm->closeCursor();
        }catch(PDOException $e){
            echo $error_message = 'Error :'.$e->getMessage();
        }
    }

    function updateDob($newDob, $profileID){
        try{
            global $db;
            $stm = $db->prepare('UPDATE userProfile SET dob = :newDob WHERE profileID = :profileID');
            $stm->bindValue(':profileID', $profileID);
            $stm->bindValue(':newDob', $newDob);
            $stm->execute();
            $stm->closeCursor();
        }catch(PDOException $e){
            echo $error_message = 'Error :'.$e->getMessage();
        }
    }

    function updateRelationship($newRelationship, $profileID){
        try{
            global $db;
            $stm = $db->prepare('UPDATE userProfile SET relationship = :newRelationship WHERE profileID = :profileID');
            $stm->bindValue(':profileID', $profileID);
            $stm->bindValue(':newRelationship', $newRelationship);
            $stm->execute();
            $stm->closeCursor();
        }catch(PDOException $e){
            echo $error_message = 'Error :'.$e->getMessage();
        }
    }

    function updateSex($newSex, $profileID){
        try{
            global $db;
            $stm = $db->prepare('UPDATE userProfile SET sex = :newSex WHERE profileID = :profileID');
            $stm->bindValue(':profileID', $profileID);
            $stm->bindValue(':newSex', $newSex);
            $stm->execute();
            $stm->closeCursor();
        }catch(PDOException $e){
            echo $error_message = 'Error :'.$e->getMessage();
        }
    }

    function updateProfileEmail($newEmail, $profileID){
        try{
            global $db;
            $stm = $db->prepare('UPDATE userProfile SET Email = :newEmail WHERE profileID = :profileID');
            $stm->bindValue(':profileID', $profileID);
            $stm->bindValue(':newEmail', $newEmail);
            $stm->execute();
            $stm->closeCursor();
        }catch(PDOException $e){
            echo $error_message = 'Error :'.$e->getMessage();
        }
    }

    function updateProfileSchool($newSchoolID, $profileID){
        try{
            global $db;
            $stm = $db->prepare('UPDATE userProfile SET schoolID = :newSchoolID WHERE profileID = :profileID');
            $stm->bindValue(':profileID', $profileID);
            $stm->bindValue(':newSchoolID', $newSchoolID);
            $stm->execute();
            $stm->closeCursor();
        }catch(PDOException $e){
            echo $error_message = 'Error :'.$e->getMessage();
        }
    }

    function deleteProfile($profileID){
        try{
            global $db;
            $stm = $db->prepare('DELETE FROM userProfile WHERE profileID = :profileID');
            $stm->bindValue(':profileID',$profileID);
            $stm->execute();
            $rows = $stm->rowCount();
            $stm->closeCursor();
        }catch(PDOException $e){
            echo $error_message= 'Error :'.$e->getMessage();
        }
        return $rows;
    }



?>