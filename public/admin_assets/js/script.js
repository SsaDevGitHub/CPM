$(document).ready(function() {
  var $note = $('.summernote-container').summernote({
    height: 500
  });
  
  html = "<div class='outside' style='position: fixed;display: inline block;right: 50px;bottom: 50px;font-size: 30px;background-color: red;padding: 10px;color: white;'>This is otuside</div>"
  
  $note.code(html);
});