<div class="modal fade" id="modal-add" tabindex="-1" role="dialog" aria-labelledby="modal-add" aria-hidden="true" style="display: none;">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">
                    @lang('headers.add_author')
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            {!! Form::open(['route' => 'authors.store', 'data-remote' => 'true']) !!}
            <div class="modal-body">
                <div class="card-body">
                    <div class="form-group row">
                        <label for="title" class="col-sm-3 text-right control-label col-form-label">@lang('messages.name')</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="title" placeholder="ФИО автора" name="name">
                        </div>
                    </div>

                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">
                    @lang('messages.close')</button>
                <button type="submit" class="btn btn-primary">@lang('messages.save')</button>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>