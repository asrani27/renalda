@extends('layouts.app')

@section('title', 'Edit Monitoring')

@section('page-title', 'Edit Monitoring')

@section('content')
<div class="max-w-2xl mx-auto">
    <!-- Back Button -->
    <a href="{{ route('admin.monitoring.index') }}" 
       class="inline-flex items-center gap-2 text-gray-600 hover:text-gray-900 mb-6 transition-colors">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
        </svg>
        <span>Kembali ke Daftar</span>
    </a>

    <!-- Form Card -->
    <div class="bg-white rounded-xl shadow-lg p-6">
        <form action="{{ route('admin.monitoring.update', $monitoring->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            
            @if($errors->any())
                <div class="mb-6 p-4 bg-red-50 border border-red-200 rounded-lg">
                    <div class="flex items-center gap-2 mb-2">
                        <svg class="w-5 h-5 text-red-600" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"></path>
                        </svg>
                        <h3 class="text-sm font-semibold text-red-800">Ada error dalam formulir</h3>
                    </div>
                    <ul class="text-sm text-red-700 space-y-1 ml-7">
                        @foreach($errors->all() as $error)
                            <li>• {{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="space-y-6">
                <!-- Penerima -->
                <div>
                    <label for="penerima_id" class="block text-sm font-medium text-gray-700 mb-2">
                        Penerima <span class="text-red-500">*</span>
                    </label>
                    <select name="penerima_id" 
                            id="penerima_id" 
                            required
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 outline-none transition-all">
                        <option value="">Pilih Penerima</option>
                        @foreach($penerima as $p)
                            @if($p->calonPenerima)
                                <option value="{{ $p->id }}" {{ old('penerima_id', $monitoring->penerima_id) == $p->id ? 'selected' : '' }}>
                                    {{ $p->calonPenerima->nama }} 
                                    @if($p->bantuan) - {{ $p->bantuan->nama }} @endif
                                </option>
                            @endif
                        @endforeach
                    </select>
                    @error('penerima_id')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Pendamping -->
                <div>
                    <label for="pendamping_id" class="block text-sm font-medium text-gray-700 mb-2">
                        Pendamping <span class="text-red-500">*</span>
                    </label>
                    <select name="pendamping_id" 
                            id="pendamping_id" 
                            required
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 outline-none transition-all">
                        <option value="">Pilih Pendamping</option>
                        @foreach($pendamping as $p)
                            <option value="{{ $p->id }}" {{ old('pendamping_id', $monitoring->pendamping_id) == $p->id ? 'selected' : '' }}>
                                {{ $p->nama }} - {{ $p->jabatan }}
                            </option>
                        @endforeach
                    </select>
                    @error('pendamping_id')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Tanggal Monitoring -->
                <div>
                    <label for="tanggal_monitoring" class="block text-sm font-medium text-gray-700 mb-2">
                        Tanggal Monitoring <span class="text-red-500">*</span>
                    </label>
                    <input type="date" 
                           name="tanggal_monitoring" 
                           id="tanggal_monitoring" 
                           value="{{ old('tanggal_monitoring', $monitoring->tanggal_monitoring->format('Y-m-d')) }}"
                           required
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 outline-none transition-all">
                    @error('tanggal_monitoring')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Kondisi Usaha -->
                <div>
                    <label for="kondisi_usaha" class="block text-sm font-medium text-gray-700 mb-2">
                        Kondisi Usaha <span class="text-red-500">*</span>
                    </label>
                    <textarea name="kondisi_usaha" 
                              id="kondisi_usaha" 
                              rows="4"
                              required
                              placeholder="Jelaskan kondisi usaha penerima..."
                              class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 outline-none transition-all resize-none">{{ old('kondisi_usaha', $monitoring->kondisi_usaha) }}</textarea>
                    @error('kondisi_usaha')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Perkembangan Usaha -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        Perkembangan Usaha <span class="text-red-500">*</span>
                    </label>
                    <div class="flex gap-4">
                        <label class="flex items-center">
                            <input type="radio" 
                                   name="perkembangan_usaha" 
                                   value="baik"
                                   {{ old('perkembangan_usaha', $monitoring->perkembangan_usaha) === 'baik' ? 'checked' : '' }}
                                   required
                                   class="w-4 h-4 text-emerald-600 focus:ring-emerald-500">
                            <span class="ml-2 text-sm text-gray-700">Baik</span>
                        </label>
                        <label class="flex items-center">
                            <input type="radio" 
                                   name="perkembangan_usaha" 
                                   value="cukup"
                                   {{ old('perkembangan_usaha', $monitoring->perkembangan_usaha) === 'cukup' ? 'checked' : '' }}
                                   class="w-4 h-4 text-emerald-600 focus:ring-emerald-500">
                            <span class="ml-2 text-sm text-gray-700">Cukup</span>
                        </label>
                        <label class="flex items-center">
                            <input type="radio" 
                                   name="perkembangan_usaha" 
                                   value="kurang"
                                   {{ old('perkembangan_usaha', $monitoring->perkembangan_usaha) === 'kurang' ? 'checked' : '' }}
                                   class="w-4 h-4 text-emerald-600 focus:ring-emerald-500">
                            <span class="ml-2 text-sm text-gray-700">Kurang</span>
                        </label>
                    </div>
                    @error('perkembangan_usaha')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Foto Monitoring -->
                <div>
                    <label for="foto_monitoring" class="block text-sm font-medium text-gray-700 mb-2">
                        Foto Monitoring
                    </label>
                    @if($monitoring->foto_monitoring)
                        <div class="mb-3">
                            <p class="text-sm text-gray-600 mb-2">Foto saat ini:</p>
                            <a href="{{ asset('storage/' . $monitoring->foto_monitoring) }}" 
                               target="_blank"
                               class="inline-block">
                                <img src="{{ asset('storage/' . $monitoring->foto_monitoring) }}" 
                                     alt="Foto monitoring" 
                                     class="max-h-32 rounded-lg shadow-md hover:shadow-lg transition-shadow">
                            </a>
                        </div>
                    @endif
                    <div class="flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-lg hover:border-emerald-500 transition-colors">
                        <div class="space-y-1 text-center">
                            <svg class="mx-auto h-12 w-12 text-gray-400" 
                                 stroke="currentColor" 
                                 fill="none" 
                                 viewBox="0 0 48 48" 
                                 stroke-width="2">
                                <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                            <div class="flex text-sm text-gray-600">
                                <label for="foto_monitoring" 
                                       class="relative cursor-pointer bg-white rounded-md font-medium text-emerald-600 hover:text-emerald-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-emerald-500 focus-within:ring-offset-2">
                                    <span>Upload file baru</span>
                                    <input id="foto_monitoring" 
                                           name="foto_monitoring" 
                                           type="file" 
                                           accept="image/*"
                                           class="sr-only"
                                           onchange="previewImage(event)">
                                </label>
                                <p class="pl-1">atau drag and drop</p>
                            </div>
                            <p class="text-xs text-gray-500">
                                PNG, JPG, GIF hingga 2MB
                            </p>
                            <!-- Image Preview -->
                            <div id="imagePreview" class="mt-4 hidden">
                                <img id="previewImg" class="max-h-40 mx-auto rounded-lg shadow-lg" alt="Preview">
                            </div>
                        </div>
                    </div>
                    @error('foto_monitoring')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Submit Buttons -->
                <div class="flex gap-4 pt-4">
                    <a href="{{ route('admin.monitoring.index') }}" 
                       class="flex-1 px-4 py-2 border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50 transition-colors text-center font-medium">
                        Batal
                    </a>
                    <button type="submit" 
                            class="flex-1 px-4 py-2 bg-gradient-to-r from-emerald-600 to-emerald-700 text-white rounded-lg hover:from-emerald-700 hover:to-emerald-800 transition-all duration-200 shadow-lg hover:shadow-xl font-medium">
                        Update
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>

<script>
    function previewImage(event) {
        const preview = document.getElementById('imagePreview');
        const image = document.getElementById('previewImg');
        const file = event.target.files[0];

        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                image.src = e.target.result;
                preview.classList.remove('hidden');
            }
            reader.readAsDataURL(file);
        } else {
            preview.classList.add('hidden');
        }
    }
</script>
@endsection