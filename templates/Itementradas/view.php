<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Itementrada $itementrada
 */
?>

<?php
$this->assign('title', __('Itementrada') );

$this->assign('breadcrumb',
  $this->element('content/breadcrumb', [
    'home' => true,
    'breadcrumb' => [
      'List Itementradas' => ['action'=>'index'],
      'View',
    ]
  ])
);
?>

<div class="view card card-primary card-outline">
  <div class="card-header d-sm-flex">
    <h2 class="card-title"><?= h($itementrada->id_itementrada) ?></h2>
  </div>
  <div class="card-body table-responsive p-0">
    <table class="table table-hover text-nowrap">
        <tr>
            <th><?= __('Produto') ?></th>
            <td><?= $itementrada->has('produto') ? $this->Html->link($itementrada->produto->id_produto, ['controller' => 'Produtos', 'action' => 'view', $itementrada->produto->id_produto]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Entrada') ?></th>
            <td><?= $itementrada->has('entrada') ? $this->Html->link($itementrada->entrada->id_entrada, ['controller' => 'Entradas', 'action' => 'view', $itementrada->entrada->id_entrada]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Lote') ?></th>
            <td><?= h($itementrada->lote) ?></td>
        </tr>
        <tr>
            <th><?= __('Id Itementrada') ?></th>
            <td><?= $this->Number->format($itementrada->id_itementrada) ?></td>
        </tr>
        <tr>
            <th><?= __('Quantidade') ?></th>
            <td><?= $this->Number->format($itementrada->quantidade) ?></td>
        </tr>
        <tr>
            <th><?= __('Valor') ?></th>
            <td><?= $this->Number->format($itementrada->valor) ?></td>
        </tr>
        <tr>
            <th><?= __('Created') ?></th>
            <td><?= h($itementrada->created) ?></td>
        </tr>
        <tr>
            <th><?= __('Modified') ?></th>
            <td><?= h($itementrada->modified) ?></td>
        </tr>
    </table>
  </div>
  <div class="card-footer d-flex">
    <div class="">
      <?= $this->Form->postLink(
          __('Delete'),
          ['action' => 'delete',  $itementrada->id_itementrada],
          ['confirm' => __('Are you sure you want to delete # {0}?',  $itementrada->id_itementrada), 'class' => 'btn btn-danger']
      ) ?>
    </div>
    <div class="ml-auto">
      <?= $this->Html->link(__('Edit'), ['action' => 'edit',  $itementrada->id_itementrada], ['class' => 'btn btn-secondary']) ?>
      <?= $this->Html->link(__('Cancel'), ['action'=>'index'], ['class'=>'btn btn-default']) ?>
    </div>
  </div>
</div>


