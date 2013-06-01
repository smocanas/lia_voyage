<?php use_javascript('scripts'); ?>
<div class="advertList">
    <?php if ($advertCount) :?>
        <?php foreach ($adverts as $advert): ?>
        <?php $typeClass = 'greenColor';?>
        <?php if ($advert->getTypeId() == 2): ?>
            <?php $typeClass = 'redColor' ?>
        <?php endif; ?>
        <div class="ui-state-highlight ui-corner-all advertStyle">
            <div class="advertRoute">
                <div class="advertRouteDetails">
                    <a href="<?php echo url_for('/showAdvert'); ?>/<?php echo $advert->getId(); ?>"><?php echo $advert->getStartLocation() . ' - ' . $advert->getEndLocation(); ?></a>
                    <?php
                        $acceptedPersons = $advert->getAcceptedAdverts();
                        $persons = 0;
                        if (count ($acceptedPersons))
                        {
                            foreach ($acceptedPersons as $book)
                            {
                                $persons+=$book['p_number'];
                            }
                        }
                        $nbPlaces = $advert->getPNumber();
                        $nbPlaces = $nbPlaces - $persons;
                        if ($nbPlaces == 1)
                        {
                            $textPlace = '1 loc';
                        }
                        else if ($nbPlaces > 1)
                        {
                            $textPlace = $nbPlaces . ' locuri';
                        }
                        else
                        {
                            $textPlace = 'Nici un loc';
                        }
                        
                        echo ' (' . $textPlace . ')'; 
                    ?>
                </div>
                <div class="advertRouteOperations">
                    <?php if ($advert->getCreatedBy() != $userId): ?>
                        <?php if (count($advert->getAcceptedAdverts())): ?>
                            <li title="Rezervarile mele" class="operationButton ui-state-default ui-corner-all" onclick="bookedAdvert('<?php echo $advert->getId(); ?>');"><span class="ui-icon ui-icon-cart"></span></li>
                        <?php endif; ?>
                        <li title="Rezerveaza" class="operationButton ui-state-default ui-corner-all" onclick="bookAdvert('<?php echo $advert->getId(); ?>');"><span class="ui-icon ui-icon-circle-check"></span></li>
                    <?php endif; ?>
                    <?php if ($advert->getCreatedBy() == $userId): ?>
                        <li title="Editeaza" class="operationButton ui-state-default ui-corner-all" onclick="editAdvert('<?php echo $advert->getId();?>');"><span class="ui-icon ui-icon-pencil"></span></li>
                        <li title="Sterge" class="operationButton ui-state-default ui-corner-all" onclick="if (confirm('Sunteti siguri ca doriti sa stergeti acesta inregistrare?')) deleteAdvert('<?php echo $advert->getId();?>');"><span class="ui-icon ui-icon-trash"></span></li>
                    <?php endif; ?>
                </div>
            </div>
            <div class="advertRouteInformation">
                Adaugat de <?php echo $advert->getCreator(); ?> la <?php echo $advert->getCreatedAt(); ?>
            </div>
        </div>
        <?php endforeach;?>
        
    <?php else: ?>
        <div>Nu exista nici un rezultat</div>
    <?php endif; ?>
</div>
<br />
<?php if ($advertCount > 10) :?>
<!--<div id="accordionPaginator" align="center">
    <a href="#" class="previousPage">Previous Page</a>
    <select name="goToPage" class="goToPage" size="1"></select>
    <a href="#" class="nextPage">Next Page</a>
</div>-->
<?php endif; ?>
<script type="text/javascript">
    function deleteAdvert(id)
    {
        window.location = '/removeAdvert/' + id;
    }
    
    function editAdvert(id)
    {
        window.location = '/edit/' + id;
    }
    
    function bookAdvert(id)
    {
        window.location = '/book/form/' + id;
    }
    
    function bookedAdvert(id)
    {
        window.location = '/booked/' + id;
    }
    
    $(document).ready(function(){
//        $(".advertList").accordion();
//        $('.previousPage, .nextPage, .goToPage').button();
//        jQuery.fn.extend({
//            paginateAccordion: function(options) {
//                var currentPage = options.currentPage ? parseInt(options.currentPage) : 0;
//                var itemsPerPage = options.itemsPerPage ? parseInt(options.itemsPerPage) : 5;
//                var paginatorControl = options.paginatorControl;
//
//                return new AccordionPaginator(this, currentPage, itemsPerPage, paginatorControl);
//            }
//        });
//        
//        paginatorHandle = $(".advertList").paginateAccordion({
//                        "currentPage": 0,
//                        "itemsPerPage": 10,
//                        "paginatorControl": $("#accordionPaginator")
//                });    
//       
//        // initial paginate call
//        paginatorHandle.paginate();
//       
//        $("#accordionPaginator .nextPage").click(function() {
//                paginatorHandle.nextPage();
//        });
//       
//        $("#accordionPaginator .previousPage").click(function() {
//                paginatorHandle.previousPage();
//        });
//       
//        $("#accordionPaginator .goToPage").change(function() {
//                var pageIndex = parseInt($(this).val());
//                paginatorHandle.goToPage(pageIndex);
//        });
    });
</script>