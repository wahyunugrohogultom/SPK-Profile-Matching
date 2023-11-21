<!DOCTYPE html>
<html lang="en">
<head>

     <title>SDN 73 Kota Bengkulu</title>
<!-- 
Hydro Template 
http://www.templatemo.com/tm-509-hydro
-->
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=Edge">
     <meta name="description" content="">
     <meta name="keywords" content="">
     <meta name="author" content="">
     <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

     <link rel="stylesheet" href="{{ asset('csslanding/bootstrap.min.css')}}">
     <link rel="stylesheet" href="{{ asset('csslanding/magnific-popup.css')}}">
     <link rel="stylesheet" href="{{ asset('csslanding/font-awesome.min.css')}}">

     <!-- MAIN CSS -->
     <link rel="stylesheet" href="{{ asset('csslanding/templatemo-style.css')}}">
</head>
<body>

     <!-- PRE LOADER -->
     <section class="preloader">
          <div class="spinner">
               <span class="spinner-rotate"></span>
          </div>
     </section>


     <!-- MENU -->
     <section class="navbar custom-navbar navbar-fixed-top" role="navigation">
          <div class="container">

               <div class="navbar-header">
                    <button class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                         <span class="icon icon-bar"></span>
                         <span class="icon icon-bar"></span>
                         <span class="icon icon-bar"></span>
                    </button>

                    <!-- lOGO TEXT HERE -->
                    <a href="#" class="navbar-brand">SDN 73 Bengkulu</a>
               </div>

               <!-- MENU LINKS -->
               <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-nav-first">
                         <li><a href="#home" class="smoothScroll">Beranda</a></li>
                         <li><a href="#about" class="smoothScroll">Profil</a></li>
                         <li><a href="{{ url('Login') }}" class="smoothScroll">SPK Guru</a></li>
                         <li><a href="#blog" class="smoothScroll">Visi & Misi</a></li>
                         <li><a href="#work" class="smoothScroll">Galeri</a></li>
                    </ul>
               </div>
          </div>
     </section>


     <!-- HOME -->
     <section id="home" data-stellar-background-ratio="0.5">
          <div class="overlay"></div>
          <div class="container">
               <div class="row">

                    <div class="col-md-6 col-sm-12">
                         <div class="home-info">
                              <h1>Sekolah Dasar Negeri 73 Kota Bengkulu</h1>
                              <h3>Singaran Pati Kota Bengkulu</h3>
                         </div>
                    </div>

                    <div class="col-md-6 col-sm-12">
                         <div class="home-video">
                              <div class="embed-responsive embed-responsive-16by9">
                                   <img src="../img/home2.jpg" alt="SDN 73 Kota">
                              </div>
                         </div>
                    </div>
                    
               </div>
          </div>
     </section>


     <!-- ABOUT -->
     <section id="about" data-stellar-background-ratio="0.5">
          <div class="container">
               <div class="row">

                    <div class="col-md-5 col-sm-6">
                         <div class="about-info">
                              <div class="section-title">
                                   <h2>MARIDENTI ASNI, S.Pd</h2>
                                   <span class="line-bar">...</span>
                              </div>
                              <p>Sebagai lembaga pendidikan, SD Negeri 73 Kota Bengkulu tanggap dengan perkembangan teknologi yang semakin berkembang pesat. Dengan dukungan SDM yang di miliki sekolah ini siap untuk berkompetisi dengan sekolah lain dalam pelayanan informasi publik. Teknologi Informasi Web khususnya, menjadi sarana bagi SD Negeri 73 Kota Bengkulu untuk memberi pelayanan informasi secara cepat, jelas, dan akuntable. Dari layanan ini pula, sekolah siap menerima saran dari semua pihak yang akhirnya dapat menjawab kebutuhan masyarakat.</p>
                         </div>
                    </div>

                    <div class="col-md-3 col-sm-6">
                         <div class="about-info skill-thumb">

                         </div>
                    </div>

                    <div class="col-md-4 col-sm-12">
                         <div class="about-image">
                              <img src="img/kepsek.jpg" class="img-responsive" alt="">
                         </div>
                    </div>
                    
               </div>
          </div>
     </section>


     <!-- BLOG -->
     <section id="blog" data-stellar-background-ratio="0.5">
          <div class="container">
               <div class="row">

                    <div class="col-md-12 col-sm-12">
                         <div class="section-title">
                              <h2>Visi dan Misi</h2>
                              <span class="line-bar">...</span>
                         </div>
                    </div>

                    <div class="col-md-12 col-sm-12">
                         <!-- BLOG THUMB -->
                         <div class="media blog-thumb">
                              <div class="media-object media-left">
                                   <a href="#"><img src="../img/visi.jpg" class="img-responsive" alt=""></a>
                              </div>
                              <div class="media-body blog-info">
                                   <h3>Visi</h3>
                                   <p>"BERIMAN, BERILMU, BERPRESTASI DAN TERAMPIL</p>
                                   <a href="{{ url('detail') }}" class="btn section-btn">View Detail</a>
                              </div>
                         </div>
                    </div>
                    
               </div>
          </div>
     </section>


     <!-- WORK -->
     <section id="work" data-stellar-background-ratio="0.5">
          <div class="container">
               <div class="row">

                    <div class="col-md-12 col-sm-12">
                         <div class="section-title">
                              <h2>Galeri</h2>
                              <span class="line-bar">...</span>
                         </div>
                    </div>

                    <div class="col-md-3 col-sm-6">
                         <!-- WORK THUMB -->
                         <div class="work-thumb">
                              <a href="../img/foto1.jpg" class="image-popup">
                                   <img src="../img/foto1.jpg" class="img-responsive" alt="">
                              </a>
                         </div>
                    </div>

                    <div class="col-md-3 col-sm-6">
                         <!-- WORK THUMB -->
                         <div class="work-thumb">
                              <a href="../img/foto2.jpg" class="image-popup">
                                   <img src="../img/foto2.jpg" class="img-responsive" alt="Work">

                              </a>
                         </div>
                    </div>

                    <div class="col-md-3 col-sm-6">
                         <!-- WORK THUMB -->
                         <div class="work-thumb">
                              <a href="../img/foto3.jpg" class="image-popup">
                                   <img src="../img/foto3.jpg" class="img-responsive" alt="Work">

                              </a>
                         </div>
                    </div>

                    <div class="col-md-3 col-sm-6">
                         <!-- WORK THUMB -->
                         <div class="work-thumb">
                              <a href="../img/foto4.jpg" class="image-popup">
                                   <img src="../img/foto4.jpg" class="img-responsive" alt="Work">

                              </a>
                         </div>
                    </div>

               </div>
          </div>
     </section>


     <!-- FOOTER -->
     <footer data-stellar-background-ratio="0.5">
          <div class="container">
               <div class="row">

                    <div class="col-md-5 col-sm-12">
                         <div class="footer-thumb footer-info"> 
                              <h2>SDN 73 Kota Bengkulu</h2>
                              <p>Jl. Danau Tes No. 43, RT/RW 0/0, Dsn. Padang Nangka, Ds./Kel Padang Nangka, Kec. Singaran Pati, Kota Bengkulu, Prov. Bengkulu</p>
                         </div>
                    </div>

                    <div class="col-md-2 col-sm-4"> 
                         <div class="footer-thumb"> 
                              
                         </div>
                    </div>

                    <div class="col-md-4 col-sm-4"> 
                         <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3980.9976856493813!2d102.30718631021361!3d-3.8105795435790153!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e36b1e2be0849df%3A0x65f38129d2986f08!2sSDN%2073%20kota%20bengkulu!5e0!3m2!1sid!2sid!4v1699852592329!5m2!1sid!2sid" width="400" height="250" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>

                    <div class="col-md-12 col-sm-12">
                         <div class="footer-bottom">
                              <div class="col-md-6 col-sm-5">
                                   <div class="copyright-text"> 
                                        <p>Copyright &copy; 2023 SDN 73 KOTA BENGKULU All right reserved</p>
                                   </div>
                              </div>
                              <div class="col-md-6 col-sm-7">
                                   <div class="phone-contact"> 
                                        <p>Kontak <span>0736342745</span></p>
                                   </div>
                                   <div class="phone-contact"> 
                                        <p>Email <span>sdnegeri73kotabengkulu@yahoo.com</span></p>
                                   </div>
                              </div>
                         </div>
                    </div>
                    
               </div>
          </div>
     </footer>


     <!-- MODAL -->
     <section class="modal fade" id="modal-form" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-lg">
               <div class="modal-content modal-popup">

                    <div class="modal-header">
                         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                         </button>
                    </div>

                    <div class="modal-body">
                         <div class="container-fluid">
                              <div class="row">

                                   <div class="col-md-12 col-sm-12">
                                        <div class="modal-title">
                                             <h2>Hydro Co</h2>
                                        </div>

                                        <!-- NAV TABS -->
                                        <ul class="nav nav-tabs" role="tablist">
                                             <li class="active"><a href="#sign_up" aria-controls="sign_up" role="tab" data-toggle="tab">Create an account</a></li>
                                             <li><a href="#sign_in" aria-controls="sign_in" role="tab" data-toggle="tab">Sign In</a></li>
                                        </ul>

                                        <!-- TAB PANES -->
                                        <div class="tab-content">
                                             <div role="tabpanel" class="tab-pane fade in active" id="sign_up">
                                                  <form action="#" method="post">
                                                       <input type="text" class="form-control" name="name" placeholder="Name" required>
                                                       <input type="telephone" class="form-control" name="telephone" placeholder="Telephone" required>
                                                       <input type="email" class="form-control" name="email" placeholder="Email" required>
                                                       <input type="password" class="form-control" name="password" placeholder="Password" required>
                                                       <input type="submit" class="form-control" name="submit" value="Submit Button">
                                                  </form>
                                             </div>

                                             <div role="tabpanel" class="tab-pane fade in" id="sign_in">
                                                  <form action="#" method="post">
                                                       <input type="email" class="form-control" name="email" placeholder="Email" required>
                                                       <input type="password" class="form-control" name="password" placeholder="Password" required>
                                                       <input type="submit" class="form-control" name="submit" value="Submit Button">
                                                       <a href="https://www.facebook.com/templatemo">Forgot your password?</a>
                                                  </form>
                                             </div>
                                        </div>
                                   </div>

                              </div>
                         </div>
                    </div>

               </div>
          </div>
     </section>

     <!-- SCRIPTS -->
     <script src="{{ asset('jslanding/jquery.js')}}"></script>
     <script src="{{ asset('jslanding/bootstrap.min.js')}}"></script>
     <script src="{{ asset('jslanding/jquery.stellar.min.js')}}"></script>
     <script src="{{ asset('jslanding/jquery.magnific-popup.min.js')}}"></script>
     <script src="{{ asset('jslanding/smoothscroll.js')}}"></script>
     <script src="{{ asset('jslanding/custom.js')}}"></script>

</body>
</html>