<html>
<head>
    <meta charset="utf-8"/>
    <link type="text/css" rel="stylesheet" href="style.css"/>
    <script type="text/javascript" href="head.js"></script>
</head>
<body>
    
    <div id="body">
        <header id="main_header">
            <header>
                <h1>NoteBook</h1>
                <div class='tag'> A sequel of Facebook</div>
            </header>
            <a id='logout' class='head_button' href="signout.php"> Log Out</a>
            <div id='username' class='head_button' >Hi, <?php if (isset($userinfo['username'])) echo $userinfo['username']; else echo 'Guest';?></div>
        </header>
        <article id="content">
            <?php 
                mainmatter();
            ?>
            <iframe src="getcontent.php" width="100%" height="auto" id="posts_frame">
            ;alkdsfl;kasdf
            </iframe>
        </article>
        <footer id="main_foter">
            
        </footer>
        
    </div>    
    <script src="body.js" type="text/javascript">   
    </script>
</body>
</html>