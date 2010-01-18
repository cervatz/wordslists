<div id='ajaxDiv'>
   // create the form
   <?php
      echo $ajax->form(array('type' => 'post',
                             'options' => array('model' => 'Line',
                                                'update' => 'ajaxDiv',
                                                'id' => 'form_id',
                                                'url' => array('controller' => 'ajax',
                                                               'action' => 'beforeAjaxAction'))));
   ?>
<?php echo $form->input('string1'); ?> 
<?php echo $form->input('string2'); ?>
<?php echo $ajax->submit('Submit', array('url' => '/ajax/afterAjaxAction', 'update'=>'dynamic1')); ?>
<?php echo $form->end(); ?>
   
</div>


<?php echo $ajax->div('dynamic1'); ?>
<span><?php echo $data1; ?></span>
<?php echo $ajax->divEnd('dynamic1'); ?>


