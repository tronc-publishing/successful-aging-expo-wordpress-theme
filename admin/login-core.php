<?php

	//--- Change Login Screen ---//
	add_action('login_head', 'my_login_head');
	function my_login_head() {
		echo "
		<style>
			body.login {
				/*background-image: url('".get_bloginfo('template_url')."/admin/images/loginBkgrd01.jpg');
                background-repeat: no-repeat;
                background-position: bottom center;
                background-attachment: fixed;
                background-size: cover;*/
                background-color: #eee;
                width: 100%;
                height: 100%;
                display: block;
			}
			#login {
				padding: 5% 0 0 0;
			}
			body.login #login h1 a {
				background: url('".get_bloginfo('template_url')."/admin/images/loginIMG.png') no-repeat scroll center top transparent;
				width: auto;
				height: 46px;
			}
			.login form {
				border: #aaa solid 1px;
				border-radius: 3px;
				box-shadow: 0 2px 35px rgba(0,0,0,0.15);
                padding: 26px 24px 32px 24px;
			}
			.login form .forgetmenot {
				padding-top: 9px;
			}
			.login label {
				color: #666;
                font-family: arial;
				font-size: 16px;
                font-weight: normal;
			}
			.login form .forgetmenot label {
				font-size: 14px;
			}
			.login form .input, .login form input[type=checkbox], .login input[type=text] {
                background: #f2f2f2;
                border: #b1b1b1 solid 1px;
                border-radius: 3px;
                box-shadow: inset 0 1px 2px rgba(0,0,0,0.1);
                padding: 8px 12px;
                margin-top: 5px;

                transition: all 0.3s ease-in-out;
			}
			.login input[type=checkbox], .login input[type=radio] {
				height: 22px;
				margin: 0px 6px 0 0;
				top: -4px;
				position: relative;
				width: 22px;
				min-width: 22px;
			}
			.login form .input:hover, .login form input[type=checkbox]:hover, .login input[type=text]:hover {
				border-color: #3e5fac;
			}
			.login form .input:focus, .login form input[type=checkbox]:focus, .login form input[type=checkbox]:checked, .login input[type=text]:focus {
				background: #f8f8f8;
				border-color: #3e5fac;
				box-shadow: inset 0 1px 2px rgba(0,0,0,0.1), 0 0 6px rgba(184,12,19,0.18);
			}
			.login input[type=checkbox]:checked:before {
				font-size: 25px;
				margin: -1px 0 0 -3px;
				color: #3e5fac;
			}
			.wp-core-ui .button.button-large {
                background: #3e5fac;
                border-color: #3e5fac;
                -webkit-box-shadow: inset 0 1px 0 rgba(255,255,255,0.12),0 1px 3px rgba(0,0,0,0.35);
                box-shadow: inset 0 1px 0 rgba(255,255,255,0.12),0 1px 3px rgba(0,0,0,0.35);
                height: auto;
                font-family: arial;
                font-size: 15px;
                font-weight: 400;
                line-height: 28px;
                text-transform: uppercase;
                text-shadow: none;
                padding: 6px 18px;
			}
			.wp-core-ui .button.button-large:hover {
				background: #486ec7;
			}
			.wp-core-ui .button.button-large:focus {
                background: #486ec7;
				-webkit-box-shadow: inset 0 1px 0 rgba(255,255,255,0.12);
				box-shadow: inset 0 1px 0 rgba(255,255,255,0.12);
				position: relative;
				top: 1px;	
			}
			.login #backtoblog, .login #nav {
				text-align: center;
			}
			.login #nav {
				padding: 0 24px 6px 24px;
                margin: 20px 0 0 0;
			}
			.login #nav a {
                font-size: 14px;
				color: #666;
			}
            .login #nav a:hover {
				color: #fff;
                text-decoration: underline;
			}
            .login #backtoblog a {
                background: rgba(255,255,255,0.35);
                border-radius: 3px;
                border: #3e5fac solid 2px;
                font-family: arial;
                font-size: 16px;
                color: #3e5fac;
                padding: 11px 18px;
                
                transition: all 0.3s ease-in-out;
            }
			.login #backtoblog a:hover {
                background: #3e5fac;
				color: #fff;
			}
		</style>
		";
	}
	 
	//--- Change Title For Login Screen ---//
	add_filter('login_headertitle', create_function(false,"return 'Portal Login | Blackburst Studio Theme';"));
	 
	//--- Change URL For Login Screen ---//
	//add_filter('login_headerurl', create_function(false,"return home_url();"));

?>