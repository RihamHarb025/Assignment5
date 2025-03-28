
@extends('layout')
@section('title', 'Students')
@section('content')
<h2>Students</h2>
<!-- TODO: Add search bar here -->
<div class="row justify-content-center mt-3">
    <div class="col-md-3">
        <div class="input-group mb-3">
            <span class="input-group-text" id="addon-wrapping">Search</span>
            <input type="text" class="form-control" placeholder="Search by name..." aria-label="searchName" aria-describedby="addon-wrapping" id="searchName" name="searchName">
        </div>
    </div>

    <div class="col-md-2">
        <div class="input-group mb-3">
            <span class="input-group-text" id="addon-wrapping">Min Age</span>
            <input type="number" id="minAge" class="form-control" placeholder="Min Age">
        </div>
    </div>

    <div class="col-md-2">
        <div class="input-group mb-3">
            <span class="input-group-text" id="addon-wrapping">Max Age</span>
            <input type="number" id="maxAge" class="form-control" placeholder="Max Age">
        </div>
    </div>
</div>

<table class="table mt-3">
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Age</th>
        </tr>
    </thead>
    <tbody id="student-table">
        <!-- TODO: Display student list here -->
         @foreach($students as $student)
         <tr>
            <td>{{$student->id}}</td>
            <td>{{$student->name}}</td>
            <td>{{$student->age}}</td>
</tr>
@endforeach
    </tbody>
</table>
<script>
    $(document).ready(function () {
    $('#searchName , #minAge ,#maxAge').on('keyup change', function () {
        let query = $('#searchName').val();
        let minAge = $('#minAge').val();
        let maxAge = $('#maxAge').val();
        // console.log("Search Query: ", query); 

        console.log("Search Query: ", query); 
        console.log("Min Age: ", minAge);
        console.log("Max Age: ", maxAge);

        $.ajax({
            url: "/students",
            type: "GET",
            data: { searchName: query , minAge: minAge , maxAge: maxAge },
            success: function (response) {
                console.log(response)
                $('#student-table').html(response);
            }
        });
    });
});
</script>




@endsection