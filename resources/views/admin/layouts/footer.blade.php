</div>

</div>

<a class="scroll-to-top rounded" href="#page-top">
<i class="fas fa-angle-up"></i>
</a>

<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
aria-hidden="true">
<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">{{ __('messages.logoutQuestion') }}</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
        </div>
        <div class="modal-body">{{ __('messages.logoutMes') }}</div>
        <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">{{ __('messages.cancel') }}</button>
            <a class="btn btn-primary" href="{{ route('logout') }}">{{ __('messages.logout') }}</a>
        </div>
    </div>
</div>
</div>
