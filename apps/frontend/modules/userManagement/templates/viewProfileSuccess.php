<?php 
//    if ($objectType == 'userProfile')
//    {
//        $phone = $userProfile->getPhone();
//        $photo = $userProfile->getPhoto();
//        $birthday = $userProfile->getBirthday();
//        $user = $userProfile->getProfile();
//    }
//    else if ($objectType == 'user')
//    {
//        $user = $userProfile;
//    }
    
    $firstName = $userProfile->getFirstName();
    $lastName = $userProfile->getLastName();
    $email = $userProfile->getEmailAddress();
    $profile = $userProfile->getProfile();
    $phone = $profile->getPhone();
    $photo = $profile->getPhoto();
    $birthday = $profile->getBirthday();
    
?>
<div class="content-page">
    <div class="people-details">
        <table border="0" class="tableDetails">
            <tr>
                <td width="100px" rowspan="5">
                    <?php if (isset($photo) && $photo): ?>
                    <img src="<?php echo sfConfig::get('web_dir').'/uploads/'.$photo; ?>" />
                    <?php else: ?>
                        <img src="<?php echo sfConfig::get('web_dir').'/images/noUser.jpg'; ?>">
                    <?php endif; ?>
                </td>
                <td align="right">
                    &nbsp;
                </td>
            </tr>
            <tr>
                <td>
                    <span class="detailsTitle"><?php echo $firstName . ' ' .$lastName; ?></span>
                </td>
            </tr>
            <tr>
                <td>
                    <span class="detailsInfo"><?php echo $birthday; ?></span>
                </td>
            </tr>
            <tr>
                <td>
                    <span class="detailsInfo"><b><?php echo $phone; ?></b></span>
                </td>
            </tr>
            <tr>
                <td width="400px" valign="top" class="detailsSource">
                    <?php echo $email; ?>
                </td>
            </tr>
        </table>
    </div>
</div>