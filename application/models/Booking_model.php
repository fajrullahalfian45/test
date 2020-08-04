<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Booking_model extends CI_Model {
    public $table = 'tbl_promotioncode';
    public $id = 'id';

    function __construct()
    {
        parent::__construct();
    }
	
    function listphonecode(){
        $this->db->select('idcountry, concat(nicename," (+",phonecode,")") as phonecode');
        $this->db->from('tbl_country');
        $this->db->order_by('nicename');
        return $this->db->get()->result();
    }
    
    // hotel detail
    function hoteldetail($hotel,$guest,$room,$checkindate,$duration,$idroomhotel,$idrateplanhotel)
    {
        $this->db->select('d.idhotel, d.hotel_name, e.idroomhotel, f.name as roomtype, b.idrateplanhotel, c.name as roomrateplan, a.rate, sum(a.rate*'.$room.') as totalrate, count(a.date) as duration, e.description, e.picture, e.amenities, a.allotment, "'.$checkindate.'" as checkin, DATE_ADD("'.$checkindate.'",INTERVAL '.$duration.' DAY) as checkout');
        $this->db->from('tbl_rateallotment a');
        $this->db->join('tbl_rateplanhotel b','b.idrateplanhotel=a.idrateplanhotel');
        $this->db->join('tbl_rateplan c','c.idrateplan=b.idrateplan');
        $this->db->join('tbl_hotel d','d.idhotel=b.idhotel');
        $this->db->join('tbl_roomhotel e','e.idroomhotel=a.idroomhotel');
        $this->db->join('tbl_roomtype f','f.idroomtype=e.idroomtype');
        $this->db->where('d.idhotel',$hotel);
        $this->db->where('(a.date between "'.$checkindate.'" and DATE_ADD("'.$checkindate.'",INTERVAL '.$duration.'-1 DAY))');
        $this->db->where('e.idroomhotel',$idroomhotel);
        $this->db->where('b.idrateplanhotel',$idrateplanhotel);
        $this->db->group_by('a.idrateplanhotel, a.idroomhotel');
        $this->db->having('COUNT(a.date) >= '.$duration.'', null, false);
        $this->db->having('a.allotment >= '.$room.'', null, false);
        $this->db->order_by('a.rate');
        return $this->db->get()->row();
    }
    
    // booking detail
    function bookingdetail($hotel,$guest,$room,$checkindate,$duration,$idroomhotel,$idrateplanhotel,$promocode)
    {
        if ($promocode=='HORISONCITIFAM')
        {
            $this->db->select('d.idhotel, d.hotel_name, e.idroomhotel, f.name as roomtype, b.idrateplanhotel, c.name as roomrateplan, pr.citilink_family_pack as rate, 
                pr.citilink_family_pack as totalrate, count(a.date) as duration, e.description, e.picture,
                0 as promo,
                e.amenities, a.allotment, "'.$checkindate.'" as checkin, 
                DATE_ADD("'.$checkindate.'",INTERVAL '.$duration.' DAY) as checkout');
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
            $this->db->where('e.idroomhotel',$idroomhotel);
            $this->db->where('b.idrateplanhotel',$idrateplanhotel);
            $this->db->group_by('a.idrateplanhotel, a.idroomhotel');
            $this->db->having('COUNT(a.date) >= '.$duration.'', null, false);
            $this->db->having('a.allotment >= '.$room.'', null, false);
            $this->db->order_by('a.rate');
        }
        else
        {
            $this->db->select('d.idhotel, d.hotel_name, e.idroomhotel, f.name as roomtype, b.idrateplanhotel, c.name as roomrateplan, a.rate, 
    			(a.rate*'.$room.'*'.$duration.') as totalrate, count(a.date) as duration, e.description, e.picture,
    			coalesce(fnc_newpromo1(a.rate, d.idhotel, b.idrateplanhotel, "'.$checkindate.'","'.$promocode.'")*'.$room.'*'.$duration.',0) as promo,
    			e.amenities, a.allotment, "'.$checkindate.'" as checkin, 
    			DATE_ADD("'.$checkindate.'",INTERVAL '.$duration.' DAY) as checkout');
            $this->db->from('tbl_rateallotment a');
            $this->db->join('tbl_rateplanhotel b','b.idrateplanhotel=a.idrateplanhotel');
            $this->db->join('tbl_rateplan c','c.idrateplan=b.idrateplan');
            $this->db->join('tbl_hotel d','d.idhotel=b.idhotel');
            $this->db->join('tbl_roomhotel e','e.idroomhotel=a.idroomhotel');
            $this->db->join('tbl_roomtype f','f.idroomtype=e.idroomtype');
            $this->db->where('d.idhotel',$hotel);
            $this->db->where('(a.date between "'.$checkindate.'" and DATE_ADD("'.$checkindate.'",INTERVAL '.$duration.'-1 DAY))');
            $this->db->where('e.idroomhotel',$idroomhotel);
            $this->db->where('b.idrateplanhotel',$idrateplanhotel);
            $this->db->group_by('a.idrateplanhotel, a.idroomhotel');
            $this->db->having('COUNT(a.date) >= '.$duration.'', null, false);
            $this->db->having('a.allotment >= '.$room.'', null, false);
            $this->db->order_by('a.rate');
            }
            return $this->db->get()->result();
    }
    
    // room detail
    function roomdetail($idhotel,$checkindate,$duration,$idroomhotel,$idrateplanhotel,$promocode)
    {
        if ($promocode=='HORISONCITIFAM')
        {
            $this->db->select('a.date, pr.citilink_family_pack as rate, 0 as promo');
            $this->db->from('tbl_rateallotment a');
            $this->db->join('tbl_rateplanhotel b','b.idrateplanhotel=a.idrateplanhotel');
            $this->db->join('db_newsme.tbl_roommapping rm','a.idroomhotel=rm.roomcode','left');
            $this->db->join('db_newsme.tbl_partnerrate pr','rm.idroom=pr.idroom','left');
            $this->db->where('a.idrateplanhotel',$idrateplanhotel);
            $this->db->where('a.idroomhotel',$idroomhotel);
            $this->db->where('(a.date between "'.$checkindate.'" and DATE_ADD("'.$checkindate.'",INTERVAL '.$duration.'-1 DAY))');
            $this->db->where('b.idhotel',$idhotel);
        }
        else
        {
            $this->db->select('a.date, a.rate, coalesce(fnc_newpromo1(a.rate, b.idhotel, a.idrateplanhotel, "'.$checkindate.'","'.$promocode.'"),0) as promo');
            $this->db->from('tbl_rateallotment a');
            $this->db->join('tbl_rateplanhotel b','b.idrateplanhotel=a.idrateplanhotel');
            $this->db->where('a.idrateplanhotel',$idrateplanhotel);
            $this->db->where('a.idroomhotel',$idroomhotel);
            $this->db->where('(a.date between "'.$checkindate.'" and DATE_ADD("'.$checkindate.'",INTERVAL '.$duration.'-1 DAY))');
            $this->db->where('b.idhotel',$idhotel);
        }
        return $this->db->get()->result();
    }

    function getpromocode($promocode){
        $this->db->select('coalesce(term,"") as term, promocode');
        $this->db->from('tbl_promotioncode');
        $this->db->where('promocode',$promocode);
        $dt=$this->db->get();
        if($dt){
            return '*'.$dt->row()->term;
        }else{
            return "";
        }
    }

    
    
}
