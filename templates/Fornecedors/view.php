<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Fornecedor $fornecedor
 */
?>

<?php
$this->assign('title', __('Fornecedor') );

$this->assign('breadcrumb',
  $this->element('content/breadcrumb', [
    'home' => true,
    'breadcrumb' => [
      'List Fornecedors' => ['action'=>'index'],
      'View',
    ]
  ])
);
?>

<div class="view card card-primary card-outline">
  <div class="card-header d-sm-flex">
    <h2 class="card-title"><?= h($fornecedor->id_fornecedor) ?></h2>
  </div>
  <div class="card-body table-responsive p-0">
    <table class="table table-hover text-nowrap">
        <tr>
            <th><?= __('Fornecedor') ?></th>
            <td><?= h($fornecedor->fornecedor) ?></td>
        </tr>
        <tr>
            <th><?= __('Endereco') ?></th>
            <td><?= $fornecedor->has('endereco') ? $this->Html->link($fornecedor->endereco->id_endereco, ['controller' => 'Enderecos', 'action' => 'view', $fornecedor->endereco->id_endereco]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Contato') ?></th>
            <td><?= h($fornecedor->contato) ?></td>
        </tr>
        <tr>
            <th><?= __('Cnpj') ?></th>
            <td><?= h($fornecedor->cnpj) ?></td>
        </tr>
        <tr>
            <th><?= __('Numero Endereco') ?></th>
            <td><?= h($fornecedor->numero_endereco) ?></td>
        </tr>
        <tr>
            <th><?= __('Telefone') ?></th>
            <td><?= h($fornecedor->telefone) ?></td>
        </tr>
        <tr>
            <th><?= __('Email') ?></th>
            <td><?= h($fornecedor->email) ?></td>
        </tr>
        <tr>
            <th><?= __('Id Fornecedor') ?></th>
            <td><?= $this->Number->format($fornecedor->id_fornecedor) ?></td>
        </tr>
        <tr>
            <th><?= __('Created') ?></th>
            <td><?= h($fornecedor->created) ?></td>
        </tr>
        <tr>
            <th><?= __('Modified') ?></th>
            <td><?= h($fornecedor->modified) ?></td>
        </tr>
    </table>
  </div>
  <div class="card-footer d-flex">
    <div class="">
      <?= $this->Form->postLink(
          __('Delete'),
          ['action' => 'delete',  $fornecedor->id_fornecedor],
          ['confirm' => __('Are you sure you want to delete # {0}?',  $fornecedor->id_fornecedor), 'class' => 'btn btn-danger']
      ) ?>
    </div>
    <div class="ml-auto">
      <?= $this->Html->link(__('Edit'), ['action' => 'edit',  $fornecedor->id_fornecedor], ['class' => 'btn btn-secondary']) ?>
      <?= $this->Html->link(__('Cancel'), ['action'=>'index'], ['class'=>'btn btn-default']) ?>
    </div>
  </div>
</div>


<div class="related related-produtos view card">
  <div class="card-header d-sm-flex">
    <h3 class="card-title"><?= __('Related Produtos') ?></h3>
    <div class="card-toolbox">
      <?= $this->Html->link(__('New'), ['controller' => 'Produtos' , 'action' => 'add'], ['class' => 'btn btn-primary btn-sm']) ?>
      <?= $this->Html->link(__('List '), ['controller' => 'Produtos' , 'action' => 'index'], ['class' => 'btn btn-primary btn-sm']) ?>
    </div>
  </div>
  <div class="card-body table-responsive p-0">
    <table class="table table-hover text-nowrap">
      <tr>
          <th><?= __('Id Produto') ?></th>
          <th><?= __('Categoria Id') ?></th>
          <th><?= __('Fornecedor Id') ?></th>
          <th><?= __('Produto') ?></th>
          <th><?= __('Quantidade') ?></th>
          <th><?= __('Quantidade Minima') ?></th>
          <th><?= __('Created') ?></th>
          <th><?= __('Modified') ?></th>
          <th class="actions"><?= __('Actions') ?></th>
      </tr>
      <?php if (empty($fornecedor->produtos)) { ?>
        <tr>
            <td colspan="9" class="text-muted">
              Produtos record not found!
            </td>
        </tr>
      <?php }else{ ?>
        <?php foreach ($fornecedor->produtos as $produtos) : ?>
        <tr>
            <td><?= h($produtos->id_produto) ?></td>
            <td><?= h($produtos->categoria_id) ?></td>
            <td><?= h($produtos->fornecedor_id) ?></td>
            <td><?= h($produtos->produto) ?></td>
            <td><?= h($produtos->quantidade) ?></td>
            <td><?= h($produtos->quantidade_minima) ?></td>
            <td><?= h($produtos->created) ?></td>
            <td><?= h($produtos->modified) ?></td>
            <td class="actions">
              <?= $this->Html->link(__('View'), ['controller' => 'Produtos', 'action' => 'view', $produtos->id_produto], ['class'=>'btn btn-xs btn-outline-primary']) ?>
              <?= $this->Html->link(__('Edit'), ['controller' => 'Produtos', 'action' => 'edit', $produtos->id_produto], ['class'=>'btn btn-xs btn-outline-primary']) ?>
              <?= $this->Form->postLink(__('Delete'), ['controller' => 'Produtos', 'action' => 'delete', $produtos->id_produto], ['class'=>'btn btn-xs btn-outline-danger', 'confirm' => __('Are you sure you want to delete # {0}?', $produtos->id_produto)]) ?>
            </td>
        </tr>
        <?php endforeach; ?>
      <?php } ?>
    </table>
  </div>
</div>

