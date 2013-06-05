<?php use_helper('I18N') ?>

<form action="<?php echo url_for('@sf_guard_register') ?>" method="post">
  <table>
    <?php echo $form ?>
    <tfoot>
      <tr>
        <td colspan="2" text-align="center">
          <input class="submit" type="submit" name="register" value="<?php echo __('Inregistreaza', null, 'sf_guard') ?>" />
        </td>
      </tr>
    </tfoot>
  </table>
</form>
<script type="text/javascript">
    $(document).ready(function(){
        $('.submit').button();
        $('.reg_datepicker').datepicker({
            dateFormat: 'yy-mm-dd',
            changeMonth: true,
            changeYear: true,
            yearRange: '1930:+0'
        });
    });
</script>