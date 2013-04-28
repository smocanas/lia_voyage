<?php
$path = $_SERVER['SERVER_NAME'];
?>
<style>
    p.italic {font-style:italic;
              size: 20px;
    }
</style>
<form name="input" action="html_form_action.asp" method="get">
    <fieldset class="fieldsetStyle">
        <legend class="legendstyle">Introduce-ți informația</legend>
        <div>
            <h3></h3>
        </div>

        <!-- Traseu-->
        <table border="0"> 
            <tr>
                <td>Traseu:</td>
                <td ><input type="radio" name="traseu" value="male" checked="checked">Unic<br></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="radio" name="traseu" value="female">Regulat<br></td>
            </tr>
            <tr colspan="2">
                <td></td>
                <td><input type="radio" name="traseu" value="female">Domiciliu - Serviciu<br></td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td>Direcția:</td>
                <td ><input type="radio" name="directie" value="male" checked="checked">O singură direcție<br></td>
            </tr>
            <tr>
                <td></td>
                <td ><input type="radio" name="directie" value="male">Regulată<br></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="radio" name="directie" value="female">Dus - Întors<br></td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td>
                    Numarul de pasageri:
                </td>
                <td>
                    <input type="text">
                </td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td>Data plecării:</td>
                <td valign="top">
                    <input type="text" name="date1" value="Data plecării"   class="datepicker italic_p d_p"/>
                    <input type="text" name="date2" value="Data întoarcerii" class="datepicker italic_i d_i"/>
                </td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
            </tr>
            <tr> 
                <td>Locul de plecare: 
                </td>
                <td>
                    <input type="text" autocomplete="on"/><label class="ora">Ora:</label>
                    <input type="text" name="time" class="timepicker"/>
                </td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
            </tr>
            <tr> 
                <td>Destinație:
                </td>
                <td><input type="text" autocomplete="on"/>
                </td>
            </tr>
        </table>
</form>

<div>
    <h3></h3>
</div>

<input type="submit" value="Adaugă" class="submitStyle">
</fieldset>
<script type="text/javascript">
    jQuery(document).ready(function(){
        
        jQuery( ".datepicker" ).datepicker
        ({
            minDate: 0,
            showOn: "button",
            buttonImage: "http://<?php echo $path; ?>/images/previewcalendaricon.png",
            buttonImageOnly: true
        });
        
        
        jQuery(".datepicker").change(function(){
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
    $.fn.datepicker = function(){
        if(!this[0].datepikerKeyFilter){
            // prevent typing into the input
            this.bind('keypress', function(event) {
                return false;
            });
  
            //prevent pasting ctrl+v, etc.
            this.bind("keydown",function(e){
                if((e.ctrlKey && e.which===86) || e.which===46 || e.which===8 ){
                    return false;
                }
            });
  
            // prevent from pasting with right-click
            this.bind("contextmenu",function(e){
                return false;
            });  
  
            this[0].datepikerKeyFilter = true;
        };
 
        return uiDatepickerCreate.apply(this,arguments);
    };
    
    $('.timepicker').bind('keypress', function(event) {
        return false;
    });
    
    $('.timepicker').bind("keydown",function(e){
        if((e.ctrlKey && e.which===86) || e.which===46 || e.which===8 ){
            return false;
        }
    });
    
    $('.timepicker').bind("contextmenu",function(e){
        return false;
    });
</script>