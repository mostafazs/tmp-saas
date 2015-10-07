<?php function hr($value){echo "<hr/>".$value."<hr/>";} ?>
<!DOCTYPE HTML>
<html>
<head><title>CSV-JSON Better Code</title>
<meta charset="UTF-8"/>
</head>
<body>
<div id="content"></div>
<?
//$fh = fopen("./InEx-EN-NoLine.csv","r");
$fh = fopen("./InEx-Main.csv","r");
//$contents = fread($fh, filesize("./InEx-EN-NoLine.csv"));
$contents = fread($fh, filesize("./InEx-Main.csv"));
$arr1 = array();
$arr2 = array();
$arr3 = array();
$arr4 = array();
$exp1 = explode("\n",$contents);
hr("Start");
//foreach($exp1 as $a){echo $a."<br/>";}"<br/>";
hr('End');
hr("Using for");
//for($i=0;$i<count($exp1);$i++){echo $exp1[$i]."<br/>";}
hr('Using For');

hr("Using for OK");
for($i=1;$i<count($exp1);$i++){
	$values = explode(",",$exp1[$i]);
	//echo $exp1[$i]."<br/>";
	$values = array(
	"Desc" => $values[0],
	"Amount" => $values[1],
	"From" => $values[2],
	"To" => $values[3],
	"Type" => $values[4],
	"Transaction"=> $values[5],
	"Day" => $values[6],
	"Month" => $values[7],
	"Year" => $values[8],
	"Category" => $values[9],
	"Currency" => $values[10]);
	array_push($arr1,$values);
}	
hr('Using For OK');
hr('Using For Other');
//print_r($arr1);
echo "<br/>";
hr('Using For Other');
$json = json_encode($arr1,JSON_UNESCAPED_UNICODE);
hr('JSON Start');
//echo $json;
hr('JSON End');
//$json = json_encode($result);
//echo $json;
?>
<script type="text/javascript">
var json = '<?php echo $json; ?>';
console.log(json);
//var json = JSON.stringify(json);
var json = JSON.parse(json);
console.log(json[0].Desc);
</script>





<script type="text/javascript">
//create downloadable json file from json data
var json = JSON.stringify(json);
var blob = new Blob([json], {type: "application/json"});
var url  = URL.createObjectURL(blob);

var a = document.createElement('a');
a.download    = "backup.json";
a.href        = url;
a.textContent = "Download backup.json";

</script>
</body>
</html>
