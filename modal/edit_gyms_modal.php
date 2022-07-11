<?php

echo "
    <form action='./actions/gyms.php' method='POST'>
    ";

echo "<div class='text-center mt-3'>";

if ( $row['team'] == "4") { 
        echo '<div class="h5 mb-0 mt-2 font-weight-bold text-gray-800 text-center">';
        echo '<font style="font-size:32px;">'.i8ln("ALL").'</font>';
        echo '</div>';
}
else
{

	echo "<img width=100 src='$uicons_gym/gym/" . $row['team'] . ".png?'><br>";
        echo "<center><font size=5>".i8ln(get_gym_name($row['team']))."</font></center>";
}
echo "</div>";

?>

<div class="modal-body">

    <?php
    if ( !is_null($row['gym_id']) ) {
	    echo '<span class="badge badge-pill badge-light w-100 mb-2" style="border: 1px solid grey;  border-radius: 10px;">';
	    echo '<img class="m-2" style="border-radius: 50%" height=80 loading=lazy src="'.get_gym_url($row['gym_id']).'"><br>';
	    echo get_gym_by_id($row['gym_id']);
	    echo '</span>';
    }
    ?>


    <input type='hidden' id='type' name='type' value='gyms'>
    <input type='hidden' id='uid' name='uid' value='<?php echo $row['uid']; ?>'>

    <?php include "./include/edit_area_distance.php"; ?>

    <hr>
    <?php if (strpos($_SESSION['type'], ':user') === false) {  ?>
    <div class="btn-group btn-group-toggle" data-toggle="buttons">
        <div class="input-group">
            <div class="input-group-prepend">
                <div class="input-group-text"><?php echo i8ln("Role to ping"); ?></div>
            </div>
            <input type='text' id='content_edit' name='content' size=50 class="form-control" maxlength="255" value="<?php echo $row['ping'] ?>">
        </div>
    </div>
    <hr>
    <?php } else { ?>
    <input type="hidden" id='content_edit' name='content' value=''>
    <?php } ?>
    <div class="btn-group btn-group-toggle" data-toggle="buttons">
        <div class="input-group">
            <div class="input-group-prepend">
		<div class="input-group-text"><?php echo i8ln("Clean"); ?></div>
            </div>
        </div>
        <?php
                if ($row['clean'] == 0) {
                        $checked0 = 'checked';
                } else {
                        $checked0 = '';
                }
                if ($row['clean'] == 1) {
                        $checked1 = 'checked';
                } else {
                        $checked1 = '';
                }
                ?>
        <label class="btn btn-secondary">
	    <input type="radio" name="clean" id="clean_0" value="clean_0" <?php echo $checked0; ?>> <?php echo i8ln("No"); ?>
        </label>
        <label class="btn btn-secondary">
	    <input type="radio" name="clean" id="clean_1" value="clean_1" <?php echo $checked1; ?>> <?php echo i8ln("Yes"); ?>
        </label>
    </div>

    <div class="btn-group btn-group-toggle mt-1" data-toggle="buttons">
        <div class="input-group">
            <div class="input-group-prepend">
                <div class="input-group-text"><?php echo i8ln("Alert on Slots Available"); ?></div>
            </div>
        </div>
        <?php
                if ($row['slot_changes'] == 0) {
                        $checked0 = 'checked';
                } else {
                        $checked0 = '';
                }
                if ($row['slot_changes'] == 1) {
                        $checked1 = 'checked';
                } else {
                        $checked1 = '';
                }
                ?>
        <label class="btn btn-secondary">
            <input type="radio" name="slots" id="slot_0" value="slot_0" <?php echo $checked0; ?>> <?php echo i8ln("No"); ?>
        </label>
        <label class="btn btn-secondary">
            <input type="radio" name="slots" id="slot_1" value="slot_1" <?php echo $checked1; ?>> <?php echo i8ln("Yes"); ?>
        </label>
    </div>

    <div class="btn-group btn-group-toggle mt-1" data-toggle="buttons">
        <div class="input-group">
            <div class="input-group-prepend">
                <div class="input-group-text"><?php echo i8ln("Alert on Battle Changes"); ?></div>
            </div>
        </div>
        <?php
                if ($row['battle_changes'] == 0) {
                        $checked0 = 'checked';
                } else {
                        $checked0 = '';
                }
                if ($row['battle_changes'] == 1) {
                        $checked1 = 'checked';
                } else {
                        $checked1 = '';
                }
                ?>
        <label class="btn btn-secondary">
            <input type="radio" name="battles" id="battle_0" value="battle_0" <?php echo $checked0; ?>> <?php echo i8ln("No"); ?>
        </label>
        <label class="btn btn-secondary">
            <input type="radio" name="battles" id="battle_1" value="battle_1" <?php echo $checked1; ?>> <?php echo i8ln("Yes"); ?>
        </label>
    </div>

    <hr>
    <?php if ( $enable_templates == "True" && count($templates_list) > 1 ) {
        echo '<div class="form-row align-items-center">
            <div class="col-sm-12 my-1">
                <div class="btn-group btn-group-toggle" data-toggle="buttons">
                    <div class="input-group-justify">
                        <div class="input-group mb-1">
                            <div class="input-group-text">Template</div>
                            </div>
                        </div>';
                        foreach ( $templates_list as $key => $name ) {
                            echo '<label class="btn btn-secondary mb-1 mr-1">';
                            echo '<input type="radio" name="template" id="' . $name . '" value="' . $name . '" ' . (($name == $row['template']) ? 'checked' : '') . '>';
                            echo $name . '</label>';
                        }
                echo '</div>
            </div>
        </div>';
     } ?>
</div>
<div class="modal-footer">
    <!--
    <button class="btn btn-danger" type="submit" name='delete' value='Delete'>
        <span class="icon text-white-50">
            <i class="fas fa-trash"></i>
        </span>
    </button>
    -->
    <input class="btn btn-primary" type='submit' name='update' value='<?php echo i8ln("Update"); ?>'>
    <button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo i8ln("Cancel"); ?></button>
</div>

</form>
