<div {{ $attributes->merge(['class' => 'modal fade']) }} wire:ignore.self>
    <div class="modal-dialog modal-primary modal-{{ $type }}">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{$title}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                {{$slot}}
            </div>
        </div>
    </div>
</div>
