<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Transportadora[]|\Cake\Collection\CollectionInterface $transportadoras
 */
?>

<?php $this->assign('title', __('Transportadoras') ); ?>

<?php
$this->assign('breadcrumb',
  $this->element('content/breadcrumb', [
    'home' => true,
    'breadcrumb' => [
      'List Transportadoras',
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
      <?= $this->Html->link(__('New Transportadora'), ['action' => 'add'], ['class' => 'btn btn-primary btn-sm']) ?>
    </div>
  </div>
  <!-- /.card-header -->
  <div class="card-body table-responsive p-0">
    <table class="table table-hover text-nowrap">
        <thead>
          <tr>
              <th><?= $this->Paginator->sort('id_transportadora') ?></th>
              <th><?= $this->Paginator->sort('endereco_id') ?></th>
              <th><?= $this->Paginator->sort('transportadora') ?></th>
              <th><?= $this->Paginator->sort('numero_endereco') ?></th>
              <th><?= $this->Paginator->sort('cnpj') ?></th>
              <th><?= $this->Paginator->sort('contato') ?></th>
              <th><?= $this->Paginator->sort('telefone') ?></th>
              <th><?= $this->Paginator->sort('created') ?></th>
              <th><?= $this->Paginator->sort('modified') ?></th>
              <th class="actions"><?= __('Actions') ?></th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($transportadoras as $transportadora): ?>
          <tr>
            <td><?= $this->Number->format($transportadora->id_transportadora) ?></td>
            <td><?= $transportadora->has('endereco') ? $this->Html->link($transportadora->endereco->id_endereco, ['controller' => 'Enderecos', 'action' => 'view', $transportadora->endereco->id_endereco]) : '' ?></td>
            <td><?= h($transportadora->transportadora) ?></td>
            <td><?= h($transportadora->numero_endereco) ?></td>
            <td><?= h($transportadora->cnpj) ?></td>
            <td><?= h($transportadora->contato) ?></td>
            <td><?= h($transportadora->telefone) ?></td>
            <td><?= h($transportadora->created) ?></td>
            <td><?= h($transportadora->modified) ?></td>
            <td class="actions">
              <?= $this->Html->link(__('View'), ['action' => 'view', $transportadora->id_transportadora], ['class'=>'btn btn-xs btn-outline-primary', 'escape'=>false]) ?>
              <?= $this->Html->link(__('Edit'), ['action' => 'edit', $transportadora->id_transportadora], ['class'=>'btn btn-xs btn-outline-primary', 'escape'=>false]) ?>
              <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $transportadora->id_transportadora], ['class'=>'btn btn-xs btn-outline-danger', 'escape'=>false, 'confirm' => __('Are you sure you want to delete # {0}?', $transportadora->id_transportadora)]) ?>
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
