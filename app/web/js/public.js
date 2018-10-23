$(document).ready(function(){
    $("#submit").on('click', (function(e){
      e.preventDefault();
      var formData = new FormData($('#data-form')[0]);
          $.ajax({
              type: "POST",
              url: "pub",
              processData: false,
              contentType: false,
              cache: false,
              data: formData,
              success:function(data){
                $('#status').text("Опубликовано!");
                $('#status').show();
                window.setTimeout(function(){$('#status').hide(300);}, 5000);
              }
          });
    }));
});