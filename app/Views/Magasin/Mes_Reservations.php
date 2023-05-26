<?= $this->extend('layouts/Main') ?>

<?= $this->section('pageName') ?> Magasin <?= $this->endSection() ?>

<?= $this->section('content') ?>

<!-- id_reservation id_materiel lot id_lot id_user date_debut date_retour -->   

<table id="reservationTable" class="table">
        <thead>
        <th>#</th>
        <th>Materiel</th>
        <th>Date d'emprunt</th>
        <th>Date de retour</th>
        <th>Commande</th>

        </thead>
</table>
<table id="reservationTableLot" class="table">
<thead>
<th>#</th>
        <th>Lot</th>
        <th>Date d'emprunt</th>
        <th>Date de retour</th>
        <th>Commande</th>
</thead>

</table>

<script type="module">
    $('#reservationTable').DataTable({
        ajax:{
                url: '<?= base_url('MagasinC/getReservationsUser/m/'.session()->get('current_user')['id'])?>',
                dataSrc: ''
                
        },
        columns:[
                {data: 'id_reservation'},
                {data: 'id_materiel'},
                {data: 'date_debut'},
                {data: 'date_retour'},
                {data: 'id_reservation',
                        render: function(data, type, row){
                        return '<a href="<?= base_url('MagasinC/annulerReservation')?>/'+data+'" class="btn btn-danger">Annuler</a>';
                        }
                }
                
        ]
    });


    $('#reservationTableLot').DataTable({
        ajax:{
                url: '<?= base_url('MagasinC/getReservationsUser/l/'.session()->get('current_user')['id'])?>',
                
                dataSrc: ''
                
        },
        columns:[
                {data: 'id_reservation'},
                {data: 'id_lot'},
                {data: 'date_debut'},
                {data: 'date_retour'},
                {data: 'id_reservation',
                        render: function(data, type, row){
                        return '<a href="<?= base_url('MagasinC/annulerReservation')?>/'+data+'" class="btn btn-danger">Annuler</a>';
                        }
                }
                
        ]
    });
</script>
<?= $this->endSection() ?>
