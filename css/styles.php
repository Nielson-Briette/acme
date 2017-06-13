<?php
    header("Content-type: text/css; charset: UTF-8");
?>
<?php
header("Content-type: text/css; charset: UTF-8");
        $border = "1px";
        $padding= "0.2em";
        $position= "relative";
        $outline= "0";
        $textalign= "center";
        $fontweight= "bold";
        $borderbottomwidth= "2px";
        $background= "#fff";
?>

td, th {
        border: $border;
        padding: $padding;
        position: $position;
        outline: $outline;
        text-align: $text-align;
}

 th {
        fontweight: $fontweight;
    }
    
    thead th {
    borderbottomwidth: $borderbottomwidth;
  }
    
    table{
   background: $background;
    }