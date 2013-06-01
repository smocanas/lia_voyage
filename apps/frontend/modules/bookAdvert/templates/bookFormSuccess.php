<?php if ($message): ?>
    <div style="padding: 0 .7em;" class="tableError ui-state-error ui-corner-all">
        <p><span style="float: left; margin-right: .3em;" class="ui-icon ui-icon-alert"></span>
            <strong>Alert:</strong> <span class="errorMessage"><?php echo $message; ?></span></p>
    </div>
<?php endif; ?>
<div class="acceptedAdvert">
    <form class="acceptedAdvertForm" name="acceptedAdvertForm" action="<?php echo url_for('book/form') . '/' . $id; ?>" method="POST">
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        <table>
            <tr>
                <td>
                    <?php echo $form['p_number']->renderLabel(); ?>
                <td>
                    <?php echo $form['p_number']->render(); ?>
                </td>
            </tr>
            <tr>
                <td>
                    <?php echo $form['comment']->renderLabel(); ?>
                </td>
                <td>
                    <?php echo $form['comment']->render(); ?>
                </td>
            </tr>
            
            <tr>
                <td colspan="2" align="center">
                    <input type="submit" value="Adauga" name="submit" class="submit">
                </td>
            </tr>
        </table>
    </form>
</div>
<script type="text/javascript">
    $(document).ready(function(){
        $('.submit').button();
    });
</script>