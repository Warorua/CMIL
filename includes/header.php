<?php include 'includes/session.php'; ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Centre for Media & Information Literacy - Kenya</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Tell the browser to be responsive to screen width -->
  	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  	<meta name="keywords"
        content="media kenya, media literacy, center for media literacy, cmil, center for media and information literacy">
    <meta name="description"
        content="CMIL-Kenya empowers Kenyan citizens to fully utilize their constitutionally guaranteed freedom of expression and access to information by demanding and using responsible and accurate information from relevant sources to enable them actively and positively participate in public governance processes.">
    <meta name="robots" content="noindex,nofollow">
    
     <link rel="apple-touch-icon" sizes="76x76" href="includes/favicon.png">
  <link rel="icon" type="image/png" href="includes/favicon.png">
    
    <link href="https://fonts.googleapis.com/css?family=Work+Sans:100,200,300,400,500,600,700,800,900" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Fredericka+the+Great" rel="stylesheet">

    <link rel="stylesheet" href="css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="css/animate.css">
    
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">

    <link rel="stylesheet" href="css/aos.css">

    <link rel="stylesheet" href="css/ionicons.min.css">

    <script src="https://kit.fontawesome.com/9822a5ecfe.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/flaticon.css">
    <link rel="stylesheet" href="css/icomoon.css">
    <link rel="stylesheet" href="css/style.css">
    <div id="fb-root"></div>
    <!-------events and blogs------------>
 <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.3.5/css/swiper.min.css'>
    <!-----========blog========----------->
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.css'>
<!----<script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v11.0&appId=1709913099197542&autoLogAppEvents=1" nonce="vDbx2t0U"></script>------------->
<svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
  <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
    <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
  </symbol>
  <symbol id="info-fill" fill="currentColor" viewBox="0 0 16 16">
    <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/>
  </symbol>
  <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
    <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
  </symbol>
</svg>
<style>
/*==================================
    TIMELINE
==================================*/
/*-- GENERAL STYLES
------------------------------*/
.timeline {
  line-height: 1.4em;
  list-style: none;
  margin: 0;
  padding: 0;
  width: 100%;
}
.timeline h1, .timeline h2, .timeline h3, .timeline h4, .timeline h5, .timeline h6 {
  line-height: inherit;
}

/*----- TIMELINE ITEM -----*/
.timeline-item {
  padding-left: 40px;
  position: relative;
}
.timeline-item:last-child {
  padding-bottom: 0;
}

/*----- TIMELINE INFO -----*/
.timeline-info {
  font-size: 12px;
  font-weight: 700;
  letter-spacing: 3px;
  margin: 0 0 0.5em 0;
  text-transform: uppercase;
  white-space: nowrap;
}

/*----- TIMELINE MARKER -----*/
.timeline-marker {
  position: absolute;
  top: 0;
  bottom: 0;
  left: 0;
  width: 15px;
}
.timeline-marker:before {
  background: #FF6B6B;
  border: 3px solid transparent;
  border-radius: 100%;
  content: "";
  display: block;
  height: 15px;
  position: absolute;
  top: 4px;
  left: 0;
  width: 15px;
  transition: background 0.3s ease-in-out, border 0.3s ease-in-out;
}
.timeline-marker:after {
  content: "";
  width: 3px;
  background: #CCD5DB;
  display: block;
  position: absolute;
  top: 24px;
  bottom: 0;
  left: 6px;
}
.timeline-item:last-child .timeline-marker:after {
  content: none;
}

.timeline-item:not(.period):hover .timeline-marker:before {
  background: transparent;
  border: 3px solid #FF6B6B;
}

/*----- TIMELINE CONTENT -----*/
.timeline-content {
  padding-bottom: 40px;
}
.timeline-content p:last-child {
  margin-bottom: 0;
}

