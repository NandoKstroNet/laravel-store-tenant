@if(session()->has('message'))

    @php extract(session()->get('message')); @endphp

    <div class="w-full px-8 py-2 @if($type == 'success') border-green-900 bg-green-200 @else  border-red-900 bg-red-200 @endif">
        {{$body}}
    </div>
@endif
