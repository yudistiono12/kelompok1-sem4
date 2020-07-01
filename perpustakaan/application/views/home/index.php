

    <!-- slider_area_start -->
    <div class="slider_area">
        <div class="single_slider  d-flex align-items-center slider_bg_1">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-7 col-md-6">
                        <div class="slider_text">
                            <h5 class="wow fadeInLeft" data-wow-duration="1s" data-wow-delay=".2s">Selamat Datang di Perpustakaan </h5>
                            <h3 class="wow fadeInLeft" data-wow-duration="1s" data-wow-delay=".3s">Politeknik Negeri Jember Kampus Bondowoso</h3>
                            <p class="wow fadeInLeft" data-wow-duration="1s" data-wow-delay=".4s">We  One Stop Information Service Provider</p>
                            <div class="sldier_btn wow fadeInLeft" data-wow-duration="1s" data-wow-delay=".5s">
                                <a href="#" class="boxed-btn3">Info</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="ilstration_img wow fadeInRight d-none d-lg-block text-right" data-wow-duration="1s" data-wow-delay=".2s">
            <img src="<?= base_url('assets/homee/'); ?>img/banner/illustration.png" alt="">
        </div>
    </div>
    <!-- slider_area_end -->

   
    <div class="top_companies_area">
        <div class="container">
            <div class="row align-items-center mb-40">
                <div class="col-lg-6 col-md-6">
                    <div class="section_title">
                        <h3></h3>
                    </div>
                </div>
                
            </div>
            <div class="row">
                <div class="col-lg-4 col-xl-3 col-md-6">
                    <div class="single_company">
                        <div class="thumb">
                            <img src="<?= base_url('assets/homee/'); ?>img/svg_icon/5.svg" alt="">
                        </div>
                        <a href="https://www.tandfonline.com/"><h3>Portal E- journal</h3></a>
                        <p>E-Journal Gallery Portal By Taylor & Francis Group</p>
                    </div>
                </div>
                <div class="col-lg-4 col-xl-3 col-md-6">
                    <div class="single_company">
                        <div class="thumb">
                            <img src="<?= base_url('assets/homee/'); ?>img/svg_icon/4.svg" alt="">
                        </div>
                        <a href="https://bc.vitalsource.com/tenants/state_polytechnic_jember/libraries?bookmeta_vbid=VBID"><h3>Portal E-Book</h3></a>
                        <p> E-Book Gallery Portal By VitalSource</p>
                    </div>
                </div>
                <div class="col-lg-4 col-xl-3 col-md-6">
                    <div class="single_company">
                        <div class="thumb">
                            <img src="<?= base_url('assets/homee/'); ?>img/svg_icon/3.svg" alt="">
                        </div>
                        <a href="http://e-library.polije.ac.id/"><h3> Katalog Buku</h3></a>
                        <p>Portal Katalog Buku Perpustakaan POLIJE</p>
                    </div>
                </div>
                <div class="col-lg-4 col-xl-3 col-md-6">
                    <div class="single_company">
                        <div class="thumb">
                            <img src="<?= base_url('assets/homee/'); ?>img/svg_icon/1.svg" alt="">
                        </div>
                        <a href="http://perpustakaan.polije.ac.id:81"><h3>E- Library Portal</h3></a>
                        <p> E-Library Portal Politeknik Negeri Jember</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

   

 

    <!-- job_listing_area_start  -->
    <div class="job_listing_area">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="section_title">
                        <br>
                        <h3>Kategori Buku </h3>
                    </div>
                </div>
               
            </div>
            <div class="job_lists">
                <div class="row">
                    <?php foreach ($kategori as $ktg ): ?>
                        
                   
                    <div class="col-lg-12 col-md-12">
                        <div class="single_jobs white-bg d-flex justify-content-between">
                            <div class="jobs_left d-flex align-items-center">
                                <div class="thumb">
                                    <img src="<?= base_url('assets/homee/'); ?>img/svg_icon/1.svg" alt="">
                                </div>
                                <div class="jobs_conetent">
                                    <a href="job_details.html"><h4><?= $ktg['nama_kategori'] ?></h4></a>
                            
                                </div>
                            </div>
                            <div class="jobs_right">
                                <div class="apply_now">
                                    <a class="heart_mark" href="#"> <i class="ti-heart"></i> </a>
                                    <a href="job_details.html" class="boxed-btn3">Lihat</a>
                                </div>
                                <div class="date">
                                    <p>tampilkan buku berdasarkan <b>kategori</b></p>
                                </div>
                            </div>
                        </div>
                    </div>
                     <?php endforeach ?>
                  
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- job_listing_area_end  -->

    <!-- featured_candidates_area_start  -->
    <div class="featured_candidates_area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section_title text-center mb-40">
                        <h3>Mini Katalog</h3>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="candidate_active owl-carousel">
                        <?php foreach ($buku as $b ): ?>
                            
                        
                        <div class="single_candidates text-center">
                            <div class="thumb">
                                <img src="<?= base_url('assets/homee/'); ?>img/candiateds/1.png" alt="">
                            </div>
                            <a href="#"><h4><?= $b['judul'] ?></h4></a>
                            <p><b><span>tersedia <?= $b['exp'] ?></span></b></p>
                        </div>
                        <?php endforeach ?>
                       
                      
                     
                      
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- featured_candidates_area_end  -->
 <!-- job_searcing_wrap  -->
    <div class="job_searcing_wrap overlay">
        <div class="container">
            <div class="row">
                <div class="col-lg-5 offset-lg-1 col-md-6">
                    <div class="searching_text">
                        <h3>Looking for a Job?</h3>
                        <p>We provide online instant cash loans with quick approval </p>
                        <a href="#" class="boxed-btn3">Browse Job</a>
                    </div>
                </div>
                <div class="col-lg-5 offset-lg-1 col-md-6">
                    <div class="searching_text">
                        <h3>Looking for a Expert?</h3>
                        <p>We provide online instant cash loans with quick approval </p>
                        <a href="#" class="boxed-btn3">Post a Job</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- job_searcing_wrap end  -->

    <!-- testimonial_area  -->
    <div class="testimonial_area  ">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section_title text-center mb-40">
                        <h3>Visi Dan Misi</h3>
                    </div>
                </div>
                <div class="col-xl-12">
                    <div class="testmonial_active owl-carousel">
                        <div class="single_carousel">
                            <div class="row">
                                <div class="col-lg-11">
                                    <div class="single_testmonial d-flex align-items-center">
                                        <div class="thumb">
                                            <img src="<?= base_url('assets/homee/'); ?>img/testmonial/visimisi.jpg" alt="">
                                            <div class="quote_icon">
                                                <i class="Flaticon flaticon-quote"></i>
                                            </div>
                                        </div>
                                        <div class="info">
                                           <p>V I S I:

