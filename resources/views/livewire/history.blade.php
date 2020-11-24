<div class="container mt-2">
    <div class="container">
        <div class="row mb-3">
            <div class="col-md-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-dark">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">History</li>
                    </ol>
                </nav>
            </div>
        </div>
    
        <div class="row">
            <div class="col-md-12">
                @if(session()->has('massage'))
                <div class="alert alert-success">
                    {{ session('massage') }}
                </div>
                @endif
            </div>
        </div>
       

        <div class="row mt-4">
            <div class="col">
                <div class="table-responsive">
                    <table class="table text-center">
                        <thead>
                            <tr>
                                <td>No.</td>
                                <td>Tanggal Pesan</td>
                                <td>Kode Pemesanan</td>
                                <td>Pesanan</td>
                                <td>Status</td>
                                <td><strong>Total Harga</strong></td>
                                <td></td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1 ?>
                            @forelse ($pesanans as $pesanan)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $pesanan->created_at }}</td>
                                <td>{{ $pesanan->kode_pemesanan }}</td>
                                <td>
                                    <?php $pesanan_details = \App\PesananDetail::where('pesanan_id', $pesanan->id)->get(); ?>
                                    @foreach ($pesanan_details as $pesanan_detail)
                                    <img src="{{ url('assets/jersey') }}/{{ $pesanan_detail->product->gambar }}" class="img-fluid" width="50">
                                    {{ $pesanan_detail->product->nama }}
                                    <br>
                                    @endforeach
                                </td>
                                <td>
                                    @if($pesanan->status == 1)
                                    Belum Lunas
                                    @else
                                    Lunas
                                    @endif
                                </td>
                                <td><strong> Rp. {{ number_format($pesanan->total_harga+$pesanan->kode_unik) }} </strong> </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="7">Kosong</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        
        <div class="row">
            <div class="col">
                <div class="card shadow">
                    <div class="card-body">
                        <p>Untuk pembayaran silahkan dapat transfer ke rekening di bawah ini : </p>
                        <div class="media">
                                <img src="{{ url('assets/bri.png') }}" class="mr-3" alt="Bank Bri" width="60">
                            <div class="media-body">
                                <h5 class="mt-0">Bank BRI</h5>
                                No. rekening 0292739-9287-837 atas nama <strong>Muhammad Iksir</strong>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    
    </div>
    