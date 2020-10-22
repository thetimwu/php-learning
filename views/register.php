<h1>Create new user</h1>
<?php $form = \App\core\form\Form::begin('register', 'POST') ?>
<div class="row">
    <div class="col">
        <?php echo $form->field($model, 'firstName') ?>
    </div>
    <div class="col">
        <?php echo $form->field($model, 'lastName') ?>
    </div>
</div>
<?php echo $form->field($model, 'email') ?>
<?php echo $form->field($model, 'password')->passwordField() ?>
<?php echo $form->field($model, 'passwordConfirm')->passwordField() ?>
<button type="submit" class="btn btn-primary">Submit</button>
<?php $form = \App\core\form\Form::end() ?>