jQuery.noConflict();

jQuery(document).ready(function(){
  var windowHeight = jQuery(document).attr('height');
  jQuery('.fs_slide').css({height: windowHeight});
  jQuery('.fs_slide_container').cycle({fx: 'fade'});
});
