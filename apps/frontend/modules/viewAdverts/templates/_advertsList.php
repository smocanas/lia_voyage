<?php use_javascript('scripts'); ?>
<div class="advertList">
    <?php if ($advertCount) :?>
        <?php foreach ($adverts as $advert): ?>
        <?php $typeClass = 'greenColor';?>
        <?php if ($advert->getTypeId() == 2): ?>
            <?php $typeClass = 'redColor' ?>
        <?php endif; ?>
        <h3 class="<?php echo $typeClass; ?>">
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
<br />
<?php if ($advertCount > 10) :?>
<div id="accordionPaginator" align="center">
    <a href="#" class="previousPage">Previous Page</a>
    <select name="goToPage" class="goToPage" size="1"></select>
    <a href="#" class="nextPage">Next Page</a>
</div>
<?php endif; ?>
<script type="text/javascript">
    $(document).ready(function(){
        $(".advertList").accordion();
        $('.previousPage, .nextPage, .goToPage').button();
        jQuery.fn.extend({
            paginateAccordion: function(options) {
                var currentPage = options.currentPage ? parseInt(options.currentPage) : 0;
                var itemsPerPage = options.itemsPerPage ? parseInt(options.itemsPerPage) : 5;
                var paginatorControl = options.paginatorControl;

                return new AccordionPaginator(this, currentPage, itemsPerPage, paginatorControl);
            }
        });
        
        paginatorHandle = $(".advertList").paginateAccordion({
                        "currentPage": 0,
                        "itemsPerPage": 10,
                        "paginatorControl": $("#accordionPaginator")
                });    
       
        // initial paginate call
        paginatorHandle.paginate();
       
        $("#accordionPaginator .nextPage").click(function() {
                paginatorHandle.nextPage();
        });
       
        $("#accordionPaginator .previousPage").click(function() {
                paginatorHandle.previousPage();
        });
       
        $("#accordionPaginator .goToPage").change(function() {
                var pageIndex = parseInt($(this).val());
                paginatorHandle.goToPage(pageIndex);
        });
    });
</script>