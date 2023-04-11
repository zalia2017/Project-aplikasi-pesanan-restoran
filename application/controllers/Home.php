<?php 

class Home extends CI_Controller
{
  function __construct()
  {
    parent::__construct();
    $this->load->model(['ModelBuku', 'ModelUser']);
  }

  public function index()
  {
    $data = [
      'judul' => 'Katalog Buku', 
      'buku' => $this->ModelBuku->getBuku()->result()
    ];
    $data['user'] = 'Pengunjung';
    if($this->session->userdata('email')){
      $user = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();

      $data['user'] = $user['nama'];

      $this->load->view('templates/templates-user/header', $data);
      $this->load->view('buku/daftarbuku', $data);
      $this->load->view('templates/templates-user/modal', $data);
      $this->load->view('templates/templates-user/footer', $data);
    }else{
      $this->load->view('templates/templates-user/header', $data);
      $this->load->view('buku/daftarbuku', $data);
      $this->load->view('templates/templates-user/modal', $data);
      $this->load->view('templates/templates-user/footer', $data);
    }
  }

  public function detailBuku()
  {
    $id = $this->uri->segment(3);
    $buku = $this->ModelBuku->joinKategoriBuku(['buku.id' => $id])->result();
    $data['user'] = "Pengunjung";
    $data['title'] = "Detail Buku";

    foreach ($buku as $fields) {
      $data['judul'] = $fields->judul_buku;
      $data['pengarang'] = $fields->pengarang;
      $data['penerbit'] = $fields->penerbit;
      $data['kategori'] = $fields->kategori;
      $data['tahun'] = $fields->tahun_terbit;
      $data['isbn'] = $fields->isbn;
      $data['gambar'] = $fields->image;
      $data['dipinjam'] = $fields->dipinjam;
      $data['stok'] = $fields->stok;
      $data['dibooking'] = $fields->dibooking;
      $data['id'] = $id;
    }

    $this->load->view('templates/templates-user/header',$data);
    $this->load->view('buku/detailbuku', $data);
    $this->load->view('templates/templates-user/modal');
    $this->load->view('templates/templates-user/footer');
  }
}
 ?>