<!DOCTYPE html>
<html>
<head>
  [include=app/web/view_templates/inc/header.tpl]
  <script type="text/javascript" src="app/web/js/public.js"></script>
</head>
<body>
    [include=app/web/view_templates/inc/menu.tpl]
  <div class="global-cont">
      <div class="container">
        <div class="row">
          [include=app/web/view_templates/admin/inc/leftMenu.tpl]
          <div class="col-md-10">
            <div class="bg-success" id="status"></div>
            <form class="form-horizontal" role="form" id="data-form" action="" method="POST" enctype="multipart/form-data">
              <div class="form-group">
                <label for="title" class="col-sm-2 control-label">Название</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="title" name="title">
                </div>
              </div>
              <div class="form-group">
                <label for="description" class="col-sm-2 control-label">Описание</label>
                <div class="col-sm-10">
                    <textarea class="form-control" name="description" id="description" rows="8"></textarea>
                </div>
              </div>
              <div class="form-group">
                <label for="price" class="col-sm-2 control-label">Цена</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="price" name="price">
                </div>
              </div>
              <div class="form-group">
                <label for="image" class="col-sm-2 control-label">Изображение</label>
                <div class="col-sm-10" style="margin-top: 5px">
                <input type="file" id="image" name="image">
                </div>
              </div>
                <div class="col-sm-offset-2 col-sm-10">
                  <button type="submit" name="send" id="submit" class="btn btn-default">Добавить</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
  </div>
</body>
</html>