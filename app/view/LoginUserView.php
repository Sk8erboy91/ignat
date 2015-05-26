<?php
namespace app\view;

use mvce\view\HTMLTemplate;

class LoginUserView extends HTMLTemplate
{
	protected function pageContent()
	{
		echo '<div id="centerOfAll">
				<section id="center"><div class="registration-form">
					<div><h2>This is where you can login! Just enter your credentials in the top right corner box! Thank you! ^-^ </h2></div>
				</section>
			  </div>';
	}
	
	protected function renderLogin()
	{
		echo '<div id="login">
				<form action="index.php?action=LoginUser" method="post" >
                        <p class="login-row">
                            <label for="username">Username : </label>
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
						    <input type="submit" id="loginbtn" class="btn_login_reg" value="Login"/>
						    <a type="button" id="registerbtn" class="btn_login_reg" href="index.php?action=Register"/>Register</a>
						</p>
                        <p class="login-row">
                        <a href="forgot_password.php" id="forgottenUser">Forgotten username or password?</a>
                        </p>
       			 </form>
				</div>';
	}
}