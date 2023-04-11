<x-mail::message>
Pharmacy Site
 
Your order is ready. Please Confirm your shipping.
<br>
<br>
<div>
    <label for="">Total Amount is {{$total}}</label>
</div> 
{{-- <x-mail::button :url="{{url('email_accept')}}" color="primary">
    Confirm
</x-mail::button>

<x-mail::button :url="{{url('cancel')}}" color="error">
    Cancel
</x-mail::button> --}}
 
Thanks,<br>
{{ config('app.name') }}
</x-mail::message>