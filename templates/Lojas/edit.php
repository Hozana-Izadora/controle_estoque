<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Loja $loja
 */
?>

<?php $this->assign('title', __('Edit Loja') ); ?>

<?php
$this->assign('breadcrumb',
  $this->element('content/breadcrumb', [
    'home' => true,
    'breadcrumb' => [
      'List Lojas' => ['action'=>'index'],
      'View' => ['action'=>'view', $loja->id_loja],
      'Edit',
    ]
  ])
);
?>


<div class="card card-primary card-outline">
  <?= $this->Form->create($loja) ?>
  <div class="card-body">
    <?php
      echo $this->Form->control('endereco_id', ['options' => $enderecos]);
      echo $this->Form->control('loja');
      echo $this->Form->control('telefone');
      echo $this->Form->control('contato');
      echo $this->Form->control('cnpj');
    ?>
  </div>

  <div class="card-footer d-flex">
    <div class="">
      <?= $this->Form->postLink(
          __('Delete'),
          ['action' => 'delete', $loja->id_loja],
          ['confirm' => __('Are you sure you want to delete # {0}?', $loja->id_loja), 'class' => 'btn btn-danger']
      ) ?>
    </div>
    <div class="ml-auto">
      <?= $this->Form->button(__('Save')) ?>
      <?= $this->Html->link(__('Cancel'), ['action'=>'index'], ['class'=>'btn btn-default']) ?>
    </div>
  </div>

  <?= $this->Form->end() ?>
</div>
