<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Saida $saida
 */
?>

<?php $this->assign('title', __('Edit Saida') ); ?>

<?php
$this->assign('breadcrumb',
  $this->element('content/breadcrumb', [
    'home' => true,
    'breadcrumb' => [
      'List Saidas' => ['action'=>'index'],
      'View' => ['action'=>'view', $saida->id_saida],
      'Edit',
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
    <div class="">
      <?= $this->Form->postLink(
          __('Delete'),
          ['action' => 'delete', $saida->id_saida],
          ['confirm' => __('Are you sure you want to delete # {0}?', $saida->id_saida), 'class' => 'btn btn-danger']
      ) ?>
    </div>
    <div class="ml-auto">
      <?= $this->Form->button(__('Save')) ?>
      <?= $this->Html->link(__('Cancel'), ['action'=>'index'], ['class'=>'btn btn-default']) ?>
    </div>
  </div>

  <?= $this->Form->end() ?>
</div>
