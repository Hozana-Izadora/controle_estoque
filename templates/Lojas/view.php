<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Loja $loja
 */
?>

<?php
$this->assign('title', __('Loja') );

$this->assign('breadcrumb',
  $this->element('content/breadcrumb', [
    'home' => true,
    'breadcrumb' => [
      'List Lojas' => ['action'=>'index'],
      'View',
    ]
  ])
);
?>

<div class="view card card-primary card-outline">
  <div class="card-header d-sm-flex">
    <h2 class="card-title"><?= h($loja->id_loja) ?></h2>
  </div>
  <div class="card-body table-responsive p-0">
    <table class="table table-hover text-nowrap">
        <tr>
            <th><?= __('Endereco') ?></th>
            <td><?= $loja->has('endereco') ? $this->Html->link($loja->endereco->id_endereco, ['controller' => 'Enderecos', 'action' => 'view', $loja->endereco->id_endereco]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Loja') ?></th>
            <td><?= h($loja->loja) ?></td>
        </tr>
        <tr>
            <th><?= __('Telefone') ?></th>
            <td><?= h($loja->telefone) ?></td>
        </tr>
        <tr>
            <th><?= __('Contato') ?></th>
            <td><?= h($loja->contato) ?></td>
        </tr>
        <tr>
            <th><?= __('Cnpj') ?></th>
            <td><?= h($loja->cnpj) ?></td>
        </tr>
        <tr>
            <th><?= __('Id Loja') ?></th>
            <td><?= $this->Number->format($loja->id_loja) ?></td>
        </tr>
        <tr>
            <th><?= __('Created') ?></th>
            <td><?= h($loja->created) ?></td>
        </tr>
        <tr>
            <th><?= __('Modified') ?></th>
            <td><?= h($loja->modified) ?></td>
        </tr>
    </table>
  </div>
  <div class="card-footer d-flex">
    <div class="">
      <?= $this->Form->postLink(
          __('Delete'),
          ['action' => 'delete',  $loja->id_loja],
          ['confirm' => __('Are you sure you want to delete # {0}?',  $loja->id_loja), 'class' => 'btn btn-danger']
      ) ?>
    </div>
    <div class="ml-auto">
      <?= $this->Html->link(__('Edit'), ['action' => 'edit',  $loja->id_loja], ['class' => 'btn btn-secondary']) ?>
      <?= $this->Html->link(__('Cancel'), ['action'=>'index'], ['class'=>'btn btn-default']) ?>
    </div>
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
      <?php if (empty($loja->saidas)) { ?>
        <tr>
            <td colspan="7" class="text-muted">
              Saidas record not found!
            </td>
        </tr>
      <?php }else{ ?>
        <?php foreach ($loja->saidas as $saidas) : ?>
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

