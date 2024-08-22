@error('status')
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        <strong>{{ $message }} <i class="fas fa-thumbs-up"></i></strong>
    </div>

    <script>
        $(".alert").alert();

    </script>
@enderror
@error('danger')
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        <strong>{{ $message }} <i class="fas fa-exclamation-circle"></i></strong>
    </div>

    <script>
        $(".alert").alert();

    </script>
@enderror