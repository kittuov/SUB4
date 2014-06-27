<?php
ob_start();
echo '<form action="index.php" method="POST" id="post_body">
            <input type="text" name="post" id="post_content" />
            <input type="submit" value="POST!" id="post_b"/>
        </form>
        <form action="index.php" method="post" name="form1" hidden >
        <input type="text" name="delpost" id="delpost"/>
        <input type="submit" name="del" id="del"/>
        </form>
';

$post_query= "SELECT * FROM `posts` ORDER BY `time_stamp` DESC" ;
$post_query_run=mysql_query($post_query);
while ($post_query_row=mysql_fetch_assoc($post_query_run))
{
    $id=$post_query_row['user_id'];
    $post=$post_query_row['content'];
    $time=$post_query_row['time_stamp'];
    $hrs=date('H',$time);
    $mins=date('i',$time);
    $date=date('d M Y',$time);
    if ($hrs>12)
    {
        $hrs-=12;
        $apm='PM';
    }
    else $apm='AM';
    
    $completedate='<strong>'.$hrs.':'.$mins.' '.$apm.' </strong>'.$date;
    echo
        '<section class="post" >
            <header class="post_header">
                <h3>'.getusername($id).'</h3>
                <form action="index.php" method="post" >
                <input type="text" name="del" value="'.$post_query_row['id'].'" hidden />
                <input type="submit" value="delete"  style="float:right;"  id="a'.$post_query_row['id'].'" class="delete"/>
                </form>
            </header>
            <article class="post_article">'.$post.'</article>
            <footer class="post_footer">'.$completedate.'</footer> 
            '.getcomments($post_query_row["id"]).'
            <form action="index.php" method="post" id="commentform">
                <input type="text" name="post_id" value="'.$post_query_row['id'].'" hidden/>
                <input type="text" name="comment" id="commentform"/>
                <input type="submit" hidden/>
            </form>
        </section>';
  
}
function getcomments($id)
{
    $query="SELECT  `comment`, `id` , `user_id`, `time_stamp` FROM `comments` WHERE `post_id` = '$id' ORDER BY `time_stamp` ASC";
    if ($query_run=mysql_query($query))
    {
        $value=null;
        while ($query_row=mysql_fetch_assoc($query_run))
        {
            $username=getusername($query_row["user_id"]);
            $value.='<article id="comments_body"> <section id="comment">
                <header><h3>'.$username.'</h3></header>
                <article>'.$query_row["comment"].'</article>
                <footer>'.$query_row["time_stamp"].'</footer>
            </section></article>';
        }
        return $value;
    }else return "queryfail";
}
?>