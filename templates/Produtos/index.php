<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Produto[]|\Cake\Collection\CollectionInterface $produtos
 */
?>

<?php $this->assign('title', __('Produtos') ); ?>

<?php
$this->assign('breadcrumb',
  $this->element('content/breadcrumb', [
    'home' => true,
    'breadcrumb' => [
      'List Produtos',
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
      <?= $this->Html->link(__('New Produto'), ['action' => 'add'], ['class' => 'btn btn-primary btn-sm']) ?>
    </div>
  </div>
  <!-- /.card-header -->
  <div class="card-body table-responsive p-0">
    <table class="table table-hover text-nowrap">
        <thead>
          <tr>
              <th><?= $this->Paginator->sort('id_produto') ?></th>
              <th><?= $this->Paginator->sort('categoria_id') ?></th>
              <th><?= $this->Paginator->sort('fornecedor_id') ?></th>
              <th><?= $this->Paginator->sort('produto') ?></th>
              <th><?= $this->Paginator->sort('quantidade') ?></th>
              <th><?= $this->Paginator->sort('quantidade_minima') ?></th>
              <th><?= $this->Paginator->sort('created') ?></th>
              <th><?= $this->Paginator->sort('modified') ?></th>
              <th class="actions"><?= __('Actions') ?></th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($produtos as $produto): ?>
          <tr>
            <td><?= $this->Number->format($produto->id_produto) ?></td>
            <td><?= $produto->has('categoria') ? $this->Html->link($produto->categoria->id_categoria, ['controller' => 'Categorias', 'action' => 'view', $produto->categoria->id_categoria]) : '' ?></td>
            <td><?= $produto->has('fornecedor') ? $this->Html->link($produto->fornecedor->id_fornecedor, ['controller' => 'Fornecedors', 'action' => 'view', $produto->fornecedor->id_fornecedor]) : '' ?></td>
            <td><?= h($produto->produto) ?></td>
            <td><?= $this->Number->format($produto->quantidade) ?></td>
            <td><?= $this->Number->format($produto->quantidade_minima) ?></td>
            <td><?= h($produto->created) ?></td>
            <td><?= h($produto->modified) ?></td>
            <td class="actions">
              <?= $this->Html->link(__('View'), ['action' => 'view', $produto->id_produto], ['class'=>'btn btn-xs btn-outline-primary', 'escape'=>false]) ?>
              <?= $this->Html->link(__('Edit'), ['action' => 'edit', $produto->id_produto], ['class'=>'btn btn-xs btn-outline-primary', 'escape'=>false]) ?>
              <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $produto->id_produto], ['class'=>'btn btn-xs btn-outline-danger', 'escape'=>false, 'confirm' => __('Are you sure you want to delete # {0}?', $produto->id_produto)]) ?>
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
