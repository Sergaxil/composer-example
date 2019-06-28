<?php 
error_reporting(E_ALL);
ini_set('display_errors', 'on');
/*$href =  'index.html';
$text = 'ссылка';

//echo 'Привет, '. $name['name'] . '! Тебе '. $name['age']. ' лет';
//echo "Привет, {$name['name']}! Тебе {$name['age']} лет";

//echo '<a href="'.$href.'">'.$text.'</a>';
echo "<a href=\"$href\">$text</a>";
$array = [1, 2, 3, 4];
echo '<ul>';
foreach ($array  as $value) {
	echo "<li>$value</li>";
}
echo '</ul>';

$arr = [
		['href'=>'1.html', 'text'=>'ссылка 1'],
		['href'=>'2.html', 'text'=>'ссылка 2'],
		['href'=>'3.html', 'text'=>'ссылка 3'],
	];

	foreach ($arr as $value) {
			echo "<a href=\"{$value['href']}\">{$value['text']}</a><br>";
	}

$array1 = [
		['name'=>'Коля', 'age'=>30, 'salary'=>500],
		['name'=>'Вася', 'age'=>31, 'salary'=>600],
		['name'=>'Петя', 'age'=>32, 'salary'=>700],
	];

	echo "<table><tr>";
	foreach ($array1 as $value) {
		echo "<tr><td>{$value['name']}</td><td>{$value['age']}</td><td>{$value['salary']}</td></tr>";
	}
	echo "</tr></table>";

	if (isset($_GET['arm']) && $_GET['arm']==1) {
		echo "Привет";
	}
	elseif (isset($_GET['arm']) && $_GET['arm']==2) {
		echo "Пока";
	}

	$arr = ['a', 'b', 'c', 'd'];
	if (isset($arr[$_GET['get']])) {
		echo $arr[$_GET['get']];
	}

	if (isset($_GET['get'])) {
		echo $_GET['get'];
		echo '<br>';
		}
		echo "<ul>";
		for ($i=1; $i <=10 ; $i++) { 
			echo "<li><a href=\"?get=$i\">$i </a></li>";
		}
		echo "</ul>";

$array = ['a', 'b', 'c', 'd', 'e', 'f', 'g'];
if (isset($_GET['get']) && isset($array[$_GET['get']])) {
	echo $array[$_GET['get']];
}
echo '<br>';

foreach ($array as $key => $value) {
	echo "<a href=\"?get=$key\"> link $value</a>";
}
*/	
$user = 'root';
$password = '250289';

$connect = new PDO('mysql:host=localhost; dbname=traning; charset=utf8', $user, $password);


if (isset($_GET['del'])) {
	$del = $_GET['del'];
	$delete = "DELETE FROM working WHERE id = ?";
	$delrow = $connect->prepare($delete);
	$delrow->execute(array($del));
}
function input($name)
{
	if (isset($_POST['$name'])) {
		$value = $_POST['$name'];
	}
	else{
		$value = '';
	}
	return "<input name = '$name' value = '$value' placeholder = '$name'>";
}
if (isset($_POST['name']) && isset($_POST['age']) && isset($_POST['salary'])) {
	$name = $_POST['name'];
	$age = $_POST['age'];
	$salary = $_POST['salary'];
}


$ins = "INSERT INTO working (name, age, salary) VALUES (?, ?, ?)";
$add = $connect -> prepare($ins);
$add->execute(array($_POST['name'],$_POST['age'],$_POST['salary']));

$item = $connect->query('SELECT * FROM working');
$result = $item->fetchAll(PDO::FETCH_ASSOC);
var_dump($result);
echo '<table><tr><th>name</th><th>age</th><th>salary</th><th>delete</th></tr>';
$content = '<table><tr><th>name</th><th>age</th><th>salary</th></tr>';
$content = "";
foreach ($result as $value) {
	$content.="<tr>";
	$content.="<td>{$value['name']}</td>";
	$content.="<td>{$value['age']}</td>";
	$content.="<td>{$value['salary']}</td>";
	$content.="<td><a href=\"?del={$value['id']}\">delete</a></td>";
	$content.="</tr>";
}
	echo $content;
	echo '</table>';

?>
    <form action="" method="POST">
		<?php echo input('name')  ?>
		<?php echo input('age')  ?>
		<?php echo input('salary')  ?>
		<input type="submit" name="submit" value="Добавить работника">
    </form>



