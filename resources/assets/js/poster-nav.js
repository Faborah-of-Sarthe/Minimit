$(document).ready(function() {

    // Save the animation state
    isAnimating = false;

    // Desktop events for levels
     $(document).on('click', '.switch-level', function(event){
         var direction = ($(this).hasClass('minus')) ? 'minus' : 'plus';
         switchPosterLevel(direction);
     });

     // Desktop events for poster switch
      $(document).on('click', '.switch-poster', function(event){
          var posterId = $(this).attr('data-id');
          var selectionId = $(this).attr('data-selection');
          switchPoster(posterId, selectionId);
      });

     /**
     * Switch between the different levels on a poster
     */
     function switchPosterLevel(direction) {
         // If animating, do nothing
         if (isAnimating == true)
            return;

         // Which level is currently displayed
         var currentImage = $('.images-wrapper .poster-img.current');
         var currentLevel = parseInt(currentImage.attr('data-nb'));

         // Selectors
         var imagesFrame = $('.images-frame');
         var minusBtn = $('.switch-level.minus');
         var plusBtn = $('.switch-level.plus');

         // Height of one image
         var heightPoster = currentImage.height();

         // Declare running animation
         isAnimating = true;

         // Get the current frame position in order to slide up/down
         var translateValue = (imagesFrame.css('transform') != 'none')? imagesFrame.css('transform') : 'matrix(0,0,0,0,0,0)';
             translateValue = translateValue.split('(')[1].split(')')[0].split(',');
             translateValue = parseInt(translateValue[5]);

         // Which button has been pressed
         if (direction == 'minus' && currentLevel > 1) {
             var newLevel = currentLevel-1;
             translateValue += heightPoster;
             plusBtn.removeClass('hidden');
         } else {
             var newLevel = currentLevel+1;
             translateValue -= heightPoster;
             minusBtn.removeClass('hidden');
         }
         // Slide the frame
         imagesFrame.css('transform', 'translateY('+translateValue+'px)');

         // Update the animation state
         imagesFrame.one('webkitTransitionEnd otransitionend oTransitionEnd msTransitionEnd transitionend', function(){
             isAnimating = false;
         });

         // Refresh the classes
         currentImage.removeClass('current');
         $('.poster-img[data-nb="'+newLevel+'"]').toggleClass('current');

         if(newLevel == 1){
             minusBtn.addClass('hidden');
         }
         if(newLevel ==  $('.images-wrapper .poster-img').length){
             plusBtn.addClass('hidden');
         }
     }

     /**
      * Switch between the different posters of a selection, or to a random poster
      */
     function switchPoster(posterId, selectionId) {
         var params = { posterId, selectionId };

         $.ajax({
             url: ajaxPosterUrls.switchposter,
             data: params,
             beforeSend: function() { $('.poster-wrapper').addClass('loading'); },
             complete: function() {
                 $('.poster-wrapper').removeClass('loading');
                 imagesLoaded();
             }
         })
         .done(function(data) {
             $('.poster-wrapper').html(data);
         })
         .fail(function() {
             console.log("error");
         })
     }
});

// Remove the animation class on images
function imagesLoaded() {
    $('img.loading').on('load', function(){
       $('img.loading').removeClass('loading');
   });
}
imagesLoaded();
