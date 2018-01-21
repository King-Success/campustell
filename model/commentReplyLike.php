<?php
    
    function createCommentReplyLike($commentReplyID){
         try{
             global $db;
        $stm = $db->prepare('SELECT commentReplyLikeCount FROM commentreplylike WHERE commentReplyID = :commentReplyID');
        $stm->bindValue(':commentReplyID', $commentReplyID);
        $stm->execute();
        $likes = $stm->fetch();
        $likes = $likes['commentReplyLikeCount'] + 1;

        $stms = $db->prepare('UPDATE commentreplylike SET commentReplyLikeCount = :likes WHERE commentReplyID = :commentReplyID');
        $stms->bindValue(':commentReplyID', $commentReplyID);
        $stms->bindValue(':likes', $likes);
        $stms->execute();
        $stms->closeCursor();
        }catch(PDOException $e){
            echo $error_message = 'Error : '.$e->getMessage();
        }
    }

    function getCommentReplyLikeCount($commentReplyID){
        try{
           global $db;
            $statement = $db->prepare('SELECT commentReplyLikeCount FROM commentreplylike WHERE commentReplyID = :commentReplyID');
            $statement->bindValue(':commentReplyID', $commentReplyID);
            $statement->execute();
            $commentReplyLike = $statement->fetch();
            $statement->closeCursor();
        }catch(PDOException $e){
            echo $error_message = 'Error :'.$e->getMessage();
        }
            return $commentReplyLike['commentReplyLikeCount'];
    }


?>