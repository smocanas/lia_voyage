<?php if(count($bookedAdvert)): ?>
    <table border="1" width="100%" class="tableStyle">
        <tr>
            <th width="10%">&nbsp;</th>
            <th width="20%">Locuri</th>
            <th width="50%">Comentariu</th>
            <td width="20%">Operatii</td>
        </tr>
        <?php $iterator = 1; ?>
    <?php foreach ($bookedAdvert as $book): ?>
        <tr>
            <td align="center"><?php echo $iterator; ?></td>
            <td align="center"><?php echo $book['p_number'];?></td>
            <td><?php echo $book['comment']?></td>
            <td align="center">
                <li title="Anuleaza rezervarea" class="operationButton ui-state-default ui-corner-all" onclick="deleteBook('<?php echo $book['id']; ?>');"><span class="ui-icon ui-icon-trash"></span></li>
            </td>
        </tr>
    <?php endforeach;?>
    </table>
<?php else: ?>
    Nu aveti nici o rezervare
<?php endif; ?>
<script type="text/javascript">
    function deleteBook(id)
    {
        window.location = '/book/delete/' + id;
    }
</script>

