
<fieldset class="rightBlock"
          <legend class="legendstyle">Adaugă anunț:</legend>
    <br></br>
    <div id="specialDiv">
        <div class="menuItem">
            <a href="<?php echo url_for("travelRoute/addAdvert"); ?>">Șofer</a>
        </div>
        <div class="menuItem">
            <a href="<?php echo url_for("travelRoute/addPasager"); ?>">Pasager</a>
        </div>
        <div class="menuItem">
            <a href="<?php echo url_for("userManagement/editProfile"); ?>">Editeaza profil</a>
        </div>
        <div class="menuItem">
            <a href="<?php echo url_for("/logout"); ?>">Logout</a>
        </div>
        <br>
        </br>
        <div class="menuItemViewAdverts">
            <a class="menuItemViewAdverts" href="<?php echo url_for("viewAdverts/adverts"); ?>">Vizualizare anunțuri</a>
        </div>
    </div>
</fieldset>
<br />
<script src="http://connect.facebook.net/ro_RO/all.js#xfbml=1"></script>
<div>
    <fb:like-box class=" fb_iframe_widget " header="true" stream="false" show_faces="true" width="248" href="https://www.facebook.com/Calatorim.md" style="background:#fff"></fb:like-box>
</div>