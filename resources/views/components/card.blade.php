<div class="card">
    <div class="card-header">
        <i class="fa fa-align-justify"></i> {{ $title }}
        {{ $any_button ?? ''  }}
    </div>
    <div class="card-body">
        {{ $slot }}
    </div>
</div>

