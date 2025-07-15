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
            <?= $this->Html->link(__('Edit Order'), ['action' => 'edit', $order->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Order'), ['action' => 'delete', $order->id], ['confirm' => __('Are you sure you want to delete # {0}?', $order->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Orders'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Order'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="orders view content">
            <h3><?= h($order->invoiceNumber) ?></h3>
            <table>
                <tr>
                    <th><?= __('InvoiceNumber') ?></th>
                    <td><?= h($order->invoiceNumber) ?></td>
                </tr>
                <tr>
                    <th><?= __('Amount') ?></th>
                    <td><?= h($order->amount) ?></td>
                </tr>
                <tr>
                    <th><?= __('PaymentMode') ?></th>
                    <td><?= h($order->paymentMode) ?></td>
                </tr>
                <tr>
                    <th><?= __('UserName') ?></th>
                    <td><?= h($order->userName) ?></td>
                </tr>
                <tr>
                    <th><?= __('UserId') ?></th>
                    <td><?= h($order->userId) ?></td>
                </tr>
                <tr>
                    <th><?= __('EmailId') ?></th>
                    <td><?= h($order->emailId) ?></td>
                </tr>
                <tr>
                    <th><?= __('ListingId') ?></th>
                    <td><?= h($order->listingId) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($order->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('PaymentStatus') ?></th>
                    <td><?= $this->Number->format($order->paymentStatus) ?></td>
                </tr>
                <tr>
                    <th><?= __('OrderDate') ?></th>
                    <td><?= h($order->orderDate) ?></td>
                </tr>
                <tr>
                    <th><?= __('InvoiceDate') ?></th>
                    <td><?= h($order->invoiceDate) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
