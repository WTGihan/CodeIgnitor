<?php 
	class Assignments extends CI_Controller{
		
		public function index($offset =0){

			$data['title']='Assignmets';

			$data['assignments']=$this->assignments_model->get_assignments();
			// print_r($data['posts']);
			$this->load->view('templates/header');
			$this->load->view('assignments/index',$data);
			$this->load->view('templates/footer');
		}


		public function view($slug = NULL){
			$data['post'] =$this->assignments_model->get_assignments($slug);
			$post_id=$data['post']['id'];

			if(empty($data['post'])){
				echo "Not working";
				// show_404();
			}

			$data['title']=$data['post']['title'];

			$this->load->view('templates/header');
			$this->load->view('assignments/view', $data);
			$this->load->view('templates/footer');
		}

		public function create(){
			//Check login
			if(!$this->session->userdata('logged_in')){
				redirect('users/login');
			}

	    	$data['title'] ='Create Assignmet';

	    	$data['category']=$this->assignments_model->get_category();

	    	$this->form_validation->set_rules('title','Title','required');
	    	$this->form_validation->set_rules('body','Body','required');

	    	if($this->form_validation->run()===FALSE){
		    	$this->load->view('templates/header');
				$this->load->view('assignments/create', $data);
				$this->load->view('templates/footer');
		    }
		    else{
		    	//Upload Image
		    	$config['upload_path']='./assets/images/posts';
		    	$config['allowed_types']='gif|jpg|png';
		    	$config['max_size']='2048';
		    	$config['max_width']='500';
		    	$config['max_height']='500';

		    	$this->load->library('upload',$config);

		    	if(!$this->upload->do_upload()){
		    		$errors =array('error'=>$this->upload->display_errors());
		    		$post_image='noimage.jpg';
		    	}
		    	else{
		    		$data =array('upload_data'=>$this->upload->data());
		    		$post_image=$_FILES['userfile']['name'];
		    	}

		    	$this->assignments_model->create_assignment($post_image);

		    	//Set Message
				$this->session->set_flashdata('post_created','You are Assignmet has been created');
		    	redirect('assignments');
		    }
	    	
	    }

	    public function delete($id){
	    	//Check login
			if(!$this->session->userdata('logged_in')){
				redirect('users/login');
			}

	    	$this->assignments_model->delete_assignment($id);
	    	//Set Message
			$this->session->set_flashdata('post_deleted','You Assignmet has been deleted');
	    	redirect('assignments');
	    }


	    public function edit($slug){
	    	//Check login
			if(!$this->session->userdata('logged_in')){
				redirect('users/login');
			}

	    	$data['post'] =$this->assignments_model->get_assignments($slug);
	    	
	    	//Check user
	    	if($this->session->userdata('user_id')!=$this->assignments_model->get_assignments($slug)['user_id']){
	    		redirect('assignments');
	    	}
	    	$data['category']=$this->assignments_model->get_category();
			if(empty($data['post'])){
				show_404();
			}

			$data['title']='Edit Assignmet';

			$this->load->view('templates/header');
			$this->load->view('assignments/edit', $data);
			$this->load->view('templates/footer');
	    }

	    public function update(){
	    	//Check login
			if(!$this->session->userdata('logged_in')){
				redirect('users/login');
			}
	    	$this->assignments_model->update_assignment();

	    	//Set Message
			$this->session->set_flashdata('post_updated','You Assignmet has been updated');
	    	redirect('assignments');
	    }

	}
 ?>