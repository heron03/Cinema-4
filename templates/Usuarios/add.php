<?php
$this->extend('/Common/form');

$this->assign('title', 'Novo Usuário');

$formFields = $this->element('formCreate');
$formFields .= $this->Form->control('nome');
$formFields .=$this->Html->div('row',
    $this->Form->control('login', array(
        'div' => array('class' => 'form-group col-md-6')
    )) .
    $this->Form->control('senha', array(
        'type' => 'password',
        'div' => array('class' => 'form-group col-md-6')
    )) 
);
$formFields .= $this->Form->control('aro_parent_id', array(
    'type' => 'select',
    'label' => array('text' => 'Permissão'),
    'options' => $aros,
));

$this->assign('formFields', $formFields);
