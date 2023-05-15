

<?= $this->extend('layouts/Main') ?>

<?= $this->section('pageName') ?> Annuaire <?= $this->endSection() ?>

<?= $this->section('content') ?>






<?php 

print_r('test')

?>




        <head>
                <meta charset="utf-8">
                <title>CKEditor</title>
                <script src="https://cdn.ckeditor.com/ckeditor5/37.1.0/classic/ckeditor.js"></script>
        </head>
        <body>
                <div id="editor">This is some sample content.</div>
                <script>
                        ClassicEditor
                                .create( document.querySelector( '#editor' ) )
                                .then( editor => {
                                        console.log( editor );
                                } )
                                .catch( error => {
                                        console.error( error );
                                } );
                </script>
        </body>



        <button class="btn btn-success" onclick="save()">Save</button>

<?= $this->endSection() ?>