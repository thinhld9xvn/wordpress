$(document).ready(function() {
	function delElement (nameE){
		$(nameE).remove();
	}
	/*$('.product-rating').remove();
    $('.price-box *:contains("$")').html('<span>200.000vnđ <del>200.000vnđ</del></span>');*/

	delElement('.pact');

	var quan = $('.hp-col').length;
	/*var lim = 8 - quan;*/
	var url = ["images/7.jpg", "images/8.jpg", "images/9.jpg","images/10.jpg", "images/11.jpg", "images/12.jpg","images/13.jpg", "images/14.jpg"];
	/*var url = "images/"+ imgname + ".jpg";
	console.log(lim);*/
	for (var i = 0; i < 8; i++) {
		var quan = $('.hp-col').length;
		$('.hp-item-img img').attr('src', url[i]);
		var ob = $('.col-lg-3.col-md-6.col-sm-6.hp-col:nth-child('+ i +')').addClass('no'+i);
		/*alert(url[i], ob);*/
		$('.hp-wrap .row').prepend('<div class="col-lg-3 col-md-6 col-sm-6 hp-col"><article class="hp-item"><figure class="position-relative hp-item-img text-center"><a href="pdetail.html" title=""><img src="'+url[i]+'" alt="" title=""></a><div class="sale s14 text-white b6">SALE</div></figure><figcaption class="hp-item-info"><h3 class="s14 text-uppercase t1 pro-info-tit"><a href="pdetail.html" title="">Ghế đơn đệm bọc da - gỗ</a></h3><h4 class="s14 t2 pro-info-price"><span class="pr-4">500.000Đ</span><del class="t3">800.000Đ</del></h4></figcaption><div class="text-center hp-act"><a href="#" title="" class="btn text-uppercase w-100 s14 buy-btn"><span class="mr-3 d-inline-block"><i class="fas fa-shopping-cart"></i><i class="fas fa-cart-arrow-down"></i></span>Thêm vào giỏ hàng</a></div></article></div>');
		ob.attr('src', url[i]);
	}
});