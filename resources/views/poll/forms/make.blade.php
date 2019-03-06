<form method="POST" action="/poll">
    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @csrf

    <div class="form-group">
        <label for="stitle">@lang('poll.title'):</label>
        <input type="text" name="title" class="form-control" value="" required>
    </div>

    <div class="form-group">
        <label for="option1">@lang('poll.option') 1:</label>
        <input type="text" name="options[]" class="form-control" value="">
    </div>

    <div class="form-group">
        <label for="option2">@lang('poll.option') 2:</label>
        <input type="text" name="options[]" class="form-control" value="">
    </div>

    <div class="more-options"></div>

    <div class="form-group">
        <button id="add" class="btn btn-primary">@lang('poll.add-option')</button>
        <button id="del" class="btn btn-primary">@lang('poll.delete-option')</button>
    </div>

    <hr>

    <div class="checkbox">
        <label>
            <input type="checkbox" name="ip_checking" value="1">@lang('poll.ip-checking') <span
                    class="text-red">({{ strtoupper(trans('poll.ip-checking-warrning')) }})</span>
        </label>
    </div>

    <div class="checkbox">
        <label>
            <input type="checkbox" name="multiple_choice" value="1">@lang('poll.multiple-choice')
        </label>
    </div>

    <div class="form-group">
        <button type="submit" class="btn btn-primary">@lang('poll.create-poll')</button>
    </div>
</form>


@section('javascripts')
    <script nonce="{{ Bepsvpt\SecureHeaders\SecureHeaders::nonce() }}">
        var options = 2;

        $('#add').on('click', function (e) {
            e.preventDefault();
            options = options + 1;
            var optionHTML = '<div class="form-group extra-option"><label for="option' + options + '">@lang('poll.option') ' + options + ':</label><input type="text" name="options[]" class="form-control" value="" required></div>';
            $('.more-options').append(optionHTML);
        });

        $('#del').on('click', function (e) {
            e.preventDefault();
            options = (options > 2) ? options - 1 : 2;
            $('.extra-option').last().remove();
        });
    </script>
@endsection
