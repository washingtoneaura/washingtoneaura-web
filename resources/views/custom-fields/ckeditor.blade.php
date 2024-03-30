<textarea {{ is_array($attributes) ? json_encode($attributes) : $attributes }}>{{ is_array($value) ? json_encode($value) : $value }}</textarea>

@push('scripts')
    <script src="{{ asset('node_modules/@ckeditor/ckeditor5-build-classic/build/ckeditor.js') }}"></script>
    <script>
        ClassicEditor
            .create(document.querySelector('#{{ $name }}'))
            .catch(error => {
                console.error(error);
            });
    </script>
@endpush