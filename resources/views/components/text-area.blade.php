@props(["name"])
<textarea name="{{$name}}" cols="10" rows="5" {{$attributes->merge(['class'=>'border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm'])}}></textarea>