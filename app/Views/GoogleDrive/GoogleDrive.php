
<?= $this->extend('layouts/Main') ?>

<?= $this->section('pageName') ?> Google Drive<?= $this->endSection() ?>

<?= $this->section('content') ?>


<?php 

foreach($filesFromDrive as $file):?>

    <!--/*echo "File Name: " . $file->getName() . "<br>";
    echo "File ID: " . $file->getId() . "<br>";
    echo "File Type: " . $file->getMimeType() . "<br>";
    echo "------------------------<br>";*/



    /*
    1) To get the type of the file, you can use the getMimeType() method.
    if its a file the type will be something like this: application/vnd.google-apps.document
    if its a folder the type will be something like this: application/vnd.google-apps.folder

    2) To get the name of the file, you can use the getName() method.

    3) To get the id of the file, you can use the getId() method.

    4) To get the size of the file, you can use the getSize() method.

    5) To get the date of the file, you can use the getCreatedTime() method.

    6) To get the date of the file, you can use the getModifiedTime() method.

    7) To get the date of the file, you can use the getModifiedByMeTime() method.

     */-->
     <?php 
     
       print_r($file->getMimeType() );
       echo "<br>";
     ?>

  <?php if($file->getMimeType() == "application/vnd.google-apps.folder"){
    /*
    <a>
            <img src="<?base_url('Images/Folder.png')?>" alt="">
            <p><?= $file->getName() ?></p>

        </a>
    */
    $folderId = $file->getId();
    echo "<a href='".base_url('/showFolder/'.$folderId)."'>";
    echo "<img width=\"50\" src='".base_url('Images/Folder.png')."' alt=''>";
    echo "<p>".$file->getName()."</p>";
    echo "</a>";
  }
    
    
    
    
    ?>

<?php endforeach; ?>
  





<?= $this->endSection() ?>