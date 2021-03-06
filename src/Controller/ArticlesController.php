<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\I18n\Time;
require_once(ROOT . DS . 'src'. DS . 'Controller'. DS . 'Component' . DS . 'ImageTool.php');
use ImageTool;
/**
 * Articles Controller
 *
 * @property \App\Model\Table\ArticlesTable $Articles
 */
class ArticlesController extends AppController
{
    public function initialize()
    {
        parent::initialize();
        $this->Auth->allow('index');
        $this->Auth->allow('view');
    }

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index($id = null)
    {
        $this->loadModel('Categories');
        $this->loadModel('Comments');
        $this->paginate = [
            'contain' => ['Users', 'Categories','Comments.Users'],
        ];
        if (isset($id)=== false) {
            $articles = $this->paginate($this->Articles->find('all', [
                'order' => ['Articles.created' => 'desc'],
                'limit' => 5
            ]));
        }else{
            $articles = $this->paginate($this->Articles->find('all', [
                'conditions' => ['Articles.categorie_id' => $id],
                'order' => ['Articles.created' => 'desc']
            ]));
        }

        $comments = $this->Comments->NewEntity();
        $categorie = $this->Categories->find('all');

        $this->set(compact('articles','comments','categorie'));
        $this->set('_serialize', ['articles']);
    }

    /**
     * View method
     *
     * @param string|null $id Article id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $this->loadModel('Comments');
        $article = $this->Articles->get($id, [
            'contain' => ['Users', 'Categories','Comments.Users']
        ]);

        $comments = $this->Comments->NewEntity();

        $this->set(compact('comments'));
        $this->set('article', $article);
        $this->set('_serialize', ['article']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $article = $this->Articles->newEntity();
        if ($this->request->is('post')) {
            $this->request->data['user_id'] = $this->Auth->User('id');
            # upload image
            if (!empty($_FILES['picture_url']) ) {
                $img = $_FILES['picture_url']['name'];
                $extention = explode('.', $img);
                $rename = str_replace($extention[0], Time::now()->format("Ymdhms"), $img);
                $temp = $_FILES['picture_url']['tmp_name'];
                $pathimg = WWW_ROOT . "img" . DS . "article" . DS . $rename;
                move_uploaded_file($temp, $pathimg);
                ImageTool::resize(array(
                    'input' => $pathimg,
                    'output' => $pathimg,
                    'width' =>600,
                    'height' =>200,
                    'mode' => 'fit'
                ));
                $this->request->data['picture_url'] = $rename;
            }
            $article = $this->Articles->patchEntity($article, $this->request->data);
            if ($this->Articles->save($article)) {
                $this->Flash->success(__('The article has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The article could not be saved. Please, try again.'));
            }
        }
        $users = $this->Articles->Users->find('list', ['limit' => 200]);
        $categories = $this->Articles->Categories->find('list', ['limit' => 200]);
        $this->set(compact('article', 'users', 'categories'));
        $this->set('_serialize', ['article']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Article id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $article = $this->Articles->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            # upload image
            if (!empty($_FILES['picture_url']) ) {
                $img = $_FILES['picture_url']['name'];
                $extention = explode('.', $img);
                $rename = str_replace($extention[0], Time::now()->format("Ymdhms"), $img);
                $temp = $_FILES['picture_url']['tmp_name'];
                $pathimg = WWW_ROOT . "img" . DS . "article" . DS . $rename;
                move_uploaded_file($temp, $pathimg);
                ImageTool::resize(array(
                    'input' => $pathimg,
                    'output' => $pathimg,
                    'width' =>600,
                    'height' =>200,
                    'mode' => 'fit'
                ));
                $this->request->data['picture_url'] = $rename;
            }
            $article = $this->Articles->patchEntity($article, $this->request->data);
            if ($this->Articles->save($article)) {
                $this->Flash->success(__('The article has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The article could not be saved. Please, try again.'));
            }
        }
        $users = $this->Articles->Users->find('list', ['limit' => 200]);
        $categories = $this->Articles->Categories->find('list', ['limit' => 200]);
        $this->set(compact('article', 'users', 'categories'));
        $this->set('_serialize', ['article']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Article id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $article = $this->Articles->get($id);
        if ($this->Articles->delete($article)) {
            $this->Flash->success(__('The article has been deleted.'));
        } else {
            $this->Flash->error(__('The article could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
