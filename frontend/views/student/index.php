<html>
<head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
<style> 
.custom-background {
        background-color: #f8f9fa;
        padding: 30px;
        border-radius: 10px;
}
/* .timeline {
    list-style-type: none;
    display: flex;
    justify-content: space-between;
    padding: 0;
    
}

.timeline-item {
    position: relative;
    padding: 10px;
    background-color: #f0f0f0;
    margin: 10px;
    text-align: center;
    background-color: #0093ad;
    color: #fff;
    font-weight: bold ;

}


.timeline-item::before {
    content: "";
    position: absolute;
    top: 50%;
    left: 100%;
    width: 50px;
    height: 2px;
    background-color: #0093ad;
}

.timeline-item:last-child::before {
    display: none;
} */
.timeline {
    position: relative;
    max-width: 1200px;
    margin: 0 auto;
}

.timeline::after {
    content: '';
    position: absolute;
    width: 6px;
    background-color: #6c757d;
    top: 0;
    bottom: 0;
    left: 50%;
    margin-left: -3px;
}

.timeline-item {
    padding: 2px 10px; /* Further reduced padding */
    position: relative;
    background-color: inherit;
    width: 50%;
    box-sizing: border-box;
    margin-bottom: 2px; /* Further reduced margin */
}

.timeline-item::before {
    content: ' ';
    position: absolute;
    width: 20px;
    height: 20px;
    right: -10px;
    background-color: white;
    border: 4px solid #6c757d;
    top: 15px;
    border-radius: 50%;
    z-index: 1;
}

.step {
    font-weight: bold;
}

.timeline-item:nth-child(odd) {
    left: 0;
}

.timeline-item:nth-child(even) {
    left: 50%;
}

@media (max-width: 600px) {
    .timeline-item {
        width: 100%;
    }
    .timeline-item:nth-child(odd) {
        left: 0%;
    }
    .timeline-item:nth-child(even) {
        left: 0%;
    }
}
.regpro{
    background-color: #f8f9fa;
    padding: 30px;
    border-radius: 10px;
}
h2{
    text-align: center;
    font-weight: bold;
    color: #0093ad;
}
.row {
        display: flex;
        align-items: center;
    }
    .img-fluid {
        max-width: 80%;
        max-height: 80%;
        object-fit: cover;
    }
    .full-width-btn {
        display: block;
        width: 100%;
    }
    .icon-large {
    font-size: 1.2em; /* Adjust as needed */
    margin-right: 0.5em; /* Add some space to the right of the icon */
    }
    .card {
    box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
    transition: 0.3s;
}

.card:hover {
    box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
}
    
</style>
</head>
<body>                            
<?php
/** @var yii\web\View $this */
use yii\helpers\Html;
$this->title = 'SPMB App-IT Del';
?>
<div class="site-index">
<div class="container my-5">
    <div class="row">
        <div class="col-lg-6 order-lg-2">
            <h2 class="display-4">Selamat Datang di Portal Penerimaan Mahasiswa Baru IT Del</h2> <br><br>
            <p class="lead">Portal seleksi penerimaan mahasiswa baru ini merupakan portal informasi  untuk calon mahasiswa baru 
                Institut Teknologi Del. Temukan informasi terkait penerimaan mahasiswa baru di portal ini. </p>
                <br>
                <?= Html::a('Buat Akun', ['register-student'], ['class' => 'btn btn-primary full-width-btn']) ?>
        </div>
        <div class="col-lg-6 order-lg-1">
            <img src="/bground/asset_prodi.png" class="img-fluid" alt="Responsive image">
        </div>
    </div>
</div>

<div class="regpro">    
<div class="container my-5">
    <div class="row">
        <div class="col-lg-6">
            <h2 class="display-4">Kembangkan Diri dan Berinovasi Untuk Indonesia</h2> <br>
            <p class="lead">IT Del hadir sebagai jawaban untuk kamu yang ingin mengembangkan diri, 
                mendapatkan pengalaman dan berkontribusi langsung menghasilkan karya terbaik bagi bangsa melalui pendidikan, 
                serta membangun networking untuk modal kamu di masa depan. </p>
        </div>
        <div class="col-lg-6">
            <img src="/bground/1.jpg" class="img-fluid" alt="Responsive image">
        </div>
    </div>
