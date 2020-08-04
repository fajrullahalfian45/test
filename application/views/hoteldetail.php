<div class="container py-4" style="margin-top:177px;">
        <div class="row">
            <div class="col-md-6">
                <ul class="breadcrumb">
                    <li><a href="index.html" style="color:#75337a">Home</a></li>
                    <li><a href="" class="text-dark">Bandung</a></li>
                    <li class="active"><?php echo $hotel_name ?></li>
                </ul>
            </div>
            <div class="col-md-6 text-right">
                <button type="submit" class="btn btn-primary btn-sm mt-1"> <i class="fa fa-search"></i>Cari Ulang</button>
            </div>

        </div>
        <hr />
    </div>



    <section class=" py-0" style="margin-bottom: 150px">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <h1 style="font-size: 20px"><?php echo $hotel_name ?></h1>
                    <div class="row">
                        <div class="info-hotel pl-3" style="display: inline-block;">
                            <div class="left-hotel float-left mr-3"><i class="fa fa-university text-info"></i><span>Hotel</span></div>
                            <div class="right-stars float-right">
                                <p class="star">
                                    <?php
                                    if ($star >= 1) 
                                    {
                                    ?>
                                        <i class="fa fa-star"></i>
                                    <?php
                                    }
                                    ?>
                                    <?php
                                    if ($star >= 2) 
                                    {
                                    ?>
                                        <i class="fa fa-star"></i>
                                    <?php
                                    }
                                    ?>
                                    <?php
                                    if ($star >= 3) 
                                    {
                                    ?>
                                        <i class="fa fa-star"></i>
                                    <?php
                                    }
                                    ?>
                                    <?php
                                    if ($star >= 4) 
                                    {
                                    ?>
                                        <i class="fa fa-star"></i>
                                    <?php
                                    }
                                    ?>
                                    <?php
                                    if ($star >= 5) 
                                    {
                                    ?>
                                        <i class="fa fa-star"></i>
                                    <?php
                                    }
                                    ?>
                                </p>
                            </div>
                        </div>
                    </div>
                    <span class="addr-hotel"><i class="fa fa-map-marker text-info"></i><?php echo $address ?></span>
                    <hr>

                    <div class="container">
                        <div class="row">
                            <div class="col-md-9 no-gutter">
                                <div id="hotel-detail1" class="slider-pro">
                                    <div class="sp-slides">
                                        <?php
                                        foreach($picturelead as $pl)
                                        {
                                            ?>
                                            <div class="sp-slide">
                                                <img class="sp-image" src="<?php echo url(false).'assets/images/hotels/'.$pl->picture ?>" data-src="<?php echo url(false).'assets/images/hotels/'.$pl->picture ?>" data-small="<?php echo url(false).'assets/images/hotels/'.$pl->picture ?>" data-medium="<?php echo url(false).'assets/images/hotels/'.$pl->picture ?>" data-large="<?php echo url(false).'assets/images/hotels/'.$pl->picture ?>" data-retina="<?php echo url(false).'assets/images/hotels/'.$pl->picture ?>" />

                                                <p class="sp-layer sp-white sp-padding" data-horizontal="50" data-vertical="430" data-show-transition="left" data-show-delay="400">
                                                    <?php echo $pl->name ?>
                                                </p>
                                            </div>
                                           
                                            <?php
                                        }
                                        ?>
                                        

                                        
                                    </div>

                                    <div class="sp-thumbnails">
                                        <?php
                                        foreach($picturethumb as $pt)
                                        {
                                            ?>
                                            <img class="sp-thumbnail" src="<?php echo url(false).'assets/images/hotels/'.$pt->picture ?>" />

                                            <?php
                                        }
                                        ?>
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 no-gutter text-right">
                                <p>Harga/kamar/malam mulai dari</p>
                                <h2 style="font-size: 18px;font-weight:bold;color:#f96d01;">Rp 487,250</h2>
                                <button type="submit" class="btn btn-custom btn-sm mt-2"><a class="text-white" href="#select-room">Pilih Kamar</a></button>
                            </div>
                        </div>
                    </div>


                </div>
                <div class="container py-4" style="margin-top: 30px;">
                    <div class="row">
                        <div class="col-md-12 info-lokasi">
                            <h1>Peta Lokasi</h1>
                            <span class="addr-hotel"><i class="fa fa-map-marker text-info"></i><?php echo $address ?></span>
                            <div class="open-peta pt-2">
                                <img class="img-fluid" src="<?php echo base_url('assets/newpackage/images/dummy-map.png');?>">
                                <div class="caption">
                                    <p><a href="">Buka Peta</a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="container py-4" style="margin-top: 30px;">
                    <div class="row">
                        <div class="col-md-12 py-2">
                            <div id="select-room">
                                <h1>Pilih Kamar</h1>
                            </div>
                            <hr>
                        </div>
                    </div>
                    <?php
                    foreach($listroom as $room)
                    {
                        ?> 

                        <?php echo form_open($action, array('role' => 'form')); ?>
                        <input type="hidden" name="idhotel" value="<?php echo $room->idhotel ?>">
                        <input type="hidden" name="guest" value="<?php echo $guest ?>">
                        <input type="hidden" name="room" value="<?php echo $this->input->get('room') ?>">
                        <input type="hidden" name="checkindate" value="<?php echo tanggal($checkindate) ?>">
                        <input type="hidden" name="duration" value="<?php echo $duration ?>">
                        <input type="hidden" name="idroomhotel" value="<?php echo $room->idroomhotel ?>">
                        <input type="hidden" name="idrateplanhotel" value="<?php echo $room->idrateplanhotel ?>">
                        <input type="hidden" name="promocode" value="<?php echo $this->input->get('promocode') ?>">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <img class="ultima-hotel" src="<?php echo url(false).'assets/images/rooms/'.$room->picture ?>">
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <h2 style="font-size: 20px" class="font-weight-bold"><?php echo $room->roomtype ?></h2>
                                    <p><?php echo $room->description ?></p>

                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3 text-right  mt-4 pt-4">
                                    <?php
                                    if($room->promo>0){
                                        ?>
                                        <div class="promo mt-1">Rp <?php echo number_format($room->rate) ?></div>
                                        
                                        <?php
                                    }
                                    ?>
                                    <h1 style="font-size: 22px; color:#ff9f43;font-weight: bolder;">
                                        <?php echo number_format($room->pricepromo) ?>
                                    </h1>
                                    <mute>/ kamar / malam</mute>
                                    <h2>Termasuk Pajak</h2>
                                    <button type="submit" class="btn btn-custom btn-sm mt-2"><a class="text-white">Pesan Sekarang</a></button>
                                </div>

                            </div>
                        </div>
                        <br>
                        <?php echo form_close(); ?>
                        <?php
                    }
                    ?>
                    
                    <div class="container">
                        <hr />
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 info-hotel pt-4">
                                <h1 style="font-size: 24px;color:#212121"><?php echo $hotel_name?>l</h1>
                                <p><?php echo $description ?></p>


                                <br />
                                <hr />
                                <div class="facilities">
                                    <h1 style="font-size: 24px;color:#212121">Hotel facilities</h1>
                                </div>

                                <div class="row mt-3">
                                    <div class="col-lg-3 col-md-3 col-sm-3 text-dark">
                                        <ul>
                                            <?php
                                            $idk=1;
                                            foreach($listfacility as $facility)
                                            {
                                                ?>

                                                <li><i class="fa fa-square"></i>
                                                    <?php echo $facility->name ?>
                                                </li>
                                                <?php
                                                $idk++;
                                                if ($idk==10)
                                                {
                                                    echo '</ul></div>';
                                                    echo '<div class="col-lg-3 col-md-3 col-sm-3"><ul>';
                                                    $idk=1;
                                                }
                                            }
                                            ?>
                                        </ul>
                                   
                                </div>
                                <div>
                                    <h2 style="font-size: 22px; margin-top: 10px">Nearby Attractions</h2>
                                </div>

                                <div class="row mt-3">
                                    <div class="col-lg-123 col-md-12 col-sm-12">
                                        Peta
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>