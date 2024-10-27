<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Activity-Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
    </script>
</head>
<body>
    <div class="container mt-5">
        <button type="submit" style="justify-self: center" onclick="location.href='{{ url('/dashobard') }}'" class="btn btn-warning">Recalculate</button>
        <form method="POST" action="/filter">
            @csrf
            <div class="form-group mb-2">
                <label for="userId">User Id:</label>
                <input type="text" class="form-control" name="user_id" placeholder="Enter User Id"
                @if (isset($is_filter) && $is_filter == true)
                    value={{$user->id}}
                @endif
                @if (count($users) > 0)
                    value={{$users[0]->id}}
                @else
                    value=''
                @endif
                >
            </div>
            <button type="submit" class="btn btn-primary">Filter</button>
        </form>
        <br>
        <form method="GET" action="{{ route('sorting.data') }}">
            <label for="sorting_by">Sort by:</label>
            <select name="sorting_by" id="sorting_by" onchange="this.form.submit()">
                <option value="d">Day</option>
                <option value="m">Month</option>
                <option value="Y">Year</option>
            </select>
        </form>
        @if (@isset($message))
        <p style="color: yellow"> {{$message}} </p>
        @endif
        <table class="table mt-5">
            <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Name</th>
                    <th scope="col">Points</th>
                    <th scope="col">Rank</th>
                </tr>
            </thead>
            <tbody>
                @if (count($users) > 0)
                    @foreach ($users as $each)
                        <tr
                        @if (isset($is_filter) && $is_filter == true && $user->id == $each->id )
                           style="border: 10px solid Red;"
                        @else
                            style="border: none"
                        @endif
                        >
                            <th>{{ $each->id }}</th>
                            <th>{{ $each->full_name }}</th>
                            <th>{{ $each->total_point }}</th>
                            <th>{{ $each->rank }}</th>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <th>No Data</th>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>
</body>
</html
