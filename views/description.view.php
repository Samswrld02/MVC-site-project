
<h1><?=  $descriptionArray[0]["title"] ?></h1>
<a class = "buttonReturn" href="<?= URLROOT?>/home">Terug</a>
<a class = "editButton" href="<?= URLROOT ?>/edit/show/<?= array_key_exists("length_in_minutes", $descriptionArray[0]) ? "movies" : "series"?>/<?=$descriptionArray[0]['id']?>">Edit</a>

<?php require_once "./views/components/descriptionComponents/description.table.php" ?>
    <!-- <?=  var_dump($descriptionArray) ?> -->

<?php require_once "./views/components/descriptionComponents/description.description.php"; ?>


