<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Categoria $categoria
 */
?>

<?php $this->assign('title', __('Add Categoria') ); ?>

<?php
$this->assign('breadcrumb',
  $this->element('content/breadcrumb', [
    'home' => true,
    'breadcrumb' => [
      'List Categorias' => ['action'=>'index'],
      'Add',
    ]
  ])
);
?>


<div class="card card-primary card-outline">
  <?= $this->Form->create($categoria) ?>
  <div class="card-body">
    <?php
      echo $this->Form->control('categoria');
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
