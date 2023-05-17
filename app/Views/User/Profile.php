<?= $this->extend('layouts/Main') ?>

<?= $this->section('pageName') ?> Annuaire <?= $this->endSection() ?>

<?= $this->section('content') ?>

<style>
    #profile-pic{

        height: 200px;
        width: 200px;
        border-radius: 50%;
        margin: 0 auto;
        display: block;

        /*shadow  */
        box-shadow: 0 0 10px 0px rgb(189 189 189 / 50%);


    }
</style>

<?php
//nom prenom tel address password 


?>

<div class="container">
    <div class="row">

        <?= form_open_multipart(base_url() . '/profile/update') ?>
        <img id="profile-pic" class="img-fluid" src="<?php 
            if(session()->get('current_user')['picture'] != null){
                echo session()->get('current_user')['picture'];
            }else{
                echo "https://lh3.googleusercontent.com/a/AATXAJythYcT4oIJTRHBsl6U-wqFwPgMdON6S0Qv4yfv=s96-c";
            }
        ?>" alt="Profile pic" />
            <input type="text" value="<?= session()->get('current_user')['last_name']?>" name="nom" class="form-control col-4" id="nom" placeholder="Nom">
            <input type="text" value="<?= session()->get('current_user')['first_name']?>" name="prenom" class="form-control col-4" id="prenom" placeholder="Prenom">
            <input type="text" value="<?= session()->get('current_user')['telephone']?>" name="tel" class="form-control" id="tel" placeholder="Telephone">
            <input type="text" value="<?= session()->get('current_user')['adresse']?>" name="adresse" class="form-control" id="adresse" placeholder="Adresse">
            <button type="sumbit" class="btn btn-primary" >Save</button>
            </form>
        </div>
    </div>

    <script type="module">
        let imageXS = document.getElementById('profile-pic');
        let form = document.querySelector('form');
        let imageInputX = new imageInput(imageXS,'profile-pic',form);
        console.log(imageInputX);
        //put the input before the submit button
        let submit = document.querySelector('button[type="sumbit"]');
        let input = document.querySelector('input[type="file"]');

        submit.parentNode.insertBefore(input,submit);

    </script>




<?= $this->endSection() ?>