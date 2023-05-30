<?= $this->extend('layouts/Main') ?>
//TODO: Change the page name
<?= $this->section('pageName') ?> ES Details <?= $this->endSection() ?>

<?= $this->section('content') ?>

<style>
#file_image{
    height: 250px;
    width: 100%;
    object-fit: cover;
    object-position: center;
    cursor: pointer;

}
#file_image{
    /* make darker */

    filter: brightness(90%);
    transition: 0.5s;
    transform: translate(0px, -5px);
   
}
</style>

<form id="form" method="POST" enctype="multipart/form-data">
        
        <img id="file_image" class="img-thumnail" src="<?php
            $img = $ES['file_img'];
            if (file_exists('Images/ESs/'. $img)) {
                echo base_url() .'Images/ESs/'.$img;
            } else
                echo base_url() . 'Images/ESs/Project_place_holder.png'?>
                "/>



    <div class="d-flex flex-column justify-content-center">

        <h2 class="mb-1 align-self-center" id="title"><?= $ES['nom_ES']?></h2>


        <h5 class="mb-1 align-self-center" id="commanditaire"><?= $ES['commanditaire']?></h5>

        <div class="d-flex flex-row justify-content-center">
            <p class="text-start" id="date_finX"> Date fin :</p>

            <p class="text-start" id="date_fin"> <?= $ES['date_fin']?></p>
        </div>
    </div>

    <textarea name="editor" id="editor">
    <?= $ES['descriptif']?>
    </textarea>


    <div class="d-flex flex-row pt-4 pb-4">
        <input name='pdf_file' id="pdf_file" type="file" hidden>
        <button type="button" id="upload_pdf" class="btn btn-primary">Télécharger un document</button>
    </div>




    <button id="btn-save" class="btn btn-primary" type="sumbit" >Save</button>
</form>
<script src="https://cdn.ckeditor.com/ckeditor5/37.1.0/classic/ckeditor.js"></script>
<script type="module" src="https://cdnjs.cloudflare.com/ajax/libs/notify/0.4.2/notify.min.js" integrity="sha512-efUTj3HdSPwWJ9gjfGR71X9cvsrthIA78/Fvd/IN+fttQVy7XWkOAXb295j8B3cmm/kFKVxjiNYzKw9IQJHIuQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script defer type="module">

    //on double click on the title text field, it will be replaced by a text area
    //on double click on the commanditaire text field, it will be replaced by a text area

    let Title = new EditableText(document.querySelector('#title'));
        let Commanditaire = new EditableText(document.querySelector('#commanditaire'));
        let DateFin = new EditableText(document.querySelector('#date_fin'));
        let image = new ClickAbleImage(document.querySelector('#file_image'));


    let isEdited = true;
    let saveButton = document.querySelector('#btn-save');


    let editor = document.querySelector('#editor');
    

//_ On click on the upload Button 
    $('#upload_pdf').click(function(e){
                        $('#pdf_file').click();
                    });

                    $('#pdf_file').change(function(e){
                        let file = e.target.files[0];
                        let reader = new FileReader();
                        reader.readAsDataURL(file);
                        reader.onload = function(e){
                            $('#upload_pdf').text(file.name);
                        }

                        isEdited = true;
                        saveButton.disabled = false;

                    });

                    if("<?= $ES['file'] ?>" == ""){
                        console.log("empty");
                    }else{
                        $('#upload_pdf').text("<?= $ES['file'] ?>");
                    }
                //_ 


    ClassicEditor
        .create( document.querySelector( '#editor' ) )
        .then( newEditor => {
            newEditor.model.document.on( 'change:data', () => {
                isEdited = false;
                saveButton.disabled = isEdited;
                let text = newEditor.getData();
                editor.innerHTML = '';

                let html = $.parseHTML(text);

                html.forEach(element=>{
                    editor.appendChild(element);
                })

                console.log(newEditor.getData());
            } );
        } )
        .catch( error => {
            console.error( error );
        } );

//_


$('#form').on('submit',function(e){
    e.preventDefault();
    $.ajax({
        url: "<?= base_url() . 'ESs/M/update/'.$ES['id_ES']?>",
        type: 'POST',
        data: new FormData(this),
        contentType: false,
        cache: false,
        processData:false,
        success: function(data){
            console.log(data);
            if(data == "success"){
                isEdited = false;
                saveButton.disabled = isEdited;
                //alert("ES modifié avec succès");

                $.notify("ES modifié avec succès", "success");



                location.reload();

            }else{
               // alert("Erreur lors de la modification du ES");
            console.log(data);
                $.notify("Erreur lors de la modification du ES", "error");


            }
        },
        error: function(data){
            console.log(data);
            //alert("Erreur lors de la modification du ES");
            $.notify(data.responseText, "error");
        }
    });
})


</script>

<?= $this->endSection() ?>