<?php
    if (isset($_SESSION['rank']) && $_SESSION['rank'] == 'DIR') {
?>
    <style>
    #fixe-haut
{
    background      : #8CB3C3 ;
    height          : 70px;
    position        : fixed;
    top             : 0;
    width           : 100%;
    left            : 0;
}
.submenu{
	display: none;
}
nav > ul{
	margin:0px
	padding: 0px;
}

nav > ul >li{
	float: left;
}
nav{
	width:100%;
	background-color: #8CB3C3;
}
nav > ul::after{
	content:"";
	display: block;
	clear: both;
}
nav a{
	display: infinite-block;
	text-decoration: none;
}
nav > ul > li > a{
	padding: 20px 30px;
	color: #FFF;
}
nav li:hover .submenu{
	display: inline-block;
	position: absolute;
	top:100%;
	left:0%;
	padding:0%;
	z-index:100000;
}
.submenu li{
	border-bottom : 1px solid #CCC;
}
.submenu li a{
	padding : 15px;
	font-size: 13px;
	color:#222538;
	width: 270px;
}
.menu-htlm:hover{
	border-top: 5px solid #e44d26;
	background-color: RGBa(60, 172, 196, 0.15);
}
nav > ul > li:hover a{
	padding: 15px 30px 20px 30px;
}
.menu-html .submenu{
	background-color: RGB(124,170,189);
}
.menu-html .submenu li:hover{
	background-color: RGB(158 ,187,198);
}
h1 {
	color: #0092B3;
	text-align: center;
	font-size: 70px;
}
p {
	text-align: center;
  }</style>
    <div id="fixe-haut">
        <img src="../img/DECO.png" alt="Deco" title="Yes" height="70" width="70" align="right" />
        <nav>
            <ul>
                <li class="menu-html"><a href=html.html">MENU</a>
                    <ul class="submenu">
                        <li><a href="#">CHOIX 1</a></li>
                        <li><a href="#">CHOIX 2</a></li>
                    </ul>
                </li>
            </ul>
            <nav>
    </div>
    </br></br></br></br></br>
    <h1>Connexion Directeur Etude :</h1></br></br></br></br></br></br>
    <p><img src="../img/logoiut.png" alt="logo" title="Unicaen" height="300" width="570"/ align"center"></br></p>
<?php
}

?>