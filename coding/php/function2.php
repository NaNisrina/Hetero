<?php
  //1
    function jumlah(){
        $x = 2;
        $y = 10;

        echo $x+$y;
    }
      jumlah();
      echo "<br>";
      jumlah();
      echo "<br>";

  //2
    function it($x, $y){
        echo $x+$y;
    }
      it(10, 10);
      echo "<br>";
      it(2, 1);
      echo "<br>";

  //3
    function hal($x=0, $y=0){
        echo $x+$y;
    }

      hal();
      echo "<br>";
      hal();
      echo "<br>";

  //4
    require "function1.php";

    fun_jalan(0, 1)
?>