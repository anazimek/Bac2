<?php
namespace App\Controller\Admin;

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

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Users', 'Categories','Comments.Users'],
            'limit' => 10
        ];
        $articles = $this->paginate($this->Articles);

        $this->set(compact('articles'));
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
        $article = $this->Articles->get($id, [
            'contain' => ['Users', 'Categories']
        ]);

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
            if (!empty($_FILES['picture_url'])) {
                $img = $_FILES['picture_url']['name'];
                $extention = explode('.', $img);
                $rename = str_replace($extention[0], $article->id, $img);
                $temp = $_FILES['picture_url']['tmp_name'];
                $pathimg = WWW_ROOT . "img" . DS . "article" . DS . $rename;
                move_uploaded_file($temp, $pathimg);
                ImageTool::resize(array(
                    'input' => $pathimg,
                    'output' => $pathimg,
                    'width' => 1000,
                    'height' => 400,
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
        $categories = $this->Articles->Categories->find('list', [
            'valueField'=> 'description']);
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
            $this->request->data['user_id'] = $this->Auth->User('id');
            # upload image
                if (!empty($_FILES['picture_url'])) {
                    $img = $_FILES['picture_url']['name'];
                    $extention = explode('.', $img);
                    $rename = str_replace($extention[0], $article->id, $img);
                    $temp = $_FILES['picture_url']['tmp_name'];
                    $pathimg = WWW_ROOT . "img" . DS . "article" . DS . $rename;
                    move_uploaded_file($temp, $pathimg);
                    ImageTool::resize(array(
                        'input' => $pathimg,
                        'output' => $pathimg,
                        'width' => 1000,
                        'height' => 400,
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
        $categories = $this->Articles->Categories->find('list', [
            'valueField'=> 'description']);
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
        $this->Articles->Comments->deleteAll(['article_id' => $id]);
        if ($this->Articles->delete($article)) {
            $this->Flash->success(__('The article has been deleted.'));
        } else {
            $this->Flash->error(__('The article could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
