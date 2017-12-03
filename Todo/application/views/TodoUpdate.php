<?php
echo validation_errors();
echo form_open(base_url('Todo/modifier/'.$id));
echo form_label('Ordre :','ordre');
echo form_input('ordre',set_value('ordre',$ordre));
echo form_label('Tâche :','task');
echo form_input('task',set_value('task',$task));
echo form_submit('Modifier','Modifier');
echo form_close(); 

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

