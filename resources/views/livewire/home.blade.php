<div class="container">
    {{-- Banner --}}
    <div class="banner" style="width:100%;">
        <img src="{{ url('assets/slider/slider1.png') }}" alt="">
    </div>  

    {{-- Pilih Liga --}}
    <section class="pilih-liga mt-4">
        <h3><strong>Pilih Liga</strong></h3>
        <div class="row">
            @foreach ($ligas as $liga)
            <div class="col mt-3">
                <a href="{{ route('products.liga', $liga->id) }}">
                    <div class="card shadow">
                        <div class="card-body text-center">
                         <img src="{{ url('assets/liga') }}/{{ $liga->gambar }}" class="img-fluid"> 
                        </div>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
    </section> 

    {{-- Best Product --}}
    <section class="products mt-5 mb-5">
        <h3>
            <strong>Best Products</strong>
            <a href="{{ route('products') }}" class="btn btn-dark float-right"><i class="fas fa-eye"></i> Lihat Semua</a>
        </h3>
        <div class="row">
            @foreach ($products as $product)
            <div class="col mt-3">
                <div class="card">
                    <div class="card-body text-center">
                     <img src="{{ url('assets/jersey') }}/{{ $product->gambar }}" class="img-fluid"> 
                        <div class="row">
                          <div class="col-md-12 mt-3">
                            <h5><strong>{{ $product->nama }}</strong></h5>  
                            <h5>Rp. {{ number_format($product->harga) }}</h5>
                          </div>  
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <a href="{{ route('products.detail', $product->id) }}" class="btn btn-dark btn-block"><i class="fas fa-eye"></i> Detail</a>
                            </div>  
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </section>
</div>