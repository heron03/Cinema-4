<?php
$this->extend('/Common/form');

$this->assign('title', 'Alterar Usuário');

$formFields = $this->element('formCreate');
$formFields .= $this->Form->hidden('id');
$formFields .= $this->Form->control('nome');
$formFields .=$this->Html->div('row',
    $this->Form->control('login', array(
        'div' => array('class' => 'form-group col-md-6')
    )) .
    $this->Form->control('aro_parent_id', array(
        'div' => array('class' => 'form-group col-md-6'),
        'label' => array('text' => 'Permissão'),
        'type' => 'select',
        'options' => $aros,
    ))
);

$this->assign('formFields', $formFields);
