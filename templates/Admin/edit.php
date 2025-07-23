<?php
// Set the layout
$this->layout = 'admin_layout';

// Set the page title
$this->assign('title', 'Update Admin');
?>

<div class="content-header">
    <div >
        <h1 class="content-title"><?= __('Update Admin') ?></h1>
    </div>
</div>

<div class="content-card">
  
    <!-- Search Box -->
   
 <?= $this->Form->create($admin, ['id' => 'adminForm']) ?>
            <div class="table-responsive">
            <div class="practicearea form content">
            <div class="col-12 fw-bold">

            <div class= "d-flex justify-content-between">

            <?= $this->Form->control('name', [
            'class' => 'form-control', 
            'label' => ['class' => 'form-label', 'text' => 'Name<span class="required-asterisk">*</span>', 'escape' => false],
            'required' => true,
            'placeholder' => 'Name'
        ]) ?>

        <?= $this->Form->control('role', [
            'class' => 'form-control', 
            'label' => ['class' => 'form-label ', 'text' => 'Designation<span class="required-asterisk">*</span>', 'escape' => false],
            'required' => true,
            'placeholder' => 'Role'
        ]) ?>

        <?= $this->Form->control('place_of_posting', [
            'class' => 'form-control', 
            'label' => ['class' => 'form-label ', 'text' => 'Place of Posting<span class="required-asterisk">*</span>', 'escape' => false],
            'required' => true,
            'placeholder' => 'Place of Posting'
        ]) ?>

<?= $this->Form->control('phone', [
            'class' => 'form-control', 
            'label' => ['class' => 'form-label ', 'text' => 'Mobile No<span class="required-asterisk">*</span>', 'escape' => false],
            'required' => true,
            'placeholder' => 'Mobile'
        ]) ?>


</div>

<div class= "d-flex justify-content-between">
<?= $this->Form->control('email', [
            'class' => 'form-control', 
            'label' => ['class' => 'form-label mt-4', 'text' => 'Email<span class="required-asterisk">*</span>', 'escape' => false],
            'type' => 'email',
            'required' => true,
            'placeholder' => 'Email'
        ]) ?>

        <?= $this->Form->control('profile', [
            'class' => 'form-control', 
            'label' => ['class' => 'form-label mt-4', 'text' => 'User Profile<span class="required-asterisk">*</span>', 'escape' => false],
            'type' => 'select',
            'options' => [
                'admin' => 'Admin',
                'article' => 'Article',
                'manager' => 'Manager',
                'account' => 'Account'
            ],
            'empty' => 'Select Profile',
            'required' => true
        ]) ?>

        <?= $this->Form->control('username', [
            'class' => 'form-control', 
            'label' => ['class' => 'form-label mt-4', 'text' => 'Username<span class="required-asterisk">*</span>', 'escape' => false],
            'required' => true,
            'placeholder' => 'Username'
        ]) ?>
         <?= $this->Form->control('password', [
            'class' => 'form-control', 
            'label' => ['class' => 'form-label mt-4', 'text' => 'Password<span class="required-asterisk">*</span>', 'escape' => false],
            'id' => 'password',
            'required' => true,
            'placeholder' => 'Password'
        ]) ?>


</div>
        
      

       
       



         <label class= "mt-4">Status<span class="required-asterisk">*</span></label>
    <div class="form-check">
        <?= $this->Form->radio('status', [
            '1' => ' Approved',
            '0' => ' Suspended'
        ], [
            'class' => 'form-check-input',
            'label' => [
                'class' => 'form-check-label d-flex justify-content-start'
            ],
            'templates' => [
                'radio' => '<input type="radio" name="{{name}}" value="{{value}}"{{attrs}}>',
                'radioWrapper' => '{{label}}'
            ]
        ]) ?>
    </div>
    </div>

    <div class="d-flex justify-content-end mt-3">
        <?= $this->Form->button(__('Update'), ['class' => 'btn btn-primary', 'id' => 'submitBtn']) ?>
    </div>
            </div>
        </div>
            <?= $this->Form->end() ?>
    
    <!-- Paginator -->
   
</div>