$(document).ready(function(){
    $("button[name='dangki']").click(function(e)
    {
      var data = $('form#form_dangki').serialize();
      $.ajax({
        type : 'POST', 
        url : 'ajax/dangki.php',
        data : data, 
        success : function(data) 
        { 
         if(data == 'false') 
         {
           alert('lỗi! vui lòng thử lại');
         }else{
           $('#kqdangki').html(data); 
         }
       }
     });
      return false;
    });
})