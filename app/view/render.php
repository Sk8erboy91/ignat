<?php
namespace app\view;

class render {
//    public static function renderHead() {
//        echo '<!DOCTYPE html>
//				<html>
//					<head lang="en">
//						<meta name="viewport" content="width=device-width, initial-scale=1">
//						<meta charset="UTF-8">
//						<title>Gimension</title>
//						<link href="styles/index.css" rel="stylesheet">
//						<link href="styles/indexResponsive.css" rel="stylesheet">
//						<script src="js/customizer.js"></script>
//                        <link href="css/main.css" rel="stylesheet" type="text/css" />
//                        <link href="css/rooms.css" rel="stylesheet" type="text/css" />
//                        <script src="http://code.jquery.com/jquery-latest.min.js"></script>
//					</head>';
//    } ZAKOMENTIRANO E ZASHTOTO GO DOBAVIH V HTMLTemplate

    public static function renderIndexBody() {
        //self::renderHead();
        //echo '<body>';
        //self::renderHeader ();
        self::renderCategories ();
        self::renderCenter ();
        self::renderRecommendedGames ();
        self::renderLastVisitedGames ();
        //self::renderFooter ();
        //echo '</body>
		//	</html>';
    }

    public static function renderHeader() {
        echo '<header>';
        echo '<div class="img-container">
			<img id="pic" src="images/imperia.jpg" alt="game picture"> <a
				href="index.php"><img id="logo" src="images/logo.png"
				alt="logo"></a>';
        self::renderLogin ();
        echo '<div id="logo-name">
				<span>G</span>imension
			</div>
			
		</div>';
        self::renderSearch ();
        echo '<nav>
			<!--
        -->';
        self::renderMenu ();

        echo '</nav>
	    </header><main class="clearfix">';
    }

    public static function renderLogin() {
        echo '<div id="login">
				<form action="" method="post" >
                        <p class="login-row">
                            <label for="username">User name : </label>
                            <input type="text" name="username" id="username"  value=""/>
                       </p>
                       <p class="login-row">
                              <label for="password">Password :&nbsp;&nbsp; </label>
                              <input type="password" name="password" id="password" value=""/>
                        </p>
						<p class="login-row">
							<input type="checkbox" name="rememberusername" id="rememberUsername">
                  			<label for="rememberUsername" id="labelRemember">Remember username and password</label>
						</p>
						<p class="login-row" id="pLogin">
						    <input type="submit" id="loginbtn" value="Login"/>
						</p>
                        <p class="login-row">
                        <a href="forgot_password.php" id="forgottenUser">Forgotten username or password?</a>
                        </p>
       			 </form>
				</div>';
    }

    public static function renderMenu() {

        echo '<!--
	        --><a class="btn-menu" href="#">MENU</a>
	        	<ul class="menu">';

        $menuArray['HOME'] = 'index.php';
        $menuArray['NEWS'] = 'news.php';
        $menuArray['GALLERY'] = 'gallery.php';
        $menuArray['CONTACTS'] = 'contacts.php';
        $menuArray['ABOUT US'] = 'aboutus.php';

        foreach($menuArray as $key => $value)
        {
            echo "<li><a class=\"menu-nav\" href=\"". 'index.php' ."\"><span>$key</span></a></li>";
        }
    }

    public static function renderSearch() {
        echo '<div id="tfheader">
		<form id="tfnewsearch" method="get" action="http://www.google.com">
		        <input type="text" class="tftextinput" name="tftextinput" maxlength="120"><input type="submit" value="Search" class="tfbutton">
		</form>
	<div class="tfclear"></div>
	</div>';
    }

    public static function renderCategories() {
        echo '
	<aside>
		<section id="categories">
			<h1 class="section-title">CATEGORIES</h1>

			<div class="inline-div">
				<a class="see" href="#">Action</a>
			</div>


			<div class="inline-div">
				<a class="see" href="#">Adventure</a>
			</div>

			<div class="inline-div">
				<a class="see" href="#">Animal</a>
			</div>

			<div class="inline-div">
				<a class="see" href="#">Arcade</a>
			</div>

			<div class="inline-div">
				<a class="see" href="#">Board</a>
			</div>

			<div class="inline-div">
				<a class="see" href="#">Car</a>
			</div>

			<div class="inline-div">
				<a class="see" href="#">Card</a>
			</div>

			<div class="inline-div">
				<a class="see" href="#">Fighting</a>

			</div>


			<div class="inline-div">
				<a class="see" href="#">Medieval</a>
			</div>

			<div class="inline-div">
				<a class="see" href="#">Puzzle</a>
			</div>


			<div class="inline-div">
				<a class="see" href="#">Racing</a>
			</div>


			<div class="inline-div">
				<a class="see" href="shooting.php">Shooting</a>
			</div>

			<div class="inline-div">
				<a class="see" href="#">Space</a>
			</div>

			<div class="inline-div">
				<a class="see" href="#">Sport</a>
			</div>



			<div class="inline-div">
				<a class="see" href="#">Strategy</a>
			</div>

			<div class="inline-div">
				<a class="see" href="#">War Games</a>
			</div>

		</section>

	</aside>';
    }

