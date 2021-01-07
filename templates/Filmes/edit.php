<?php
$this->extend('/Common/form');

$this->assign('title', 'Alterar Filme');

$formFields = $this->element('formCreate');

$formFields .= $this->Form->hidden('id');
$formFields .= $this->Html->div('form-row', 
    $this->Form->control('nome', array(
        'div' => array('class' => 'form-group col-md-6'),
    )) .
    $this->Form->control('idioma', array(
        'type' => 'select',
        'options' => array('Inglês' => 'Inglês', 'Português' => 'Português', 'Espanhol' => 'Espanhol', 'Francês' => 'Francês'),
        'div' => array('class' => 'form-group col-md-6'),
    ))
);
$formFields .= $this->Html->div('form-row', 
    $this->Form->control('duracao', array(
        'label' => array('text' => 'Duração'),
        'div' => array('class' => 'form-group col-md-4'),
    )) .
    $this->Form->control('ano', array(
        'maxlength' => 4,
        'div' => array('class' => 'form-group col-md-4'),
    )) .
    $this->Form->control('genero_id', array(
        'type' => 'select', 
        'label' => array('text' => 'Gênero'),
        'options' => $generos,
        'div' => array('class' => 'form-group col-md-4'),
    ))
);
$formFields .= $this->Form->control('Ator', array(
    'type' => 'select',
    'label' => array('text' => 'Selecione os Atores'),
    'multiple' => true, 
    'options' => $ators,
));

$this->assign('formFields', $formFields);
