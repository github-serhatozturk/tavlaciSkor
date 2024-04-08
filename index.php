
<?php
require_once("baglan.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <title>Tavla Skor Takip</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    function showAlert() {
        alert("Veri Girişi Bölümü Yapım Aşamasındadır!");
    }

  </script>
  
  <style>
        .center{
            text-align: center;
        }
        .right{
            text-align: right;
        }
        .left{
            text-align: left;
        }
        .h5center{
            text-align: center;
            color: darkred;
            text-decoration: underline;
           

        }
       
       

  </style>
</head>

<body>


<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php">Tavla Skor Takip</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="collapsibleNavbar">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="index.php">Home</a>
        </li>        
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">Menu</a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="verigir.php">Skor Girişi</a></li>
            <li><a class="dropdown-item" href="macListele.php">Maç Arşivi</a></li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>

<div class="container bg-primary text-white text-center">
  <h1>Tavla Skor Takip</h1>
  <p>Just A Game</p> 
</div>

<div class="container bg-danger mt-3 text-white text-center border">
  <h3 id="pRating">Günün Kazananı</h3>
</div>

<div class="container mt-3 border"> 

        <table class="table table-striped">
        <tr>          
        </tr>
            <?php 

  
            $sorguKazanan=$dataBaseConn->prepare("SELECT galip, COUNT(*) AS gununkazanani FROM skorsakla WHERE tarih=? GROUP BY galip ORDER BY gununkazanani DESC LIMIT 5");
            $bugununTarihi = date("Y-m-d");
            $sorguKazanan->execute([$bugununTarihi]);
            $kayitSayisi=$sorguKazanan->rowCount();
            $kazananSorguSonucu=$sorguKazanan->fetchAll(PDO::FETCH_ASSOC);
            if($kayitSayisi==0){ ?>  
            <tr> <h3 class="center"><?php echo "Bugün Maç Yapılmadı."; ?></h3></tr>
            <?php } 
            else if($kayitSayisi==1){ ?>
                <tr> <h3 class="center"><?php echo "Veri yok."; ?></h3></tr>
            <?php }                      
            else if($kayitSayisi==2){ 
                if($kazananSorguSonucu[0]["gununkazanani"]>$kazananSorguSonucu[1]["gununkazanani"]){ ?>
                <tr> <h3 class="center"><?php echo $kazananSorguSonucu[0]["galip"]." ".$kazananSorguSonucu[0]["gununkazanani"]." oyun ile şampiyon."; ?></h3></tr>
                <?php }else{?>

                <tr> <h3 class="center"><?php echo $kazananSorguSonucu[0]["galip"]." ".$kazananSorguSonucu[0]["gununkazanani"]." oyun."; ?></h3></tr>
                <tr> <h3 class="center"><?php echo $kazananSorguSonucu[1]["galip"]." ".$kazananSorguSonucu[1]["gununkazanani"]." oyun."; ?></h3></tr>                
             <?php  }   
            }else if($kayitSayisi==3){ 
                    if($kazananSorguSonucu[0]["gununkazanani"]>$kazananSorguSonucu[1]["gununkazanani"]){ ?>
                    <tr> <h3 class="center"><?php echo $kazananSorguSonucu[0]["galip"]." ".$kazananSorguSonucu[0]["gununkazanani"]." oyun ile şampiyon."; ?></h3></tr>
                <?php }else{?>
                        
                    <tr> <h3 class="center"><?php echo $kazananSorguSonucu[0]["galip"]." ".$kazananSorguSonucu[0]["gununkazanani"]." oyun."; ?></h3></tr>
                    <tr> <h3 class="center"><?php echo $kazananSorguSonucu[1]["galip"]." ".$kazananSorguSonucu[1]["gununkazanani"]." oyun."; ?></h3></tr>  
                    <tr> <h3 class="center"><?php echo $kazananSorguSonucu[2]["galip"]." ".$kazananSorguSonucu[2]["gununkazanani"]." oyun."; ?></h3></tr>   
                    <?php  }?>
            <?php 
             } else if ($kayitSayisi==4) { 
                if($kazananSorguSonucu[0]["gununkazanani"]>$kazananSorguSonucu[1]["gununkazanani"]){ ?>
                <tr> <h3 class="center"><?php echo $kazananSorguSonucu[0]["galip"]." ".$kazananSorguSonucu[0]["gununkazanani"]." oyun ile şampiyon"; ?></h3></tr>
                <?php }else{ ?>

                <tr> <h3 class="center"><?php echo $kazananSorguSonucu[0]["galip"]." ".$kazananSorguSonucu[0]["gununkazanani"]." oyun."; ?></h3></tr>
                <tr> <h3 class="center"><?php echo $kazananSorguSonucu[1]["galip"]." ".$kazananSorguSonucu[1]["gununkazanani"]." oyun."; ?></h3></tr>  
                <tr> <h3 class="center"><?php echo $kazananSorguSonucu[2]["galip"]." ".$kazananSorguSonucu[2]["gununkazanani"]." oyun."; ?></h3></tr>  
                <tr> <h3 class="center"><?php echo $kazananSorguSonucu[3]["galip"]." ".$kazananSorguSonucu[3]["gununkazanani"]." oyun."; ?></h3></tr>   
                <?php  }}   
            else if($kayitSayisi==5){ 
                if($kazananSorguSonucu[0]["gununkazanani"]>$kazananSorguSonucu[1]["gununkazanani"]) { ?>
                <tr> <h3 class="center"><?php echo $kazananSorguSonucu[0]["galip"]." ".$kazananSorguSonucu[0]["gununkazanani"]." oyun ile şampiyon"; ?></h3></tr>
                <?php }else { ?>

                <tr> <h3 class="center"><?php echo $kazananSorguSonucu[0]["galip"]." ".$kazananSorguSonucu[0]["gununkazanani"]." oyun."; ?></h3></tr>
                <tr> <h3 class="center"><?php echo $kazananSorguSonucu[1]["galip"]." ".$kazananSorguSonucu[1]["gununkazanani"]." oyun."; ?></h3></tr>  
                <tr> <h3 class="center"><?php echo $kazananSorguSonucu[2]["galip"]." ".$kazananSorguSonucu[2]["gununkazanani"]." oyun."; ?></h3></tr>  
                <tr> <h3 class="center"><?php echo $kazananSorguSonucu[3]["galip"]." ".$kazananSorguSonucu[3]["gununkazanani"]." oyun."; ?></h3></tr>  
                <tr> <h3 class="center"><?php echo $kazananSorguSonucu[4]["galip"]." ".$kazananSorguSonucu[4]["gununkazanani"]." oyun."; ?></h3></tr>          
                <?php  }} 
            else { ?>
                    <tr> <h3 class="center"><?php echo "Veri yok."; ?></h3></tr>
               <?php } ?>
        </table>
</div>



<div class="container bg-success mt-3 text-white text-center border">
  <h3 id="pRating">Kasım Şampiyonu</h3>
</div>

<div class="container border mt-1">
    <div class="row">
           <?php     
            $start_datekasim = "2023-11-01";
            $end_datekasim = "2023-11-30";
            $sorguEkBasari=$dataBaseConn->prepare("SELECT * FROM skorsakla WHERE tarih BETWEEN ? AND ?");
            $sorguEkBasari->execute([$start_datekasim,$end_datekasim]);
            $sorguEkBasariSayisi=$sorguEkBasari->rowCount();
            $sorguEkBasariSonuc=$sorguEkBasari->fetchAll(PDO::FETCH_ASSOC);
            if($sorguEkBasariSayisi>0){ 
                $diziGalip=array();
                foreach($sorguEkBasariSonuc AS $sorguEkBasariSonucSatir){ 
                    array_push($diziGalip,$sorguEkBasariSonucSatir["galip"]);}
                        // Dizi elemanlarını saymak için bir dizi kullanalım
                        $counts = array();

                        foreach ($diziGalip as $element) {
                            if (isset($counts[$element])) {
                                $counts[$element]++;
                            } else {
                                $counts[$element] = 1;
                            }
                        }
                        // En çok tekrarlanan elemanı ve tekrar sayısını bulalım
                        $maxCount = max($counts);
                        $maxCountElements = array_keys($counts, $maxCount);

                       
                    ?>
            <tr> <h3 class="center"><?php foreach ($maxCountElements as $element) {
                            echo $element . " ";
                        }
                        echo " ( galibiyet: " . $maxCount. " )"; ?></h3></tr>

            <?php  }

            ?>

    </div>







</div>

<div class="container bg-secondary mt-3 text-white text-center border">
  <h3 id="pRating">Ekim Şampiyonu</h3>
</div>

