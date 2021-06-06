<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Fornecedor $fornecedor
 */
?>

<?php $this->assign('title', __('Edit Fornecedor') ); ?>

<?php
$this->assign('breadcrumb',
  $this->element('content/breadcrumb', [
    'home' => true,
    'breadcrumb' => [
      'List Fornecedors' => ['action'=>'index'],
      'View' => ['action'=>'view', $fornecedor->id_fornecedor],
      'Edit',
    ]
  ])
);
?>


<div class="card card-primary card-outline">
  <?= $this->Form->create($fornecedor) ?>
  <div class="card-body">
    <?php
      echo $this->Form->control('fornecedor');
      echo $this->Form->control('endereco_id', ['options' => $enderecos]);
      echo $this->Form->control('contato');
      echo $this->Form->control('cnpj');
      echo $this->Form->control('numero_endereco');
      echo $this->Form->control('telefone');
      echo $this->Form->control('email');
    ?>
  </div>

  <div class="card-footer d-flex">
    <div class="">
      <?= $this->Form->postLink(
          __('Delete'),
          ['action' => 'delete', $fornecedor->id_fornecedor],
          ['confirm' => __('Are you sure you want to delete # {0}?', $fornecedor->id_fornecedor), 'class' => 'btn btn-danger']
      ) ?>
    </div>
    <div class="ml-auto">
      <?= $this->Form->button(__('Save')) ?>
      <?= $this->Html->link(__('Cancel'), ['action'=>'index'], ['class'=>'btn btn-default']) ?>
    </div>
  </div>

  <?= $this->Form->end() ?>
</div>
