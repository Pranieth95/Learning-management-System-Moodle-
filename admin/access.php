<?php
session_start();

if($_SESSION["Authenticated"] != "admin")
{
	if($_SESSION["Authenticated"] != "clubrep")
	{
		if($_SESSION["Authenticated"] != "lecturer")
		{
			if($_SESSION["Authenticated"] != "clubnormal")
			{
				if($_SESSION["Authenticated"] != "student")
				{
					header("Location: Login1.html");
					exit();
				}
				
			}
		}
		
	}
	
}


?>