<?= $this->extend('layouts/Main') ?>
//TODO: Change the page name
<?= $this->section('pageName') ?> ESs <?= $this->endSection() ?>

<?= $this->section('content') ?>

<div class="col-12">
    <div class="card">
        <div class="card-body">


            <div class="list-group"></div>
            <?php foreach ($ESs as $ES) : ?>
            <!-- //TODO: add the images -->

            <div href="#" class="card d-flex flex-row justify-content-between">
              
                    <div class="d-flex justify-content-start">
                        <a href="<?= base_url() . 'ESs/consulte/'.$ES['id_ES'] ?>"><img
                                style="object-fit: cover; width:200px; height:200px;" id="thumnail-project " width="200"
                                class="img-thumbnail rounded float-left" src="<?php 
                                    $image = base_url() .'Images/ESs/'. $ES['file_img'];
                                    if (file_exists('Images/ESs/'. $ES['file_img'])) {
                                        echo $image;
                                    } else
                                        echo base_url() . 'Images/ESs/Project_place_holder.png'
                                    
                                    ?>" alt="image"> </a>
                        <div class="d-flex flex-column p-3">
                            <a href="<?= base_url() . 'ESs/consulte/'.$ES['id_ES'] ?>">
                                <h2 class="mb-1 text-left"><?= $ES['nom_ES']?></h2>
                            </a>
                            <h5 class="mb-1"><?= $ES['commanditaire']?></h5>
                        </div>

                    </div>
                    <div class=" p-3 d-flex flex-column justify-content-end justify-content-between">
                    <div class="d-flex flex-row justify-content-end justify-content-between">

                        <p class="me-2">Date fin :  </p>
                        <small> <?= $ES['date_fin']?></small>
                                </div>
                        <a class="text-end" href="<?= base_url() . 'ESs/consulte/' .$ES['id_ES'] ?>">Lireplus</a>
                    </div>

                
            </div>

            <?php endforeach; ?>
        </div>
    </div>
</div>
</div>

<style>
#thumnail-project {
    width: 200px;
    height: 200px;
    object-fit: cover;

}
</style>
<?= $this->endSection() ?>