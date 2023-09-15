<!DOCTYPE html>

<html>

  <head>
    <!-- Title -->
    <title> Notes </title>
    <!-- Title -->
  </head>

  <body>
    <?php

    // ! for doctype

    // ends with ;
      echo "Hey ";

    // $ for tagging a variable
      $hey = "You";

    // echo is output
      echo "Hey $hey ";

    // <br> for new lines
      echo "Hey $hey <br>";

    // php is in <html> <body>
    // <body> <?php
    // ? > </body>

    // PIn PHP, keywords (e.g. if, else, while, echo, etc.), classes, functions, and user-defined functions are not case-sensitive.
    // Basically not Case Sensitive
      ECHO "HELLO! <br>";
      echo "hello! <br>";
      EcHo "HeLlO! <br>";

    // PHP is Space Sensitive
      echo "This is not spaced in the end";
      echo "This is spaced in the end ";
      echo "Test space <br>";

    // PHP is Variable Sensitive
      $sho = "Good";

      echo "That cookie is " .$sho. "<br>";
      // echo "That rice is " .$SHO. "<br>";
      // echo "Those shoes are " .$sHo. "<br>";

    // PHP Comments
      # Single-line Comment
      // Single-line Comment
      /* Multiple-lines Comment */

    ?>
  </body>

</html>
