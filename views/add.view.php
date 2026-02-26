<h1></h1>
<div class="formContainer">
    <form method="POST" action="<?= URLROOT ?>/add" class ="editForm">
        <?php foreach ($results[0] as $key => $value) :?>
            <?php if ($key != "id") : ?>
                <?php if ($key == "media") : ?>
                    <select name="media" id="media">
                        <option value="movie">movie</option>
                        <option value="series">series</option>
                    </select>
                    <?php else :?>
                        <label for= "<?=$key?>"><?=$key?></label>
                        <input id ="<?=$key?>" name = "<?=$key?>">
                    <?php endif ?>
            <?php endif ?>
        <?php endforeach?>
        <button type="submit" id="saveButton">Save</button>
    </form>
</div>
