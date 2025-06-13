@extends('admin.layouts')

@section('admin.content')
<div class="container py-5" style="min-height: 55vh;">
    
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ route('admin.careers.store') }}" method="POST">
        @csrf
        <div class="mb-3 py-5">
            <label for="body" class="form-label">Body</label>
            <textarea name="body" id="editor"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>

<!-- CKEditor -->
<script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>
<script>
// Custom image upload adapter for CKEditor that stores images as base64 for preview
function Base64UploadAdapter(loader) {
    this.loader = loader;
    this.reader = new FileReader();
}

Base64UploadAdapter.prototype.upload = function() {
    var that = this;
    return this.loader.file
        .then(function(file) {
            return new Promise(function(resolve, reject) {
                that.reader.addEventListener('load', function() {
                    resolve({ default: that.reader.result });
                });
                that.reader.addEventListener('error', function(err) {
                    reject(err);
                });
                that.reader.readAsDataURL(file);
            });
        });
};

Base64UploadAdapter.prototype.abort = function() {
    // Nothing to abort when using base64
};

// Plugin that registers the custom upload adapter
function Base64UploadAdapterPlugin(editor) {
    editor.plugins.get('FileRepository').createUploadAdapter = function(loader) {
        return new Base64UploadAdapter(loader);
    };
}

// Initialize CKEditor with our custom upload adapter
var editor;
ClassicEditor
    .create(document.querySelector('#editor'), {
        extraPlugins: [Base64UploadAdapterPlugin]
        
    })
    .then(function(newEditor) {
        editor = newEditor;
    })
    .catch(function(error) {
        console.error(error);
    });


</script>
@endsection
