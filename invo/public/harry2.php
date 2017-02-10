<?php
$number = 123;
$txt = sprintf("带两位小数：%1\$.2f
<br>不带小数：%1\$u",$number);
echo $txt;
?>