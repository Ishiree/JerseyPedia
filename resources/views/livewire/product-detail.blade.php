<div class="container">
    <div class="row mb-3">
        <div class="col-md-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-dark">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('products') }}" class="text-dark">List Jersey</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Detail</li>
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
    
    <div class="row">
        <div class="col-md-6">
            <div class="card gambar-product">
                <div class="card-body">
                    <img src="{{ url('assets/jersey') }}/{{ $product->gambar }}" class="img-fluid">        
                </div>    
            </div>   
        </div>
        <div class="col-md-6">
            <h2 class="mb-3">
                <strong>{{ $product->nama }}</strong>
            </h2>
            <h4>
                Rp. {{ number_format($product->harga) }}
               
                @if($product->is_ready > 0)
                <span class="badge badge-success"><i class="fas fa-check"></i> Ready Stock</span>
                @else
                <span class="badge badge-danger"><i class="fas fa-times"></i> Stock Habis</span>
                @endif
            </h4>
            <hr>

        <div class="row">
            <div class="col">
                <form wire:submit.prevent="masukkanKeranjang">
                    <table class="table" style="border-top: hidden">
                        <tr>
                            <td>Liga</td>
                            <td>:</td>
                            <td><img src="{{ url('assets/liga') }}/{{ $product->liga->gambar }}" class="img-fluid" width="50"></td>
                        </tr>
                        <tr>
                            <td>Jenis</td>
                            <td>:</td>
                            <td>{{ $product->jenis }}</td>
                        </tr>
                        <tr>
                            <td>Berat</td>
                            <td>:</td>
                            <td>{{ $product->berat }}</td>
                        </tr>                    
                        <tr>
                            <td>Jumlah Pesanan</td>
                            <td>:</td>
                            <td>
                                <input id="jumlah_pesanan" type="number" class="form-control @error('jumlah_pesanan') is-invalid @enderror" wire:model="jumlah_pesanan" value="{{ old('jumlah_pesanan') }}" required autocomplete="jumlah_pesanan" autofocus>

                                @error('jumlah_pesanan')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </td>
                        </tr>
                        @if($jumlah_pesanan <= 1) 
                            <tr>
                                <td colspan="3"><strong>Name Set (isi jika tambah nameset)</strong></td>
                            </tr>
                            <tr>
                                <td>Harga Nameset</td>
                                <td>:</td>
                                <td>Rp. {{number_format($product->harga_nameset) }}</td>
                            </tr>
                            <tr>
                                <td>Nama</td>
                                <td>:</td>
                                <td>
                                    <input id="nama" type="text" class="form-control @error('nama') is-invalid @enderror" wire:model="nama" value="{{ old('nama') }}" autocomplete="nama" autofocus>
        
                                    @error('nama')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </td>
                            </tr> <tr>
                                <td>Nomor</td>
                                <td>:</td>
                                <td>
                                    <input id="nomor" type="number" class="form-control @error('nomor') is-invalid @enderror" wire:model="nomor" value="{{ old('nomor') }}" autocomplete="nomor" autofocus>
        
                                    @error('nomor') 
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </td>
                            </tr>  
                        @endif
                        <tr style="border-top: hidden">
                            <td colspan="3">
                                <button type="submit" class="btn btn-dark btn-block" @if($product->is_ready < 1) disabled @endif> <i class="fas fa-shopping-cart"></i> Submit</button>
                            </td>
                        </tr>                 
                    </table>
                </form>
            </div>
        </div>
        </div>
    </div>
    
</div>
