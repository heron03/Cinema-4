<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Filmes Controller
 *
 * @property \App\Model\Table\FilmesTable $Filmes
 * @method \App\Model\Entity\Filme[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class FilmesController extends AppController
{
    public $paginate = array(
        'fields' => array('id', 'nome', 'ano', 'Genero.nome'),
        'conditions' => array('deleted IS NULL'),
        'limit' => 10,
        'order' => array('nome' => 'asc')    
    );

    public function setPaginateConditions() {
        $nomeOrIdioma = '';
        if ($this->request->is('post')) {
            $nomeOrIdioma = $this->request->data['Filme']['nome_or_idioma'];
            $this->Session->write('nome_or_idioma', $nomeOrIdioma);
        } else {
            $nomeOrIdioma = $this->Session->read('nome_or_idioma');
            $this->request->data('nome_or_idioma', $nomeOrIdioma);
        }
        if (!empty($nomeOrIdioma)) {
            $this->paginate['conditions']['or'] = array(
                'nome LIKE' => '%' .trim($nomeOrIdioma) . '%',
                'idioma LIKE' => '%' . trim($nomeOrIdioma) . '%'
            );
        }
    }

    public function add() {
        parent::add();
        $this->setGeneroAndAtors();
    }

    public function getEditData($id) {
        $this->setGeneroAndAtors();
        $fields = array('id', 'nome', 'duracao', 'idioma', 'ano', 'genero_id');
        $conditions = array('id' => $id);
     
        return $this->Filme->find('first', compact('fields', 'conditions'));
    }

    public function view($id = null) {
        parent::view($id);
        $this->setGeneroAndAtors();
    }

    public function setGeneroAndAtors() {
        $fields = array('Genero.id', 'Genero.nome');
        $generos = $this->Filme->Genero->find('list', compact('fields'));
        $fields = array('Ator.id', 'Ator.nome');
        $ators = $this->Filme->Ator->find('list', compact('fields'));
        $this->set('generos', $generos);        
        $this->set('ators', $ators);        
    }

}