<div class="container border mt-1">
    <div class="row">
           <?php     
            $start_date = "2023-10-01";
            $end_date = "2023-10-31";
            $sorguEkBasari=$dataBaseConn->prepare("SELECT * FROM skorsakla WHERE tarih BETWEEN ? AND ?");
            $sorguEkBasari->execute([$start_date,$end_date]);
            $sorguEkBasariSayisi=$sorguEkBasari->rowCount();
            $sorguEkBasariSonuc=$sorguEkBasari->fetchAll(PDO::FETCH_ASSOC);
            if($sorguEkBasariSayisi>0){ 
                $diziGalip=array();
                foreach($sorguEkBasariSonuc AS $sorguEkBasariSonucSatir){ 
                    array_push($diziGalip,$sorguEkBasariSonucSatir["galip"]);}
                        // Dizi elemanlarını saymak için bir dizi kullanalım
                        $counts = array();

                        foreach ($diziGalip as $element) {
                            if (isset($counts[$element])) {
                                $counts[$element]++;
                            } else {
                                $counts[$element] = 1;
                            }
                        }
                        // En çok tekrarlanan elemanı ve tekrar sayısını bulalım
                        $maxCount = max($counts);
                        $maxCountElements = array_keys($counts, $maxCount);

                       
                    ?>
            <tr> <h3 class="center"><?php foreach ($maxCountElements as $element) {
                            echo $element . " ";
                        }
                        echo " ( galibiyet: " . $maxCount. " )"; ?></h3></tr>

            <?php  }

            ?>

    </div>







</div>

<div class="container bg-secondary mt-3 text-white text-center border">
  <h3 id="pRating">Eylül Şampiyonu</h3>
</div>

<div class="container border mt-1">
    <div class="row">
           <?php     
            $start_date = "2023-09-01";
            $end_date = "2023-09-30";
            $sorguEylulBasari=$dataBaseConn->prepare("SELECT * FROM skorsakla WHERE tarih BETWEEN ? AND ?");
            $sorguEylulBasari->execute([$start_date,$end_date]);
            $sorguEylulBasariSayisi=$sorguEylulBasari->rowCount();
            $sorguEylulBasariSonuc=$sorguEylulBasari->fetchAll(PDO::FETCH_ASSOC);
            if($sorguEylulBasariSayisi>0){ 
                $diziGalip=array();
                foreach($sorguEylulBasariSonuc AS $sorguEylulBasariSonucSatir){ 
                    array_push($diziGalip,$sorguEylulBasariSonucSatir["galip"]);}
                        // Dizi elemanlarını saymak için bir dizi kullanalım
                        $counts = array();

                        foreach ($diziGalip as $element) {
                            if (isset($counts[$element])) {
                                $counts[$element]++;
                            } else {
                                $counts[$element] = 1;
                            }
                        }
                        // En çok tekrarlanan elemanı ve tekrar sayısını bulalım
                        $maxCount = max($counts);
                        $maxCountElements = array_keys($counts, $maxCount);

                       
                    ?>
            <tr> <h3 class="center"><?php foreach ($maxCountElements as $element) {
                            echo $element . " ";
                        }
                        echo " ( galibiyet: " . $maxCount. " )"; ?></h3></tr>

            <?php  }

            ?>

    </div>







</div>



<!-- LIG  -->
<div class="container bg-success mt-3 text-white text-center border">
  <h3 id="pProfile">Tavla Ligi (Kasım)</h3>
</div>

<div class="container mt-3 border">
    <table class="table table-striped"> 

        <?php  
                $start_date = "2023-11-01";
                $end_date = "2023-11-30";
                $queryGameSayisi=$dataBaseConn->prepare("SELECT * FROM skorsakla WHERE (ikincioyuncu=? OR birincioyuncu=?) AND tarih BETWEEN ? AND ?");
                $queryGalibiyetSayisi=$dataBaseConn->prepare("SELECT * FROM skorsakla WHERE galip=? AND tarih BETWEEN ? AND ?");
                                
                /* CİHAN */
                $queryGameSayisi->execute(["cihan","cihan",$start_date,$end_date]);
                $queryGalibiyetSayisi->execute(['cihan',$start_date,$end_date]);
                $queryGameSayisiSay_Cihan=$queryGameSayisi->rowCount();
                $queryGalibiyetSayisiSayCihan=$queryGalibiyetSayisi->rowCount();            
                $maglubiyet_Cihan=$queryGameSayisiSay_Cihan-$queryGalibiyetSayisiSayCihan;
                /* SALİH */
                $queryGameSayisi->execute(["salih","salih",$start_date,$end_date]);
                $queryGalibiyetSayisi->execute(['salih',$start_date,$end_date]);            
                $queryGameSayisiSay_Salih=$queryGameSayisi->rowCount();
                $queryGalibiyetSayisiSaySalih=$queryGalibiyetSayisi->rowCount();
                $maglubiyet_Salih=$queryGameSayisiSay_Salih-$queryGalibiyetSayisiSaySalih;
                /* SERBAY */
                $queryGameSayisi->execute(["serbay","serbay",$start_date,$end_date]);
                $queryGalibiyetSayisi->execute(['serbay',$start_date,$end_date]);
                $queryGameSayisiSay_Serbay=$queryGameSayisi->rowCount();
                $queryGalibiyetSayisiSaySerbay=$queryGalibiyetSayisi->rowCount();
                $maglubiyet_Serbay=$queryGameSayisiSay_Serbay-$queryGalibiyetSayisiSaySerbay;
                /* SERHAT */
                $queryGameSayisi->execute(["serhat","serhat",$start_date,$end_date]);
                $queryGalibiyetSayisi->execute(['serhat',$start_date,$end_date]);
                $queryGameSayisiSay_Serhat=$queryGameSayisi->rowCount();
                $queryGalibiyetSayisiSaySerhat=$queryGalibiyetSayisi->rowCount();
                $maglubiyet_Serhat=$queryGameSayisiSay_Serhat-$queryGalibiyetSayisiSaySerhat;            
                /* NEVZAT */
                $queryGameSayisi->execute(["nevzat","nevzat",$start_date,$end_date]);
                $queryGalibiyetSayisi->execute(['nevzat',$start_date,$end_date]);
                $queryGameSayisiSay_Nevzat=$queryGameSayisi->rowCount();
                $queryGalibiyetSayisiSayNevzat=$queryGalibiyetSayisi->rowCount();
                $maglubiyet_Nevzat=$queryGameSayisiSay_Nevzat-$queryGalibiyetSayisiSayNevzat;                            

               
        ?>

        <tr>
            <th class="Center"></th>
            <th class="Center">Game</th>
            <th class="Center">Win</th>
            <th class="Center">Lose</th>            
        </tr>

        <tr>
            <td class="Center">Cihan</td>
            <td class="Center"><?php echo $queryGameSayisiSay_Cihan ?> </td>
            <td class="Center"><?php echo $queryGalibiyetSayisiSayCihan ?></td>
            <td class="Center"><?php echo $maglubiyet_Cihan ?></td>           
        </tr>

        <tr>
            <td class="Center">Salih</td>
            <td class="Center"><?php echo $queryGameSayisiSay_Salih ?> </td>
            <td class="Center"><?php echo $queryGalibiyetSayisiSaySalih ?></td>
            <td class="Center"><?php echo $maglubiyet_Salih ?></td>            
        </tr>

        <tr>
            <td class="Center">Serbay</td>
            <td class="Center"><?php echo $queryGameSayisiSay_Serbay ?></td>
            <td class="Center"><?php echo $queryGalibiyetSayisiSaySerbay ?></td>
            <td class="Center"><?php echo $maglubiyet_Serbay ?></td>
           
        </tr>

        <tr>
            <td class="Center">Serhat</td>
            <td class="Center"><?php echo $queryGameSayisiSay_Serhat ?></td>
            <td class="Center"><?php echo $queryGalibiyetSayisiSaySerhat ?></td>
            <td class="Center"><?php echo $maglubiyet_Serhat ?></td>
            
        </tr>

        <tr>
            <td class="Center">Nevzat</td>
            <td class="Center"><?php echo $queryGameSayisiSay_Nevzat ?></td>
            <td class="Center"><?php echo $queryGalibiyetSayisiSayNevzat ?></td>
            <td class="Center"><?php echo $maglubiyet_Nevzat ?></td>
           
        </tr>
        
    </table>

</div>



<!-- LIG  ekim -->
<div class="container bg-secondary mt-3 text-white text-center border">
  <h3 id="pProfile">Tavla Ligi (Ekim)</h3>
</div>

