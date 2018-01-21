<?php
    include 'database.php';

    function createPost($profileID, $postContent, $postImagePath, $postCommentCount, $postLikeCount){
        try{
            global $db;
            $stm = $db->prepare('INSERT INTO posts (profileID, postContent, postImagePath, postCommentCount, postLikeCount)
                                             VALUES (:profileID, :postContent, :postImagePath, :postCommentCount, :postLikeCount)');
            $stm->bindValue(':profileID',$profileID);
            $stm->bindValue(':postContent',$postContent);
            $stm->bindValue(':postImagePath',$postImagePath);
            $stm->bindValue(':postCommentCount',$postCommentCount);
            $stm->bindValue(':postLikeCount',$postLikeCount);
            $stm->execute();
            $stm->closeCursor();
        }catch(PDOException $e){
            echo $error_message = 'Error :'.$e->getMessage();
        }
    }

    function getPosts(){
        try{
            global $db;
            $stm = $db->prepare('SELECT * FROM posts');
            $stm->execute();
            $posts = $stm->fetchAll();
            $stm->closeCursor();
        }catch(PDOException $e){
            echo $error_message= 'Error :'.$e->getMessage();
        }
        return $posts;
    }

    
    function getPostByUser($userID){
        try{
            global $db;
            $stm = $db->prepare('SELECT * FROM posts WHERE userID = :userID');
            $stm->bindValue(':userID', $userID);
            $stm->execute();
            $posts = $stm->fetchAll();
            $stm->closeCursor();
        }catch(PDOException $e){
            echo $error_message = 'Error :'.$e->getMessage();
        }
            return $posts;
    }

    function getPostByschool($schoolID){
        global $db;
        try{
            $stm = $db->prepare('SELECT * FROM posts WHERE schoolID = :schoolID');
            $stm->bindValue(':schoolID', $schoolID);
            $stm->execute();
            $posts = $stm->fetchAll();
            $stm->closeCursor();
        }catch(PDOException $e){
            echo $error_message = 'Error :'.$e->getMessage();
        }
            return $posts;
    }
    function getPostUserFullName($postID){
        try{
            global $db;
            $stm = $db->prepare('SELECT firstName,lastName FROM posts p INNER JOIN userProfile u ON p.profileID = u.profileID
                                         WHERE postID = :postID');
            $stm->bindValue(':postID', $postID);
            $stm->execute();
            $user = $stm->fetch();
            $stm->closeCursor();
        }catch(PDOException $e){
            echo $error_message = 'Error :'.$e->getMessage();
        }
            return $user['firstName'].' '.$user['lastName'];
    }

    function getPostContent($postID){
         global $db;
        try{
            $stm = $db->prepare('SELECT postContent FROM posts WHERE postID = :postID');
            $stm->bindValue(':postID', $postID);
            $stm->execute();
            $content = $stm->fetch();
            $stm->closeCursor();
        }catch(PDOException $e){
            echo $error_message = 'Error :'.$e->getMessage();
        }
            return $content['postContent'];
    }

    function getPostImagePath($postID){
        try{
            global $db;
            $stm = $db->prepare('SELECT postImagePath FROM posts WHERE postID = :postID');
            $stm->bindValue(':postID', $postID);
            $stm->execute();
            $imagePath = $stm->fetch();
            $stm->closeCursor();
        }catch(PDOException $e){
            echo $error_message = 'Error :'.$e->getMessage();
        }
            return $imagePath['postImagePath'];
    }

    function updatePostLikeCount($postID){
         try{
        global $db;
        $stm = $db->prepare('SELECT postLikeCount FROM posts WHERE postID = :postID');
        $stm->bindValue(':postID', $postID);
        $stm->execute();
        $likes = $stm->fetch();
        $likes = $likes['postLikeCount'] + 1;

        $stms = $db->prepare('UPDATE posts SET postLikeCount = :likes WHERE postID = :postID');
        $stms->bindValue(':postID', $postID);
        $stms->bindValue(':likes', $likes);
        $stms->execute();
        $stms->closeCursor();
        }catch(PDOException $e){
            echo $error_message = 'Error : '.$e->getMessage();
        }
    }

    function updatePostCommentCount($postID){
         try{
        global $db;
        $stm = $db->prepare('SELECT postCommentCount FROM posts WHERE postID = :postID');
        $stm->bindValue(':postID', $postID);
        $stm->execute();
        $comment = $stm->fetch();
        $comment = $comment['postCommentCount'] + 1;

        $stms = $db->prepare('UPDATE posts SET postCommentCount = :comment WHERE postID = :postID');
        $stms->bindValue(':postID', $postID);
        $stms->bindValue(':comment', $comment);
        $stms->execute();
        $stms->closeCursor();
        }catch(PDOException $e){
            echo $error_message = 'Error : '.$e->getMessage();
        }
    }

    // function getPostCommentCount($postID){
    //     try{
    //         $stm = dbConnect()->prepare('SELECT postCommentCount FROM posts WHERE postID = :postID');
    //         $stm->bindValue(':postID', $postID);
    //         $stm->execute();
    //         $commentCount = $stm->fetch();
    //         $stm->closeCursor();
    //     }catch(PDOException $e){
    //         echo $error_message = 'Error :'.$e->getMessage();
    //     }
    //         return $commentCount['postCommentCount'];
    // }

    // function getPostLikeCount($postID){
    //     try{
    //         $stm = dbConnect()->prepare('SELECT postLikeCount FROM posts WHERE postID = :postID');
    //         $stm->bindValue(':postID', $postID);
    //         $stm->execute();
    //         $likeCount = $stm->fetch();
    //         $stm->closeCursor();
    //     }catch(PDOException $e){
    //         echo $error_message = 'Error :'.$e->getMessage();
    //     }
    //         return $likeCount['postLikeCount'];
    // }

    function updatePost($userID, $postContent, $postImagePath, $postCommentCount, $postLikeCount, $postID){
        try{
            global $db;
            $stm = $db->prepare('UPDATE posts SET userID = :userID, postContent = :postContent, 
                                        postImagePath = :postImagePath, postCommentCount = :postCommentCount,
                                        postLikeCount = :postLikeCount WHERE postID = :postID');
             $stm->bindValue('userID',$userID);
            $stm->bindValue(':postContent',$postContent);
            $stm->bindValue('postImagePath',$postImagePath);
            $stm->bindValue('postCommentCount',$postCommentCount);
            $stm->bindValue('postLikeCount',$postLikeCount);
            $stm->bindValue('postID',$postID);
            $stm->execute();
            $stm->closeCursor();
        }catch(PDOException $e){
            echo $error_message = 'Error :'.$e->getMessage();
        }
    }

    function deletePost($postID){
        try{
            global $db;
            $stm = $db->prepare('DELETE FROM posts WHERE postID = :postID');
            $stm->bindValue(':postID',$postID);
            $stm->execute();
            $rows = $stm->rowCount();
            $stm->closeCursor();
        }catch(PDOException $e){
            echo $error_message= 'Error :'.$e->getMessage();
        }
        return $rows;
    }
?>