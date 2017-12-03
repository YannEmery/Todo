<?php
echo validation_errors();
echo form_open(base_url('Todo/add'));
echo form_label('Ordre :','ordre');
echo form_input('ordre',set_value('ordre',0));
echo form_label('Tâche :','task');
echo form_input('task',set_value('task','Saisir votre tâche'));
echo form_submit('Ajouter','Ajouter');
echo form_close(); 
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */ 

