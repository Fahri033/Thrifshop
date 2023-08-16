<!-- BAGIAN CONTROLL - 
	v_nav_backend, 
	v_barang(Barang), 
	v_add(Add Barang), 
	v_edit(Edit Barang),
	m_barang,
	m_kategori - ADMIN -->

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Barang extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_barang');
		$this->load->model('m_kategori');
	}

	// BARANG - v_barang
	public function index()
	{
		$data = array(
			'title' => 'Barang',
			'barang' => $this->m_barang->get_all_data(),
			'isi' => 'barang/v_barang',);
		
		$this->load->view('layout/v_wrapper_backend', $data , FALSE);
	}
	// ADD BARANG - v_add
	public function add()
	{
		$this->form_validation->set_rules('nama_barang','Nama Barang','required', array('required' => '%s Harus Diisi !!!')
		);

		$this->form_validation->set_rules('id_kategori','Kategori','required', array('required' => '%s Harus Diisi !!!')
		);

		$this->form_validation->set_rules('harga','Harga','required', array('required' => '%s Harus Diisi !!!')
		);

		$this->form_validation->set_rules('berat','Berat','required', array('required' => '%s Harus Diisi !!!')
		);

		//$this->form_validation->set_rules('stok','Stok','required', array('required' => '%s Harus Diisi !!!')
		//);

		$this->form_validation->set_rules('deskripsi','Deskripsi','required', array('required' => '%s Harus Diisi !!!')
		);

		if ($this->form_validation->run() == TRUE) {
			$config['upload_path']   = './assets/gambar';
			$config['allowed_types'] = 'gif|jpg|jpeg|png|ico';
			$config['max_size']      = '10000';
			$this->upload->initialize($config);
			$field_name = "gambar";
			if (!$this->upload->do_upload($field_name)) 
			{
				$data = array(
					'kategori' => $this->m_kategori->get_all_data(),
					'error_upload' => $this->upload->display_errors(),
					'isi' => 'barang/v_add',
				);
				$this->load->view('layout/v_wrapper_backend', $data , FALSE);

			} else {
				$upload_data = array('uploads' => $this->upload->data());
				$config['image_library']   = 'gd2';
				$config['source_image']   = './assets/gambar'.$upload_data['uploads']['file_name'];
				$this->load->library('image_lib', $config);
				$data = array(
					'nama_barang' => $this->input->post('nama_barang'),
					'id_kategori' => $this->input->post('id_kategori'),
					// Menambahkan Ukuran
					'ukuran' => $this->input->post('ukuran'),
					'harga' => $this->input->post('harga'),
					'berat' => $this->input->post('berat'),
					// Menambahkan Stock
					'stok' => $this->input->post('stok'),
					'deskripsi' => $this->input->post('deskripsi'),
					// Menambahkan Keterangan
					'keterangan' => $this->input->post('keterangan'),
					'gambar' => $upload_data['uploads']['file_name'],
				);
				$this->m_barang->add($data);
				$this->session->set_flashdata('pesan', 'Data Berhasil Ditambahkan !');
				redirect('barang');
			}
		}

		$data = array (
			'title' => 'Add Barang',
			'kategori' => $this->m_kategori->get_all_data(),
			'isi' => 'barang/v_add',
		);
		$this->load->view('layout/v_wrapper_backend', $data , FALSE);
	}
	// EDIT BARANG - v_edit
	public function edit($id_barang = NULL)
	{
		$this->form_validation->set_rules('nama_barang','Nama Barang','required', array('required' => '%s Harus Diisi !!!')
		);

		$this->form_validation->set_rules('id_kategori','Kategori','required', array('required' => '%s Harus Diisi !!!')
		);

		$this->form_validation->set_rules('harga','Harga','required', array('required' => '%s Harus Diisi !!!')
		);

		$this->form_validation->set_rules('berat','Berat','required', array('required' => '%s Harus Diisi !!!')
		);

		//$this->form_validation->set_rules('stok','Stok','required', array('required' => '%s Harus Diisi !!!')
		//);

		$this->form_validation->set_rules('deskripsi','Deskripsi','required', array('required' => '%s Harus Diisi !!!')
		);

		if ($this->form_validation->run() == TRUE) {
			$config['upload_path']   = './assets/gambar';
			$config['allowed_types'] = 'gif|jpg|jpeg|png|ico';
			$config['max_size']      = '10000';
			$this->upload->initialize($config);
			$field_name = "gambar";
			if (!$this->upload->do_upload($field_name)) 
			{
				$data = array(
					//'title' => 'Edit Barang',
					'kategori' => $this->m_kategori->get_all_data(),
					'barang' => $this->m_barang->get_data($id_barang),
					'error_upload' => $this->upload->display_errors(),
					'isi' => 'barang/v_edit',
				);
				$this->load->view('layout/v_wrapper_backend', $data , FALSE);

			} else {
				// file lama diganti file baru assets/gambar
				$barang = $this->m_barang->get_data($id_barang);
				if ($barang->gambar != "") 
				{
					unlink('./assets/gambar/'.$barang->gambar);
				}

				$upload_data = array('uploads' => $this->upload->data());
				$config['image_library']   = 'gd2';
				$config['source_image']   = './assets/gambar'.$upload_data['uploads']['file_name'];
				$this->load->library('image_lib', $config);
				$data = array(
					'id_barang' => $id_barang,
					'nama_barang' => $this->input->post('nama_barang'),
					'id_kategori' => $this->input->post('id_kategori'),
					// Menambahkan Ukuran
					'ukuran' => $this->input->post('ukuran'),
					'harga' => $this->input->post('harga'),
					'berat' => $this->input->post('berat'),
					// Menambahkan Stock
					'stok' => $this->input->post('stok'),
					'deskripsi' => $this->input->post('deskripsi'),
					// Menambahkan Keterangan
					'keterangan' => $this->input->post('keterangan'),
					'gambar' => $upload_data['uploads']['file_name'],
				);
				$this->m_barang->edit($data);
				$this->session->set_flashdata('pesan', 'Data Berhasil Diperbarui !');
				redirect('barang');
			}
			// Jika tanpa ganti gambar
			$data = array(
					'id_barang' => $id_barang,
					'nama_barang' => $this->input->post('nama_barang'),
					'id_kategori' => $this->input->post('id_kategori'),
					// Menambahkan Ukuran
					'ukuran' => $this->input->post('ukuran'),
					'harga' => $this->input->post('harga'),
					'berat' => $this->input->post('berat'),
					// Menambahkan Stock
					'stok' => $this->input->post('stok'),
					'deskripsi' => $this->input->post('deskripsi'),
					// Menambahkan Keterangan
					'keterangan' => $this->input->post('keterangan'),
				);
				$this->m_barang->edit($data);
				$this->session->set_flashdata('pesan', 'Data Berhasil Diperbarui !');
				redirect('barang');
			
		}
		
		$data = array(
			'title' => 'Edit Barang',
			'kategori' => $this->m_kategori->get_all_data(),
			'barang' => $this->m_barang->get_data($id_barang),
			'isi' => 'barang/v_edit',
		);
		$this->load->view('layout/v_wrapper_backend', $data , FALSE);
	}
	// Bagian Delete
	public function delete( $id_barang = NULL )
	{
		// Hapus gambar beserta filenya di assets/gambar
		$barang = $this->m_barang->get_data($id_barang);
		if ($barang->gambar != "") 
		{
			unlink('./assets/gambar/'. $barang->gambar);
		}
		// Delete
		$data = array('id_barang' => $id_barang );
		$this->m_barang->delete($data);
		$this->session->set_flashdata('pesan', 'Data Berhasil Dihapus !');
		redirect('barang');
	}
}
?>