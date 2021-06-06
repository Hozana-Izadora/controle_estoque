<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Endereco $endereco
 */
?>

<?php $this->assign('title', __('Edit Endereco') ); ?>

<?php
$this->assign('breadcrumb',
  $this->element('content/breadcrumb', [
    'home' => true,
    'breadcrumb' => [
      'List Enderecos' => ['action'=>'index'],
      'View' => ['action'=>'view', $endereco->id_endereco],
      'Edit',
    ]
  ])
);
?>


<div class="card card-primary card-outline">
  <?= $this->Form->create($endereco) ?>
  <div class="card-body">
    <?php
      echo $this->Form->control('logradouro');
      echo $this->Form->control('bairro');
      echo $this->Form->control('cidade');
      echo $this->Form->control('uf');
      echo $this->Form->control('cep');
    ?>
  </div>

  <div class="card-footer d-flex">
    <div class="">
      <?= $this->Form->postLink(
          __('Delete'),
          ['action' => 'delete', $endereco->id_endereco],
          ['confirm' => __('Are you sure you want to delete # {0}?', $endereco->id_endereco), 'class' => 'btn btn-danger']
      ) ?>
    </div>
    <div class="ml-auto">
      <?= $this->Form->button(__('Save')) ?>
      <?= $this->Html->link(__('Cancel'), ['action'=>'index'], ['class'=>'btn btn-default']) ?>
    </div>
  </div>

  <?= $this->Form->end() ?>
</div>