    public static function renderCenter() {
        echo '<div id="centerOfAll">
		<section id="center">
			<h1 class="section-title">WELCOME TO HOME PAGE</h1>

			<p>
				<span class="bold">Gimension is the internet dimension of
					games...</span> We love games..... <a class="see" href="index.php?action=Aboutus">see
					more...</a>
			</p>
		</section>

		
		<section id="games">
		<script type="text/javascript">
		jQuery(function($){
		$("#games").load("index.php?action=GamesAbstract #gamesid");
});
</script>
		</section>
		

		<section id="news">

			<script type="text/javascript">
		jQuery(function($){
		$("#news").load("index.php?action=NewsAbstract #newsid");
		});
		</script>

		</section>
	</div>';
    }
    public static function renderRecommendedGames() {
        echo '<aside>
		<section id="recommend">
			<h1 class="section-title">RECOMMENDED GAMES</h1>

			<div>
				<div class="bold">July 21, 2004</div>
				<div>Imperia Online</div>
				<a class="see" href="http://imepriaonline.org/">see more...</a>
			</div>

			<div>
				<div class="bold">Mart 9, 1994</div>
				<div>Starcraft</div>
				<a class="see" href="https://starcraft.com/">see more...</a>
			</div>

			<div>
				<div class="bold">June 1, 1999</div>
				<div>Counter Strike</div>
				<a class="see" href="http://counterstrike.com/">see more...</a>
			</div>

			<div>
				<div class="bold">June 6, 1995</div>
				<div>Diablo</div>
				<a class="see" href="http://www.diablo.com/">see more...</a>
			</div>

		</section>';
    }

    public static function renderLastVisitedGames() {
        echo '<section id="last-visit">
			<h1 class="section-title">LAST VISITED GAMES</h1>

			<div>
				<div>Imperia Online</div>
				<a class="see" href="http://imepriaonline.org/">see more...</a>
			</div>

			<div>
				<div>Starcraft</div>
				<a class="see" href="https://starcraft.com/">see more...</a>
			</div>

			<div>
				<div>Counter Strike</div>
				<a class="see" href="http://counterstrike.com/">see more...</a>
			</div>

			<div>
				<div>Diablo</div>
				<a class="see" href="http://www.diablo.com/">see more...</a>
			</div>

		</section>

	</aside>';
    }

    public static function renderNews(){
      echo  '<div id="newsDiv">
		<section id="center">
			<h1> NEWS </h1>

			<article class="game-news">
                <h3><a href="http://eu.battle.net/wow/en/">World Of Warcraft</a></h3>
                <img class="img-article" src="images/logo_update_wow2.jpg" alt="World Of Warcraft">
                <p><span class="bold">Warlords of Draenor Unleashed</span> � Expansion Now Live!
                    <a class="see" href="http://eu.battle.net/wow/en/blog/16690866/warlords-of-draenor-unleashed-expansion-now-live-12-11-2014">see more...</a>
                </p>
            </article>

            <article class="game-news">
                <h3><a href="playstation.com">Sony Playstation</a></h3>
                <img class="img-article" src="images/logo_ass_creed_newps4.jpg" alt="Assasin\'s Creed Unity">
                <p><span class="bold">Assassin�s Creed� Unity</span> - Introducing the next-gen evolution of the blockbuster franchise powered by an all-new game engine
        <a class="see" href="https://www.playstation.com/en-us/games/assassins-creed-unity-ps4/">see more...</a>
                </p>
            </article>
            <br>

			<article class="game-news">
                <h3><a href="www.imperiaonline.org">Imperia Online</a></h3>
                <img class="img-article" src="images/logo-eggtales.jpg" alt="Imperia Online">
                <p><span class="bold">Start Your Eggciting Adventure With Egg Tales!</span> The life of the
                    little Egg is in your hands!
                    <a class="see" href="http://blog.imperiaonline.bg/en/?p=160">see more...</a>
                </p>
            </article>

			<br>
            <article class="game-news">
                <h3><a href="www.starcraft.com">Starcraft 2</a></h3>
                <img class="img-article" src="images/logo-starcraftnews.jpg" alt="Starcraft 2">
                <p><span class="bold">LEGACY OF THE VOID IS BASICALLY BATTLESTAR GALACTICA!</span> In learning about the plight
                    of...
                    <a class="see" href="http://www.ign.com/articles/2014/11/09/blizzcon-2014-starcraft-2-legacy-of-the-void-is-basically-battlestar-galactica">see more...</a>
                </p>
            </article>

		</section>
	</div>';
    }

//    public static function renderFooter() {
//        echo '</main><footer>
//		<div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Gimension
//			&copy; 22 December 2014</div>
//	</footer>';
//    } OTIVA V HTMLTemplate
}
