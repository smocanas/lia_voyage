<?php

    if (isset($searchStyle) && ($searchStyle == 'simple'))
    {
        $inputStyle = $buttonStyle = $formStyle = $fieldContainer = false;
        $inputStyle = 'simpleSearchInput';
        $submitValue = 'Cauta';
        $buttonStyle = 'simpleSubmitButton';
    }
    else
    {
        $inputStyle     = 's2 searchfieldjs';
        $buttonStyle    = 'search2btn';
        $formStyle      = 'searchform2';
        $fieldContainer = 'fieldcontainer';
        $submitValue = '';
    }
?>
<form class="<?php echo $formStyle; ?>" name="searchform2" method="POST" action="<?php echo url_for('search/index'); ?>">
    <div class="<?php echo $fieldContainer; ?>">
        <input type="text" name="s2" class="<?php echo $inputStyle; ?>" placeholder="<?php echo $s2; ?>" tabindex="2" value="<?php echo $s2; ?>"/>
        <input type="submit" name="search2btn" class="<?php echo $buttonStyle; ?>" value="<?php echo $submitValue; ?>" />
    </div>
</form>
<script type="text/javascript">
    $(document).ready(function(){
        $('.simpleSubmitButton').button();
    });
</script>