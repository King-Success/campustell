<?php
    
    function createPostLike($postID){
         try{
             global $db;
        $stm = $db->prepare('SELECT postLikeCount FROM postlike WHERE postID = :postID');
        $stm->bindValue(':postID', $postID);
        $stm->execute();
        $likes = $stm->fetch();
        $likes = $likes['postLikeCount'] + 1;

        $stms = $db->prepare('UPDATE postlike SET postLikeCount = :likes WHERE postID = :postID');
        $stms->bindValue(':postID', $postID);
        $stms->bindValue(':likes', $likes);
        $stms->execute();
        $stms->closeCursor();
        }catch(PDOException $e){
            echo $error_message = 'Error : '.$e->getMessage();
        }
    }

    function getPostLikeCount($postID){
        try{
           global $db;
            $statement = $db->prepare('SELECT postLikeCount FROM postlike WHERE postID = :postID');
            $statement->bindValue(':postID', $postID);
            $statement->execute();
            $postLike = $statement->fetch();
            $statement->closeCursor();
        }catch(PDOException $e){
            echo $error_message = 'Error :'.$e->getMessage();
        }
            return $postLike['postLikeCount'];
    }


?>