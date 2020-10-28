<?php

/** @var $this  \App\core\View */

use App\core\form\TextareaField;

/** @var $model  \App\models\ContactForm */

$this->title = "Contact";
?>
<h1>Contact Us</h1>

<?php $form = \App\core\form\Form::begin('', 'post') ?>
<?php echo $form->field($model, 'subject') ?>
<?php echo $form->field($model, 'email') ?>
<?php echo new TextareaField($model, 'body') ?>
<button type="submit" class="btn btn-primary">Submit</button>
<?php \App\core\form\Form::end() ?>