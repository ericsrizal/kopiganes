 <?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_comment extends CI_Controller {
	function __construct(){
        parent::__construct();
        $this->load->model('M_admincomment');
    }

public function load()
	{
		$data = $this->M_admincomment->getComment();
		$this->load->view('admincomment', array('data' => $data));
	}
    
	public function do_insert()
	{
		$nama = $_POST['nama'];
		$email = $_POST['email'];
        $komen = $_POST['komen'];
		$data_insert = array(
			'nama' => $nama,
			'email' => $email,
            'komen' => $komen
		);
		$res = $this->M_admincomment->InsertData('comment',$data_insert);
		if($res>=1){
			redirect('Menu/index');
		}else{
			echo gagal;
		}
	}
	public function do_delete($kode){
		$where = array('kode' => $kode);
		$res = $this->M_admincomment->DeleteData('comment',$where);
		if($res>=1){
			redirect('Admin_comment/load');
		}else{
			echo "gagal";
		}
	}
    
	public function do_update(){
		$kode = $_POST['kode'];
		$nama= $_POST['nama'];
		$email = $_POST['email'];
        $komen = $_POST['komen'];
        $reply = $_POST['reply'];
		$data_update = array(
			'reply' => $reply
		);
		$where = array('kode' => $kode);
		$res = $this->M_admincomment->UpdateData('comment',$data_update,$where);
		
        $config = array(
				'protocol' 	=> 'smtp' , 
				'smtp_host' => 'ssl://smtp.googlemail.com' , 
				'smtp_port' => '465' , 
				'smtp_user' => 'kopiganes12@gmail.com' ,
				'smtp_pass' => 'kejedokpintu',
				'mailtype'	=> 'html', 
				'charset' 	=> 'utf-8', 
				'newline' 	=> "\r\n",  
				'wordwrap' 	=> TRUE 
				);
        
        $this->load->library('email',$config);
        $sender_email = "kopiganes12@gmail.com";
        $username = "Kopi Ganes";
        $receiver_email = $email;
        $subject = "Hallo, ganesor!";
        $message = $reply;

        // Sender email address
        $this->email->from($sender_email, $username);
        // Receiver email address.for single email
        $this->email->to($receiver_email);
        // Subject of email
        $this->email->subject($subject);
        // Message in email
        $this->email->message($message);
        // It returns boolean TRUE or FALSE based on success or failure

        $mail = ($this->email->send()) ? "Sent" : "Failed" ;
        echo $this->email->print_debugger();
        echo $mail;
        if($res>=1){
			redirect('Admin_comment/load');
		}else{
			echo gagal;
		}
	}
}