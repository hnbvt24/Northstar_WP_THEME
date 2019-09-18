$("#back-to-top").click(function(e){       
  // e.preventDefault();
  $('html,body').animate({scrollTop:$(this.hash).offset().top}, "slow");
});

//Adjust the Gallery for Building Campaign
document.getElementById("bwg_thumbnails_0").style.width = "100%";
document.getElementById("bwg_thumbnails_0").style.padding = "6px";