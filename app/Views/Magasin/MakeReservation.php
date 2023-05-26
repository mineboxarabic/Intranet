<?= $this->extend('layouts/Main') ?>

<?= $this->section('pageName') ?> Réservation de matériel <?= $this->endSection() ?>

<?= $this->section('content') ?>
<link rel="stylesheet" href="<?= base_url()?>assets/libs/dist-pg-calender/css/pignose.calendar.css">

<div class="card">
    <h4 class="p-2">Réservation de matériel</h4>
    <hr>
    <div class="card-body d-flex">
    <div class="d-flex flex-column flex-grow-1 col-4 ">
        <div class="calendar mb-3"></div>

        <button id="btn-validate-reservation" class="btn btn-success" disabled>Valider la reservation</button>
    </div>
    <div class="d-flex flex-column flex-grow-1 ">
        <table id="reservationTable" class="table hover">
            <thead>
                <tr>

                    <th>#</th>
                    <th>Utilisateur</th>
                    <th>Date debut</th>
                    <th>Date retour</th>

                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>
    </div>
</div>




<script defer src="<?= base_url()?>assets/libs/dist-pg-calender/js/pignose.calendar.js"></script>
<script defer src="<?= base_url()?>assets/libs/dist-pg-calender/js/pignose.calendar.full.js"></script>



<script defer type="module">
    let date1 = moment().format('YYYY-MM-DD');
    let date2 = moment().add(1, 'days').format('YYYY-MM-DD');




    let datesToDisable = <?php
        if( count($reservations) != 0 ){
            echo '[';
            foreach($reservations as $reservation){
                echo '["'.$reservation['date_debut'].'", "'.$reservation['date_retour'].'"],';
            }
            echo '];';
    
        }
        else{
            echo '[];';
        }
        

    ?>
    $(function() {
        $('.calendar').pignoseCalendar({
            multiple: true,
            //disable past dates
            minDate: moment().format('YYYY-MM-DD'),
            disabledRanges: datesToDisable,


            select: function(date, context) {
                if(date.length == 2){
                    date1 = moment(date[0]).format('YYYY-MM-DD');
                    date2 = moment(date[1]).format('YYYY-MM-DD');

                    $('#btn-validate-reservation').removeAttr('disabled');
                    //console.log('Both dates are selected');
                }
                else{
                    date1 = moment(date[0]).format('YYYY-MM-DD');
                    date2 = moment(date[0]).format('YYYY-MM-DD');
                }
                
            },
        });
    });

$('#btn-validate-reservation').on('click', function(){


    console.log(<?= $materiel['id_materiel'] ?>);
    $.ajax({
        url: "<?= base_url('/magasin/createReservation') ?>",
        type: "POST",
        dataType: "json",
        data: {
            'date1': date1,
            'date2': date2,
            'id': <?= $materiel['id_materiel'] ?>
        },
        success: function(data) {
            console.log(data.responseText);
            //reload the page
            location.reload();
        },
        error: function(data) {
            console.log(data);
            location.reload();

        }
    })


})


$('#reservationTable').DataTable({
    ajax:{
        url: "<?= base_url('magasin/getReservations/').$materiel['id_materiel'] ?>",
        type: "post",
        dataSrc: ''
    },
    columns: [
        { data: 'id_reservation' },
        { data: 'user' },
        { data: 'date_debut' },
        { data: 'date_retour' }
    ]

});





</script>

<?= $this->endSection() ?>
