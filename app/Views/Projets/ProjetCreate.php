<?= $this->extend('layouts/Main') ?>

<?= $this->section('pageName') ?> Creation de Projet <?= $this->endSection() ?>

<?= $this->section('content') ?>



<style>
#thumnail-project{
    height: 250px;
    width: 100%;
    object-fit: cover;
    object-position: center;
    cursor: pointer;

}
#thumnail-project:hover{
    /* make darker */

    filter: brightness(90%);
    transition: 0.5s;
    transform: translate(0px, -5px);
   
}
</style>
<form id="form" method="post" enctype="multipart/form-data" action="<?= base_url() . 'projets/M/add'?>">

    <input name="file_img" type="file" class="form-control" id="file_img" hidden>
    <img id="thumnail-project" class="img-thumnail" src="<?= base_url() . 'Images/Projets/Project_place_holder.png'?>"/>



    <div class="d-flex flex-column justify-content-center">
        <input name="title" type="text" class="form-control" id="title" hidden>
        <h2 class="mb-1 align-self-center">Titre</h2>
        <input name="commanditaire" type="text" class="form-control" id="commanditaire" hidden>
        <h5 class="mb-1 align-self-center">Commanditaire</h5>

        <div class="d-flex flex-row justify-content-center">
            <p id="date_finX"> Date fin :</p>
            <input name="date_fin" type="text" class="form-control"  id="date_fin_input" hidden>
            <p id="date_fin">jj/mm/yy</p>
        </div>
    </div>

    <textarea id="editor" name="editor">

    </textarea>


<div class="d-flex flex-row pt-4 pb-4">
    <input name="pdf_file" id="pdf_file" type="file" hidden>
    <button type="button" id="upload_pdf" class="btn btn-primary">Télécharger un document</button>
</div>





<button id="btn-save" class="btn btn-primary" type="submit" >Cree Projet </button>
</form>
<script src="https://cdn.ckeditor.com/ckeditor5/37.1.0/classic/ckeditor.js"></script>
<script defer type="module">

    //on double click on the title text field, it will be replaced by a text area
    //on double click on the commanditaire text field, it will be replaced by a text area

    let saveButton = document.querySelector('#btn-save');
    let title = document.querySelector('h2');
    let commanditaire = document.querySelector('h5');
    let dateFin = document.getElementById('date_fin');

    let inputTitle = document.querySelector('#title');
    let inputCommanditaire = document.querySelector('#commanditaire');
    let inputDateFin = document.querySelector('#date_fin_input');



    let editor = document.querySelector('#editor');
    
  

    // _The events 


        //_ on Double CLick on the title, commanditaire, date_fin
            title.addEventListener('dblclick', function(e){
                let input = document.querySelector('#title');
                input.hidden = false;
                input.value = title.textContent;
                title.hidden = true;

                input.focus();


            });

            commanditaire.addEventListener('dblclick', function(e){
                let input = document.querySelector('#commanditaire');
                input.hidden = false;
                input.value = commanditaire.textContent;
                commanditaire.hidden = true;
                input.focus();

            });

            dateFin.addEventListener('dblclick', function(e){
                let input = document.querySelector('#date_fin_input');
                input.hidden = false;
                input.value = dateFin.textContent;
                dateFin.hidden = true;
                input.focus();
            });
        //_ 




        //_ Events for the input Title
            inputTitle.addEventListener('keyup', function(e){
                //mouse key


                if(e.keyCode === 13 || e.keyCode === 27){
                    let title = document.querySelector('h2');
                    title.textContent = inputTitle.value;
                    
                    inputTitle.hidden = true;
                    title.hidden = false;
                    console.log(inputTitle.value);

                }

            });

            //on focus out
            inputTitle.addEventListener('focusout', function(e){
                let title = document.querySelector('h2');
                title.textContent = inputTitle.value;
                inputTitle.hidden = true;
                title.hidden = false;
                console.log(inputTitle.value);


            });
        //_



        //_ Events for the input Commanditaire
            inputCommanditaire.addEventListener('keyup', function(e){
                if(e.keyCode === 13 || e.keyCode === 27){
                    let commanditaire = document.querySelector('h5');
                    commanditaire.textContent = inputCommanditaire.value;
                    inputCommanditaire.hidden = true;
                    commanditaire.hidden = false;

                }
            });

            inputCommanditaire.addEventListener('focusout', function(e){
                let commanditaire = document.querySelector('h5');
                    commanditaire.textContent = inputCommanditaire.value;
                    inputCommanditaire.hidden = true;
                    commanditaire.hidden = false;

            });

        //_


        //_ Events for the input Date Fin
            inputDateFin.addEventListener('keyup', function(e){
                if(e.keyCode === 13 || e.keyCode === 27){
                    let dateFin = document.querySelector('#date_fin');
                    dateFin.textContent = inputDateFin.value;
                    inputDateFin.hidden = true;
                    dateFin.hidden = false;

                }
            });
            inputDateFin.addEventListener('focusout', function(e){
                let dateFin = document.querySelector('#date_fin');
                    dateFin.textContent = inputDateFin.value;
                    inputDateFin.hidden = true;
                    dateFin.hidden = false;

            });
        //_


        //_ Events for the input Tumnail
            let thumnail = document.querySelector('#thumnail-project');
            let inputThumnail = document.querySelector('#file_img');
            thumnail.addEventListener('click', function(e){
                inputThumnail.click();
            });

            inputThumnail.addEventListener('change', function(e){
                let file = inputThumnail.files[0];
                let reader = new FileReader();
                reader.readAsDataURL(file);
                reader.onload = function(e){
                    thumnail.src = e.target.result;
                }

            });
        //_


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
            });
        //_ 


    // _The events


    ClassicEditor
        .create( document.querySelector( '#editor' ) )
        .then( newEditor => {
            newEditor.model.document.on( 'change:data', () => {

            } );
        } )
        .catch( error => {
            console.error( error );
        } );


</script>

<?= $this->endSection() ?>