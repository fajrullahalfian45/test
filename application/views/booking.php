<div class="container py-4 pl-0" style="margin-top:177px;">
        <div class="container">
            <div class="row">
                <div class="col-md-12 mx-auto">
                    <ul class="breadcrumb">
                        <li><a href="index.html" style="color:#75337a">Home</a></li>
                        <li><a href="" class="text-dark">Bandung</a></li>
                        <?php
                        foreach($bookingdetail as $row)
                        {
                            ?>
                        <li><a href="" class="text-dark"><?php echo $row->hotel_name ?></a></li>
                        <?php
                        }?>
                        <li class="active">Booking Hotel</li>
                    </ul>
                </div>
            </div>
            <hr>
        </div>
    </div>


    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-9" style="margin-bottom: 100px;">
                        <h1 style="font-size: 24px">Pemesanan Hotel</h1>
                        <div class="container py-4 mt-0">
                            <div class="row mt-4">
                                <div class="col-md-2"><img src="<?php echo base_url('assets/newpackage/images/services/work-from-home.png');?>"></div>
                                <div class="col-md-10">
                                    <div class="pl-3">
                                        <p>Login dan nikmati keuntungan khusus member!</p>
                                        <span><i class="fa fa-map-marker text-info"></i>Nikmati pengalaman memesan yang lebih cepat dan keuntungan mendapatkan Point dengan login sekarang.</span>
                                    </div>
                                    <div class="pl-3 py-2"><a href="" data-toggle="modal" data-target="#enjoy">Masuk atau Daftar</a></div>
                                </div>
                            </div>
                        </div>
                        <hr>


                        <div class="container mt-4">
                            <div class="row mt-4">
                                <div class="col-md-12 no-gutter">
                                    <h1 style="font-size: 24px">Data Pemesan</h1>
                                    <form>
                                        <div class="form-group form-group-icon-left form-group-filled col-md-12 text-left pl-0 mt-3">
                                            <label class="bintang">Nama kontak</label>
                                            <input type="location" class="form-control" id="location" placeholder="" city,="" hotel,="" place="" to="" go="" ""="">
                                            <div class="keterangan">Isi nama pemesan sesuai KTP/Paspor/SIM (tanpa tanda baca/gelar)</div>
                                        </div>
                                        <div class="row mt-4">
                                            <div class="col-md-6">
                                                <div class="form-group form-group-icon-left form-group-filled col-md-12 text-left pl-0">
                                                    <label class="bintang">No. handphone kontak</label>
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <select class="js-example-basic-single js-states form-control country" id="id_label_single">
                                                                <option>+62</option>
                                                                <option>+63</option>
                                                                <option>+64</option>
                                                                <option>+65</option>
                                                                <option>+66</option>
                                                            </select>

                                                        </div>
                                                        <div class="col-md-8">
                                                            <input type="location" class="form-control" id="location" placeholder="" city,="" hotel,="" place="" to="" go="" ""="">

                                                        </div>
                                                        <div class="keterangan merah pl-3">Mohon mengisi no. handphone Anda tanpa simbol atau spasi.</div>
                                                        <div class="keterangan pl-3">Contoh: +62812345678, untuk Kode Negara (+62) dan No. Handphone 0812345678</div>
                                                        <div class="form-check mr-2 ml-3 pt-4">
                                                            <input type="checkbox" class="form-check-input" id="home">
                                                            <label class="form-check-label" for="visa">Sama dengan pemesan</label>
                                                        </div>

                                                    </div>

                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group form-group-icon-left form-group-filled col-md-12 text-left pl-0">
                                                    <label class="bintang">Alamat email kontak</label>
                                                    <input type="location" class="form-control" id="location" placeholder="" city,="" hotel,="" place="" to="" go="" ""="">
                                                    <div class="keterangan">Contoh: email@example.com</div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group form-group-icon-left form-group-filled col-md-12 text-left pl-0 mt-3">
                                            <label class="bintang">Nama lengkap tamu</label>
                                            <input type="nama" class="form-control" id="nama">
                                            <div class="keterangan">Isi nama pemesan sesuai KTP/Paspor/SIM (tanpa tanda baca/gelar)</div>
                                        </div>
                                        <a class="pl-3 mt-2 pb-2" href="">
                                            <h2>Tambah permintaan khusus</h2>
                                        </a>
                                        <h1 class="mt-2">Permintaan khusus (opsional)</h1>
                                        <p>Punya permintaan khusus? Ajukan permintaan Anda dan properti akan berusaha memenuhinya. (Permintaan khusus tidak dijamin dan dapat dikenakan biaya)</p>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="pt-4">
                            <h1>Important Notice</h1>
                            <p>Dengan situasi COVID-19, pastikan kebijakan pembatalan ini sesuai kebutuhan Anda.</p>
                        </div>
                        <hr>
                        <div class="pt-4">
                            <h1>Kebijakan pembatalan</h1>
                            <p>Jika dibatalkan setelah 20-Jun-2020 13:01, Anda akan dikenai biaya sebesar Rp 308.118 Jika tidak datang, Anda akan dikenai biaya sebesar Rp 308.118. Waktu menginap dan tipe kamar/unit tidak dapat diubah. Waktu yang tertera berdasarkan waktu lokal akomodasi.</p>
                        </div>

                        <hr>
                        <div class="pt-4">
                            <h1>Rincian Harga</h1>
                            <div class="rincian mt-4">
                                <p>Anda akan membayar dengan mata uang lokal ketika menginap di properti</p>
                            </div>
                        </div>

                        <hr>
                        <div class="pt-4">
                            <?php
                            foreach($bookingdetail as $row)
                            {
                                ?>
                            <h1><?php echo $row->hotel_name ?><small class="ml-2">Bayar saat Check-in</small></h1>
                            <div class="row mt-2">
                                <div class="col-md-6">(1x) <?php echo $row->roomtype ?> (<?php echo $duration?> malam)</div>
                                <div class="col-md-6 text-left" style="font-size: 20px">Rp <?php echo number_format($row->totalrate) ?></div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-md-6">Biaya Pemulihan Pajak</div>
                                <div class="col-md-6 text-left" style="font-size: 20px">Rp <?php echo number_format($row->promo) ?></div>
                            </div>
                            <hr>
                            <div class="row mt-2">
                                <div class="col-md-6 text-success">
                                    <h1>Bayar saat Check-in</h1>
                                </div>
                                <div class="col-md-6 text-left text-success" style="font-size: 20px">Rp <?php echo number_format($row->totalrate-$row->promo) ?></div>
                            </div>

                            <div class="row mt-2">
                                <div class="col-md-6">Bayar Sekarang</div>
                                <div class="col-md-6 text-left">Rp 0</div>
                            </div>
                            <hr>
                            <?php
                            }
                            ?>
                            <div class="row mt-4">
                                <div class="col-md-10"> Dengan mengeklik tombol di bawah, Anda menyetujui<a href=""> Syarat dan Ketentuan</a> serta <a href="">Kebijakan Privasi</a> dari HotelsGue.</div>
                                <div class="col-md-2 text-left"><button type="submit" class="btn btn-custom btn-sm mt-2"><a class="text-white" href="">Lanjutkan</a></button></div>
                            </div>

                        </div>

                    </div>

                    <div class="col-md-3" style="margin-bottom: 100px;">
                        <div class="container booking-order  pb-2 pt-3">
                            <div class="book-info">
                                <h1 class="text-center">Rincian pesanan</h1>
                            </div>
                            <hr>
                            <?php
                            foreach($bookingdetail as $row)
                            {
                                ?>
                            <div class="row mb-1">
                                <div class="col-md-5">
                                    <div class="img-hotel">
                                        <img class="img-fluid w-100" src="<?php echo url(false).'assets/images/rooms/'.$row->picture ?>">
                                        <small class="payment">Wifi Gratis</small>
                                    </div>
                                </div>
                                <div class="col-md-7">
                                    <p style="line-height: 16px"><?php echo $row->hotel_name ?></p>
                                    <small class="payment">Bayar saat Check-in</small>
                                </div>
                            </div>
                            <hr>
                            <?php
                            }
                            ?>
                            <div class="row mb-1">
                                <div class="col-md-5">
                                    <div class="img-hotel">
                                        <small class="payment1">Durasi</small>
                                    </div>
                                </div>
                                <div class="col-md-7 text-right">
                                    <small class="payment1"><?php echo $duration ?> malam</small>
                                </div>
                            </div>
                            <?php
                            foreach($bookingdetail as $row)
                            {
                                ?>
                            <div class="row mb-1">
                                <div class="col-md-5">
                                    <div class="img-hotel">
                                        <small class="payment1">Check-in</small>
                                    </div>
                                </div>
                                <div class="col-md-7 text-right">
                                    <small class="payment1">Sel, <?php echo tanggal($row->checkin) ?></small>
                                    <span>Dari 14:00</span>
                                </div>
                            </div>
                            <div class="row mb-1">
                                <div class="col-md-5">
                                    <div class="img-hotel">
                                        <small class="payment1">Check-out</small>
                                    </div>
                                </div>
                                <div class="col-md-7 text-right">
                                    <small class="payment1">Rab, <?php echo tanggal($row->checkout) ?></small>
                                    <span>Sebelum 12:00</span>
                                </div>
                            </div>
                            <hr>
                            <?php
                            }
                            ?>
                            <?php
                            foreach($bookingdetail as $row)
                            {
                                ?>
                            <div class="row mb-1">
                                <div class="col-md-5">
                                    <div class="img-hotel">
                                        <small class="payment1">Tipe kamar</small>
                                    </div>
                                </div>
                                <div class="col-md-7 text-right">
                                    <small class="payment1"><?php echo $row->roomtype ?></small>
                                </div>
                            </div>
                            <div class="row mb-1">
                                <div class="col-md-5">
                                    <div class="img-hotel">
                                        <small class="payment1">Tipe Tempat Tidur</small>
                                    </div>
                                </div>
                                <div class="col-md-7 text-right">
                                    <small class="payment1">1 ranjang twin</small>
                                </div>
                            </div>
                            <div class="row mb-1">
                                <div class="col-md-5">
                                    <div class="img-hotel">
                                        <small class="payment1">Jumlah kamar</small>
                                    </div>
                                </div>
                                <div class="col-md-7 text-right">
                                    <small class="payment1"><?php echo $room ?> Kamar</small>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-5">
                                    <div class="img-hotel">
                                        <small class="payment1">Tamu per kamar</small>
                                    </div>
                                </div>
                                <div class="col-md-7 text-right">
                                    <small class="payment1">2 Tamu</small>
                                </div>
                            </div>
                            <?php
                            }
                            ?>
                        </div>
                        <div class="container booking-order pb-2 pt-4 mt-4">
                            <div class="book-info">
                                <h1 class="text-center">Mengapa Pilih Ini?</h1>
                            </div>
                            <hr>
                            <div>
                                Rencana belum pasti atau gajian masih lama? Tidak perlu khawatir. Dengan Bayar saat Check-in, Anda dapat:
                                <br /><br />
                                1. Pesan kamar tanpa membayar terlebih dahulu
                                <br />
                                2. Bayar dengan uang tunai atau kartu saat check-in
                                <br />
                                3. Tidak perlu khawatir harus mengajukan refund jika harus membatalkan pesanan. (Hanya untuk pesanan dengan "Gratis Pembatalan")
                                <br />
                                Pilih satu dari metode ini untuk mengonfirmasi pesanan: kartu kredit atau PayLater. Setelah dikonfirmasi, kamar yang Anda pilih akan disimpan untuk Anda menginap.
                            </div>


                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>