<div class="container mt-3 border">
    <table class="table table-striped"> 

        <?php  
                $start_date = "2023-10-01";
                $end_date = "2023-10-31";
                $queryGameSayisi=$dataBaseConn->prepare("SELECT * FROM skorsakla WHERE (ikincioyuncu=? OR birincioyuncu=?) AND tarih BETWEEN ? AND ?");
                $queryGalibiyetSayisi=$dataBaseConn->prepare("SELECT * FROM skorsakla WHERE galip=? AND tarih BETWEEN ? AND ?");
                                
                /* CİHAN */
                $queryGameSayisi->execute(["cihan","cihan",$start_date,$end_date]);
                $queryGalibiyetSayisi->execute(['cihan',$start_date,$end_date]);
                $queryGameSayisiSay_Cihan=$queryGameSayisi->rowCount();
                $queryGalibiyetSayisiSayCihan=$queryGalibiyetSayisi->rowCount();            
                $maglubiyet_Cihan=$queryGameSayisiSay_Cihan-$queryGalibiyetSayisiSayCihan;
                /* SALİH */
                $queryGameSayisi->execute(["salih","salih",$start_date,$end_date]);
                $queryGalibiyetSayisi->execute(['salih',$start_date,$end_date]);            
                $queryGameSayisiSay_Salih=$queryGameSayisi->rowCount();
                $queryGalibiyetSayisiSaySalih=$queryGalibiyetSayisi->rowCount();
                $maglubiyet_Salih=$queryGameSayisiSay_Salih-$queryGalibiyetSayisiSaySalih;
                /* SERBAY */
                $queryGameSayisi->execute(["serbay","serbay",$start_date,$end_date]);
                $queryGalibiyetSayisi->execute(['serbay',$start_date,$end_date]);
                $queryGameSayisiSay_Serbay=$queryGameSayisi->rowCount();
                $queryGalibiyetSayisiSaySerbay=$queryGalibiyetSayisi->rowCount();
                $maglubiyet_Serbay=$queryGameSayisiSay_Serbay-$queryGalibiyetSayisiSaySerbay;
                /* SERHAT */
                $queryGameSayisi->execute(["serhat","serhat",$start_date,$end_date]);
                $queryGalibiyetSayisi->execute(['serhat',$start_date,$end_date]);
                $queryGameSayisiSay_Serhat=$queryGameSayisi->rowCount();
                $queryGalibiyetSayisiSaySerhat=$queryGalibiyetSayisi->rowCount();
                $maglubiyet_Serhat=$queryGameSayisiSay_Serhat-$queryGalibiyetSayisiSaySerhat;            
                /* NEVZAT */
                $queryGameSayisi->execute(["nevzat","nevzat",$start_date,$end_date]);
                $queryGalibiyetSayisi->execute(['nevzat',$start_date,$end_date]);
                $queryGameSayisiSay_Nevzat=$queryGameSayisi->rowCount();
                $queryGalibiyetSayisiSayNevzat=$queryGalibiyetSayisi->rowCount();
                $maglubiyet_Nevzat=$queryGameSayisiSay_Nevzat-$queryGalibiyetSayisiSayNevzat;                            

               
        ?>

        <tr>
            <th class="Center"></th>
            <th class="Center">Game</th>
            <th class="Center">Win</th>
            <th class="Center">Lose</th>            
        </tr>

        <tr>
            <td class="Center">Cihan</td>
            <td class="Center"><?php echo $queryGameSayisiSay_Cihan ?> </td>
            <td class="Center"><?php echo $queryGalibiyetSayisiSayCihan ?></td>
            <td class="Center"><?php echo $maglubiyet_Cihan ?></td>           
        </tr>

        <tr>
            <td class="Center">Salih</td>
            <td class="Center"><?php echo $queryGameSayisiSay_Salih ?> </td>
            <td class="Center"><?php echo $queryGalibiyetSayisiSaySalih ?></td>
            <td class="Center"><?php echo $maglubiyet_Salih ?></td>            
        </tr>

        <tr>
            <td class="Center">Serbay</td>
            <td class="Center"><?php echo $queryGameSayisiSay_Serbay ?></td>
            <td class="Center"><?php echo $queryGalibiyetSayisiSaySerbay ?></td>
            <td class="Center"><?php echo $maglubiyet_Serbay ?></td>
           
        </tr>

        <tr>
            <td class="Center">Serhat</td>
            <td class="Center"><?php echo $queryGameSayisiSay_Serhat ?></td>
            <td class="Center"><?php echo $queryGalibiyetSayisiSaySerhat ?></td>
            <td class="Center"><?php echo $maglubiyet_Serhat ?></td>
            
        </tr>

        <tr>
            <td class="Center">Nevzat</td>
            <td class="Center"><?php echo $queryGameSayisiSay_Nevzat ?></td>
            <td class="Center"><?php echo $queryGalibiyetSayisiSayNevzat ?></td>
            <td class="Center"><?php echo $maglubiyet_Nevzat ?></td>
           
        </tr>
        
    </table>

</div>

<div class="container bg-success mt-3 text-white text-center border">
  <h3 id="pRating">En Yüksek Averajlı Oyuncu</h3>
</div>
<!-- YÜKSEK AVERAJLI OYUNCU -->
<div class="container mt-3 border"> 

        <table class="table table-striped">
        <tr>          
        </tr>
            <?php 
            
            function averajBul($isim){
            global $dataBaseConn;
            $sorguGav=$dataBaseConn->prepare("SELECT SUM(gav) AS toplamgav FROM skorsakla WHERE galip=?");
            $sorguMav=$dataBaseConn->prepare("SELECT SUM(mav) AS toplammav FROM skorsakla WHERE maglup=?");

            $sorguGav->execute([$isim]);
            $sorguMav->execute([$isim]);

            $sorguGavSonucu=$sorguGav->fetch(PDO::FETCH_ASSOC);
            $sorguMavSonucu=$sorguMav->fetch(PDO::FETCH_ASSOC);

            $avarajBul=(int)$sorguGavSonucu["toplamgav"]+(int)$sorguMavSonucu["toplammav"];

            return $avarajBul;
            } 
            
            $serhatAveraj = averajBul("serhat");
            $serbayAveraj = averajBul("serbay");
            $salihAveraj = averajBul("salih");
            $cihanAveraj = averajBul("cihan");
            $nevzatAveraj = averajBul("nevzat");

            $maxAveraj =array('Serhat'=>$serhatAveraj,'Serbay'=>$serbayAveraj,'Salih'=>$salihAveraj,'Cihan'=>$cihanAveraj,'Nevzat'=>$nevzatAveraj);
            $maxAverajBul=max($maxAveraj);
            $maxAverajKimin = array_keys($maxAveraj, $maxAverajBul);
            try{?>

                <tr>                    
                    <h3 class="center"> <?php echo implode(', ', $maxAverajKimin)."</br>"."Averaj Sayısı: ".$maxAverajBul; ?> </h3>
                </tr>
                <?php }catch(PDOException $hata){ ?>

                    <tr> <h3 class="center"><?php echo "Veri yok."; ?></h3></tr>

                    <?php } ?>
  
              
        </table>
</div>

<div class="container bg-danger mt-3 text-white text-center border">
  <h3 id="pRating">En Skorer Oyuncular</h3>
</div>

<div class="container mt-3 border">
    <table  class="table table-striped">
        <tr>
            <th></th>
            <th> </th>
            <th class="center"> Galibiyet</th>
        </tr>
        <?php 
        $sorguSkorerOyuncu=$dataBaseConn->prepare("SELECT galip, COUNT(*) AS skoreroyuncu FROM skorsakla GROUP BY galip ORDER BY skoreroyuncu DESC LIMIT 3");       
        $sorguSkorerOyuncu->execute();
        $sorguSayisi=$sorguSkorerOyuncu->rowCount();
        $sorguSkorerOyuncuSorguSonucu=$sorguSkorerOyuncu->fetchAll(PDO::FETCH_ASSOC);
        if($sorguSayisi>0){

            foreach($sorguSkorerOyuncuSorguSonucu as $satirlar){  ?>
            <tr>
            <td class="center"><img  src="Fotolar/<?php echo $satirlar["galip"]; ?>.jpg" width="37" height="54"></td>
            <td><h3 class="center"><?php echo $satirlar["galip"]; ?></h3></td>
            <td><h3 class="center"> <?php echo $satirlar["skoreroyuncu"]; ?></h3> </td>
            </tr>

            <?php } }?>


    </table>
</div>

<div class="container bg-success mt-3 text-white text-center border">
  <h3 id="pRating">Personel Rating</h3>
</div>

