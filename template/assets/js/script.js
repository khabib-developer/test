$('.icon').click(function() {
	$('.mobileMenu')
	.fadeIn()
	.css({
		display : 'block',
	})
	.addClass('moveMenu');
	$('.dp')
	.fadeIn()
	.css({
		diplay: 'block'
	});
	$('.dp').click(function() {
		$('.mobileMenu')
		.removeClass('moveMenu')
		.fadeOut()
		.css({
			display : 'none',
		});
		$('.dp')
		.fadeOut()
		.css({
			diplay: 'none'
		});
	});
})

$('.catalog-products').click(function() {
	$('.catalogProducts').slideToggle('slow')
	$('.arr1').toggleClass('deg1');
});
$(document).ready(function() {
	$(window).on("scroll",()=>{
		if($(window).scrollTop()>=1000) {
			$(".toUp").fadeIn();
		}
		else{
			$(".toUp").fadeOut();
		}
	})
	$(".toUp").on("click",()=>{
		$("html,body").animate({scrollTop:0},900)
	})	
	$('.korzina').click(function(event) {
		window.location.href = "/cart"
	});
	
	$('.add-to-cart').click(function() {
		var id=$(this).attr("data-id")
		$.post('/cart/addAjax/'+id, {}, function(data) {
			$("#count").html(data);
		});
		return false
	});
	$('.plus').click(function(event) {
		var target=event.target
		var id=$(this).attr("data-id")
		$.post('/cart/each/'+id, {}, function(data) {
			$(target).prev().html(data+" шт")
			$(target).prev().prev().css('cursor','pointer')			
		});	
		return false
	});	
	$('.minus').click(function(event) {
		var target=event.target
		var id=$(this).attr("data-id")
		$.post('/cart/remove/'+id, {}, function(data) {
			$(target).next().html(data+" шт")
			if (data == 1) {
				$(target).css('cursor','not-allowed')
			}
		});
	});
	$('.times').click(function(event) {
		var target=event.target
		var id=$(this).attr("data-id")
		$.post('/cart/delete/'+id, {}, function(data) {
			$('body').css("display", "none")
			location.reload()
		    $('body').fadeIn(1000)
		});
		return false
	});
	$('.minus, .plus').click(function() {
		$.post('/price', {}, function(data) {
			$('.totalprice').html(data)
		});
	});
	$('#btnmore').click(function() {
		$('.hide').css({
			display: 'block',
		});
		$(this).css({
			display : 'none'
		});
	});
})
var lSearch = $('.liveSearch')
var searchTitle = $('.title')
function liveSearch(str) {
	if (str.length > 0) {
		$.post('/search/index', {q: str}, function(data) {
			lSearch.html(data).fadeIn(300)
			$('.add-to-cart').click(function() {
				var id=$(this).attr("data-id")
				$.post('/cart/addAjax/'+id, {}, function(data) {
					$("#count").html(data);
				});
				return false
			});
		});	
	}
	else {
		lSearch.fadeOut()
	}
	$(document).click(function(event) {
	var target = event.target;	
	if (target.className != 'liveSearch' &&	 
		target.className != 'suggestion' &&
		target.className != 'searchimg' &&
		target.className != 'title' &&
		target.className != 'unit-text' &&
		target.className != 'prices' &&
		target.className != 'col-8' &&
		target.className != 'productTitle title' &&
		target.className != 'row pl-0 pr-0 ml-0 mr-0' &&
		target.className != 'unit-text pl-2' &&
		target.className != 'search-field pl-3' &&
		target.className != 'fal fa-search' &&
		target.className != 'btn1' &&
		target.className != 'add-to-cart'
		) 
		{
			lSearch.fadeOut()
		}
	});
}
var maxs = $('.max')
function myRange(x) {
	var id = $('#myRange').attr('data-id')
	$.post('/category/filter/'+id, {price: x}, function(data, textStatus, xhr) {
		var id = $('#myRange').attr('data-id')
		maxs.val(x)	
		$('#filtrProducts').html(data)
		$('.add-to-cart').click(function() {
			var id=$(this).attr("data-id")
			$.post('/cart/addAjax/'+id, {}, function(data) {
			$("#count").html(data);
			});
			return false
		});
	});
}
function myTypeRange(x) {
	var id = $('#myTypeRange').attr('data-id')
	var typeId = $('#myTypeRange').attr('data-type')
	maxs.val(x)
	$.post('/category/filterByType/'+id, {price: x, typeId: typeId}, function(data, textStatus, xhr) {
		$('#filtrProd').html(data)
		$('.add-to-cart').click(function() {
			var id=$(this).attr("data-id")
			$.post('/cart/addAjax/'+id, {}, function(data) {
			$("#count").html(data);
			});
			return false
		});
	});
}
$('#dHome').click(function() {
	$('#flat').css("display","block")
	$('#bigFlat').css("display","none")
});
$('#lHome').click(function() {
	$('#flat').css("display","none")
	$('#bigFlat').css("display","block")
});
$(document).ready(function() {
	$('.click_img').slideDown(600);	
	$('#btn_click').click(function() {
		$('body').fadeOut('400', function() {
			$('body').css("display", "none")
		    $('body').fadeIn(1000) 
		});		
		$('.click').click(function() {
			$(this).css("display","none !important")
		});
	});
});
function view(id) {
	
	$('.view_product').addClass('open')
	$.post('/modal/index', {id: id}, function(data) {
		$('#product_view').html(data)
		$('.add-to-cart').click(function() {
			var id=$(this).attr("data-id")
			$.post('/cart/addAjax/'+id, {}, function(data) {
			$("#count").html(data);
			});
			return false
		});
	});
	$('.view_product').click(function(event) {
		var target = event.target;
		if (target.className == 'view_product open') {
			$('.viewProduct').addClass('hides')
			$(this).removeClass('open')
			$('.viewProduct').addClass('hides')	
		}
	});
}
