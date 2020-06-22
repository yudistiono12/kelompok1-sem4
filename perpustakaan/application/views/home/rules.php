 <!-- bradcam_area  -->
    <div class="bradcam_area bradcam_bg_1">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="bradcam_text">
                        <h4>Tata Tertib</h4>
                        <h4>Perpustakaan Politeknik Negeri Jember Kampus Bondowoso</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/ bradcam_area  -->

    <div class="job_details_area">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="job_details_header">
                        <div class="single_jobs white-bg d-flex justify-content-between">
                            <div class="jobs_left d-flex align-items-center">
                                <div class="thumb">
                                    <img src="<?= base_url('assets/homee/'); ?>img/svg_icon/1.svg" alt="">
                                </div>
                                <div class="jobs_conetent">
                                    <a href="#"><h4>Tata Tertib</h4></a>
                                    <div class="links_locat d-flex align-items-center">
                                        <div class="location">
                                            <p> <i class="fa fa-map-marker"></i> Bondowoso,Polije</p>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="jobs_right">
                                <div class="apply_now">
                                    <a class="heart_mark" href="#"> <i class="ti-heart"></i> </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="descript_wrap white-bg">
                        <div class="single_wrap">
                            <h4>I. KETENTUAN UMUM</h4>
                            <p>1. Anggota/pengunjung harus berpakain dan sopan <br> </p>
                            <p>2. Anggota/pengunjung Perpustakaan harus menitipkan tas,map,buku pribadidi tempat penitipan <br></p>
                            <p>3. Anggota/pengunjung perpustakaan harus mengisi absensi pengunjung perpustakaan <br></p>
                            <p>4. Anggota/pengunjung perpustakaan harus menjaga ketenangan,ketertiban selama berada dalam ruangan perpustakaan <br> </p>
                            <p>5. Bahan pustaka yang telah diambil dari rak agar tetap di letakan di meja baca <br> </p>
                            <p>6. Koleksi buku khusus dan referensi hanya di baca di tempat <br> </p>
                            <p>7. Bagi pengunjung yang ingin mem - foto copy bahan pustaka di luar area perpustakaan di wajibkan mengisi buku pinjaman, meninggalakan kartu anggota/KTP dan bahan pustakan di kembelikan pada hari yang sama <br></p>
                            <p>8. Pengunjung perpustakaan tidak di kenai biaya apapun memasuki area perpustakaan <br></p>
                        </div>
                        <div class="single_wrap">
                            <h4>II. PERATURAN SIRKULASI/PEMINJAMAN</h4>
                            <ul>
                                 1. JAM LAYANAN <br>  SENIN-KAMIS  <br>

                            <li> BUKA                08:00-12;00 </li>
                            <li>ISTIRAHAT         12;00-13;00</li>
                            <li>BUKA                 13;00-16;00  </li> 

                           <br> JUM'AT <br>
                           <li>BUKA                 08;00-11;00 </li>      
                           <li>ISTIRAHAT         11;00-13;30</li>             
                           <li>BUKA                 13;30-16;30</li>  
                            </ul>
                            <ul>
                                 2. LAYANAN SIRKULASI
                            <li>  Setiap anggota perpustakaan berhak meminjam buku sebanyak 2 eksemplar dengan jangka waktu 1(satu) minggu </li>
                            <li>Perpanjangan waktu pinjam harus bawa buku dengan jangka waktu 1 kali selama 1 (satu) minggu</li>
                            </ul>
                        </div>
                        <div class="single_wrap">
                            <h4>III. PELANGGARAN DAN SANKSI</h4>
                            <p>Anggota/pengunjung perpustakaan yang terbukti melanggar peraturan dan tata tertib yang berlaku akan di kenakan sanksi berupa teguran lisan, Teguran tertulis,skorsing peminjaman, di keluarkan dari keanggotaan perpustakaan <br><br>

                            Berikut ini jenis pelanggaran ;</p>
                            <ul>
                                <p>1. Anggota/pengunjung yang merusak,menghilangkan, atau mencoret-coret bahan pustaka, harus mengganti dengan buku baru yang sama</p> 
                                <p>2. Anggota/pengunjung perpustakaan yang terlambat mengembalikan buku-buku (sirkulasi) peminjaman akan di kenakan denda sebesar 500 per hari per buku</p>

                            </ul>
                        </div>
                    
                    </div>
                    
                </div>
                <div class="col-lg-4">
                    <div class="job_sumary">
                        <div class="summery_header">
                            <h3>Layanan</h3>
                        </div>
                        <div class="job_content">
                            <ul>
                                <li><a href="">jam pelayanan</a></li>
                                <li><a href="">Keanggotaan</a></li>
                                <li><a href="">Sirkulasi</a></li>
                                <li><a href="">Katalog</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="share_wrap d-flex">
                        <span>Share at:</span>
                        <ul>
                            <li><a href="#"> <i class="fa fa-facebook"></i></a> </li>
                            <li><a href="#"> <i class="fa fa-google-plus"></i></a> </li>
                            <li><a href="#"> <i class="fa fa-twitter"></i></a> </li>
                            <li><a href="#"> <i class="fa fa-envelope"></i></a> </li>
                        </ul>
                    </div>
                    <div class="job_location_wrap">
                        <div class="job_lok_inner">
                            <div id="map" style="height: 200px;"></div>
                            <script>
                              function initMap() {
                                var uluru = {lat: -25.363, lng: 131.044};
                                var grayStyles = [
                                  {
                                    featureType: "all",
                                    stylers: [
                                      { saturation: -90 },
                                      { lightness: 50 }
                                    ]
                                  },
                                  {elementType: 'labels.text.fill', stylers: [{color: '#ccdee9'}]}
                                ];
                                var map = new google.maps.Map(document.getElementById('map'), {
                                  center: {lat: -31.197, lng: 150.744},
                                  zoom: 9,
                                  styles: grayStyles,
                                  scrollwheel:  false
                                });
                              }
                              
                            </script>
                            <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDpfS1oRGreGSBU5HHjMmQ3o5NLw7VdJ6I&callback=initMap"></script>
                            
                          </div>
                    </div>
                </div>
            </div>
        </div>
    </div>