<?php

	class Main extends CI_Controller{

		function __construct(){
			parent::__construct();
			$this->load->model('m_main','main');
			$this->load->model('Crud','crud');
		}

		public function index(){
			$this->home();
		}

		public function home(){
			$data['content'] = "content/dashboard";
			$data['result'] = $this->crud->getBarang(1);
			$count = 0;
			foreach ($data['result'] as $value) {
				$today = date('Y-m-d');
				$date1 = new DateTime($today);
				$date2 = new DateTime($value->expired_date);
				$interval = $date1->diff($date2);
				$willExpiredDay = $interval->days;

				if ($willExpiredDay <= 7 && $interval->invert == 0){
					$count += 1;
				}
			}
			$data['expired_count'] = $count;

			$this->load->view("layouts/main", $data);
		}

		public function masterProduct(){
			$data['content'] = "content/master_barang";
			$data['result'] = $this->crud->read('app_master_product', null, null, null);
			$this->load->view("layouts/main", $data);
		}

		public function sampleProduct($expired = null){
			$data['content'] = "content/sample_barang";
			$data['result'] = $expired == null ? $this->crud->getBarang(1) : $this->crud->getProductExpired();
			$data['expired'] = $expired;
			$this->load->view("layouts/main", $data);
		}

		public function productExpired(){
			$data['content'] = "content/list_barang_expired";
			$data['result'] = $this->crud->getBarang(0);
			$this->load->view("layouts/main", $data);
		}

		public function kelolaUser(){
			$data['content'] = "content/list_user";
			$data['result'] = $this->crud->read('app_users', null, null, null);
			$this->load->view("layouts/main", $data);
		}

		public function report(){
			$param = $this->input->post();
			if(!empty($param)){
				$data['result'] = $this->main->get_data('report',$param);
			}
			// $data['result'] = $this->main->get_data('report',$param);
			$data['content'] = "content/report_keuangan";
			$this->load->view("layouts/main",$data);
		}

		public function loadbarcode(){
			$data['content'] = "content/scan_barcode";
			$this->load->view("layouts/main",$data);
		}

		public function generateqrcode($no_induk){
			$this->load->library('ciqrcode'); //meload library barcode
			$this->load->helper('url'); //meload helper url untuk aktifkan base urlnya
			$barcode_create=$no_induk; // membuat code barcode yang nilainya 123456789
			//settingang pada barcode
			$params['data'] = $barcode_create;
			$params['level'] = 'H';
			$params['size'] =5;
			//settingan untuk membuat file barcode dalam format .png dan di simpan dalam folder assets
			$params['savename'] = FCPATH . "assets/qrcode/".$barcode_create.".png";
			//mulai menggenerate barcode
			$this->ciqrcode->generate($params);
			//mencoba mengeluarkan nilai barcode yang baru saja di generate
			// echo '<img src="'.base_url().'assets/qrcode/'.$barcode_create.'.png" />';
		}

		public function export($act="",$id=""){
			$this->load->library('m_pdf');
			error_reporting(E_ALL);
			if($act == 'cetak_kartu'){
				$nama_dokumen='PDF';
				$mpdf=new mPDF('utf-8', 'A4', 10.5, 'arial');
				ob_start();
				$data['result'] = $this->main->get_data('daftarmember',$id);
				$data['content'] = "content/e_pdf";
				// $this->load->view("layouts/main",$data);
				$_view = $this->load->view("layouts/main",$data);
			}

			echo $_view;

			$html = ob_get_contents();
			//ob_end_clean();
			$mpdf->WriteHTML(utf8_encode($html));
			$mpdf->Output($nama_dokumen.".pdf" ,'I');
			exit;
		}

		public function cetak($type, $id){
			if ($type == 'barcode') {
				$_view = '<img src="'.base_url().'assets/barcode/'.$id.'.jpg" class="img-responsive2">';
			}

			if ($type == 'expired') {
				$result = $this->crud->getBarang(0, $id);
				$row = $result[0];
				$_view = $this->generateTable($row);
			}

			echo $_view;
		}

		private function generateTable($data) {
			$_view = '<h4 align="center">Data Barang Expired</h4>';
			$_view .= '<table widht=100 border=1 align="center">';
				$_view .= '<thead>';
					$_view .= '<th>Kode Produk</th>';
					$_view .= '<th>Nama Produk</th>';
					$_view .= '<th>Tanggal Expired</th>';
					$_view .= '<th>Berita Acara</th>';
				$_view .= '</thead>';

				$_view .= '<tbody align="center">';
					$_view .= '<td>'.$data->kode_product.'</td>';
					$_view .= '<td>'.$data->nama_product.'</td>';
					$_view .= '<td>'.date('d-m-Y', strtotime($data->expired_date)).'</td>';
					$_view .= '<td>'.$data->berita_acara.'</td>';
				$_view .= '</tbody>';
			$_view .= '';

			return $_view;
		}

		public function scanBarcode() {
			$data['content'] = "content/scan_barcode";
			$this->load->view("layouts/main",$data);
		}

		public function form($form, $act, $id = null) {
			$data['content'] = "content/_form/".$form;
			$data['action'] = $this->getAction();

			if ($form == 'form_sample_product') {
				$data['resultProduct'] = $this->crud->read('app_master_product', null, null, null);
				$query = $this->crud->read('app_sample_product', array('id' => $id), null, null);
				$data['result'] = $query->row();
			}

			if ($form == 'form_master_product') {
				$query = $this->crud->read('app_master_product', array('id' => $id), null, null);
				$data['result'] = $query->row();
			}

			if ($form == 'form_user') {
				$query = $this->crud->read('app_users', array('id' => $id), null, null);
				$data['result'] = $query->row();
			}

			if ($form == 'form_berita_acara') {
				$query = $this->crud->read('app_sample_product', array('id' => $id), null, null);
				$data['result'] = $query->row();
			}

			$this->load->view("layouts/main", $data);
		}

		public function getAction() {
			$action = 'Add';

      if ($this->uri->segment(4) == 'musnahkan') {
        $action = 'Musnahkan';
      }

      if ($this->uri->segment(4) == 'update') {
        $action = 'Update';
			}

			return $action;
		}

		public function execute($type="", $act="", $id="") {
			$post = $this->input->post();
			if ($type == 'add') {
				if ($act == 'sampleProduct') {
					$dataProduct = array(
						'kode_product' => $post['kodeProducts'],
						'expired_date' => $post['expiredDate'],
					);
					$this->db->insert('app_sample_product', $dataProduct);
					$id = $this->db->insert_id();
				}

				if ($act == 'product') {
					$this->db->insert('app_master_product', $post);
					$id = $this->db->insert_id();
					$this->generateBarcode($id);

					redirect(base_url('main/masterProduct'), 'refresh');
				}

				if ($act == 'user') {
					$insertData = array('nama' => $post['nama'], 'email' => $post['email'], 'password' => md5($post['password']), 'role' => $post['role']);
					$this->db->insert('app_users', $insertData);

					redirect(base_url('main/kelolaUser'));
				}
			}

			if ($type == 'get') {
				if ($act == 'checkProduct') {
					$generateQuery = $this->crud->read('app_master_product', array('id' => $post['id']), null, null);
					$result = $generateQuery->result();

					if (count($result) > 0){
						$result = $result[0];

						$_view = '<div style="border: 2px solid red;border-radius: 10px;padding: 15px;font-weight: bold;">';
							$_view .= '<div class="row">';
								$_view .= '<div>';
									$_view .= '<div style="border: 2px solid #cacaca;border-radius: 5px;">';
										$_view .= '<div class="row">';
											$_view .= 'Info Produk';
											$_view .= '<input type="hidden" id="kodeProducts" value="'.$result->kode_product.'" />';
										$_view .= '</div>';
									$_view .= '</div>';
									$_view .= '<div class="row">';
										$_view .= '<div class="col-sm-6" align="right">Kode Produk</div>';
										$_view .= '<div class="col-sm-6" align="left">'.$result->kode_product.'</div>';
									$_view .= '</div>';
									$_view .= '<div class="row">';
										$_view .= '<div class="col-sm-6" align="right">Nama Produk</div>';
										$_view .= '<div class="col-sm-6" align="left">'.$result->nama_product.'</div>';
									$_view .= '</div>';
									$_view .= '<div class="row">';
										$_view .= '<div class="col-sm-6" align="right">Masa Simpan</div>';
										$_view .= '<div class="col-sm-6" align="left">'.$result->masa_simpan.' Tahun</div>';
									$_view .= '</div>';
								$_view .= '</div>';
							$_view .= '</div>';
							// $_view .= '<div style="color: red;font-weight: bold;margin-top: 15px;">';
							// 	$_view .= 'testset';
							// $_view .= '</div>';
						$_view .= '</div>';
					} else {
						$_view = '<h3>Data tidak ditemukan</h3>';
					}

					echo $_view;
				}
			}

			if ($type == 'update') {
				if ($act == 'beritaAcara') {
					$this->db->where('id', $post['id']);
					$this->db->update('app_sample_product', array('berita_acara' => $post['berita_acara'], 'status' => 0));

					redirect(base_url('main/sampleProduct'));
				}

				if ($act == 'sampleProduct') {
					$this->db->where('id', $post['id']);
					$this->db->update('app_sample_product', array('expired_date' => $post['expired_date'], 'kode_product' => $post['kode_product']));

					redirect(base_url('main/sampleProduct'));
				}

				if ($act == 'product') {
					$this->db->where('id', $post['id']);
					$this->db->update('app_master_product', array('nama_product' => $post['nama_product'], 'masa_simpan' => $post['masa_simpan']));

					redirect(base_url('main/masterProduct'));
				}

				if ($act == 'user') {
					$updateData = array('nama' => $post['nama'], 'email' => $post['email'], 'role' => $post['role']);

					if ($post['password'] != "") {
						$updateData['password'] = md5($post['password']);
					}

					$this->db->where('id', $post['id']);
					$this->db->update('app_users', $updateData);

					redirect(base_url('main/kelolaUser'));
				}
			}

			if ($type == 'delete') {
				$this->db->where('id', $id);
				$this->db->delete($act);

				redirect(($_SERVER['HTTP_REFERER']), 'refresh');
			}
		}

		public function generateBarcode($id) {
			$generateBarcode = $this->randomNumber();
			$barcodeNumber = $generateBarcode. " " . $id;

			$this->load->library('zend');
			$this->zend->load('Zend/Barcode');
			$image_resource = Zend_Barcode::factory('code128', 'image', array('text'=>$barcodeNumber), array())->draw();
			$image_name     = $barcodeNumber.'.jpg';
			$image_dir      = FCPATH . 'assets/barcode/';
			imagejpeg($image_resource, $image_dir.$image_name);
			$this->updateBarcodeNumber($id, $barcodeNumber);
		}

		public function updateBarcodeNumber($id, $barcode) {
			$this->db->where('id', $id);
			$this->db->update('app_master_product', array('barcode_number' => $barcode));
		}

		public function randomNumber($maxlength = 10) {
			$chary = array("0", "1", "2", "3", "4", "5", "6", "7", "8", "9");
			$return_str = "";

			for ( $x=0; $x<=$maxlength; $x++ ) {
				$return_str .= $chary[rand(0, count($chary)-1)];
			}

			return $return_str;
		}
	}

?>