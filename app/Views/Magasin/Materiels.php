<?= $this->extend('layouts/Main') ?>

<?= $this->section('pageName') ?> Magasin <?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="card">
    <div class="card-body">
    <select name="category" id="category" class="form-control">
        <option value=""> - Sélectionner une catégorie - </option>
        <option value=""> - Tout voir - </option>
        <option value="">-----</option>
        <option value="1" selected>A. Optique</option>
        <option value="2">Accessoire</option>
        <option value="4">Bague</option>
        <option value="5">Boitier</option>
        <option value="6">Cellule</option>
        <option value="7">Chambre</option>
        <option value="8">Eclairage</option>
        <option value="9">Eclairage Acc</option>
        <option value="10">Lot</option>
        <option value="11">Loupe</option>
        <option value="12">Memoire</option>
        <option value="13">Moyen format</option>
        <option value="14">Moyen format Acc</option>
        <option value="15">Optique</option>
        <option value="16">Pied</option>
        <option value="17">Son</option>
        <option value="18">Video</option>
        <option value="">-----</option>
        <option value="19">Moniteur</option>
        <option value="20">Lecteur de carte</option>
        <option value="21">Sonde</option>
        <option value="22">Ordinateur</option>
        <option value="23">Tablette</option>
        <option value="24">Accessoire info</option>
    </select>
    
    



    </div>

<div class="card">
    <div class="card-body">
    <table id="materielsTable">
        <thead>
        <th>#</th>
        <th>Materiel</th>
        <th>No de serie</th>
        <th>Dispo</th>
        <th>Retour prevu le</th>

        </thead>


        <tbody>

        </tbody>
    </table>

    </div>
</div>
</div>
   
<script type="module">
    $(document).ready(function() {

    });


    let table = $('#materielsTable').DataTable(
        {
            'processing': true,
            
        }
    );

    $('#category').on('change',function(){
        let value = parseInt($('#category').val());
        table.clear().draw();

        $.ajax({
            url: "<?php echo base_url('magasin/materiels/getMateriels') ?>",
            type: "POST",
            data: {category: value},
            success: function(data){
                console.log(data);
                let datax = JSON.parse(data);
                $.each(datax, function(key, value){
                    table.row.add([
                        value.id_materiel,
                        value.categorie,
                        value.designation,
                        value.designation,
                        value.designation
                    ]).draw(false);
                })
                //enable data processing on table
            }


        })
    })







    
        
</script>
<?= $this->endSection() ?>
