<label for="Select">Catégorie</label>
                                                   <select name="categorie" id="category" class="form-control">
                                                   <option value=""> - Sélectionner une catégorie - </option>
                                                    <option value=""> - Tout voir - </option>
                                                    <option value="">-----</option>
<option value="1">A. Optique</option>
<option value="2">Accessoire</option>
<option value="4">Bague</option>
<option value="5">Boitier</option>
<option value="6">Cellule</option>
<option value="7">Chambre</option>
<option value="8">Eclairage</option>
<option value="9">Eclairage Acc</option>
<option value="10">Lot</option>
<option value="11">Loupe</option>
<option value="12">Memoire</option>
<option value="13">Moyen format</option>
<option value="14">Moyen format Acc</option>
<option value="15">Optique</option>
<option value="16">Pied</option>
<option value="17">Son</option>
<option value="18">Video</option>
<option value="">-----</option>
<option value="19">Moniteur</option>
<option value="20">Lecteur de carte</option>
<option value="21">Sonde</option>
<option value="22">Ordinateur</option>
<option value="23">Tablette</option>
<option value="24">Accessoire info</option>
</select>    




-- Create Table for Categories
CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL
  PRIMARY KEY (`id`)
) ;

-- Dumping data for table `categories`
INSERT INTO `categories` (`id`, `name`) VALUES
(1, 'A. Optique'),
(2, 'Accessoire'),
(3, 'Accessoire info'),
(4, 'Bague'),
(5, 'Boitier'),
(6, 'Cellule'),
(7, 'Chambre'),
(8, 'Eclairage'),
(9, 'Eclairage Acc'),
(10, 'Lot'),
(11, 'Loupe'),
(12, 'Memoire'),
(13, 'Moyen format'),
(14, 'Moyen format Acc'),
(15, 'Optique'),
(16, 'Pied'),
(17, 'Son'),
(18, 'Video'),
(19, 'Moniteur'),
(20, 'Lecteur de carte'),
(21, 'Sonde'),
(22, 'Ordinateur'),
(23, 'Tablette'),
(24, 'Accessoire info');
