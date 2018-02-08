<link rel="shortcut icon" href="user/images/favicon.ico">

<link rel="stylesheet" href="user/css/slider.css">
<script src="user/js/jquery-migrate-1.1.1.js"></script>
<script src="user/js/superfish.js"></script>
<script src="user/js/jquery.carouFredSel-6.1.0-packed.js"></script>
<script src="user/js/jquery.equalheights.js"></script>
<script src="user/js/jquery.easing.1.3.js"></script>
<script src="user/js/tms-0.4.1.js"></script>
<script src="user/js/jquery.ui.totop.js"></script>

<link rel="stylesheet" href="user/css/index/form.css">

<script>
$(window).load(function () {
    $('.slider')._TMS({
        show: 0,
        pauseOnHover: false,
        prevBu: '.prev',
        nextBu: '.next',
        playBu: false,
        duration: 800,
        preset: 'fade',
        pagination: true, //'.pagination',true,'<ul></ul>'
        pagNums: false,
        slideshow: 8000,
        numStatus: false,
        banners: true,
        waitBannerAnimation: false,
        progressBar: false
    })
});
$(window).load(function () {
    $('.carousel1').carouFredSel({
        auto: false,
        prev: '.prev',
        next: '.next',
        width: 960,
        items: {
        visible: {
            min: 3,
                max: 3
            },
        height: 'auto',
            width: 300,
        },
        responsive: true,
        scroll: 1,
        mousewheel: false,
        swipe: {
        onMouse: true,
            onTouch: true
        }
    });
});
jQuery(document).ready(function () {
    $().UItoTop({
        easingType: 'easeOutQuart'
    });
});
</script>
<!--[if lt IE 9]>
<script src="/user/js/html5shiv.js"></script>
<link rel="stylesheet" media="screen" href="/user/css/ie.css">
<![endif]-->