<div class="container mt-3 border"> 
        <table class="table table-striped">
        <tr>
            <th class="right"></th>
            <th class="center">Player</th> 
            <th class="left">Rate</th>
            <th class="left">Win</th>
            <th class="left">Lose</th>
        </tr>

        <?php                    
            $queryBasariNevzat=$dataBaseConn->prepare("SELECT * FROM skorsakla WHERE ikincioyuncu LIKE 'nevzat' OR birincioyuncu LIKE 'nevzat'");
            $queryBasariNevzat2=$dataBaseConn->prepare("SELECT * FROM skorsakla WHERE galip LIKE 'nevzat'");
            $queryBasariNevzat->execute();
            $queryBasariNevzat2->execute();
            $oyunSayisiNevzat=$queryBasariNevzat->rowCount();
            $galibiyetSayisiNevzat=$queryBasariNevzat2->rowCount();

            $queryBasariserhat=$dataBaseConn->prepare("SELECT * FROM skorsakla WHERE ikincioyuncu LIKE 'serhat' OR birincioyuncu LIKE 'serhat'");
            $queryBasariserhat2=$dataBaseConn->prepare("SELECT * FROM skorsakla WHERE galip LIKE 'serhat'");
            $queryBasariserhat->execute();
            $queryBasariserhat2->execute();
            $oyunSayisiserhat=$queryBasariserhat->rowCount();
            $galibiyetSayisiserhat=$queryBasariserhat2->rowCount();

            $queryBasaricihan=$dataBaseConn->prepare("SELECT * FROM skorsakla WHERE ikincioyuncu LIKE 'cihan' OR birincioyuncu LIKE 'cihan'");
            $queryBasaricihan2=$dataBaseConn->prepare("SELECT * FROM skorsakla WHERE galip LIKE 'cihan'");
            $queryBasaricihan->execute();
            $queryBasaricihan2->execute();
            $oyunSayisicihan=$queryBasaricihan->rowCount();
            $galibiyetSayisicihan=$queryBasaricihan2->rowCount();

            $queryBasarisalih=$dataBaseConn->prepare("SELECT * FROM skorsakla WHERE ikincioyuncu LIKE 'salih' OR birincioyuncu LIKE 'salih'");
            $queryBasarisalih2=$dataBaseConn->prepare("SELECT * FROM skorsakla WHERE galip LIKE 'salih'");
            $queryBasarisalih->execute();
            $queryBasarisalih2->execute();
            $oyunSayisisalih=$queryBasarisalih->rowCount();
            $galibiyetSayisisalih=$queryBasarisalih2->rowCount();

            $queryBasariserbay=$dataBaseConn->prepare("SELECT * FROM skorsakla WHERE ikincioyuncu LIKE 'serbay' OR birincioyuncu LIKE 'serbay'");
            $queryBasariserbay2=$dataBaseConn->prepare("SELECT * FROM skorsakla WHERE galip LIKE 'serbay'");
            $queryBasariserbay->execute();
            $queryBasariserbay2->execute();
            $oyunSayisiserbay=$queryBasariserbay->rowCount();
            $galibiyetSayisiserbay=$queryBasariserbay2->rowCount();
        ?>
        <?php
            if($oyunSayisiNevzat>0){
            ?>

    <tr>
        <td class="right"><img src="Fotolar/nevzat.jpg" width="37" height="54"></td>
        <td class="center">Nevzat</td> 
        <td class="left"><?php $sayiN=$galibiyetSayisiNevzat/$oyunSayisiNevzat; echo "%". number_format((100*$sayiN),1);   ?></td>
        <td class="left"> <?php echo $galibiyetSayisiNevzat; ?> </td>
        <td class="left"> <?php echo ($oyunSayisiNevzat-$galibiyetSayisiNevzat); ?></td>
    </tr>
    <?php } else {               
            ?>
            <td class="right"><img src="Fotolar/nevzat.jpg" width="37" height="54"></td>
            <td class="center">Nevzat</td> 
            <td class="left">Henüz  <br>Skor Yok</td>
            <td class="left">0</td>
            <td class="left">0</td>

        <?php   } ?>



        <?php
            if($oyunSayisiserhat>0){
            ?>
    <tr>
        <td class="right"><img src="Fotolar/serhat.jpg" width="37" height="54"></td>
        <td class="center">Serhat</td> 
        <td class="left"><?php $sayiS=$galibiyetSayisiserhat/$oyunSayisiserhat; echo "%". number_format((100*$sayiS),1);   ?></td>
        <td class="left"><?php echo $galibiyetSayisiserhat; ?> </td>
        <td class="left"><?php echo ($oyunSayisiserhat-$galibiyetSayisiserhat);?></td>
    </tr>
    <?php } else {               
            ?>
             <td class="right"><img src="Fotolar/serhat.jpg" width="37" height="54"></td>
              <td class="center">Serhat</td> 
              <td class="left">Henüz  <br>Skor Yok</td>
              <td class="left">0</td>
              <td class="left">0</td>

        <?php   } ?>

        <?php
            if($oyunSayisicihan>0){
            ?>

    <tr>
        <td class="right"><img src="Fotolar/cihan.jpg" width="37" height="54"></td>
        <td class="center">Cihan</td> 
        <td class="left"><?php $sayiC=$galibiyetSayisicihan/$oyunSayisicihan; echo "%". number_format((100*$sayiC),1);   ?></td>
        <td class="left"><?php echo $galibiyetSayisicihan; ?></td>
        <td class="left"><?php echo ($oyunSayisicihan-$galibiyetSayisicihan);?></td>
    </tr>
    <?php } else {               
            ?>
             <td class="right"><img src="Fotolar/cihan.jpg" width="37" height="54"></td>
             <td class="center">Cihan</td> 
              <td class="left">Henüz  <br>Skor Yok</td>
              <td class="left">0</td>
              <td class="left">0</td>

        <?php   } ?>

            <?php
            if($oyunSayisisalih>0){
            ?>

    <tr>
        <td class="right"><img src="Fotolar/salih.jpg" width="37" height="54"></td>
        <td class="center">Salih</td> 
        <td class="left"><?php $sayiSA=$galibiyetSayisisalih/$oyunSayisisalih; echo "%". number_format((100*$sayiSA),1);   ?></td>
        <td class="left"><?php echo $galibiyetSayisisalih; ?></td>
        <td class="left"><?php echo ($oyunSayisisalih-$galibiyetSayisisalih);?></td>
    </tr>
            <?php } else {               
            ?>

        <td class="right"><img src="Fotolar/salih.jpg" width="37" height="54"></td>
        <td class="center">Salih</td> 
        <td class="left">Henüz  <br>Skor Yok</td>
        <td class="left">0</td>
        <td class="left">0</td>

            <?php   } ?>

            <?php
            if($oyunSayisiserbay>0){
            ?>
    <tr>
        <td class="right"><img src="Fotolar/serbay.jpg" width="37" height="54"></td>
        <td class="center">Serbay</td> 
        <td class="left"><?php $sayiSE=$galibiyetSayisiserbay/$oyunSayisiserbay; echo "%". number_format((100*$sayiSE),1);   ?></td>
        <td class="left"><?php echo $galibiyetSayisiserbay; ?></td>
        <td class="left"><?php echo ($oyunSayisiserbay-$galibiyetSayisiserbay);?></td>
    </tr>

             <?php } else { ?>

    <tr>
        <td class="right"><img src="Fotolar/serbay.jpg" width="37" height="54"></td>
        <td class="center">Serbay</td> 
        <td class="left">Henüz  <br>Skor Yok</td>
        <td class="left">0</td>
        <td class="left">0</td>
    </tr>

             <?php   } ?>

        </table>

</div>

<div class="container bg-primary mt-3 text-white text-center border">
  <h3 id="pProfile">Player Profile</h3>
</div>

