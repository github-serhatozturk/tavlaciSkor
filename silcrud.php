<?php
require_once("baglan.php");
?>
<?php



if(isset($_POST["silinecekKayit"])){

    $silinecekKayitId=$_POST["silinecekKayit"];
    $kayitSil=$dataBaseConn->prepare("DELETE FROM skorsakla WHERE id=?");
    $kayitSil->execute([$silinecekKayitId]);

   

}

else{

   header("Location:verigir.php");
}
header("Location:verigir.php");


?>
