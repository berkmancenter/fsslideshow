jQuery.noConflict();

function refreshPage(){
	window.location.href= 'https://blogs.law.harvard.edu/slideshowexperiment/?slideshow_cat=sun-plan';
}

jQuery(document).ready(function(){

  var t = setTimeout('refreshPage()', 20000);

  if(jQuery('.fs_slide').length > 0){
  	var windowHeight = jQuery(document).attr('height');
  	jQuery('.fs_slide').css({height: windowHeight});
  	jQuery('.fs_slide_container').cycle({fx: 'fade', timeout: 10000});
  }
  jQuery.fn.fullscreenr({width: 1280, height: 960, bgID: '#bgimg'});

  jQuery('.fs_slide').each(function(){
	var headerHeight = jQuery(this).find('h1').outerHeight(true);
	var containerHeight = jQuery(this).height();
	jQuery(this).find('.slide_text').css({height: containerHeight - headerHeight});
  });
});
