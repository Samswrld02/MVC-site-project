<table>
    <tr>
        <th>Title</th>
        <th><?= array_key_exists("length_in_minutes", $descriptionArray[0]) ? "Duur" : "Rating"  ?></th>
    </tr>
    <?php foreach ($descriptionArray[0] as $key => $value) :?>
        <?php if ($key != "omschrijving" && $key != "id") :?>
            <tr>
                <td><?= $key ?></th>
                <td><?= $value ?></td>
            </tr>
            <?php endif ?>
    <?php endforeach ?>



</table>
