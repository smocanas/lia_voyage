<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
    <head>
        <?php include_http_metas() ?>
        <?php include_metas() ?>
        <?php include_title() ?>
        <link rel="shortcut icon" href="/favicon.ico" />
        <?php include_stylesheets() ?>
        <?php include_javascripts() ?>
        <?php
        $imagesPath = sfConfig::get('sf_web_dir');
        ?>
    </head>
    <body>

        <div id="header">	    
            <div class="pagewidth">		    
                <div id="header-top">
                    <table border="0">
                        <tr>
                            <td id="sitename">
                                <a href="/"><img src="<?php echo sfConfig::get('web_dir');?>/images/logo.png" width="534" height="47" alt="logotype" /></a>
                            </td>
                            <td class="searchBlock">
                                <?php if ($sf_user->isAuthenticated()): ?>
                                    <?php include_component('search', 'searchForm'); ?>
                                <?php endif; ?>
                            </td>
                        </tr>
                    </table>
                </div>            
                <div id="header-bottom">			    
                    <div id="topmenu">			        
                        <div class="navigation">                                                    	                                        

                        </div>                
                    </div>					            
                </div>					
            </div>	
        </div>
        <div class="pagewidth">	
            <div id="main">
                <div id="main-content">				                                                               
                    <?php echo $sf_content ?>
                </div>
            </div>
            <div id="right">
                <div class="right-menu">
                    <?php if (!$sf_user->isAuthenticated()): ?>
                        <?php include_component('sfGuardAuth', 'signin_form'); ?>
                    <?php endif; ?>
                </div>
                <div class="right-menu">
                    <?php if ($sf_user->isAuthenticated()): ?>
                        <?php include_component('default', 'rightMenu'); ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <div id="ftb">
            <div class="pagewidth">
                <div class="ftb-c">						
                    <?php echo "Copyright ", date('Y'); ?>
                </div>
                <div id="top">
                    <div class="top_button">
                        <a href="#" onclick="scrollToTop();
                                return false;">
                            <img src="images/top.png" width="30" height="30" alt="top" />
                        </a>
                    </div>
                </div>			
            </div>
        </div>
    </body>
</html>
