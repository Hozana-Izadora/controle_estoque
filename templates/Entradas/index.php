<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Entrada[]|\Cake\Collection\CollectionInterface $entradas
 */
?>

<?php $this->assign('title', __('Entradas') ); ?>

<?php
$this->assign('breadcrumb',
  $this->element('content/breadcrumb', [
    'home' => true,
    'breadcrumb' => [
      'List Entradas',
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
      <?= $this->Html->link(__('New Entrada'), ['action' => 'add'], ['class' => 'btn btn-primary btn-sm']) ?>
    </div>
  </div>
  <!-- /.card-header -->
  <div class="card-body table-responsive p-0">
    <table class="table table-hover text-nowrap">
        <thead>
          <tr>
              <th><?= $this->Paginator->sort('id_entrada') ?></th>
              <th><?= $this->Paginator->sort('transportadora_id') ?></th>
              <th><?= $this->Paginator->sort('data_pedido') ?></th>
              <th><?= $this->Paginator->sort('data_entrada') ?></th>
              <th><?= $this->Paginator->sort('total') ?></th>
              <th><?= $this->Paginator->sort('numero_nf') ?></th>
              <th><?= $this->Paginator->sort('created') ?></th>
              <th><?= $this->Paginator->sort('modified') ?></th>
              <th class="actions"><?= __('Actions') ?></th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($entradas as $entrada): ?>
          <tr>
            <td><?= $this->Number->format($entrada->id_entrada) ?></td>
            <td><?= $entrada->has('transportadora') ? $this->Html->link($entrada->transportadora->id_transportadora, ['controller' => 'Transportadoras', 'action' => 'view', $entrada->transportadora->id_transportadora]) : '' ?></td>
            <td><?= h($entrada->data_pedido) ?></td>
            <td><?= h($entrada->data_entrada) ?></td>
            <td><?= $this->Number->format($entrada->total) ?></td>
            <td><?= $this->Number->format($entrada->numero_nf) ?></td>
            <td><?= h($entrada->created) ?></td>
            <td><?= h($entrada->modified) ?></td>
            <td class="actions">
              <?= $this->Html->link(__('View'), ['action' => 'view', $entrada->id_entrada], ['class'=>'btn btn-xs btn-outline-primary', 'escape'=>false]) ?>
              <?= $this->Html->link(__('Edit'), ['action' => 'edit', $entrada->id_entrada], ['class'=>'btn btn-xs btn-outline-primary', 'escape'=>false]) ?>
              <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $entrada->id_entrada], ['class'=>'btn btn-xs btn-outline-danger', 'escape'=>false, 'confirm' => __('Are you sure you want to delete # {0}?', $entrada->id_entrada)]) ?>
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
