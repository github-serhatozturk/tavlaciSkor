<?php
require_once("baglan.php");

?>

<head>
  <title>Skor Gir</title>
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
    <a class="navbar-brand" href="index.php">Skor Girişi</a>
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

<div class="container mt-3 mb-3 ml-3 mr-3 border">
  <div class="container mt-3 mb-3 ml-3 mr-3 col-md-3">    
    <form action="crud.php" method="post">

      <h3 for="date" >Tarih:</h3>
      <input type="date" class="form-control mt-2 mb-2" name="date">   <!-- tarih burada   -->

         <h3 class="h3class">1.Oyuncu</h3>

        <select class="form-select form-select-lg mt-3" name="birincioyuncu" id="select1">
          <option value="seciniz">oyuncu seciniz</option>
          <option value="serhat">serhat</option>
          <option value="cihan">cihan</option>
          <option value="serbay">serbay</option>
          <option value="nevzat">nevzat</option>
          <option value="salih">salih</option>
         </select> 

        <select class="form-select form-select-lg mt-3" name="oyuncubirskor" id="select11">
            <option value="skorgir">skor giriniz</option>
            <option value="0">0</option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
            <option value="6">6</option>
          </select> 

         <h3 class="h3class">2.Oyuncu</h3>

        <select class="form-select form-select-lg mt-3" name="ikincioyuncu" id="select2">
          <option value="seciniz">oyuncu seciniz</option>
          <option value="serhat">serhat</option>
          <option value="cihan">cihan</option>
          <option value="serbay">serbay</option>
          <option value="nevzat">nevzat</option>
          <option value="salih">salih</option>
         </select> 

        <select class="form-select form-select-lg mt-3" name="oyuncuikiskor" id="select22" >
            <option value="skorgir">skor giriniz</option>
            <option value="0">0</option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
            <option value="6">6</option>         
         </select>        
        <button type="submit" href="crud.php" class="btn btn-primary btn-lg mt-3 mb-3" onclick="">Kaydet</button>
    </form>    
  </div>
</div>

<div class="container mt-3">

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
                  <th></th>
                   
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
                      <td ><?php  echo $satirlar["galip"];?></td>

                      
                      <form action="silcrud.php" method="post">              
                        <td ><button type="submit" class="btn btn-danger btn-sm" value="<?php $id=$satirlar["id"]; echo $id; ?>" name="silinecekKayit" onclick="uyari()">Sil</button></td>
                      </form>

  
                      </tr>
                  
                      <?php } }?>

                     

                    

          </table>
    



    
    
  

  </div>

</div>

</body>


</html>