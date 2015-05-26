<?php
use classes\CMySQL;

require_once('../../classes/CMySQL.php');
//$sDbName = 'gimension';
//$sDbUser = 'root';
//$sDbPass = '';

$_SESSION['MySQL'] = new CMySQL();
$vLink = $_SESSION['MySQL'];

if(isset($_GET['scrolling'])) {
//    $link =  "//$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
//    $escaped_link = htmlspecialchars($link, ENT_QUOTES, 'UTF-8');
    //echo $escaped_link;
    session_start();
    //echo $_SESSION['category_id'];
    //echo $_SESSION['url'];

    //$_GET['action'] - NE RABOTI ZASHTOTO URL-to E OT AJAX ZAQVKATA

    if($_SESSION['url'] == 'Games'){

    $query = "select *
             from game
             limit " . $_GET['scrolling'] . ', ' . 4;
    } else{

    $query = "select *
               FROM game inner join game_category using (game_id)
               WHERE category_id = " . $_SESSION['category_id'] .
              "
              limit " . $_GET['scrolling'] . ', ' . 4;
        //var_dump($query);
    }

    //$result = mysql_query($vLink, $query);
    $result = $vLink->res($query);
    //var_dump($result);
    $i  = $_GET['scrolling'];
        while($row = mysql_fetch_object($result)) {

            $description = substr($row->description, 0, 700);

            $seeMore = "<a class='see' href='index.php?action=Game&game_id=" . $row->game_id ."'>see more...</a>";

            $description .= ' ' . $seeMore;

            echo "<article class='games game" . $i ."'>";
            // $i++;
            echo "<h3><a href='index.php?action=Game&game_id=" .  $row->game_id ."'>" .  $row->name . "</a>";

            echo '</h3>';
            echo "<a href='index.php?action=Game&game_id=" .  $row->game_id ."'>";
            echo "<div class='render_game'><img class=\"img-article\" src='images/games/" .  $row->main_picture . "' alt='logo'></a>";

            echo "<p><span class='bold' id='description'>" . $description . "</span>";

            echo '</p></div>
                </article>';

            // $output .= $row->name . ' ' . $row->game_id . ' ';
            $i++;
        }


}
