<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Itementrada $itementrada
 */
?>

<?php $this->assign('title', __('Add Itementrada') ); ?>

<?php
$this->assign('breadcrumb',
  $this->element('content/breadcrumb', [
    'home' => true,
    'breadcrumb' => [
      'List Itementradas' => ['action'=>'index'],
      'Add',
    ]
  ])
);
?>


<div class="card card-primary card-outline">
  <?= $this->Form->create($itementrada) ?>
  <div class="card-body">
    <?php
      echo $this->Form->control('produto_id', ['options' => $produtos]);
      echo $this->Form->control('entrada_id', ['options' => $entradas]);
      echo $this->Form->control('lote');
      echo $this->Form->control('quantidade');
      echo $this->Form->control('valor');
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
