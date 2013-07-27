<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Description of Manage_Rel_Pro_Compuestos
 *
 * @author No-CMS Module Generator
 */
class Manage_Rel_Pro_Compuestos extends CMS_Priv_Strict_Controller {

	protected $URL_MAP = array();

	public function index(){
        //////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		// initialize groceryCRUD
		//////////////////////////////////////////////////////////////////////////////////////////////////////////////////
        $crud = new grocery_CRUD();
        $crud->unset_jquery();

        // set model
        $crud->set_model($this->cms_module_path().'/grocerycrud_rel_pro_compuestos_model');

        // adjust groceryCRUD's language to No-CMS's language
        $crud->set_language($this->cms_language());

        // table name
        $crud->set_table($this->cms_complete_table_name('rel_pro_compuestos'));

        // set subject
        $crud->set_subject('Rel Pro Compuestos');

        // displayed columns on list
        $crud->columns('relpro','relprocom','cantidad');
        // displayed columns on edit operation
        $crud->edit_fields('relpro','relprocom','cantidad');
        // displayed columns on add operation
        $crud->add_fields('relpro','relprocom','cantidad');

        // caption of each columns
        $crud->display_as('relpro','Relpro');
        $crud->display_as('relprocom','Relprocom');
        $crud->display_as('cantidad','Cantidad');

		//////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		// HINT: Put set relation (lookup) codes here
		// (documentation: http://www.grocerycrud.com/documentation/options_functions/set_relation)
		// eg:
		// 		$crud->set_relation( $field_name , $related_table, $related_title_field , $where , $order_by );
		//////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		$crud->set_relation('relpro', $this->cms_complete_table_name('productos'), 'descripcion');
		$crud->set_relation('relprocom', $this->cms_complete_table_name('productos_compuestos'), 'descripcion');

        //////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		// HINT: Put set relation_n_n (detail many to many) codes here
		// (documentation: http://www.grocerycrud.com/documentation/options_functions/set_relation_n_n)
		// eg:
		// 		$crud->set_relation_n_n( $field_name, $relation_table, $selection_table, $primary_key_alias_to_this_table,
		// 			$primary_key_alias_to_selection_table , $title_field_selection_table, $priority_field_relation );
		//////////////////////////////////////////////////////////////////////////////////////////////////////////////////


        //////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		// HINT: Put custom field type here
		// (documentation: http://www.grocerycrud.com/documentation/options_functions/field_type)
		// eg:
		// 		$crud->field_type( $field_name , $field_type, $value  );
		//////////////////////////////////////////////////////////////////////////////////////////////////////////////////



        //////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		// HINT: Put callback here
		// (documentation: httm://www.grocerycrud.com/documentation/options_functions)
		//////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		$crud->callback_before_insert(array($this,'before_insert'));
		$crud->callback_before_update(array($this,'before_update'));
		$crud->callback_before_delete(array($this,'before_delete'));
		$crud->callback_after_insert(array($this,'after_insert'));
		$crud->callback_after_update(array($this,'after_update'));
		$crud->callback_after_delete(array($this,'after_delete'));



        //////////////////////////////////////////////////////////////////////////////////////////////////////////////////
        // render
        //////////////////////////////////////////////////////////////////////////////////////////////////////////////////
        $output = $crud->render();
        $this->view($this->cms_module_path().'/manage_rel_pro_compuestos_view', $output,
            $this->cms_complete_navigation_name('manage_rel_pro_compuestos'));

    }

    public function before_insert($post_array){
		return TRUE;
	}

	public function after_insert($post_array, $primary_key){
		$success = $this->after_insert_or_update($post_array, $primary_key);
		return $success;
	}

	public function before_update($post_array, $primary_key){
		return TRUE;
	}

	public function after_update($post_array, $primary_key){
		$success = $this->after_insert_or_update($post_array, $primary_key);
		return $success;
	}

	public function before_delete($primary_key){

		return TRUE;
	}

	public function after_delete($primary_key){
		return TRUE;
	}

	public function after_insert_or_update($post_array, $primary_key){

        return TRUE;
	}



}