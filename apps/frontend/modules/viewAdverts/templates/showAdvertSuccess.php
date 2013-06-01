<?php if ($type == 'success'): ?>
    <?php if (!$advert): ?>
        <?php $message = 'Anuntul nu este gasit'; ?>
        <div style="padding: 0 .7em;display: none; " class="tableError ui-state-error ui-corner-all">
            <p><span style="float: left; margin-right: .3em;" class="ui-icon ui-icon-alert"></span>
                <strong>Alert:</strong> <span class="errorMessage"><?php echo $message; ?></span></p>
        </div>
    <?php else:
            $personsArray = array();
            $acceptedPersons = $advert->getAcceptedAdverts();
            $persons = 0;
            if (count ($acceptedPersons))
            {
                foreach ($acceptedPersons as $book)
                {
                    $persons+=$book['p_number'];
                    $personsArray[$book['id']] = array(
                        'user_id' => $book['user_id'],
                        'p_number' => $book['p_number']
                    );
                }
            }
            $textPlace = Utils::getAdvertNumber($persons);
            ?>
<fieldset class="fieldsetStyle">
    <legend class="legendstyle">Informatia de baza</legend>
        <table width="100%" class="routeDetails">
            <tr class="fieldBorder">
                <td width="30%">Ruta</td>
                <td width="70%" class="resultStyle"><?php echo $advert->getStartLocation() . ' - ' . $advert->getEndLocation(); ?></td>
                <td></td>
            </tr>
            <tr class="fieldBorder">
                <td>Tip ruta</td>
                <td class="resultStyle"><?php echo $advert->getTypeRoute()->getName(); ?></td>
                <td></td>
            </tr>
            <tr class="fieldBorder">
                <td>Directia</td>
                <td class="resultStyle"><?php echo $advert->getDirection()->getName(); ?></td>
                <td></td>
            </tr>
            <tr class="fieldBorder">
                <td>Numarul de locuri</td>
                <td class="resultStyle"><?php echo $advert->getPNumber(); ?></td>
                <td></td>
            </tr>
            <tr class="fieldBorder">
                <td>Date de plecare</td>
                <td class="resultStyle"><?php echo $advert->getDepartureDate() . ' ' . $advert->getTime(); ?></td>
                <td></td>
            </tr>
            <?php if ($advert->getReturnDate()): ?>
                <tr class="fieldBorder">
                    <td>Date de intoarcere</td>
                    <td class="resultStyle"><?php echo $advert->getReturnDate(); ?></td>
                    <td></td>
                </tr>
            <?php endif; ?>
            <tr class="fieldBorder">
                <td>Comentariu</td>
                <td class="resultStyle"><?php echo $advert->getComment(); ?></td>
                <td></td>
            </tr>
            <tr>
                <td colspan="3">&nbsp;</td>
            </tr>
            <?php if ($advert->getCreatedBy() == $userId): ?>
                <tr>
                    <td colspan="3">
                        <div>Persoanele ce au comandat: </div>
                <?php if (count($personsArray)): ?>
                    <?php $iterator = 1;?>
                    <?php foreach ($personsArray as $id => $data): ?>
                        <div bookId ="<?php echo $id; ?>">
                            <span><?php echo $iterator; ?>. </span>
                            <a href="<?php echo url_for('user/profile') . '/' . $data['user_id']; ?>" class="userLink"><?php echo Utils::getUserName($data['user_id']); ?></a>
                            <span>(<?php echo Utils::getAdvertNumber($data['p_number']); ?>)</span>
                        </div>
                        <?php $iterator++; ?>
                    <?php endforeach; ?>
                <?php else: ?>
                    <div style="font-style: italic; color: #666666">Nici o comanda</div>
                <?php endif; ?>
                    </td>
                </tr>
            <?php else: ?>
                <tr>
                    <td colspan="3">
                        <b>S-au comandat: </b> <?php echo $textPlace; ?>
                    </td>
                </tr>
            <?php endif; ?>
            <tr>
                <td colspan="3">&nbsp;</td>
            </tr>
            <tr>
                <td colspan="3" class="resultStyle" style="text-align: right; ">
                    Adaugat de <?php echo $advert->getCreator(); ?> la <?php echo $advert->getCreatedAt(); ?>
                </td>
            </tr>
            <tr>
                <td colspan="3">&nbsp;</td>
            </tr>
            <tr>
                <td colspan="3">
                    <?php if ($advert->getCreatedBy() != $userId): ?>
                        <a href="<?php echo url_for('book/form') . '/' . $advert->getId(); ?>" class="button">Rezerveaza</a>
                    <?php endif; ?>
                    <?php if ($advert->getCreatedBy() == $userId): ?>
                        <a href="<?php echo url_for('/edit') . '/' . $advert->getId(); ?>" class="button">Editeaza</a>
                        <a href="<?php echo url_for('/removeAdvert') . '/' . $advert->getId(); ?>" class="button">Sterge</a>
                    <?php endif; ?>
                </td>
            </tr>
        </table>
</fieldset>
        <?php // endforeach; ?>
    <?php endif; ?>
<?php else: ?>
    <div style="padding: 0 .7em;display: none; " class="tableError ui-state-error ui-corner-all">
        <p><span style="float: left; margin-right: .3em;" class="ui-icon ui-icon-alert"></span>
            <strong>Alert:</strong> <span class="errorMessage"><?php echo $message; ?></span></p>
    </div>
<?php endif; ?>
<script type="text/javascript">
    $(document).ready(function(){
        $('.button').button();
    });
</script>

