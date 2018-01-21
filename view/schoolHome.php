<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="robots" content="all,follow">
    <meta name="googlebot" content="index,follow,snippet,archive">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Obaju e-commerce template">
    <meta name="author" content="Ondrej Svestka | ondrejsvestka.cz">
    <meta name="keywords" content="">

    <title>
        Obaju : e-commerce template
    </title>

    <meta name="keywords" content="">

    <link href='http://fonts.googleapis.com/css?family=Roboto:400,500,700,300,100' rel='stylesheet' type='text/css'>

    <!-- styles -->
    <link href="../css/font-awesome.css" rel="stylesheet">
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/animate.min.css" rel="stylesheet">
    <link href="../css/owl.carousel.css" rel="stylesheet">
    <link href="../css/owl.theme.css" rel="stylesheet">

    <!-- theme stylesheet -->
    <link href="../css/style.default.css" rel="stylesheet" id="theme-stylesheet">

    <!-- your stylesheet with modifications -->
    <link href="../css/custom.css" rel="stylesheet">

    <script src="../js/respond.min.js"></script>

    <link rel="shortcut icon" href="../favicon.png">



</head>

<body>

    <!-- *** TOPBAR ***
 _________________________________________________________ -->
    <div id="top">
        <div class="container" >
            <?php if(isset($status) && $status == 'Not logged In'){ ?>
                <div class="col-md-6">
                    <a href=""><h5><?php echo $school['schoolName']; ?></h5></a>
                </div>
                <div class="col-md-6" data-animate="fadeInDown">
                    <ul class="menu">
                        <form action="../controller/route.php" method="POST">
                            <input type="hidden" name="action" value="login">
                            <input type="" name="email" value="" placeholder="Email"><span><input type="password" name="password" value="" placeholder="Password"><span><input type="submit" name="" value="Login"></span></span>
                            <?php if(isset($error_message)){
                                echo $error_message;
                            }?>
                            <h6><a href="">Forgot password?</a> <br><a href="">Not registered</a></h6>
                        </form>
                    </ul>
                </div>
            <?php }else{ ?>
                <div class="container">
                    <a href=""><h5><?php echo $school['schoolName']; ?></h5></a>
                </div>    
            <?php } ?>
        </div>
    </div>
                    <!-- *** TOP BAR END *** -->

                    <!-- MAIN BOX STARTS -->
<div class="container-fluid mainContainer">
    <?php if(isset($_SESSION['profile'])){ ?>
       <div class="col-sm-5 col-sm-offset-3" style="background:white;">
            <div class="row">
                <a href=""><img class="profilePic"  src="<?php echo $_SESSION['profile']['profilePicPath']; ?>" alt=""></a><i><a class="userName" href=""><?php echo $_SESSION['profile']['firstName'].' '.$_SESSION['profile']['lastName']; ?></a></i>
            </div>
                    <!-- Status and photo upload starts -->
            <div class="row text-center">
                <form action="../controller/route.php" method="POST">
                    <input type="hidden" name="action" value="post">
                    <textarea class="status text-center" rows="3" cols="50" name="postContent"></textarea><span></span>
                    <input class="photoUpload" type="file" name="postImage" value="">
                    <input class="btn" type="submit" name="submit" value="Submit">
                </form>
            </div>
                    <!-- Status and photo upload ends -->
        </div> 
    <?php } ?>
    <?php foreach($posts as $post) : 
        $userInfo = getProfile($post['profileID']);
        $postContent = getPostContent($post['postID']);
    ?>
                    <!-- *** MEDIUM BOX***  -->
    <div class="col-sm-5 col-sm-offset-3 mediumContainer">
                     <!-- *** User picture and name starts ***  -->
        <div class="row">
            <a href=""><img class="userPic"  src="<?php echo $userInfo['profilePicPath']; ?>" alt=""></a><i><a class="userName" href=""><?php echo $userInfo['firstName'].' '.$userInfo['lastName']; ?></a></i>
        </div>
                    <!-- *** User picture and name ends***  -->
                    <!-- *** Post image with like and comment and caption starts***  -->

        <div class="col-sm-8 col-sm-offset-2 text-center postContents ">
            <figure>
                 <a href="" ><img class="postImage" src="<?php echo $post['postImagePath']; ?>" alt=""></a>
                 <br>
                 <figcaption><p class="caption"><?php echo $postContent; ?></P></figcaption>
            </figure>
           
            <div class="row" id="likeComment">
                <b class="likeCount"><?php echo $post['postLikeCount']; ?></b> <br><span><a class="likeLink" href="route.php?action=like&schoolID=<?php echo $schoolID; ?>&postID=<?php echo $post['postID']; ?><?php if(isset($status)){ ?>&status=<?php echo $status;}?>"><i class="fa fa-heart" ></i></a></span><br>
                <b class="commentCount"><?php echo $post['postCommentCount']; ?></b> <br><span><a class="commentLink" href="route.php?action=comment&schoolID=<?php echo $schoolID; ?>&postID=<?php echo $post['postID']; ?><?php if(isset($status)){ ?>&status=<?php echo $status;}?>" ><i class="text-right">Comment</i></a></span>
                <p class="error"><?php if(isset($message)){ echo $message; } ?></p>
            </div>
            <div class="row text-center">
                <form action="">
                    <textarea class="commentBox text-center" rows="1" cols="30" placeholder=""></textarea>
                </form>
            </div>
        </div>
                    <!-- ***Post image with like and comment and caption ends***  -->
    </div>
                    <!-- *** MEDIUM BOX END***  -->
    <?php endforeach;   ?>
</div>
                    <!-- MAIN BOX ENDS -->
                    <!-- *** COPYRIGHT ***
 _________________________________________________________ -->
        <div id="copyright">
            <div class="container">
                <div class="col-md-6">
                    <p class="pull-left">© 2015 Your name goes here.</p>

                </div>
                <div class="col-md-6">
                    <p class="pull-right">
                            <a href="#" class="facebook external" data-animate-hover="shake"><i class="fa fa-facebook"></i></a>
                            <a href="#" class="twitter external" data-animate-hover="shake"><i class="fa fa-twitter"></i></a>
                            <a href="#" class="instagram external" data-animate-hover="shake"><i class="fa fa-instagram"></i></a>
                            <a href="#" class="gplus external" data-animate-hover="shake"><i class="fa fa-google-plus"></i></a>
                            <a href="#" class="email external" data-animate-hover="shake"><i class="fa fa-envelope"></i></a>
                    </p>
                </div>
            </div>
        </div>
        <!-- *** COPYRIGHT END *** -->



    </div>
    <!-- /#all -->


      

    <!-- *** SCRIPTS TO INCLUDE ***
 _________________________________________________________ -->
    <script src="./js/jquery-1.11.0.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/jquery.cookie.js"></script>
    <script src="../js/waypoints.min.js"></script>
    <script src="../js/modernizr.js"></script>
    <script src="../js/bootstrap-hover-dropdown.js"></script>
    <script src="../js/owl.carousel.min.js"></script>
    <script src="../js/front.js"></script>


</body>

</html>