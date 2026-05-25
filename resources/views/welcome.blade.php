<!DOCTYPE html>
<html lang="id" class="h-full bg-slate-900">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Generator Surat Pengantar Muat - CV. Sutera Jaya</title>
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700&family=Playfair+Display:ital,wght@0,500;0,700;1,400&display=swap" rel="stylesheet">
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Outfit', 'sans-serif'],
                        serif: ['"Playfair Display"', 'Georgia', 'serif'],
                    }
                }
            }
        }
    </script>
    <style>
        /* Custom animations & premium styling */
        .glass-panel {
            background: rgba(30, 41, 59, 0.7);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border: 1px solid rgba(255, 255, 255, 0.08);
        }
        .glow-btn {
            position: relative;
            overflow: hidden;
            transition: all 0.3s ease;
        }
        .glow-btn:hover {
            box-shadow: 0 0 20px rgba(99, 102, 241, 0.4);
            transform: translateY(-1px);
        }
        /* A4 Preview Container styling */
        .a4-preview {
            width: 100%;
            max-width: 595px; /* A4 Ratio */
            min-height: 842px;
            background: white;
            color: black;
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.5);
        }
    </style>
</head>
<body class="h-full text-slate-100 flex flex-col">

    <!-- Top Premium Navbar -->
    <header class="w-full glass-panel py-4 px-6 md:px-12 flex flex-col md:flex-row items-center justify-between gap-4 z-10">
        <div class="flex items-center gap-3">
            <div class="h-10 w-10 rounded-xl bg-indigo-600 flex items-center justify-center shadow-lg shadow-indigo-500/30">
                <svg class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                </svg>
            </div>
            <div>
                <h1 class="text-xl font-bold tracking-tight bg-gradient-to-r from-white via-indigo-200 to-indigo-400 bg-clip-text text-transparent">CV. SUTERA JAYA</h1>
                <p class="text-xs text-indigo-300 font-medium">Sistem Pembuat Surat Pengantar Muat Otomatis</p>
            </div>
        </div>
        <div class="flex items-center gap-4">
            <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold bg-emerald-500/10 text-emerald-400 border border-emerald-500/20">
                <span class="w-2 h-2 rounded-full bg-emerald-400 mr-2 animate-pulse"></span>
                In-Memory (No DB)
            </span>
            <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold bg-indigo-500/10 text-indigo-400 border border-indigo-500/20">
                Vercel Ready
            </span>
        </div>
    </header>

    <!-- Main Container -->
    <main class="flex-1 w-full max-w-7xl mx-auto px-4 md:px-8 py-8 flex flex-col lg:grid lg:grid-cols-12 gap-8 items-start overflow-y-auto">
        
        <!-- Left Side: Form Editor -->
        <section class="lg:col-span-5 w-full flex flex-col gap-6">
            <div class="glass-panel rounded-2xl p-6 md:p-8 shadow-2xl relative overflow-hidden">
                <div class="absolute top-0 right-0 w-32 h-32 bg-indigo-500/5 rounded-full blur-3xl"></div>
                
                <h2 class="text-xl font-bold mb-6 flex items-center gap-2">
                    <svg class="w-5 h-5 text-indigo-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                    </svg>
                    Edit Detail Surat
                </h2>

                <form id="letterForm" action="{{ route('generate.pdf') }}" method="POST" enctype="multipart/form-data" class="flex flex-col gap-5">
                    @csrf
                    
                    <!-- Plat Nomor & Sopir -->
                    <div class="grid grid-cols-2 gap-4">
                        <div class="flex flex-col gap-1.5">
                            <label for="no_pol" class="text-xs font-semibold text-slate-400 uppercase tracking-wider">No. Polisi</label>
                            <input type="text" id="no_pol" name="no_pol" value="{{ $defaults['no_pol'] }}" required
                                class="w-full bg-slate-800/80 border border-slate-700 rounded-xl px-4 py-2.5 text-sm font-medium text-slate-100 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition-all">
                        </div>
                        <div class="flex flex-col gap-1.5">
                            <label for="sopir" class="text-xs font-semibold text-slate-400 uppercase tracking-wider">Nama Sopir</label>
                            <input type="text" id="sopir" name="sopir" value="{{ $defaults['sopir'] }}" required
                                class="w-full bg-slate-800/80 border border-slate-700 rounded-xl px-4 py-2.5 text-sm font-medium text-slate-100 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition-all">
                        </div>
                    </div>

                    <!-- Muatan Barang -->
                    <div class="flex flex-col gap-1.5">
                        <label for="muatan" class="text-xs font-semibold text-slate-400 uppercase tracking-wider">Barang Muatan</label>
                        <input type="text" id="muatan" name="muatan" value="{{ $defaults['muatan'] }}" required
                            class="w-full bg-slate-800/80 border border-slate-700 rounded-xl px-4 py-2.5 text-sm font-medium text-slate-100 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition-all">
                    </div>

                    <!-- Asal & Tujuan -->
                    <div class="grid grid-cols-2 gap-4">
                        <div class="flex flex-col gap-1.5">
                            <label for="asal" class="text-xs font-semibold text-slate-400 uppercase tracking-wider">Lokasi Asal</label>
                            <input type="text" id="asal" name="asal" value="{{ $defaults['asal'] }}" required
                                class="w-full bg-slate-800/80 border border-slate-700 rounded-xl px-4 py-2.5 text-sm font-medium text-slate-100 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition-all">
                        </div>
                        <div class="flex flex-col gap-1.5">
                            <label for="tujuan" class="text-xs font-semibold text-slate-400 uppercase tracking-wider">Lokasi Tujuan</label>
                            <input type="text" id="tujuan" name="tujuan" value="{{ $defaults['tujuan'] }}" required
                                class="w-full bg-slate-800/80 border border-slate-700 rounded-xl px-4 py-2.5 text-sm font-medium text-slate-100 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition-all">
                        </div>
                    </div>

                    <!-- Tanggal Muat -->
                    <div class="flex flex-col gap-1.5">
                        <label for="tanggal_muat" class="text-xs font-semibold text-slate-400 uppercase tracking-wider">Tanggal Muat</label>
                        <input type="text" id="tanggal_muat" name="tanggal_muat" value="{{ $defaults['tanggal_muat'] }}" required
                            class="w-full bg-slate-800/80 border border-slate-700 rounded-xl px-4 py-2.5 text-sm font-medium text-slate-100 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition-all">
                    </div>

                    <!-- Tanda Tangan Kota & Tanggal -->
                    <div class="grid grid-cols-2 gap-4">
                        <div class="flex flex-col gap-1.5">
                            <label for="kota_tanda_tangan" class="text-xs font-semibold text-slate-400 uppercase tracking-wider">Kota TTD</label>
                            <input type="text" id="kota_tanda_tangan" name="kota_tanda_tangan" value="{{ $defaults['kota_tanda_tangan'] }}" required
                                class="w-full bg-slate-800/80 border border-slate-700 rounded-xl px-4 py-2.5 text-sm font-medium text-slate-100 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition-all">
                        </div>
                        <div class="flex flex-col gap-1.5">
                            <label for="tanggal_tanda_tangan" class="text-xs font-semibold text-slate-400 uppercase tracking-wider">Tanggal TTD</label>
                            <input type="text" id="tanggal_tanda_tangan" name="tanggal_tanda_tangan" value="{{ $defaults['tanggal_tanda_tangan'] }}" required
                                class="w-full bg-slate-800/80 border border-slate-700 rounded-xl px-4 py-2.5 text-sm font-medium text-slate-100 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition-all">
                        </div>
                    </div>

                    <!-- Nama Penandatangan -->
                    <div class="flex flex-col gap-1.5">
                        <label for="nama_penandatangan" class="text-xs font-semibold text-slate-400 uppercase tracking-wider">Nama Penandatangan</label>
                        <input type="text" id="nama_penandatangan" name="nama_penandatangan" value="{{ $defaults['nama_penandatangan'] }}" required
                            class="w-full bg-slate-800/80 border border-slate-700 rounded-xl px-4 py-2.5 text-sm font-medium text-slate-100 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition-all">
                    </div>

                    <!-- Upload Stempel / TTD -->
                    <div class="flex flex-col gap-1.5">
                        <span class="text-xs font-semibold text-slate-400 uppercase tracking-wider">Unggah Gambar Stempel (Opsional)</span>
                        <label class="group relative flex flex-col items-center justify-center w-full h-24 border-2 border-dashed border-slate-700 hover:border-indigo-500/50 rounded-xl cursor-pointer bg-slate-800/40 hover:bg-slate-800/80 transition-all overflow-hidden">
                            <div class="flex flex-col items-center justify-center pt-5 pb-6 text-center px-4" id="uploadPrompt">
                                <svg class="w-6 h-6 text-slate-400 group-hover:text-indigo-400 transition-colors mb-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                                <p class="text-xs text-slate-400"><span class="font-semibold text-indigo-400">Pilih gambar</span> PNG/JPG (Maks. 2MB)</p>
                            </div>
                            <div class="hidden flex-row items-center gap-3 px-4 w-full" id="uploadStatus">
                                <div class="w-10 h-10 rounded-lg bg-indigo-500/10 flex items-center justify-center shrink-0 border border-indigo-500/20">
                                    <svg class="w-5 h-5 text-indigo-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                </div>
                                <div class="overflow-hidden flex-1">
                                    <p class="text-xs font-semibold text-slate-200 truncate" id="fileName">image.png</p>
                                    <button type="button" id="removeStampBtn" class="text-[10px] text-rose-400 font-semibold hover:text-rose-300 transition-colors">Hapus Stempel</button>
                                </div>
                            </div>
                            <input type="file" id="stamp" name="stamp" accept="image/*" class="hidden">
                        </label>
                        <input type="hidden" id="stamp_base64_raw" name="stamp_base64_raw">
                    </div>

                    <!-- Submit Action Button -->
                    <button type="submit" class="glow-btn w-full bg-gradient-to-r from-indigo-600 to-indigo-500 hover:from-indigo-500 hover:to-indigo-400 text-white rounded-xl py-3 px-4 font-bold text-sm shadow-lg shadow-indigo-600/20 flex items-center justify-center gap-2 mt-2">
                        <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                        </svg>
                        Unduh Dokumen PDF
                    </button>
                </form>
            </div>
        </section>

        <!-- Right Side: Live Preview -->
        <section class="lg:col-span-7 w-full flex flex-col items-center gap-4">
            <span class="text-xs font-semibold text-indigo-400 uppercase tracking-widest flex items-center gap-1.5 self-start">
                <span class="w-1.5 h-1.5 rounded-full bg-indigo-500 animate-ping"></span>
                Live Preview (Pratinjau Langsung)
            </span>
            
            <div class="w-full flex justify-center bg-slate-950/40 p-4 md:p-8 rounded-2xl border border-slate-800 shadow-inner overflow-x-auto">
                <!-- Visual simulation of A4 Paper Sheet -->
                <div class="a4-preview p-12 flex flex-col justify-start select-none">
                    
                    <!-- Document Header -->
                    <div class="text-center uppercase font-bold text-lg tracking-wider mb-10" style="font-family: serif;">
                        SURAT PENGANTAR MUAT
                    </div>

                    <!-- Document Body Intro -->
                    <div class="text-sm mb-4">
                        Mohon truk kami :
                    </div>

                    <!-- Key Value Info -->
                    <table class="w-full text-sm mb-6 border-collapse">
                        <tr>
                            <td class="w-20 py-0.5">No Pol</td>
                            <td class="w-4 py-0.5">:</td>
                            <td class="py-0.5" id="prev_no_pol">D 9800 RZ</td>
                        </tr>
                        <tr>
                            <td class="py-0.5">Sopir</td>
                            <td class="py-0.5">:</td>
                            <td class="py-0.5" id="prev_sopir">Riyan</td>
                        </tr>
                    </table>

                    <!-- Letter Body Text -->
                    <div class="text-sm text-justify leading-relaxed mb-12">
                        Untuk di muat <span id="prev_muatan">Galon 1500 pcs</span> dari <span id="prev_asal">TIV Keboncandi</span> tujuan <span id="prev_tujuan">HUB Semarang</span> pada <span id="prev_tanggal_muat">25 Mei 2026</span>. Terimakasih
                    </div>

                    <!-- Signature Area (Left Aligned) -->
                    <div class="w-56 mr-auto flex flex-col items-start text-sm">
                        <div class="mb-2">
                            <span id="prev_kota_tanda_tangan">Surabaya</span>, <span id="prev_tanggal_tanda_tangan">25 Mei 2026</span>
                        </div>
                        
                        <!-- Stamp Area -->
                        <div class="h-28 flex items-center justify-start py-1" id="stampPreviewContainer">
                            <!-- Default stamp image -->
                            <img id="defaultStamp" src="{{ asset('stempel.png') }}" class="max-h-24 max-w-[200px] object-contain opacity-90 select-none" alt="Stempel Default">
                            
                            <!-- Custom uploaded stamp element (hidden initially) -->
                            <img id="customStamp" class="max-h-24 max-w-[200px] object-contain hidden" alt="Stempel Kustom">
                        </div>

                        <div class="font-normal underline pt-1" id="prev_nama_penandatangan" style="font-family: serif;">
                            Adang Sumpena/CV Sutera Jaya
                        </div>
                    </div>

                </div>
            </div>
        </section>

    </main>

    <!-- Footer -->
    <footer class="w-full border-t border-slate-800/80 bg-slate-950/20 py-4 px-6 text-center text-xs text-slate-500">
        &copy; 2026 CV. Sutera Jaya. Dirancang untuk efisiensi tinggi tanpa penyimpanan database.
    </footer>

    <!-- Interactive JS Synchronization Logic -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Inputs
            const noPolInput = document.getElementById('no_pol');
            const sopirInput = document.getElementById('sopir');
            const muatanInput = document.getElementById('muatan');
            const asalInput = document.getElementById('asal');
            const tujuanInput = document.getElementById('tujuan');
            const tanggalMuatInput = document.getElementById('tanggal_muat');
            const kotaTtdInput = document.getElementById('kota_tanda_tangan');
            const tanggalTtdInput = document.getElementById('tanggal_tanda_tangan');
            const namaPenandatanganInput = document.getElementById('nama_penandatangan');
            const stampInput = document.getElementById('stamp');
            const stampBase64Hidden = document.getElementById('stamp_base64_raw');
            
            // Preview Placeholders
            const prevNoPol = document.getElementById('prev_no_pol');
            const prevSopir = document.getElementById('prev_sopir');
            const prevMuatan = document.getElementById('prev_muatan');
            const prevAsal = document.getElementById('prev_asal');
            const prevTujuan = document.getElementById('prev_tujuan');
            const prevTanggalMuat = document.getElementById('prev_tanggal_muat');
            const prevKotaTtd = document.getElementById('prev_kota_tanda_tangan');
            const prevTanggalTtd = document.getElementById('prev_tanggal_tanda_tangan');
            const prevNamaPenandatangan = document.getElementById('prev_nama_penandatangan');
            
            // Stamp Elements
            const defaultStamp = document.getElementById('defaultStamp');
            const customStamp = document.getElementById('customStamp');
            const uploadPrompt = document.getElementById('uploadPrompt');
            const uploadStatus = document.getElementById('uploadStatus');
            const fileNameSpan = document.getElementById('fileName');
            const removeStampBtn = document.getElementById('removeStampBtn');

            // Set up real-time binding function
            function bindInputToPreview(inputElement, previewElement) {
                inputElement.addEventListener('input', function() {
                    previewElement.textContent = this.value || '-';
                });
            }

            // Bind text variables
            bindInputToPreview(noPolInput, prevNoPol);
            bindInputToPreview(sopirInput, prevSopir);
            bindInputToPreview(muatanInput, prevMuatan);
            bindInputToPreview(asalInput, prevAsal);
            bindInputToPreview(tujuanInput, prevTujuan);
            bindInputToPreview(tanggalMuatInput, prevTanggalMuat);
            bindInputToPreview(kotaTtdInput, prevKotaTtd);
            bindInputToPreview(tanggalTtdInput, prevTanggalTtd);
            bindInputToPreview(namaPenandatanganInput, prevNamaPenandatangan);

            // Handle image uploads & convert to Base64 in real-time
            stampInput.addEventListener('change', function(e) {
                const file = e.target.files[0];
                if (file) {
                    // Check file size (2MB)
                    if (file.size > 2 * 1024 * 1024) {
                        alert('Ukuran file stempel terlalu besar. Maksimal 2MB.');
                        resetStamp();
                        return;
                    }

                    // Display file name status
                    fileNameSpan.textContent = file.name;
                    uploadPrompt.classList.add('hidden');
                    uploadStatus.classList.remove('hidden');

                    // Read as Base64 for Preview & PDF
                    const reader = new FileReader();
                    reader.onload = function(event) {
                        const base64String = event.target.result;
                        
                        // Update preview panel
                        customStamp.src = base64String;
                        customStamp.classList.remove('hidden');
                        defaultStamp.classList.add('hidden');

                        // Save base64 data to hidden input for direct API payload
                        stampBase64Hidden.value = base64String;
                    };
                    reader.readAsDataURL(file);
                }
            });

            // Handle clear stamp action
            removeStampBtn.addEventListener('click', function(e) {
                e.preventDefault();
                resetStamp();
            });

            function resetStamp() {
                stampInput.value = '';
                stampBase64Hidden.value = '';
                customStamp.src = '';
                customStamp.classList.add('hidden');
                defaultStamp.classList.remove('hidden');
                
                uploadPrompt.classList.remove('hidden');
                uploadStatus.classList.add('hidden');
            }
        });
    </script>
</body>
</html>
