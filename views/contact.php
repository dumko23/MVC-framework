<?php
/** @var $this View */
/** @var $model ContactForm */


use Dumko23\PhpMvcCore\form\Form;
use Dumko23\PhpMvcCore\form\TextareaField;
use Dumko23\PhpMvcCore\View;
use App\models\ContactForm;

$this->title = 'Contact Us';
?>


<h1>Contact us</h1>

<?php $form = Form::begin('', 'post') ?>
<?php echo $form->field($model, 'subject',)->typeField('text') ?>
<?php echo $form->field($model, 'email',)->typeField('email') ?>
<?php echo new TextareaField($model, 'body') ?>
<button type="submit" class="btn btn-primary">Submit</button>
<?php Form::end(); ?>

