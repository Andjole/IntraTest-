<?php
if($_REQUEST[esercizio]==1){
	$str=$_REQUEST[test_string];
	$arr=str_split($str, 2);
	foreach($arr as $k=>$v){
		if(strlen($v)==1){
			$arr[$k]=$v."_";
		}
	}
	foreach($arr as $k=>$v){
		echo $v." ";
	}
	$check_1="checked";
	$check_2="";
}else if($_REQUEST[esercizio]==2){
	$str=$_REQUEST[test_string];
	echo $str." ";
	$arr=str_split($str, 1);
	$arr_occ=array_count_values($arr);
	foreach($arr as $k=>$v){
		if($arr_occ[$v]>1){
			$arr[$k]=")";
		}else{
			$arr[$k]="(";
		}
	}
	foreach($arr as $k=>$v){
		echo $v;
	}
	$check_1="";
	$check_2="checked";
}else{
	$check_1="checked";
	$check_2="";
	echo "Insert string and select exercise<br>";
}
echo "<form method=\"post\" action=\"".$_SERVER[PHP_SELF]."\">";
echo "<input name=\"test_string\" value=\"$_REQUEST[test_string]\">";
ECHO "<input type=\"radio\" $check_1 value=\"1\" name=\"esercizio\"> Es 1 | <input type=\"radio\" $check_2 value=\"2\" name=\"esercizio\"> Es 2<br>";
echo "<input type=\"submit\" value=\"Invia\">";
echo "</form>";
?>