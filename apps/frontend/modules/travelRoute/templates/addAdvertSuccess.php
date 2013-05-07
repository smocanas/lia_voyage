<?php
$path = $_SERVER['SERVER_NAME'];
?>
<style>
    p.italic {font-style:italic;
              size: 20px;
    }
</style>
<form name="advert" action="<?php echo url_for('travelRoute/addAdvertQuery'); ?>" method="POST">
    <fieldset class="fieldsetStyle">
        <legend class="legendstyle">Introduce-ți informația</legend>
        <!-- Traseu-->
        <table border="0"> 
            <tr>
                <td>Traseu:</td>
                <td>
                    <?php $iteration = 0;?>
                    <?php foreach ($routesOptions as $option): ?>
                        <?php
                        $checked = false;
                        if (!$iteration)
                        {
                            $checked = 'checked="checked"';
                        }
                        $iteration++;
                        ?>
                        <div><input type="radio" name="advert[route]" value="<?php echo $option->id;?>" <?php echo $checked;?>><?php echo $option->name; ?></div>
                    <?php endforeach;?>
                </td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td>Direcția:</td>
                <td>
                    <?php $iteration = 0; ?>
                    <?php foreach ($directions as $direction): ?>
                        <?php
                        $checked = false;
                        if (!$iteration)
                        {
                            $checked = 'checked="checked"';
                        }
                        $iteration++;
                        ?>
                        <div><input type="radio" name="advert[direction]" value="<?php echo $direction->id; ?>" <?php echo $checked; ?>><?php echo $direction->name; ?></div>
                    <?php endforeach; ?>
                </td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td>
                    Numarul de locuri:<span class="required">*</span>
                </td>
                <td>
                    <input type="text" name="advert[nb_places]" class='nr_locuri'>
                </td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td>Data plecării:<span class="required">*</span></td>
                <td valign="top">
                    <input type="text" name="advert[departure_date]" value="Data plecării"   class="datepicker italic_p d_p"/>
                    <input type="text" name="advert[return_date]" value="Data întoarcerii" class="datepicker italic_i d_i"/>
                </td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
            </tr>
            <tr> 
                <td>Locul de plecare:<span class="required">*</span> 
                </td>
                <td>
                    <input type="text" name="advert[departure_place]" autocomplete="on"/>
                    
                </td>
            </tr>
            <tr>
                <td>Ora:<span class="required">*</span></td>
                <td><input type="text" name="advert[time]" class="timepicker"/> </td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
            </tr>
            <tr> 
                <td>Destinație:<span class="required">*</span>
                </td>
                <td><input type="text" name="advert[destination]" autocomplete="on"/>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    Comentariu: <br />
                    <textarea name="advert[comment]" id="comment" class="comment" cols="70"></textarea>
                </td>
            </tr>
            <tr>
                <td colspan="2" align="center">
                    <input type="submit" value="Adaugă" class="submitStyle">
                </td>
            </tr>
        </table>
    </fieldset>
</form>
<script type="text/javascript">
    jQuery(document).ready(function() {
        $('.submitStyle').button();
        jQuery(".datepicker").datepicker
                ({
                    minDate: 0,
                    showOn: "button",
                    buttonImage: "http://<?php echo $path; ?>/images/previewcalendaricon.png",
                    buttonImageOnly: true
                });


        jQuery(".datepicker").change(function() {
            if (jQuery(this).val() != "Data plecării" && jQuery(this).val() != "Data întoarcerii")
            {
                jQuery(this).removeClass("italic_p");
                jQuery(this).removeClass("italic_i");
                jQuery(this).addClass("blackcolor");
            }
        });

        jQuery('.timepicker').timepicker();
    });

    var uiDatepickerCreate = $.fn.datepicker;
    $.fn.datepicker = function() {
        if (!this[0].datepikerKeyFilter) {
            // prevent typing into the input
            this.bind('keypress', function(event) {
                return false;
            });

            //prevent pasting ctrl+v, etc.
            this.bind("keydown", function(e) {
                if ((e.ctrlKey && e.which === 86) || e.which === 46 || e.which === 8) {
                    return false;
                }
            });

            // prevent from pasting with right-click
            this.bind("contextmenu", function(e) {
                return false;
            });

            this[0].datepikerKeyFilter = true;
        }
        ;

        return uiDatepickerCreate.apply(this, arguments);
    };

    $('.timepicker').bind('keypress', function(event) {
        return false;
    });

    $('.timepicker').bind("keydown", function(e) {
        if ((e.ctrlKey && e.which === 86) || e.which === 46 || e.which === 8) {
            return false;
        }
    });

    $('.timepicker').bind("contextmenu", function(e) {
        return false;
    });
</script>