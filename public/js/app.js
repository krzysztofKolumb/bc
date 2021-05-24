$(document).ready(function(){

  $(".menu-btn").on('click', function(){
      $('.menu-container').toggleClass('active');
  });    

  $(".dropbtn").on('click', function(){
      $(this).next().toggleClass('active');
  });

$(".hex").on('click', function(event){
  var target = $(event.target);
  var img = target.clone();
  $("#modal-img-body").html(img);
  $("#aboutGallery").modal("show");
})


function setActivePage(){
  var page = $("body").attr("class");
  $(".menu-container a").removeClass("active");
  $(".menu-container").find("a[page=" + page + "]").addClass("active");
}

$(".arrow-left").on("click", function(){
  var currentImgNo = $("#modal-img-body").find("img").attr("img-id");
  var prevImgNo = parseInt(currentImgNo)-1;
  var length = $(".aboutHexGrid li").length;

  if(currentImgNo == 1){
    prevImgNo = length;
  }

  var imgId = "bodyclinic-" + prevImgNo;
  var img =  $("#" + imgId).clone();
  $("#modal-img-body").html(img);

})

$(".arrow-right").on("click", function(){
  var currentImgNo = $("#modal-img-body").find("img").attr("img-id");
  var nextImgNo = parseInt(currentImgNo) + 1;
  var length = $(".aboutHexGrid li").length;

  if(currentImgNo == length){
    nextImgNo = 1;
  }
    var imgId = "bodyclinic-" + nextImgNo;
    var img =  $("#" + imgId).clone();
    $("#modal-img-body").html(img);

})


$("#slider-dots span").on("click", function() {

  var slide = $(this).attr("slide");
  
  $("#recommendations-list").find("li.active").removeClass("active");
  $("#slider-dots").find("span.active").removeClass("active");

  $("#recommendations-list li:nth-child(" + slide + ")").addClass("active");
  $("#slider-dots span:nth-child(" + slide + ")").addClass("active");

  // $("#recommendations-list").find("li.active").removeClass("active");
  // $("#slider-dots").find("span.active").removeClass("active");

  // $("#recommendations-list li:nth-child(" + slide + ")").addClass("active");
  // $("#slider-dots span:nth-child(" + slide + ")").addClass("active");


})

$("#recommendations-list li:nth-child(1)").addClass("active");
$("#slider-dots span:nth-child(1)").addClass("active");

// $("#recommendations-list li:nth-child(1)").addClass("active").fadeIn();
// $("#slider-dots span:nth-child(1)").addClass("active");

function myFunction() {
  setTimeout(function(){ alert("Hello"); }, 3000);
}

// myFunction();

var active = 1;
// recommendationCarousel();

// var i=1;
// var x = $("#recommendations-list").children();



function recommendationCarousel(){
  var i;
  var x = $("#recommendations-list").children();

  var prev = active - 1; 

  for( i=0; i <= x.length; i++ ){
    $("#recommendations-list li:nth-child(" + i + ")").removeClass("active");
  }

  if( active > x.length ){
    active = 1;
  }

  $("#recommendations-list li:nth-child(" + active + ")").addClass("active");
  $("#recommendations-list li:nth-child(" + prev + ")").removeClass("active");
  setTimeout(recommendationCarousel, 2000);

  active++;

}

  $(".nav-item").on("click", function(){
    $(".nav-item").removeClass("active");
    $(this).addClass("active");
    var profession =  $(this).attr("profession");
    $(".search-result-content").find("li").removeClass("active");
    $(".search-result-content").find("li[profession=" + profession + "]").addClass("active");

    $(".accordion-list li").removeClass("active");
    $(".accordion-list li[profession=" + profession + "]").addClass("active");

    if(profession == 0){
      $(".search-result-content li").addClass("active");
      $(".accordion-list li").addClass("active");
    }
  })

  $(".accordion-item header").on("click", function(){
    $(this).find("img").toggleClass("active");
    // $(this).next().toggleClass("active");
    $(this).next().slideToggle(400);
  })

  setActivePage();

});