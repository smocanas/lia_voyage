
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
        <br>
        </br>
        <div class="menuItemViewAdverts">
            <a class="menuItemViewAdverts" href="<?php echo url_for("viewAdverts/adverts"); ?>">Vizualizare anunțuri</a>
        </div>
    </div>
</fieldset>