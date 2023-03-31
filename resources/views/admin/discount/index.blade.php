@extends('layouts.admin')
@section('title','Discounts Statistics')
@section('heading','Discounts Statistics')

@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker3.min.css">
<style>
  .custom-control-input:checked~.custom-control-label::before {
    background-color: #007bff;
    border-color: #007bff;
  }

  /* Change the size of the toggle (optional) */
  .custom-switch .custom-control-label::before {
    width: 40px;
    height: 22px;
  }

  .custom-switch .custom-control-label::after {
    width: 18px;
    height: 18px;
  }
</style>
@endsection

@section('js')
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz4fnFO9gybBud7fn8PndxM4t+1mLlrDEvITar4Pz4lP/Lf6cJXC6yS/io" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
<script type="text/javascript">
  $(function () {
    $('.datepicker').datepicker({
      language: "es",
      autoclose: true,
      format: "dd/mm/yyyy",
      startDate: new Date()

    });
  });
</script>
<script>
  $(document).ready(function() {
    // Get the CSRF token from the meta tag
    const csrfToken = $('meta[name="csrf-token"]').attr('content');

    // Attach an event handler to the toggle checkbox
    $('#toggleCheckbox').on('change', function() {
      // Get the current state of the checkbox
      const isChecked = $(this).is(':checked');
      const checkboxId = $(this).data('id');

      // Perform the AJAX call
      $.ajax({
        url: "{{route('admin.discount-toggle')}}", // Replace with your desired URL
        type: 'POST',
        data: {
          isChecked: isChecked,
          _token: csrfToken,
          checkboxId: checkboxId
        },
        success: function(response) {
          location.reload(true);
        },
        error: function(jqXHR, textStatus, errorThrown) {
          // Handle any errors during the AJAX call
          console.error(textStatus, errorThrown);
        }
      });
    });
  });
</script>
@endsection

@section('content')
<div class="row">
  <div class="col-sm-12">
    <div class="card">
        <div class="card-content">
          <div class="card-body card-dashboard">

            <form method="POST" action="{{route('admin.discount-code-store')}}">
              @csrf
              <div class="row">
                <div class="col-md-12">
                  <h4>Create Discount Code</h4>
                </div>
                <div class="col-md-6 mt-1">
                  <label class="form-label">Code</label>
                  <input type="text" class="form-control" name="code" required>
                </div>
                <div class="col-md-6 mt-1">
                  <label class="form-label">Validity</label>
                  <input type="text" class="datepicker form-control" name="validity" required>
                </div>
                <div class="col-md-6 mt-1">
                  <label class="form-label">Type</label>
                  <select class="form-control" name="type">
                    <option class="Fixed">Fixed</option>
                    <option class="Percentage">Percentage</option>
                  </select>
                </div>
                <div class="col-md-6 mt-1">
                  <label class="form-label">Value</label>
                  <input type="number" name="value" class="form-control" required>
                </div>
                <div class="col-md-6 mt-1">
                  <label class="form-label">Status</label>
                  <select class="form-control" name="status">
                    <option value="1">Enable</option>
                    <option value="0">Disable</option>
                  </select>
                </div>
                <div class="col-md-6">
                  <br/>
                  <br/>
                  <input type="submit" class="btn btn-primary" name="Save" style="float:right;">
                </div>
              </div>
            </form>

          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="col-sm-12 p-0">
      <div class="card">
        <div class="card-content">
          <div class="card-body card-dashboard">
            <div class="table-responsive">
              <table class="table datatable p-0">
                <thead>
                  <tr>
                    <th>Code</th>
                    <th>Validity</th>
                    <th>Type</th>
                    <th>Value</th>
                    <th>Status</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($codes as $cod)
                  <tr>
                    <td>{{$cod->code}}</td>
                    <td>{{$cod->validity}}</td>
                    <td>{{$cod->type}}</td>
                    <td>{{$cod->value}}</td>
                    <td>
                      <div class="custom-control custom-switch">
                        <input type="checkbox" class="custom-control-input" data-id="{{$cod->id}}" {{$cod->status == 1 ? 'checked' : ''}} id="toggleCheckbox">
                        <label class="custom-control-label" for="toggleCheckbox"></label>
                      </div>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
  </div>
</div>
@endsection
