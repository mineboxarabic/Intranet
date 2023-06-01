
<?= $this->extend('layouts/Main') ?>

<?= $this->section('pageName') ?> Google Drive<?= $this->endSection() ?>

<?= $this->section('content') ?>


<style>
.grid {
  display: grid;
  grid-template-columns: repeat(5, 1fr);
  grid-gap: 10px;
}
</style>
<?php 

?>




<div class="grid">
  
<?php
require_once '../app/Classes/File.php';
require_once '../app/Classes/Folder.php';

foreach($filesFromDrive as $file):?>

<?php if($file->getMimeType() == "application/vnd.google-apps.folder"){
  $file = new Folder($file);
  $file->showFile();

}else{
  $file = new File($file);
  $file->showFile();
}?>
<?php endforeach; ?>
</div>





     <script type="module">

     </script>
  





<?= $this->endSection() ?>