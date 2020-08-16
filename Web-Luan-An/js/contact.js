$(document).ready(function()
   { 

     $("button[name='contact']").click(function(e)
      {
        var data = $('form#form_contact').serialize();
        $.ajax({
              type : 'POST', 
              url : 'ajax/add_contact.php',
              data : data, 
              success : function(data) 
                        { 
                           if(data == 'false') 
                           {
                             alert('lỗi! vui lòng thử lại');
                           }else{
                             $('#info_contact').html(data); 
                           }
                        }
              });
              return false;
        });
    });