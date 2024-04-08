<?php

try{
    $dataBaseConn= new PDO ("mysql:host=localhost; dbname=tavlaskor; charset=UTF8", "root", "");
}
catch(PDOException $hata){
    echo "Baglanti Hatasi Var...";
}

function Lakap($yuzdelik){

    if($yuzdelik<=0.35){echo"Bahçıvanmıyız! kardeşimmm.";}
    else if($yuzdelik>0.35 and $yuzdelik <0.40){echo"Azimli bir oyuncudur. Zamanla olması gereken yerlere gelecektir.";}
    else if($yuzdelik>=0.40 and $yuzdelik <=0.45){echo"Rakiplere çok çift geliyor. Biraz daha gayret etmesi lazım.";}
    else if($yuzdelik>0.45 and $yuzdelik <=0.48){echo"Ne akarım, ne kokarım.";}
    else if($yuzdelik>0.48 and $yuzdelik <=0.49){echo"Az kaldı, biraz daha gayret %50 olsan sana yeter.";}
    else if($yuzdelik>0.49 and $yuzdelik <=0.50){echo"Ucundasın, bir iki maç daha sık dişini.";}
    else if($yuzdelik>0.50 and $yuzdelik <=0.55){echo"Kendi halinde takılan oyuncudur.";}
    else if($yuzdelik>0.55 and $yuzdelik <=0.59){echo"İstikrarlı oyuncudur.";}
    else if($yuzdelik>0.59 and $yuzdelik <=0.60){echo"Taç takılacak oyuncudur.";}
    else if($yuzdelik>0.60 and $yuzdelik <=0.75){echo"Çok çift gelen oyuncudur. Mücadele etmek zor.";}
    else if($yuzdelik>0.75){echo"Zar bilene gelirmiş.";}
    else{ echo "Oyuncu hakkında henüz bir tespit yapılmadı."; }
}



?>