<h1>Registration</h1>
<?php use App\core\form\Form;

 $form = Form::begin('', 'post')?>
<div class="row">
    <div class="col">
        <?php echo $form->field($model, 'firstname') ?>
    </div>
    <div class="col">
        <?php echo $form->field($model, 'lastname') ?>
    </div>
</div>
<?php echo $form->field($model, 'email')->typeField('email') ?>
<?php echo $form->field($model, 'password')->typeField('password') ?>
<?php echo $form->field($model, 'confirmPassword')->typeField('confirmPassword') ?>
<button type="submit" class="btn btn-primary">Submit</button>

<?php Form::end() ?>
