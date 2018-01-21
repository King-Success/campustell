<?php
    //Include model files
    include '../model/database.php';
    include '../model/comment.php';
    include '../model/commentLike.php';
    include '../model/commentReply.php';
    include '../model/commentReplyLike.php';
    include '../model/post.php';
    include '../model/postLike.php';
    include '../model/profile.php';
    include '../model/school.php';
    include '../model/user.php';
    include '../model/login_register.php';
    include '../model/online.php';
 
    
    //Checking for GET or POST request
    if(isset($_POST['action'])){
        $action = $_POST['action'];
    }elseif(isset($_GET['action'])){
        $action = $_GET['action'];
    }else{
        $action = 'home';
    }

    switch($action){
        case 'home':
            $schools = getSchools();
            include '../index.php';
            break;

        case 'add_school':
            $schoolName = $_POST['schoolName'];
            $schoolState = $_POST['schoolState'];
            $schoolLogoPath = $_POST['schoolLogoPath'];
            $schoolAddress = $_POST['schoolAddress'];
            $schoolWebsite = $_POST['schoolWebsite'];
            addSchool($schoolName, $schoolState, $schoolLogoPath, $schoolAddress, $schoolWebsite);
            $schools = getSchools();
            include '../index.php';
            break;

        case 'page':
            $schoolID = $_GET['schoolID'];
            $school = getSchool($schoolID);
            $posts = getPostByschool($schoolID);
            $status = "Not logged In";
            include '../view/schoolHome.php';
            break;

        case 'like':
            if(isset($_GET['status'])){
                $schoolID = $_GET['schoolID'];
                $school = getSchool($schoolID);
                $posts = getPostByschool($schoolID);
                $status = "Not logged In";
                $message = "Login to like a post!";
                include '../view/schoolHome.php';
                break;
        }else{
                $schoolID = $_GET['schoolID'];
                $school = getSchool($schoolID);
                $postID = $_GET['postID'];
                updatePostLikeCount($postID);
                $posts = getPostByschool($schoolID);
                include '../view/schoolHome.php';
                break;
        }
        

        case 'comment':
            if(isset($_GET['status'])){
                $schoolID = $_GET['schoolID'];
                $school = getSchool($schoolID);
                $posts = getPostByschool($schoolID);
                $status = "Not logged In";
                $message = "Login to comment on a post!";
                include '../view/schoolHome.php';
                break;
            }else{
                $schoolID = $_GET['schoolID'];
                $school = getSchool($schoolID);
                $postID = $_GET['postID'];
                updatePostCommentCount($postID);
                $posts = getPostByschool($schoolID);
                include '../view/schoolHome.php';
                break;
            }
        

        case 'login':
            $email = $_POST['email'];
            $password = $_POST['password'];
            if(empty($email) || empty($password)){
                $error_message = "<h6>Email and Password are required fields.</h6>";
                $schools = getSchools();
                include '../index.php';
                break;
            }else{
                if(isUser($password) == true){
                    $userID = getValidUser($password);
                    $profile = login($userID);
                    $schoolID = $profile['schoolID'];
                    $school = getSchool($schoolID);;
                    $posts = getPostByschool($schoolID);
                    include '../view/schoolHome.php';
                    break;
                }else{
                    $error_message = "<h6>Invalid user information.please try again.</h6>";
                    $schools = getSchools();
                    include '../index.php';
                    break;
                }
            }

            case 'post':
                $postContent = filter_input(INPUT_POST,'postContent');
                $postImage = filter_input(INPUT_POST,'postImage');
                $profileID = $_SESSION['profile']['profileID'];
                $schoolID = $_SESSION['profile']['schoolID'];
                if($status == true && $postPic == true){
                    if(createPost($profileID, $postContent, $postImage,0,0)){
                        $schoolID = $_SESSION['profile']['schoolID'];
                        $school = getSchool($_SESSION['profile']['schoolID']);
                        $posts = getPostByschool($_SESSION['profile']['schoolID']);
                        include '../view/schoolHome.php';
                    }
                    
                }
}
?>