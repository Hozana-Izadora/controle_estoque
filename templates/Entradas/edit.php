<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Entrada $entrada
 */
?>

<?php $this->assign('title', __('Edit Entrada') ); ?>

<?php
$this->assign('breadcrumb',
  $this->element('content/breadcrumb', [
    'home' => true,
    'breadcrumb' => [
      'List Entradas' => ['action'=>'index'],
      'View' => ['action'=>'view', $entrada->id_entrada],
      'Edit',
    ]
  ])
);
?>


<div class="card card-primary card-outline">
  <?= $this->Form->create($entrada) ?>
  <div class="card-body">
    <?php
      echo $this->Form->control('transportadora_id', ['options' => $transportadoras]);
      echo $this->Form->control('data_pedido');
      echo $this->Form->control('data_entrada');
      echo $this->Form->control('total');
      echo $this->Form->control('numero_nf');
    ?>
  </div>

  <div class="card-footer d-flex">
    <div class="">
      <?= $this->Form->postLink(
          __('Delete'),
          ['action' => 'delete', $entrada->id_entrada],
          ['confirm' => __('Are you sure you want to delete # {0}?', $entrada->id_entrada), 'class' => 'btn btn-danger']
      ) ?>
    </div>
    <div class="ml-auto">
      <?= $this->Form->button(__('Save')) ?>
      <?= $this->Html->link(__('Cancel'), ['action'=>'index'], ['class'=>'btn btn-default']) ?>
    </div>
  </div>

  <?= $this->Form->end() ?>
</div>
