<?php
$formFields = $this->element('formCreate');
$form .= $this->Html->tag('h1', 'Login', array('class' => 'h3 mb-3 font-weight-normal'));
$form .= $this->Form->control('login', array(
    'required' => false,
    'div' => false,
    'label' => array('class' => 'sr-only'),
    'class' => 'form-control', 
    'placeholder' => 'Login',
    'error' => array('attributes' => array('class' => 'invalid-feedback'))    
));
$form .= $this->Form->control('senha', array(
    'required' => false,
    'type' => 'password',
    'label' => array('class' => 'sr-only'),
    'div' => false,
    'placeholder' => 'Senha',
    'class' => 'form-control', 
    'error' => array('attributes' => array('class' => 'invalid-feedback'))    
));
$form .= $this->Form->submit('Entrar', array('div' => false, 'class' => 'btn btn-danger btn-lg btn-block mb-3'));
$form .= $this->Flash->render('danger'); 
$form .= $this->Flash->render('warning'); 
$form .= $this->Form->end();

echo $form;

$this->Js->buffer('$(".form-error").addClass("is-invalid");');
$this->Js->buffer('createRequestGets("#content a");');
$this->Js->buffer('createRequestPosts("#content input[type=submit]");');

if ($this->request->is('ajax')) {
    echo $this->Js->writeBuffer();
}
