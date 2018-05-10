@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">

        <h1 class="h1">Styleguide</h1>


        <h2 class="h2">Titraille</h2>

        <p class="h1">Titre .h1</p>
        <p><?php echo $faker->paragraph(); ?></p>
        <p class="h2">Titre .h2</p>
        <p><?php echo $faker->paragraph(); ?></p>
        <p class="h3">Titre .h3</p>
        <p><?php echo $faker->paragraph(); ?></p>
        <p class="h4">Titre .h4</p>
        <p><?php echo $faker->paragraph(); ?></p>



        <h2 class="h2">Boutonnaille</h2>

        <div class="btn">
            <span>.btn</span>
        </div>
        <div class="btn colorized">
            <span>.btn.colorized</span>
        </div>
        <div class="btn btn-primary">
            <span>.btn.btn-primary</span>
        </div>
        <div class="btn play-selection">
            <span>.btn.play-selection</span>
        </div>



        <h2 class="h2">Liens</h2>

        <a href="#">a simple</a><br>
        <a href="#" class="btn">a.btn</a><br>
        <a class="btn btn-link">.btn.btn-link</a>
        <div class="backlink">
            <a href="#">.backlink a</a>
        </div>


        <h2 class="h2">Formulaires</h2>

        <form class="form-horizontal">
            <div class="form-group wide">
                <div class="field">
                    <label for="text" class="control-label">Input text - wide</label>
                    <input type="text" name="text">
                </div>
            </div>


            <div class="form-group shared">
                <div class="field">
                    <label for="text2" class="control-label">Input text - shared</label>
                    <input type="text" name="text2">
                </div>
                <div class="field">
                    <label for="text3" class="control-label">Input text - shared</label>
                    <input type="text" name="text3">
                </div>
            </div>

            <div class="form-group wide">
                <div class="field">
                    <label>
                        <input type="checkbox" checked> checkbox checked
                    </label>
                    <label>
                        <input type="checkbox"> checkbox
                    </label>
                </div>
            </div>

            <div class="form-group wide">
                <div class="field">
                    <label>
                        <input type="radio" checked> radio checked
                    </label>
                    <label>
                        <input type="radio"> radio
                    </label>
                </div>
            </div>

            <div class="form-group wide">
                <div class="field">
                    <label for="textarea" class="control-label">Input textarea</label>
                    <textarea name="textarea">
                    </textarea>
                </div>
            </div>

            <div class="form-group shared">
                <div class="field">
                    <label for="dropdown2" class="control-label">Input select</label>
                    <select name="dropdown2">
                        <option>- Choisissez -</option>
                        <option>Option</option>
                        <option>Option</option>
                    </select>
                </div>
                <div class="field">
                    <label for="dropdown3" class="control-label">Input select</label>
                    <select name="dropdown3">
                        <option>- Choisissez -</option>
                        <option>Option</option>
                        <option>Option</option>
                    </select>
                </div>
            </div>

            <div class="form-group">
                <div class="action-wrapper">
                    <button type="submit" class="btn btn-primary">
                        button.btn.btn-primary
                    </button>
                </div>
            </div>

            <div class="form-group shared">
                <div class="action-wrapper">
                    <button type="submit" class="btn btn-primary">
                        Shared button
                    </button>
                </div>
                <div class="action-wrapper">
                    <button type="submit" class="btn btn-primary">
                        Shared button
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
