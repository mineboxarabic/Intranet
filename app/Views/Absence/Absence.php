<?= $this->extend('layouts/Main') ?>

<?= $this->section('pageName') ?> Absense <?= $this->endSection() ?>

<?= $this->section('content') ?>

<div class="col-xl-12">
    <div class="card">

        <div class="card-body">
            <h4 class="card-title mb-4">Social Source</h4>
            Recuperation :
            <span style="font-weight:bold;">
                <?=$Recuperation ?>
            </span>
            </br>
            <?='Conge_annuls : '. $Conge_annuls ?>
            </br>
            <?='Compte_epargne_temps : '. $Compte_epargne_temps ?>

        </div>

    </div>
</div>


<form class="form-horizontal form-stripe" method="POST" action="<?= base_url() . 'absence/send'?>">
    <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
    <div class="input-daterange input-group" id="range-datepicker">



        <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
        <div class="card col-12">
            <div class="card-body d-flex ">
                <!--DATE PICKER-->
                <div class="col-xl-4 me-5">
                    <p>Choisissez la date et le moment de la première demi-journée :</p>
                    <div class="panel">
                        <div class="panel-content">
                            <div class="row">
                                <div>

                                    <label for="date1">Date :</label>
                                    <input class="form-control" type="date" id="date1" name="startdate"><br>
                                    <label for="moment1">Moment :</label>
                                    <select id="moment1" name="startdatetype">
                                        <option selected value="matin">Matin</option>
                                        <option value="apres-midi">Après-midi</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->

                <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
                <!--DATE PICKER-->
                <div class="col-xl-4 align-self-end">
                    <p>Choisissez la date et le moment de la deuxième demi-journée :</p>
                    <div class="panel">
                        <div class="panel-content">
                            <div class="row">
                                <div >
                                    <label for="date2">Date :</label>
                                    <input type="date" class="form-control" id="date2" name="enddate"><br>
                                    <label for="moment2">Moment :</label>
                                    <select id="moment2" name="enddatetype">
                                        <option selected value="matin">Matin</option>
                                        <option value="apres-midi">Après-midi</option>
                                    </select><br>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->

            </div>
            <div class="card-footer">
            <div class="col-md-11">
        <div class="panel">
            <div class="panel-content">
                <div class="row">
                    <div class="col-sm-11">

                        <p>Nombre de journées utilisées : <span id="resultat" style="font-style: bold;"></span></p>
                            <input type="text" id="duration" name="duration" hidden>
                        <em>Si le résultat vous parait correct, vous pouvez passer à l'étapes suivante.</em>
                    </div>
                </div>
            </div>
        </div>
    </div>
            </div>
        </div>


    </div>
    


    <!--STRIPE-->
    <div class="card">
        <div class="card-body">
        <div class="col-md-11">
            <div class="panel">
                <div class="panel-content">
                    <div class="row">
                        <em>Merci de calculer le nombre de jours avant de remplir ce formulaire</em>
                        <div class="col-sm-11">
                            <div id="infojours" style="display:none;background-color:#FAC2F0 ;">&nbsp;Durant cette période
                                il y a <strong><span id="result"></span> jour(s)</strong> décompté(s) de vos congés</div>
                            <br>
                            <div class="form-group">
                                <label for="name" class="col-sm-2 control-label">Type d'absence</label>
                                <div class="col-sm-10">
                                    <select class="form-control" style="width: 100%" name="type" id="type"
                                        required>
                                        <option value="">Choisir un type</option>
                                        <option value="13"> Congés annuels</option>
                                        <option value="1"> Recuperation </option>
                                        <option value="15"> Compte épargne temps</option>
                                    </select>
                                </div>
                            </div>


                            <div class="form-group">
                                <div style="clear:both"></div>

                                <label for="name" class="col-sm-2 control-label">Observation</label>
                                <div class="col-sm-10">
                                    <input disabled type="text" class="form-control" id="obs" name="motif" placeholder="Observation">
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                    Merci de bien vérifier le calcul des jours décomptés avant de soumettre votre
                                    demande<br><br>
                                    <button type="submit" class="btn btn-primary" name="action" id="inputValid"
                                        value='valider' disabled>Envoyer</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>

    </div>

    <input type="hidden" name="duration" id="result_input" value="">
</form>




<script>
function calculer() {
    var date1 = new Date(document.getElementById("date1").value);
    var moment1 = document.getElementById("moment1").value;
    var date2 = new Date(document.getElementById("date2").value);
    var moment2 = document.getElementById("moment2").value;

    var demi_journees_utilisees = 0;

    //6 avril matin to 6 avril matin = 0.5
    //6 avril matin to 6 avril apres-midi = 1
    //6 avril matin to 7 avril matin = 1.5
    //6 avril matin to 7 avril apres-midi = 2
    let numberOfDiffDays = (date2.getTime() - date1.getTime()) / (1000 * 3600 * 24);
    if (numberOfDiffDays === 0) {
        if (moment1 === "matin" && moment2 === "matin") {
            demi_journees_utilisees = 0.5;
        } else if (moment1 === "matin" && moment2 === "apres-midi") {
            demi_journees_utilisees = 1;
        } else if (moment1 === "apres-midi" && moment2 === "apres-midi") {
            demi_journees_utilisees = 0.5;
        }
    } else {
        if (moment1 === "matin" && moment2 === "matin") {
            demi_journees_utilisees = numberOfDiffDays + 0.5;
        } else if (moment1 === "matin" && moment2 === "apres-midi") {
            demi_journees_utilisees = numberOfDiffDays + 1;
        } else if (moment1 === "apres-midi" && moment2 === "apres-midi") {
            demi_journees_utilisees = numberOfDiffDays + 0.5;
        }
    }
    document.getElementById("resultat").innerHTML = demi_journees_utilisees;
    document.getElementById("resultat").style.fontWeight = "bold";
    document.getElementById("duration").value = demi_journees_utilisees;
    //document.getElementById("duration").innerHTML = demi_journees_utilisees;
    document.getElementById("result_input").innerHTML = demi_journees_utilisees;
    $("#inputValid").removeAttr("disabled");
    $("#type").removeAttr("disabled");
    $("#obs").removeAttr("disabled");
    $("#result_input").val(demi_journees_utilisees);
}

let dates = document.querySelectorAll('input');
dates.forEach(
    function(date) {
        if(date.id != 'obs')
            date.value = new Date().toISOString().slice(0, 10);

        date.addEventListener('change', function() {
            calculer();
        });

        if(date.id == "date1") {
            date.addEventListener('change', function() {
               if(date.value > document.getElementById("date2").value) {
                   document.getElementById("date2").value = date.value;
               }
            });
        }

    }
)

let select = document.querySelectorAll('select');
select.forEach(
    function(select) {
        select.addEventListener('change', function() {
            calculer();
        });
    }
)
</script>


<?= $this->endSection() ?>