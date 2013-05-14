<div class='pageTitle'>
    Cautare
</div>
<div class='advancedSearchBlock'>
    <a href='<?php echo url_for('search/advancedSearch');?>' class='advancedSearch'>Cautare avansata</a>
</div>
<?php
include_component('search', 'searchForm', array('s2' => $search));
include_component('viewAdverts', 'advertsList', array('adverts' => $adverts));
?>
<script type='text/javascript'>
    $(document).ready(function(){
        $('.advancedSearch').button();
    });
</script>