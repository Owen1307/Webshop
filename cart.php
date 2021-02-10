<?php
 
class cart{
    
	public static function initial_cart()
    {
        
        $cart = array();
        if(!isset($_SESSION['cart']))
        {
            $_SESSION['cart']=$cart;
        } 

    }
    

	public static function insertArtikel($Artikelnr, $Spielname, $GenreID, $Entwickler, $Preis, $Veroeffentlich, $Bilder)
    {
        
        $Artikel = array($Artikelnr, $Spielname, $GenreID, $Entwickler, $Preis, $Veroeffentlich, $Bilder);
        $cart = $_SESSION['cart'];
        array_push($cart, $Artikel);
        $_SESSION['cart'] = $cart;
        
	}
    

    public static function undo_cart()
    {
        $_SESSION['cart'] = array();
    }
    
    

    public static function get_cartValue_at_Point($n)
    {
        
        $Array = $_SESSION['cart'];            
        return $Array[$n];
        
    }
    

    public static function delete_cartValue_at_Point($point)
    {
        $Array = $_SESSION['cart'];
        unset($Array[$point]);
    }
    

    public static function get_cart_count()
    {
        return count($_SESSION['cart']);
    }
}

?>