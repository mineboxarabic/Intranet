
<?= $this->extend('layouts/Main') ?>

<?= $this->section('pageName') ?> Google Drive<?= $this->endSection() ?>

<?= $this->section('content') ?>

<?php
if(count($filesFolder) == 0){
    echo "<p>There is no file in this folder</p>";
}
foreach($filesFolder as $file){
    echo "<p>".$file->getName()."</p>";
}

?>



<?= $this->endSection() ?>