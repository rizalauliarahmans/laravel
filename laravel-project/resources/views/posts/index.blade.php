<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
</head>
<body style="background:white">
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div>
                </div>
                <div class="card border shadow-sm rounded">
                <h1 class="ml-3 mt-3 mb-3 text-center">Daftar Presiden Indonesia dan Wakilnya Lengkap dengan Biografi Singkat</h1>
                <input type="text" class="form-control" placeholder="search" name="keyword" aria-describedby="button-addon2" value="{{ request()->query('keyword') }}">
                                        <button class="btn btn-outline-secondary" type="submit" id="button-addon2">search</button>
</div>
                    <div class="card-body ">
                    <a href="{{ route('posts.create') }}" class="btn btn-md btn-success mb-3">TAMBAH POST</a>

                        <div class=" ml-3">
                            <tbody>
                              @forelse ($posts as $post)
                                <tr>
                                    <td class="text-center">
                                        <img src="{{ asset('/storage/posts/'.$post->image) }}" class="rounded mt-3" style="width: 150px">
                                    </td>
                                    <h2 class="">{{ $post->namatokoh }}</h2><br>
                                    <h5> Orientasi: {!! $post->orientasi !!}</h5><br>
                                    <h5> Peristiwa Penting: {!! $post->peristiwa !!}</h5><br>
                                    <h5> Riorientasi: {!! $post->riorientasi !!}</h5><br>
                                    <td class="text-center">
                                        <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('posts.destroy', $post->id) }}" method="POST">
                                            <a href="{{ route('posts.show', $post->id) }}" class="btn btn-sm btn-dark">SHOW</a>
                                            <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-sm btn-primary">EDIT</a>
                                        </form class>
                                    </td>
                                </tr>
                              @empty
                                  <div class="alert alert-danger">
                                      Data Post belum Tersedia.
                                  </div>
                              @endforelse
                            </tbody>
                          </d>  
                          {{ $posts->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <script>
        //message with toastr
        @if(session()->has('success'))
        
            toastr.success('{{ session('success') }}', 'BERHASIL!'); 

        @elseif(session()->has('error'))

            toastr.error('{{ session('error') }}', 'GAGAL!'); 
            
        @endif
    </script>

</body>
</html>