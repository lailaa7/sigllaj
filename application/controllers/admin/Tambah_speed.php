<?php

class Tambah_speed extends CI_Controller
{
    // public function __construct()
    // {
    //     parent::__construct();
    //     if ($this->session->userdata('level') != 'admin') {
    //         $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
    //             <strong>Maaf!</strong><br> Anda Harus Login Dulu
    //             <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    //             <span aria-hidden="true">&times;</span>
    //             </button>
    //             </div>');
    //         redirect('Auth/login');
    //     }
    // }

    public function index()
    {
        $kode = $this->db->select('max(id_speed) as nomor')->from('speed_bump')->get()->result();
        if (!$kode[0]->nomor) {
            $newstring = 0;
        } else {
            $newstring = substr($kode[0]->nomor, -3);
        }
        $baru = $newstring + 1;
        $nourut = $this->formatNbr($baru);
        $data['no_urut'] = 'SB' . $nourut;
        $this->load->view('template_admin/header');
        $this->load->view('template_admin/sidebar');
        $this->load->view('admin/tambah_speed', $data);
        $this->load->view('template_admin/footer');
    }

    public function formatNbr($nbr)
    {
        if ($nbr == 0 || $nbr == NULL)
            return "001";
        else if ($nbr < 10)
            return "00" . $nbr;
        elseif ($nbr >= 10 && $nbr < 100)
            return "0" . $nbr;
        else
            return strval($nbr);
    }

    public function tambah_aksi()
    {
        $this->form_validation->set_rules(
            'nama_jalan',
            'Nama Jalan',
            'required',
            array('required' => '%s tidak boleh kosong')
        );
        $this->form_validation->set_rules(
            'titik',
            'Titik Pasang',
            'required',
            array('required' => '%s tidak boleh kosong')
        );
        $this->form_validation->set_rules(
            'volume',
            'Volume',
            'required',
            array('required' => '%s tidak boleh kosong')
        );
        $this->form_validation->set_rules(
            'kelurahan',
            'Kelurahan',
            'required',
            array('required' => '%s tidak boleh kosong')
        );
        $this->form_validation->set_rules(
            'latitude',
            'latitude',
            'required',
            array('required' => '%s tidak boleh kosong')
        );
        $this->form_validation->set_rules(
            'longitude',
            'longitude',
            'required',
            array('required' => '%s tidak boleh kosong')
        );

        if ($this->form_validation->run() == false) {
            $kode = $this->db->select('max(id_speed) as nomor')->from('speed_bump')->get()->result();
            if (!$kode[0]->nomor) {
                $newstring = 0;
            } else {
                $newstring = substr($kode[0]->nomor, -3);
            }
            $baru = $newstring + 1;
            $nourut = $this->formatNbr($baru);
            $data['no_urut'] = 'SB' . $nourut;
            $this->load->view('template_admin/header');
            $this->load->view('template_admin/sidebar');
            $this->load->view('admin/Tambah_speed', $data);
            $this->load->view('template_admin/footer');
        } else {

            $data = array(
                'id_speed'           =>  $this->input->post('id_speed'),
                'nama_jalan'        =>  $this->input->post('nama_jalan'),
                'titik_pasang'           =>  $this->input->post('titik'),
                'volume'           =>  $this->input->post('volume'),
                'kelurahan'           =>  $this->input->post('kelurahan'),
                'latitude'           =>  $this->input->post('latitude'),
                'longitude'           =>  $this->input->post('longitude')
            );

            $this->model_speed->Tambah_data($data, 'speed_bump');
            $this->session->set_flashdata('flashdata', 'Menambah');
            redirect('admin/Speed_admin');
        }
    }
}
