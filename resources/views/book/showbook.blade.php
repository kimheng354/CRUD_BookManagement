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
        <h1 class="text-bg-danger  rounded-2 text-black   ">Show  Books</h1>
        <table class=" table table-striped ">
            <thead>
              <tr>
                <th>#</th>
                <th>Cover</th>
                <th>Title</th>
                <th>Slug</th>
                <th>Description</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
                @php($i = 1)
                @foreach ($books as $books)
                    <tr>
                            <td>{{ $i++ }}</td>
                            <td>
                                <img src="{{ asset('uploads/' .$books->covers) }}" width="100px" alt="">
                            </td>
                            <td>{{ $books ->titles }}</td>
                            <td>{{ $books ->slug }}</td>
                            <td>{{ $books ->Description }}</td>
                            <td>
                                <a href="{{ route('book.edit',$books ->id) }} " class="btn btn-primary ">Edit</a>
                                <a href="{{ route('book.delete',$books ->id) }}" onclick="return confirm('Are you sure to Delete')" class=" btn  btn-danger ">Delete</a>
                            </td>

                    </tr>
                @endforeach
            </tbody>
        </table>

            <a href="{{ route('book.create') }}" class="btn btn-primary "> Add Book</a>
        
    </div>
</body>

</html>