/*----- TIMELINE PERIOD -----*/
.period {
  padding: 0;
}
.period .timeline-info {
  display: none;
}
.period .timeline-marker:before {
  background: transparent;
  content: "";
  width: 15px;
  height: auto;
  border: none;
  border-radius: 0;
  top: 0;
  bottom: 30px;
  position: absolute;
  border-top: 3px solid #CCD5DB;
  border-bottom: 3px solid #CCD5DB;
}
.period .timeline-marker:after {
  content: "";
  height: 32px;
  top: auto;
}
.period .timeline-content {
  padding: 40px 0 70px;
}
.period .timeline-title {
  margin: 0;
  text-align:justify;
}

/*----------------------------------------------
    MOD: TIMELINE SPLIT
----------------------------------------------*/
@media (min-width: 768px) {
  .timeline-split .timeline, .timeline-centered .timeline {
    display: table;
  }
  .timeline-split .timeline-item, .timeline-centered .timeline-item {
    display: table-row;
    padding: 0;
  }
  .timeline-split .timeline-info, .timeline-centered .timeline-info,
.timeline-split .timeline-marker,
.timeline-centered .timeline-marker,
.timeline-split .timeline-content,
.timeline-centered .timeline-content,
.timeline-split .period .timeline-info {
    display: table-cell;
    vertical-align: top;
  }
  .timeline-split .timeline-marker, .timeline-centered .timeline-marker {
    position: relative;
  }
  .timeline-split .timeline-content, .timeline-centered .timeline-content {
    padding-left: 30px;
  }
  .timeline-split .timeline-info, .timeline-centered .timeline-info {
    padding-right: 30px;
  }
  .timeline-split .period .timeline-title, .timeline-centered .period .timeline-title {
    position: relative;
    left: -45px;
  }
}

/*----------------------------------------------
    MOD: TIMELINE CENTERED
----------------------------------------------*/
@media (min-width: 992px) {
  .timeline-centered,
.timeline-centered .timeline-item,
.timeline-centered .timeline-info,
.timeline-centered .timeline-marker,
.timeline-centered .timeline-content {
    display: block;
    margin: 0;
    padding: 0;
  }
  .timeline-centered .timeline-item {
    padding-bottom: 40px;
    overflow: hidden;
  }
  .timeline-centered .timeline-marker {
    position: absolute;
    left: 50%;
    margin-left: -7.5px;
  }
  .timeline-centered .timeline-info,
.timeline-centered .timeline-content {
    width: 50%;
  }
  .timeline-centered > .timeline-item:nth-child(odd) .timeline-info {
    float: left;
    text-align: right;
    padding-right: 30px;
  }
  .timeline-centered > .timeline-item:nth-child(odd) .timeline-content {
    float: right;
    text-align: left;
    padding-left: 30px;
  }
  .timeline-centered > .timeline-item:nth-child(even) .timeline-info {
    float: right;
    text-align: left;
    padding-left: 30px;
  }
  .timeline-centered > .timeline-item:nth-child(even) .timeline-content {
    float: left;
    text-align: right;
    padding-right: 30px;
  }
  .timeline-centered > .timeline-item.period .timeline-content {
    float: none;
    padding: 0;
    width: 100%;
    text-align: center;
  }
  .timeline-centered .timeline-item.period {
    padding: 50px 0 90px;
  }
  .timeline-centered .period .timeline-marker:after {
    height: 30px;
    bottom: 0;
    top: auto;
  }
  .timeline-centered .period .timeline-title {
    left: auto;
  }
}

/*----------------------------------------------
    MOD: MARKER OUTLINE
----------------------------------------------*/
.marker-outline .timeline-marker:before {
  background: transparent;
  border-color: #FF6B6B;
}
.marker-outline .timeline-item:hover .timeline-marker:before {
  background: #FF6B6B;
}

