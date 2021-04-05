require('./bootstrap');
$(document).ready(function(){

    $(".menu-btn").on('click', function(){
        $('.menu-container').toggleClass('active');
    });    

    $(".dropbtn").on('click', function(){
        $(this).next().toggleClass('active');
    });
});