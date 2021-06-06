<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Endereco $endereco
 */
?>

<?php
$this->assign('title', __('Endereco') );

$this->assign('breadcrumb',
  $this->element('content/breadcrumb', [
    'home' => true,
    'breadcrumb' => [
      'List Enderecos' => ['action'=>'index'],
      'View',
    ]
  ])
);
?>

<div class="view card card-primary card-outline">
  <div class="card-header d-sm-flex">
    <h2 class="card-title"><?= h($endereco->id_endereco) ?></h2>
  </div>
  <div class="card-body table-responsive p-0">
    <table class="table table-hover text-nowrap">
        <tr>
            <th><?= __('Logradouro') ?></th>
            <td><?= h($endereco->logradouro) ?></td>
        </tr>
        <tr>
            <th><?= __('Bairro') ?></th>
            <td><?= h($endereco->bairro) ?></td>
        </tr>
        <tr>
            <th><?= __('Cidade') ?></th>
            <td><?= h($endereco->cidade) ?></td>
        </tr>
        <tr>
            <th><?= __('Uf') ?></th>
            <td><?= h($endereco->uf) ?></td>
        </tr>
        <tr>
            <th><?= __('Cep') ?></th>
            <td><?= h($endereco->cep) ?></td>
        </tr>
        <tr>
            <th><?= __('Id Endereco') ?></th>
            <td><?= $this->Number->format($endereco->id_endereco) ?></td>
        </tr>
        <tr>
            <th><?= __('Created') ?></th>
            <td><?= h($endereco->created) ?></td>
        </tr>
        <tr>
            <th><?= __('Modified') ?></th>
            <td><?= h($endereco->modified) ?></td>
        </tr>
    </table>
  </div>
  <div class="card-footer d-flex">
    <div class="">
      <?= $this->Form->postLink(
          __('Delete'),
          ['action' => 'delete',  $endereco->id_endereco],
          ['confirm' => __('Are you sure you want to delete # {0}?',  $endereco->id_endereco), 'class' => 'btn btn-danger']
      ) ?>
    </div>
    <div class="ml-auto">
      <?= $this->Html->link(__('Edit'), ['action' => 'edit',  $endereco->id_endereco], ['class' => 'btn btn-secondary']) ?>
      <?= $this->Html->link(__('Cancel'), ['action'=>'index'], ['class'=>'btn btn-default']) ?>
    </div>
  </div>
</div>


<div class="related related-fornecedors view card">
  <div class="card-header d-sm-flex">
    <h3 class="card-title"><?= __('Related Fornecedors') ?></h3>
    <div class="card-toolbox">
      <?= $this->Html->link(__('New'), ['controller' => 'Fornecedors' , 'action' => 'add'], ['class' => 'btn btn-primary btn-sm']) ?>
      <?= $this->Html->link(__('List '), ['controller' => 'Fornecedors' , 'action' => 'index'], ['class' => 'btn btn-primary btn-sm']) ?>
    </div>
  </div>
  <div class="card-body table-responsive p-0">
    <table class="table table-hover text-nowrap">
      <tr>
          <th><?= __('Id Fornecedor') ?></th>
          <th><?= __('Fornecedor') ?></th>
          <th><?= __('Endereco Id') ?></th>
          <th><?= __('Contato') ?></th>
          <th><?= __('Cnpj') ?></th>
          <th><?= __('Numero Endereco') ?></th>
          <th><?= __('Telefone') ?></th>
          <th><?= __('Email') ?></th>
          <th><?= __('Created') ?></th>
          <th><?= __('Modified') ?></th>
          <th class="actions"><?= __('Actions') ?></th>
      </tr>
      <?php if (empty($endereco->fornecedors)) { ?>
        <tr>
            <td colspan="11" class="text-muted">
              Fornecedors record not found!
            </td>
        </tr>
      <?php }else{ ?>
        <?php foreach ($endereco->fornecedors as $fornecedors) : ?>
        <tr>
            <td><?= h($fornecedors->id_fornecedor) ?></td>
            <td><?= h($fornecedors->fornecedor) ?></td>
            <td><?= h($fornecedors->endereco_id) ?></td>
            <td><?= h($fornecedors->contato) ?></td>
            <td><?= h($fornecedors->cnpj) ?></td>
            <td><?= h($fornecedors->numero_endereco) ?></td>
            <td><?= h($fornecedors->telefone) ?></td>
            <td><?= h($fornecedors->email) ?></td>
            <td><?= h($fornecedors->created) ?></td>
            <td><?= h($fornecedors->modified) ?></td>
            <td class="actions">
              <?= $this->Html->link(__('View'), ['controller' => 'Fornecedors', 'action' => 'view', $fornecedors->id_fornecedor], ['class'=>'btn btn-xs btn-outline-primary']) ?>
              <?= $this->Html->link(__('Edit'), ['controller' => 'Fornecedors', 'action' => 'edit', $fornecedors->id_fornecedor], ['class'=>'btn btn-xs btn-outline-primary']) ?>
              <?= $this->Form->postLink(__('Delete'), ['controller' => 'Fornecedors', 'action' => 'delete', $fornecedors->id_fornecedor], ['class'=>'btn btn-xs btn-outline-danger', 'confirm' => __('Are you sure you want to delete # {0}?', $fornecedors->id_fornecedor)]) ?>
            </td>
        </tr>
        <?php endforeach; ?>
      <?php } ?>
    </table>
  </div>
</div>

