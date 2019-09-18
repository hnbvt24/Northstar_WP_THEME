/**
 * Toggle play button for podcasts
 */
 // var allPanels = $('.audio-player-bar').hide();
 // $( ".sermon-play-btn" ).click(function() {

  //$( ".audio-player-bar").toggle("slow");

(function($) {
    
  var allPanels = $('.audio-player-bar').hide();
    
  $('.sermon-play-btn').click(function() {
    allPanels.slideUp();
    $(this).parent().parent().next().slideDown();
    return false;
  });

})(jQuery);

