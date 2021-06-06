<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Produto $produto
 */
?>

<?php
$this->assign('title', __('Produto') );

$this->assign('breadcrumb',
  $this->element('content/breadcrumb', [
    'home' => true,
    'breadcrumb' => [
      'List Produtos' => ['action'=>'index'],
      'View',
    ]
  ])
);
?>

<div class="view card card-primary card-outline">
  <div class="card-header d-sm-flex">
    <h2 class="card-title"><?= h($produto->id_produto) ?></h2>
  </div>
  <div class="card-body table-responsive p-0">
    <table class="table table-hover text-nowrap">
        <tr>
            <th><?= __('Categoria') ?></th>
            <td><?= $produto->has('categoria') ? $this->Html->link($produto->categoria->id_categoria, ['controller' => 'Categorias', 'action' => 'view', $produto->categoria->id_categoria]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Fornecedor') ?></th>
            <td><?= $produto->has('fornecedor') ? $this->Html->link($produto->fornecedor->id_fornecedor, ['controller' => 'Fornecedors', 'action' => 'view', $produto->fornecedor->id_fornecedor]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Produto') ?></th>
            <td><?= h($produto->produto) ?></td>
        </tr>
        <tr>
            <th><?= __('Id Produto') ?></th>
            <td><?= $this->Number->format($produto->id_produto) ?></td>
        </tr>
        <tr>
            <th><?= __('Quantidade') ?></th>
            <td><?= $this->Number->format($produto->quantidade) ?></td>
        </tr>
        <tr>
            <th><?= __('Quantidade Minima') ?></th>
            <td><?= $this->Number->format($produto->quantidade_minima) ?></td>
        </tr>
        <tr>
            <th><?= __('Created') ?></th>
            <td><?= h($produto->created) ?></td>
        </tr>
        <tr>
            <th><?= __('Modified') ?></th>
            <td><?= h($produto->modified) ?></td>
        </tr>
    </table>
  </div>
  <div class="card-footer d-flex">
    <div class="">
      <?= $this->Form->postLink(
          __('Delete'),
          ['action' => 'delete',  $produto->id_produto],
          ['confirm' => __('Are you sure you want to delete # {0}?',  $produto->id_produto), 'class' => 'btn btn-danger']
      ) ?>
    </div>
    <div class="ml-auto">
      <?= $this->Html->link(__('Edit'), ['action' => 'edit',  $produto->id_produto], ['class' => 'btn btn-secondary']) ?>
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
      <?php if (empty($produto->itementradas)) { ?>
        <tr>
            <td colspan="9" class="text-muted">
              Itementradas record not found!
            </td>
        </tr>
      <?php }else{ ?>
        <?php foreach ($produto->itementradas as $itementradas) : ?>
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
      <?php if (empty($produto->itemsaidas)) { ?>
        <tr>
            <td colspan="9" class="text-muted">
              Itemsaidas record not found!
            </td>
        </tr>
      <?php }else{ ?>
        <?php foreach ($produto->itemsaidas as $itemsaidas) : ?>
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

