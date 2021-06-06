<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Itemsaida $itemsaida
 */
?>

<?php
$this->assign('title', __('Itemsaida') );

$this->assign('breadcrumb',
  $this->element('content/breadcrumb', [
    'home' => true,
    'breadcrumb' => [
      'List Itemsaidas' => ['action'=>'index'],
      'View',
    ]
  ])
);
?>

<div class="view card card-primary card-outline">
  <div class="card-header d-sm-flex">
    <h2 class="card-title"><?= h($itemsaida->id_itemsaida) ?></h2>
  </div>
  <div class="card-body table-responsive p-0">
    <table class="table table-hover text-nowrap">
        <tr>
            <th><?= __('Saida') ?></th>
            <td><?= $itemsaida->has('saida') ? $this->Html->link($itemsaida->saida->id_saida, ['controller' => 'Saidas', 'action' => 'view', $itemsaida->saida->id_saida]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Produto') ?></th>
            <td><?= $itemsaida->has('produto') ? $this->Html->link($itemsaida->produto->id_produto, ['controller' => 'Produtos', 'action' => 'view', $itemsaida->produto->id_produto]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Lote') ?></th>
            <td><?= h($itemsaida->lote) ?></td>
        </tr>
        <tr>
            <th><?= __('Id Itemsaida') ?></th>
            <td><?= $this->Number->format($itemsaida->id_itemsaida) ?></td>
        </tr>
        <tr>
            <th><?= __('Quantidade') ?></th>
            <td><?= $this->Number->format($itemsaida->quantidade) ?></td>
        </tr>
        <tr>
            <th><?= __('Valor') ?></th>
            <td><?= $this->Number->format($itemsaida->valor) ?></td>
        </tr>
        <tr>
            <th><?= __('Created') ?></th>
            <td><?= h($itemsaida->created) ?></td>
        </tr>
        <tr>
            <th><?= __('Modified') ?></th>
            <td><?= h($itemsaida->modified) ?></td>
        </tr>
    </table>
  </div>
  <div class="card-footer d-flex">
    <div class="">
      <?= $this->Form->postLink(
          __('Delete'),
          ['action' => 'delete',  $itemsaida->id_itemsaida],
          ['confirm' => __('Are you sure you want to delete # {0}?',  $itemsaida->id_itemsaida), 'class' => 'btn btn-danger']
      ) ?>
    </div>
    <div class="ml-auto">
      <?= $this->Html->link(__('Edit'), ['action' => 'edit',  $itemsaida->id_itemsaida], ['class' => 'btn btn-secondary']) ?>
      <?= $this->Html->link(__('Cancel'), ['action'=>'index'], ['class'=>'btn btn-default']) ?>
    </div>
  </div>
</div>