<div class="container mt-3 border"> 
        <table class="table table-striped">    
        <?php                    
            $queryBasariNevzat=$dataBaseConn->prepare("SELECT * FROM skorsakla WHERE ikincioyuncu LIKE 'nevzat' OR birincioyuncu LIKE 'nevzat'");
            $queryBasariNevzat2=$dataBaseConn->prepare("SELECT * FROM skorsakla WHERE galip LIKE 'nevzat'");
            $queryBasariNevzat->execute();
            $queryBasariNevzat2->execute();
            $oyunSayisiNevzat=$queryBasariNevzat->rowCount();
            $galibiyetSayisiNevzat=$queryBasariNevzat2->rowCount();

            $queryBasariserhat=$dataBaseConn->prepare("SELECT * FROM skorsakla WHERE ikincioyuncu LIKE 'serhat' OR birincioyuncu LIKE 'serhat'");
            $queryBasariserhat2=$dataBaseConn->prepare("SELECT * FROM skorsakla WHERE galip LIKE 'serhat'");
            $queryBasariserhat->execute();
            $queryBasariserhat2->execute();
            $oyunSayisiserhat=$queryBasariserhat->rowCount();
            $galibiyetSayisiserhat=$queryBasariserhat2->rowCount();

            $queryBasaricihan=$dataBaseConn->prepare("SELECT * FROM skorsakla WHERE ikincioyuncu LIKE 'cihan' OR birincioyuncu LIKE 'cihan'");
            $queryBasaricihan2=$dataBaseConn->prepare("SELECT * FROM skorsakla WHERE galip LIKE 'cihan'");
            $queryBasaricihan->execute();
            $queryBasaricihan2->execute();
            $oyunSayisicihan=$queryBasaricihan->rowCount();
            $galibiyetSayisicihan=$queryBasaricihan2->rowCount();

            $queryBasarisalih=$dataBaseConn->prepare("SELECT * FROM skorsakla WHERE ikincioyuncu LIKE 'salih' OR birincioyuncu LIKE 'salih'");
            $queryBasarisalih2=$dataBaseConn->prepare("SELECT * FROM skorsakla WHERE galip LIKE 'salih'");
            $queryBasarisalih->execute();
            $queryBasarisalih2->execute();
            $oyunSayisisalih=$queryBasarisalih->rowCount();
            $galibiyetSayisisalih=$queryBasarisalih2->rowCount();

            $queryBasariserbay=$dataBaseConn->prepare("SELECT * FROM skorsakla WHERE ikincioyuncu LIKE 'serbay' OR birincioyuncu LIKE 'serbay'");
            $queryBasariserbay2=$dataBaseConn->prepare("SELECT * FROM skorsakla WHERE galip LIKE 'serbay'");
            $queryBasariserbay->execute();
            $queryBasariserbay2->execute();
            $oyunSayisiserbay=$queryBasariserbay->rowCount();
            $galibiyetSayisiserbay=$queryBasariserbay2->rowCount();
        ?>

    <?php
            if($oyunSayisiNevzat>0){
            ?>

    <tr>
        <td class="center"><img src="Fotolar/nevzat.jpg" width="37" height="54"></td>
        <td class="center">Nevzat</td> 
        <td class="center"><?php  $sayiN=$galibiyetSayisiNevzat/$oyunSayisiNevzat; Lakap($sayiN);  ?></td>
    </tr>

    <?php } else {               
            ?>
            <td class="center"><img src="Fotolar/nevzat.jpg" width="37" height="54"></td>
        <td class="center">Nevzat</td> 
        <td class="center">Oyuncu hakkında yorum yapmak için yeterli veri yok. </td>

            <?php   } ?>

            <?php
            if($oyunSayisiserhat>0){
            ?>


    <tr>
        <td class="center"><img src="Fotolar/serhat.jpg" width="37" height="54"></td>
        <td class="center">Serhat</td> 
        <td class="center"><?php $sayiS=$galibiyetSayisiserhat/$oyunSayisiserhat;  Lakap($sayiS);  ?></td>
    </tr>

    <?php } else {               
            ?>
            <td class="center"><img src="Fotolar/serhat.jpg" width="37" height="54"></td>
        <td class="center">Serhat</td> 
        <td class="center">Oyuncu hakkında yorum yapmak için yeterli veri yok. </td>

        <?php   } ?>

        <?php
            if($oyunSayisicihan>0){
            ?>


    <tr>
        <td class="center"><img src="Fotolar/cihan.jpg" width="37" height="54"></td>
        <td class="center">Cihan</td> 
        <td class="center"><?php $sayiC=$galibiyetSayisicihan/$oyunSayisicihan; Lakap($sayiC);  ?></td>
    </tr>


    <?php } else {               ?>

    <tr>
        <td class="center"><img src="Fotolar/cihan.jpg" width="37" height="54"></td>
        <td class="center">Cihan</td> 
        <td class="center">Oyuncu hakkında yorum yapmak için yeterli veri yok. </td>
    </tr>
    <?php   } ?>


            <?php
            if($oyunSayisisalih>0){
            ?>

    <tr>
        <td class="center"><img src="Fotolar/salih.jpg" width="37" height="54"></td>
        <td class="center">Salih</td> 
        <td class="center"><?php $sayiSA=$galibiyetSayisisalih/$oyunSayisisalih; Lakap($sayiSA);  ?></td>
    </tr>
            <?php } else {               
            ?>

        <td class="center"><img src="Fotolar/salih.jpg" width="37" height="54"></td>
        <td class="center">Salih</td> 
        <td class="center">Oyuncu hakkında yorum yapmak için yeterli veri yok. </td>

            <?php   } ?>

            <?php
            if($oyunSayisiserbay>0){
            ?>
    <tr>
        <td class="center"><img src="Fotolar/serbay.jpg" width="37" height="54"></td>
        <td class="center">Serbay</td> 
        <td class="center"><?php $sayiSE=$galibiyetSayisiserbay/$oyunSayisiserbay; Lakap($sayiSE);  ?></td>
    </tr>

             <?php } else { ?>

    <tr>
        <td class="center"><img src="Fotolar/serbay.jpg" width="37" height="54"></td>
        <td class="center">Serbay</td> 
        <td class="center">Oyuncu hakkında yorum yapmak için yeterli veri yok. </td>
    </tr>

             <?php   } ?>

        </table>

</div>
<!-- LIG  -->
<div class="container bg-success mt-3 text-white text-center border">
  <h3 id="pProfile">Tavla Ligi (Tum Zamanlar)</h3>
</div>

