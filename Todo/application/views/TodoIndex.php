<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <title><?php echo $title ?></title>
    </head>
    <body>
        <h1><?php echo $titre ?></h1>
        
        <?php foreach ($todos as $todo): ?>
<!--        <?php echo $todo["task"]; ?> <a href = "<?php echo base_url('Todo/fait/'.$todo["id"])?>"> fait </a></br> -->
        <?php if($todo["completed"]==1){?>
    <strike> <?php echo $todo["task"]; ?> <a href = "<?php echo base_url('Todo/afaire/'.$todo["id"])?>"></strike> Fait / </a>
    <a href = "<?php echo base_url('Todo/modifier/'.$todo["id"])?>"> Modifier / </a>
    <a href =" <?php echo base_url('Todo/supprimer/'.$todo["id"]) ?>"> Supprimer</a> </br>
        <?php }
              else{
                  echo $todo["task"]; ?> <a href = "<?php echo base_url('Todo/fait/'.$todo["id"])?>"> à Faire / </a>
        <a href = "<?php echo base_url('Todo/modifier/'.$todo["id"])?> "> Modifier /</a>
        <a href =" <?php echo base_url('Todo/supprimer/'.$todo["id"]) ?>"> Supprimer</a> </br>
             <?php } ?>
    <?php endforeach; ?>
        
        </br> </br>
        <a href =" <?php echo base_url('Todo/add/'); ?> ">Ajouter</a> </br>
        <a href =" <?php echo base_url('Todo/indexOrdre/'); ?> ">Ordonner</a> </br>
        
        </div><!-- /.container -->
    </body>
</html>