<div class="related related-lojas view card">
  <div class="card-header d-sm-flex">
    <h3 class="card-title"><?= __('Related Lojas') ?></h3>
    <div class="card-toolbox">
      <?= $this->Html->link(__('New'), ['controller' => 'Lojas' , 'action' => 'add'], ['class' => 'btn btn-primary btn-sm']) ?>
      <?= $this->Html->link(__('List '), ['controller' => 'Lojas' , 'action' => 'index'], ['class' => 'btn btn-primary btn-sm']) ?>
    </div>
  </div>
  <div class="card-body table-responsive p-0">
    <table class="table table-hover text-nowrap">
      <tr>
          <th><?= __('Id Loja') ?></th>
          <th><?= __('Endereco Id') ?></th>
          <th><?= __('Loja') ?></th>
          <th><?= __('Telefone') ?></th>
          <th><?= __('Contato') ?></th>
          <th><?= __('Cnpj') ?></th>
          <th><?= __('Created') ?></th>
          <th><?= __('Modified') ?></th>
          <th class="actions"><?= __('Actions') ?></th>
      </tr>
      <?php if (empty($endereco->lojas)) { ?>
        <tr>
            <td colspan="9" class="text-muted">
              Lojas record not found!
            </td>
        </tr>
      <?php }else{ ?>
        <?php foreach ($endereco->lojas as $lojas) : ?>
        <tr>
            <td><?= h($lojas->id_loja) ?></td>
            <td><?= h($lojas->endereco_id) ?></td>
            <td><?= h($lojas->loja) ?></td>
            <td><?= h($lojas->telefone) ?></td>
            <td><?= h($lojas->contato) ?></td>
            <td><?= h($lojas->cnpj) ?></td>
            <td><?= h($lojas->created) ?></td>
            <td><?= h($lojas->modified) ?></td>
            <td class="actions">
              <?= $this->Html->link(__('View'), ['controller' => 'Lojas', 'action' => 'view', $lojas->id_loja], ['class'=>'btn btn-xs btn-outline-primary']) ?>
              <?= $this->Html->link(__('Edit'), ['controller' => 'Lojas', 'action' => 'edit', $lojas->id_loja], ['class'=>'btn btn-xs btn-outline-primary']) ?>
              <?= $this->Form->postLink(__('Delete'), ['controller' => 'Lojas', 'action' => 'delete', $lojas->id_loja], ['class'=>'btn btn-xs btn-outline-danger', 'confirm' => __('Are you sure you want to delete # {0}?', $lojas->id_loja)]) ?>
            </td>
        </tr>
        <?php endforeach; ?>
      <?php } ?>
    </table>
  </div>
</div>

<div class="related related-transportadoras view card">
  <div class="card-header d-sm-flex">
    <h3 class="card-title"><?= __('Related Transportadoras') ?></h3>
    <div class="card-toolbox">
      <?= $this->Html->link(__('New'), ['controller' => 'Transportadoras' , 'action' => 'add'], ['class' => 'btn btn-primary btn-sm']) ?>
      <?= $this->Html->link(__('List '), ['controller' => 'Transportadoras' , 'action' => 'index'], ['class' => 'btn btn-primary btn-sm']) ?>
    </div>
  </div>
  <div class="card-body table-responsive p-0">
    <table class="table table-hover text-nowrap">
      <tr>
          <th><?= __('Id Trasnportadora') ?></th>
          <th><?= __('Endereco Id') ?></th>
          <th><?= __('Transportadora') ?></th>
          <th><?= __('Numero Endereco') ?></th>
          <th><?= __('Cnpj') ?></th>
          <th><?= __('Contato') ?></th>
          <th><?= __('Telefone') ?></th>
          <th><?= __('Created') ?></th>
          <th><?= __('Modified') ?></th>
          <th class="actions"><?= __('Actions') ?></th>
      </tr>
      <?php if (empty($endereco->transportadoras)) { ?>
        <tr>
            <td colspan="10" class="text-muted">
              Transportadoras record not found!
            </td>
        </tr>
      <?php }else{ ?>
        <?php foreach ($endereco->transportadoras as $transportadoras) : ?>
        <tr>
            <td><?= h($transportadoras->id_trasnportadora) ?></td>
            <td><?= h($transportadoras->endereco_id) ?></td>
            <td><?= h($transportadoras->transportadora) ?></td>
            <td><?= h($transportadoras->numero_endereco) ?></td>
            <td><?= h($transportadoras->cnpj) ?></td>
            <td><?= h($transportadoras->contato) ?></td>
            <td><?= h($transportadoras->telefone) ?></td>
            <td><?= h($transportadoras->created) ?></td>
            <td><?= h($transportadoras->modified) ?></td>
            <td class="actions">
              <?= $this->Html->link(__('View'), ['controller' => 'Transportadoras', 'action' => 'view', $transportadoras->id_trasnportadora], ['class'=>'btn btn-xs btn-outline-primary']) ?>
              <?= $this->Html->link(__('Edit'), ['controller' => 'Transportadoras', 'action' => 'edit', $transportadoras->id_trasnportadora], ['class'=>'btn btn-xs btn-outline-primary']) ?>
              <?= $this->Form->postLink(__('Delete'), ['controller' => 'Transportadoras', 'action' => 'delete', $transportadoras->id_trasnportadora], ['class'=>'btn btn-xs btn-outline-danger', 'confirm' => __('Are you sure you want to delete # {0}?', $transportadoras->id_trasnportadora)]) ?>
            </td>
        </tr>
        <?php endforeach; ?>
      <?php } ?>
    </table>
  </div>
</div>

