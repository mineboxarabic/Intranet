

<?= $this->extend('layouts/Main') ?>

<?= $this->section('pageName') ?> Dashboard <?= $this->endSection() ?>

<?= $this->section('content') ?>



<h1>
<!-- show the userType from the session -->
	<?php echo session()->get('userType'); ?>

</h1>

<p>
<?php  var_dump(session()->get('loggedUser')); ?>
</p>



<meta name="viewport" content="width=device-width, initial-scale=1">

    
    <div class="dropdown">
	  <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
		Dropdown button
	  </button>
	  <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
		<li><a class="dropdown-item" href="#">Action</a></li>
		<li><a class="dropdown-item" href="#">Another action</a></li>
		<li><a class="dropdown-item" href="#">Something else here</a></li>
	  </ul>
	</div>
	
<?= $this->endSection() ?>