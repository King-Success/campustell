<?php
    
    function createCommentReply($commentID, $commentReplyContent, $commentReplyLikeCount){
         try{
        $stm = $db->prepare('INSERT INTO commentreply  (commentID, commentReplyContent, commentReplyLikeCount) 
                                    VALUES (:commentID, :commentReplyContent, :commentReplyLikeCount)');
        $stm->bindValue(':commentID', $commentID);
        $stm->bindValue(':commentReplyContent', $commentReplyContent);
        $stm->bindValue(':commentReplyLikeCount', $commentReplyLikeCount);
        $stm->execute();
        $stm->closeCursor();
        }catch(PDOException $e){
            echo $error_message = 'Error : '.$e->getMessage();
        }
    }

    function getCommentReply($commentID){
        try{
            $stm = $db->prepare('SELECT * FROM commentreply WHERE commentID = :commentID ORDER BY commentID');
            $stm->bindValue(':commentID', $commentID);
            $stm->execute();
            $commentReply = $stm->fetchAll();
            $stm->closeCursor();
        }catch(PDOException $e){
            echo $error_message = 'Error :'.$e->getMessage();
        }
            return $commentReply;
    }

    function getCommentReplyCount($commentID){
        try{
            $stm = $db->prepare('SELECT * FROM commentreply WHERE commentID = :commentID');
            $stm->bindValue(':commentID', $commentID);
            $stm->execute();
            $stm->fetchAll();
            $rows = $stm->rowCount();
            $stm->closeCursor();
        }catch(PDOException $e){
            echo $error_message = 'Error :'.$e->getMessage();
        }
            return $rows;
    }

    function updateCommentReplyContent($commentReplyContent, $commentReplyID){
        try{
            $stm = $db->prepare('UPDATE commentreply SET commentReplyContent = :commentReplyContent WHERE commentReplyID = :commentReplyID');
            $stm->bindValue(':commentReplyID', $commentReplyID);
            $stm->bindValue(':commentReplyContent', $commentReplyContent);
            $stm->execute();
            $stm->closeCursor();
        }catch(PDOException $e){
            echo $error_message = 'Error :'.$e->getMessage();
        }
    }

    function updateCommentReplylikeCount($commentReplyLikeCount, $commentReplyID){
        try{
            global $db;
            $stm = $db->prepare('UPDATE commentreply SET commentReplyLikeCount = :commentReplyLikeCount WHERE commentReplyID = :commentReplyID');
            $stm->bindValue(':commentReplyID', $commentReplyID);
            $stm->bindValue(':commentReplyLikeCount', $commentReplyLikeCount);
            $stm->execute();
            $stm->closeCursor();
        }catch(PDOException $e){
            echo $error_message = 'Error :'.$e->getMessage();
        }
    }

    function deleteCommentReply($commentReplyID){
        try{
            global $db;
            $stm = $db->prepare('DELETE FROM commentreply WHERE commentReplyID = :commentReplyID');
            $stm->bindValue(':commentReplyID',$commentReplyID);
            $stm->execute();
            $rows = $stm->rowCount();
            $stm->closeCursor();
        }catch(PDOException $e){
            echo $error_message= 'Error :'.$e->getMessage();
        }
        return $rows;
    }


?>