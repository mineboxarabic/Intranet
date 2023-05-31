
<?= $this->extend('layouts/Main') ?>

<?= $this->section('pageName') ?> Google Drive<?= $this->endSection() ?>

<?= $this->section('content') ?>


<style>
.grid {
  display: grid;
  grid-template-columns: repeat(3, 1fr);
  grid-gap: 10px;
}
</style>
<?php 

?>




<div class="grid">
<?php foreach($filesFromDrive as $file):?>

<?php if($file->getMimeType() == "application/vnd.google-apps.folder"): ?>
  
  <?php $folderId = $file->getId() ?>
  <div class="d-flex justify-content-center">
    <a href='<?=base_url('/showFolder/'.$folderId)?>'>
      <img width="80" src='<?=base_url('Images/Folder.png')?>' alt=''>
      <!-- class="text-align:center" -->
      <p class="text-center"></p><?=$file->getName()?></p>
    </a>
  </div>

<?php else: ?>
   
  <?php 
  //use the calss File in app/Classes/File.php

      require_once '../app/Classes/File.php';

    $file = new File($file);
    $file->showFile();

    ?>
  <?php endif; ?>





<?php endforeach; ?>
</div>














    <!--/*echo "File Name: " . $file->getName() . "<br>";
    echo "File ID: " . $file->getId() . "<br>";
    echo "File Type: " . $file->getMimeType() . "<br>";
    echo "------------------------<br>";*/



    /*
    1) To get the type of the file, you can use the getMimeType() method.
    if its a file the type will be something like this: application/vnd.google-apps.document
    if its a folder the type will be something like this: application/vnd.google-apps.folder

    2) To get the name of the file, you can use the getName() method.

    3) To get the id of the file, you can use the getId() method.

    4) To get the size of the file, you can use the getSize() method.

    5) To get the date of the file, you can use the getCreatedTime() method.

    6) To get the date of the file, you can use the getModifiedTime() method.

    7) To get the date of the file, you can use the getModifiedByMeTime() method.

     */-->






     <script type="module">

     </script>
  





<?= $this->endSection() ?>