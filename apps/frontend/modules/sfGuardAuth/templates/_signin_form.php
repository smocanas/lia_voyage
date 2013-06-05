<?php use_helper('I18N') ?>
<div class="stableBlock">
    <form class="widget-content" action="<?php echo url_for('@sf_guard_signin') ?>" method="post">
        <table >
            <tbody>
                <?php echo $form ?>
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="2">
                        <input class="m_button" type="submit" value="<?php echo __('Login', null, 'sf_guard') ?>" />


                    </td>
                <tr>
                    <td colspan="2">
                        <?php $routes = $sf_context->getRouting()->getRoutes() ?>
                        <?php if (isset($routes['sf_guard_forgot_password'])): ?>
                            <a href="<?php echo url_for('@sf_guard_forgot_password') ?>"><?php echo __('Restabilirea parolei', null, 'sf_guard') ?></a>
                        <?php endif; ?>

                    </td>
                </tr>
                <tr>
                    <td colspan="2">


                        <?php if (isset($routes['sf_guard_register'])): ?>
                            &nbsp; <a href="<?php echo url_for('@sf_guard_register') ?>"><?php echo __('Înregistrare', null, 'sf_guard') ?></a>
                        <?php endif; ?>
                    </td>
                </tr>
                </tr>
            </tfoot>
        </table>
    </form>
</div>
<br />
<script src="http://connect.facebook.net/ro_RO/all.js#xfbml=1"></script>
<div>
    <fb:like-box class=" fb_iframe_widget " header="true" stream="false" show_faces="true" width="248" href="https://www.facebook.com/Calatorim.md" style="background:#fff"></fb:like-box>
</div>
<script type="text/javascript">
    $(document).ready(function(){
        $(".m_button").button();
    });
</script>