<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller 
{

    function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('member_username')=="") 
        {
            $this->session->set_userdata('member_username', '');
        }
        $this->load->model('Welcome_model');
     
    }
    
    public function index()
    {
        
        $data = array(
            'title' => 'Hotels Gue',
            'css' => '<link type="text/css" rel="stylesheet" href="'.base_url('assets/newpackage/add/datepicker.css').'"/>',
            'js' => '
             <script src="'.base_url('assets/newpackage/js/typeahead.js').'"></script>
            <script>                
                $(document).ready(function(){                                                                                   
                    $(".typeahead").typeahead({
                        source: function (query, result) {
                            $.ajax({                            
                            url: "'.site_url('welcome/get_autocomplete').'",                                       
                            dataType: "json",                           
                            success: function (data) {                              
                                result($.map(data, function (item) {
                                    return item;
                                }));
                            }
                        });
                    }
                    });

                    $(".typeahead").change(function () {
                    var current = $(".typeahead").typeahead("getActive");
                    if (current) {
                        $("#location").val(current.cap);
                        $("#keyword").val(current.id);
                        if (current.icon=="building")
                        {
                            $("#by").val("hotel");
                        }
                        else
                        {
                            $("#by").val("kota");
                        }
                    }                                               
                    });

                });
                
                function setCheckOut(){
                    var val = $("#checkindate").val();                  
                    var valParts = val.split("-");
                    var date = new Date(valParts[2], valParts[1] - 1, valParts[0]);
                    var days = parseInt($("#night").val());
                    date.setDate(date.getDate() + days);
                    var dt = ("0" + date.getDate()).slice(-2) + "-" +  ("0" +  (date.getMonth() + 1)).slice(-2)  + "-" + date.getFullYear();
                    $("#checkoutdate").val(dt);                 
                }

                 function ts(){

                    var val = $("#checkindate").val();   
                    var valParts = val.split("-");
                    var date = new Date(valParts[2], valParts[1] - 1, valParts[0]);

                   
                    var oneDay = 24*60*60*1000;
                    var oneDay2 = 7*24*60*60*1000;
                    var val2 = $("#checkoutdate").val();  

                   


                    var valParts2 = val2.split("-");
                    var date2 = new Date(valParts2[2], valParts2[1] - 1, valParts2[0]);

                    var dt = Math.round(Math.round((date2.getTime() - date.getTime()) / (oneDay)));


                    if(dt<=7){

                            $("#night").val(dt);    
                    }
                   
                    
                 else if(dt>7)
                    {
                     

                        var st = Math.round(Math.round((date.getTime()) / (oneDay2)));

                            // $("#checkoutdate").val(st);   

                            $("#night").val(dt);    
                    }


                }



                 function ts2(){

                    var val = $("#checkindate2").val();   
                    var valParts = val.split("-");
                    var date = new Date(valParts[2], valParts[1] - 1, valParts[0]);

                   
                    var oneDay = 24*60*60*1000;
                    var oneDay2 = 7*24*60*60*1000;
                    var val2 = $("#checkoutdate2").val();  

                   


                    var valParts2 = val2.split("-");
                    var date2 = new Date(valParts2[2], valParts2[1] - 1, valParts2[0]);

                    var dt = Math.round(Math.round((date2.getTime() - date.getTime()) / (oneDay)));


                    if(dt<=7){

                            $("#night2").val(dt);    
                    }
                   
                    
                 else if(dt>7)
                    {
                     

                        var st = Math.round(Math.round((date.getTime()) / (oneDay2)));

                            // $("#checkoutdate").val(st);   

                            $("#night2").val(dt);    
                    }


                }



            
                function getnight()
                {   
                    setCheckOut();
                }
                

                
                $("#check-in-date input").datepicker({format: "dd-mm-yyyy", startDate : new Date()});
               
            </script>',
           
        );
        $this->template->load('index','welcome',$data);
    }
    
    function get_autocomplete()
    {
        //if (isset($_POST['query'])) {
            $result = $this->Welcome_model->search_hotel('');
            if (count($result) > 0) {
            foreach ($result as $row)
                $arr_result[] = array(
                    'id' => $row->id, 
                    'name' => $row->name,
                    'cap' => $row->cap,
                    'icon' => $row->icon,
                );                  
                echo json_encode($arr_result);
            }
        //} 
    }
    
   
}
