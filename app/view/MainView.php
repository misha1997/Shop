<?php namespace app\view;

class MainView
{
	function __construct($view, $main) 
	{
		$view->load('app/web/view_templates/pageMain.tpl');
		$view->set('title', 'Главная страница');

		$pagin = array();
		$pagin['prePage'] = 6;
		$pagin['currentPage'] = isset($_GET['page']) ? $_GET['page'] : 1;
		$pagin['offset'] = ($pagin['currentPage'] * $pagin['prePage']) - $pagin['prePage'];

		foreach ($main->GetPost($pagin['offset'], $pagin['prePage']) as $value) {
			$view->set('id', $value['id']);
			$view->set('title_post', $value['title']);
			$view->set('image', $value['image']);
			$view->set('price', $value['price']);
			$view->set('description', $value['description']);
			$posts[] = $view->parse('app/web/view_templates/inc/post.tpl');
		}

		foreach ($main->GetCount() as $value) {
			$count = $value['count'];
		}

		$pagin['pageCnt'] = ceil($count / $pagin['prePage']);
		for ($i=1; $i <= $pagin['pageCnt']; $i++) { 
			if ($pagin['currentPage'] == $i) {
				$pag[] = '<span style="font-weight: bold">'.$i.'</span>';
			} else {
				$pag[] = '<a href="?page='.$i.'">'.$i.'</a>';
			}
		}

		$view->set('pagin', $pag);
		$view->set('post', $posts);
		$view->tplParse();
		echo $view->html;
	}
}