<div class="container mt-3 border">
    <table class="table table-striped"> 

        <?php  
               
                $queryGameSayisi=$dataBaseConn->prepare("SELECT * FROM skorsakla WHERE ikincioyuncu=? OR birincioyuncu=?");
                $queryGalibiyetSayisi=$dataBaseConn->prepare("SELECT * FROM skorsakla WHERE galip=?");
                $queryAldigi=$dataBaseConn->prepare("SELECT SUM(gav) AS gavtoplam FROM skorsakla WHERE galip=? ");
                $queryVerdigi=$dataBaseConn->prepare("SELECT SUM(mav) AS mavtoplam FROM skorsakla WHERE maglup=? ");
                
                /* CİHAN */
                $queryGameSayisi->execute(["cihan","cihan"]);
                $queryGalibiyetSayisi->execute(['cihan']);
                $queryAldigi->execute(['cihan']);
                $queryVerdigi->execute(['cihan']);

                $queryAldigisayiCihan=$queryAldigi->fetch(PDO::FETCH_ASSOC);
                $queryVerdigisayiCihan=$queryVerdigi->fetch(PDO::FETCH_ASSOC);




                $queryGameSayisiSay_Cihan=$queryGameSayisi->rowCount();
                $queryGalibiyetSayisiSayCihan=$queryGalibiyetSayisi->rowCount();
             
                $maglubiyet_Cihan=$queryGameSayisiSay_Cihan-$queryGalibiyetSayisiSayCihan;

                $avarajCihan=(int)$queryAldigisayiCihan["gavtoplam"]+(int)$queryVerdigisayiCihan["mavtoplam"] ;
               

                /* SALİH */
                $queryGameSayisi->execute(["salih","salih"]);
                $queryGalibiyetSayisi->execute(['salih']);
                $queryAldigi->execute(['salih']);
                $queryVerdigi->execute(['salih']);

                $queryAldigisayiSalih=$queryAldigi->fetch(PDO::FETCH_ASSOC);
                $queryVerdigisayiSalih=$queryVerdigi->fetch(PDO::FETCH_ASSOC);

                $queryGameSayisiSay_Salih=$queryGameSayisi->rowCount();
                $queryGalibiyetSayisiSaySalih=$queryGalibiyetSayisi->rowCount();

                $maglubiyet_Salih=$queryGameSayisiSay_Salih-$queryGalibiyetSayisiSaySalih;

                $avarajSalih=(int)$queryAldigisayiSalih["gavtoplam"]+(int)$queryVerdigisayiSalih["mavtoplam"] ;


                
                /* SERBAY */
                $queryGameSayisi->execute(["serbay","serbay"]);
                $queryGalibiyetSayisi->execute(['serbay']);
                $queryAldigi->execute(['serbay']);
                $queryVerdigi->execute(['serbay']);

                $queryAldigisayiSerbay=$queryAldigi->fetch(PDO::FETCH_ASSOC);
                $queryVerdigisayiSerbay=$queryVerdigi->fetch(PDO::FETCH_ASSOC);

                $queryGameSayisiSay_Serbay=$queryGameSayisi->rowCount();
                $queryGalibiyetSayisiSaySerbay=$queryGalibiyetSayisi->rowCount();

                $maglubiyet_Serbay=$queryGameSayisiSay_Serbay-$queryGalibiyetSayisiSaySerbay;
                
                $avarajSerbay=(int)$queryAldigisayiSerbay["gavtoplam"]+(int)$queryVerdigisayiSerbay["mavtoplam"] ;

                /* SERHAT */
                $queryGameSayisi->execute(["serhat","serhat"]);
                $queryGalibiyetSayisi->execute(['serhat']);
                $queryAldigi->execute(['serhat']);
                $queryVerdigi->execute(['serhat']);

                $queryAldigisayiSerhat=$queryAldigi->fetch(PDO::FETCH_ASSOC);
                $queryVerdigisayiSerhat=$queryVerdigi->fetch(PDO::FETCH_ASSOC);

                $queryGameSayisiSay_Serhat=$queryGameSayisi->rowCount();
                $queryGalibiyetSayisiSaySerhat=$queryGalibiyetSayisi->rowCount();

                $maglubiyet_Serhat=$queryGameSayisiSay_Serhat-$queryGalibiyetSayisiSaySerhat;
               

                $avarajSerhat=(int)$queryAldigisayiSerhat["gavtoplam"]+(int)$queryVerdigisayiSerhat["mavtoplam"] ;

                /* NEVZAT */
                $queryGameSayisi->execute(["nevzat","nevzat"]);
                $queryGalibiyetSayisi->execute(['nevzat']);
                $queryAldigi->execute(['nevzat']);
                $queryVerdigi->execute(['nevzat']);

                $queryAldigisayiNevzat=$queryAldigi->fetch(PDO::FETCH_ASSOC);
                $queryVerdigisayiNevzat=$queryVerdigi->fetch(PDO::FETCH_ASSOC);

                $queryGameSayisiSay_Nevzat=$queryGameSayisi->rowCount();
                $queryGalibiyetSayisiSayNevzat=$queryGalibiyetSayisi->rowCount();

                $maglubiyet_Nevzat=$queryGameSayisiSay_Nevzat-$queryGalibiyetSayisiSayNevzat;
                
                
                $avarajNevzat=(int)$queryAldigisayiNevzat["gavtoplam"]+(int)$queryVerdigisayiNevzat["mavtoplam"] ;

               
        ?>

        <tr>
            <th class="Center"></th>
            <th class="Center">Game</th>
            <th class="Center">Win</th>
            <th class="Center">Lose</th>

            <th class="Center">Averajı</th>
            
        </tr>

        <tr>
            <td class="Center">Cihan</td>
            <td class="Center"><?php echo $queryGameSayisiSay_Cihan ?> </td>
            <td class="Center"><?php echo $queryGalibiyetSayisiSayCihan ?></td>
            <td class="Center"><?php echo $maglubiyet_Cihan ?></td>

            <td class="Center"><?php echo $avarajCihan; ?></td>
            
        </tr>

        <tr>
            <td class="Center">Salih</td>
            <td class="Center"><?php echo $queryGameSayisiSay_Salih ?> </td>
            <td class="Center"><?php echo $queryGalibiyetSayisiSaySalih ?></td>
            <td class="Center"><?php echo $maglubiyet_Salih ?></td>

            <td class="Center"><?php echo $avarajSalih; ?></td>
            
        </tr>

        <tr>
            <td class="Center">Serbay</td>
            <td class="Center"><?php echo $queryGameSayisiSay_Serbay ?></td>
            <td class="Center"><?php echo $queryGalibiyetSayisiSaySerbay ?></td>
            <td class="Center"><?php echo $maglubiyet_Serbay ?></td>

            <td class="Center"><?php echo $avarajSerbay; ?></td>
           
        </tr>

        <tr>
            <td class="Center">Serhat</td>
            <td class="Center"><?php echo $queryGameSayisiSay_Serhat ?></td>
            <td class="Center"><?php echo $queryGalibiyetSayisiSaySerhat ?></td>
            <td class="Center"><?php echo $maglubiyet_Serhat ?></td>

            <td class="Center"><?php echo $avarajSerhat; ?></td>
            
        </tr>

        <tr>
            <td class="Center">Nevzat</td>
            <td class="Center"><?php echo $queryGameSayisiSay_Nevzat ?></td>
            <td class="Center"><?php echo $queryGalibiyetSayisiSayNevzat ?></td>
            <td class="Center"><?php echo $maglubiyet_Nevzat ?></td>

            <td class="Center"><?php echo $avarajNevzat; ?></td>
           
        </tr>

       
        
    </table>

</div>

<!-- SERT GEÇEN MAÇLAR  -->
<div class="container bg-danger mt-3 text-white text-center border">
  <h3 id="pProfile"> <b>Çok</b> Sert Geçen Bazı Maçları Hatırlayalım</h3>
</div>

<div class="container mt-3 border">
    <?php

            $sorguMac=$dataBaseConn->prepare("SELECT * FROM skorsakla WHERE (birincioyuncuskor=0 OR ikincioyuncuskor=0) AND gav > 4 ORDER BY tarih DESC");          
            $sorguMac->execute();
            $oyunSayisi=$sorguMac->rowCount();
            $sorguMacSonucu=$sorguMac->fetchAll(PDO::FETCH_ASSOC);

          //  echo "<pre>";  print_r($sorguMacSonucu); echo "</pre>"; 

       /*     [id] => 212
            [tarih] => 2023-10-08
            [birincioyuncu] => serbay
            [ikincioyuncu] => nevzat
            [birincioyuncuskor] => 6
            [ikincioyuncuskor] => 1
            [galip] => serbay
            [maglup] => nevzat
            [gav] => 5
            [mav] => -5  */ ?>

    <table id="tablebir" class="table table-striped">
            <tr >
                <th>Date</th>
                <th>Player_1</th>
                <th>Score</th>
                <th>Player_2</th>                
                <th>Winner</th>
            </tr>

      <?php

            if($oyunSayisi>0){                    
                foreach($sorguMacSonucu as $satirlar) {  ?>                                            
                    <tr >
                    <td ><?php $yeniFormat = "d.m.Y"; echo "". date($yeniFormat, strtotime($satirlar["tarih"]));  ?></td>
                    <td ><?php  echo $satirlar["birincioyuncu"];?></td>  
                    <td > <?php echo $satirlar["birincioyuncuskor"]. "-" . $satirlar["ikincioyuncuskor"];?></td>
                    <td ><?php  echo $satirlar["ikincioyuncu"]; ?></td>                  
                    <td ><?php  echo $satirlar["galip"] ?></td>                                     
                    </tr>
                
                    <?php } }?>
                
        </table>



</div>

<div class="container bg-success mt-3 text-white text-center border">
  <h3 id="possibilities">Possibilities</h3>
    <?php 
            function KazananYuzdeBul($oyuncuBir,$oyuncuIki,$oyuncuKazanan){   
            global $dataBaseConn;     
            $query=$dataBaseConn->prepare("SELECT * FROM skorsakla WHERE birincioyuncu LIKE ? AND ikincioyuncu LIKE ? AND galip LIKE ? OR birincioyuncu LIKE ? AND ikincioyuncu LIKE ? AND galip LIKE ? "); 
            $query->execute([$oyuncuBir,$oyuncuIki,$oyuncuKazanan,$oyuncuIki,$oyuncuBir,$oyuncuKazanan]);
            $query2=$dataBaseConn->prepare("SELECT * FROM skorsakla WHERE birincioyuncu LIKE ? AND ikincioyuncu LIKE ? OR birincioyuncu LIKE ? AND ikincioyuncu LIKE ?"); 
            $query2->execute([$oyuncuBir,$oyuncuIki,$oyuncuIki,$oyuncuBir]);
            $birincininKazandigiOyun=$query->rowCount();
            $oynananOyun=$query2->rowCount();
            if($oynananOyun>0){
                $kazananOyuncuYuzdesi=number_format((100*($birincininKazandigiOyun / $oynananOyun)),1); 
                return $kazananOyuncuYuzdesi;
            }
            else {

                return "Veri Yok";
            }
            }
        ?>

</div>

<div class="container bg-secondary mt-3 text-white text-center border">
        <h3>Nevzat</h3>   
</div>

