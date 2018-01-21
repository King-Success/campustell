<?php
   
   function createCommentLike($commentID){
         try{
        global $db;
        $stm = $db->prepare('SELECT commentLikeCount FROM commentlike WHERE commentID = :commentID');
        $stm->bindValue(':commentID', $commentID);
        $stm->execute();
        $likes = $stm->fetch();
        $likes = $likes['commentLikeCount'] + 1;

        $stms = $db->prepare('UPDATE commentlike SET commentLikeCount = :likes WHERE commentID = :commentID');
        $stms->bindValue(':commentID', $commentID);
        $stms->bindValue(':likes', $likes);
        $stms->execute();
        $stms->closeCursor();
        }catch(PDOException $e){
            echo $error_message = 'Error : '.$e->getMessage();
        }
    }

    function getCommentLikeCount($commentID){
        try{
           global $db;
            $statement = $db->prepare('SELECT commentLikeCount FROM commentlike WHERE commentID = :commentID');
            $statement->bindValue(':commentID', $commentID);
            $statement->execute();
            $commentLike = $statement->fetch();
            $statement->closeCursor();
        }catch(PDOException $e){
            echo $error_message = 'Error :'.$e->getMessage();
        }
            return $commentLike['commentLikeCount'];
    }


?>