</div>
</div>
<br><br>
<div class="regpro">  
<h2>Menjadi Mahasiswa dengan Karakter 3M</h2>  <br>  <br>
<div class="container">    
    <div class="row align-items-start text-center">
        <div class="col">
            <i class="fas fa-cross fa-3x mb-3"></i>
            <h2 class="mb-3">MarTuhan</h2>
            <p>MarTuhan adalah keyakinan akan keberadaan Tuhan dan kesetiaan 
            untuk mengenal dan mengasihi Tuhan, sebagai sambutan atas kasih Tuhan kepada manusia, 
            yang membangkitkan gairah belajar disiplin kontemplatif spiritual yang membentuk pembaharuan 
            budi sehingga menimbulkan kepedulian.</p>
        </div>
        <div class="col">
            <i class="fas fa-heart fa-3x mb-3"></i>
            <h2 class="mb-3">MarRoha</h2>
            <p>MarRoha adalah sikap dalam bertindak berlandaskan pada kerendahan hati dengan 
            penuh tanggung jawab, melakukan apapun dengan hati, dan tunduk pada nilai-nilai moral dalam kaitannya 
            dengan makhluk hidup lainnya. Integritas: kesadaran moral dan etika menuju kebajikan.</p>
        </div>
        <div class="col">
            <i class="fas fa-book fa-3x mb-3"></i>
            <h2 class="mb-3">MarBisuk</h2>
            <p>MarBisuk adalah bijaksana berdasarkan hikmat yang mengedepankan kearifan dan pengertian 
            berdasarkan penguasaan pengetahuan dan kecakapan dalam bekerja dan kesediaan belajar sepanjang hayat. 
            Ilmu: cakap dan berkarya dengan akal budi menuju hikmat.</p>
        </div>
    </div>
</div>
</div> 
<br>
<div class="regpro">
    <h2 class="text-center mb-4">Alur Pendaftaran Mahasiswa Baru</h2>
    <div class="container">
        <div class="timeline">
            <div class="timeline-item">
                <span class="step"><i class="fas fa-user-plus"></i> Tahap 1</span>
                <h4>Registrasi Akun</h4>
                <p>Daftarkan diri Anda dengan mengisi form registrasi online yang telah disediakan.</p>
            </div>
            <div class="timeline-item">
                <span class="step"><i class="fas fa-info-circle"></i> Tahap 2</span>
                <h4>Pengisian Data Diri</h4>
                <p>Lengkapi data diri dan pastikan semua informasi yang Anda berikan adalah valid.</p>
            </div>
            <div class="timeline-item">
                <span class="step"><i class="fas fa-upload"></i> Tahap 3</span>
                <h4>Upload Berkas Persyaratan</h4>
                <p>Upload semua berkas yang dibutuhkan seperti ijazah, dan dokumen lainnya.</p>
            </div>
            <div class="timeline-item">
                <span class="step"><i class="fas fa-money-check-alt"></i> Tahap 4</span>
                <h4>Pembayaran Biaya Pendaftaran</h4>
                <p>Lakukan pembayaran biaya pendaftaran melalui metode pembayaran yang telah disediakan.</p>
            </div>
            <div class="timeline-item">
                <span class="step"><i class="fas fa-clipboard-check"></i> Tahap 5</span>
                <h4>Seleksi Administrasi & Akademik</h4>
                <p>Tim kami akan melakukan seleksi administrasi dan akademik.</p>
            </div>
            <div class="timeline-item">
                <span class="step"><i class="fas fa-redo"></i> Tahap 6</span>
                <h4>Pendaftaran Ulang</h4>
                <p>Jika Anda lolos seleksi, Anda akan diminta untuk melakukan pendaftaran ulang.</p>
            </div>
        </div>
    </div>
</div>
<!-- 
<div class="regpro">
    <h2>Alur Pendaftaran Mahasiswa Baru</h2>  <br>  <br>
    <ol class="timeline">
    <li class="timeline-item">
        <strong>Tahap 1:<br></strong> Registrasi Akun
    </li>
    <li class="timeline-item">
        <strong>Tahap 2:<br></strong> Pengisian Data Diri
    </li>
    <li class="timeline-item">
        <strong>Tahap 3:<br></strong> Upload Berkas Persyaratan
    </li>
    <li class="timeline-item">
        <strong>Tahap 4:<br></strong> Pembayaran Biaya Pendaftaran
    </li>
    <li class="timeline-item">
        <strong>Tahap 5:<br></strong> Seleksi Administrasi & Akademik
    </li>
    <li class="timeline-item">
        <strong>Tahap 6:<br></strong> Pendaftaran Ulang
    </li>
    </ol>
    <br> <br>
