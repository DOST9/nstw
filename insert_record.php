<?php
 include "db.php";

$jsons = $_POST["jsondata"];
$dataArray = json_decode($jsons, true);
$name='';
$gender='';
$agebracket='';
$haveAttend='';
$havePurchased='';
$insights='';
$organization='';
$event = '';
$reactions = '';

$name = $dataArray["name"];
$gender = $dataArray["gender"];
$agebracket = $dataArray["agebracket"];
$haveAttend = $dataArray["haveAttend"];
$havePurchased = $dataArray["havePurchased"];
$insights = $dataArray["insights"];
$organization = $dataArray["organization"];
$event = $dataArray["event"];
$reactions = $dataArray["reactions"];
$gg="";
$x=1;
foreach($event as $events) {
  $cnt = sizeOf($event);
  if($x==$cnt) {
  $gg = $gg.$events;
  }else{
  $gg = $gg.$events.",";
  }
  $x++;
}
//$event = $gg;
$marketplace = $dataArray["marketplace"];
$cc="";
$y=1;
foreach($marketplace as $marketplaces) {
  $cnts = sizeOf($marketplace);
  if($y==$cnts) {
    $cc = $cc.$marketplaces;
  }else{
    $cc = $cc.$marketplaces.",";
  }
  $y++;
}
$bb="";
$h=1;
foreach($insights as $insight) {
  $cnts = sizeOf($insights);
  if($h==$cnts) {
    $bb = $bb.$insight;
  }else{
    $bb = $bb.$insight.",";
  }
  $h++;
}
$overall = $dataArray["overall"];
$thumbs = $dataArray["thumbs"];

if($haveAttend=='No') {
  $haveAttend=0;
  $lastevent = $dataArray["lastevent"];
}else{
  $lastevent = '';
  $haveAttend=1;
}

if($havePurchased=='No') {
  $havePurchased=0;
  $transaction='';
  $pricing='';
  $relationship='';
}else{
  $havePurchased=1;
  $transaction = $dataArray["transaction"];
  $pricing = $dataArray["pricing"];
  $relationship = $dataArray["relationship"];
}

$insert = "INSERT INTO `tbl_register`(`full_name`,`gender`,`organization`,`event`,`marketplace`,`transaction`,`pricing`,`relationship`,`overall`,`agebracket`,`reactions`,`haveAttend`,`havePurchase`,`insights`,`thumbs`)";
$insert = $insert." VALUES('".$name."',";
$insert = $insert."'".$gender."',";
$insert = $insert."'".$organization."',";
$insert = $insert."'".$gg."',";
$insert = $insert."'".$cc."',";
$insert = $insert."'".$transaction."',";
$insert = $insert."'".$pricing."',";
$insert = $insert."'".$relationship."',";
$insert = $insert."'".$overall."',";
$insert = $insert."'".$agebracket."',";
$insert = $insert."'".$reactions."',";
$insert = $insert."'".$haveAttend."',";
$insert = $insert."'".$havePurchased."',";
$insert = $insert."'".$bb."',";
$insert = $insert."'".$thumbs."')";
$q=mysqli_query($con,$insert);

if($q)
echo "success";
else
echo "error";
  ?>