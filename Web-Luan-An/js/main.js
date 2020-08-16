
// Search ajax
function object() {
    if (window.XMLHttpRequest) {
        // code for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp = new XMLHttpRequest();
    } else { // code for IE6, IE5
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    return xmlhttp;
}
http = object();
function livesearch(data) {
    if (data != "") {
        http.onreadystatechange = process;
        http.open('GET', 'ajax/search.php?data=' + data, true);
        http.send();
    } else {
        document.getElementById("result").innerHTML = "";
        document.getElementById("result1").innerHTML = "";
    }
}
function process() {
    if (http.readyState == 4 && http.status == 200) {
        result = http.responseText;
        document.getElementById("result").innerHTML = result;
        document.getElementById("result1").innerHTML = result;
    }
}


// Thêm vào giỏ ở Ngoài
function addToCart(id) {
    $.post('ajax/addtoCart.php', {
        'id': id
    }, function (data) {
        item = data.split("-");
        $("#numberCart").text(item[0]);
        $("#total").text(item[1]);
    });
}

//  Thêm vào giỏ ở product-details
function addCart(id) {
    num = $("#num").val();
    $.post('ajax/addCart.php', {
        'id': id,
        'num': num
    }, function (data) {
        item = data.split("-");
        $("#numberCart").text(item[0]);
        $("#total").text(item[1]);
        window.location.href = "shop-cart.php";
    });
}

// Xóa giỏ hàng
function deleteCart(id) {
    $.post('ajax/updateCart.php', {
        'id': id,
        'num': 0
    }, function (data) {
        $("#listCart").load("http://localhost:8081/WebThucPham/shop-cart.php #Cart");
        location.reload(data);
    });
}

// tăng số lượng + update thành tiền
function updateCart(id) {
    num = $("#quantity_" + id).val();
    $.post('ajax/updateCart.php', {
        'id': id,
        'num': num
    }, function (data) {
        location.reload(data);
    });
}

$(document).ready(function () {

    //Hiệu ứng bay
    $(document).on('click', '.btn-buy-now', function (e) {
        e.preventDefault();
        if($(this).hasClass('disable')) {
            return false;
        }
        $(document).find('.btn-buy-now').addClass('disable');

        var parent = $(this).parents('.inner-box');
        var src = parent.find('img').attr('src');
        var cart = $(document).find('#cart-shop');

        var parTop = parent.offset().top;
        var parLeft = parent.offset().left;

        $('<img />', {
            class: 'img-product-fly',
            src: src
        }).appendTo('body').css({
            'top': parTop,
            'left': parseInt(parLeft) + parseInt(parent.width()) - 50
        });

        setTimeout(function () {
            $(document).find('.img-product-fly').css({
                'top': cart.offset().top,
                'left': cart.offset().left
            });
            setTimeout(function () {
                $(document).find('.img-product-fly').remove();
                $(document).find('.btn-buy-now').removeClass('disable');    
            }, 1000);
        }, 500);
    });

    // sticky
    $(window).scroll(function (e) {
        var height = $(this).scrollTop();
        if (height > 150) {
            $('.bottom_header').addClass("sticky");
        } else {
            $('.bottom_header').removeClass("sticky");
        }
    });

    // contact ajax
    $("button[name='contact']").click(function (e) {
        var data = $('form#form_contact').serialize();
        $.ajax({
            type: 'POST',
            url: 'ajax/add_contact.php',
            data: data,
            success: function (data) {
                $("form").trigger("reset");
                if (data === false) {
                    alert('lỗi! vui lòng thử lại');
                } else {
                    $('#info_contact').html(data);
                }
            }
        });
        return false;
    });

    $("button[name='create_dk']").click(function (e) {
        var data = $('form#form_resigter').serialize();
        $.ajax({
            type: 'POST',
            url: 'ajax/resigter.php',
            data: data,
            success: function (data) {
                $("form#form_resigter").trigger("reset");
                if (data == 'false') {
                    alert('lỗi! vui lòng thử lại');
                } else {
                    $('#info_resigter').html(data);
                }
            }
        });
        return false;
    });


    // Đăng ký nhận tin
    $("button[name='dangki']").click(function (e) {
        var data = $('form#form_dangki').serialize();
        $.ajax({
            type: 'POST',
            url: 'ajax/dangki.php',
            data: data,
            success: function (data) {
                $("form").trigger("reset");
                if (data == 'false') {
                    alert('lỗi! vui lòng thử lại');
                } else {
                    $('#kqdangki').html(data);
                }
            }
        });
        return false;
    });


    // login
    $("button[name='login']").click(function (e) {
        var data = $('form#form_login').serialize();
        $.ajax({
            type: 'POST',
            url: '../ajax/login.php',
            data: data,
            success: function (str) {
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


    // input tăng giảm số lượng
    jQuery('<div class="quantity-nav"><div class="quantity-button quantity-up">+</div><div class="quantity-button quantity-down">-</div></div>').insertAfter('.quantity input');
    jQuery('.quantity').each(function () {
        var spinner = jQuery(this),
            input = spinner.find('input[type="number"]'),
            btnUp = spinner.find('.quantity-up'),
            btnDown = spinner.find('.quantity-down'),
            min = input.attr('min'),
            max = input.attr('max');

        btnUp.click(function () {
            var oldValue = parseFloat(input.val());
            if (oldValue >= max) {
                var newVal = oldValue;
            } else {
                var newVal = oldValue + 1;
            }
            spinner.find("input").val(newVal);
            spinner.find("input").trigger("change");
        });

        btnDown.click(function () {
            var oldValue = parseFloat(input.val());
            if (oldValue <= min) {
                var newVal = oldValue;
            } else {
                var newVal = oldValue - 1;
            }
            spinner.find("input").val(newVal);
            spinner.find("input").trigger("change");
        });

    });

});