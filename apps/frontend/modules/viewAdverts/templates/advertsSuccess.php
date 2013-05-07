<div class="advertList">
    <?php if ($advertCount) :?>
        <?php foreach ($adverts as $advert): ?>
        <h3>
            <?php echo $advert->getStartLocation() . ' - ' . $advert->getEndLocation(); ?>
        </h3>
        <div>
            <p>
                <b>Traseu : </b> <?php echo $advert->getTypeRouteId(); ?> 
            </p>
            <p>
                <b>Nr. persoane : </b> <?php echo $advert->getPNumber(); ?>
            </p>
            <p>
                <b>Comentariu : </b> <?php echo $advert->getComment(); ?>
            </p>
        </div>
        <?php endforeach;?>
    <?php else: ?>
        <div>Nu exista nici un rezultat</div>
    <?php endif; ?>
</div>
<script type="text/javascript">
    $(document).ready(function(){
        $(".advertList").accordion();
    });
</script>