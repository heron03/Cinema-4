<?php
$this->extend('/Common/form');

$this->assign('title', 'Visualizar Gênero');

$formFields = $this->element('formCreate');
$formFields .= $this->Form->input('nome');

$this->assign('formFields', $formFields);