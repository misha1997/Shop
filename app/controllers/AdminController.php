<?php namespace app\controllers;

use Libs\DIContainer;
use app\models\Admin;

class AdminController
{
	protected $di;
	protected $admin;

	function __construct() {
		$this->di = new DIContainer();
		$this->admin = new Admin();
	}
	function index() {	
        $this->di->get('adminView');
	}
	function renameFile($source, $tempfile) {
		$target_path ='app/web/img/'.$source;
		while(file_exists($target_path)){
			$fileName = uniqid().'-'.$source;
			$target_path = ('app/web/img/'.$fileName);
		}
		move_uploaded_file($tempfile, $target_path);
	}
	function publicTovar() {	
        $this->di->get('publicView');
		if(isset($_POST["send"])) {
			if (isset($_FILES['image'])) {
				$filename = $_FILES['image']['name'];
				$tempfile = $_FILES['image']['tmp_name'];
				$this->renameFile($filename, $tempfile);
				if ($filename == '') {$filename = "default.jpg";}
			}
			$title = htmlspecialchars ($_POST["title"]);
			$description = htmlspecialchars ($_POST["description"]);
			$price = htmlspecialchars ($_POST["price"]);
			$this->admin->PublicTovar($title, $description, $price, $filename);
		}
	}
	function deleteTovar() {	
        if (isset($_GET['del'])) {
			$this->admin->DeletTovar($_GET['del']);
        }
        $this->di->get('adminView');
	}
	function updateTovar() {	
		if(isset($_POST["update"])) {
			if (isset($_FILES['image'])) {
				$filename = $_FILES['image']['name'];
                $tempfile = $_FILES['image']['tmp_name'];
				$this->renameFile($filename, $tempfile);
				if ($filename == '') {
					foreach ($this->admin->GetPostId($_GET['up']) as $key) {
						$filename = $key['image'];
					}
				}
			}
			$id = $_GET['up'];
			$title = htmlspecialchars ($_POST["title"]);
			$description = htmlspecialchars ($_POST["description"]);
			$price = htmlspecialchars ($_POST["price"]);
			$category = htmlspecialchars ($_POST["category"]);
			$this->admin->UpdateTovar($id, $title, $description, $price, $filename);
			$this->di->get('updateView');
		} else {
			$this->di->get('updateView');
		}
	}
}