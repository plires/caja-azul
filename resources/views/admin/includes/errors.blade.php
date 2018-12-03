@if ($errors->any())
  <div class="row">
    <div class="col-md-12">
        <div id="errors" class="alert alert-danger small" role="alert">
          @foreach ($errors->all() as $error)
            <ul>
              <li>{{ $error }}</li>
            </ul>
          @endforeach
        </div>
    </div>
  </div>
@endif