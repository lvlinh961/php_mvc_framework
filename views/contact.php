<?php 
/** @var $this \lvl\phpcoremvc\View */
/** @var $model \app\models\ContactForm */

use lvl\phpcoremvc\form\TextareaField;

$this->title = 'Contact'; 
?>

<h1>
	Contact
</h1>

<?php $form = lvl\phpcoremvc\form\Form::begin('', 'post')?>
  <?php echo $form->field($model, 'subject') ?>
  <?php echo $form->field($model, 'email') ?>
  <?php echo new TextareaField($model, 'body') ?>
  <button type="submit" class="btn btn-primary">Submit</button>
<?php lvl\phpcoremvc\form\Form::end()?>