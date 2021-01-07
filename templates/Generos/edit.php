<?php
$this->extend('/Common/form');

$this->assign('title', 'Alterar Gênero');

$formFields = $this->element('formCreate');
$formFields .= $this->Form->hidden('id');
$formFields .= $this->Form->input('nome');

$this->assign('formFields', $formFields);