$(document).ready(function() {

    /**
     * Switch between the different levels on a poster
     */
     $(document).on('click', '.switch-level', function(event){
         // Which level is currently displayed
         var currentImage = $('.images-wrapper .poster-img.current');
         var currentLevel = parseInt(currentImage.attr('data-nb'));

         // Selectors
         var imagesFrame = $('.images-frame');
         var minusBtn = $('.switch-level.minus');
         var plusBtn = $('.switch-level.plus');

         // Height of one image
         var heightPoster = currentImage.height();

         // Get the current frame position in order to slide up/down
         var translateValue = (imagesFrame.css('transform') != 'none')? imagesFrame.css('transform') : 'matrix(0,0,0,0,0,0)';
             translateValue = translateValue.split('(')[1].split(')')[0].split(',');
             translateValue = parseInt(translateValue[5]);

         // Which button has been pressed
         if ($(this).hasClass('minus') && currentLevel > 1) {
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

         // Refresh the classes
         currentImage.removeClass('current');
         $('.poster-img[data-nb="'+newLevel+'"]').toggleClass('current');
         
         if(newLevel == 1){
             minusBtn.addClass('hidden');
         }
         if(newLevel ==  $('.images-wrapper .poster-img').length){
             plusBtn.addClass('hidden');
         }

     });

});
