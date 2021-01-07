<?php
$this->extend('/Common/index');

$this->assign('title', 'Usuários');

$searchFields = $this->Form->control('nome', array(
    'required' => false,
    'label' => array('text' => 'Nome', 'class' => 'sr-only'),
    'templates' => [
        'input' => '<input type="{{type}}" name="{{name}}" class="form-control mb-2 mr-sm-2"{{attrs}}/>'
    ],
    'placeholder' => 'Nome...'
));

$this->assign('searchFields', $searchFields);

$titulos = array('Nome', '');
$tableHeaders = $this->Html->tableHeaders($titulos);
$this->assign('tableHeaders', $tableHeaders);

$detalhe = array();
foreach ($usuarios as $usuario) {
    $editLink = $this->Html->link('Alterar', ['action' => 'edit', $usuario->id], array('update' => '#content'));
    $deleteLink = $this->Html->link('Excluir', ['action' => 'delete', $usuario->id], array('update' => '#content', 'confirm' => 'Tem certeza?'));
    $viewLink = $this->Html->link($usuario->nome, ['action' => 'view', $usuario->id], array('update' => '#content'));
    $detalhe[] = array(
        $viewLink, 
        $editLink . ' ' . $deleteLink
    );
}
$tableCells = $this->Html->tableCells($detalhe);
$this->assign('tableCells', $tableCells);
