<html>
<head>
<style> 
.custom-background {
        background-color: #f8f9fa;
        padding: 30px;
        border-radius: 10px;
}
.timeline {
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
</style>
</head>
<body>                            
<?php
/** @var yii\web\View $this */

$this->title = 'SPMB App-IT Del';
?>
<div class="site-index">

<div class="regpro">
    <h2>Alur Pendaftaran Mahasiswa Baru</h2>    <br>
    <ol class="timeline">
    <li class="timeline-item">
        <strong>Step 1:<br></strong> Registrasi Akun
    </li>
    <li class="timeline-item">
        <strong>Step 2:<br></strong> Pengisian Data Diri
    </li>
    <li class="timeline-item">
        <strong>Step 3:<br></strong> Upload Berkas Persyaratan
    </li>
    <li class="timeline-item">
        <strong>Step 4:<br></strong> Pembayaran Biaya Pendaftaran
    </li>
    <li class="timeline-item">
        <strong>Step 5:<br></strong> Seleksi Administrasi & Akademik
    </li>
    <li class="timeline-item">
        <strong>Step 6:<br></strong> Pendaftaran Ulang
    </li>
    </ol>
    <br>
</div>
<br>       
<div class="custom-background">
        <h2 style="text-align: center;"> Pertanyaan yang Paling Sering Ditanyakan </h2> <br>
        <!-- Add your content here -->
    <div class="accordion accordion-flush custom-accordion" id="accordionFlushExample">  
    <div class="accordion-item">
        <h2 class="accordion-header" id="flush-headingOne">
        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
            Apakah saya bisa mendaftar lebih dari satu jurusan ?
        </button>
        </h2>
        <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
        <div class="accordion-body">Placeholder content for this accordion, which is intended to demonstrate the <code>.accordion-flush</code> class. This is the first item's accordion body.</div>
        </div>
    </div>
    <div class="accordion-item">
        <h2 class="accordion-header" id="flush-headingTwo">
        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
            Bagaimana cara saya mendaftarkan diri ?
        </button>
        </h2>
        <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
        <div class="accordion-body">Placeholder content for this accordion, which is intended to demonstrate the <code>.accordion-flush</code> class. This is the second item's accordion body. Let's imagine this being filled with some actual content.</div>
        </div>
    </div>
    <div class="accordion-item">
        <h2 class="accordion-header" id="flush-headingThree">
        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
        Mengapa saya tidak mendapatkan kode verifikasi ?
        </button>
        </h2>
        <div id="flush-collapseThree" class="accordion-collapse collapse" aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample">
        <div class="accordion-body">Placeholder content for this accordion, which is intended to demonstrate the <code>.accordion-flush</code> class. This is the third item's accordion body. Nothing more exciting happening here in terms of content, but just filling up the space to make it look, at least at first glance, a bit more representative of how this would look in a real-world application.</div>
        </div>
    </div>
    <div class="accordion-item">
    <h2 class="accordion-header" id="flush-headingFour">
        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseFour" aria-expanded="false" aria-controls="flush-collapseFour">
        Apa saja program studi yang tersedia di IT Del ?
        </button>
    </h2>
    <div id="flush-collapseFour" class="accordion-collapse collapse" aria-labelledby="flush-headingFour" data-bs-parent="#accordionFlushExample">
        <div class="accordion-body">Placeholder content for this accordion, which is intended to demonstrate the <code>.accordion-flush</code> class. This is the fourth item's accordion body.</div>
    </div>
    </div>
    <div class="accordion-item">
    <h2 class="accordion-header" id="flush-headingFive">
        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseFive" aria-expanded="false" aria-controls="flush-collapseFive">
        Bagaimana jika saya lupa password ?
        </button>
    </h2>
    <div id="flush-collapseFive" class="accordion-collapse collapse" aria-labelledby="flush-headingFive" data-bs-parent="#accordionFlushExample">
        <div class="accordion-body">Placeholder content for this accordion, which is intended to demonstrate the <code>.accordion-flush</code> class. This is the fifth item's accordion body.</div>
    </div>
    </div>
    <div class="accordion-item">
    <h2 class="accordion-header" id="flush-headingSix">
        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseSix" aria-expanded="false" aria-controls="flush-collapseSix">
        Apa saja berkas yang diperlukan untuk mendaftar ?
        </button>
    </h2>
    <div id="flush-collapseSix" class="accordion-collapse collapse" aria-labelledby="flush-headingSix" data-bs-parent="#accordionFlushExample">
        <div class="accordion-body">Placeholder content for this accordion, which is intended to demonstrate the <code>.accordion-flush</code> class. This is the sixth item's accordion body.</div>
    </div>
    </div>
    <div class="accordion-item">
    <h2 class="accordion-header" id="flush-headingSeven">
        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseSeven" aria-expanded="false" aria-controls="flush-collapseSeven">
        Bagaimana jika saya lupa username ?
        </button>
    </h2>
    <div id="flush-collapseSeven" class="accordion-collapse collapse" aria-labelledby="flush-headingSeven" data-bs-parent="#accordionFlushExample">
        <div class="accordion-body">Placeholder content for this accordion, which is intended to demonstrate the <code>.accordion-flush</code> class. This is the seventh item's accordion body.</div>
    </div>
    </div>
    <div class="accordion-item">
    <h2 class="accordion-header" id="flush-headingEight">
        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseEight" aria-expanded="false" aria-controls="flush-collapseEight">
        Mengapa file saya tidak bisa diupload ?
        </button>
    </h2>
    <div id="flush-collapseEight" class="accordion-collapse collapse" aria-labelledby="flush-headingEight" data-bs-parent="#accordionFlushExample">
        <div class="accordion-body">Placeholder content for this accordion, which is intended to demonstrate the <code>.accordion-flush</code> class. This is the eighth item's accordion body.</div>
    </div>
    </div>
    <div class="accordion-item">
    <h2 class="accordion-header" id="flush-headingNine">
        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseNine" aria-expanded="false" aria-controls="flush-collapseNine">
        Apa saja yang diperlukan saat melakukan pendaftaran ulang ?
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

