$(document).ready(function () {

   $("button[name='login']").click(function (e) {
      var str;
      var data = $('form#form_login').serialize();
      $.ajax({
         type: 'POST',
         url: 'ajax/login.php',
         data: data,
         //  dataType: 'json',
         success: function (str) {
            //    str =data;

            if ($().html(str) == '1') {
               window.location = "index.php";
            }
            else {
               $('#info_login').html('<p> sai sai mật khẩu hoặc email<p>');
            }

         }
      });
      return false;
   });
});