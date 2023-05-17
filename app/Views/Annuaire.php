<?= $this->extend('layouts/Main') ?>

<?= $this->section('pageName') ?> Annuaire <?= $this->endSection() ?>

<?= $this->section('content') ?>

<table class="hover table table-striped " id="annuaire-table">
    <thead>
        <tr>
            <th>idx</th>
            <th>Nom</th>
            <th>Prénom</th>
            <th>Email</th>
            <th>Téléphone</th>
            <th>Fonction</th>
            <th>Rang</th>
        </tr>
    </thead>
    <tbody>
    </tbody>
</table>

<script type="module">
    $(document).ready(function() {
        $('#annuaire-table').DataTable({
            "ajax": {
                "url": "<?= base_url() . '/annuaire/getAnnuaire' ?>",
                "dataSrc": ""
            },
            "columns": [
                { "data": "idx" },
                { "data": "nom" },
                { "data": "prenom" },
                { "data": "email" },
                { "data": "tel" },
                { "data": "fonction" },
                { "data": "rang" }
            ],
            "columnDefs": [
                {
                    "targets": [ -1 ],
                    render:function (data, type, row) {
                        let word = data == 0 ? 'Etudiant' : 'Personnel';
                        return word;
                    }
                }
            ],
        });
    });
</script>

<?= $this->endSection() ?>
