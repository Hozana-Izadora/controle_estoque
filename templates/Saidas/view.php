<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Saida $saida
 */
?>

<?php
$this->assign('title', __('Saida') );

$this->assign('breadcrumb',
  $this->element('content/breadcrumb', [
    'home' => true,
    'breadcrumb' => [
      'List Saidas' => ['action'=>'index'],
      'View',
    ]
  ])
);
?>

<div class="view card card-primary card-outline">
  <div class="card-header d-sm-flex">
    <h2 class="card-title"><?= h($saida->id_saida) ?></h2>
  </div>
  <div class="card-body table-responsive p-0">
    <table class="table table-hover text-nowrap">
        <tr>
            <th><?= __('Loja') ?></th>
            <td><?= $saida->has('loja') ? $this->Html->link($saida->loja->id_loja, ['controller' => 'Lojas', 'action' => 'view', $saida->loja->id_loja]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Transportadora') ?></th>
            <td><?= $saida->has('transportadora') ? $this->Html->link($saida->transportadora->id_transportadora, ['controller' => 'Transportadoras', 'action' => 'view', $saida->transportadora->id_transportadora]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Id Saida') ?></th>
            <td><?= $this->Number->format($saida->id_saida) ?></td>
        </tr>
        <tr>
            <th><?= __('Total') ?></th>
            <td><?= $this->Number->format($saida->total) ?></td>
        </tr>
        <tr>
            <th><?= __('Created') ?></th>
            <td><?= h($saida->created) ?></td>
        </tr>
        <tr>
            <th><?= __('Modified') ?></th>
            <td><?= h($saida->modified) ?></td>
        </tr>
    </table>
  </div>
  <div class="card-footer d-flex">
    <div class="">
      <?= $this->Form->postLink(
          __('Delete'),
          ['action' => 'delete',  $saida->id_saida],
          ['confirm' => __('Are you sure you want to delete # {0}?',  $saida->id_saida), 'class' => 'btn btn-danger']
      ) ?>
    </div>
    <div class="ml-auto">
      <?= $this->Html->link(__('Edit'), ['action' => 'edit',  $saida->id_saida], ['class' => 'btn btn-secondary']) ?>
      <?= $this->Html->link(__('Cancel'), ['action'=>'index'], ['class'=>'btn btn-default']) ?>
    </div>
  </div>
</div>


<div class="related related-itemsaidas view card">
  <div class="card-header d-sm-flex">
    <h3 class="card-title"><?= __('Related Itemsaidas') ?></h3>
    <div class="card-toolbox">
      <?= $this->Html->link(__('New'), ['controller' => 'Itemsaidas' , 'action' => 'add'], ['class' => 'btn btn-primary btn-sm']) ?>
      <?= $this->Html->link(__('List '), ['controller' => 'Itemsaidas' , 'action' => 'index'], ['class' => 'btn btn-primary btn-sm']) ?>
    </div>
  </div>
  <div class="card-body table-responsive p-0">
    <table class="table table-hover text-nowrap">
      <tr>
          <th><?= __('Id Itemsaida') ?></th>
          <th><?= __('Saida Id') ?></th>
          <th><?= __('Produto Id') ?></th>
          <th><?= __('Lote') ?></th>
          <th><?= __('Quantidade') ?></th>
          <th><?= __('Valor') ?></th>
          <th><?= __('Created') ?></th>
          <th><?= __('Modified') ?></th>
          <th class="actions"><?= __('Actions') ?></th>
      </tr>
      <?php if (empty($saida->itemsaidas)) { ?>
        <tr>
            <td colspan="9" class="text-muted">
              Itemsaidas record not found!
            </td>
        </tr>
      <?php }else{ ?>
        <?php foreach ($saida->itemsaidas as $itemsaidas) : ?>
        <tr>
            <td><?= h($itemsaidas->id_itemsaida) ?></td>
            <td><?= h($itemsaidas->saida_id) ?></td>
            <td><?= h($itemsaidas->produto_id) ?></td>
            <td><?= h($itemsaidas->lote) ?></td>
            <td><?= h($itemsaidas->quantidade) ?></td>
            <td><?= h($itemsaidas->valor) ?></td>
            <td><?= h($itemsaidas->created) ?></td>
            <td><?= h($itemsaidas->modified) ?></td>
            <td class="actions">
              <?= $this->Html->link(__('View'), ['controller' => 'Itemsaidas', 'action' => 'view', $itemsaidas->id_itemsaida], ['class'=>'btn btn-xs btn-outline-primary']) ?>
              <?= $this->Html->link(__('Edit'), ['controller' => 'Itemsaidas', 'action' => 'edit', $itemsaidas->id_itemsaida], ['class'=>'btn btn-xs btn-outline-primary']) ?>
              <?= $this->Form->postLink(__('Delete'), ['controller' => 'Itemsaidas', 'action' => 'delete', $itemsaidas->id_itemsaida], ['class'=>'btn btn-xs btn-outline-danger', 'confirm' => __('Are you sure you want to delete # {0}?', $itemsaidas->id_itemsaida)]) ?>
            </td>
        </tr>
        <?php endforeach; ?>
      <?php } ?>
    </table>
  </div>
</div>

