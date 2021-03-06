<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Itementrada[]|\Cake\Collection\CollectionInterface $itementradas
 */
?>

<?php $this->assign('title', __('Itementradas') ); ?>

<?php
$this->assign('breadcrumb',
  $this->element('content/breadcrumb', [
    'home' => true,
    'breadcrumb' => [
      'List Itementradas',
    ]
  ])
);
?>

<div class="card card-primary card-outline">
  <div class="card-header d-sm-flex">
    <h2 class="card-title"><!-- --></h2>
    <div class="card-toolbox">
      <?= $this->Paginator->limitControl([], null, [
            'label'=>false,
            'class' => 'form-control-sm',
          ]); ?>
      <?= $this->Html->link(__('New Itementrada'), ['action' => 'add'], ['class' => 'btn btn-primary btn-sm']) ?>
    </div>
  </div>
  <!-- /.card-header -->
  <div class="card-body table-responsive p-0">
    <table class="table table-hover text-nowrap">
        <thead>
          <tr>
              <th><?= $this->Paginator->sort('id_itementrada') ?></th>
              <th><?= $this->Paginator->sort('produto_id') ?></th>
              <th><?= $this->Paginator->sort('entrada_id') ?></th>
              <th><?= $this->Paginator->sort('lote') ?></th>
              <th><?= $this->Paginator->sort('quantidade') ?></th>
              <th><?= $this->Paginator->sort('valor') ?></th>
              <th><?= $this->Paginator->sort('created') ?></th>
              <th><?= $this->Paginator->sort('modified') ?></th>
              <th class="actions"><?= __('Actions') ?></th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($itementradas as $itementrada): ?>
          <tr>
            <td><?= $this->Number->format($itementrada->id_itementrada) ?></td>
            <td><?= $itementrada->has('produto') ? $this->Html->link($itementrada->produto->id_produto, ['controller' => 'Produtos', 'action' => 'view', $itementrada->produto->id_produto]) : '' ?></td>
            <td><?= $itementrada->has('entrada') ? $this->Html->link($itementrada->entrada->id_entrada, ['controller' => 'Entradas', 'action' => 'view', $itementrada->entrada->id_entrada]) : '' ?></td>
            <td><?= h($itementrada->lote) ?></td>
            <td><?= $this->Number->format($itementrada->quantidade) ?></td>
            <td><?= $this->Number->format($itementrada->valor) ?></td>
            <td><?= h($itementrada->created) ?></td>
            <td><?= h($itementrada->modified) ?></td>
            <td class="actions">
              <?= $this->Html->link(__('View'), ['action' => 'view', $itementrada->id_itementrada], ['class'=>'btn btn-xs btn-outline-primary', 'escape'=>false]) ?>
              <?= $this->Html->link(__('Edit'), ['action' => 'edit', $itementrada->id_itementrada], ['class'=>'btn btn-xs btn-outline-primary', 'escape'=>false]) ?>
              <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $itementrada->id_itementrada], ['class'=>'btn btn-xs btn-outline-danger', 'escape'=>false, 'confirm' => __('Are you sure you want to delete # {0}?', $itementrada->id_itementrada)]) ?>
            </td>
          </tr>
          <?php endforeach; ?>
        </tbody>
    </table>
  </div>
  <!-- /.card-body -->

  <div class="card-footer d-md-flex paginator">
    <div class="mr-auto" style="font-size:.8rem">
      <?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?>
    </div>

    <ul class="pagination pagination-sm">
      <?= $this->Paginator->first('<i class="fas fa-angle-double-left"></i>', ['escape'=>false]) ?>
      <?= $this->Paginator->prev('<i class="fas fa-angle-left"></i>', ['escape'=>false]) ?>
      <?= $this->Paginator->numbers() ?>
      <?= $this->Paginator->next('<i class="fas fa-angle-right"></i>', ['escape'=>false]) ?>
      <?= $this->Paginator->last('<i class="fas fa-angle-double-right"></i>', ['escape'=>false]) ?>
    </ul>

  </div>
  <!-- /.card-footer -->
</div>
