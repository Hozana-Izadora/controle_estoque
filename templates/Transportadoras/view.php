<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Transportadora $transportadora
 */
?>

<?php
$this->assign('title', __('Transportadora') );

$this->assign('breadcrumb',
  $this->element('content/breadcrumb', [
    'home' => true,
    'breadcrumb' => [
      'List Transportadoras' => ['action'=>'index'],
      'View',
    ]
  ])
);
?>

<div class="view card card-primary card-outline">
  <div class="card-header d-sm-flex">
    <h2 class="card-title"><?= h($transportadora->id_transportadora) ?></h2>
  </div>
  <div class="card-body table-responsive p-0">
    <table class="table table-hover text-nowrap">
        <tr>
            <th><?= __('Endereco') ?></th>
            <td><?= $transportadora->has('endereco') ? $this->Html->link($transportadora->endereco->id_endereco, ['controller' => 'Enderecos', 'action' => 'view', $transportadora->endereco->id_endereco]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Transportadora') ?></th>
            <td><?= h($transportadora->transportadora) ?></td>
        </tr>
        <tr>
            <th><?= __('Numero Endereco') ?></th>
            <td><?= h($transportadora->numero_endereco) ?></td>
        </tr>
        <tr>
            <th><?= __('Cnpj') ?></th>
            <td><?= h($transportadora->cnpj) ?></td>
        </tr>
        <tr>
            <th><?= __('Contato') ?></th>
            <td><?= h($transportadora->contato) ?></td>
        </tr>
        <tr>
            <th><?= __('Telefone') ?></th>
            <td><?= h($transportadora->telefone) ?></td>
        </tr>
        <tr>
            <th><?= __('Id Transportadora') ?></th>
            <td><?= $this->Number->format($transportadora->id_transportadora) ?></td>
        </tr>
        <tr>
            <th><?= __('Created') ?></th>
            <td><?= h($transportadora->created) ?></td>
        </tr>
        <tr>
            <th><?= __('Modified') ?></th>
            <td><?= h($transportadora->modified) ?></td>
        </tr>
    </table>
  </div>
  <div class="card-footer d-flex">
    <div class="">
      <?= $this->Form->postLink(
          __('Delete'),
          ['action' => 'delete',  $transportadora->id_transportadora],
          ['confirm' => __('Are you sure you want to delete # {0}?',  $transportadora->id_transportadora), 'class' => 'btn btn-danger']
      ) ?>
    </div>
    <div class="ml-auto">
      <?= $this->Html->link(__('Edit'), ['action' => 'edit',  $transportadora->id_transportadora], ['class' => 'btn btn-secondary']) ?>
      <?= $this->Html->link(__('Cancel'), ['action'=>'index'], ['class'=>'btn btn-default']) ?>
    </div>
  </div>
</div>


<div class="related related-entradas view card">
  <div class="card-header d-sm-flex">
    <h3 class="card-title"><?= __('Related Entradas') ?></h3>
    <div class="card-toolbox">
      <?= $this->Html->link(__('New'), ['controller' => 'Entradas' , 'action' => 'add'], ['class' => 'btn btn-primary btn-sm']) ?>
      <?= $this->Html->link(__('List '), ['controller' => 'Entradas' , 'action' => 'index'], ['class' => 'btn btn-primary btn-sm']) ?>
    </div>
  </div>
  <div class="card-body table-responsive p-0">
    <table class="table table-hover text-nowrap">
      <tr>
          <th><?= __('Id Entrada') ?></th>
          <th><?= __('Transportadora Id') ?></th>
          <th><?= __('Data Pedido') ?></th>
          <th><?= __('Data Entrada') ?></th>
          <th><?= __('Total') ?></th>
          <th><?= __('Numero Nf') ?></th>
          <th><?= __('Created') ?></th>
          <th><?= __('Modified') ?></th>
          <th class="actions"><?= __('Actions') ?></th>
      </tr>
      <?php if (empty($transportadora->entradas)) { ?>
        <tr>
            <td colspan="9" class="text-muted">
              Entradas record not found!
            </td>
        </tr>
      <?php }else{ ?>
        <?php foreach ($transportadora->entradas as $entradas) : ?>
        <tr>
            <td><?= h($entradas->id_entrada) ?></td>
            <td><?= h($entradas->transportadora_id) ?></td>
            <td><?= h($entradas->data_pedido) ?></td>
            <td><?= h($entradas->data_entrada) ?></td>
            <td><?= h($entradas->total) ?></td>
            <td><?= h($entradas->numero_nf) ?></td>
            <td><?= h($entradas->created) ?></td>
            <td><?= h($entradas->modified) ?></td>
            <td class="actions">
              <?= $this->Html->link(__('View'), ['controller' => 'Entradas', 'action' => 'view', $entradas->id_entrada], ['class'=>'btn btn-xs btn-outline-primary']) ?>
              <?= $this->Html->link(__('Edit'), ['controller' => 'Entradas', 'action' => 'edit', $entradas->id_entrada], ['class'=>'btn btn-xs btn-outline-primary']) ?>
              <?= $this->Form->postLink(__('Delete'), ['controller' => 'Entradas', 'action' => 'delete', $entradas->id_entrada], ['class'=>'btn btn-xs btn-outline-danger', 'confirm' => __('Are you sure you want to delete # {0}?', $entradas->id_entrada)]) ?>
            </td>
        </tr>
        <?php endforeach; ?>
      <?php } ?>
    </table>
  </div>
</div>

<div class="related related-saidas view card">
  <div class="card-header d-sm-flex">
    <h3 class="card-title"><?= __('Related Saidas') ?></h3>
    <div class="card-toolbox">
      <?= $this->Html->link(__('New'), ['controller' => 'Saidas' , 'action' => 'add'], ['class' => 'btn btn-primary btn-sm']) ?>
      <?= $this->Html->link(__('List '), ['controller' => 'Saidas' , 'action' => 'index'], ['class' => 'btn btn-primary btn-sm']) ?>
    </div>
  </div>
  <div class="card-body table-responsive p-0">
    <table class="table table-hover text-nowrap">
      <tr>
          <th><?= __('Id Saida') ?></th>
          <th><?= __('Loja Id') ?></th>
          <th><?= __('Transportadora Id') ?></th>
          <th><?= __('Total') ?></th>
          <th><?= __('Created') ?></th>
          <th><?= __('Modified') ?></th>
          <th class="actions"><?= __('Actions') ?></th>
      </tr>
      <?php if (empty($transportadora->saidas)) { ?>
        <tr>
            <td colspan="7" class="text-muted">
              Saidas record not found!
            </td>
        </tr>
      <?php }else{ ?>
        <?php foreach ($transportadora->saidas as $saidas) : ?>
        <tr>
            <td><?= h($saidas->id_saida) ?></td>
            <td><?= h($saidas->loja_id) ?></td>
            <td><?= h($saidas->transportadora_id) ?></td>
            <td><?= h($saidas->total) ?></td>
            <td><?= h($saidas->created) ?></td>
            <td><?= h($saidas->modified) ?></td>
            <td class="actions">
              <?= $this->Html->link(__('View'), ['controller' => 'Saidas', 'action' => 'view', $saidas->id_saida], ['class'=>'btn btn-xs btn-outline-primary']) ?>
              <?= $this->Html->link(__('Edit'), ['controller' => 'Saidas', 'action' => 'edit', $saidas->id_saida], ['class'=>'btn btn-xs btn-outline-primary']) ?>
              <?= $this->Form->postLink(__('Delete'), ['controller' => 'Saidas', 'action' => 'delete', $saidas->id_saida], ['class'=>'btn btn-xs btn-outline-danger', 'confirm' => __('Are you sure you want to delete # {0}?', $saidas->id_saida)]) ?>
            </td>
        </tr>
        <?php endforeach; ?>
      <?php } ?>
    </table>
  </div>
</div>

