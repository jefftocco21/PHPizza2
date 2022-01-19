@props(['name', 'type' => 'text'])

<div class="mb-6">
    <x-form.label name="{{$name}}" />

    <input type="{{$type}}" class="border border-gray-400 p-2 w-full" type="{{$name}}" name="{{$name}}" id="title" value="{{old($name)}}" required>

    <x-form.error name="{{$name}}" />
</div>
