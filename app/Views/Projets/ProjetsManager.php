<link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.css" />
<script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script> 
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<style>
    i{
        font-size: 1.5rem;
    }
</style>

<!--//TODO:Make the name prject clicable  -->
<!--//TODO:Add add button -->
<a class="btn btn-success" type="button" href="<?= base_url() . 'projets/M/create' ?>" >
  Ajouter un projet
</a>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Sur ?</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Etes vous sur de vouloir supprimer ce projet ?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-success" data-bs-dismiss="modal">Non</button>
        <a id="delete-btn" type="button" class="btn btn-danger">Oui</a>
      </div>
    </div>
  </div>
</div>


<table id="table" border="1px">
    <thead>
        <tr>
            <th>id_projet</th>
            <th>nom_projet</th>
            <th>commanditaire</th>
            <th>date_fin</th>
            <th>actions</th>
        </tr>
    </thead>
</table>
<script type='module'>

let data = <?= json_encode($Projets) ?>;
let globalId;
data.shift();
    $(document).ready(function() {
        $('#table').DataTable( {
            data: data,
            columns: [
                { data: "id_projet" },
                { data: "nom_projet" },
                { data: "commanditaire" },
                { data: "date_fin." },
                { data: "actions" }
            ],
            "columnDefs": [
              {
                "targets": 1,
                "data": "nom_projet",
                "render": function ( data, type, row, meta ) {
                    //row id_projet to int 
                    let id = parseInt(row.id_projet);
                    return `<a href="<?= base_url() ?>projets/M/consulte/${id}">${data}</a>`;
                }
                
              },
                {
                    "targets": 4,
                    "data": "actions",
                    "render": function ( data, type, row, meta ) {
                        //row id_projet to int 
                        let id = parseInt(row.id_projet);
                        $('#delete-btn').attr('href',`<?= base_url() ?>projets/M/delete/${id}`);


                        return `
                        <div>
                            <a href="<?= base_url() ?>projets/M/consulte/${id}"><i class="fa-solid fa-square-pen" style="color: #ffdd00;"></i></a>
                            <a href="#" id="btn-delete"data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fa-solid fa-trash" style="color: #ff0000;"></i></a>
                        </div>
                        
                        `;
                    }
                }
            ]

            } );
    } );
//href="<?= base_url() ?>projets/M/delete/${id}"
    $('btn-delete').on('click',function(){
        console.log('click');
    })
</script>