<?= $this->extend('layouts/Main') ?>

<?= $this->section('pageName') ?> Magasin <?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="card p-5">
<h1>Disponibilité du matériel</h1>
    <hr>

    <p>Horaires d'ouverture du magasin de prêt :</p>
    <div class="d-flex" >
        <div>
            <h3>EMPRUNTS:</h3>
            <p>Mercredi et jeudi de 16h00 à 18h00
            (en semaines d'emprunts)</p>

        </div>

        <div>
            <h3>RESTITUTIONS:</h3>
            <p>Mercredi et jeudi de 16h00 à 18h00
            (en semaines d'emprunts)</p>
        </div>
    </div>



<div class="card">
   
    <div class="card-body">
    <table id="LotsTable" class="table stripe hover">
        <thead>
            <!-- id_lot nom_lot lot_obs lot_acc degat manquant lot_cat dispo num_projet -->
        <th>#</th>
        <th>designation du lot</th>
        <th></th>
        <th></th>


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


    $('#LotsTable').DataTable(
        {
            'ajax': {
                'url': '<?= base_url('magasin/Lots/getLots')?>',
                'type': 'POST',
                'dataSrc': ''
            },
            'columns': [
                { 'data': 'id_lot' },
                { 'data': 'nom_lot' }
            ],
            'processing': true,
            "columnDefs":[
                {
                    "targets": [1],
                    "render": function(data, type, row, meta){
                        console.log(row['id_lot']);
                        return '<a href="<?= base_url()?>magasin/makeReservationLots/'+row['id_lot']+'">'+data+'</a>';
                    }
                }
            ]
            
        }
    );








    
        
</script>
<?= $this->endSection() ?>
