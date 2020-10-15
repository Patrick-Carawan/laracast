@extends ('layout')

@section('head')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.5/css/bulma.css">
@endsection

@section('content')
    <div id="wrapper">
        <div id="page" class="container">
            <h1 class="heading has-text-weight-bold is-size-4">New Article</h1>

            <form method="POST" action="/articles">
            @csrf
                <div class="field">
                    <label for="title" class="field">Title</label>

                    <div class="control">
                        <input type="text" class="input" id="title" name="title">
                        <!-- <textarea name="title" id="title" class="textarea"></textarea> -->
                    </div>

                </div>

                <div class="field">
                    <label for="excerpt" class="label">Excerpt</label>

                    <div class="control">
                        <textarea name="excerpt" id="excerpt" class="textarea"></textarea>
                    </div>
                </div>

                <div class="field">

                    <label for="body" class="label">Body</label>

                    <div class="control">
                        <textarea name="body" id="body" class="textarea"></textarea>
                    </div>

                </div>

                <div class="field is-grouped">
                    <div class="control">
                        <button class="button is-link" type="submit">Submit</button>
                    </div>
                </div>

            </form>
        </div>
    </div>
@endsection