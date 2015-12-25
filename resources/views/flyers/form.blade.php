@inject('countries', 'App\Http\Utilities\Country')

<div class="row">
    {{ csrf_field() }}

    <div class="col-md-6">
        <div class="form-group">
            <label for="street">Street:</label>
            <input type="text" name="street" id="street" class="form-control" value="{{ old('street') }}">
        </div>

        <div class="form-group">
            <label for="street">City:</label>
            <input type="text" name="city" id="city" class="form-control" value="{{ old('city') }}">
        </div>

        <div class="form-group">
            <label for="zip">Zip/Postal code:</label>
            <input type="text" name="zip" id="zip" class="form-control" value="{{ old('zip') }}">
        </div>

        <div class="form-group">
            <label for="country">Country:</label>
            <select class="form-control" name="country" id="country">
                @foreach($countries::all() as $country => $code)
                    <option value="{{ $code }}">{{ $country }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="state">State:</label>
            <input type="text" name="state" id="state" class="form-control" value="{{ old('state') }}">
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="price">Sale price:</label>
            <input type="text" name="price" id="price" class="form-control" value="{{ old('price') }}">
        </div>

        <div class="form-group">
            <label for="description">Description:</label>
            <textarea name="description" id="description" class="form-control" rows="8" cols="40">{{ old('description') }}</textarea>
        </div>
    </div>
    <div class="col-md-12">
        <hr>

        <div class="form-group">
            <button type="submit" name="button" class="btn btn-primary">Create Flyer</button>
        </div>
    </div>

</div>
