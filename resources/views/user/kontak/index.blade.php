@extends('user.main')
@section('content')
    <style>
        .custom-input {
            background-color: rgb(245, 245, 245);
        }
    </style>

    <main id="main">
        <!-- ======= Breadcrumbs ======= -->
        <section id="breadcrumbs" class="breadcrumbs">
            <div class="breadcrumb-hero">
                <div class="container">
                    <div class="breadcrumb-hero">
                        <h2 style="font-family: 'Inter-boldd'">Kontak</h2>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Breadcrumbs -->

        <!-- ======= Contact Section ======= -->
        <section id="contact" class="contact">
            <div class="container">
                <div class="row mt-5">
                    <div class="col-lg-12 mt-5 mt-lg-0" data-aos="fade-left">
                        <form action="forms/contact.php" method="post" role="form" class="php-email-form">
                            <div class="row">
                                <div class="col-md-4 form-group">
                                    <input type="text" name="name" class="form-control rounded custom-input"
                                        id="name" placeholder="Nama" required />
                                </div>
                                <div class="col-md-4 form-group mt-3 mt-md-0">
                                    <input type="email" class="form-control rounded custom-input" name="email"
                                        id="email" placeholder="Email" required />
                                </div>
                                <div class="col-md-4 form-group mt-3 mt-md-0">
                                    <input type="email" class="form-control rounded custom-input" name="email"
                                        id="email" placeholder="No. Telepon" required />
                                </div>
                            </div>

                            <div class="form-group mt-3">
                                <textarea class="form-control rounded custom-input" name="message" rows="5" placeholder="Message" required></textarea>
                            </div>
                            <div class="my-3">
                                <div class="loading">Loading</div>
                                <div class="error-message"></div>
                                <div class="sent-message">Your message has been sent. Thank you!</div>
                            </div>
                            <div class="text-center"><button type="submit">Kirim</button></div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Contact Section -->
    </main>
    <!-- End #main -->
@endsection
