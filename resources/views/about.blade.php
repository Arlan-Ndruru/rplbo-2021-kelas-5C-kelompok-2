@extends('layouts.home.main')

@section('content-main')
<!-- -------- START HEADER 8 w/ card over right bg image ------- -->
<section>
    <div class="page-header min-vh-100">
        <div class="container">
            <div class="row" style="margin-top: 100px;">
                <div class="col-6 d-lg-flex d-none h-100 my-auto pe-0 position-absolute top-0 start-0 text-center justify-content-center flex-column">
                    <div class="position-relative h-100 m-3 px-7 border-radius-lg d-flex flex-column justify-content-center"
                        style="background-image: url('home/assets/img/illustrations/illustration-signin.jpg'); background-size: cover;"
                        loading="lazy"></div>
                </div>
                <div class="col-xl-5 col-lg-6 col-md-7 d-flex flex-column ms-auto me-auto ms-lg-auto me-lg-5">
                    <div class="card d-flex blur justify-content-center shadow-lg my-sm-0 my-sm-6 mt-8 mb-5">
                        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2 bg-transparent">
                            <div class="bg-gradient-primary shadow-primary border-radius-lg p-3">
                                <h3 class="text-white text-primary mb-0">Contact us</h3>
                            </div>
                        </div>
                        <div class="card-body">
                            <form id="contact-form" method="post" autocomplete="off">
                                <div class="card-body p-0 my-3">
                                    <div class="form-group mb-0 mt-md-0 mt-4">
                                        <div class="input-group input-group-static mb-4">
                                            <label>Email</label>
                                            <input type="email" class="form-control"
                                                placeholder="hello@creative-tim.com">
                                        </div>
                                    </div>
                                    <div class="form-group mb-0 mt-md-0 mt-4">
                                        <div class="input-group input-group-static mb-4">
                                            <label>How can we help you?</label>
                                            <textarea name="message" class="form-control" id="message" rows="6"
                                                placeholder="Describe your problem in at least 250 characters"></textarea>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 text-center">
                                            <button type="submit" class="btn bg-gradient-primary mt-3 mb-0">Send
                                                Message</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- -------- END HEADER 8 w/ card over right bg image ------- -->
<section class="pb-5 position-relative bg-gradient-dark mx-n3">
    <div class="container">
        <div class="row">
            <div class="col-md-8 text-start mb-5 mt-5">
                <h3 class="text-white z-index-1 position-relative">The Executive Team</h3>
                <p class="text-white opacity-8 mb-0">There’s nothing I really wanted to do in life that I wasn’t able to
                    get good at. That’s my skill.</p>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6 col-12">
                <div class="card card-profile mt-4">
                    <div class="row">
                        <div class="col-lg-4 col-md-6 col-12 mt-n5">
                            <a href="javascript:;">
                                <div class="p-3 pe-md-0">
                                    <img class="w-100 border-radius-md shadow-lg" src="home/assets/img/ivana-square.jpg"
                                        alt="image">
                                </div>
                            </a>
                        </div>
                        <div class="col-lg-8 col-md-6 col-12 my-auto">
                            <div class="card-body ps-lg-0">
                                <h5 class="mb-0">M Badri</h5>
                                <h6 class="text-info">Ketua Kelompok</h6>
                                <p class="mb-0">"<i class="bi bi-emoji-smile"></i>"</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-12">
                <div class="card card-profile mt-lg-4 mt-5">
                    <div class="row">
                        <div class="col-lg-4 col-md-6 col-12 mt-n5">
                            <a href="javascript:;">
                                <div class="p-3 pe-md-0">
                                    <img class="w-100 border-radius-md shadow-lg" src="home/assets/img/bruce-mars.jpg"
                                        alt="image">
                                </div>
                            </a>
                        </div>
                        <div class="col-lg-8 col-md-6 col-12 my-auto">
                            <div class="card-body ps-lg-0">
                                <h5 class="mb-0">M Fadli Ariansyah</h5>
                                <h6 class="text-info">Analisis Sistem</h6>
                                <p class="mb-0">"<i class="bi bi-emoji-smile"></i>"</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-lg-6 col-12">
                <div class="card card-profile mt-4 z-index-2">
                    <div class="row">
                        <div class="col-lg-4 col-md-6 col-12 mt-n5">
                            <a href="javascript:;">
                                <div class="p-3 pe-md-0">
                                    <img class="w-100 border-radius-md shadow-lg" src="home/assets/img/ivana-squares.jpg"
                                        alt="image">
                                </div>
                            </a>
                        </div>
                        <div class="col-lg-8 col-md-6 col-12 my-auto">
                            <div class="card-body ps-lg-0">
                                <h5 class="mb-0">Amelia Irsyada</h5>
                                <h6 class="text-info">Desainer Antarmuka dan Database</h6>
                                <p class="mb-0">"<i class="bi bi-emoji-smile"></i>"</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-12">
                <div class="card card-profile mt-lg-4 mt-5 z-index-2">
                    <div class="row">
                        <div class="col-lg-4 col-md-6 col-12 mt-n5">
                            <a href="javascript:;">
                                <div class="p-3 pe-md-0">
                                    <img class="w-100 border-radius-md shadow-lg" src="home/assets/img/team-2.jpg"
                                        alt="image">
                                </div>
                            </a>
                        </div>
                        <div class="col-lg-8 col-md-6 col-12 my-auto">
                            <div class="card-body ps-lg-0">
                                <h5 class="mb-0">Arlan Joliansa Ndruru</h5>
                                <h6 class="text-info">Programmer</h6>
                                <p class="mb-0">"<i class="bi bi-emoji-smile"></i>"</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection