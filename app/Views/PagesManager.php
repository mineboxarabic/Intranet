

<?= $this->extend('layouts/Main') ?>

<?= $this->section('pageName') ?> Annuaire <?= $this->endSection() ?>

<?= $this->section('content') ?>






<?php 

?>




        <head>
                <meta charset="utf-8">
                <title>CKEditor</title>
                <script src="<?= base_url() . 'assets/libs/ckeditor/ckeditor.js'?>"></script>
                <script src="<?= base_url() . 'assets/libs/ckfinder/ckfinder.js'?>"></script>
                
        </head>
        <body>
                <div id="editor">
                        <?= $page['contenu'] ?>
                </div>
                <script>
                        CKEDITOR.replace('editor',{
                                filebrowserBrowseUrl: '/ckfinder/ckfinder.html',
                                filebrowserImageBrowseUrl: '/ckfinder/ckfinder.html?Type=Images',
                                filebrowserUploadUrl: '/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
                                filebrowserImageUploadUrl: '/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
                                filebrowserWindowWidth : '1000',
                                filebrowserWindowHeight : '700'
                        });
                        var editor = CKEDITOR.instances.editor;
                        CKFinder.setupCKEditor(editor);


                        function save(){
                                var data = CKEDITOR.instances.editor.getData();
                                console.log(data);
                                var xhttp = new XMLHttpRequest();
                                xhttp.onreadystatechange = function() {
                                        if (this.readyState == 4 && this.status == 200) {
                                                console.log(this.responseText);
                                        }
                                };
                                xhttp.open("POST", "<?= base_url() . '/pages/M/update/' . $page['id'] ?>", true);
                                xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                                xhttp.send("contenu="+data);
                        }
                </script>
        </body>



        <button class="btn btn-success" onclick="save()">Save</button>

<?= $this->endSection() ?>