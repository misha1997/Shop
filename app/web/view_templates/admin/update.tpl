<!DOCTYPE html>
<html>
<head>
  [include=app/web/view_templates/inc/header.tpl]
</head>
<body>
    [include=app/web/view_templates/inc/menu.tpl]
	<div class="global-cont">
	    <div class="container">
	      <div class="row">
	        [include=app/web/view_templates/admin/inc/leftMenu.tpl]
	        <div class="col-md-10">
            <form class="form-horizontal" role="form"  action="" method="post" enctype="multipart/form-data">
              <div class="form-group">
                <label for="title" class="col-sm-2 control-label">Название</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="title" name="title" value="[title]">
                </div>
              </div>
              <div class="form-group">
                <label for="description" class="col-sm-2 control-label">Описание</label>
                <div class="col-sm-10">
                    <textarea class="form-control" name="description" id="description" rows="8">[description]</textarea>
                </div>
              </div>
              <div class="form-group">
                <label for="price" class="col-sm-2 control-label">Цена</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="price" name="price" value="[price]">
                </div>
              </div>
              <div class="form-group">
                <label for="image" class="col-sm-2 control-label">Изображение</label>
                <div class="col-sm-10" style="margin-top: 5px">
                  <img src="app/web/img/[image]" width="100px" style="float: left;margin-right: 20px">
                <input type="file" id="image" name="image" style="margin: 20px">
                </div>
              </div>
                <div class="col-sm-offset-2 col-sm-10">
                  <button type="submit" name="update" class="btn btn-default">Сохранить</button>
            	    <button type="reset" class="btn btn-default">Очистить</button>
                  <button type="submit" name="delete" class="btn btn-default">Удалить</button>
                </div>
              </div>
            </form>
	        </div>
	      </div>
	    </div>
	</div>
</body>
</html>