<!DOCTYPE html>
<html lang="zxx">
<head>
    <meta charset="UTF-8">
    <?php echo $__env->yieldContent('meta'); ?>
    <link rel="shortcut icon" type="image/png" href="<?php echo e(asset('user/img/icon-favicon.png')); ?>"/>
    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Mulish:wght@300;400;500;600;700;800;900&display=swap"
    rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="<?php echo e(asset('user/css/bootstrap.min.css')); ?>" type="text/css">
    <link rel="stylesheet" href="<?php echo e(asset('user/css/font-awesome.min.css')); ?>" type="text/css">
    <link rel="stylesheet" href="<?php echo e(asset('user/css/elegant-icons.css')); ?>" type="text/css">
    <link rel="stylesheet" href="<?php echo e(asset('user/css/plyr.css')); ?>" type="text/css">
    <link rel="stylesheet" href="<?php echo e(asset('user/css/nice-select.css')); ?>" type="text/css">
    <link rel="stylesheet" href="<?php echo e(asset('user/css/owl.carousel.min.css')); ?>" type="text/css">
    <link rel="stylesheet" href="<?php echo e(asset('user/css/slicknav.min.css')); ?>" type="text/css">
    <link rel="stylesheet" href="<?php echo e(asset('user/css/style.css')); ?>" type="text/css">
      <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-J5DQXX5CDD"></script>
  <!-- propellerads-->
