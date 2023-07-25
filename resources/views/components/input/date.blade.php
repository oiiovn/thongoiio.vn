<div class="input-group date" id="{{ $parentID }}" data-target-input="nearest">
    <input type="text" {{ $attributes->class(['form-control',  'datepicker-input'])->merge(['data-target' => '#'.$parentID])->merge($isRequired()) }} data-parsley-errors-container=".error-{{ $parentID }}">
    <div class="input-group-append" data-target="#{{ $parentID }}" data-toggle="datetimepicker">
        <div class="input-group-text">
            <i class="fa fa-calendar"></i>
        </div>
    </div>
</div>
<div class="error-{{ $parentID }}"></div>