<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Order $order
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Orders'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="orders form content">
            <?= $this->Form->create($order) ?>
            <fieldset>
                <legend><?= __('Add Order') ?></legend>
                <?php
                    echo $this->Form->control('orderDate');
                    echo $this->Form->control('paymentStatus');
                    echo $this->Form->control('invoiceNumber');
                    echo $this->Form->control('invoiceDate');
                    echo $this->Form->control('amount');
                    echo $this->Form->control('paymentMode');
                    echo $this->Form->control('userName');
                    echo $this->Form->control('userId');
                    echo $this->Form->control('emailId');
                    echo $this->Form->control('listingId');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
