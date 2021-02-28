@extends('layouts.chart')

@section('content')
   <div class="container">
      <h2>2021</h2>
      <canvas id="myChart" width="100" height="100"></canvas>

   </div>

   <script>
      var attualId = <?php echo $user->id  ?>;
   </script>
@endsection

