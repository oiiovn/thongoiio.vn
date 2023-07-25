<div class="my-2">
    <input type="radio" id="bank-{{$item->id}}" name="bank_id" value="{{$item->id}}" checked>
    <label for="bank-{{$item->id}}"> <span>{{ $item->bank_name }}</span>-
        <span>{{ $item->account_name }}</span>-
        <span>{{ $item->account_number }}</span></label>

</div>
