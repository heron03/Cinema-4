<?php
$this->extend('/Common/index');

$this->assign('title', 'Filmes');

$searchFields = $this->Form->input('nome_or_idioma', array(
    'required' => false,
    'label' => array('text' => 'Nome', 'class' => 'sr-only'),
    'templates' => [
        'input' => '<input type="{{type}}" name="{{name}}" class="form-control mb-2 mr-sm-2"{{attrs}}/>'
    ],
    'placeholder' => 'Nome...'
));
$this->assign('searchFields', $searchFields);

$titulos = array('Nome', 'Ano', 'Gênero',  '');
$tableHeaders = $this->Html->tableHeaders($titulos);
$this->assign('tableHeaders', $tableHeaders);

$detalhe = array();
foreach ($filmes as $filme) {
    $editLink = $this->Html->link('Alterar', ['action' => 'edit', $filme->id], array('update' => '#content'));
    $deleteLink = $this->Html->link('Excluir', ['action' => 'delete', $filme->id], array('update' => '#content', 'confirm' => 'Tem certeza?'));
    $viewLink = $this->Html->link($filme->nome, ['action' => 'view', $filme->id], array('update' => '#content'));
    $detalhe[] = array(
        $viewLink, 
        $filme->ano,
        $filme->Genero->nome,
        $editLink . ' ' . $deleteLink
    );
}
$tableCells = $this->Html->tableCells($detalhe);
$this->assign('tableCells', $tableCells);

