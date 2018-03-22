<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
use Cake\Mailer\Email;
/**
 * Pessoaeventos Controller
 *
 * @property \App\Model\Table\PessoaeventosTable $Pessoaeventos
 */
class PessoaeventosController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
   // public $uses = array('PessoaEventos');
    public function index($id = null)
    {
        $this->paginate = [
            'contain' => ['Pessoas', 'Eventos', 'Users'],
            'conditions'=>['Eventos.id'=>$id]
        ];
        $query= $this->Pessoaeventos->find()->order(['Pessoaeventos.created' => 'DESC']);
         $pessoaeventos = $this->paginate($query);

        $this->set(compact('pessoaeventos'));
        $this->set('_serialize', ['pessoaeventos']);
    }

    /**
     * View method
     *
     * @param string|null $id Pessoaevento id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $pessoaevento = $this->Pessoaeventos->get($id, [
            'contain' => ['Pessoas', 'Eventos', 'Users']
        ]);

        $this->set('pessoaevento', $pessoaevento);
        $this->set('_serialize', ['pessoaevento']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add($id=null)
    {

        $pessoasTable = TableRegistry::get('Pessoas');
        $pessoa = $pessoasTable->get($id);
            $pessoaevento = $this->Pessoaeventos->newEntity();
        if ($this->request->is('post')) {
            $pessoaevento = $this->Pessoaeventos->patchEntity($pessoaevento, $this->request->data);
        
            if ($this->Pessoaeventos->save($pessoaevento)) {
                  $email = new Email('default');
                    $email->helpers(['Html', 'Text']);
                     $email->from(array('conferencia@juventuderelevante.com.br'=>'Juventude Relevante'))
                ->emailFormat('html')
                    ->to($pessoa->email)
                    ->subject('CONFERÊNCIA RELEVANTE');
                   
                    $message= '
                     
                      <style>
                      .texto{
                       text-align:center;
                       line-height:2;
                       font-size: 20px;
                        color:#a8b8c5;
                       }
                       </style>
   
                      <div class="texto">
                        
                         <h1> Graça e Paz Jovem Relevante,</h1>
                         <br>
                                           
        
        Sua inscrição na Conferência Relevante 2017 está confirmada!<BR>

Nos acompanhe nas redes sociais para ficar por dentro da programação!
@juventuderelevanteIECG <BR>

Estamos na expectativa do que Deus fará em nosso meio nesses dias!<BR>
Qualquer dúvida nos pergunte. 
Estamos à disposição.

                         <br>
                         
Que Deus te abençoe,<BR>
                         <h2>Prs. Aldo Giovanni e Rebeca Sousa</h2>
                         </div>'
                    ;
                   $email->send($message);
                $this->Flash->success(__('Inscrição Feita com Sucesso'));
         
                  return $this->redirect(['controller'=>'pessoas','action' => 'index']);
            } else {
                $this->Flash->error(__('The pessoaevento could not be saved. Please, try again.'));
            }
        }
        $eventos = $this->Pessoaeventos->Eventos->find('list', ['limit' => 200])->where(['Eventos.id'=>2]);
        $user = $this->Auth->user();
        $this->set(compact('pessoaevento', 'user','pessoa','eventos'));
        $this->set('_serialize', ['pessoaevento']);
        
    }

    /**
     * Edit method
     *
     * @param string|null $id Pessoaevento id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $pessoaevento = $this->Pessoaeventos->get($id, [
            'contain' => ['Pessoas', 'Eventos', 'Users']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $pessoaevento = $this->Pessoaeventos->patchEntity($pessoaevento, $this->request->data);
            if ($this->Pessoaeventos->save($pessoaevento)) {
                $this->Flash->success(__('Confirmado a Presença'));

                return $this->redirect(['action' => 'index', $pessoaevento->evento_id]);
            } else {
                $this->Flash->error(__('The pessoaevento could not be saved. Please, try again.'));
            }
        }
        $eventos = $this->Pessoaeventos->Eventos->find('list', ['limit' => 200]);
        $user = $this->Auth->user();
        $this->set(compact('pessoaevento', 'eventos', 'user'));
        $this->set('_serialize', ['pessoaevento']);
    }

 

    /**
     * Delete method
     *
     * @param string|null $id Pessoaevento id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $pessoaevento = $this->Pessoaeventos->get($id);
        if ($this->Pessoaeventos->delete($pessoaevento)) {
            $this->Flash->success(__('The pessoaevento has been deleted.'));
        } else {
            $this->Flash->error(__('The pessoaevento could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
