<?php 


class File {
    private $file;
    private $fileId;
    private $fileType;
    private $fileName;
    private $fileSize;
    private $fileTmp;


    public function __construct($file){
        $this->file = $file;
        $this->fileId = $file->getId();
        $this->fileType = $file->getMimeType();
        $this->fileName = $file->getName();
        $this->fileSize = $file->getSize();


    }
    public function showFile(){

        echo "<div class='d-flex justify-content-center'>";
        echo "<a id='fileID' data_id ='".$this->fileId."'>";
        echo "<img width='80' src='".base_url('Images/File.png')."' alt=''>";
        echo "<p class='text-center'>".$this->fileName."</p>";
        echo "</a>";
        echo "</div>";

    }
}


?>
<script type="module">
let modal = `
<div class="modal fade show" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-modal="true" style="display: none;">
      <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                  <p>The id of the file clicked</p>

     
              </div>
              <div class="modal-footer">
                  <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                  <button type="button" class="btn btn-primary">Understood</button>
              </div>
          </div>
      </div>
    </div>
`;


let allFile = document.querySelectorAll('#fileID');
allFile.forEach(function(file){
    file.addEventListener('click', function(e){
        e.preventDefault();
        var data_id = $(this).attr('data_id');
        document.body.innerHTML += modal;
        $('#staticBackdrop').modal('show');
        //show in the modal the data_id
        let iframe = document.createElement('iframe');
        iframe.src = "https://drive.google.com/file/d/"+data_id+"/preview";
        iframe.width = "640";
        iframe.height = "480";
        document.querySelector('.modal-body').appendChild(iframe);  


      });
});

</script>