<!DOCTYPE html>
<html>
<head>
	[include=app/web/view_templates/inc/header.tpl]
	<script type="text/javascript" src="app/web/js/delete.js"></script>
</head>
<body>
    [include=app/web/view_templates/inc/menu.tpl]
	<div class="global-cont">
	    <div class="container">
	      <div class="row">
	        [include=app/web/view_templates/admin/inc/leftMenu.tpl]
	        <div class="col-md-10">
	          <div class="table-responsive">
	            <table class="table table-striped">
	              <thead>
	                <tr>
						<th>Изображение</th>
						<th>Название</th>
						<th>Цена</th>
						<th>Описание</th>
						<th>Редактирование</th>
	                </tr>
	              </thead>
	              <tbody>
	                [post]
	              </tbody>
	            </table>
	            <div class="pagination">[pagin]</div>
	          </div>
	        </div>
	      </div>
	    </div>
	</div>
</body>
</html>