/*----------------------------------------------
   Articles
----------------------------------------------*/
@import url(https://fonts.googleapis.com/css?family=Nunito|Patrick+Hand+SC|Oleo+Script+Swash+Caps:700|IM+Fell+French+Canon);

.flag-desc {
  
  margin: 0 auto;
  font-family: "IM Fell French Canon", sans-serif;
 
  line-height: 1.5em;
  color: #334c5e;
}
.flag-desc:first-letter {
  display: inline-block;
  float: left;
  margin: 0 .15em 0 0;
  color: #C82E00;
  text-shadow: 1px 4px 0 rgba(0, 147, 255, 0.8);
  font-weight: 700;
  font-size: 3em;
  font-family: "Oleo Script Swash Caps", sans-serif;
  line-height: 1;
}

/*-==============recent posts styling================-----------*/
/**
 * CSS custom properties
 */
:root {
  --black: #404040;
  --white: #fff;
  --gray: rgba(64, 64, 64, 0.15);
  --font-courgett: "Courgette", cursive;
  --font-open-sans: "Open Sans", sans-serif;
  --font-light: 300;
}

/**
 * Functions
 */
/**
 * Placeholders
 */
.u-visually-hidden {
  clip: rect(1px, 1px, 1px, 1px);
  -webkit-clip-path: inset(50%);
          clip-path: inset(50%);
  height: 1px;
  margin: -1px;
  overflow: hidden;
  padding: 0;
  position: absolute;
  width: 1px;
}

.c-main-menu__list {
  list-style: none;
  margin: 0;
  padding: 0;
}

/**
 * Styles
 */
/**
 * Elements
 */
/**
 * Objects
 */
.o-page {
  max-width: 100%;
  overflow-x: hidden;
  width: 100%;
}

.o-header {
  align-items: center;
  display: flex;
  justify-content: space-between;
  padding: 1.25rem;
}

.o-main-section {
  margin: 0 auto;
  max-width: 37.5rem;
}

/**
 * Components
 */
 }
.c-logo {
  font-family: var(--font-courgett);
  font-size: 1.625rem;
  margin: 0;
}

.c-logo__link {
  color: var(--black);
  text-decoration: none;
}

.c-main-menu {
  font-weight: 500;
}

.c-main-menu__list {
  display: flex;
}

.c-main-menu__link {
  color: var(--black);
  display: inline-block;
  font-size: 0.875rem;
  letter-spacing: 0.25rem;
  margin: 0 0.375rem;
 
  text-decoration: none;
  text-transform: uppercase;
}

.c-main-heading {
  font-size: 2.5rem;
  font-weight: var(--font-light);
  letter-spacing: 0.1875rem;
  margin: 3.75rem 0;
  text-align: center;
  text-transform: uppercase;
}

