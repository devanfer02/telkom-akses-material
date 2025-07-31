@extends('layouts.app')

@section('content')
  <!-- Bootstrap Icons -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
  <!-- Custom CSS -->
  <link rel="stylesheet" href="{{ asset('css/style4.css') }}">

<!-- Biodata Section -->
<section class="biodata py-5">
  <div class="container">
    <div class="text-center mb-4">
      <h2 class="btn btn-danger text-white px-5 py-2">BIODATA DIRI</h2>
    </div>
    <div class="row justify-content-center">
      <div class="col-md-6 profile-card p-4 border rounded-3">
        <div class="text-center mb-3">
          <img src="{{ $user->profile_picture ? asset('uploads/' . $user->profile_picture) : asset('images/image 1.png') }}" alt="Foto Profile" class="rounded-circle" id="profileImagePreview" style="width: 150px; height: 150px; object-fit: cover;">
          <p class="fw-bold mt-2">{{ $user->name }}</p>
        </div>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <!-- Tampilan Data -->
        <div id="profileData">
          <p><strong>Nama Lengkap:</strong> <span id="profileNama">{{ $user->name }}</span></p>
          <p><strong>Jenis Kelamin:</strong> <span id="profileGender">{{ $user->gender == 1 ? 'Laki-Laki' : 'Wanita'  }}</span></p>
          <p><strong>City:</strong> <span id="profileCity">{{ $user->city ?? '-' }}</span></p>
          <p><strong>No. HP:</strong> <span id="profileNoHp">{{ $user->no_hp }}</span></p>
          <button class="btn btn-outline-danger w-100" onclick="editProfile()">Edit</button>
        </div>

        <!-- Form Edit -->
        <form id="editForm" style="display: none;" method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-3 text-center">
                <input type="file" id="inputProfilePicture" class="d-none" accept="image/*" onchange="previewImage(event)">
                <label for="inputProfilePicture" class="btn btn-outline-danger">Ubah Foto Profil</label>
                <input type="hidden" name="profile_picture" id="profilePictureBase64">
            </div>
          <div class="mb-2">
            <label>Nama Pengguna</label>
            <input type="text" id="inputNama" name="name" class="form-control" value="{{ $user->name }}">
          </div>
          <div class="mb-2">
            <label>Jenis Kelamin</label>
            <select id="inputGender" name="gender" class="form-control">
                <option value="laki-laki" {{ $user->gender == 1 ? 'selected' : '' }}>Laki-Laki</option>
                <option value="wanita" {{ $user->gender == 0 ? 'selected' : '' }}>Wanita</option>
            </select>
          </div>
          <div class="mb-2">
            <label>City</label>
            <input type="text" id="inputCity" name="city" class="form-control" value="{{ $user->city }}">
          </div>
          <div class="mb-2">
            <label>No. HP</label>
            <input type="text" id="inputNoHp" name="no_hp" class="form-control" value="{{ $user->no_hp }}">
          </div>
          <div class="d-flex justify-content-between">
            <button type="button" class="btn btn-secondary" onclick="cancelEdit()">Kembali</button>
            <button type="submit" class="btn btn-danger">Simpan</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</section>

<!-- Custom JS -->
<script>
function editProfile() {
    document.getElementById('profileData').style.display = 'none';
    document.getElementById('editForm').style.display = 'block';
}

function cancelEdit() {
    document.getElementById('profileData').style.display = 'block';
    document.getElementById('editForm').style.display = 'none';
}

function previewImage(event) {
    const reader = new FileReader();
    reader.onload = function(){
        const output = document.getElementById('profileImagePreview');
        output.src = reader.result;
        document.getElementById('profilePictureBase64').value = reader.result;
    };
    reader.readAsDataURL(event.target.files[0]);
}
</script>
@endsection
