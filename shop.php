<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shop</title>
    <!-- BOOTSTRAP 4.5 -->
    <link rel="stylesheet" href="./css/bootstrap-4.5/bootstrap.min.css">
    <!-- FONTAWESOME 5.15.3-->
    <link rel="stylesheet" href="./fonts/fontawesome-5.15.3/css/all.min.css">
    <!-- RESET CSS -->
    <link rel="stylesheet" href="./css/normalize.css">
    <!-- OWL CAROUSEL -->
    <link rel="stylesheet" href="./css/owl-carousel/owl.carousel.min.css">
    <link rel="stylesheet" href="./css/owl-carousel/owl.theme.default.min.css">
    <!-- CUSTOM CSS -->
    <link rel="stylesheet" href="./css/base.css">
    <link rel="stylesheet" href="./css/style.css">

    <!-- JQUERY 3.5.1 -->
    <script src="./js/jquery-3.5.1/jquery-3.3.1.slim.min.js"></script>
    <script>
(function(){if(!window.chatbase||window.chatbase("getState")!=="initialized"){window.chatbase=(...arguments)=>{if(!window.chatbase.q){window.chatbase.q=[]}window.chatbase.q.push(arguments)};window.chatbase=new Proxy(window.chatbase,{get(target,prop){if(prop==="q"){return target.q}return(...args)=>target(prop,...args)}})}const onLoad=function(){const script=document.createElement("script");script.src="https://www.chatbase.co/embed.min.js";script.id="KUQcA6lBtt_EfsORAaUzj";script.domain="www.chatbase.co";document.body.appendChild(script)};if(document.readyState==="complete"){onLoad()}else{window.addEventListener("load",onLoad)}})();
</script>
<!-- ICON FACEBOOK -->
<style>
    .social-fixed {
    position: fixed;
    right: 20px;   /* sát bên phải */
    bottom: 80px;  /* cao lên 1 chút – bạn tự chỉnh số này */
    z-index: 999;
}


    .social-fixed .fb-link {
        width: 55px;
        height: 55px;
        background: #1877f2;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        text-decoration: none;
        color: #fff;
        font-size: 26px;
        box-shadow: 0 6px 16px rgba(0,0,0,0.25);
        transition: 0.25s ease;
    }

    .social-fixed .fb-link:hover {
        background: #0f5fcc;
        transform: translateY(-4px);
        box-shadow: 0 10px 22px rgba(0,0,0,0.35);
    }
</style>

<div class="social-fixed">
    <a href="https://www.facebook.com/profile.php?id=61562467576285"
    target="_blank"
    rel="noopener noreferrer"
    class="fb-link"
    title="Facebook của tôi">
    <i class="fab fa-facebook-f"></i>
    </a>
</div>
</head>
<?php
include("./templates/header.php");
include("./templates/shop_content.php");
include("./templates/footer.php")
?>