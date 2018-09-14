<!DOCTYPE html>
<html>
<head>
	[include=app/web/view_templates/inc/header.tpl]
</head>
<body>
	[include=app/web/view_templates/inc/menu.tpl]
	<div class="wrapper">
		<div class="img">
			<img src="app/web/img/[image]">
		</div>
		<div class="info">
			<div class="title">
				[title]
			</div>
			<div class="price">
				Цена: <span>[price]</span>$
			</div>
			<div class="description">
				Описание: [description]
			</div>
		</div>
	</div>
</body>
</html>