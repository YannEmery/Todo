<?php
echo validation_errors();
echo form_open(base_url('Todo/indexOrdre/'));
echo form_label('','ordre');

echo form_label(' ','task'); ?>

<?php
//$all_todos = $this->todoModel->get_all();
//        $datas = array();
//        $datas['todoss'] = $all_todos;
?>

<?php foreach ($todos as $todo):
    
echo form_input('ordre',set_value('ordre',0));

echo $todo["task"];
?> </br> <?php
endforeach; ?>
<?php
echo form_submit('Reordonner','Reordonner');
echo form_close(); 

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

