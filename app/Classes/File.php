<?php 


class File {
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
        //make link to download the file
        echo "<div class='d-flex justify-content-center'>";
        echo "<a id='Icon' data_id ='".$this->fileId."' href=\"$this->fileLink\">";
        echo "<img class=\"rounded mx-auto d-block\" width='80' src='".base_url('Images/File.png')."' alt=''>";
        echo "<p id='fileName' class='text-center'>".$this->fileName."</p>";
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

#fileName{
    width: 100px;
    overflow: hidden;
    text-overflow: ellipsis;
    white-space: nowrap;
}
</style>