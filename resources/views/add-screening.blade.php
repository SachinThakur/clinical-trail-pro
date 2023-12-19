<!DOCTYPE html>
<html>
<head>
    <title>User Screening</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
  <div class="container mt-4">
  @if(session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
  @endif

   @if($errors->any())
        {!! implode('', $errors->all('<div class="alert alert-danger">:message</div>')) !!}
    @endif

  <div class="card">
    <div class="card-header text-center font-weight-bold">
      Screening Form
    </div>
    <div class="card-body">
      <form name="add-screening-form" id="add-screening-form" method="post" action="{{url('save-form')}}">
       @csrf
        <div class="form-group">
          <label for="exampleInputEmail1">First Name</label>
          <input type="text" id="name" name="name" class="form-control">
        </div>

        <div class="form-group">
          <label for="exampleInputEmail1">Date Of Birth</label>
          <input type="date" id="birth_date" name="birth_date" class="form-control">
        </div>

        <div class="form-group migraine_freq">
          <label for="exampleInputEmail1">Migraine Frequency</label>
          <select class="form-control" aria-label="--select--" name="migraine_freq">            
            <option value="monthly">Monthly</option>
            <option value="weekly">Weekly</option>
            <option value="daily">Daily</option>
          </select>
        </div>

        <div class="form-group" id="daily_freq">
          <label for="exampleInputEmail1">Daily Frequency</label>
          <select class="form-control" aria-label="--select--" name="daily_freq">
            <option value="1">1-2</option> '', '', ''
            <option value="2">3-4</option>
            <option value="3">5+</option>
          </select>
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
    </div>
  </div>
</div>  
</body>
<script>
    
$(function() {
    $('#daily_freq').hide(); 
    console.log('do something in js')
    $('select[name=migraine_freq]').change(function(){
        if($(this).val() == 'daily') {
            $('#daily_freq').show(); 
        } else {
            $('#daily_freq').hide(); 
        } 
    });
});
</script>    
</html>