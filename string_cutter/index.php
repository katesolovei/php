<!DOCTYPE html>
<head>
  <title>String cutter</title>
  <link rel="stylesheet" type="text/css" href="css/style.css">

</head>
<body>
  <form class="blocks" id="formURL" method="post" action="cutter.php">
    <label class="userURL">Input your url</label>
    <input class="userURL" type="url" name="userURL">
    <input class="userURL" type="submit" name="subBtn" value="Submit">
  </form>
  <div class="blocks">
    <span class="shortURL">shortURL</span>
   <!-- {shortURL}
  \<a class="shortURL" href="{shortURL}" name="links">{shortURL}</a>-->
  </div>
  <script type="text/javascript">
   $(function() {
      $('form').submit(function(e) {
        var $form = $(this);
        $.ajax({
          type: $form.attr('method'),
          url: $form.attr('action'),
          data: $form.serialize()
        });
        e.preventDefault(); 
      });
    });
</script>
</body>