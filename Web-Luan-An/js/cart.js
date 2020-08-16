$(function() {
  $("#cart tr .remove input").click(function() {
    var orderCode = $(this).val();
    $.ajax({
      type: "GET",
      url: "ajax/cart.php",
      data: "remove[]=" + orderCode,
      success: function() {
        $("#cart tr .remove input[value=" + orderCode + "]").parent().parent().fadeOut(500, function() {
          $(this).remove();
          calcPrice();
        });
      },
      error: function() {
        window.location("ajax/cart.php?remove[]="+orderCode);
      }
    });
  });
  $("#cart tr .quantity input").change(function() {
    var orderCode = $(this).attr("name").slice(9, -1);
    var quantity = $(this).val();
    $.ajax({
      type: "GET",
      url: "ajax/cart.php",
      data: "quantity[" + orderCode + "]=" + quantity,
      success: function() {
        var startColor = $("#cart tr .quantity input[name*=" + orderCode + "]").parent().parent().hasClass("odd") ? "#eee" : "#fff";
        $("#cart tr .quantity input[name*=" + orderCode + "]").parent().parent().find("td").animate({ backgroundColor: "#ff8" }, 100).animate({ backgroundColor: startColor }, 800);
        calcPrice();
      },
      error: function() {
        window.location("ajax/cart.php?quantity[" + orderCode + "]=" + quantity);
      }
    });
  });
});

function calcPrice() {
  var totalPrice = 0;
  $("#cart tr .quantity").parent().each(function() {
    var quantity = $(".quantity input", this).val();
    var unitPrice = $(".unit_price", this).text().slice(1);
    var extendedPrice = quantity*unitPrice;
    totalPrice += extendedPrice;
    
    $(".extended_price", this).html("$" + extendedPrice);
    $("#total_price").html("$"+totalPrice);
  });
  if ( totalPrice == 0 ) {
    $("#cart").parent().replaceWith('<p style="margin-bottom: 60px; font-size: 24px; margin-top: -60px;" class="center">Trống ! <br> Chúc bạn mua hàng vui vẻ</p> <a style="margin-bottom: 60px;" href="index.php" class="btn btn-warning"><i class="fa fa-angle-left"></i>Bắt đầu mua sắm</a>');
  }
}
$(function() {
  $("form.cart_form").submit(function() {
    var title = "Your Shopping Cart";
    var masp = $("input[name=masp]", this).val();
    var soluongsp = $("input[name=soluongsp]", this).val();
    var url = "ajax/cart.php?masp=" + masp + "&soluongsp=" + soluongsp +
    "&TB_iframe=true&height=400&width=780";
    tb_show(title, url, false);

    return false;
  });
});