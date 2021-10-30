<?php
/** @var $model \app\models\User */
?>

<h1>
  Login
</h1>

<?php $form = lvl\phpcoremvc\form\Form::begin('', 'post')?>
  <?=$form->field($model, 'email') ?>
  <?=$form->field($model, 'password')->passwordField() ?>
  <button type="submit" class="btn btn-primary">Submit</button>
<?php lvl\phpcoremvc\form\Form::end()?>