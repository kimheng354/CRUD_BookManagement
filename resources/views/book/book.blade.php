<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Book Management</title>
</head>

<body>
    <div class="container mt-3 p-4 ">
        @component('components.alert')  
        @endcomponent
        <h1 class="text-bg-danger  rounded-2 text-black   ">Create Books</h1>
        <form action="{{ route('book.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="from-group mt-2">
                <input type="text" class="form-control " name="titles" placeholder="Titles" value="{{ old('titles') }}">
                @error('titles')
                    <span class="text-danger ">{{ $message }}</span>
                @enderror
            </div>
            <div class="from-group mt-2">
                <input type="text" class="form-control " name="slug" placeholder="Slug" value="{{ old('slug') }}">
                @error('slug')
                    <span class="text-danger ">{{ $message }}</span>
                @enderror
            </div>
            <div class="from-group mt-2">
                <textarea name="description" class="form-control" cols="1" rows="1" placeholder="Description">{{ old('description') }}</textarea>
                @error('description')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="from-group mt-2">
                <input type="file" name="cover" class="form-control ">
                @error('cover')
                    <span class="text-danger ">{{ $message }}</span>
                @enderror
            </div>
            <div class="from-group mt-2 ">
                <button type="submit" class="btn btn-primary text-white  ">
                    Add Book
                </button>
            </div>
        </form>
    </div>
</body>

</html>
