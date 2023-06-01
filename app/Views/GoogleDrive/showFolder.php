
<?= $this->extend('layouts/Main') ?>

<?= $this->section('pageName') ?> Google Drive<?= $this->endSection() ?>

<?= $this->section('content') ?>

<div class="grid">
<?php
if(count($filesFolder) == 0){
    echo "<p>There is no file in this folder</p>";
}
require_once '../app/Classes/File.php';

foreach($filesFolder as $file){
    $file = new File($file);
    $file->showFile();
}

?>
</div>

<style>
.grid {
  display: grid;
  grid-template-columns: repeat(5, 1fr);
  grid-gap: 10px;
}
</style>


<?= $this->endSection() ?>