.c-article__link {
  align-items: center;
  color: var(--black);
  display: flex;
  justify-content: space-between;
  margin: 1.875rem 0;
  padding: 1.25rem;
  text-decoration: none;
  border-bottom:solid;
  border-bottom-style:color(#DE6712);
  
}
.c-article__link * {
  pointer-events: none;
}

.c-article__heading {
  font-size: 1.25rem;
  margin: 0.625rem 0;
}

.c-article__content {
  line-height: 1.5;
  text-align:left;
  width:80%;
  font-weight:400;
}

.c-article__img-wrapper {
   width: 70%;
}

.c-article__img {
  border-radius: 0.125rem;
  display: block;
  height: 100px;
 
  -o-object-fit: cover;
     object-fit: cover;
  transition: filter 0.3s ease-in;
  width: 100%;
}

.c-magic-area {
  position: absolute;
  z-index: -1;
}

.c-magic-area--menu {
  background-color: var(--gray);
  border-radius: 0.125rem;
}

.c-magic-area--content {
  background-color: var(--gray);
  border-radius: 0.125rem;
}
.c-magic-area--content::before {
  background-color: var(--black);
  content: "";
  height: 70%;
  left: -0.1875rem;
  position: absolute;
  top: 50%;
  transform: translateY(-50%);
  width: 0.375rem;
}

.c-author {
  color: #404040;
  margin: 10px 0;
  text-align: center;
}

.c-author__link {
  color: #404040;
  display: inline-block;
  position: relative;
  text-decoration: none;
}
.c-author__link::before, .c-author__link::after {
  bottom: 0;
  content: "";
  height: 8px;
  left: 0;
  position: absolute;
  z-index: -1;
}
.c-author__link::before {
  background-color: rgba(64, 64, 64, 0.15);
  width: 100%;
}
.c-author__link::after {
  background-color: #f4b13e;
  transition: width 0.3s ease-in-out;
  width: 0;
  will-change: width;
}
.c-author__link:hover::after {
  width: 100%;
}

.c-fe30 {
  -webkit-animation: fe30-anime 0.5s cubic-bezier(0.215, 0.61, 0.355, 1) 4s forwards;
          animation: fe30-anime 0.5s cubic-bezier(0.215, 0.61, 0.355, 1) 4s forwards;
  bottom: 0;
  display: none;
  opacity: 0;
  position: fixed;
  right: 0;
}
.is-desktop .c-fe30 {
  display: block;
}

.c-fe30__inner {
  background-color: #fff;
  border-radius: 7px;
  box-shadow: 0 0 15px 1px rgba(0, 0, 0, 0.1);
  color: #2d2f31;
  font-size: 14px;
  line-height: 1.45;
  margin: 10px;
  padding: 20px 20px 10px;
  transform: perspective(1000px) rotateX(0) rotateY(0) scale3d(1, 1, 1);
  transform-style: preserve-3d;
  width: 250px;
}

.c-fe30__photo {
  border: 3px solid #fff;
  border-radius: 50%;
  box-shadow: 0 0 15px 1px rgba(0, 0, 0, 0.1);
  display: block;
  height: 80px;
  position: absolute;
  top: -50px;
  left: 50%;
  overflow: hidden;
  transform: translateX(-50%) translateZ(26px);
  width: 80px;
}

.c-fe30__img {
  height: 100%;
  -o-object-fit: cover;
     object-fit: cover;
  width: 100%;
}

.c-fe30__link {
  color: #ffbd48;
  display: inline-block;
  transform: translateZ(18px);
}
.c-fe30__link:hover {
  text-decoration: none;
}

@-webkit-keyframes fe30-anime {
  0% {
    opacity: 0;
    transform: translate(0, 100%);
  }
  100% {
    opacity: 1;
    transform: translate(0, 0);
  }
}

@keyframes fe30-anime {
  0% {
    opacity: 0;
    transform: translate(0, 100%);
  }
  100% {
    opacity: 1;
    transform: translate(0, 0);
  }
}
/**
 * Events and blog styling
 */
 
.blog-slider {
  width: 90%;
  position: relative;
  
  margin: auto;
 
  box-shadow: 0px 14px 80px rgba(34, 35, 58, 0.2);
 
  border-radius: 25px;
  height: 400px;
  transition: all 0.3s;
}
@media screen and (max-width: 992px) {
  .blog-slider {
    width:100%;
    height: 400px;
  }
}
@media screen and (max-width: 768px) {
  .blog-slider {
    min-height: 500px;
    height: auto;
    margin: 180px auto;
  }
}
@media screen and (max-height: 500px) and (min-width: 992px) {
  .blog-slider {
    height: 350px;
  }
}
.blog-slider__item {
  display: flex;
  align-items: center;
}
@media screen and (max-width: 768px) {
  .blog-slider__item {
    flex-direction: column;
  }
}
.blog-slider__item.swiper-slide-active .blog-slider__img img {
  opacity: 1;
  transition-delay: 0.3s;
}
.blog-slider__item.swiper-slide-active .blog-slider__content > * {
  opacity: 15;
  transform: none;
}
.blog-slider__item.swiper-slide-active .blog-slider__content > *:nth-child(1) {
  transition-delay: 0.3s;
}
.blog-slider__item.swiper-slide-active .blog-slider__content > *:nth-child(2) {
  transition-delay: 0.4s;
}
.blog-slider__item.swiper-slide-active .blog-slider__content > *:nth-child(3) {
  transition-delay: 0.5s;
}
.blog-slider__item.swiper-slide-active .blog-slider__content > *:nth-child(4) {
  transition-delay: 0.6s;
}
.blog-slider__item.swiper-slide-active .blog-slider__content > *:nth-child(5) {
  transition-delay: 0.7s;
}
.blog-slider__item.swiper-slide-active .blog-slider__content > *:nth-child(6) {
  transition-delay: 0.8s;
}
.blog-slider__item.swiper-slide-active .blog-slider__content > *:nth-child(7) {
  transition-delay: 0.9s;
}
.blog-slider__item.swiper-slide-active .blog-slider__content > *:nth-child(8) {
  transition-delay: 1s;
}
.blog-slider__item.swiper-slide-active .blog-slider__content > *:nth-child(9) {
  transition-delay: 1.1s;
}
.blog-slider__item.swiper-slide-active .blog-slider__content > *:nth-child(10) {
  transition-delay: 1.2s;
}
.blog-slider__item.swiper-slide-active .blog-slider__content > *:nth-child(11) {
  transition-delay: 1.3s;
}
.blog-slider__item.swiper-slide-active .blog-slider__content > *:nth-child(12) {
  transition-delay: 1.4s;
}
.blog-slider__item.swiper-slide-active .blog-slider__content > *:nth-child(13) {
  transition-delay: 1.5s;
}
.blog-slider__item.swiper-slide-active .blog-slider__content > *:nth-child(14) {
  transition-delay: 1.6s;
}
.blog-slider__item.swiper-slide-active .blog-slider__content > *:nth-child(15) {
  transition-delay: 1.7s;
}
.blog-slider__img {
  width: 300px;
  flex-shrink: 0;
  height: 300px;
  background-image: linear-gradient(147deg, #fe8a39 0%, #fd3838 74%);
  box-shadow: 4px 13px 30px 1px rgba(252, 56, 56, 0.2);
  border-radius: 20px;
  transform: translateX(-80px);
  overflow: hidden;
}
.blog-slider__img:after {
  content: "";
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background-image: linear-gradient(147deg, #fe8a39 0%, #fd3838 90%);
  border-radius: 20px;
  opacity: 0.8;
}
.blog-slider__img img {
  width: 100%;
  height: 100%;
  object-fit: cover;
  display: block;
  opacity: 10;
  border-radius: 20px;
  transition: all 0.3s;
}
@media screen and (max-width: 768px) {
  .blog-slider__img {
    transform: translateY(-50%);
    width: 90%;
  }
}
@media screen and (max-width: 576px) {
  .blog-slider__img {
    width: 95%;
  }
}
@media screen and (max-height: 500px) and (min-width: 992px) {
  .blog-slider__img {
    height: 270px;
  }
}
.blog-slider__content {
  padding-right: 25px;
}
@media screen and (max-width: 768px) {
  .blog-slider__content {
    margin-top: -80px;
    text-align: center;
    padding: 0 30px;
  }
}
@media screen and (max-width: 576px) {
  .blog-slider__content {
    padding: 0;
  }
}
.blog-slider__content > * {
  opacity: 10;
  transform: translateY(25px);
  transition: all 0.4s;
}
.blog-slider__code {
  color: #7b7992;
  margin-bottom: 15px;
  display: block;
  font-weight: 500;
}
.blog-slider__title {
  font-size: 24px;
  font-weight: 700;
  margin-bottom: 20px;
}
.blog-slider__text {
  color: #4e4a67;
  margin-bottom: 30px;
  line-height: 1.5em;
}
.blog-slider__button {
  display: block;
  background-image: linear-gradient(147deg, #fe8a39 0%, #fd3838 74%);
  padding: 15px 35px;
  border-radius: 50px;
  color: #fff;
  box-shadow: 0px 14px 80px rgba(252, 56, 56, 0.4);
  text-decoration: none;
  font-weight: 500;
  justify-content: center;
  text-align: center;
  letter-spacing: 1px;
}
@media screen and (max-width: 576px) {
  .blog-slider__button {
    width: 100%;
  }
}
.blog-slider .swiper-container-horizontal > .swiper-pagination-bullets, .blog-slider .swiper-pagination-custom, .blog-slider .swiper-pagination-fraction {
  bottom: 10px;
  left: 0;
  width: 100%;
}
.blog-slider__pagination {
  position: absolute;
  z-index: 21;
  right: 20px;
  width: 11px !important;
  text-align: center;
  left: auto !important;
  top: 50%;
  bottom: auto !important;
  transform: translateY(-50%);
}
@media screen and (max-width: 768px) {
  .blog-slider__pagination {
    transform: translateX(-50%);
    left: 50% !important;
    top: 205px;
    width: 100% !important;
    display: flex;
    justify-content: center;
    align-items: center;
  }
}
.blog-slider__pagination.swiper-pagination-bullets .swiper-pagination-bullet {
  margin: 8px 0;
}
@media screen and (max-width: 768px) {
  .blog-slider__pagination.swiper-pagination-bullets .swiper-pagination-bullet {
    margin: 0 5px;
  }
}
.blog-slider__pagination .swiper-pagination-bullet {
  width: 11px;
  height: 11px;
  display: block;
  border-radius: 10px;
  background: #062744;
  opacity: 0.2;
  transition: all 0.3s;
}
.blog-slider__pagination .swiper-pagination-bullet-active {
  opacity: 1;
  background: #fd3838;
  height: 30px;
  box-shadow: 0px 0px 20px rgba(252, 56, 56, 0.3);
}
@media screen and (max-width: 768px) {
  .blog-slider__pagination .swiper-pagination-bullet-active {
    height: 11px;
    width: 30px;
  }
}
/*-------------------
    comment section
=======================*/
.djk {
  -webkit-appearance: none;
     -moz-appearance: none;
          appearance: none;
  border-radius: 0;
}

.cardd {
  margin: 2rem auto;
  display: flex;
  flex-direction: column;
  width: 100%;
  max-width: 425px;
  background-color: #FFF;
  border-radius: 10px;
  box-shadow: 0 10px 20px 0 rgba(153, 153, 153, 0.25);
  padding: 0.75rem;
}

.cardd-image {
  border-radius: 8px;
  overflow: hidden;
  padding-bottom: 65%;
  background-image: url("https://assets.codepen.io/285131/coffee_1.jpg");
  background-repeat: no-repeat;
  background-size: 150%;
  background-position: 0 5%;
  position: relative;
}

.cardd-heading {
  position: absolute;
  left: 10%;
  top: 15%;
  right: 10%;
  font-size: 1.75rem;
  font-weight: 700;
  color: #735400;
  line-height: 1.222;
}
.cardd-heading small {
  display: block;
  font-size: 0.75em;
  font-weight: 400;
  margin-top: 0.25em;
}

.cardd-form {
  padding: 2rem 1rem 0;
}

.input {
  display: flex;
  flex-direction: column-reverse;
  position: relative;
  padding-top: 1.5rem;
}
.input + .input {
  margin-top: 1.5rem;
}

.input-label {
  color: #A38B85;
  position: absolute;
  top: 1.5rem;
  transition: 0.25s ease;
}

.input-field {
  border: 0;
  z-index: 1;
  background-color: transparent;
  border-bottom: 2px solid #eee;
  font: inherit;
  font-size: 1.125rem;
  padding: 0.25rem 0;
}
.input-field:focus, .input-field:valid {
  outline: 0;
  border-bottom-color: #D36558;
}
.input-field:focus + .input-label, .input-field:valid + .input-label {
  color: #D36558;
  transform: translateY(-1.5rem);
}

.action {
  margin-top: 2rem;
}

.action-button {
  font: inherit;
  font-size: 1.25rem;
  padding: 1em;
  width: 100%;
  font-weight: 500;
  background-color: #D36558;
  border-radius: 6px;
  color: #FFF;
  border: 0;
}
.action-button:focus {
  outline: 0;
}

.cardd-info {
  padding: 1rem 1rem;
  text-align: center;
  font-size: 0.875rem;
  color: #B7917B;
}
.cardd-info a {
  display: block;
  color: #D36558;
  text-decoration: none;
}
/*-------------------------------
      comment replies
================================*/
/* 
    Body, .comm1, comment-thread, and utilities

    Notes:
        - This section sets some basic styles. You can ignore this part and 
        go directly to the comment styles.
*/

.comm1 {
    -moz-appearance: none;
    -webkit-appearance: none;
    appearance: none;
    font-size: 14px;
    padding: 4px 8px;
    color: rgba(0, 0, 0, 0.85);
    border: 1px solid rgba(0, 0, 0, 0.2);
    border-radius: 4px;
}
.comm1:hover,
.comm1:focus,
.comm1:active {
    cursor: pointer;
    background-color: #ecf0f1;
}
.comment-thread {
    width: 100%;
    margin: auto;
    padding: 0 30px;
   
    border: 1px solid transparent; /* Removes margin collapse */
}
.m-0 {
    margin: 0;
}
.sr-only {
    position: absolute;
    left: -10000px;
    top: auto;
    width: 1px;
    height: 1px;
    overflow: hidden;
}

/* Comment */

.comment {
    position: relative;
    margin: 20px auto;
}
.comment-heading {
    display: flex;
    align-items: center;
    height: 50px;
    font-size: 14px;
}
.comment-voting {
    width: 20px;
    height: 32px;
    border: 1px solid rgba(0, 0, 0, 0.2);
    border-radius: 4px;
}
.comment-voting .comm1 {
    display: block;
    width: 100%;
    height: 50%;
    padding: 0;
    border: 0;
    font-size: 10px;
}
.comment-info {
    color: rgba(0, 0, 0, 0.5);
    margin-left: 10px;
}
.comment-author {
    color: #FF9C91;
    font-weight: bold;
    text-decoration: none;
}
.comment-author:hover {
    text-decoration: underline;
}
.replies {
    margin-left: 20px;
}

/* Adjustments for the comment border links */

.comment-border-link {
    display: block;
    position: absolute;
    top: 50px;
    left: 0;
    width: 12px;
    height: calc(100% - 50px);
    border-left: 4px solid transparent;
    border-right: 4px solid transparent;
    background-color: rgba(0, 0, 0, 0.1);
    background-clip: padding-box;
}
.comment-border-link:hover {
    background-color: rgba(0, 0, 0, 0.3);
}
.comment-body {
    padding: 0 20px;
    padding-left: 28px;
}
.replies {
    width:100%;
}

/* Adjustments for toggleable comments */

details.comment summary {
    position: relative;
    list-style: none;
    cursor: pointer;
}
details.comment summary::-webkit-details-marker {
    display: none;
}
details.comment:not([open]) .comment-heading {
    border-bottom: 1px solid rgba(0, 0, 0, 0.2);
}
.comment-heading::after {
    display: inline-block;
    position: absolute;
    right: 5px;
    align-self: center;
    font-size: 12px;
    color: rgba(0, 0, 0, 0.55);
}
details.comment[open] .comment-heading::after {
    content: "Click to hide";
color:#FF9C91;
}
details.comment:not([open]) .comment-heading::after {
    content: "Click to show";
	color:#FF9C91;
}

/* Adjustment for Internet Explorer */

@media screen and (-ms-high-contrast: active), (-ms-high-contrast: none) {
    /* Resets cursor, and removes prompt text on Internet Explorer */
    .comment-heading {
        cursor: default;
    }
    details.comment[open] .comment-heading::after,
    details.comment:not([open]) .comment-heading::after {
        content: " ";
    }
}

/* Styling the reply to comment form */

.reply-form textarea {
    font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Helvetica, Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol";
    font-size: 16px;
    width: 100%;
    max-width: 100%;
    margin-top: 15px;
    margin-bottom: 5px;
}
.d-none {
    display: none;
}
</style>
</head>