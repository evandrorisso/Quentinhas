<?php  
class HomeController{
	
	public function Home(){
		include("View/Home/Header.php");
		include("View/Home/Menu.php");
		include("View/Home/Body.php");
		include("View/Home/Footer.php");
        include("View/Home/js.php");
	}
	public function SobreNos(){
		include("View/Home/Header.php");
		include("View/Home/Menu.php");
		include("View/Home/Sobre.php");
		include("View/Home/Footer.php");
        include("View/Home/js.php");
	}
}





?>