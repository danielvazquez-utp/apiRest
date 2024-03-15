<?php
   
require APPPATH . 'libraries/REST_Controller.php';
     
class Producto extends REST_Controller {
    
	/**
   * Get All Data from this method.
   *
   * @return Response
   */
   
   public function __construct() {
      parent::__construct();
      $this->load->database();
   }

   public function index_get($id = 0){
      if(!empty($id)){
         $data = $this->db->get_where("productos", ['id_producto' => $id])->row_array();
      }else{
         $data = $this->db->get("productos")->result();
      }
      $this->response($data, REST_Controller::HTTP_OK);
	}

   public function index_post()
   {
      $input = $this->input->post();
      $this->db->insert("productos",$input);
      $this->response(array("state"=>"ok", "response"=>"Producto agregado"), REST_Controller::HTTP_OK);
   }

   public function index_put($id)
   {
      $input = $this->put();
      $this->db->update("productos", $input, array('id_producto'=>$id));
      $this->response(array("state"=>"ok", "response"=>"Producto actualizado"), REST_Controller::HTTP_OK);
   }

   public function index_delete($id)
   {
      $this->db->delete("productos", array('id_producto'=>$id));
      $this->response(array("state"=>"ok", "response"=>"Producto eliminado"), REST_Controller::HTTP_OK);
   }

}