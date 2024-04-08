<?php
require_once("baglan.php");
?>

<?php
if(isset($_POST["birincioyuncu"])&isset($_POST["oyuncubirskor"])&isset($_POST["ikincioyuncu"])&isset($_POST["oyuncuikiskor"])) {
        $birinciOyuncu=$_POST["birincioyuncu"];
        $oyuncuBirSkor=$_POST["oyuncubirskor"];
        $ikinciOyuncu=$_POST["ikincioyuncu"];
        $oyuncuIkiSkor=$_POST["oyuncuikiskor"];       
        $tarih = $_POST["date"];
     

        if($oyuncuBirSkor>$oyuncuIkiSkor){
            $galip=$birinciOyuncu;
            $maglup=$ikinciOyuncu;
            $gav=$oyuncuBirSkor-$oyuncuIkiSkor;
            $mav=$oyuncuIkiSkor-$oyuncuBirSkor;
        }
        else{    
            $galip=$ikinciOyuncu;
            $maglup=$birinciOyuncu;
            $gav=$oyuncuIkiSkor-$oyuncuBirSkor;
            $mav=$oyuncuBirSkor-$oyuncuIkiSkor;
        }

        if($birinciOyuncu==$ikinciOyuncu OR $oyuncuBirSkor==$oyuncuIkiSkor OR $tarih==null ){

            header("Location:verigir.php");


        }

        else{
        $kayitEkle=$dataBaseConn->prepare("INSERT INTO skorsakla (tarih, birincioyuncu, ikincioyuncu, birincioyuncuskor, ikincioyuncuskor, galip, maglup, gav, mav) VALUES (?, ?, ?, ?, ?, ?,?,?,?)");
        $kayitEkle->execute([$tarih, $birinciOyuncu,$ikinciOyuncu,$oyuncuBirSkor,$oyuncuIkiSkor,$galip,$maglup,$gav,$mav]);
        }
         
} else {
     header("Location:verigir.php");
}
header("Location:verigir.php");
?>

