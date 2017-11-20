<img src="icon.png" alt="" /><?php defined('C5_EXECUTE') or die("Access Denied."); ?>


<?php
if ($fID > 0) {
    $fo = File::getByID($fID);
    if ($fo->isError()) {
        unset($fo);
    }
}
?>

<div class="form-group">
    <?php echo $form->label('fID', t('Picture'));?>
    <?php
    $al = Loader::helper('concrete/asset_library');
    print $al->file('ccm-b-file', 'fID', t('Choose File'), $fo);
    ?>
</div>

<div class="form-group">
    <?php echo $form->label('title', t('Title'));?>
    <?php print $form->text('title', $title)?>
</div>

<div class="form-group">
    <?php echo $form->label('paragraph', t('Intro')) ?>
    <?php print $form->textarea('paragraph', $paragraph, array('rows' => 5))?>
</div>