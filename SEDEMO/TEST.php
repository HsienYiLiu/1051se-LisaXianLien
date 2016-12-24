<!DOCTYPE html>
<html>
  <title>table_dialog.php</title>
  <head>
    <meta http-equiv=\"Content-Type\" content=\"text/html\"; charset=\"UTF-8\">
    <!--jQuery官方CDN服務-->
    <script type=\"text/javascript\" src=\"http://code.jquery.com/jquery-latest.min.js\"></script>
    <script type=\"text/javascript\" src=\"http://code.jquery.com/ui/1.11.1/jquery-ui.js\"></script>
    <link rel=\"stylesheet\" href=\"http://code.jquery.com/ui/1.11.1/themes/smoothness/jquery-ui.css\">
    <link rel=\"stylesheet\" href=\"/resources/demos/style.css\">
    <style>
      body { font-size: 100%; }
      label, input { display:block; }
      input.text { margin-bottom:12px; width:95%; padding: .4em; }
      fieldset { padding:0; border:0; margin-top:25px; }
      h1 { font-size: 1.2em; margin: .6em 0; }
      div#users-contain { width: 650px; margin: 20px 0; }
      div#users-contain table { margin: 1em 0; border-collapse: collapse; width: 100%; }
      div#users-contain table td, div#users-contain table th { border: 1px solid #eee; padding: .6em 10px; text-align: left; }
      .ui-dialog .ui-state-error { padding: .3em; }
      .validateTips { border: 1px solid transparent; padding: 0.3em; }
    </style>
    <script>
      $(function() {
        $( \"#dialog\" ).dialog({
          autoOpen: false,height: 300,width: 350,modal: true,
          buttons: {
            Create: function() {
              var num = $(\"#edit_Num\").val();
              $(\"#row_name\" + num).val($(\"#edit_name\").val());
              $(\"#row_email\" + num).val($(\"#edit_email\").val());
              $( \"#dialog\" ).dialog( \"close\" );
            } ,
            Cancel: function() {
              $( \"#dialog\" ).dialog( \"close\" );
            }
          }
        });
        $( \".create-user\" ).click(function() {
          $( \"#dialog\" ).dialog( \"open\" );
          var offset = $(this).offset(),
            num = $(this).siblings(\"input[name=row_num]\").val(),
            name = $(\"#row_name\" + num).val(),
            email = $(\"#row_email\" + num).val();
          $(\"#edit_Num\").val(num);
          $(\"#edit_name\").val(name);
          $(\"#edit_email\").val(email);
        });
      });
    </script>
  </head>
  <body>
    <div id=\"dialog-form\" title=\"Create new user\">
      <p class=\"validateTips\">All form fields are required.</p>
      <form><fieldset>
        <input type=\"text\" id=\"edit_Num\">
        <label for=\"name\">Name</label>
        <input type=\"text\" name=\"name\" id=\"edit_name\" class=\"text ui-widget-content ui-corner-all\">
        <label for=\"email\">Email</label>
        <input type=\"text\" name=\"email\" id=\"edit_email\" class=\"text ui-widget-content ui-corner-all\">
        <input type=\"button\" class=\"ok\" tabindex=\"-1\" style=\"position:absolute; top:-1000px\">
      </fieldset></form>
    </div>
    <div id=\"users-contain\" class=\"ui-widget\" style=\"text-align:center;\">
      <h1>Existing Users:</h1>
      <table id=\"users\" class=\"ui-widget ui-widget-content\">
        <thead>
          <tr class=\"ui-widget-header\">
            <th>Name</th>
            <th>Email</th>
            <th>Create User</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td></td><td></td>
            <td>
              <input type=\"button\" class=\"create-user\" value=\"Create\">
              <input type=\"text\" name=\"num\" value=\"1\">
              <input type=\"text\" name=\"row_name\" id=\"row_name1\" value=\"111\">
              <input type=\"text\" name=\"row_email\" id=\"row_email1\" value=\"222\">
            </td>
          </tr>
          <tr>
            <td></td><td></td>
            <td>
              <input type=\"button\" class=\"create-user\" value=\"Create\">
              <input type=\"text\" name=\"num\" value=\"2\">
              <input type=\"text\" name=\"row_name\" id=\"row_name2\" value=\"aaa\">
              <input type=\"text\" name=\"row_email\" id=\"row_email2\" value=\"zzz\">
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </body>
</html>
