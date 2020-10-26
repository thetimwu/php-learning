<?php

/** @var $model \App\models\User */
?>
<h1>Login</h1>
<?php $form = \App\core\form\Form::begin('login', 'POST') ?>
<?php echo $form->field($model, 'email') ?>
<?php echo $form->field($model, 'password')->passwordField() ?>
<button type="submit" class="btn btn-primary">Submit</button>
<?php $form = \App\core\form\Form::end() ?>