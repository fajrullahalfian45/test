<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Hotel extends CI_Controller {
    
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        // $this->load->library('Mobile_detect');
        $this->load->model('Hotel_model');
        // $detect = new Mobile_Detect;
        // if($detect->isMobile()) {
        //     redirect('https://m.horisonhotels.com');
        // }
    }
    
    public function index()
	{

        $data = array (
            'title' => 'Book Horison Hotels Group with myhorison.com',
            'css' => '<link type="text/css" rel="stylesheet" href="'.base_url('assets/css/datepicker.css').'"/>
            <link type="text/css" rel="stylesheet" href="'.base_url('assets/css/search.css').'"/>',
            'js' => '<script>
			$( function() {                
                // search hotel
                $("#hotel-search").on(\'click\', function(){
                	hoteldestination = $("#hoteldestination").val();
                    searchby = $("#hotelsearchby").val();
                    keyword = $("#hotelkeyword").val();
                    checkin = $("#hotelcheckin").val();
                    checkout = $("#hotelcheckout").val();
                    room = $("#hotelroom").val();
                    adult = $("#hoteladult").val();
                    child = $("#hotelchild").val();
                    params = "'.site_url('searchresult/hotels/"+searchby+"."+keyword+"."+checkin+"."+checkout+"."+room+"."+adult+"."+child').';
                    if(hoteldestination == \'\'){
                        $("#hoteldestination").focus();
                    }else if(searchby == \'\'){
                    	$("#hoteldestination").val(\'\');
                    	$("#hoteldestination").focus();
                    }else if(checkin == \'\'){
                        $("#hotelcheckin").focus();
                    }else if(checkout == \'\'){
                        $("#hotelcheckout").focus();
                    }else if(room == \'\'){
                        $("#hotelroom").focus();
                    }else{
                        window.location.href = params;
                    }
                });
                
            });
            </script>',
            'listpromo' => $this->Hotel_model->get_promolist(),
        );
        $this->template->load('index', 'hotel', $data);
	}
    
    function get_autocomplete(){
        if (isset($_GET['term'])) {
            $result = $this->Hotel_model->search_hotel($_GET['term']);
            if (count($result) > 0) {
            foreach ($result as $row)
                $arr_result[] = array(
                	'keyword'	=> $row->keyword,
                    'label'		=> $row->name,
                    'category'	=> $row->category,
                    'icon'		=> $row->icon,
                    'searchby'  => $row->searchby,
                );
                echo json_encode($arr_result);
            }
        }
    }
    
    public function search()
	{
        $bkimage = $this->Hotel_model->getbk($this->input->get('destination'));
        
        if ($bkimage!='https://myhorison.com/assets/images/hotel-booking-header.jpg')
            if (empty($bkimage))
                $bkimage='https://myhorison.com/assets/images/hotel-booking-header.jpg';
            else
                $bkimage='https://extranet.horisonhotels.com/assets/images/hotels/'.$bkimage;
         
		$destination = $this->input->get('destination');
        
        if ($this->input->get('by')=='kota')
        {
			$row = $this->Hotel_model->get_hotel_by_destination($this->input->get('destination'));
            $listhotel = $this->Hotel_model->get_listhotel_by_destination($this->input->get('destination'),tanggal($this->input->get('checkin')), $this->input->get('promocode'));
        } elseif ($this->input->get('by')=='hotel') {
            $row = $this->Hotel_model->get_hotel_by_hotel($this->input->get('destination'));
            $listhotel = $this->Hotel_model->get_listhotel_by_hotel($this->input->get('destination'),tanggal($this->input->get('checkin')),$this->input->get('promocode'));
        }

        if($row){
            $data = array (
                'title' => 'Book Hotel in ' .ucfirst($row->location).' with myhorison.com',
                'css' => '<link type="text/css" rel="stylesheet" href="'.base_url('assets/css/datepicker.css').'"/>
                <link type="text/css" rel="stylesheet" href="'.base_url('assets/css/result.css').'"/>',
                'js' => '
                <script>
                $( function() {
                    $.widget("custom.catcomplete", $.ui.autocomplete, {
                        _renderMenu: function(ul, items) {
                            var that = this,
                            currentCategory = "";
                            $.each(items, function(index, item) {
                                if (item.category != currentCategory) {
                                    ul.append("<li class=\'ui-autocomplete-category\' style=\'font-weight:bold;color:#000000;\'>" + item.category + "</li>");
                                    currentCategory = item.category;
                                }
                                that._renderItemData(ul, item);
                            });
                        }
                    });
                    $.ui.autocomplete.prototype._renderItem = function(ul, item) {
                        var re = new RegExp(this.term, "i");
                        var t = item.label.replace(re, "<span style=\'font-weight:bold;color:#3366cc;\'>" + this.term + "</span>");
                        return $("<li></li>")
                        .data("item.autocomplete", item)
                        .append("<a><i class=\'fa fa-"+item.icon+"\'></i> " + t + "</a>")
                        .appendTo(ul);
                    };
                    $("#hoteldestination").catcomplete({
                        source: function( request, response ) {
                            $.ajax({
                                async: true,
                                url: "'.site_url('hotel/get_autocomplete').'",
                                dataType: "json",
                                data: {
                                    term: request.term
                                },
                                success: function( data ) {
                                    response( data );
                                }
                            });
                        },
                        minLength: 0,
                        messages: {
                            noResults: \'\',
                            results: function() {}
                        },
                        select: function( event, ui ) {
                            $("#hoteldestination").val(ui.item.label);
                            $("#hotelkeyword").val(ui.item.keyword);
                            $("#hotelsearchby").val(ui.item.searchby);
                        }
                    });
                    $("#hoteldestination").on(\'focus\', function() {
                        $("#hoteldestination").catcomplete("search");
                    });
                });
                $("#page-booking-hotel-header").css("background-image", "url('.$bkimage.')");
                </script>',
                'location' => $row->location,
                'hotelsearchby' => $this->input->get('by'),
                'hotelkeyword' => $this->input->get('hotel'),
                'guest' => $this->input->get('guest'),
                'room' => $this->input->get('room'),
                'checkindate' => $this->input->get('checkindate'),
                'duration' => $this->input->get('duration'),
                'promocode' => $this->input->get('promocode'),
                'cnt' => $row->cnt,
                'listhotel' => $listhotel,
            );
            $this->template->load('index', 'hotelsearch', $data);
        } else {
            redirect(site_url('hotel'));
        }
	}
    
    public function detail()
    {

    	$this->session->sess_destroy();
		
        $row = $this->Hotel_model->hotel_detail($this->input->get('hotel'),tanggal($this->input->get('checkindate')),$this->input->get('promocode'));

        $bkimage = $this->Hotel_model->getbk($row->hotel_seo);
        
        if ($bkimage!='https://myhorison.com/assets/images/hotel-booking-header.jpg')
            $bkimage='https://extranet.horisonhotels.com/assets/images/hotels/'.$bkimage;

		$this->Hotel_model->hotel_room($row->idhotel,tanggal($this->input->get('checkindate')),$this->input->get('duration'),$this->input->get('room'), $this->input->get('promocode'));
		
        if($row){

            if ($this->input->get('promocode')=='HORISONCITIFAM')
                $listroom = $this->Hotel_model->hotel_partnerroom($row->idhotel,tanggal($this->input->get('checkindate')),$this->input->get('duration'),$this->input->get('room'));
            else
                $listroom = $this->Hotel_model->hotel_room($row->idhotel,tanggal($this->input->get('checkindate')),$this->input->get('duration'),$this->input->get('room'),$this->input->get('promocode'));

            $data = array (
                'title' => 'Book Hotel ' .ucfirst($row->hotel_name).' with myhorison.com',
                'css' => '<link type="text/css" rel="stylesheet" href="'.base_url('assets/css/datepicker.css').'"/>
                <link type="text/css" rel="stylesheet" href="'.base_url('assets/css/detail.css').'"/>',
                'js' => '
                <script>
                    $( function() {
                        $("#check-in-date").change();
                    });
                    function initMap() {
        				var lokasi = {lat: '.$row->latitude.', lng: '.$row->longitude.'};
        				var map = new google.maps.Map(document.getElementById(\'map\'), {
          					zoom: 15,
          					center: lokasi
        				});
        				var marker = new google.maps.Marker({
          					position: lokasi,
          					map: map
        				});
      		        }
                    $("#page-booking-hotel-header").css("background-image", "url('.$bkimage.')");
                </script>
    			<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCHDvuk2fig7OFtKba7w-t-KlntnKG0We0&callback=initMap"></script>',
                'hotel_name' => $row->hotel_name,
                'hotel_seo' => $row->hotel_seo,
                'star' => $row->star,
				'email' => $row->email,
                'nowa' => $row->nowa,
                'instagram_url' => $row->instagram_url,
                'address' => $row->address,
                'phone' => $row->phone,
                'allotment' => $row->allotment,
                'picturelead' => $this->Hotel_model->hotel_picture($row->idhotel),
                'picturethumb' => $this->Hotel_model->hotel_picture($row->idhotel),
                'command' => $this->Hotel_model->hotel_command($row->idhotel),
                'commandall' => $this->Hotel_model->hotel_commandall($row->idhotel),
                'trivadvisorwidgetsidebar' => $row->tripadvisor_widget3,
                'normalrate' => $row->normalrate,
                'rate' => $row->rate,
                'promo' => $row->promo,
				'hotel' => $this->input->get('hotel'),
                'description' => $row->description,
                'listfacility' => $this->Hotel_model->hotel_facility($row->idhotel),
                'hotelkeyword' => $this->input->get('hotel'),
                'guest' => $this->input->get('guest'),
                'room' => $this->input->get('room'),
                'checkindate' => $this->input->get('checkindate'),
                'duration' => $this->input->get('duration'),
                'promocode' => $this->input->get('promocode'),
                'listroom' => $listroom,
                'action' => site_url('booking'),
                 // $idregion=> $row->idregion,
                'jabodetabek' => $this->Hotel_model->get_jabodetabek($row->idregion),
            );
            $this->template->load('index', 'hoteldetail', $data);
        } else {
            redirect(site_url('hotel'));
        }
    }
    
}
