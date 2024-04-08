<?php
require_once("baglan.php");
?>

<head>
  <title>Maç Listele</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    var silmeIslemi;
    function uyari(){      
      alert("Kayıt Silindi");}                
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

        .h3class{
          margin-top: 7px;
         
        }
             

  </style>
</head>

<body>

<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php">Maç Listele</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="collapsibleNavbar">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="index.php">Home</a>
        </li>               
      </ul>
    </div>
  </div>

</nav>

<div class="container mt-3 mb-3 ml-3 mr-3 col-md-3">  
      <h3 for="date" >Tarih:</h3>
      <form  method="post" name="tarih">
      <input type="date" class="form-control mt-2 mb-2" name="tarih">   <!-- tarih burada   --> 
      <button type="submit" class="btn btn-primary btn-md mt-3 mb-3" onclick="">Listele</button>
      </form>  
</div>

<div class="container bg-secondary mt-3 text-white text-center border"><!--skorlar-->
    <h3 id="oSkorlari">Oyun Skorları</h3>
</div>
    
<div class="container mt-3 border ">
        <table class="table table-striped">
              <tr >
                  <th>Date</th>
                  <th>Player_1</th>
                  <th>Score</th>
                  <th>Player_2</th>                
                  <th>Winner</th>
                                     
              </tr>
                <?php

              
                    $queryListele=$dataBaseConn->prepare("SELECT * FROM skorsakla WHERE tarih=?");
                    if(isset($_POST["tarih"])){
                        $tarih=$_POST["tarih"];                        
                    } else {
                        $tarih="2023-09-18";
                    }
                    
                    $queryListele->execute([$tarih]);
                    //$queryListele->execute();
                    $oyunSayisi=$queryListele->rowCount();
                    $listeleDizi= $queryListele->fetchall(PDO::FETCH_ASSOC);


                    if($oyunSayisi>0){                    
                        foreach($listeleDizi as $satirlar) {  ?>                                                    
                            <tr >
                                <td ><?php $yeniFormat = "d.m.Y"; echo "". date($yeniFormat, strtotime($satirlar["tarih"]));  ?></td>
                                <td ><?php  echo $satirlar["birincioyuncu"];?></td>  
                                <td > <?php echo $satirlar["birincioyuncuskor"]. "-" . $satirlar["ikincioyuncuskor"];?></td>
                                <td ><?php  echo $satirlar["ikincioyuncu"]; ?></td>                  
                                <td ><?php  echo $satirlar["galip"];?></td>
                            </tr>                 
                <?php } } else{ ?>
                            <tr>
                                <td class="center"  colspan="5" style="background-color:#F08080;"> Seçilen Gün İçin Kayıt Yok</td>
                            </tr>
                
                    

                <?php }  ?>
                    

               
          </table>
</div>


</body>


</html>