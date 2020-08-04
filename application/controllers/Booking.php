<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Booking extends CI_Controller {
    
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        // $this->load->library('Mobile_detect');
        $this->load->model('Booking_model');
        // $detect = new Mobile_Detect;
        // if($detect->isMobile()) {
        //     redirect('https://m.horisonhotels.com');
        // }
    }
    
    public function index()
	{
        $row = $this->Booking_model->hoteldetail($this->input->post('idhotel'),$this->input->post('guest'),$this->input->post('room'),$this->input->post('checkindate'),$this->input->post('duration'),$this->input->post('idroomhotel'),$this->input->post('idrateplanhotel'), $this->input->post('promocode'));
        if($row){
            $data = array (
                'title' => 'Book Hotel ' .ucfirst($row->hotel_name).' with myhorison.com',
                'css' => '<link type="text/css" rel="stylesheet" href="'.base_url('assets/css/booking.css').'"/>
                <link type="text/css" rel="stylesheet" href="'.base_url('assets/css/selectize.css').'"/>',
                'js' => '<script src="'.base_url('assets/js/selectize.min.js').'"></script>
                <script type="text/javascript">
                    $(function() {
				        $(\'#book-check\').change(function(){
                            $(\'#book-else\').slideToggle();
                        });
				        $(\'#spc-check\').change(function(){
                            $(\'#spc-rec\').slideToggle();
                        });
				        $(\'.submit\').click(function(e){
                            e.preventDefault();
                            $(\'#bg-cover\').show();
                        });
                        var $select = $(\'.select-search\').selectize({
                            placeholder: \'Country code\',
                            create: true,
                            sortField: \'text\'
                        });
                        $select[0].selectize.setValue("100");
                        $("#book-check").change(function () {
                            if ($(this).is(\':checked\')) {
                                $("#guestcheckin").attr("required", "required");
                                $("#idcountryguestcheckin").attr("required", "required");
                                $("#phoneguestcheckin").attr("required", "required");
                            }
                        });
                        $("#spc-check").change(function () {
                            if ($(this).is(\':checked\')) {
                                $("#specialrequest").attr("required", "required");
                            }
                        });
                    });
                </script>',
                'action' => site_url('checkout'),
                'idhotel' => $this->input->post('idhotel'),
                'guest' => $this->input->post('guest'),
                'room' => $this->input->post('room'),
                'checkindate' => $this->input->post('checkindate'),
                'duration' => $this->input->post('duration'),
                'promocode' => $this->input->post('promocode'),
                'checkoutdate' => date('Y-m-d', strtotime($this->input->post('checkindate'). ' + '.$this->input->post('duration').' days')),
                'term' => $this->Booking_model->getpromocode($this->input->post('promocode')),
                'idroomhotel' => $this->input->post('idroomhotel'),
                'idrateplanhotel' => $this->input->post('idrateplanhotel'),
                'listphonecode' => $this->Booking_model->listphonecode(),
                'bookingdetail' => $this->Booking_model->bookingdetail($this->input->post('idhotel'),$this->input->post('guest'),$this->input->post('room'),$this->input->post('checkindate'),$this->input->post('duration'),$this->input->post('idroomhotel'),$this->input->post('idrateplanhotel'),$this->input->post('promocode')),

                'roomdetail' => $this->Booking_model->roomdetail($this->input->post('idhotel'),$this->input->post('checkindate'),$this->input->post('duration'),$this->input->post('idroomhotel'),$this->input->post('idrateplanhotel'),$this->input->post('promocode')),
            );
            $this->template->load('index', 'booking', $data);
        } else {
            site_url();
        }
	}
}
