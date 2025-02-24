@extends('admin.layouts.app')

@section('style')
<link rel="stylesheet" href="{{ url('/admin/plugins/summernote/summernote-bs4.min.css') }}">
<style>
    /* General Layout and Typography Styles */
    body {
        font-family: 'Arial', sans-serif;
        background-color: #f4f6f9;
        color: #333;
    }

    h1, h3, h4 {
        color: #2c3e50;
    }

    .card-header {
        background-color: #2c3e50;
        color: white;
    }

    .card-body {
        background-color: #ffffff;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        padding: 20px;
    }

    .content-wrapper {
        padding: 30px;
    }

    /* Profile Section */
    .form-group img {
        max-width: 100%;
        height: auto;
        border-radius: 50%;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .form-group h3 {
        font-size: 28px;
        font-weight: 600;
    }

    .form-group p {
        line-height: 1.7;
        color: #7f8c8d;
    }

    /* Lists for Skills and Achievements */

    ul li {
        font-size: 16px;
        margin: 5px 0;
        padding-left: 20px;
        position: relative;
    }

    ul li::before {

        color: #2ecc71;
        position: absolute;
        left: 0;
        top: 0;
    }

    /* Contact Information */
    .contact-info a {
        color: #2980b9;
        text-decoration: none;
    }

    .contact-info a:hover {
        text-decoration: underline;
    }

    /* Section Breaks */
    hr {
        border-top: 1px solid #e0e0e0;
        margin: 20px 0;
    }

    /* Card Responsive Design */
    @media (max-width: 768px) {
        .form-group img {
            width: 80%;
            margin: 0 auto;
            display: block;
        }

        .col-md-10, .col-md-6 {
            margin-top: 20px;
        }
    }

    /* Profile Cards */
    .card-primary {
        margin-bottom: 20px;
        border-radius: 10px;
    }
</style>
@endsection

@section('content')
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1 class="m-0">About Developer</h1>
                </div>
            </div>
        </div>
    </div>

    <!-- Developer Profile 1: Anup Banskota -->
    <div class="col-md-12">
        <div class="card card-primary">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-2">
                        <div class="form-group">
                            <img src="/Developers/anup.jpg" alt="Anup Banskota" class="img-fluid">
                        </div>
                    </div>
                    <div class="col-md-10">
                        <div class="form-group">
                            <h3><strong>Anup Banskota</strong></h3>
                            <hr>
                            <p style="font-style: italic; color: gray;">"Innovation thrives at the intersection of creativity and functionality."</p>
                            <p>A visionary programmer and innovator with a strong commitment to solving real-world challenges through technology. As the founder of NextGenIT and a key contributor to RongKrishi, the focus remains on creating impactful, scalable solutions that drive progress and efficiency.</p>
                            <p>Hi, I’m Anup Banskota, an entrepreneur and programmer passionate about using technology to solve real-world problems. As the founder of NextGenIT and a key contributor to RongKrishi, I focus on building practical and impactful solutions. I enjoy exploring new technologies, designing innovative systems, and finding ways to make a difference through my work.</p>
                        </div>
                    </div>
                    <!-- Key Skills -->
                    <div class="col-md-6">
                        <div class="form-group">
                            <hr>
                            <h4>Key Skills</h4>
                            <hr>
                            <ul>
                                <li><strong>Programming Expertise:</strong> Python, JavaScript, C++, PHP and more.</li>
                                <li><strong>Frameworks & Tools:</strong> React, Node.js, Laravel.</li>
                                <li><strong>Specialties:</strong> Software architecture, AI integration, and developing scalable systems.</li>
                                <li><strong>Innovative Projects:</strong> Advancing agricultural technology with RongKrishi and empowering businesses with NextGenIT solutions.</li>
                            </ul>
                        </div>
                    </div>
                    <!-- Achievements -->
                    <div class="col-md-6">
                        <div class="form-group">
                            <hr>
                            <h4>Achievements</h4>
                            <hr>
                            <ul>
                                <li>Founder of NextGenIT, delivering cutting-edge IT solutions to modern challenges.</li>
                                <li>Pioneered innovative tools and equipment for RongKrishi, transforming agriculture.</li>
                                <li>Successfully led diverse teams to create robust software and technology frameworks.</li>
                                <li>Developed and launched a scalable project management platform that streamlined workflow and collaboration for multiple teams.</li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <hr>
                            <h4>Interests</h4>
                            <hr>
                            <p style="text-align: justify;">Deeply invested in exploring emerging technologies, building sustainable solutions, and driving meaningful change across industries.
                                Passionate about the intersection of technology and human-centered design to create impactful innovations.
                            </p>
                        </div>
                    </div>

                    <!-- Contact Information -->
                    <div class="col-md-6">
                        <div class="form-group">
                            <hr>
                            <h4>Contact Information</h4>
                            <hr>
                            <p style="margin-left: 20px;">📞 Phone: +977 <a href="tel:9804911528">9804911528</a></p>
                            <p style="margin-left: 20px;">✉️ Email: <a href="mailto:baskota.anup11@gmail.com">baskota.anup11@gmail.com</a></p>
                            <p style="margin-left: 20px;">💼 LinkedIn: <a href="https://www.linkedin.com/in/anup-banskota-73935b284/" target="_blank">Anup Banskota</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Thank You & References Section -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1 class="m-0">Thank You & References</h1>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-12">
        <div class="card card-primary">
            <div class="card-body">
                <div class="form-group">
                    <p>I would like to extend my deepest gratitude to everyone who contributed to the development of the RongKrishi software. Your dedication, hard work, and expertise have been invaluable in bringing this project to life. Special thanks to Prajwal Tamang, whose technical skills and commitment played a key role in making this software a reality. I am truly grateful for your support and collaboration. Together, we have created something impactful, and I look forward to achieving even greater milestones in the future. Thank you once again for your time, effort, and unwavering belief in this vision.</p>
                    <hr>
                    <h3>References & Credits</h3>
                    <hr>
                    <ul>
                        <li><a href="https://adminlte.io/" target="_blank" style="color: black;">AdminLTE Bootstrap Admin Dashboard Template</a></li>
                        <li><a href="https://themeforest.net/item/molla-ecommerce-html5-template/25119280" target="_blank" style="color: black;">Molla - eCommerce HTML5 Template</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
