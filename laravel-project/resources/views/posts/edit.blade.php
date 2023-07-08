<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Data Post - SantriKoding.com</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body style="background: lightgray">

    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        <form action="{{ route('posts.update', $post->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label class="font-weight-bold">gambar</label>
                                <input type="file" class="form-control" name="image">
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">nama tokoh</label>
                                <input type="text" class="form-control @error('namatokoh') is-invalid @enderror" name="namatokoh" value="{{ old('namatokoh', $post->namatokoh) }}" placeholder="Masukkan nama tokoh">
                            
                                <!-- error message untuk namatokoh -->
                                @error('namatokoh')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">orientasi</label>
                                <textarea class="form-control @error('riorientasi') is-invalid @enderror" name="riorientasi" rows="5" placeholder="Masukkan riorientasi Post">{{ old('riorientasi', $post->riorientasi) }}</textarea>
                            
                                <!-- error message untuk riorientasi -->
                                @error('riorientasi')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">peristiwa</label>
                                <textarea class="form-control @error('peristiwa') is-invalid @enderror" name="peristiwa" rows="5" placeholder="Masukkan peristiwa Post">{{ old('peristiwa', $post->peristiwa) }}</textarea>
                            
                                <!-- error message untuk peristiwa -->
                                @error('peristiwa')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">riorientasi</label>
                                <textarea class="form-control @error('orientasi') is-invalid @enderror" name="orientasi" rows="5" placeholder="Masukkan orientasi Post">{{ old('orientasi', $post->orientasi) }}</textarea>
                            
                                <!-- error message untuk orientasi -->
                                @error('orientasi')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-md btn-primary">UPDATE</button>
                            <button type="reset" class="btn btn-md btn-warning">RESET</button>

                        </form> 
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script>
</body>
</html>