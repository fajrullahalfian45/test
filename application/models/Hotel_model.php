<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Hotel_model extends CI_Model {

    function __construct()
    {
        parent::__construct();
    }
	
    function pagetitle(){
        $this->db->select('title');
        $this->db->from('tbl_websiteinfo');
        $pagetitle = $this->db->get()->result();
        foreach ($pagetitle as $title) {
            return $title->title;
        }
    }

    function pagedescription(){
        $this->db->select('description');
        $this->db->from('tbl_websiteinfo');
        $pagedescription = $this->db->get()->result();
        foreach ($pagedescription as $description) {
            return $description->description;
        }
    }

    function pagekeywords(){
        $this->db->select('keywords');
        $this->db->from('tbl_websiteinfo');
        $pagekeywords = $this->db->get()->result();
        foreach ($pagekeywords as $keywords) {
            return $keywords->keywords;
        }
    }
    
    public function get_promolist()
    {
        $this->db->where('active', 'Y');
        $this->db->order_by('idslider', 'desc');
        return $this->db->get('tbl_slider')->result();
    }
    
	function search_hotel($term){
        $this->db->select('*, case when category=\'Destination\' then \'destination\' else \'hotel\' end as searchby');
        $this->db->from('vie_hoteldestination');
        $this->db->like('name', $term , 'both');
        return $this->db->get()->result();
    }
    
    function count_hotel_by_destination($keyword) 
	{
        $this->db->select('count(*) as cnt');
        $this->db->from('tbl_hotel a');
        $this->db->join('tbl_city b','b.idcity=a.idcity');
		$this->db->where('b.slug', $keyword);
		return $this->db->get()->num_rows();
	}
    
    // search hotel by destination
    function get_hotel_by_destination($keyword)
    {
        $this->db->select('count(*) as cnt, b.name as location');
        $this->db->from('tbl_hotel a');
        $this->db->join('tbl_city b','b.idcity=a.idcity');
        $this->db->where('b.slug', $keyword);
        return $this->db->get()->row();
    }
    
    // list hotel by destination
    function get_listhotel_by_destination($destination,$checkin,$promocode)
    {
        $this->db->select('
            a.hotel_name,
            a.address, 
            a.star,
            a.hotel_seo,
            a.picture,
            b.name as city,
            min(d.rate) as normalrate,
            min(d.rate)-coalesce(fnc_newpromo1(min(d.rate), a.idhotel,c.idrateplanhotel, "'.$checkin.'","'.$promocode.'"),0) as rate,
            coalesce(fnc_newpromo1(min(d.rate), a.idhotel, c.idrateplanhotel, "'.$checkin.'","'.$promocode.'"),0) as promo,
            c.cancellationpolicy');
        $this->db->from('tbl_hotel a');
        $this->db->join('tbl_city b','b.idcity=a.idcity');
        $this->db->join('tbl_rateplanhotel c','c.idhotel=a.idhotel');
        $this->db->join('tbl_rateallotment d','d.idrateplanhotel=c.idrateplanhotel');
        $this->db->where('b.slug',$destination);
        $this->db->where('d.date',$checkin);
        //$this->db->where('fnc_rateterendah(a.idhotel,"'.tanggal($checkin).'","'.tanggal($checkout).'")');
        $this->db->group_by('a.idhotel');
        //$this->db->order_by('d.rate','asc');
        return $this->db->get()->result();
    }
    
    // search hotel by hotel
    function get_hotel_by_hotel($keyword)
    {
        $this->db->select('count(*) as cnt, a.hotel_name as location');
        $this->db->from('tbl_hotel a');
        $this->db->join('tbl_city b','b.idcity=a.idcity');
        $this->db->where('a.hotel_seo', $keyword);
        return $this->db->get()->row();
    }
    
    // list hotel by hotel
    function get_listhotel_by_hotel($hotel,$checkin,$promocode)
    {
        $this->db->select('
            a.hotel_name,
            a.address, 
            a.star,
            a.hotel_seo,
            a.picture,
            b.name as city,
            min(d.rate) as normalrate,
            min(d.rate)-coalesce(fnc_newpromo1(min(d.rate), a.idhotel, c.idrateplanhotel, "'.$checkin.'","'.$promocode.'"),0) as rate,
            coalesce(fnc_newpromo1(min(d.rate), a.idhotel, c.idrateplanhotel, "'.$checkin.'", "'.$promocode.'"),0) as promo,
            c.cancellationpolicy');
        $this->db->from('tbl_hotel a');
        $this->db->join('tbl_city b','b.idcity=a.idcity');
        $this->db->join('tbl_rateplanhotel c','c.idhotel=a.idhotel');
        $this->db->join('tbl_rateallotment d','d.idrateplanhotel=c.idrateplanhotel');
        $this->db->where('a.hotel_seo',$hotel);
        $this->db->where('d.date',$checkin);
        $this->db->group_by('a.idhotel');
        return $this->db->get()->result();
    }
    
    // hotel detail
    function hotel_detail($hotel,$checkin, $promocode)
    {
        $this->db->select('
            a.idhotel,
			a.email,
            a.nowa,
            a.instagram_url,
            a.idregion,
            a.hotel_name,
            a.hotel_seo,
            a.address,
            a.phone,
            a.star,
            a.hotel_seo,
            a.picture,
            a.description,
            b.name as city,
            a.tripadvisor_widget3,
            fnc_lowrate(a.idhotel,"'.$checkin.'") as normalrate,
            fnc_lowrate(a.idhotel,"'.$checkin.'")-coalesce(fnc_newpromo1(fnc_lowrate(a.idhotel,"'.$checkin.'"), a.idhotel, c.idrateplanhotel,"'.$checkin.'","'.$promocode.'"),0) as rate,
            coalesce(fnc_newpromo1(fnc_lowrate(a.idhotel,"'.$checkin.'"), a.idhotel, c.idrateplanhotel,"'.$checkin.'","'.$promocode.'"),0) as promo,
            c.cancellationpolicy,
            a.latitude,
            a.longitude,d.allotment');
        $this->db->from('tbl_hotel a');
        $this->db->join('tbl_city b','b.idcity=a.idcity');
        $this->db->join('tbl_rateplanhotel c','c.idhotel=a.idhotel');
        $this->db->join('tbl_rateallotment d','d.idrateplanhotel=c.idrateplanhotel');
        $this->db->where('a.hotel_seo',$hotel);
        $this->db->where('d.date',$checkin);
        $this->db->group_by('a.idhotel');
        $this->db->order_by('d.rate','asc');
        return $this->db->get()->row();
    }
    
    // hotel picture
    function hotel_picture($hotel)
    {
        $this->db->select('*');
        $this->db->from('tbl_hotelpicture');
        $this->db->where('idhotel',$hotel);
        $this->db->where('publish','Y');
        return $this->db->get()->result();
    }

    function hotel_command($hotel)
    {
        $this->db->select('subject,idhotel,rates,command');
        $this->db->from('tbl_command');
        $this->db->where('idhotel',$hotel);
        $this->db->limit('1');
        return $this->db->get()->result();
    }

    function hotel_commandall($hotel)
    {
        $this->db->select('subject,idhotel,rates,command');
        $this->db->from('tbl_command');
        $this->db->where('idhotel',$hotel);
        return $this->db->get()->result();
    }
    
    // hotel facility
    function hotel_facility($hotel)
	{
		$this->db->select('b.name');
		$this->db->from('tbl_hotel a');
		$this->db->join('tbl_facilities b',"FIND_IN_SET(b.idfacilities, a.facilities)", 0);
		$this->db->where('a.idhotel',$hotel);
		return $this->db->get()->result();
	}
    
     // hotel room
    function hotel_room($hotel,$checkindate,$duration,$room,$promocode)
    {
        $this->db->select('
            d.idhotel, 
            e.idroomhotel, 
            f.name as roomtype, 
            b.idrateplanhotel,
            a.rate, 
            c.name as roomrateplan, 
            sum(a.rate*'.$room.') as totalrate,
            a.rate-(coalesce(fnc_newpromo1(a.rate, '.$hotel.', a.idrateplanhotel, a.date,"'.$promocode.'"),0)) as pricepromo, 
            sum(fnc_newpromo1(a.rate, '.$hotel.', a.idrateplanhotel, a.date, "'.$promocode.'")*'.$room.') as promo,
            sum(coalesce(a.rate-fnc_newpromo1(a.rate, '.$hotel.', a.idrateplanhotel, a.date,"'.$promocode.'"),a.rate)*'.$room.') as publishrate,
            count(a.date) as duration, 
            e.description,
            a.allotment, 
            e.picture,
            a.open,
            e.amenities');
        $this->db->from('tbl_rateallotment a');
        $this->db->join('tbl_rateplanhotel b','b.idrateplanhotel=a.idrateplanhotel');
        $this->db->join('tbl_rateplan c','c.idrateplan=b.idrateplan');
        $this->db->join('tbl_hotel d','d.idhotel=b.idhotel');
        $this->db->join('tbl_roomhotel e','e.idroomhotel=a.idroomhotel');
        $this->db->join('tbl_roomtype f','f.idroomtype=e.idroomtype');
        $this->db->where('d.idhotel',$hotel);
        $this->db->where('(a.date between "'.$checkindate.'" and DATE_ADD("'.$checkindate.'",INTERVAL '.$duration.'-1 DAY))');
        $this->db->where('a.open','Y');
        $this->db->group_by('a.idrateplanhotel');
        $this->db->having('COUNT(a.date) >= '.$duration.'', null, false);
        $this->db->having('a.allotment >= '.$room);
        $this->db->order_by('a.rate');
        return $this->db->get()->result();
    }

    function hotel_partnerroom($hotel,$checkindate,$duration,$room)
    {
        $this->db->select('
            d.idhotel, 
            e.idroomhotel, 
            f.name as roomtype, 
            b.idrateplanhotel,
            a.rate, 
            c.name as roomrateplan,             
            pr.citilink_family_pack as pricepromo, 
            0 as promo,
            pr.citilink_family_pack as publishrate,
            count(a.date) as duration, 
            e.description,
            a.allotment, 
            e.picture,
            a.open,
            e.amenities');
        $this->db->from('tbl_rateallotment a');
        $this->db->join('tbl_rateplanhotel b','b.idrateplanhotel=a.idrateplanhotel');
        $this->db->join('tbl_rateplan c','c.idrateplan=b.idrateplan');
        $this->db->join('tbl_hotel d','d.idhotel=b.idhotel');
        $this->db->join('tbl_roomhotel e','e.idroomhotel=a.idroomhotel');
        $this->db->join('db_newsme.tbl_roommapping rm','a.idroomhotel=rm.roomcode','left');
        $this->db->join('db_newsme.tbl_partnerrate pr','rm.idroom=pr.idroom','left');
        $this->db->join('tbl_roomtype f','f.idroomtype=e.idroomtype');
        $this->db->where('d.idhotel',$hotel);
        $this->db->where('(a.date between "'.$checkindate.'" and DATE_ADD("'.$checkindate.'",INTERVAL '.$duration.'-1 DAY))');
        $this->db->where('a.open','Y');
        $this->db->group_by('a.idrateplanhotel');
        $this->db->having('COUNT(a.date) >= '.$duration.'', null, false);
        $this->db->having('a.allotment >= '.$room);
        $this->db->order_by('a.rate');
        return $this->db->get()->result();
    }


       public function get_jabodetabek($idregion)
    {
      $query = $this->db->query(' select a.idseasonal,a.judul,a.harga,a.lama,a.picture,b.hotel_name as idhotel
        from tbl_seasonal a 
        inner join tbl_hotel b on a.idhotel=b.idhotel
        inner join tbl_region c on b.idregion=c.idregion
        where c.idregion='.$idregion.'' )->result();
         return $query;
    }

    public function getbk($hotel)
    {
        $this->db->select('coalesce(header,\'https://myhorison.com/assets/images/hotel-booking-header.jpg\') AS header');
        $this->db->from('tbl_hotel');
        $this->db->where('hotel_seo',$hotel);
        return $this->db->get()->row()->header;
    }

     public function get_popup($idhotel)
    {
      $query = $this->db->query(' select a.idhotel,a.picture from tbl_pophotel a 
      	left join tbl_hotel b on a.idhotel=b.idhotel
		where a.public="Y" and a.idhotel='.$idhotel.'' )->result();
         return $query;
    }
    
}
