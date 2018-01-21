<?php
    
    function createComment($postID, $commentContent, $commentImagePath, $commentLikeCount, $commentReplyCount){
         try{
             global $db;
        $stm = $db->prepare('INSERT INTO comments  (postID, commentContent, commentImagePath, commentLikeCount, 
                                    commentReplyCount) VALUES (:postID, :commentContent, :commentImagePath,
                                    :commentLikeCount, :commentReplyCount)');
        $stm->bindValue(':postID', $postID);
        $stm->bindValue(':commentContent', $commentContent);
        $stm->bindValue(':commentImagePath', $commentImagePath);
        $stm->bindValue(':commentLikeCount', $commentLikeCount);
        $stm->bindValue(':commentReplyCount', $commentReplyCount);
        $stm->execute();
        $stm->closeCursor();
        }catch(PDOException $e){
            echo $error_message = 'Error : '.$e->getMessage();
        }
    }

    function getPostComments($postID){
        try{
            global $db;
            $stm = $db->prepare('SELECT * FROM comments WHERE postID = :postID ORDER BY postID');
            $stm->bindValue(':postID', $postID);
            $stm->execute();
            $comments = $stm->fetchAll();
            $stm->closeCursor();
        }catch(PDOException $e){
            echo $error_message = 'Error :'.$e->getMessage();
        }
            return $comments;
    }

    function getPostCommentCount($postID){
        try{
            global $db;
            $stm = $db->prepare('SELECT * FROM comments WHERE postID = :postID');
            $stm->bindValue(':postID', $postID);
            $stm->execute();
            $stm->fetchAll();
            $rows = $stm->rowCount();
            $stm->closeCursor();
        }catch(PDOException $e){
            echo $error_message = 'Error :'.$e->getMessage();
        }
            return $rows;
    }

    function updateCommentContent($commentContent, $commentID){
        try{
            global $db;
            $stm = $db->prepare('UPDATE comments SET commentContent = :commentContent WHERE commentID = :commentID');
            $stm->bindValue(':commentID', $commentID);
            $stm->bindValue(':commentContent', $commentContent);
            $stm->execute();
            $stm->closeCursor();
        }catch(PDOException $e){
            echo $error_message = 'Error :'.$e->getMessage();
        }
    }

    function updateCommentImage($commentImage, $commentID){
        try{
            global $db;
            $stm = $db->prepare('UPDATE comments SET commentImagePath = :commentImage WHERE commentID = :commentID');
            $stm->bindValue(':commentID', $commentID);
            $stm->bindValue(':commentImage', $commentImage);
            $stm->execute();
            $stm->closeCursor();
        }catch(PDOException $e){
            echo $error_message = 'Error :'.$e->getMessage();
        }
    }

    function updateCommentlikeCount($commentLikeCount, $commentID){
        try{
            global $db;
            $stm = $db->prepare('UPDATE comments SET commentLikeCount = :commentLikeCount WHERE commentID = :commentID');
            $stm->bindValue(':commentID', $commentID);
            $stm->bindValue(':commentLikeCount', $commentLikeCount);
            $stm->execute();
            $stm->closeCursor();
        }catch(PDOException $e){
            echo $error_message = 'Error :'.$e->getMessage();
        }
    }

    function updateCommentReplyCount($commentReplyCount, $commentID){
        try{
            global $db;
            $stm = $db->prepare('UPDATE comments SET commentReplyCount = :commentReplyCount WHERE commentID = :commentID');
            $stm->bindValue(':commentID', $commentID);
            $stm->bindValue(':commentReplyCount', $commentReplyCount);
            $stm->execute();
            $stm->closeCursor();
        }catch(PDOException $e){
            echo $error_message = 'Error :'.$e->getMessage();
        }
    }

    function deleteComment($commentID){
        try{
            global $db;
            $stm = $db->prepare('DELETE FROM comments WHERE commentID = :commentID');
            $stm->bindValue(':commentID',$commentID);
            $stm->execute();
            $rows = $stm->rowCount();
            $stm->closeCursor();
        }catch(PDOException $e){
            echo $error_message= 'Error :'.$e->getMessage();
        }
        return $rows;
    }



?>