<?php 
	class Assignments_Model extends CI_Model{
		public function __construct(){
			$this->load->database();
		}

		public function get_assignments($slug = FALSE){

			if($slug ===FALSE){
				$this->db->order_by('assignments.id','DESC');
				$this->db->join('category','category.id= assignments.category_id');
				$query =$this->db->get('assignments');
				return $query->result_array();
			}

			$query =$this->db->get_where('assignments',array('slug'=>$slug));
			return $query->row_array();
		}

	    public function create_assignment($post_image){
	    	$slug =url_title($this->input->post('title'));
	    	$data = array(
	    		'title'=> $this->input->post('title'),
	    		'slug' => $slug,
	    		'body' => $this->input->post('body'),
	    		'category_id' => $this->input->post('category_id'),
	    		'user_id'=>$this->session->userdata('user_id'),
	    		'post_image' => $post_image
	    	);

	    	return $this->db->insert('assignments',$data);
	    }

	    public function delete_assignment($id){
	    	$image_file_name=$this->db->select('post_image')->get_where('assignments',array('id'=>$id))->row()->post_image;
	    	$cwd =getcwd(); //save the current working directory
	    	$image_file_path=$cwd."\\assets\\imges\\posts\\";
	    	chdir($image_file_path);
	    	unlink($image_file_name);
	    	chdir($cwd);//Restore the previous working directory
	    	$this->db->where('id',$id);
	    	$this->db->delete('assignments');
	    	return true;
	    }

	    public function update_assignment(){
	    	// echo $this->input->post('id'); die();
	    	$slug =url_title($this->input->post('title'));
	    	$data = array(
	    		'title'=> $this->input->post('title'),
	    		'slug' => $slug,
	    		'body' => $this->input->post('body'),
	    		'category_id' => $this->input->post('category_id')
	    	);

	    	$this->db->where('id',$this->input->post('id'));
	    	return $this->db->update('assignments',$data);
	    }

	    public function get_category(){
	    	$this->db->order_by('name');
	    	$query=$this->db->get('category');
	    	return $query->result_array();
	    }

	  //   public function get_posts_by_category($category_id){
	  //   	$this->db->order_by('posts.id','DESC');
	  //   	$this->db->join('category','category.id= posts.category_id');
			// $query =$this->db->get_where('posts',array('category_id'=>$category_id));
			// return $query->result_array();
	  //   }
	}

 ?>