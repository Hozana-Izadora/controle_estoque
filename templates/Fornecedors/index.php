<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Fornecedor[]|\Cake\Collection\CollectionInterface $fornecedors
 */
?>

<?php $this->assign('title', __('Fornecedors') ); ?>

<?php
$this->assign('breadcrumb',
  $this->element('content/breadcrumb', [
    'home' => true,
    'breadcrumb' => [
      'List Fornecedors',
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
      <?= $this->Html->link(__('New Fornecedor'), ['action' => 'add'], ['class' => 'btn btn-primary btn-sm']) ?>
    </div>
  </div>
  <!-- /.card-header -->
  <div class="card-body table-responsive p-0">
    <table class="table table-hover text-nowrap">
        <thead>
          <tr>
              <th><?= $this->Paginator->sort('id_fornecedor') ?></th>
              <th><?= $this->Paginator->sort('fornecedor') ?></th>
              <th><?= $this->Paginator->sort('endereco_id') ?></th>
              <th><?= $this->Paginator->sort('contato') ?></th>
              <th><?= $this->Paginator->sort('cnpj') ?></th>
              <th><?= $this->Paginator->sort('numero_endereco') ?></th>
              <th><?= $this->Paginator->sort('telefone') ?></th>
              <th><?= $this->Paginator->sort('email') ?></th>
              <th><?= $this->Paginator->sort('created') ?></th>
              <th><?= $this->Paginator->sort('modified') ?></th>
              <th class="actions"><?= __('Actions') ?></th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($fornecedors as $fornecedor): ?>
          <tr>
            <td><?= $this->Number->format($fornecedor->id_fornecedor) ?></td>
            <td><?= h($fornecedor->fornecedor) ?></td>
            <td><?= $fornecedor->has('endereco') ? $this->Html->link($fornecedor->endereco->id_endereco, ['controller' => 'Enderecos', 'action' => 'view', $fornecedor->endereco->id_endereco]) : '' ?></td>
            <td><?= h($fornecedor->contato) ?></td>
            <td><?= h($fornecedor->cnpj) ?></td>
            <td><?= h($fornecedor->numero_endereco) ?></td>
            <td><?= h($fornecedor->telefone) ?></td>
            <td><?= h($fornecedor->email) ?></td>
            <td><?= h($fornecedor->created) ?></td>
            <td><?= h($fornecedor->modified) ?></td>
            <td class="actions">
              <?= $this->Html->link(__('View'), ['action' => 'view', $fornecedor->id_fornecedor], ['class'=>'btn btn-xs btn-outline-primary', 'escape'=>false]) ?>
              <?= $this->Html->link(__('Edit'), ['action' => 'edit', $fornecedor->id_fornecedor], ['class'=>'btn btn-xs btn-outline-primary', 'escape'=>false]) ?>
              <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $fornecedor->id_fornecedor], ['class'=>'btn btn-xs btn-outline-danger', 'escape'=>false, 'confirm' => __('Are you sure you want to delete # {0}?', $fornecedor->id_fornecedor)]) ?>
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
