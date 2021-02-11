<?php
 
class cart{
    
	public static function initialise()
    {      
        $cart = array();
        if(!isset($_SESSION['cart']))
        {
            $_SESSION['cart']=$cart;
        } 
    }
    
	public static function add($Artikelnr, $Anzahl)
    {   
		$Artikel = array($Artikelnr, $Anzahl);
		$cart = $_SESSION['cart'];
		
		array_push($cart, $Artikel);
		$_SESSION['cart'] = $cart;
	}
    
    public static function undo()
    {
        $_SESSION['cart'] = array();
    }
    
    public static function get($n)
	{    
		if(!empty($_SESSION['cart']) && $n < count($_SESSION['cart'])) {
			$Array = $_SESSION['cart'];		
			return $Array[$n];
		}
		return null;
    }
	
	public static function getDataFromDatabase($link, $n)
    {
		if (!empty($_SESSION['cart']) && $n < count($_SESSION['cart'])) {
			$artikel = cart::get($n);
			$anr = $artikel[0];

			$sql = "SELECT * FROM artikel WHERE Artikelnr = '$anr'";
			$result = mysqli_query($link,$sql) or die (mysqli_error($link));

			return $result->fetch_array();     
		}
		return null;
    }
    
    public static function remove($n)
    {
		if(!empty($_SESSION['cart']) && $n < count($_SESSION['cart'])) {
			$Array = $_SESSION['cart'];
			unset($Array[$n]);
		}
		return null;
    }
    
	public static function size()
    {
        $sum = 0;
		$i = 0;
		
        while($i < count($_SESSION['cart']))
        {
            $artikel = cart::get($i);
            $vk = $artikel[1];
            $sum += $vk;

            ++$i;
        }

        return $sum;
    }
	
	public static function commitToDatabase($link)
	{
		$i = 0;
		while(!empty($_SESSION['cart']))
		{
			$artikel = cart::get($i);
			$anr = $artikel[0];
			$vk = $artikel[1];
				
			$sql = "SELECT Verkaeufe FROM artikel WHERE Artikelnr=$anr";
			$result = mysqli_query($link,$sql) or die (mysqli_error($link));
			$vk += $result->fetch_array()['Verkaeufe'];
			
			$sql = "UPDATE artikel SET Verkaeufe=$vk WHERE Artikelnr='$anr'";	
			mysqli_query($conn, $sql) or die (mysqli_error($link));	
			
			remove($i);
			++$i;
		}
	}
	
	
}

?>