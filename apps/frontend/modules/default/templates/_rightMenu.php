<style>
    .ui-menu { width: 150px; }
</style>
<ul id="menu">
    <li><a href="<?php echo url_for("viewAdverts/adverts");  ?>">Vizualizare anunt</a></li>
    <li>
        <a href="#">Adaugare anunt</a>
        <ul>
            <li><a href="<?php echo url_for("travelRoute/addAdvert");  ?>">Sofer</a></li>
            <li><a href="<?php echo url_for("travelRoute/addPasager");  ?>">Pasager</a></li>
        </ul>
    </li>
    <li><a href="<?php echo url_for("userManagement/editProfile");  ?>">Editare profil</a></li>
    <li><a href="<?php echo url_for("/logout");  ?>">Deconectare</a></li>
</ul>
<br />
<script src="http://connect.facebook.net/ro_RO/all.js#xfbml=1"></script>
<div>
    <fb:like-box class=" fb_iframe_widget " header="true" stream="false" show_faces="true" width="248" href="https://www.facebook.com/Calatorim.md" style="background:#fff"></fb:like-box>
</div>
<script type="text/javascript">
    $(document).ready(function(){
        $("#menu").menu();
    });
</script>