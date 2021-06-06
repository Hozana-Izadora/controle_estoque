<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Saida $saida
 */
?>

<?php $this->assign('title', __('Add Saida') ); ?>

<?php
$this->assign('breadcrumb',
  $this->element('content/breadcrumb', [
    'home' => true,
    'breadcrumb' => [
      'List Saidas' => ['action'=>'index'],
      'Add',
    ]
  ])
);
?>


<div class="card card-primary card-outline">
  <?= $this->Form->create($saida) ?>
  <div class="card-body">
    <?php
      echo $this->Form->control('loja_id', ['options' => $lojas]);
      echo $this->Form->control('transportadora_id', ['options' => $transportadoras]);
      echo $this->Form->control('total');
    ?>
  </div>

  <div class="card-footer d-flex">
    <div class="ml-auto">
      <?= $this->Form->button(__('Save')) ?>
      <?= $this->Html->link(__('Cancel'), ['action'=>'index'], ['class'=>'btn btn-default']) ?>
    </div>
  </div>

  <?= $this->Form->end() ?>
</div>
