<!--<table border="1">
    <tr>
    <table>
        <tr>
            <td>
                <input type="date"/>
            </td>
            <td>

            </td>
        </tr>
    </table>
</tr>
</table>-->
<div class="advertList">
    <?php if ($advertCount) :?>
        <?php foreach ($adverts as $advert): ?>
            <div class="advertItem" advertId ="<?php echo $advert->getId(); ?>">
                <?php echo $advert->getStartLocation() . ' - ' . $advert->getEndLocation(); ?>
            </div>
        <?php endforeach;?>
    <?php else: ?>
        <div>Nu exista nici un rezultat</div>
    <?php endif; ?>
</div>