</div> -->
<br>
<!-- dashboard pmb goes here  -->
<div class="regpro">
    <h2 class="text-center mb-4">Dashboard Program SPMB IT-Del</h2>
    <div class="container mt-5">
    <div class="row row-cols-1 row-cols-md-4 g-4">
        <div class="col">
            <div class="card h-100 bg-primary text-white">
                <div class="card-body">
                    <h5 class="card-title"><i class="fas fa-users"></i> Pendaftar SPMB</h5>
                    <p class="card-text">Total mahasiswa yang telah mendaftar di IT Del : 10000</p>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card h-100 bg-success text-white">
                <div class="card-body">
                    <h5 class="card-title"><i class="fas fa-user-plus"></i> Mahasiswa Aktif</h5>
                    <p class="card-text">Jumlah mahasiswa aktif yang telah terdaftar di IT Del : 8000</p>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card h-100 bg-info text-white">
                <div class="card-body">
                    <h5 class="card-title"><i class="fas fa-graduation-cap"></i> Alumni</h5>
                    <p class="card-text">Jumlah mahasiswa yang telah menyelesaikan studi di IT Del : 800</p>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card h-100 bg-success text-white">
                <div class="card-body">
                    <h5 class="card-title"><i class="fas fa-award"></i> Penerima Beasiswa</h5>
                    <p class="card-text">Jumlah mahasiswa penerima beasiswa di IT Del : 500</p>
                </div>
            </div>
        </div>
    </div>
</div>
<br>
<br>
<!-- galery spmb -->
<div class="container">
    <div class="row row-cols-1 row-cols-md-3 g-4">
        <div class="col">
            <div class="card h-100">
                <img src="/bground/1.jpg" class="card-img-top" alt="Image 1">
                <div class="card-body">
                    <h5 class="card-title">Title 1</h5>
                    <p class="card-text">This is a description of the first image.</p>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card h-100">
                <img src="/bground/2.jpg" class="card-img-top" alt="Image 2">
                <div class="card-body">
                    <h5 class="card-title">Title 2</h5>
                    <p class="card-text">This is a description of the second image.</p>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card h-100">
                <img src="/bground/3.jpg" class="card-img-top" alt="Image 2">
                <div class="card-body">
                    <h5 class="card-title">Title 3</h5>
                    <p class="card-text">This is a description of the third image.</p>
                </div>
            </div>
        </div>
        <!-- Add more cards as needed -->
    </div>
</div>
</div>
<br>
<div class="custom-background">
        <h2 style="text-align: center;"> Pertanyaan yang Paling Sering Ditanyakan </h2> <br><br>
        <!-- Add your content here -->
    <div class="accordion accordion-flush custom-accordion" id="accordionFlushExample">  
    <div class="accordion-item">
    <h2 class="accordion-header" id="flush-headingOne">
    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
        <i class="bi bi-question-circle-fill icon-large"></i> Apakah saya bisa mendaftar lebih dari satu jurusan ?
    </button>
    </h2>
    <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
    <div class="accordion-body">Placeholder content for this accordion, which is intended to demonstrate the <code>.accordion-flush</code> class. This is the first item's accordion body.</div>
    </div>
</div>
<div class="accordion-item">
    <h2 class="accordion-header" id="flush-headingTwo">
    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
        <i class="bi bi-pencil-fill icon-large"></i> Bagaimana cara saya mendaftarkan diri ?
    </button>
    </h2>
    <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
    <div class="accordion-body">Placeholder content for this accordion, which is intended to demonstrate the <code>.accordion-flush</code> class. This is the second item's accordion body. Let's imagine this being filled with some actual content.</div>
    </div>
</div>
<div class="accordion-item">
    <h2 class="accordion-header" id="flush-headingThree">
    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
        <i class="bi bi-exclamation-circle-fill icon-large"></i> Mengapa saya tidak mendapatkan kode verifikasi ?
    </button>
    </h2>
    <div id="flush-collapseThree" class="accordion-collapse collapse" aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample">
    <div class="accordion-body">Placeholder content for this accordion, which is intended to demonstrate the <code>.accordion-flush</code> class. This is the third item's accordion body. Nothing more exciting happening here in terms of content, but just filling up the space to make it look, at least at first glance, a bit more representative of how this would look in a real-world application.</div>
    </div>
