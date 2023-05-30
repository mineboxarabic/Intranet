<?= $this->extend('layouts/Main') ?>
//TODO: Change the page name
<?= $this->section('pageName') ?> ES Details <?= $this->endSection() ?>

<?= $this->section('content') ?>


<style>
#thumnail-project{
    height: 250px;
    width: 100%;
    object-fit: cover;
    object-position: center;
}
</style>

<?php 
if(session()->get('current_user')['id'] == 531 || session()->get('current_user')['id'] == 264){
    echo '<a href="' . base_url() . 'ESs/M/consulte/' . $ES['id_ES'] . '" class="btn btn-primary">Modifier</a>';
}

?>

<img id="thumnail-project" class="img-thumnail" src="<?php
    $img = base_url() . 'Images/ESs/' . $ES['file_img'];
    if (file_exists('Images/ESs/' . $ES['file_img'])) {
        echo $img;
    } else
        echo base_url() . 'Images/ESs/Project_place_holder.png'?>"/>\
<div class="d-flex flex-column justify-content-center">
    <h2 class="mb-1 align-self-center"><?= $ES['nom_ES']?></h2>
    <h5 class="mb-1 align-self-center"><?= $ES['commanditaire']?></h5>
</div>

<div id="descriptif">
<?php 
    echo $ES['descriptif'];
?>
</div>


<a href="<?= base_url() . 'PDF/ESs/' . $ES['file'] ?>" class="btn btn-primary">Télécharger le document</a>

<p class="text-start p-3">Date fin : <?= $ES['date_fin']?></p>



<!--<script src="https://cdn.ckeditor.com/ckeditor5/37.1.0/classic/ckeditor.js"></script>
<script>
    ClassicEditor
        .create( document.querySelector( '#editor' ) )
        .catch( error => {
            console.error( error );
        } );
</script> -->
<?= $this->endSection() ?>