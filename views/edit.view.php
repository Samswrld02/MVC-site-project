<h1></h1>
<div class="formContainer">
    <form method="POST" action="<?= URLROOT ?>/update/<?= key_exists("length_in_minutes",$results[0]) ? "movie" : "series"?>/<?= $results[0]['id']?>" class="editForm" >
        <?php foreach ($results[0] as $key => $value) :?>
            <?php if ($key != "id" && $key != "media" && $value != null) : ?>
                <label for= "<?=$key?>"><?=$key?></label>
                <input id ="<?=$key?>" name = "<?=$key?>" value ="<?= htmlspecialchars($value) ?>">
            <?php endif ?>
        <?php endforeach?>
        <button type="submit" id="saveButton">Save</button>
    </form>
</div>