</head>
<body>

    <!-- Page Preloder -->
    <!-- <div id="preloder">
        <div class="loader"></div>
    </div> -->

    <!-- Header Section Begin -->
    <header class="header">
        <div class="container-fluid fullsize_ne">
            <div class="row">
                <div class="col-lg-2">
                    <div class="header__logo">
                        <a href="<?php echo e(route('home.index')); ?>">
                            <img src="<?php echo e(asset('user/img/imagelogo.png')); ?>" alt="" width="200px" heigth="65px">
                        </a>
                    </div>
                </div>
                <?php echo $__env->make('user1.menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <div class="col-lg-2">
                    <div class="header__right">
                        <a href="#" class="search-switch"><span class="icon_search"></span></a>
                        <?php if(Route::has('login')): ?>
                        <?php if(auth()->guard()->check()): ?>
                        <?php if(Auth::user()->role == 1): ?>
                        <a href="<?php echo e(route('admin.dashboard')); ?>"><span class="icon_profile"></span></a>
                        <a href="<?php echo e(route('logout')); ?>" title="Đăng xuất" 
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                        >Đăng xuất</a></div>
                        <form action="<?php echo e(route('logout')); ?>" method="post" id="logout-form">
                                <?php echo csrf_field(); ?>
                        </form>
                        <?php else: ?>
                        <a href="<?php echo e(route('logout')); ?>" title="Đăng xuất" 
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                        >Đăng xuất</a></div>
                        <form action="<?php echo e(route('logout')); ?>" method="post" id="logout-form">
                                <?php echo csrf_field(); ?>
                        </form>
                        <?php endif; ?>
                        <?php else: ?>
                        <a href="<?php echo e(route('login')); ?>"><span class="icon_profile"></span> Đăng nhập</a>
                        <?php endif; ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <div id="mobile-menu-wrap"></div>
        </div>
    </header>
    <!-- Header End -->

    <!-- Hero Section Begin -->
    
    <!-- Hero Section End -->

    <!-- Product Section Begin -->
    <?php echo $__env->yieldContent('main'); ?>
    <!-- Product Section End -->

<!-- Footer Section Begin -->
<footer class="footer">
    <div class="page-up">
        <a href="#" id="scrollToTopButton"><span class="arrow_carrot-up"></span></a>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="footer__logo" style="margin-top:-25px;">
                    <a href="./index.html"><img src="<?php echo e(asset('user/img/imagelogo.png')); ?>" alt=""></a>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="footer__nav">
                    <ul>
                        <li class="active"><a href="<?php echo e(route('home.index')); ?>">Homepage</a></li>
                        <li><a href="<?php echo e(route('danhmuc')); ?>">Danh mục</a></li>
                        <li><a href="./blog.html">Our Blog</a></li>
                        <li><a href="#">Contacts</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-3">
                <p style="color:#fff"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                  Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart" aria-hidden="true"></i> by <a href="<?php echo e(route('home.index')); ?>" target="_blank">phimlife</a></p>
                  <span><a href="https://www.facebook.com/phimlife/"><i class="fa fa-facebook" 
                style="
                font-size:20px; 
                color:#fff; 
                background: #757575;
                padding: 8px 15px 8px 13px;
                border-radius: 50%;
                box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;
                "
                ></i></a></span>
              </div>
          </div>
      </div>
  </footer>

  <!-- Footer Section End -->

  <!-- Search model Begin -->
  <div class="search-model">
    <div class="h-100 d-flex align-items-center justify-content-center">
        <div class="search-close-switch"><i class="icon_close"></i></div>
        <form action="<?php echo e(route('search')); ?>" class="search-model-form" method="get">
            <input type="text" id="search-input" name="key" placeholder="tìm kiếm phim...">
        </form>
    </div>
</div>
<!-- Search model end -->
<!-- Js Plugins -->
<script src="<?php echo e(asset('user/js/jquery-3.3.1.min.js')); ?>"></script>
<script src="<?php echo e(asset('user/js/bootstrap.min.js')); ?>"></script>
<script src="<?php echo e(asset('user/js/player.js')); ?>"></script>
<script src="<?php echo e(asset('user/js/jquery.nice-select.min.js')); ?>"></script>
<script src="<?php echo e(asset('user/js/mixitup.min.js')); ?>"></script>
<script src="<?php echo e(asset('user/js/jquery.slicknav.js')); ?>"></script>
<script src="<?php echo e(asset('user/js/owl.carousel.min.js')); ?>"></script>
<script src="<?php echo e(asset('user/js/main.js')); ?>"></script>
    <?php echo $__env->yieldContent('js'); ?>
<script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
<!-- CSS -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
<!-- Default theme -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css"/>
<!-- Semantic UI theme -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/semantic.min.css"/>
<!-- Bootstrap theme -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.min.css"/>
<!--propreller-->

<script type="application/javascript">
(function() {

    //version 1.0.0

    var adConfig = {
    "ads_host": "a.exdynsrv.com",
    "syndication_host": "syndication.exdynsrv.com",
    "idzone": 4751862,
    "popup_fallback": false,
    "popup_force": false,
    "chrome_enabled": true,
    "new_tab": true,
    "frequency_period": 60,
    "frequency_count": 1,
    "trigger_method": 3,
    "trigger_class": "",
    "only_inline": false,
    "t_venor": false
};

window.document.querySelectorAll||(document.querySelectorAll=document.body.querySelectorAll=Object.querySelectorAll=function(o,e,t,i,n){var r=document,c=r.createStyleSheet();for(n=r.all,e=[],t=(o=o.replace(/\[for\b/gi,"[htmlFor").split(",")).length;t--;){for(c.addRule(o[t],"k:v"),i=n.length;i--;)n[i].currentStyle.k&&e.push(n[i]);c.removeRule(0)}return e});var popMagic={version:1,cookie_name:"",url:"",config:{},open_count:0,top:null,browser:null,venor_loaded:!1,venor:!1,configTpl:{ads_host:"",syndication_host:"",idzone:"",frequency_period:720,frequency_count:1,trigger_method:1,trigger_class:"",popup_force:!1,popup_fallback:!1,chrome_enabled:!0,new_tab:!1,cat:"",tags:"",el:"",sub:"",sub2:"",sub3:"",only_inline:!1,t_venor:!1,cookieconsent:!0},init:function(o){if(void 0!==o.idzone&&o.idzone){for(var e in this.configTpl)this.configTpl.hasOwnProperty(e)&&(void 0!==o[e]?this.config[e]=o[e]:this.config[e]=this.configTpl[e]);void 0!==this.config.idzone&&""!==this.config.idzone&&(!0!==this.config.only_inline&&this.loadHosted(),this.addEventToElement(window,"load",this.preparePop))}},getCountFromCookie:function(){if(!this.config.cookieconsent)return 0;var o=popMagic.getCookie(popMagic.cookie_name),e=void 0===o?0:parseInt(o);return isNaN(e)&&(e=0),e},shouldShow:function(){if(popMagic.open_count>=popMagic.config.frequency_count)return!1;var o=popMagic.getCountFromCookie();return popMagic.open_count=o,!(o>=popMagic.config.frequency_count)},venorShouldShow:function(){return!popMagic.config.t_venor||popMagic.venor_loaded&&"0"===popMagic.venor},setAsOpened:function(){var o=1;o=0!==popMagic.open_count?popMagic.open_count+1:popMagic.getCountFromCookie()+1,popMagic.config.cookieconsent&&popMagic.setCookie(popMagic.cookie_name,o,popMagic.config.frequency_period)},loadHosted:function(){var o=document.createElement("script");for(var e in o.type="application/javascript",o.async=!0,o.src="//"+this.config.ads_host+"/popunder1000.js",o.id="popmagicldr",this.config)this.config.hasOwnProperty(e)&&"ads_host"!==e&&"syndication_host"!==e&&o.setAttribute("data-exo-"+e,this.config[e]);var t=document.getElementsByTagName("body").item(0);t.firstChild?t.insertBefore(o,t.firstChild):t.appendChild(o)},preparePop:function(){if("object"!=typeof exoJsPop101||!exoJsPop101.hasOwnProperty("add")){if(popMagic.top=self,popMagic.top!==self)try{top.document.location.toString()&&(popMagic.top=top)}catch(o){}if(popMagic.cookie_name="zone-cap-"+popMagic.config.idzone,popMagic.config.t_venor&&popMagic.shouldShow()){var o=new XMLHttpRequest;o.onreadystatechange=function(){o.readyState==XMLHttpRequest.DONE&&(popMagic.venor_loaded=!0,200==o.status&&(popMagic.venor=o.responseText))};var e="https:"!==document.location.protocol&&"http:"!==document.location.protocol?"https:":document.location.protocol;o.open("GET",e+"//"+popMagic.config.syndication_host+"/venor.php",!0);try{o.send()}catch(o){popMagic.venor_loaded=!0}}if(popMagic.buildUrl(),popMagic.browser=popMagic.browserDetector.detectBrowser(navigator.userAgent),popMagic.config.chrome_enabled||"chrome"!==popMagic.browser.name&&"crios"!==popMagic.browser.name){var t=popMagic.getPopMethod(popMagic.browser);popMagic.addEvent("click",t)}}},getPopMethod:function(o){return popMagic.config.popup_force?popMagic.methods.popup:popMagic.config.popup_fallback&&"chrome"===o.name&&o.version>=68&&!o.isMobile?popMagic.methods.popup:o.isMobile?popMagic.methods.default:"chrome"===o.name?popMagic.methods.chromeTab:popMagic.methods.default},buildUrl:function(){var o="https:"!==document.location.protocol&&"http:"!==document.location.protocol?"https:":document.location.protocol,e=top===self?document.URL:document.referrer,t={type:"inline",name:"popMagic",ver:this.version};this.url=o+"//"+this.config.syndication_host+"/splash.php?cat="+this.config.cat+"&idzone="+this.config.idzone+"&type=8&p="+encodeURIComponent(e)+"&sub="+this.config.sub+(""!==this.config.sub2?"&sub2="+this.config.sub2:"")+(""!==this.config.sub3?"&sub3="+this.config.sub3:"")+"&block=1&el="+this.config.el+"&tags="+this.config.tags+"&cookieconsent="+this.config.cookieconsent+"&scr_info="+function(o){var e=o.type+"|"+o.name+"|"+o.ver;return encodeURIComponent(btoa(e))}(t)},addEventToElement:function(o,e,t){o.addEventListener?o.addEventListener(e,t,!1):o.attachEvent?(o["e"+e+t]=t,o[e+t]=function(){o["e"+e+t](window.event)},o.attachEvent("on"+e,o[e+t])):o["on"+e]=o["e"+e+t]},addEvent:function(o,e){var t;if("3"!=popMagic.config.trigger_method)if("2"!=popMagic.config.trigger_method||""==popMagic.config.trigger_method)popMagic.addEventToElement(document,o,e);else{var i,n=[];i=-1===popMagic.config.trigger_class.indexOf(",")?popMagic.config.trigger_class.split(" "):popMagic.config.trigger_class.replace(/\s/g,"").split(",");for(var r=0;r<i.length;r++)""!==i[r]&&n.push("."+i[r]);for(t=document.querySelectorAll(n.join(", ")),r=0;r<t.length;r++)popMagic.addEventToElement(t[r],o,e)}else for(t=document.querySelectorAll("a"),r=0;r<t.length;r++)popMagic.addEventToElement(t[r],o,e)},setCookie:function(o,e,t){if(!this.config.cookieconsent)return!1;t=parseInt(t,10);var i=new Date;i.setMinutes(i.getMinutes()+parseInt(t));var n=encodeURIComponent(e)+"; expires="+i.toUTCString()+"; path=/";document.cookie=o+"="+n},getCookie:function(o){if(!this.config.cookieconsent)return!1;var e,t,i,n=document.cookie.split(";");for(e=0;e<n.length;e++)if(t=n[e].substr(0,n[e].indexOf("=")),i=n[e].substr(n[e].indexOf("=")+1),(t=t.replace(/^\s+|\s+$/g,""))===o)return decodeURIComponent(i)},randStr:function(o,e){for(var t="",i=e||"ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789",n=0;n<o;n++)t+=i.charAt(Math.floor(Math.random()*i.length));return t},isValidUserEvent:function(o){return!!("isTrusted"in o&&o.isTrusted&&"ie"!==popMagic.browser.name&&"safari"!==popMagic.browser.name)||0!=o.screenX&&0!=o.screenY},isValidHref:function(o){if(void 0===o||""==o)return!1;return!/\s?javascript\s?:/i.test(o)},findLinkToOpen:function(o){var e=o,t=!1;try{for(var i=0;i<20&&!e.getAttribute("href")&&e!==document&&"html"!==e.nodeName.toLowerCase();)e=e.parentNode,i++;var n=e.getAttribute("target");n&&-1!==n.indexOf("_blank")||(t=e.getAttribute("href"))}catch(o){}return popMagic.isValidHref(t)||(t=!1),t||window.location.href},getPuId:function(){return"ok_"+Math.floor(89999999*Math.random()+1e7)},browserDetector:{browserDefinitions:[["firefox",/Firefox\/([0-9.]+)(?:\s|$)/],["opera",/Opera\/([0-9.]+)(?:\s|$)/],["opera",/OPR\/([0-9.]+)(:?\s|$)$/],["edge",/Edg(?:e|)\/([0-9._]+)/],["ie",/Trident\/7\.0.*rv:([0-9.]+)\).*Gecko$/],["ie",/MSIE\s([0-9.]+);.*Trident\/[4-7].0/],["ie",/MSIE\s(7\.0)/],["safari",/Version\/([0-9._]+).*Safari/],["chrome",/(?!Chrom.*Edg(?:e|))Chrom(?:e|ium)\/([0-9.]+)(:?\s|$)/],["chrome",/(?!Chrom.*OPR)Chrom(?:e|ium)\/([0-9.]+)(:?\s|$)/],["bb10",/BB10;\sTouch.*Version\/([0-9.]+)/],["android",/Android\s([0-9.]+)/],["ios",/Version\/([0-9._]+).*Mobile.*Safari.*/],["yandexbrowser",/YaBrowser\/([0-9._]+)/],["crios",/CriOS\/([0-9.]+)(:?\s|$)/]],detectBrowser:function(o){var e=o.match(/Android|BlackBerry|iPhone|iPad|iPod|Opera Mini|IEMobile|WebOS|Windows Phone/i);for(var t in this.browserDefinitions){var i=this.browserDefinitions[t];if(i[1].test(o)){var n=i[1].exec(o),r=n&&n[1].split(/[._]/).slice(0,3),c=Array.prototype.slice.call(r,1).join("")||"0";return r&&r.length<3&&Array.prototype.push.apply(r,1===r.length?[0,0]:[0]),{name:i[0],version:r.join("."),versionNumber:parseFloat(r[0]+"."+c),isMobile:e}}}return{name:"other",version:"1.0",versionNumber:1,isMobile:e}}},methods:{default:function(o){if(!popMagic.shouldShow()||!popMagic.venorShouldShow()||!popMagic.isValidUserEvent(o))return!0;var e=o.target||o.srcElement,t=popMagic.findLinkToOpen(e);return window.open(t,"_blank"),popMagic.setAsOpened(),popMagic.top.document.location=popMagic.url,void 0!==o.preventDefault&&(o.preventDefault(),o.stopPropagation()),!0},chromeTab:function(o){if(!popMagic.shouldShow()||!popMagic.venorShouldShow()||!popMagic.isValidUserEvent(o))return!0;if(void 0===o.preventDefault)return!0;o.preventDefault(),o.stopPropagation();var e=top.window.document.createElement("a"),t=o.target||o.srcElement;e.href=popMagic.findLinkToOpen(t),document.getElementsByTagName("body")[0].appendChild(e);var i=new MouseEvent("click",{bubbles:!0,cancelable:!0,view:window,screenX:0,screenY:0,clientX:0,clientY:0,ctrlKey:!0,altKey:!1,shiftKey:!1,metaKey:!0,button:0});i.preventDefault=void 0,e.dispatchEvent(i),e.parentNode.removeChild(e),window.open(popMagic.url,"_self"),popMagic.setAsOpened()},popup:function(o){if(!popMagic.shouldShow()||!popMagic.venorShouldShow()||!popMagic.isValidUserEvent(o))return!0;var e="";if(popMagic.config.popup_fallback&&!popMagic.config.popup_force){var t=Math.max(Math.round(.8*window.innerHeight),300);e="menubar=1,resizable=1,width="+Math.max(Math.round(.7*window.innerWidth),300)+",height="+t+",top="+(window.screenY+100)+",left="+(window.screenX+100)}var i=document.location.href,n=window.open(i,popMagic.getPuId(),e);setTimeout(function(){n.location.href=popMagic.url},200),popMagic.setAsOpened(),void 0!==o.preventDefault&&(o.preventDefault(),o.stopPropagation())}}};    popMagic.init(adConfig);
})();


</script>


</body>
</html>
<script>
    function remove_background(id) {
        for(var count = 1; count <= 5; count++){
                $('#'+id+'-'+count).css('color', '#ccc');
            }
    }
        $(document).on('mouseenter', '.rating',function() {
            var index = $(this).data("index");
            var id = $(this).data("id");
            remove_background(id);
            for(var count = 1; count<=index; count++){
                $('#'+id+'-'+count).css('color', '#ffcc00');
            }
        });
        $(document).on('mouseleave', '.rating', function() {
            var index = $(this).data("index");
            var id = $(this).data("id");
            var rating = $(this).data("rating");
            remove_background(id);
            for(var count = 1; count<=rating; count++){
                $('#'+id+'-'+count).css('color', '#ffcc00');
            }
        });
        
        $(document).on('click', '.rating', function(){
            var index = $(this).data("index");
            var id = $(this).data('id');
            var _token = $('input[name="_token"]').val();
            console.log(index);
            console.log(id);
            console.log(_token);
            $.ajax({
                url:'<?php echo e(url('/insert-rating')); ?>', 
                method:'POST',
                data:{index:index, id:id, _token: "<?php echo e(csrf_token()); ?>"},
                success: function(data) 
                {
                    if(data == 'done')
                    {
                        alertify.success('cảm ơn bạn đã đánh giá '+index+' sao');
                        function greatin(){
                            window.location.reload(true);
                        }
                        setTimeout(greatin, 1000);  
                    }
                    else
                    {
                        alertify.error('lỗi đánh giá');
                    }
                }
            });
        });


</script>                                       <?php /**PATH C:\xampp\htdocs\webphim\resources\views/layouts/user.blade.php ENDPATH**/ ?>