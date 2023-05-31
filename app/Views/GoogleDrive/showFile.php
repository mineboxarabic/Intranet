
<?= $this->extend('layouts/Main') ?>

<?= $this->section('pageName') ?> Google Drive<?= $this->endSection() ?>

<?= $this->section('content') ?>

<?php 

    $fileId = $file->getId();


?>
<iframe src="https://drive.google.com/file/d/<?= $fileId ?>/preview" width="640" height="480"></iframe>

<?= $this->endSection() ?>