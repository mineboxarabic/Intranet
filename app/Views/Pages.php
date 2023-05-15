
<?= $this->extend('layouts/Main') ?>

<?= $this->section('pageName') ?><?php echo $page['titre'] ?> <?= $this->endSection() ?>

<?= $this->section('content') ?>

<?php echo $page['contenu'] ?>

<p>Modifier le </p> 
<?= $this->endSection() ?>