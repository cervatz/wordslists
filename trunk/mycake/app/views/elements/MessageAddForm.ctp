  <?=$javascript->link('lib/jquery-ui-1.7.2.custom.min.js'); ?>
  <?=$html->css('jquery-ui-1.7.2.custom.css'); ?>
  
  <script type="text/javascript">
  $(document).ready(function(){
    $("#MessageAddForm").validate();
	
	$("#dialog").dialog({
		bgiframe: true,
		resizable: false,
		height:300,
		width:400,
		modal: true,
		overlay: {
			backgroundColor: '#000',
			opacity: 0.5
		},
		buttons: {
			'Send message': function() {
				$("#MessageAddForm").submit();
			},
			Cancel: function() {
				$(this).dialog('close');
			}
		}
	});  	
  });
  </script>