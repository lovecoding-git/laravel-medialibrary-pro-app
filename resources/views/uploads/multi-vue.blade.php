<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <script defer src="js/vue/app.js"></script>


    <!-- Styles -->
    <link rel="stylesheet" href="{{ mix('css/main.css') }}">
</head>

<body>

    <div class="p-4">
        <div id="app">
            <p>errors: {{ $errors }}</p>
            <form action="multi-upload" method="POST">
                @csrf

                <p>
                    <input name="name" type="text" placeholder="name" value="{{ old('name', '') }}" />
                </p>

                <media-table-component :validation="{ accept: ['image/png'], maxSize: 1024000 }" name="media" :initial-value="{{ json_encode(old('media') ?? []) }}" :errors="{{ $errors }}" temp-endpoint="temp-upload" :strings="{hint: 'Add files please!', replace: 'Click or drag to replace'}">
                    <template slot-scope="{ getCustomPropertyInputProps, getCustomPropertyInputListeners }">
                        <input placeholder="caption (custom property)" class="border rounded p-1 mx-2" v-bind="getCustomPropertyInputProps('caption')" v-on="getCustomPropertyInputListeners('caption')" />

                        <input placeholder="tags (custom property)" class="border rounded p-1 mx-2" v-bind="getCustomPropertyInputProps('tags')" v-on="getCustomPropertyInputListeners('tags')" />
                    </template>
                </media-table-component>

                <p>
                    <button>Submit</button>
                </p>
            </form>
        </div>
    </div>
</body>

</html>