Menjadikan perpustakaan sebagai wahana Pendidikan, Penelitian, Pelestarian, Informasi, dan Rekreasi (P3IR)
<br> 
M i s i:

Meningkatkan pelayanan kepada masyarakat melalui pelayanan prima. Mensosialisasikan gemar membaca dan meningkatkan kesadaran masyarakat terhadap pentingnya perpustakaan.

Meningkatkan peran serta, partisipasi, dan kontribusi masyarakat dalam upaya mengembangkan dan memberdayakan perpustakaan. Menjadikan perpustakaan sebagai perpustakaan yang dinamis</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="single_carousel">
                            <div class="row">
                                <div class="col-lg-11">
                                    <div class="single_testmonial d-flex align-items-center">
                                        <div class="thumb">
                                            <img src="<?= base_url('assets/homee/'); ?>img/testmonial/visimisi.jpg" alt="">
                                            <div class="quote_icon">
                                                <i class=" Flaticon flaticon-quote"></i>
                                            </div>
                                        </div>
                                        <div class="info">
                                            <p>V I S I:

Menjadikan perpustakaan sebagai wahana Pendidikan, Penelitian, Pelestarian, Informasi, dan Rekreasi (P3IR)
<br> 
M i s i:

Meningkatkan pelayanan kepada masyarakat melalui pelayanan prima. Mensosialisasikan gemar membaca dan meningkatkan kesadaran masyarakat terhadap pentingnya perpustakaan.

Meningkatkan peran serta, partisipasi, dan kontribusi masyarakat dalam upaya mengembangkan dan memberdayakan perpustakaan. Menjadikan perpustakaan sebagai perpustakaan yang dinamis</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="single_carousel">
                            <div class="row">
                                <div class="col-lg-11">
                                    <div class="single_testmonial d-flex align-items-center">
                                        <div class="thumb">
                                            <img src="<?= base_url('assets/homee/'); ?>img/testmonial/visimisi.jpg" alt="">
                                            <div class="quote_icon">
                                                <i class="Flaticon flaticon-quote"></i>
                                            </div>
                                        </div>
                                        <div class="info">
                                            <p>V I S I:

Menjadikan perpustakaan sebagai wahana Pendidikan, Penelitian, Pelestarian, Informasi, dan Rekreasi (P3IR)
<br> 
M i s i:

Meningkatkan pelayanan kepada masyarakat melalui pelayanan prima. Mensosialisasikan gemar membaca dan meningkatkan kesadaran masyarakat terhadap pentingnya perpustakaan.

Meningkatkan peran serta, partisipasi, dan kontribusi masyarakat dalam upaya mengembangkan dan memberdayakan perpustakaan. Menjadikan perpustakaan sebagai perpustakaan yang dinamis</p>
                                           
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /testimonial_area  -->


    