<div>
    <input type="radio" name="option" id="{{ $number }}" value="{{ $number }}" class="peer hidden" onclick="changeRadio({{ $number }})" />
    <label for="{{ $number }}" class="text-xs block cursor-pointer select-none rounded-xl p-2 text-center peer-checked:bg-blue-500 peer-checked:font-bold peer-checked:text-white">{{ $value }}</label>
</div>