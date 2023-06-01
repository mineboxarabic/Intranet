<?php 


class Folder {
    private $file;
    private $fileId;
    private $fileType;
    private $fileName;
    private $fileSize;
    private $fileTmp;
    private $fileLink;


    public function __construct($file){
        $this->file = $file;
        $this->fileId = $file->getId();
        $this->fileType = $file->getMimeType();
        $this->fileName = $file->getName();
        $this->fileSize = $file->getSize();
        $this->fileLink = $file->getWebViewLink();


    }
    public function showFile(){
        echo "<div class='d-flex justify-content-center'>";
        echo "<a  id=\"Icon\" href='".base_url('/showFolder/'.$this->fileId)."'>";
        echo "<img class=\"rounded mx-auto d-block\" width='80' src='".base_url('Images/Folder.png')."' alt=''>";
        echo "<p class='text-center'>".$this->fileName."</p>";
        echo "</a>";
        echo "</div>";
    }
}


?>

<style>
#Icon{
    color: black;
    text-decoration: none;
    width: 100px;
    transition: 0.2s;
}
#Icon:hover{
    color: black;
    text-decoration: none;
    background-color: #e6e6e6;
    
}
</style>