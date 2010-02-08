  <?=$javascript->link('lib/jquery.dropshadow.js'); ?>
  <?=$javascript->link('lib/jquery.timers.js'); ?>
  <?=$javascript->link('mbTooltip.js'); ?>
  
  <?=$html->css('mbTooltip.css'); ?>
  
  <script type="text/javascript">
  $(document).ready(function(){
  	
    $("#WordslistAddForm").validate();
	
    $("[title]").mbTooltip({ // also $([domElement]).mbTooltip
        opacity : .65,       //opacity
        wait:800,           //before show
        cssClass:"default",  // default = default
        timePerWord:70,      //time to show in milliseconds per word
        hasArrow:false,                 // if you whant a little arrow on the corner
        hasShadow:true,
        imgPath:"images/",
        anchor:"mouse", //or "parent" you can ancor the tooltip to the mouse  or to the element
        shadowColor:"black", //the color of the shadow
        mb_fade:200 //the time to fade-in
    });	
  });
  </script>