<div class="container mt-3 border"> 
    <table class="table table-striped"> 

        <tr>
                
                <td class="right"> <?php echo "Nevzat" ."</br>"."%  ". KazananYuzdeBul("nevzat","serbay","nevzat"); ?></td> 
                <td class="center"><img src="Fotolar/nevzat.jpg" width="37" height="54"></td>
                <td class="right"><?php echo KazananBul('nevzat','serbay','nevzat'); ?></td>
                <td class="center">VS</td>
                <td class="left"><?php echo KazananBul('serbay','nevzat','serbay'); ?></td>
                <td class="center"><img src="Fotolar/serbay.jpg" width="37" height="54"></td>
                <td class="left"><?php echo "Serbay" ."</br>"."%".KazananYuzdeBul("serbay","nevzat","serbay"); ?> </td> 
        </tr>

        <tr>
                <td class="right"> <?php echo "Nevzat" ."</br>"."%". KazananYuzdeBul("nevzat","cihan","nevzat"); ?></td>
                <td class="center"><img src="Fotolar/nevzat.jpg" width="37" height="54"></td> 
                <td class="right"><?php echo KazananBul('nevzat','cihan','nevzat'); ?></td>
                <td class="center">VS</td>
                <td class="left"><?php echo KazananBul('cihan','nevzat','cihan'); ?></td>
                <td class="center"><img src="Fotolar/cihan.jpg" width="37" height="54"></td>
                <td class="left"><?php echo "Cihan" ."</br>"."%".KazananYuzdeBul("cihan","nevzat","cihan"); ?> </td> 
        </tr>


        <tr>
                <td class="right"> <?php echo "Nevzat" ."</br>"."%". KazananYuzdeBul("nevzat","serhat","nevzat"); ?></td>
                <td class="center"><img src="Fotolar/nevzat.jpg" width="37" height="54"></td> 
                <td class="right"><?php echo KazananBul('nevzat','serhat','nevzat'); ?></td>
                <td class="center">VS</td>
                <td class="left"><?php echo KazananBul('serhat','nevzat','serhat'); ?></td>
                <td class="center"><img src="Fotolar/serhat.jpg" width="37" height="54"></td>
                <td class="left"><?php echo "Serhat" ."</br>"."%".KazananYuzdeBul("serhat","nevzat","serhat"); ?> </td> 
        </tr>

        <tr>
                <td class="right"> <?php echo "Nevzat" ."</br>"."%". KazananYuzdeBul("nevzat","salih","nevzat"); ?></td> 
                <td class="center"><img src="Fotolar/nevzat.jpg" width="37" height="54"></td>
                <td class="right"><?php echo KazananBul('nevzat','salih','nevzat'); ?></td>
                <td class="center">VS</td>
                <td class="left"><?php echo KazananBul('salih','nevzat','salih'); ?></td>
                <td class="center"><img src="Fotolar/salih.jpg" width="37" height="54"></td>
                <td class="left"><?php echo "Salih" ."</br>"."%".KazananYuzdeBul("salih","nevzat","salih"); ?> </td> 
        </tr>
    </table>
</div>

<div class="container bg-secondary mt-3 text-white text-center border">
        <h3>Serhat</h3>   
</div>

<div class="container mt-3 border">
    <table class="table table-striped">

        <tr>
                <td class="right"> <?php echo "Serhat" ."</br>"."%". KazananYuzdeBul("serhat","salih","serhat"); ?></td> 
                <td class="center"><img src="Fotolar/serhat.jpg" width="37" height="54"></td>
                <td class="right"><?php echo KazananBul('serhat','salih','serhat'); ?></td>
                <td class="center">VS</td>
                <td class="left"><?php echo KazananBul('salih','serhat','salih'); ?></td>
                <td class="center"><img src="Fotolar/salih.jpg" width="37" height="54"></td>
                <td class="left"><?php echo "Salih" ."</br>"."%".KazananYuzdeBul("salih","serhat","salih"); ?> </td> 
        </tr>

        <tr>
                <td class="right"> <?php echo "Serhat" ."</br>"."%". KazananYuzdeBul("serhat","cihan","serhat"); ?></td> 
                <td class="center"><img src="Fotolar/serhat.jpg" width="37" height="54"></td>
                <td class="right"><?php echo KazananBul('serhat','cihan','serhat'); ?></td>
                <td class="center">VS</td>
                <td class="left"><?php echo KazananBul('cihan','serhat','cihan'); ?></td>
                <td class="center"><img src="Fotolar/cihan.jpg" width="37" height="54"></td>
                <td class="left"><?php echo "Cihan" ."</br>"."%".KazananYuzdeBul("cihan","serhat","cihan"); ?> </td> 
        </tr>

        <tr>
                <td class="right"> <?php echo "Serhat" ."</br>"."%". KazananYuzdeBul("serhat","serbay","serhat"); ?></td> 
                <td class="center"><img src="Fotolar/serhat.jpg" width="37" height="54"></td>
                <td class="right"><?php echo KazananBul('serhat','serbay','serhat'); ?></td>
                <td class="center">VS</td>
                <td class="left"><?php echo KazananBul('serbay','serhat','serbay'); ?></td>
                <td class="center"><img src="Fotolar/serbay.jpg" width="37" height="54"></td>
                <td class="left"><?php echo "Serbay" ."</br>"."%".KazananYuzdeBul("serbay","serhat","serbay"); ?> </td> 
        </tr>

        <tr>
                <td class="right"> <?php echo "Serhat" ."</br>"."%". KazananYuzdeBul("serhat","nevzat","serhat"); ?></td> 
                <td class="center"><img src="Fotolar/serhat.jpg" width="37" height="54"></td>
                <td class="right"><?php echo KazananBul('serhat','nevzat','serhat'); ?></td>
                <td class="center">VS</td>
                <td class="left"><?php echo KazananBul('nevzat','serhat','nevzat'); ?></td>
                <td class="center"><img src="Fotolar/nevzat.jpg" width="37" height="54"></td>
                <td class="left"><?php echo "Nevzat" ."</br>"."%".KazananYuzdeBul("nevzat","serhat","nevzat"); ?> </td> 
        </tr>

    </table>        
</div>

<div class="container bg-secondary mt-3 text-white text-center border">
        <h3>Cihan</h3>   
</div>

<?php 
            function KazananBul($oyuncuBir,$oyuncuIki,$oyuncuKazanan){   
            global $dataBaseConn;     
            $query=$dataBaseConn->prepare("SELECT * FROM skorsakla WHERE birincioyuncu LIKE ? AND ikincioyuncu LIKE ? AND galip LIKE ? OR birincioyuncu LIKE ? AND ikincioyuncu LIKE ? AND galip LIKE ? "); 
            $query->execute([$oyuncuBir,$oyuncuIki,$oyuncuKazanan,$oyuncuIki,$oyuncuBir,$oyuncuKazanan]);           
            $birincininKazandigiOyun=$query->rowCount();
            if($birincininKazandigiOyun>0){
                
                return $birincininKazandigiOyun;
            }
            else {

                return "Veri Yok";
            }
            }
        ?>


<div class="container mt-3 border">
    <table class="table table-striped">
        <tr>
                <td class="right"> <?php echo "Cihan" ."</br>"."%". KazananYuzdeBul("cihan","serhat","cihan"); ?></td> 
                <td class="center"><img src="Fotolar/cihan.jpg" width="37" height="54"></td>
                <td class="right"><?php echo KazananBul('cihan','serhat','cihan'); ?></td>
                <td class="center">VS</td>
                <td class="left"><?php echo KazananBul('serhat','cihan','serhat'); ?></td>
                <td class="center"><img src="Fotolar/serhat.jpg" width="37" height="54"></td>                
                <td class="left"><?php echo "Serhat" ."</br>"."%".KazananYuzdeBul("serhat","cihan","serhat"); ?> </td> 
        </tr>

        <tr>
                <td class="right"> <?php echo "Cihan" ."</br>"."%". KazananYuzdeBul("cihan","serbay","cihan"); ?></td> 
                <td class="center"><img src="Fotolar/cihan.jpg" width="37" height="54"></td>
                <td class="right"><?php echo KazananBul('cihan','serbay','cihan'); ?></td>
                <td class="center">VS</td>
                <td class="left"><?php echo KazananBul('serbay','cihan','serbay'); ?></td>
                <td class="center"><img src="Fotolar/serbay.jpg" width="37" height="54"></td>
                <td class="left"><?php echo "Serbay" ."</br>"."%".KazananYuzdeBul("serbay","cihan","serbay"); ?> </td> 
        </tr>


        <tr>
                <td class="right"> <?php echo "Cihan" ."</br>"."%". KazananYuzdeBul("cihan","salih","cihan"); ?></td> 
                <td class="center"><img src="Fotolar/cihan.jpg" width="37" height="54"></td>
                <td class="right"><?php echo KazananBul('cihan','salih','cihan'); ?></td>
                <td class="center">VS</td>
                <td class="left"><?php echo KazananBul('salih','cihan','salih'); ?></td>
                <td class="center"><img src="Fotolar/salih.jpg" width="37" height="54"></td>
                <td class="left"><?php echo "Salih" ."</br>"."%".KazananYuzdeBul("salih","cihan","salih"); ?> </td> 
        </tr>


        <tr>
                <td class="right"> <?php echo "Cihan" ."</br>"."%". KazananYuzdeBul("cihan","nevzat","cihan"); ?></td> 
                <td class="center"><img src="Fotolar/cihan.jpg" width="37" height="54"></td>
                <td class="right"><?php echo KazananBul('cihan','nevzat','cihan'); ?></td>
                <td class="center">VS</td>
                <td class="left"><?php echo KazananBul('nevzat','cihan','nevzat'); ?></td>
                <td class="center"><img src="Fotolar/nevzat.jpg" width="37" height="54"></td>
                <td class="left"><?php echo "Nevzat" ."</br>"."%".KazananYuzdeBul("nevzat","cihan","nevzat"); ?> </td> 
        </tr>
    </table>
