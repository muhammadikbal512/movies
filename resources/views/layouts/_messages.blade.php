@if (session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success!</strong> Your question has been submitted! {{ session('sucess') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif

@if (session('update'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success!</strong> Your question has been updated! {{ session('sucess') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif

@if (session('delete'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success!</strong> Your question has been deleted! {{ session('sucess') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif

@if (session('jawaban'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success!</strong> Your answer has been submitted successfully! {{ session('sucess') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif

@if (session('updateAnswer'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success!</strong> Your answer has been updated! {{ session('sucess') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif