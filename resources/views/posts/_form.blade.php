@csrf

<label class="upperCase text-gray-700 text-xs" for="">Titulo</label>
<span class="text-xs text-red-600">
@error('title') 
    {{ $message }}
@enderror
</span>
<input type="text" name="title" class="rounded border-gray-200 w-full mb-4" value="{{ old('title', $post->title)}}">

<label class="upperCase text-gray-700 text-xs" for="">Slug</label>
<span class="text-xs text-red-600">
@error('slug') 
    {{ $message }}
@enderror
</span>
<input type="text" name="slug" class="rounded border-gray-200 w-full mb-4" value="{{ old('slug', $post->slug)}}">

<label class="upperCase text-gray-700 text-xs" for="">Contenido</label>
<span class="text-xs text-red-600">
@error('body') 
    {{ $message }}
@enderror
</span>

<textarea name="body" rows="5" class="rounded border-gray-200 w-full mb-4">{{ old('body', $post->body)}}</textarea>

<div class="flex justify-between items-center">
    <a class="text-xs bg-gray-800 text-white rounded px-4 py-2" href="{{ route('posts.index') }}">Regresar</a>
    <input type="submit" value="Enviar" class="bg-gray-800 text-white rounded px-4 py-2" >
</div>
