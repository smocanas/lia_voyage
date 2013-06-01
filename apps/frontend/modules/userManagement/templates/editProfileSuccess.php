<form class="editProfile" action="<?php echo url_for('userManagement/saveUserProfile');?>" enctype="multipart/form-data" method="get">
    <table>
        <tr>
            <td>Nume</td>
            <td><?php echo $form['first_name']->render(); ?></td>
        </tr>
        <tr>
            <td>Prenume</td>
            <td><?php echo $form['last_name']->render(); ?></td>
        </tr>
        <tr>
            <td>Adresa email</td>
            <td><?php echo $form['email_address']->render(); ?></td>
        </tr>
        <tr>
            <td>Telefon</td>
            <td><?php echo $form['phone']->render(); ?></td>
        </tr>
        <tr>
            <td>Ziua de nastere</td>
            <td><?php echo $form['birthday']->render(); ?></td>
        </tr>
        <tr>
            <td>Poza</td>
            <td><?php echo $form['photo']->render(); ?></td>
        </tr>
        <tr>
            <td colspan="2">
                <input type="submit" class="submit" value="Salveaza" />
            </td>
        </tr>
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