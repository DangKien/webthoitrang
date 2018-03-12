 @extends('layouts.master') @section('content')
<div class="contact-section">
    <div class="row">
        <div class="container fix-container">
            <div class="contact-title col-md-12">
                <div class="solid"></div>
                <h1>Contact</h1>
            </div>
            <div class="contact-description col-md-6">
                <div class="infomation">
                    <p>Where are we</p>
                    <p>Ho Chi Minh City Fine Arts Museum</p>
                    <p>97A Pho Duc Chinh St., D.1,</p>
                    <p>Ho Chi Minh City</p>
                    <p>T: +8428-38213695</p>
                    <p>M: VN +84-919025726</p>
                    <p>www.vietnamartist.com</p>
                </div>
                <div class="map">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3919.5429917963065!2d106.69725961432022!3d10.769661192326103!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752f4077edf9b1%3A0xb1466bf707230576!2zQuG6o28gdMOgbmcgTeG7uSB0aHXhuq10IFRow6BuaCBwaOG7kSBI4buTIENow60gTWluaA!5e0!3m2!1svi!2s!4v1516239048309" width="100%" height="442" frameborder="0" style="border:0" allowfullscreen></iframe>
                </div>
            </div>
            <div class="col-md-6 contact-form-page-wrapper">
                <div class="main">
                    <h2 class="title">contact form</h2>
                    <form action="" class="form-contact">
                        <div class="form-group">
                            <input type="text" class="form-control" name="name" placeholder="Name">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="address" placeholder="Address">
                        </div>
                        <div class="form-group">
                            <input type="email" class="form-control" name="email" placeholder="Email">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="phone" placeholder="Phone">
                        </div>
                        <div class="form-group">
                            <textarea name="content" class="content form-control" placeholder="Content" rows="2"></textarea>
                        </div>
                        <div class="form-group">
                            <a href="#" class="submit form-control">SUBMIT</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection