@extends('layouts.app')
<link href="{{ asset('./css/app.css') }}" rel="stylesheet">


@section('content')
    <div class="container">
        <div class="row">
            <button id="toggleSidebarButton" class="btn btn-grey shadow-sm mt-3 mb-3" style="padding: 15px">
                <i id="sidebarIcon" class="bi bi-archive"></i>&nbsp; Ringkas Tampilan
            </button>
            <div class="col-md-3" id="sidebar">
                <div class="card" style="box-shadow: rgba(42, 55, 197, 0.324) 0px 20px 50px 2px">
                    <div class="card-header">{{ __('Bukan Sidebar') }}</div>
                    <div class="card-body">
                        <div class="dropdown rounded" style="border: 1px rgb(212, 209, 209) solid">
                            <button class="btn btn" style="width: 220px" type="button" id="sidebarDropdown"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                kontributor
                            </button>
                            <div class="dropdown-menu" style="width: 220px" aria-labelledby="sidebarDropdown">
                                <a class="dropdown-item" href="/anggotas">Daftar Anggota</a>
                                <a class="dropdown-item" href="/otas">Daftar OTA</a>
                                <a class="dropdown-item" href="/pesantrens">Daftar Pesantren</a>
                            </div>
                        </div>
                        
                        <div class="dropdown rounded mt-1 shadow-sm" style="border: 1px rgb(212, 209, 209) solid">
                            <button class="btn btn" style="width: 220px" type="button" id="sidebarDropdown"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Distribusi
                            </button>
                            <div class="dropdown-menu" style="width: 220px;" aria-labelledby="sidebarDropdown">
                                <a class="dropdown-item" href="/donasi_terimas">Penerimaan</a>
                                <a class="dropdown-item" href="/donasi_penyalurans">Penyaluran</a>
                                {{-- <a class="dropdown-item" href="/stok_barangs">Stok Beras</a> --}}
                              </div>                              
                        </div>
                    </div>
                </div>
                <div class="col-md-12 mt-4 rounded" style="box-shadow: rgba(41, 56, 225, 0.324) 0px 20px 50px 2px; z-index:0;"
                    id="sidebar1">
                    <div class="card">
                        <div class="card-header">{{ __('Chart Distribusi') }}</div>
                        <div class="card-body">
                            <canvas id="pieChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-9" id="mainContent">
                <div class="card shadow-lg">
                    <div class="card-header">{{ __('Dashboard') }}</div>
                    <div id="ticker2"></div>
                    <div class="card-body">
                        <canvas id="chart"></canvas>
                    </div>
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                    </div>
                </div>
                <div class="text-light mt-3 p-1 rounded text-center" style="background-color: rgb(129, 156, 219); box-shadow: rgba(29, 29, 209, 0.653) 0px 20px 50px 2px">
                    <span id="duration" style="text-align: center;"></span><span style="display: inline-block; margin-right: 10px;">
                    <select id="language" for="language" onchange="changeLanguage()" style="padding: 1px; border-radius: 5px; background-color: rgb(129, 156, 219); color: #dedeef; border: none; margin-right:-440px; display: inline-block;">
                      <option value="id">Indonesia</option>
                      <option value="en">English</option>
                      <option value="ar">العربية</option>
                    </select>
                  </span> 
                  <div id="clock-container">
                    <div id="clock">
                      <div id="ticker"></div>
                    </div>
                    <span id="tooltip">00:00:00</span>
                  </div>                                       
                  </div>             
            </div>
    

            {{-- KOLOM TABEL DATA BOTTOM --}}

            <div class="row">
                <div class="col-md-4">
                    <div class="card mt-3"
                        style="background: rgb(196, 85, 85);box-shadow: rgba(178, 46, 46, 0.945) 0px 20px 50px 2px;">
                        <a href="/anggotas" style="text-decoration: none">
                            <div class="card-header1">{{ __('Anggota Paskas') }}</div>
                        </a>
                        <div id="ticker2"></div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-8">
                                    <canvas id="chart1" style="background-color: rgba(183, 70, 70, 0.384); border-radius:10px; box-shadow:rgba(81, 8, 8, 0.733) 0px 20px 50px 2px"></canvas>
                                </div>                                
                                <div class="col-md-3" style="width: 100px;"><i class="bi bi-person-square" style="font-size: 80px;"></i></div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 text-light" style="font-size: 20px;">JUMLAH PASKAS &nbsp;  {{ $anggotas->count('nama_anggota') }} </div>
                            </div>
                        </div>
                        </div>
                        </div>                        
                <div class="col-md-4">
                    <div class="card mt-3"
                        style="background: rgb(102, 196, 85);box-shadow: rgba(103, 178, 46, 0.945) 0px 20px 50px 2px;">
                        <a href="/otas" style="text-decoration: none">
                            <div class="card-header1">{{ __('Data OTA') }}</div>
                        </a>
                        <div id="ticker2"></div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-8">
                                    <canvas id="chart2" style="background-color: rgba(73, 182, 61, 0.646); border-radius:10px; width:190px; box-shadow:rgba(64, 115, 9, 0.733) 0px 20px 50px 2px"></canvas>
                                </div>                                
                                <div class="col-md-3" style="width: 100px;"><i class="bi bi-people" style="font-size: 80px;"></i></div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 text-light" style="font-size: 20px;">JUMLAH OTA &nbsp; {{ $otas->count('nama') }}</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card mt-3"
                        style="background: rgb(85, 102, 196);box-shadow: rgba(46, 68, 178, 0.945) 0px 20px 50px 2px;">
                        <a href="/pesantrens" style="text-decoration: none">
                            <div class="card-header1">{{ __('Pesantren') }}</div>
                        </a>
                        <div id="ticker2"></div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-8">
                                    <canvas id="chart3" style="background-color: rgba(71, 80, 163, 0.751); border-radius:10px; width:190px;box-shadow:rgba(10, 8, 81, 0.733) 0px 20px 50px 2px"></canvas>
                                </div>                                
                                <div class="col-md-3" style="width: 100px;"><i class="bi bi-house-heart" style="font-size: 80px;"></i></div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 text-light" style="font-size: 20px;">JUMLAH PESANTREN &nbsp; {{ $pesantrens->count('nama') }}</</div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- AKHIR KOLOM TABEL DATA BOTTOM --}}

            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script>
            document.getElementById('toggleSidebarButton').addEventListener('click', function() {
        var sidebar = document.getElementById('sidebar');
        var sidebarIcon = document.getElementById('sidebarIcon');
        var mainContent = document.getElementById('mainContent');

        if (sidebar.classList.contains('d-none')) {
            sidebar.classList.remove('d-none');
            sidebarIcon.classList.remove('bi-archive-fill');
            sidebarIcon.classList.add('bi-archive');
            mainContent.classList.remove('col-md-12');
            mainContent.classList.add('col-md-9');
            document.getElementById('toggleSidebarButton').innerHTML =
                '<i id="sidebarIcon" class="bi bi-archive"></i> &nbsp; Ringkas Tampilan';
        } else {
            sidebar.classList.add('d-none');
            sidebarIcon.classList.remove('bi-archive');
            sidebarIcon.classList.add('bi-archive-fill');
            mainContent.classList.remove('col-md-9');
            mainContent.classList.add('col-md-12');
            document.getElementById('toggleSidebarButton').innerHTML =
                '<i id="sidebarIcon" class="bi bi-archive-fill"></i> &nbsp; Lebarkan Tampilan';
        }
    });

            // Tabel chart halaman dashboard
            document.addEventListener('DOMContentLoaded', function() {
                // Data untuk chart
                var data = {
                    labels: ['Anggota Paskas', 'Ota', 'Pesantren'],
                    datasets: [{
                        label: 'Jumlah',
                        data: [{{ $anggotas->count('nama_anggota') }}, {{ $otas->count('nama') }},
                            {{ $pesantrens->count('nama') }}
                        ],
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(255, 99, 132, 0.2)'
                        ],
                        borderColor: [
                            'rgba(54, 162, 235, 1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(54, 162, 235, 1)'
                        ],
                        borderWidth: 1
                    }]
                };

                // Konfigurasi chart
                var options = {
                    responsive: true,
                    scales: {
                        y: {
                            beginAtZero: true,
                            precision: 0
                        }
                    },
                    plugins: {
                        legend: {
                            display: false
                        }
                    }
                };

                // Membuat chart baru
                var ctx = document.getElementById('chart').getContext('2d');
                var gradient = ctx.createLinearGradient(0, 0, 0, 400);
                // gradient.addColorStop(0, 'rgba(255, 99, 132, 0.2)');
                gradient.addColorStop(0.5, 'rgba(54, 162, 235, 0.2)');
                gradient.addColorStop(1, 'rgba(255, 255, 255, 0)');
                data.datasets[0].backgroundColor = gradient;

                new Chart(ctx, {
                    type: 'bar',
                    data: data,
                    options: options
                });
            });

            // PIE Chart
            document.addEventListener('DOMContentLoaded', function() {
                var data = {
                    labels: ['Donasi Tersalurkan', 'Total Donasi', 'Sisa Stok'],
                    datasets: [{
                        data: [
                            {{ $donasiPenyalurans->sum('donasi_diterima') }},
                            {{ $donasiTerimas->sum('jumlah_donasi') }},
                            {{ $donasiTerimas->sum('jumlah_donasi') - $donasiPenyalurans->sum('donasi_diterima') }}
                        ],
                        backgroundColor: [
                            createGradient('rgb(255, 99, 132)', 'rgb(255, 199, 192)'),
                            createGradient('rgb(54, 162, 235)', 'rgb(183, 217, 255)'),
                            createGradient('rgb(255, 205, 86)', 'rgb(255, 234, 183)')
                        ],
                        borderColor: [
                            'rgb(223, 42, 42, 0.5)',
                            'rgb(42, 84, 223, 0.5)',
                            'rgb(223, 133, 42, 0.5)'
                        ]
                    }]
                };

                // Fungsi untuk membuat gradient background color
                function createGradient(color1, color2) {
                    var ctx = document.createElement('canvas').getContext('2d');
                    var gradient = ctx.createLinearGradient(0, 0, 0, 400);
                    gradient.addColorStop(0, color1);
                    gradient.addColorStop(1, color2);
                    return gradient;
                }

                var options = {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        shadow: {
                            enabled: true,
                            color: 'rgba(0, 0, 0, 0.3)',
                            blur: 30,
                            offsetX: 0,
                            offsetY: 4
                        }
                    }
                };

                var ctx = document.getElementById('pieChart').getContext('2d');

                new Chart(ctx, {
                    type: 'pie',
                    data: data,
                    options: options
                });
            });

            // KOLOM CHART PASKAS MINI BAGIAN BAWAH
           
            document.addEventListener('DOMContentLoaded', function() {
    var data = {
        labels: ['Jan', 'Feb', 'Mar', 'Ap', 'Mei','Jun','Jul','Aug','Sep','Okt','Nov','Des'], // Ganti label dengan nama-nama OTA Anda
        datasets: [{
            label: 'Jumlah',
            data: [30, 45, 20, 35], // Ganti data dengan jumlah anggota OTA Anda
            borderColor: 'rgba(255, 99, 132, 1)', // Warna garis
            backgroundColor: 'rgba(255, 99, 132, 0.2)', // Warna latar belakang area di bawah garis
            borderWidth: 1,
            fill: 'start', // Mengisi area di bawah garis
            tension: 0.7 // Mengatur kekakuan kurva garis
        }]
    };

    var options = {
        responsive: true,
        scales: {
            y: {
                beginAtZero: true,
                precision: 0,
                // suggestedMax: 100, // Sesuaikan dengan maksimal jumlah anggota OTA Anda
            }
        },
        plugins: {
            legend: {
                display: false
            }
        }
    };

    var ctx = document.getElementById('chart1').getContext('2d');
    new Chart(ctx, {
        type: 'line',
        data: data,
        options: options
    });
});

        // CHART BAGIAN OTA
        document.addEventListener('DOMContentLoaded', function() {
    var data = {
        labels: ['Jan', 'Feb', 'Mar', 'Ap', 'Mei','Jun','Jul','Aug','Sep','Okt','Nov','Des'], // Ganti label dengan nama-nama OTA Anda
        datasets: [{
            label: 'Jumlah',
            data: [30, 45, 20, 75, 50], // Ganti data dengan jumlah anggota OTA Anda
            borderColor: 'rgba(255, 99, 132, 1)', // Warna garis
            backgroundColor: 'rgba(255, 99, 132, 0.2)', // Warna latar belakang area di bawah garis
            borderWidth: 1,
            fill: 'start', // Mengisi area di bawah garis
            tension: 0.4 // Mengatur kekakuan kurva garis
        }]
    };

    var options = {
        responsive: true,
        scales: {
            y: {
                beginAtZero: true,
                precision: 0,
                suggestedMax: 50 // Sesuaikan dengan maksimal jumlah anggota OTA Anda
            }
        },
        plugins: {
            legend: {
                display: false
            }
        }
    };

    var ctx = document.getElementById('chart2').getContext('2d');
    new Chart(ctx, {
        type: 'line',
        data: data,
        options: options
    });
});

        // CHART BAGIAN DATA PESANTREN

        document.addEventListener('DOMContentLoaded', function() {
    var ctx = document.getElementById('chart3').getContext('2d');

    var gradient = ctx.createLinearGradient(0, 0, 0, 300);
    gradient.addColorStop(0, 'rgba(71, 80, 163, 0.751)');
    gradient.addColorStop(1, 'rgba(0, 0, 0, 0)');

    var data = {
        labels: ['Jan', 'Feb', 'Mar', 'Ap', 'Mei','Jun','Jul','Aug','Sep','Okt','Nov','Des'],  // Ganti label dengan nama-nama pesantren Anda
        datasets: [{
            label: 'Jumlah',
            data: [10, 50, 30, 90], // Ganti data dengan jumlah pesantren Anda
            borderColor: 'rgba(255, 255, 255, 1)', // Warna garis (putih)
            backgroundColor: gradient, // Warna gradasi latar belakang di bawah garis
            borderWidth: 2,
            fill: true, // Mengisi area di bawah garis
            tension: 0.4 // Mengatur kekakuan kurva garis
        }]
    };

    var options = {
        responsive: true,
        scales: {
            y: {
                beginAtZero: true,
                precision: 0,
                suggestedMax: 50 // Sesuaikan dengan maksimal jumlah pesantren Anda
            }
        },
        plugins: {
            legend: {
                display: false
            }
        }
    };

    new Chart(ctx, {
        type: 'line',
        data: data,
        options: options
    });
});

        // Nambahin Fitur Jam
        function updateClock() {
    var now = new Date();
    var hours = now.getHours();
    var minutes = now.getMinutes();
    var seconds = now.getSeconds();


    // Peroleh waktu dalam format jam lokal
    var time = now.toLocaleTimeString();
    // Tambahkan satu jam ke waktu lokal
    hours = (hours + 1) ;

    // Format jam dengan angka dua digit
    hours = hours.toString().padStart(2, '0');
    minutes = minutes.toString().padStart(2, '0');
    seconds = seconds.toString().padStart(2, '0');

    var time = hours + ':' + minutes + ':' + seconds;

    // Perbarui elemen HTML dengan waktu yang diperoleh
    document.getElementById('clock').style.width = (hours / 24) * 100 + '%';
    document.getElementById('duration').textContent = time;

// Animasi bulatan berdetak
var ticker = document.getElementById('ticker');
    var scale = (seconds % 2 === 0) ? 'scale(1, 1)' : 'scale(1, 0.8)';
    ticker.style.transform = scale;
    
    // Penyebutan jam dalam bahasa Indonesia
    var hoursIndo = hours;
    var meridiemIndo = '';
    if (hours >= 0 && hours < 12) {
      meridiemIndo = 'pagi';
    } else if (hours >= 12 && hours < 15) {
      meridiemIndo = 'siang';
    } else if (hours >= 15 && hours < 18) {
      meridiemIndo = 'sore';
    } else {
      meridiemIndo = 'malam';
      hoursIndo = hours - 12;
    }

    var minutesTextIndo = '';
    if (minutes === '00') {
      minutesTextIndo = '';
    } else if (minutes <= 30) {
      minutesTextIndo = 'lebih ' + minutes + ' menit';
    } else {
      minutesTextIndo = 'kurang ' + (60 - minutes) + ' menit';
    }

    var timeIndo = 'Sekarang jam ' + hoursIndo + ' ' + meridiemIndo + ' ' + minutesTextIndo;

   // Penyebutan jam dalam bahasa Inggris
var meridiemEng = hours >= 12 ? 'PM' : 'AM';
var hoursEng = hours % 12;
hoursEng = hoursEng ? hoursEng : 12;

var minutesTextEng = '';
if (minutes === '00') {
  minutesTextEng = '';
} else if (minutes === '01') {
  minutesTextEng = '1 minute';
} else {
  minutesTextEng = minutes + ' minutes';
}

var timeEng = 'It is currently ' + hoursEng + ':' + minutes + ' ' + meridiemEng + '. ' + minutesTextEng;

    // Penyebutan jam dalam bahasa Arab
    var hoursAr = hours;
    var meridiemAr = '';
    if (hours >= 0 && hours < 12) {
      meridiemAr = 'صباحًا';
    } else if (hours >= 12 && hours < 15) {
      meridiemAr = 'ظهرًا';
    } else if (hours >= 15 && hours < 18) {
      meridiemAr = 'عصرًا';
    } else {
      meridiemAr = 'مساءً';
      hoursAr = hours - 12;
    }

    var minutesTextAr = '';
    if (minutes === '00') {
      minutesTextAr = '';
    } else if (minutes <= 30) {
      minutesTextAr = 'أكثر من ' + minutes + ' دقيقة';
    } else {
      minutesTextAr = 'أقل من ' + (60 - minutes) + ' دقيقة';
    }

    var timeAr = 'الآن الساعة ' + hoursAr + ' ' + meridiemAr + ' ' + minutesTextAr;

    // Memilih bahasa berdasarkan opsi dropdown
    var lang = document.getElementById('language').value;
    var displayTime = '';
    if (lang === 'en') {
      displayTime = timeEng;
    } else if (lang === 'ar') {
      displayTime = timeAr;
    } else {
      displayTime = timeIndo;
    }

    document.getElementById('duration').textContent = displayTime;
  }

  // Panggil fungsi updateClock() untuk pertama kali
  updateClock();

  // Perbarui jam setiap detik
  setInterval(updateClock, 1000);

  // Fungsi untuk mengubah bahasa penyebutan jam
  function changeLanguage() {
    updateClock();
  }

  var clock = document.getElementById('clock');
  var tooltip = document.getElementById('tooltip');

clock.addEventListener('mouseover', function() {
  var now = new Date();
  var hours = now.getHours().toString().padStart(2, '0');
  var minutes = now.getMinutes().toString().padStart(2, '0');
  var seconds = now.getSeconds().toString().padStart(2, '0');
  var time = hours + ':' + minutes + ':' + seconds;
  tooltip.textContent = time;
});

clock.addEventListener('mouseout', function() {
  tooltip.textContent = '00:00:00';
});

        </script>
    @endsection
