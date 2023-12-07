@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Verifikasi Email Anda') }}</div>
                    <div class="card-body">
                        <p>Halo {{ $data['user'] }},</p><br>
                        <p>Terima kasih telah mendaftar di Sipjaki Pasuruan! Kami sangat senang memiliki Anda sebagai
                            bagian dari komunitas kami.</p><br>
                        <p>Untuk menyelesaikan proses pendaftaran, kami memerlukan verifikasi alamat email Anda. Berikut
                            adalah rincian verifikasi:
                        </p><br>
                        <p>Kode Verifikasi: <b>{{ $data['token'] }}</b></p><br>
                        <p>Silakan masukkan kode ini di halaman verifikasi atau klik tautan di bawah ini:
                            <a href="{{ route('verify.account') }}" target="_blank" rel="noopener noreferrer">Klik Disini</a>
                        </p><br>
                        <p>Jangan berikan kode verifikasi ini kepada siapapun untuk menjaga keamanan akun Anda.</p><br>
                        <p>Terima kasih,</p>
                        <p> Tim <b>Sipjaki Pasuruan</b></p>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
