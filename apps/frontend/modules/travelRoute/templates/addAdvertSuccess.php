<?php
$path = $_SERVER['SERVER_NAME'];
?>
<style>
    p.italic {font-style:italic;
              size: 20px;
    }
</style>
<form name="advert" action="<?php echo url_for('travelRoute/addAdvertQuery'); ?>" method="POST" class="advertForm">
    <input type="hidden" name="advert[advertId]" value="<?php echo ($advert)?$advert->getId():""; ?>">
    <fieldset class="fieldsetStyle">
        <legend class="legendstyle">Introduce-ți informația</legend>
        <!-- Traseu-->
        <table border="0">
            <tr>
                <td colspan="2">
                    <div style="padding: 0 .7em;display: none; " class="tableError ui-state-error ui-corner-all">
                        <p><span style="float: left; margin-right: .3em;" class="ui-icon ui-icon-alert"></span>
                            <strong>Alert:</strong> <span class="errorMessage">Sample ui-state-error style.</span></p>
                    </div>
                </td>
            </tr>
            <tr>
                <td>Traseu:</td>
                <td>
                    <?php $iteration = 0; ?>
                    <?php ($advert)?$advertRoute = $advert->getTypeRouteId():$advertRoute=""; ?>
                    <?php foreach ($routesOptions as $option): ?>
                        <?php
                        $checked = false;
                        if ((!$advertRoute && !$iteration) || ($advertRoute == $option->id ) ) {
                            $checked = 'checked="checked"';
                        }
                        $iteration++;
                        ?>
                        <div><input type="radio" name="advert[route]" value="<?php echo $option->id; ?>" <?php echo $checked; ?>><?php echo $option->name; ?></div>
                    <?php endforeach; ?>
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
                    <?php ($advert)?$routeDirection = $advert->getDirectionId():$routeDirection=""; ?>
                    <?php foreach ($directions as $direction): ?>
                        <?php
                        $checked = false;
                        if ((!$routeDirection && !$iteration) || ($routeDirection == $direction->id)) {
                            $checked = 'checked="checked"';
                        }
                        $iteration++;
                        ?>
                        <div><input type="radio" name="advert[direction]" class="direction" value="<?php echo $direction->id; ?>" <?php echo $checked; ?>><?php echo $direction->name; ?></div>
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
                    <input type="text" name="advert[nb_places]" class='nr_locuri' value="<?php echo ($advert)?$advert->getPNumber():""; ?>">
                </td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td>Data plecării:<span class="required">*</span></td>
                <td valign="top">
                    <div class="startBlock">
                        <input value="<?php echo ($advert)?$advert->getDepartureDate():""; ?>" type="text" name="advert[departure_date]" value="Data plecării"   class="datepicker italic_p d_p departure_date"/>
                    </div>
                    <div class="endBlock" style="display:none;">
                        <input value="<?php echo ($advert)?$advert->getReturnDate():""; ?>" type="text" name="advert[return_date]" value="Data întoarcerii" class="datepicker italic_i d_i return_date"/>
                    </div>
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
                    <input value="<?php echo ($advert)?$advert->getStartLocation():""; ?>" type="text" name="advert[departure_place]" autocomplete="on" class="departure_place"/>

                </td>
            </tr>
            <tr>
                <td>Ora:<span class="required">*</span></td>
                <td><input value="<?php echo ($advert)?$advert->getTime():""; ?>" type="text" name="advert[time]" class="timepicker"/><img src="/images/timepicker.png"/> </td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
            </tr>
            <tr> 
                <td>
                    Destinație:<span class="required">*</span>
                </td>
                <td>
                    <input value="<?php echo ($advert)?$advert->getEndLocation():""; ?>" type="text" name="advert[destination]" autocomplete="on" class="destination"/>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    Comentariu: <br />
                    <textarea name="advert[comment]" id="comment" class="comment" cols="70"><?php echo ($advert)?$advert->getComment():""; ?></textarea>
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

        $(".direction").change(function(){
            var value = $(this).val();
            if (value == 1)
            {
                $('.endBlock').hide();
            }
            else
            {
                $('.endBlock').show();
            }
        });
        
        $('.advertForm').submit(function() {
            $('.tableError').hide();
            var nr_locuri = $(".nr_locuri").val();
            if (!nr_locuri)
            {
                $('.tableError').show();
                $('.errorMessage').html("Va rugam sa introduceti numarul de locuri");
                return false;
            }
            
            var intRegex = /^\d+$/;
            if(!intRegex.test(nr_locuri)) {
                $('.tableError').show();
                $('.errorMessage').html("Cimpul 'Numarul de locuri' trebuie sa fie o valoare numerica");
                return false;
            }
            
            var departure_date = $('.departure_date').val();
            var return_date = $('.return_date').val();
            if (!departure_date || departure_date == "Data plecării")
            {
                $('.tableError').show();
                $('.errorMessage').html("Va rugam sa introduceti data plecarii");
                return false;
            }
            
            var direction = $('.direction:checked').val();
            if (direction != 1 && (!return_date || return_date == "Data întoarcerii"))
            {
                $('.tableError').show();
                $('.errorMessage').html("Va rugam sa introduceti data intoarcerei");
                return false;
            }
            
            if (departure_date && return_date && return_date != '0000-00-00')
            {
                var firstValue = departure_date.split('-');
                var secondValue = return_date.split('-');

                var firstDate=new Date();
                firstDate.setFullYear(firstValue[0],(firstValue[1] - 1 ),firstValue[2]);

                var secondDate=new Date();
                secondDate.setFullYear(secondValue[0],(secondValue[1] - 1 ),secondValue[2]);     

                if (firstDate > secondDate)
                {
                    $('.tableError').show();
                    $('.errorMessage').html("Data intoarcerii mai mica decit data de plecare");
                    return false;
                }
            }
            
            var departure_place = $('.departure_place').val();
            if (!departure_place)
            {
                $('.tableError').show();
                $('.errorMessage').html("Va rugam sa indicati locul de plecare");
                return false;
            }

            var time = $('.timepicker').val();
            if (!time)
            {
                $('.tableError').show();
                $('.errorMessage').html("Va rugam sa indicati ora de plecare");
                return false;
            }
            
            var destination = $('.destination').val();
            if (!destination)
            {
                $('.tableError').show();
                $('.errorMessage').html("Va rugam sa indicati destinatia");
                return false;
            }
            
            $(this).submit();
        });

        $('.submitStyle').button();
        
        jQuery(".datepicker").datepicker
        ({
            minDate: 0,
            showOn: "button",
            buttonImage: "http://<?php echo $path; ?>/images/previewcalendaricon.png",
            buttonImageOnly: true,
            dateFormat: 'yy-mm-dd'
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