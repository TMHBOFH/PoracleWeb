<?php

echo "
    <form action='./actions/lures.php' method='POST'>
    ";

echo "<div class='text-center mt-3'>";
if ($row['lure_id'] == "0") {
	echo "<font style='font-size:24px;'>".i8ln("ALL")."</font><br>";
} else {
	echo "<img width=100 src='./lures/" . $row['lure_id'] . ".png?'><br>";
	echo "<center><font size=5>".i8ln(get_lure_name($row['lure_id']))."</font></center>";
}
echo "</div>";

?>

<div class="modal-body">

    <?php

        echo "
        <input type='hidden' id='type' name='type' value='lures'>
        <input type='hidden' id='uid' name='uid' value='" . $row['uid'] . "'>
        ";
        ?>

    <?php if (@$disable_location <> "True") { ?>
    <div class="form-row align-items-center">
        <div class="col-sm-12 my-1">
            <?php
            if ( $row['distance'] == 0 ) {
               $area_check="checked";
               $distance_check="";
               $style="style='display:none;'";
            } else {
               $area_check="";
               $distance_check="checked";
               $style="";
            }
            ?>
            <div class="input-group">
                <div class="btn-group btn-group-toggle ml-1" data-toggle="buttons" style="width:100%;">
                <label class="btn btn-secondary">
		    <input type="radio" name="use_areas_lure" id="use_areas_<?php echo $lure_unique_id; ?>" value="areas" <?php echo $area_check; ?> 
                    onclick="areas('<?php echo $lure_unique_id; ?>')">
                    <?php echo i8ln("Use Areas"); ?>
                </label>
                <label class="btn btn-secondary mr-2">
		    <input type="radio" name="use_areas_lure" id="use_areas_<?php echo $lure_unique_id; ?>" value="distance" <?php echo $distance_check; ?> 
                    onclick="areas('<?php echo $lure_unique_id; ?>')">
                    <?php echo i8ln("Set Distance"); ?>
                </label>
                </div>
            </div>
            <div class="input-group mt-2">
                <input type="number" id='distance_<?php echo $lure_unique_id; ?>' name='distance' value='<?php echo $row['distance'] ?>' <?php echo $style; ?>
                    min='0' class="form-control text-center">
                <div class="input-group-append" id="distance_label_<?php echo $lure_unique_id; ?>" <?php echo $style; ?>>
                    <span class="input-group-text"><?php echo i8ln("meters"); ?></span>
                </div>
            </div>
        </div>
    </div>
    <?php } else { ?>
        <input type="hidden" id='distance' name='distance' value='<?php echo $row['distance'] ?>' min='0'>
    <?php } ?>

    <hr>
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