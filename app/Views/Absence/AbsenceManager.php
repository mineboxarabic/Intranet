<?= $this->extend('layouts/Main') ?>

<?= $this->section('pageName') ?> Absense <?= $this->endSection() ?>

<?= $this->section('content') ?>



<div class="container">
    <div class="card">
        <h1>Demandes de validation</h1>
        <div class="card-body">
            <h3>Vos collaborateurs:</h3>
                <?php 
                    foreach($users as $user){
                        echo $user['firstname'].' ' . $user['lastname'].'<br>';
                    }
                ?>
            <hr>
            <h3>Nouvelles  demandes:</h3>
            <table  class="table">
                <tr class="table-light">
                    <th>Collaborateur</th>
                    <th>Date de debut</th>
                    <th>Date de fin</th>
                    <th>Duree</th>
                    <th>Type</th>
                    <th>Observation</th>
                    <th>Statut</th>
                    <th>Actions</th>
                </tr>
                <tr>
                    <?php 
                     
                      
                           foreach($users as $user){
                                foreach($leaves[$user['id']] as $leave){
                                  
                                        echo '<tr>';
                                        echo '<td>'.$user['firstname'].' '.$user['lastname'].'</td>';
                                        echo '<td>'.$leave['startdate'].'</td>';
                                        echo '<td>'.$leave['enddate'].'</td>';
                                        echo '<td>'.$leave['duration'].'</td>';
                                        echo '<td>'.$leave['type'].'</td>';
                                        echo '<td>'.$leave['cause'].'</td>';
                                        echo '<td>'.$leave['status'].'</td>';
                                        echo '<td>';
                                        echo '<button type="button" data-id="'.$leave['id'].'" id="btn-valider" class="btn btn-success me-1">Valider</button>';
                                        echo '<button type="button" data-id="'.$leave['id'].'" id="btn-refuse" class="btn btn-danger" ms-1>Refuser</button>';
                                        echo '</td>';
                                        echo '</tr>';
                                    
                                }
                           }
                        
                    ?>

                </tr>
            </table>
        </div>
    </div>

    <div class="card">
    <h1>Hitorique des demandes</h1>
    <hr>
        <div class="card-body">
            <textarea readonly name="uu" id="history" cols="150" rows="10"><?php 
                    foreach($history as $hist){
                        echo '#'.$hist['id'] . ') ';
                        echo $userHist['firstname'].' '.$userHist['lastname'].' du '.$hist['startdate'].' au '.$hist['enddate'].' de duration '.$hist['duration'];
                        $stat = $hist['status'] == 3 ? ' Validé' : ' Refusé';
                        echo ':'.$stat  ;
                        echo "\n";
                    }
                ?>
            </textarea>
        </div>
        
    </div>

</div>

<script type="module">
    $(document).ready(function() {
        $('#btn-valider').click(function(){
            let id = $(this).data('id');
            $.ajax({
                url: '<?= base_url('absence/accept') ?>',
                type: 'POST',
                data: {
                    id: id
                },
                success: function(data) {
                    //alert(id);
                    console.log(data);
                    //refresh the page
                    location.reload();
                },
                error: function(data) {
                    //console the error 
                    console.log(data.responseText);
                }

            })
            
        })



        $('#btn-refuse').click(function(){
            let id = $(this).data('id');
            $.ajax({
                url: '<?= base_url('absence/refuse') ?>',
                type: 'POST',
                data: {
                    id: id
                },
                success: function(data) {
                    //alert(id);
                    console.log(data);
                    //refresh the page
                    location.reload();
                },
                error: function(data) {
                    //console the error 
                    console.log(data.responseText);
                }

            })
            
        })
    }
    );  
</script>


<?= $this->endSection() ?>