</div>
<div class="accordion-item">
    <h2 class="accordion-header" id="flush-headingFour">
    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseFour" aria-expanded="false" aria-controls="flush-collapseFour">
        <i class="bi bi-book-fill icon-large"></i> Apa saja program studi yang tersedia di IT Del ?
    </button>
    </h2>
    <div id="flush-collapseFour" class="accordion-collapse collapse" aria-labelledby="flush-headingFour" data-bs-parent="#accordionFlushExample">
    <div class="accordion-body">Placeholder content for this accordion, which is intended to demonstrate the <code>.accordion-flush</code> class. This is the fourth item's accordion body.</div>
    </div>
</div>
<div class="accordion-item">
    <h2 class="accordion-header" id="flush-headingFive">
    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseFive" aria-expanded="false" aria-controls="flush-collapseFive">
        <i class="bi bi-key-fill icon-large"></i> Bagaimana jika saya lupa password ?
    </button>
    </h2>
    <div id="flush-collapseFive" class="accordion-collapse collapse" aria-labelledby="flush-headingFive" data-bs-parent="#accordionFlushExample">
    <div class="accordion-body">Placeholder content for this accordion, which is intended to demonstrate the <code>.accordion-flush</code> class. This is the fifth item's accordion body.</div>
    </div>
</div>
<div class="accordion-item">
    <h2 class="accordion-header" id="flush-headingSix">
    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseSix" aria-expanded="false" aria-controls="flush-collapseSix">
        <i class="bi bi-folder2-open icon-large"></i> Apa saja berkas yang diperlukan untuk mendaftar ?
    </button>
    </h2>
    <div id="flush-collapseSix" class="accordion-collapse collapse" aria-labelledby="flush-headingSix" data-bs-parent="#accordionFlushExample">
    <div class="accordion-body">Placeholder content for this accordion, which is intended to demonstrate the <code>.accordion-flush</code> class. This is the sixth item's accordion body.</div>
    </div>
</div>
<div class="accordion-item">
    <h2 class="accordion-header" id="flush-headingSeven">
    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseSeven" aria-expanded="false" aria-controls="flush-collapseSeven">
        <i class="bi bi-question-circle-fill icon-large"></i> Bagaimana jika saya lupa username ?
    </button>
    </h2>
    <div id="flush-collapseSeven" class="accordion-collapse collapse" aria-labelledby="flush-headingSeven" data-bs-parent="#accordionFlushExample">
    <div class="accordion-body">Placeholder content for this accordion, which is intended to demonstrate the <code>.accordion-flush</code> class. This is the seventh item's accordion body.</div>
    </div>
</div>
<div class="accordion-item">
    <h2 class="accordion-header" id="flush-headingEight">
    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseEight" aria-expanded="false" aria-controls="flush-collapseEight">
        <i class="bi bi-upload icon-large"></i> Mengapa file saya tidak bisa diupload ?
    </button>
    </h2>
    <div id="flush-collapseEight" class="accordion-collapse collapse" aria-labelledby="flush-headingEight" data-bs-parent="#accordionFlushExample">
    <div class="accordion-body">Placeholder content for this accordion, which is intended to demonstrate the <code>.accordion-flush</code> class. This is the eighth item's accordion body.</div>
    </div>
</div>
<div class="accordion-item">
    <h2 class="accordion-header" id="flush-headingNine">
    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseNine" aria-expanded="false" aria-controls="flush-collapseNine">
        <i class="bi bi-list-check icon-large"></i> Apa saja yang diperlukan saat melakukan pendaftaran ulang ?
    </button>
    </h2>
    <div id="flush-collapseNine" class="accordion-collapse collapse" aria-labelledby="flush-headingNine" data-bs-parent="#accordionFlushExample">
    <div class="accordion-body">Placeholder content for this accordion, which is intended to demonstrate the <code>.accordion-flush</code> class. This is the ninth item's accordion body.</div>
    </div>  
</div>
</div>
</div>
</div>

</body>
</html>
    <!-- ChatWith.io WhatsApp chat widget code -->
<!-- <script type="text/javascript">
        (function () {
            var options = {
                whatsapp: "+62-822-7219-4708", // WhatsApp number
                call_to_action: "Message us", // Call to action
                position: "right", // Position may be 'right' or 'left'
            };
            var proto = document.location.protocol, host = "getbutton.io", url = proto + "//static." + host;
            var s = document.createElement('script'); s.type = 'text/javascript'; s.async = true; s.src = url + '/widget-send-button/js/init.js';
            s.onload = function () { WhWidgetSendButton.init(host, proto, options); };
            var x = document.getElementsByTagName('script')[0]; x.parentNode.insertBefore(s, x);
        })();
    </script> -->

