<?
	class HOME{
		
		public function __construct($pdo, $smarty){
			$stmt = $pdo->prepare("SELECT `id`, `name`, `surname`, `patronymic` FROM `workers`");
			$stmt->execute([]);
			$stmt->setFetchMode(PDO::FETCH_ASSOC);
			if($_SESSION['role'] != null){
				while($row = $stmt->fetch())
				{
					$body = $body . "<tr><td>" . $row['id'] . "</td><td>" . $row['name'] . "</td><td>" . $row['patronymic'] . "</td><td>" .$row['surname'] ."</td><td><a href = '/?action=1&id=".$row['id']."'>Посмотреть</a></td>";
					if($_SESSION['role'] == "admin"){
						$body = $body . "<td><a href = '/?action=2&step=0&id=".$row['id']."'>Изменить</a>/<a href = '/?action=4&id=".$row['id']."'>Удалить</a></td>";
					}
					if($_SESSION['role'] == "moder"){
						$body = $body . "<td><a href = '/?action=2&step=0&id=".$row['id']."'>Изменить</a></td>";
					}
					$body = $body . "</tr>";
				}
				$smarty->assign('body', $body);
				if($_SESSION['role'] == "admin"){
					$smarty->assign('actionAdd', "<a href = '/?action=3&step=0'> Добавление работника </a><br><br>");
				}
				$smarty->display('index.tpl');
			}else{
				$smarty->display('loginpage.tpl');
			}
		}
		
	}
?>