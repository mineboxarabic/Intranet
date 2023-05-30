
<?= $this->extend('layouts/Main') ?>

<?= $this->section('pageName') ?><?php echo $page['titre'] ?> <?= $this->endSection() ?>

<?= $this->section('content') ?>
    <?php 
        if(session()->get('current_user')['id'] == 868 || session()->get('current_user')['id'] == 910 || session()->get('current_user')['id'] == 531 || session()->get('current_user')['id'] == 337 || session()->get('current_user')['id'] == 269){
            echo '<a href="' . base_url() . $page['lable'].'/M'. '" class="btn btn-primary">Modifier</a>';
        }
    ?>

    <?php echo $page['contenu'] ?>

    <p>Modifier le <?= $page['updated_at']?></p> 
<?= $this->endSection() ?>