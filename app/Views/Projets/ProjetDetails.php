
<style>
#thumnail-project{
    height: 250px;
    width: 100%;
    object-fit: cover;
    object-position: center;
}
</style>

<img id="thumnail-project" class="img-thumnail" src="<?php
    $img = base_url() . 'Images/Projets/' . $Projet['file_img'];
    if (file_exists('Images/Projets/' . $Projet['file_img'])) {
        echo $img;
    } else
        echo base_url() . 'Images/Projets/Project_place_holder.png'?>"/>\
<div class="d-flex flex-column justify-content-center">
    <h2 class="mb-1 align-self-center"><?= $Projet['nom_projet']?></h2>
    <h5 class="mb-1 align-self-center"><?= $Projet['commanditaire']?></h5>
</div>

<div id="descriptif">
<?php 
    echo $Projet['descriptif'];
?>
</div>


<a href="<?= base_url() . 'PDF/Projets/' . $Projet['file'] ?>" class="btn btn-primary">Télécharger le document</a>

<p class="text-start p-3">Date fin : <?= $Projet['date_fin']?></p>



<!--<script src="https://cdn.ckeditor.com/ckeditor5/37.1.0/classic/ckeditor.js"></script>
<script>
    ClassicEditor
        .create( document.querySelector( '#editor' ) )
        .catch( error => {
            console.error( error );
        } );
</script> -->