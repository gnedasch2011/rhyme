	$('.tabs').owlCarousel({


    items:4,

    loop:false,


    nav:true,
    dots:true,
    navText: "" ,
         responsive : {
    // breakpoint from 0 up
    0 : {
        items:2,


    },
    // breakpoint from 480 up
    480 : {

    },
    // breakpoint from 768 up
    1023 : {

    }
} 

});
$(".owl-item").click(function() {
	$(".owl-item").removeClass("owl-active").eq($(this).index()).addClass("owl-active");

	$(".tab_item").hide().eq($(this).index()).show()
}).eq(0).addClass("active");
$('.owl-item:first-child').addClass('owl-active')

	$(".tab_item ul a").mPageScroll2id();


	$('.toggle_btn').click(function() {
		$('.top_mnu').slideToggle();
		$('.toggle_btn').toggleClass('active')
	})

	$(window).scroll(function() {
var height = $(window).scrollTop();
 /*Если сделали скролл на 100px задаём новый класс для header*/
if(height > 1300){
$('.baner_side').addClass('baner-fixed');
}  else{
/*Если меньше 100px удаляем класс для header*/
$('.baner_side').removeClass('baner-fixed');	
}
});




