<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="bangso.css">
</head>
<body>
    <h1 style="text-align:center;">XỔ SỐ KIẾN THIẾT</h1>  
<?php
//giai 8
    $g8=rand(0,99);
    if(strlen($g8)==1)
    {
        $g8="0$g8";
    }
//giai 7
    $g7=rand(0,999);
    $dodai=strlen($g7);
    switch ($dodai) {
        case 1:
           $g7="00$g7";
            break;
        case 2:
            $g7="0$g7";
            break;
        default:
            echo"";
            break;           
    }  
//giai 6
for($i=1;$i<=3;$i++)
{
    $g6=rand(0,9999);
    $dodai=strlen($g6);
    switch ($dodai) {
        case 1:
           $g6="000$g6";
            break;
        case 2:
            $g6="00$g6";
            break;
        case 3:
            $g6="0$g6";
            break;
        default:
            echo"";
            break;           
    }
     $list_g6[]=$g6;
}
 //giai 5
    $g5=rand(0,9999);
    $dodai=strlen($g6);
    switch ($dodai) {
        case 1:
           $g5="000$g5";
            break;
        case 2:
            $g5="00$g5";
            break;
        case 3:
            $g5="0$g5";
            break;
        default:
            echo"";
            break;           
    }
 //giai 4
 for($i=1;$i<=7;$i++)
 {
 $g4=rand(0,99999);
 $dodai=strlen($g4);
 switch ($dodai) {
     case 1:
        $g4="0000$g4";
         break;
     case 2:
         $g4="000$g4";
         break;
     case 3:
         $g4="00$g4";
         break;
     case 4:
         $g4="0$g4";
     default:
         echo"";
         break;           
 }
 $list_g4[]=$g4;
}
 //giai 3
 for($i=1;$i<=2;$i++)
 {
 $g3=rand(0,99999);
 $dodai=strlen($g3);
 switch ($dodai) {
     case 1:
        $g3="0000$g3";
         break;
     case 2:
         $g3="000$g3";
         break;
     case 3:
         $g3="00$g3";
         break;
     case 4:
         $g3="0$g3";
     default:
         echo"";
         break;           
 }
 $list_g3[]=$g3;
}
  $g2=rand(0,99999);
  $dodai=strlen($g2);
  switch ($dodai) {
      case 1:
         $g2="0000$g2";
          break;
      case 2:
          $g2="000$g2";
          break;
      case 3:
          $g2="00$g2";
          break;
      case 4:
          $g2="0$g2";
      default:
          echo"";
          break;           
  }
   //giai 1
 $g1=rand(0,99999);
 $dodai=strlen($g1);
 switch ($dodai) {
     case 1:
        $g1="0000$g1";
         break;
     case 2:
         $g1="000$g1";
         break;
     case 3:
         $g1="00$g1";
         break;
     case 4:
         $g1="0$g1";
     default:
         echo"";
         break;           
 }
  //giai db
  $gdb=rand(0,999999);
  $dodai=strlen($gdb);
  switch ($dodai) {
      case 1:
         $gdb="00000$gdb";
          break;
      case 2:
          $gdb="0000$gdb";
          break;
      case 3:
          $gdb="000$gdb";
          break;
      case 4:
          $gdb="00$gdb";
      case 5:
        $gdb="0$gdb";
      default:
          echo"";
          break;           
  }
  //Xu ly do so
?>
<table class="table_kqxs">
<tbody>
<form class="form" action="Bai3.php">
    <tr class="giai_do">
    <td class="txt_giai">Giải 8</td>
        <td class="txt_number">
            <span data-nc="2" class="v-g8 ">
                <?php
                    echo $g8;
                ?>
            </span>
        </td>
    </tr>
    <tr class="bg_ef">
        <td class="txt_giai">Giải 7</td>
        <td class="txt_number">
            <span data-nc="3" class="v-g7 ">
            <?php
                    echo $g7;
                ?>
            </span>
        </td>
    </tr>
    <tr>
        <td class="txt_giai">Giải 6</td>
        <td class="txt_number">
            <span data-nc="4" class="v-g6-0 ">
            <?php
            foreach($list_g6 as $n){
                echo "&nbsp;&nbsp;&nbsp;".$n;
            }
            ?></span>
        </td>
    </tr>
    <tr class="bg_ef">
        <td class="txt_giai">Giải 5</td>
    <td class="txt_number">
        <span data-nc="4" class="v-g5 ">
        <?php
            echo $g5;
        ?>
        </span>
    </td>
</tr>
<tr class="g4">
    <td class="txt_giai">Giải 4</td>
<td class="txt_number">
    <span data-nc="5" class="v-g4-0 ">
        <?php
    foreach($list_g4 as $n){
                echo "&nbsp;&nbsp;&nbsp;".$n;
            }
        ?>
    </span>
</td>
</tr>
<tr class="bg_ef">
    <td class="txt_giai">Giải 3</td>
    <td class="txt_number">
        <span data-nc="5" class="v-g3-0 ">
        <?php
    foreach($list_g3 as $n){
                echo "&nbsp;&nbsp;&nbsp;".$n;
            }
        ?>
        </span>
    </td>
</tr>
<tr>
    <td class="txt_giai">Giải 2</td>
    <td class="txt_number">
        <span data-nc="5" class="v-g2 ">
        <?php
            echo $g2;
        ?>
        </span>
    </td>
</tr>
<tr class="bg_ef">
    <td class="txt_giai">Giải 1</td>
    <td class="txt_number">
        <span data-nc="5" class="v-g1 ">
        <?php
            echo $g1;
        ?>
        </span>
    </td>
</tr>
<tr class="giai_do">
    <td class="txt_giai">Giải ĐB</td>
    <td class="txt_number">
        <span data-nc="6" class="v-gdb ">
        <?php
            echo $gdb;
        ?>
        </span>
    </td>
</tr>
</form>
</tbody>
</table>
<body>
<html>
<?php
        $count=0;
        if(isset($_POST['veso'])) {
            $veso=$_POST['veso'];
        }
            else $veso=0;
    
    $ketqua="";
    if(isset($_POST['submit'])) 
    { 
    if($veso!=""){
        if($veso==$g8)
        {
        $ketqua="Giải 8";
        $count++;
        }
          if($veso==$g7)
          {
          $ketqua.="\nGiải 7";
          $count++;
          }
            if(in_array($veso,$list_g6))
            {
            $ketqua.="\nGiải 6";
            $count++;
            }
              if($veso==$g5)
              {
              $ketqua.="\nGiải 5";
              $count++;
              }
                if(in_array($veso,$list_g4))
                {
                $ketqua.="\nGiải 4";
                $count++;
                }
                  if(in_array($veso,$list_g3))
                  {
                  $ketqua.="\nGiải 3";
                  $count++;
                  }
                    if($veso==$g2)
                    {
                    $ketqua.="\nGiải 2";
                    $count++;
                    }
                      if($veso==$g1)
                      {
                      $ketqua.="\nGiải 1";
                      $count++;
                      }
                        if($veso==$gdb)
                        {
                        $ketqua.="\nGiải đặt biệt";
                        $count++;
                        }
         }
    }
        
    ?>   
<div class="kq">
        <label name="ketqua" >
        <input class="so" name="so" disabled="disabled" value="<?php echo "\nSố của bạn là $veso"?>">
        <br><br>
            <?php 
            if($count==0){
                echo " \nChúc bạn may mắn lần sau !!!";
            }else echo "\nBạn đã trúng $count giải!!!";
            echo $ketqua;
            ?>
        </label> 
</div>