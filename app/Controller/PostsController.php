<?php
class PostsController extends AppController{

    public $helpers = array('Html','Form');

    function index() {
        $this->set('posts',$this->Post->find('all'));
    }
    
    function view($id = null){
        $this->set('post', $this->Post->findById($id));
    }

    function add(){
        if($this->request->is('post')){
            if($this->Post->save($this->request->data)){
                $this->Flash->success('Your posts has been saved.');
                $this->redirect(array('action'=>'index'));
            }
        }
    }

    function edit($id = null){
        if(!$id){
            throw new NotFoundException(__('Invalid Post'));
        }
        $post = $this->Post->findById($id);
        if(!$post){
            throw new NotFoundException(__('Invalid Post'));
        }
        if($this->request->is(array('post','put'))){
            $this->Post->id = $id;
            if($this->Post->save($this->request->data)){
                $this->Flash->success(__('Your post has been saved'));
                return $this->redirect(array('action'=>'index'));
            }
            $this->Flash->error(__('Unable to update your post'));
        }
        if(!$this->request->data){
            $this->request->data = $post;
        }
    }

    function delete($id){
        if(!$this->request->is('post')){
            throw new MethodNotAllowedException();
        }
        if($this->Post->delete($id)){
            $this->Flash->success("The post with id: {$id}, has been deleted.");
            $this->redirect(array('action'=>'index'));
        }
    }
}
