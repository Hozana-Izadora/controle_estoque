<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Transportadora $transportadora
 */
?>

<?php $this->assign('title', __('Edit Transportadora') ); ?>

<?php
$this->assign('breadcrumb',
  $this->element('content/breadcrumb', [
    'home' => true,
    'breadcrumb' => [
      'List Transportadoras' => ['action'=>'index'],
      'View' => ['action'=>'view', $transportadora->id_transportadora],
      'Edit',
    ]
  ])
);
?>


<div class="card card-primary card-outline">
  <?= $this->Form->create($transportadora) ?>
  <div class="card-body">
    <?php
      echo $this->Form->control('endereco_id', ['options' => $enderecos]);
      echo $this->Form->control('transportadora');
      echo $this->Form->control('numero_endereco');
      echo $this->Form->control('cnpj');
      echo $this->Form->control('contato');
      echo $this->Form->control('telefone');
    ?>
  </div>

  <div class="card-footer d-flex">
    <div class="">
      <?= $this->Form->postLink(
          __('Delete'),
          ['action' => 'delete', $transportadora->id_transportadora],
          ['confirm' => __('Are you sure you want to delete # {0}?', $transportadora->id_transportadora), 'class' => 'btn btn-danger']
      ) ?>
    </div>
    <div class="ml-auto">
      <?= $this->Form->button(__('Save')) ?>
      <?= $this->Html->link(__('Cancel'), ['action'=>'index'], ['class'=>'btn btn-default']) ?>
    </div>
  </div>

  <?= $this->Form->end() ?>
</div>
