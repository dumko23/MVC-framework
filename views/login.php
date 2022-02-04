<?php
/** @var $model User */
?>

<h1>Log in</h1>
<?php use App\core\form\Form;
use App\models\User;

$form = Form::begin('', 'post')?>

<?php echo $form->field($model, 'email')->typeField('email') ?>
<?php echo $form->field($model, 'password')->typeField('password') ?>

<button type="submit" class="btn btn-primary">Submit</button>

<?php Form::end() ?>
