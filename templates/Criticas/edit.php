<?php
$this->extend('/Common/form');

$this->assign('title', 'Alterar Crítica');

$this->request->data['Critica']['data_avaliacao'] = date('d/m/Y', strtotime($this->request->data['Critica']['data_avaliacao']));
$formFields = $this->element('formCreate');
$formFields .= $this->Form->hidden('id');
$formFields .= $this->Html->div('form-row',
    $this->Form->control('nome', array(
        'div' => array('class' => 'form-group col-md-6'),
    )) .
    $this->Form->control('avaliacao', array(
        'div' => array('class' => 'form-group col-md-6'),
        'label' => array('text' => 'Avaliação'),
    ))
);
$formFields .= $this->Html->div('form-row',
    $this->Form->control('data_avaliacao', array(
        'label' => array('text' => 'Data Avaliação'),
        'div' => array('class' => 'form-group col-md-6'),
    )) .
    $this->Form->control('filme_id', array(
        'type' => 'select', 
        'label' => array('text' => 'Selecione o Filme'),
        'div' => array('class' => 'form-group col-md-6'),
        'options' => $filmes
    ))
);

$this->assign('formFields', $formFields);