</div>

<div class="container bg-secondary mt-3 text-white text-center border">
        <h3>Serbay</h3>   
</div>

<div class="container mt-3 border">
    <table class="table table-striped">

                

        <tr>
            <td class="right"> <?php echo "Serbay" ."</br>"."%". KazananYuzdeBul("serbay","salih","serbay"); ?></td> 
            <td class="center"><img src="Fotolar/serbay.jpg" width="37" height="54"></td>
            <td class="right"><?php echo KazananBul('serbay','salih','serbay'); ?></td>
            <td class="center">VS</td>
            <td class="left"><?php echo KazananBul('salih','serbay','salih'); ?></td>
            <td class="center"><img src="Fotolar/salih.jpg" width="37" height="54"></td>
            <td class="left"><?php echo "Salih" ."</br>"."%".KazananYuzdeBul("salih","serbay","salih"); ?> </td> 
        </tr>

        <tr>
            <td class="right"> <?php echo "Serbay" ."</br>"."%". KazananYuzdeBul("serbay","serhat","serbay"); ?></td> 
            <td class="center"><img src="Fotolar/serbay.jpg" width="37" height="54"></td>
            <td class="right"><?php echo KazananBul('serbay','serhat','serbay'); ?></td>
            <td class="center">VS</td>
            <td class="left"><?php echo KazananBul('serhat','serbay','serhat'); ?></td>
            <td class="center"><img src="Fotolar/serhat.jpg" width="37" height="54"></td>
            <td class="left"><?php echo "Serhat" ."</br>"."%".KazananYuzdeBul("serhat","serbay","serhat"); ?> </td> 
        </tr>

        <tr>
            <td class="right"> <?php echo "Serbay" ."</br>"."%". KazananYuzdeBul("serbay","cihan","serbay"); ?></td> 
            <td class="center"><img src="Fotolar/serbay.jpg" width="37" height="54"></td>
            <td class="right"><?php echo KazananBul('serbay','cihan','serbay'); ?></td>
            <td class="center">VS</td>
            <td class="left"><?php echo KazananBul('cihan','serbay','cihan'); ?></td>
            <td class="center"><img src="Fotolar/cihan.jpg" width="37" height="54"></td>
            <td class="left"><?php echo "Cihan" ."</br>"."%".KazananYuzdeBul("cihan","serbay","cihan"); ?> </td> 
        </tr>

        <tr>
            <td class="right"> <?php echo "Serbay" ."</br>"."%". KazananYuzdeBul("serbay","nevzat","serbay"); ?></td> 
            <td class="center"><img src="Fotolar/serbay.jpg" width="37" height="54"></td>
            <td class="right"><?php echo KazananBul('serbay','nevzat','serbay'); ?></td>
            <td class="center">VS</td>
            <td class="left"><?php echo KazananBul('nevzat','serbay','nevzat'); ?></td>
            <td class="center"><img src="Fotolar/nevzat.jpg" width="37" height="54"></td>
            <td class="left"><?php echo "Nevzat" ."</br>"."%".KazananYuzdeBul("nevzat","serbay","nevzat"); ?> </td> 
        </tr>

    </table>
</div>

<div class="container bg-secondary mt-3 text-white text-center border">
        <h3>Salih</h3>   
</div>

<div class="container mt-3 border">
    <table class="table table-striped">

        <tr>
                <td class="right"> <?php echo "Salih" ."</br>"."%". KazananYuzdeBul("salih","cihan","salih"); ?></td>
                <td class="center"><img src="Fotolar/salih.jpg" width="37" height="54"></td>
                <td class="right"><?php echo KazananBul('salih','cihan','salih'); ?></td>
                <td class="center">VS</td>
                <td class="left"><?php echo KazananBul('cihan','salih','cihan'); ?></td>
                <td class="center"><img src="Fotolar/cihan.jpg" width="37" height="54"></td>
                <td class="left"><?php echo "Cihan" ."</br>"."%".KazananYuzdeBul("cihan","salih","cihan"); ?> </td> 
        </tr>

        <tr>
                <td class="right"> <?php echo "Salih" ."</br>"."%". KazananYuzdeBul("salih","serhat","salih"); ?></td>
                <td class="center"><img src="Fotolar/salih.jpg" width="37" height="54"></td>
                <td class="right"><?php echo KazananBul('salih','serhat','salih'); ?></td>
                <td class="center">VS</td>
                <td class="left"><?php echo KazananBul('serhat','salih','serhat'); ?></td> 
                <td class="center"><img src="Fotolar/serhat.jpg" width="37" height="54"></td>
                <td class="left"><?php echo "Serhat" ."</br>"."%".KazananYuzdeBul("serhat","salih","serhat"); ?> </td> 
        </tr>

        <tr>
                <td class="right"> <?php echo "Salih" ."</br>"."%". KazananYuzdeBul("salih","serbay","salih"); ?></td>
                <td class="center"><img src="Fotolar/salih.jpg" width="37" height="54"></td>
                <td class="right"><?php echo KazananBul('salih','serbay','salih'); ?></td>
                <td class="center">VS</td>
                <td class="left"><?php echo KazananBul('serbay','salih','serbay'); ?></td>
                <td class="center"><img src="Fotolar/serbay.jpg" width="37" height="54"></td>
                <td class="left"><?php echo "Serbay" ."</br>"."%".KazananYuzdeBul("serbay","salih","serbay"); ?> </td> 
        </tr>

        <tr>
                <td class="right"> <?php echo "Salih" ."</br>"."%". KazananYuzdeBul("salih","nevzat","salih"); ?></td>
                <td class="center"><img src="Fotolar/salih.jpg" width="37" height="54"></td>
                <td class="right"><?php echo KazananBul('salih','nevzat','salih'); ?></td>
                <td class="center">VS</td>
                <td class="left"><?php echo KazananBul('nevzat','salih','nevzat'); ?></td> 
                <td class="center"><img src="Fotolar/nevzat.jpg" width="37" height="54"></td>
                <td class="left"><?php echo "Nevzat" ."</br>"."%".KazananYuzdeBul("nevzat","salih","nevzat"); ?> </td> 
        </tr>
            
    </table>
</div>
<!-- oyun skorları
    <div class="container bg-primary mt-3 text-white text-center border">
    <h3 id="oSkorlari">Oyun Skorları</h3>
    </div>

    <div class="container mt-3 border ">
        <table id="tablebir" class="table table-striped">
                <tr >
                    <th>Date</th>
                    <th>Player_1</th>
                    <th>Score</th>
                    <th>Player_2</th>                
                    <th>Winner</th>
                </tr>

        <?php
                $queryListele=$dataBaseConn->prepare("SELECT * FROM skorsakla ORDER BY tarih DESC LIMIT 12");
                $queryListele->execute();
                $oyunSayisi=$queryListele->rowCount();
                $listeleDizi= $queryListele->fetchall(PDO::FETCH_ASSOC);

                if($oyunSayisi>0){                    
                    foreach($listeleDizi as $satirlar) {  ?>                                            
                        <tr >
                        <td ><?php $yeniFormat = "d.m.Y"; echo "". date($yeniFormat, strtotime($satirlar["tarih"]));  ?></td>
                        <td ><?php  echo $satirlar["birincioyuncu"];?></td>  
                        <td > <?php echo $satirlar["birincioyuncuskor"]. "-" . $satirlar["ikincioyuncuskor"];?></td>
                        <td ><?php  echo $satirlar["ikincioyuncu"]; ?></td>                  
                        <td ><?php  echo $satirlar["galip"] ?></td>                                     
                        </tr>
                    
                        <?php } }?>
                    
            </table>

    </div>  
-->
<div id="hakkinda" class="container alert alert-warning mt-5 border">
        For complaints about scoring, please contact us.    - Kişisel Kullanım içindir. Ticari bir değeri yoktur.
</div>

            

</body>
</html>
