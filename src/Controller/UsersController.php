<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Mailer\Email;
use Cake\I18n\Time;
require_once(ROOT . DS . 'src'. DS . 'Controller'. DS . 'Component' . DS . 'ImageTool.php');
use ImageTool;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 */
class UsersController extends AppController
{
    public function initialize()
    {
        parent::initialize();
        $this->Auth->allow('add');
        $this->Auth->allow('contact');
    }

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Roles']
        ];
        $users = $this->paginate($this->Users);

        $this->set(compact('users'));
        $this->set('_serialize', ['users']);
    }

    /**
     * View method
     *
     * @param string|null $id User id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => ['Roles', 'Comments.Users','Comments.Articles']
        ]);

        $this->set('user', $user);
        $this->set('_serialize', ['user']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            # upload image
            if (!empty($_FILES['picture_url']) ) {
                $img = $_FILES['picture_url']['name'];
                $extention = explode('.', $img);
                $rename = str_replace($extention[0], $user->id, $img);
                $temp = $_FILES['picture_url']['tmp_name'];
                $pathimg = WWW_ROOT . "img" . DS . "user" . DS . $rename;
                move_uploaded_file($temp, $pathimg);
                ImageTool::resize(array(
                    'input' => $pathimg,
                    'output' => $pathimg,
                    'width' =>100,
                    'height' => 100,
                    'mode' => 'fit'
                ));
                $this->request->data['picture_url'] = $rename;
            }

            $user = $this->Users->patchEntity($user, $this->request->data);
            if ($this->Users->save($user)) {

                $email = new Email();
                $email->viewVars(['users' => $user])
                    ->template('welcome')
                    ->emailFormat('html')
                    ->to($user->email)
                    ->subject('Bienvenue')
                    ->send();

                $this->Flash->success('Un mail vous a été envoyé.');
                return $this->redirect(['action' => 'view',$user->id]);
            } else {
                $this->Flash->error(__('Votre compte n\'a pas été ajouté.'));
                $this->Flash->error('Impossible de créer votre compte');
            }
        }
        $this->set(compact('user', 'roles'));
        $this->set('_serialize', ['user']);
    }

    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        if($id!=$this->Auth->User('id')){
            return $this->redirect(['controller'=>'Articles', 'action' => 'index',]);
        }

        $user = $this->Users->get($id, [
            'contain' => []
        ]);

        if ($this->request->is(['patch', 'post', 'put'])) {
            # upload image
            if (!empty($_FILES['picture_url']) ) {
                $img = $_FILES['picture_url']['name'];
                $extention = explode('.', $img);
                $rename = str_replace($extention[0], $user->id, $img);
                $temp = $_FILES['picture_url']['tmp_name'];
                $pathimg = WWW_ROOT . "img" . DS . "user" . DS . $rename;
                move_uploaded_file($temp, $pathimg);
                ImageTool::resize(array(
                    'input' => $pathimg,
                    'output' => $pathimg,
                    'width' =>100,
                    'height' => 100,
                    'mode' => 'fit'
                ));
                $this->request->data['picture_url'] = $rename;
            }
            $user = $this->Users->patchEntity($user, $this->request->data);
            if ($this->Users->save($user)) {
                $this->Flash->success(__('Vos modifications sont enregistrées.'));

                return $this->redirect(['action' => 'view', $user->id]);
            } else {
                $this->Flash->error(__('Vos modifications ne sont pas enregistrées.'));
            }
        }
        $roles = $this->Users->Roles->find('list', ['limit' => 200]);
        $this->set(compact('user', 'roles'));
        $this->set('_serialize', ['user']);
    }

    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->success(__('L\'utilisateur est supprimé.'));
        } else {
            $this->Flash->error(__('L\'utilisateur n\'a pas pu être supprimé.'));
        }

        return $this->redirect(['action' => 'index']);
    }
    public function login()
    {
        if ($this->request->is('post')) {
            $user = $this->Auth->identify();
            if ($user) {
                $this->Auth->setUser($user);
                if($this->Auth->user('role_id')== 1){
                return $this->redirect(['controller' => 'Articles','action' => 'index', 'prefix' => 'admin']);
                }else{
                    return $this->redirect(['controller' => 'Articles','action' => 'index']);
                }
            }
            $this->Flash->error(__('Mot de passe ou nom d\'utilisateur invalide'));
        }
    }

    public function logout()
    {
        $this->request->session()->destroy();
        return $this->redirect(['controller' => 'Articles','action' => 'index']);
    }

    public function contact()
    {
        if($this->request->is('post'))
        {
            $email = new Email();
            $email->from($this->request->data['email'])
                ->to('blogdalexis@gmail.com')
                ->subject('Nouveau Message de '.$this->request->data['nom']);
            if($email->send($this->request->data['message'].'
            Adresse Mail : '.$this->request->data['email']))
            {
                $this->Flash->success('Votre mail a été envoyé.');
                return $this->redirect(['controller' => 'Articles','action' => 'index']);
            }
            else{

                $this->Flash->error('Votre mail n\'a pas été envoyé.');
            }

        }
    }
}
