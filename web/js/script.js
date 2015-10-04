$(function(){
	
});

//Добавление товара в корзину
function putToBasket(th){
	th.css("background-color","#EFBC0B");
	th.children(".basket-btn-tx").text("В корзине");
	th.children(".basket-btn-num-wr").css("display","inline");
	var t_num = th.find(".basket-btn-num");
	t_num.text(parseInt(t_num.text()) + 1);
	
	$.ajax({
		url: th.attr('rel'),             
		success: function (res) {
			$("#basket_head_num").html(res);
			console.log("#", res);
		}
	});
	return false;
}

//Удаление товара из корзины
function delFromBasket(t_id){
	delCookie("products[" + t_id +"]");
}

function delCookie(name) {
  document.cookie = name + "=" + "; expires=Thu, 01 Jan 1970 00:00:01 GMT";
}