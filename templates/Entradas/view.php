<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Entrada $entrada
 */
?>

<?php
$this->assign('title', __('Entrada') );

$this->assign('breadcrumb',
  $this->element('content/breadcrumb', [
    'home' => true,
    'breadcrumb' => [
      'List Entradas' => ['action'=>'index'],
      'View',
    ]
  ])
);
?>

<div class="view card card-primary card-outline">
  <div class="card-header d-sm-flex">
    <h2 class="card-title"><?= h($entrada->id_entrada) ?></h2>
  </div>
  <div class="card-body table-responsive p-0">
    <table class="table table-hover text-nowrap">
        <tr>
            <th><?= __('Transportadora') ?></th>
            <td><?= $entrada->has('transportadora') ? $this->Html->link($entrada->transportadora->id_transportadora, ['controller' => 'Transportadoras', 'action' => 'view', $entrada->transportadora->id_transportadora]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Id Entrada') ?></th>
            <td><?= $this->Number->format($entrada->id_entrada) ?></td>
        </tr>
        <tr>
            <th><?= __('Total') ?></th>
            <td><?= $this->Number->format($entrada->total) ?></td>
        </tr>
        <tr>
            <th><?= __('Numero Nf') ?></th>
            <td><?= $this->Number->format($entrada->numero_nf) ?></td>
        </tr>
        <tr>
            <th><?= __('Data Pedido') ?></th>
            <td><?= h($entrada->data_pedido) ?></td>
        </tr>
        <tr>
            <th><?= __('Data Entrada') ?></th>
            <td><?= h($entrada->data_entrada) ?></td>
        </tr>
        <tr>
            <th><?= __('Created') ?></th>
            <td><?= h($entrada->created) ?></td>
        </tr>
        <tr>
            <th><?= __('Modified') ?></th>
            <td><?= h($entrada->modified) ?></td>
        </tr>
    </table>
  </div>
  <div class="card-footer d-flex">
    <div class="">
      <?= $this->Form->postLink(
          __('Delete'),
          ['action' => 'delete',  $entrada->id_entrada],
          ['confirm' => __('Are you sure you want to delete # {0}?',  $entrada->id_entrada), 'class' => 'btn btn-danger']
      ) ?>
    </div>
    <div class="ml-auto">
      <?= $this->Html->link(__('Edit'), ['action' => 'edit',  $entrada->id_entrada], ['class' => 'btn btn-secondary']) ?>
      <?= $this->Html->link(__('Cancel'), ['action'=>'index'], ['class'=>'btn btn-default']) ?>
    </div>
  </div>
</div>


<div class="related related-itementradas view card">
  <div class="card-header d-sm-flex">
    <h3 class="card-title"><?= __('Related Itementradas') ?></h3>
    <div class="card-toolbox">
      <?= $this->Html->link(__('New'), ['controller' => 'Itementradas' , 'action' => 'add'], ['class' => 'btn btn-primary btn-sm']) ?>
      <?= $this->Html->link(__('List '), ['controller' => 'Itementradas' , 'action' => 'index'], ['class' => 'btn btn-primary btn-sm']) ?>
    </div>
  </div>
  <div class="card-body table-responsive p-0">
    <table class="table table-hover text-nowrap">
      <tr>
          <th><?= __('Id Itementrada') ?></th>
          <th><?= __('Produto Id') ?></th>
          <th><?= __('Entrada Id') ?></th>
          <th><?= __('Lote') ?></th>
          <th><?= __('Quantidade') ?></th>
          <th><?= __('Valor') ?></th>
          <th><?= __('Created') ?></th>
          <th><?= __('Modified') ?></th>
          <th class="actions"><?= __('Actions') ?></th>
      </tr>
      <?php if (empty($entrada->itementradas)) { ?>
        <tr>
            <td colspan="9" class="text-muted">
              Itementradas record not found!
            </td>
        </tr>
      <?php }else{ ?>
        <?php foreach ($entrada->itementradas as $itementradas) : ?>
        <tr>
            <td><?= h($itementradas->id_itementrada) ?></td>
            <td><?= h($itementradas->produto_id) ?></td>
            <td><?= h($itementradas->entrada_id) ?></td>
            <td><?= h($itementradas->lote) ?></td>
            <td><?= h($itementradas->quantidade) ?></td>
            <td><?= h($itementradas->valor) ?></td>
            <td><?= h($itementradas->created) ?></td>
            <td><?= h($itementradas->modified) ?></td>
            <td class="actions">
              <?= $this->Html->link(__('View'), ['controller' => 'Itementradas', 'action' => 'view', $itementradas->id_itementrada], ['class'=>'btn btn-xs btn-outline-primary']) ?>
              <?= $this->Html->link(__('Edit'), ['controller' => 'Itementradas', 'action' => 'edit', $itementradas->id_itementrada], ['class'=>'btn btn-xs btn-outline-primary']) ?>
              <?= $this->Form->postLink(__('Delete'), ['controller' => 'Itementradas', 'action' => 'delete', $itementradas->id_itementrada], ['class'=>'btn btn-xs btn-outline-danger', 'confirm' => __('Are you sure you want to delete # {0}?', $itementradas->id_itementrada)]) ?>
            </td>
        </tr>
        <?php endforeach; ?>
      <?php } ?>
    </table>
  </div>
</div>

