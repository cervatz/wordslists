<p><?php echo $html->link('/wordslists/mylists', '/wordslists/mylists');?><br/><br/></p>

<p>Risposte corrette: <?=$session->read('rightAnswers')?> su <?=$session->read('LineNumber')?></p>

<?php

	$percRight = ($session->read('rightAnswers')/$session->read('LineNumber'))*100;
	$percWrong = 100-$percRight;

?>

<table>
            <tr>
                <th>Right</th>
                <td><?=$percRight?>%</td>
            </tr>
            <tr>
                <th>Wrong</th>
                <td><?=$percWrong?>%</td>
            </tr>

</table>

<div id="holder"></div>
