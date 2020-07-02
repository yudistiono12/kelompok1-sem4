 <!-- bradcam_area  -->
    <div class="bradcam_area bradcam_bg_1">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="bradcam_text">
                        <h4>Katalog Buku Program studi teknologi industri pangan</h4>
                       
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/ bradcam_area  -->
<!-- popular_catagory_area_start  -->
    <div class="popular_catagory_area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section_title mb-40">
                        <h3>Daftar Buku Program studi Teknik Informatika </h3>
                    </div>
                </div>
            </div>
            <div class="row">
                <?php foreach ($tip as $t2): ?>
                    
                
                <div class="col-lg-4 col-xl-3 col-md-6">
                    <div class="single_catagory">
                        <a href="#"><h4><b>Judul : </b><?=$t2['judul'] ?></h4></a>
                        <h4>deskripsi</h4>
                        <p><b>tahun terbit <?= $t2['tahun_terbit'] ?> <br>tersedia = <?= $t2['exp'] ?></b> </p>
                        <p></p>
                    </div>
                </div>
                <?php endforeach ?>
                
            </div>
            <b>*Untuk melihat detail buku silahlan datang ke perpustakaan Secara Langsung*</b>
        </div>
    </div>
    <!-- popular_catagory_area_end  -->
